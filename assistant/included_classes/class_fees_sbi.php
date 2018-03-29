<?php
define('BASE_INCLUDE','/var/www/html/academics/acadserver/academic_new/included_classes');
include_once(BASE_INCLUDE."/class_sql.php");
include_once(BASE_INCLUDE."/class_curl.php");
include_once(BASE_INCLUDE."/encryption.php");
include_once(BASE_INCLUDE."/fee.php");
/*
these entries in status of newsbifee
1-generated
2-pending
3-paid

*/
class fee_details extends sqlfunctions{
	private $regno;
	private $_refno;
	private $checksum;
	private $_studata;
	private $_purpose;
	const REFNO_LENGTH=10;
	public function __construct($reg,$purpose='Semester',$status=0){
		parent::__construct();
		$this->checksum="";
		$this->connect_db($this->get_curr_reg());
		$this->regno=$reg;
		$this->_purpose=$purpose;
			/*$query="select * from stu_acad_rec a natural join stu_per_rec b where regno='$reg'";
			echo $this->get_value('prog', 'stu_acad_rec' , 'regno',$reg);
			if($this->get_value('prog', 'stu_acad_rec' , 'regno',$reg)=='phd')
			echo $query="select * from phd.stu_acad_rec a natural join phd.stu_per_rec b where regno='$reg'";
			$this->_studata=$this->process_query($query);
			$this->_studata=$this->fetch_rows($this->_studata);
			
			//print_r($this->_studata);
			if(empty($this->_studata['mobile']) && empty($this->_studata['phone'])){
				//$this->palert("Please update your Contact Details $reg");
				die();
			}*/
	}
	public function palert($msg,$url){
		echo "<script>alert('$msg');window.location.href='$url';</script>";
		die($msg."<a href=\"$url\">Click here</a>");	
	}
	private function _generateRefNo(){
		/****
		1. md5 of registration no+time
		2. taking 10 length
		***///
		static $x=0;
		$x++;
		//echo $x;
		if($x>20){
			$this->error(22);
			die();	
		}
		$i=rand(0,32-self::REFNO_LENGTH);
		$hash=md5($this->regno."".time());
		$temprefno=substr($hash,$i,self::REFNO_LENGTH);
		$temprefno=strtoupper("KNP".$temprefno);
		if($this->refNoExist($temprefno)){
			return $this->_generateRefNo();	
		}
		else {
			$insert="INSERT INTO `fees`.`bank_detail` (`regno`, `refno`, `date_gen`, `amount`, `session`, `sem`, `purpose`, `status`, `remark`) VALUES ('$this->regno', '$temprefno', '".date("d-m-Y")."', '".$this->getFeeAmt()."', '".$this->getSession()."', '".$this->getSem()."', '".$this->_purpose."', 'Pending', '".date('h:i:s a')."');";
			$this->process_query($insert) or die("There is some Technical fault! Please try after sometime and if the problem persists, then contact Web Team");
			$this->_refno=$temprefno;
			return $temprefno;
		}
	}
	public function getRefNo(){
		if(empty($this->_refno))
			$this->_refno=$this->_generateRefNo();
		return $this->_refno;
	}
	public function getFeeAmt(){
		//update from fees.studentfees
		if($this->_purpose=="Transcript"){
			return 500;
		}
		else return fee_sem($this->regno);
	}
	public function getSession(){
		$y=date('Y');
		return substr($y,0,2).substr($this->get_curr_reg(),6);//$this->_studata['session'];
	}
	public function getProgram(){
		return $this->get_value("value","tab.map","code",$this->_studata['prog']);
	}
	public function getBranch(){
		return $this->get_value("value","tab.map","code",$this->_studata['bra']);
	}
	public function getSem(){
		return $this->_studata['sem_adm_to']+1;
	}
	public function getStudentName(){
		return $this->_studata['name'];	
	}
	public function getContact(){
		if(!empty($this->_studata['mobile']))
			return $this->_studata['mobile'];
		else if(!empty($this->_studata['phone']))
			return $this->_studata['contact'];
	}
	public function getDOB(){
		return $this->_studata['dob'];
	}
	public function getStuDetail($var){
		return $this->_studata[$var];	
	}
	private function refNoExist($ref){
			if($this->get_value("count(*)","fees.bank_detail","refno",$ref))
				return true;
			else return false;
	}
	public function getdata(){
		$string=$string."|checkSum=".$this->checksum;
		$retdata=encrypt($string);
		return $retdata;
	}
	public function get_status(){
		//return -1 if no entry is found
		return "pending";
	}
	public function checksum(){
		if(empty($this->refno))
			generate_refno();
		$this->checksum=md5("sdas");
		return $this->checksum;
	}
	public function onSuccess($bankid,$refno,$amt){
		
	}
	public function onFailure($bankid,$refno,$detail){
	
	}
	public function responseRecieved($refno,$sbirefno,$status,$statusdesc,$amt){
		$this->connect_db("fees");
		if(!$this->refNoExist($refno)){
			$this->error(23);
			return false;
		}
		if( !empty($sbirefno) && $this->get_value("count(*)","bank_detail","transaction_id",$sbirefno)!=0){
			$this->error(24);
		}
		//echo $refno." $sbirefno $status $statusdesc $amt";
		if($this->get_value("count(*)","bank_detail","refno like '$refno' and amount",$amt)==0)
			$this->error(25);
		$this->doubleVerify($refno);
		return true;
	}
	
	public function printReceipt($refno,$sbirefno=""){
		if($sbirefno=="" || $sbirefno=="null")
			$sbirefno="is NULL";
		else $sbirefno="='$sbirefno'";
		//$query="SELECT * from fees.bank_detail where refno like '$refno' and `transaction_id` $sbirefno";
		$query="SELECT * from fees.bank_detail where refno like '$refno'";
		$res=$this->process_query($query);
		$res=$this->fetch_rows($res);
		/***** for printing Reciept ****/
		//echo "<h2>Fee Receipt</h2>";
		/*echo "<table cellpadding=\"5px\">";
		echo "<tr><td>Reference No:</td><td> $res[refno]</td>";
		if($res['transaction_id']!="")
			echo "<tr><td>SBI Transaction No:</td><td> $res[transaction_id]</td></tr>";
		echo "<tr><td>Fee Amount:</td><td>$res[amount]</td></tr>";
		echo "<tr><td>Status:</td><td>$res[status]</td></tr>";
		echo "<tr><td>Status Description:</td><td>$res[status_desc]</td></tr>";
		echo "</table>";
		*/
		/*** printing finishes****/
		
		?>
        <style>

#receipt {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
}

#receipt td, #receipt th {
    font-size: 1em;
    border: 1px solid #CCCCCC;
    padding: 3px 7px 2px 7px;
}

#receipt th {
    font-size: 1.1em;
    text-align: left;
    padding-top: 5px;
    padding-bottom: 4px;
    background-color: #A7A942;
    color: #ffffff;
}

#receipt tr.alt td {
    color: #000000;
    background-color: #EEEEEE;
}

</style>

<table width="500" ID="receipt">
    
    <tr>
    	<th colspan="2">FEE RECEIPT
        </th>
    </tr>
    <tr>
		<td width="150">Name
        </td>
        <td width="*"><?php echo $this->getStudentName(); ?>
        </td>
                
    </tr>
    
    <tr class="alt">
		<td width="150">Registration Number
        </td>
        <td width="*"><?php echo $res['regno'] ?>
        </td>
                
    </tr>
    
    <tr>
		<td width="150">Program
        </td>
        <td width="*"><?php echo $this->getProgram(); ?>
        </td>
                
    </tr>
    
      <tr class="alt">
	
		<td width="150">Branch
        </td>
        <td width="*"><?php echo $this->getBranch(); ?>
        </td>
                
    </tr>
    
    <tr>
		<td width="150">Semester
        </td>
        <td width="*"><?php echo $res['sem'] ?>
        </td>
                
    </tr>
    
    
      <tr class="alt">
	
		<td width="150">Session
        </td>
        <td width="*"><?php echo $res['session'] ?>
        </td>
                
    </tr>
    
    <tr>
		<td width="150">Reference Number
        </td>
        <td width="*"><?php echo $res['refno'] ?>
        </td>
                
    </tr>
    
      <tr class="alt">
	
		<td width="150">SBI Ref. Number
        </td>
        <td width="*"><?php echo $res['transaction_id'] ?>
        </td>
                
    </tr>
    
    
    <tr>
		<td width="150">Amount
        </td>
        <td width="*"> &#8377; <?php echo $res['amount'] ?>
        </td>
                
    </tr>
    
      <tr class="alt">
	
		<td width="150">Status
        </td>
        <td width="*"><?php echo $res['status'] ?>
        </td>
                
    </tr>
    
    
    <tr>
		<td width="150">Date
        </td>
        <td width="*"><?php echo is_numeric($res['date_recv'])?date("d/m/Y",$res['date_recv']):$res['date_recv']; ?>
        </td>
                
    </tr>
</table>
<br><br>
**This is a computer generated receipt, hence does not need signature.
        <?php
	}
	private function decodeXML($input,$refno){
		$array=array();
		$xml=simplexml_load_string($input);
		foreach($xml->attributes() as $a => $b){
  			$array[$a]=$b;
  		}
		return $array;	
	}
	public function doubleVerify($refno="0"){
		//$curl->setProxy("172.31.100.19");
		$url="https://merchant.onlinesbi.com/thirdparties/doubleverification.htm"; //"https://www.onlinesbi.com/thirdparties/doubleverification.htm";
		//$url="http://172.31.9.14/included_classes/doubletest.php";
		//die();
		$curl=new mycurl($url);// ,"172.31.100.19:3595");
		$data=array();
//		echo $refno;
		if($refno=="0")
			$query="select * from fees.bank_detail where regno like '$this->regno' and session='".$this->getSession()."' and sem='".$this->getSem()."' order by date_gen desc";
		else $query="select * from fees.bank_detail where refno like '$refno'";
		//echo $query;
		/*if($this->regno=="20128004")
			echo $query;*/
		$result=$this->process_query($query);
		while($arr=$this->fetch_rows($result))
			$arr1=$arr;
		//print_r($arr1);
		$string="refno=$arr1[refno]|amt=$arr1[amount]";
		$checksum=md5($string);
		$string.="|checkSum=".$checksum;
		$encrypted=encryptAES($string);
		//echo "in 2 &quot; $arr1[refno];";
		$data['encdata']=$encrypted;
		$data['merchant_code']="MNNIT";
		
		//print_r($data);
		$returndata=$curl->setPost($data);
		$curl->createCurl();
		$returndata=trim($curl->__tostring());
		//echo $returndata;
		file_put_contents("returo","recieved: $returndata",FILE_APPEND);
		$decoded=decryptData($returndata);
		//print_r($decoded);
		//file_put_contents("returo","decrypted: $decrypted",FILE_APPEND);
		//$decoded=$this->decodeXML($decrypted,$arr1['refno']);
//		file_put_contents("returo","decoded: $decoded",FILE_APPEND);
		//if($decoded['status']==$arr1['status']){
			$date=explode(" ",$decoded['txn_date']);
			$txndate=str_replace("/","-",$date[0]);
			if($decoded['sbiref']=="")
				$decoded['sbiref']="NULL";
			else $decoded['sbiref']="'$decoded[sbiref]'";
			$update="UPDATE fees.bank_detail set `transaction_id`=$decoded[sbiref],  status='$decoded[status]',status_desc='$decoded[statdesc]',date_recv='$txndate',amount=$decoded[amt],remark=concat(remark,'-double-->$date[1]') where refno like '$arr1[refno]'";
			//echo $update;
			$this->process_query($update);
			
			echo "<br><br>Update = ".$decoded[sbiref]."<br><br>";
		//}
		$status=0;
		if(strtolower($decoded['status'])=="success")
			$status=1;
		return $status;
	}
	public function error($errorno){
		$file=fopen("errorfeelog",FILE_APPEND);
		fwrite($file,$errorno." \t".$this->regno." \t".date("d/m/Y H:i:s a")."\n");
		die("Transaction Failed!! <br> Error Code: $errorno Try again");
	}
}

//________________________________________________________________________________________________________________________________________________
class fee extends sqlfunctions{
	const REFNO_LENGTH=10;
	public function __construct(){
		parent::__construct();
		$this->connect_db($this->get_curr_reg());
		
	}
	public function error($errorno){
		$file=fopen("errorfeelog","a");
		fwrite($file,$errorno." \t".$this->regno." \t".date("d/m/Y H:i:s a")."\n");
		fclose($file);
		die("Transaction Failed!! $errorno Try again");
	}
	public function doubleVerifySBI($refno){
		
	}
	public function payFee($data)	//data will be given to this function i.e. regno,name,contact,amount,etc;
	{
		//print_r($data);
		$arr['fee_purpose']=$data['purpose'];
		$arr['fee_subpurpose']=$data['subpurpose'];
		$arr['fee_regno']=$data['regno'];
		$arr['fee_amt']=$data['amt'];
		$temprefno=$this->_generateRefNo($data['regno']);//"hj".time();//$data['refno'];
		$arr['fee_refno']=$temprefno;
		$arr['fee_stu_name']=$data['name'];
		$arr['fee_dob']=$data['dob'];
		$arr['fee_bra']=$data['bra'];
		$arr['fee_prog']=$data['prog'];
		$arr['fee_semester']=$data['semester'];
		$arr['fee_session']=$data['session'];
		//print_r($arr);
		//die();
		$contact=$data['contact'];
		
		$contact=substr($contact,-10);
		$arr['fee_mob']=$contact;
		$insert="INSERT INTO `fees`.`bank_detail` (`regno`, `refno`, `date_gen`, `amount`, `session`, `sem`, `purpose`, `status`, `remark`) VALUES ('".$arr['fee_regno']."', '$temprefno', '".time()."', '".$arr['fee_amt']."', '".$arr['fee_session']."', '".$arr['fee_semester']."', '".$arr['fee_purpose']."', 'Pending', '".$arr['fee_subpurpose']."');";
			$this->process_query($insert) or die("There is some Technical fault! Please try after sometime and if the problem persists, then <a href='mailto:academics@mnnit.ac.in'>contact</a> Web Team");
			if($data['purpose']=="Certificates"){
				//insert certificate data into tables
				for($i=0;$i<sizeof($_SESSION['app']);$i++){
					$appid = $_SESSION['app'][$i];
					$certiinsert="INSERT INTO `certificates`.refno_map_appid values (\"$appid\" ,\"$temprefno\")";
					$this->process_query($certiinsert) or die("could not make entry in refno_map_roll");
				}
			}
		return $arr;
	}
	private function refNoExist($ref){
			if($this->get_value("count(*)","fees.bank_detail","refno",$ref))
				return true;
			else return false;
	}
	private function _generateRefNo($regno){
		/****
		1. md5 of registration no+time
		2. taking 10 length
		***///
		static $x=0;
		$x++;
		//echo $x;
		if($x>20){
			$this->error(22);
			die();	
		}
		$i=rand(0,32-self::REFNO_LENGTH);
		$hash=md5($this->regno."".time());
		$temprefno=substr($hash,$i,self::REFNO_LENGTH);
		$temprefno=strtoupper("KNP".$temprefno);
		if($this->refNoExist($temprefno)){
			return $this->_generateRefNo();	
		}
		return $temprefno;
	}
	public function responseRecieved($refno,$sbirefno,$status,$statusdesc,$amt){
		$this->connect_db("fees");
		if(!$this->refNoExist($refno)){
			$this->error(23);
			return false;
		}
		if( !empty($sbirefno) && $this->get_value("count(*)","bank_detail","transaction_id",$sbirefno)!=0){
			$this->error(24);
		}
		echo $refno." $sbirefno $status $statusdesc $amt";
		if($this->get_value("count(*)","bank_detail","refno like '$refno' and amount",$amt)==0)
			$this->error(25);
		$st=$this->doubleVerify($refno);
		return true;
	}
	public function doubleVerify($refno="0"){
		//$curl->setProxy("172.31.100.19");
		$url="https://merchant.onlinesbi.com/thirdparties/doubleverification.htm";
		//$url="http://172.31.9.14/included_classes/doubletest.php";
		$curl=new mycurl($url);// ,"172.31.100.19:3595");
		$data=array();
//		echo $refno;
		if($refno=="0")
			$query="select * from fees.bank_detail where regno like '$this->regno' and session='2015' and sem='0' order by date_gen desc";
		else $query="select * from fees.bank_detail where refno like '$refno'";
		$result=$this->process_query($query);
		$arr1=$this->fetch_rows($result);
		//print_r($arr1);
		$date=date("d-m-Y H:i:s"); //to log query time
		$string="refno=$arr1[refno]|amt=$arr1[amount]";
		$checksum=md5($string);
		$string.="|checkSum=".$checksum;//echo "string ".$string;
		//echo $string;
		$encrypted=encryptAES($string);
		//echo "in 2 &quot; $arr1[refno];";
		$data['encdata']=$encrypted;
		$data['merchant_code']="MNNIT";//echo "sent ".print_r($data);
		//print_r($data);
		$returndata=$curl->setPost($data);
		$curl->createCurl();
		$returndata=trim($curl->__tostring());
		file_put_contents("returo2","recieved: $returndata",FILE_APPEND);
/*		if($refno=="KNP806863624D")
			echo $returndata;
*/		$decoded=decryptData($returndata);
		echo "received ".print_r($decoded);
		
/*		if($refno=="KNP806863624D")
			print_r($decoded);
*/		//file_put_contents("returo","decrypted: $decrypted",FILE_APPEND);
		//$decoded=$this->decodeXML($decrypted,$arr1['refno']);
//		file_put_contents("returo","decoded: $decoded",FILE_APPEND);
		//if($decoded['status']==$arr1['status']){
			/*edited by vandit 1/5/15 - status of transactions whose payment mode was selected as challan and is not completed , then after 10 days it is marked as failure*/
			if((time()-$arr1['date_gen'] > 10*24*60*60) && $decoded['status']=="" && $decoded['statdesc']=="Pending for Payment"){
				$decoded['status']="Failure";
				$decoded['statdesc']="Pending Transaction";
			}
			$decoded['txn_date']=str_replace("/","-",$decoded['txn_date']);
			$txndate=strtotime($decoded['txn_date']);
			if($decoded['sbiref']=="")
				$decoded['sbiref']="NULL";
			else $decoded['sbiref']="'$decoded[sbiref]'";
			//print_r($decoded);
			$update="UPDATE fees.bank_detail set `transaction_id`=$decoded[sbiref],  status='$decoded[status]',status_desc='$decoded[statdesc]',date_recv='$txndate',amount=$decoded[amt],remark=concat(remark,'|double-->$date') where refno like '$arr1[refno]'";
			//echo $update;
			$this->process_query($update);
		//}
		$status=0;
		if( strtolower($decoded['status'])=="success"){
			$status=1;
				/*if(strtolower($arr1['purpose'])=="applicationnn"){
				$admissionq="select * from phd_fresh_14.account where reference like '$refno'";
				$admres=$this->process_query($admissionq);
				$row=$this->fetch_field($admres);
				if(mysql_num_rows($row)==0){
					$insertadm="INSERT INTO `phd_fresh_14`.`validate` (`roll` ,`reference` ,`amount`)
	VALUES ('$arr1[regno]', '$refno', '$decoded[amt]')";
					$this->process_query($insertadm);
					$insertadm="INSERT INTO `phd_fresh_14`.`account` (`regno` ,`reference` ,`amount`,`date`)
	VALUES ('$arr1[regno]', '$refno', '$decoded[amt]','".substr($decoded['txn_date'],0,10)."')";
					$this->process_query($insertadm);
					$updateadm="update phd_fresh_14.bank_data set remark='YES' where refid like '$arr1[regno]'";
					$this->process_query($updateadm);
				}
			}*/
		}
		return $status;
	}
	public function printReceipt($refno,$sbirefno=""){
		if($sbirefno=="" || $sbirefno=="null")
			$sbirefno="is NULL";
		else $sbirefno="='$sbirefno'";
		//$query="SELECT * from fees.bank_detail where refno like '$refno' and `transaction_id` $sbirefno";
		$query="SELECT * from fees.bank_detail where refno like '$refno'";
		$res=$this->process_query($query);
		if(mysql_num_rows($res)==0){
			$this->error(30);//"No record found!!";
		}
		$res=$this->fetch_rows($res);
		if(strtolower($res['purpose'])=="convocation"){
			$resstu=$this->process_query("select * from reg_e_15.stu_acad_rec natural join reg_e_15.stu_per_rec where regno like '$res[regno]'");
			$studata=$this->fetch_rows($resstu);	
		}
		else if(strtolower($res['purpose'])=="semester"||$res['purpose']=="Other"||$res['purpose']=="Certificates"){
			$resstu=$this->process_query("select * from reg_e_17.stu_acad_rec natural join reg_e_17.stu_per_rec where regno like '$res[regno]'");
			$studata=$this->fetch_rows($resstu);			
		}
		/***** for printing Reciept ****/
		//echo "<h2>Fee Receipt</h2>";
		/*echo "<table cellpadding=\"5px\">";
		echo "<tr><td>Reference No:</td><td> $res[refno]</td>";
		if($res['transaction_id']!="")
			echo "<tr><td>SBI Transaction No:</td><td> $res[transaction_id]</td></tr>";
		echo "<tr><td>Fee Amount:</td><td>$res[amount]</td></tr>";
		echo "<tr><td>Status:</td><td>$res[status]</td></tr>";
		echo "<tr><td>Status Description:</td><td>$res[status_desc]</td></tr>";
		echo "</table>";
		*/
		/*** printing finishes****/
		
		?>
        <style>

#receipt {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
}

#receipt td, #receipt th {
    font-size: 1em;
    border: 1px solid #CCCCCC;
    padding: 3px 7px 2px 7px;
}

#receipt th {
    font-size: 1.1em;
    text-align: left;
    padding-top: 5px;
    padding-bottom: 4px;
    background-color: #A7A942;
    color: #ffffff;
}

#receipt tr.alt td {
    color: #000000;
    background-color: #EEEEEE;
}

</style>

<table width="500" ID="receipt">
    
    <tr>
    	<th colspan="2">FEE RECEIPT <span style="float:right">Date: <?php echo date("d/m/Y");?></span>
        </th>
        
    </tr>
    <?php if(strtolower($res['purpose'])=="semester"){
	?>	<tr>
		<td width="150">Name
        </td>
        <td width="*"><?php echo $studata['name']; ?>
        </td>
                
    </tr>
    <?php
	}
	?>
    <tr class="alt">
		<td width="150"><?php
        if($res['purpose']=="Application")
			echo "Application ID";
		else echo "Registration No";
		?>		
        </td>
        <td width="*"><?php echo $res['regno'] ?>
        </td>
                
    </tr>
    
    <tr>
		<td width="150">Program
        </td>
        <td width="*">
        <?php 
				//echo $res['purpose']=="Application"?substr($res['remark'],0,3):$this->get_value("value","tab.map","code",$studata['prog']);  
				 /*------------commented by umang becaues for applican purpose ,MT(mtech) is  of length 2---------------*/
				  if($res['purpose']=="Application")
				  {
					  if(substr($res['remark'],0,2)=="MT")
					  echo "M.Tech.";
					  else
				      echo substr($res['remark'],0,3);
				  }
				  else
				  echo $this->get_value("value","tab.map","code",$studata['prog']);
		?>
        </td>
                
    </tr>
    <tr>
		<td width="150">Purpose
        </td>
        <td width="*">
        <?php 
		echo $res['purpose']; ?> Fees
        </td>
                
    </tr>
    <tr>
		<td width="150">Reference Number
        </td>
        <td width="*"><?php echo $res['refno'] ?>
        </td>
                
    </tr>
    
      <tr class="alt">
	
		<td width="150">SBI Ref. Number
        </td>
        <td width="*"><?php echo $res['transaction_id'] ?>
        </td>
                
    </tr>
    <?php 
	if($res['sem']!=0){
		?>
    <tr class="alt">
	
		<td width="150">Semester
        </td>
        <td width="*"><?php echo $res['sem'] ?>
        </td>
                
    </tr>
    <?php
	}
	if($res['session']!=0){
		?>
    <tr class="alt">
	
		<td width="150">Session
        </td>
        <td width="*"><?php echo $res['session'] ?>
        </td>
                
    </tr>
    <?php
	}
	?>
    <tr>
		<td width="150">Amount
        </td>
        <td width="*"> &#8377; <?php echo $res['amount'] ?>
        </td>
                
    </tr>
    
      <tr class="alt">
	
		<td width="150">Status
        </td>
        <td width="*"><?php echo $res['status'] ?>
        </td>
                
    </tr>
    
    
    <tr>
		<td width="150">Date of Payment
        </td>
        <td width="*"><?php echo is_numeric($res['date_recv'])?date("d/m/Y",$res['date_recv']):$res['date_recv']; ?>
        </td>
                
    </tr>
</table>
<br><br>
**This is a computer generated receipt, hence does not need signature.
        <?php
	}
	function getStatus($regno,$purpose){
		$query="SELECT * from fees.bank_detail where regno like '$regno' and purpose like '$purpose' and status like 'success'";
		$res=$this->process_query($query);
		$arr=$this->fetch_rows($res);
		return $arr;
	}
	function getTransactionID($regno,$purpose,$sem,$session){
		$query="SELECT * from fees.bank_detail where regno like '$regno' and purpose like '$purpose' and status like 'success' and sem='$sem' and session='$session'";
		
		$res=$this->process_query($query);
		$data=array();
		while($arr=$this->fetch_rows($res)){
			$data[]=array($arr['refno'],$arr['amount'],(is_numeric($arr['date_recv'])?date('d M,Y',$arr['date_recv']):$arr['date_recv']));	
		}
		return $data;
	}
	function getTotalFeeAmount($regno,$sem,$year,$purpose='Semester'){	//for semster fees only
		$query="SELECT * from fees.bank_detail where regno like '$regno' and purpose like '$purpose' and status like 'success' and sem='$sem' and session='$year'";
		$res=$this->process_query($query);
		$total=0;
		while($arr=$this->fetch_rows($res)){
			$total+=$arr['amount'];
		}
		return $total;
	}
}
?>