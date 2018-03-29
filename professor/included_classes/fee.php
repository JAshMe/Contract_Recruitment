<?php
define('BASE_INCLUDE','/var/www/html/academics/acadserver/academic_new/included_classes');

if(isset($_REQUEST['regno']))
	echo fee_sem($_REQUEST['regno']);
	
function fee_sem($regno,$type="")
{
//include_once('sql_functions.php');
//include_once('misc_functions.php');
require_once (BASE_INCLUDE.'/class_sql.php');
require_once (BASE_INCLUDE.'/class_user.php');
require_once (BASE_INCLUDE.'/class_misc.php'); 
$user=new userfunctions();
$com=new sqlfunctions();
$tab=new sqlfunctions();
$reg=new sqlfunctions();
$fee_sql=new sqlfunctions();
$misc=new miscfunctions();
/*----------------------------------------------------------edited by umang    temporarily----------------------------------------------------------------
$curr_reg_db=$reg->get_curr_reg();
*/
$tab->database="tab";

$tester=false;
// The following snipped is added to ease testing while preparing for next sem registraion... Just add your regno to testers table in tab and set testsers_reg in current_reg to next sem code.... RV - 23-06-2016
$tester_query="SELECT * FROM testers WHERE regno = '$regno'";
$tester_res=$tab->process_query($tester_query);
if($tab->num_rows()==1)
{
	$tester_db=$tab->get_value('testers_reg','current_reg',1,1);
	$tester=true;	
}
//-------------------------------------
$curr_reg_db=$reg->get_curr_reg();
if($tester)
	$curr_reg_db=$tester_db;
	
$phd = $_SESSION['type'];
if(is_numeric($type)){
	$sem=$type;
}
else if($type!="")
   $phd=$type;
$reg->database=$curr_reg_db;
if($tester)
	$reg->database=$tester_db;
	
if ($phd == "y")
  $com->database="phd";
else{
  $com->database=$curr_reg_db;
  $fee_sql->database="semesterfees";
}

$query1 = "select * from stu_per_rec where regno like \"$regno\" ";
$query2 = "select * from stu_acad_rec where regno like \"$regno\" ";
$query1_mysql= $com->process_query($query1);
$query2_mysql= $com->process_query($query2);
$num1 = mysql_num_rows ($query1_mysql);
$num2 = mysql_num_rows ($query2_mysql);
$results = mysql_fetch_array ($query1_mysql);
$cat = $results['category'];
 $CAT=substr(strtoupper($cat),0,2);/*---------------------------addded by umang---------------------------------*/
$sex = strtoupper ($results['sex']);

$results1 = mysql_fetch_array ($query2_mysql);
$temp = base64_decode($_REQUEST['regno']);

if($phd!="y")
{
  $course1 = trim($results1['prog']);
  $bra = trim($results1['bra']);
  $sem = trim($results1['sem_adm_to']);
  if(is_numeric($type))
  	$sem=$type;
  // to be commented
 // $sem++;
 
  $course_name = $tab->get_value ( "value" , "map", "code", $course1 );
  $bra_name = $tab->get_value ("value" , "map", "code", $bra );
  $year=intval(substr($regno,0,4));
  
   if((	($course1=='bt'&&$sem<=8)||(($course1=='mt'||$course1=='ms'||$course1=='mw')&&$sem<=4)||($course1=='mc'&&$sem<=6) )&&$year<2014)
  $fee_q = "select * from fees where prog like \"$course1\" and bra like \"$bra\" and sem like \"$sem\" and stud_type like 'old'";
  else if($course1=='mt'&&$sem>4)
  $fee_q = "select * from fees where prog like \"$course1\" and bra like \"$bra\" and sem like \"$sem\" and stud_type like 'zz'";
  else
 $fee_q = "select * from fees where prog like \"$course1\" and bra like \"$bra\" and sem like \"$sem\" and stud_type like 'zz'";
 
/*----------------can be used for querying fee-----------------
if(strtolower($regno)=="20114093"||strtolower($regno)=="20124078")
	echo $fee_q;
	*/
  $fee_p = $fee_sql->process_query($fee_q); 
  $fee_f = mysql_fetch_array ($fee_p);
$instfee = $fee_f['inst_fee'];

  $cond=(($CAT=='SC'||$CAT=='ST')&&($course1=='mt'||$course1=='mc'||$course1=='mb'||$course1=='ms'||$course1=='mw')?1:0);
  if($cond)
  {
	  
	  if($course1=='mt'&&($sem<=4)&&$year>=2014)//1 to 4
	  $instfee=$instfee-35000;
	  if($course1=='mt'&&($sem<=4)&&$year<2014)
	    $instfee=$instfee-17500;
	/*  if($course1=='mt'&&($sem<=6))//5 to 6 (pt)
	 $instfee=$instfee-4000;
	  */if($course1=='mc'&&($sem<=6)&&$year>=2014)
		{	
			$instfee=$instfee-35000;
			if($sem==2)
				$instfee=4501;
		}
		if($course1=='mc'&&($sem<=6)&&$year<2014)
		$instfee=$instfee-6000;
	  if($course1=='mb'&&($sem<=4)&&$year>=2014)
	  $instfee=$instfee-12000;
	  if($course1=='mb'&&($sem<=4)&&$year<2014)
	  $instfee=$instfee-12000;
	  if(($course1=='ms'||$course1=='mw')&&($sem<=4)&&$year>=2014)
	  $instfee=$instfee-7500;	
	   if(($course1=='ms'||$course1=='mw')&&($sem<=4)&&$year<2014)
	  $instfee=$instfee-5375;
	  
  }
  if($course1=='bt'&&($sem==2)&&$year>=2015&&($CAT=='OP'||$CAT=='OB'||$CAT=='GE'))
	  $instfee=38751;
  $accod = $reg->get_value( "accomodation" , "reg_type_accod", "regno", $regno );
  if ($accod == "daysch"&&!($course1=='mt'&&$sem>4))
   {
	   $instfee = $instfee -($sem%2?1375:1575) ; $messfee = "0"; 
   }
	/*if($regno=='20152080')
		echo $instfee;*/
	if ($instfee < 0)
	{
		$instfee = 0;
	}
}
//********************************************phd calculation start*************************************************//
//*******************************************************************************************************************//   
else
  {
    $dept = $results1['prog'];
    $sem = $results1['sem_adm_to'];			//BAKWAAAS....
	//echo "sem=$sem";
    $prog_type=$results1['prog_type'];
    $type=$com->get_value("type","stud_type","regno",$regno);
    $bra_name = $tab->get_value( "value" , "map", "code", $dept);
    $course_name="Doctor of Philosophy";
	
	//SEM TYPE FIXED
	$sem_type=substr($curr_reg_db,4,1);
	if($sem!=1)
	{
		if($sem_type=='o')
			$sem=3;			//odd value
		else
			$sem=4;			//even value
	}
  
		  /*-------------------------------------------------edited temprarily by umang----------------------------------------------------------------*/
        if($sem==1)
			$fee_q = "select * from phd_fees where type=\"$type\" and sem like \"1\" ";
		else if($sem%2==0)		   
        	$fee_q = "select * from phd_fees where type=\"$type\" and sem like \"even\" ";
			/*-------------------------------------------------edited temprarily by umang-------------------------------------------------*/
        else
         {   
            $fee_q="select * from phd_fees where type=\"$type\" and sem like \"odd\" ";
         }
        $fee_p = $com->process_query($fee_q);
        $fee_f = mysql_fetch_array ($fee_p);
        $instfee = $fee_f['inst_fees'];
		//$misc->palert2($instfee);
		if($CAT=='SC'||$CAT=='ST')
			$instfee-=7500;
        $messfee = 0;
	  
    $acc_type=$reg->get_value("accomodation","reg_type_accod","regno",$regno);
    if (($acc_type == "daysch"))//&&($type=="ft"))
      {
        $instfee = $instfee - ($sem%2?1375:1575);
        $messfee = "0"; 
  		/*if($phd=="y") $instfee = $instfee+50;*/
      } 
	
	/*$bra = strtolower($bra);
	if ($bra == "conpt" || $bra == "pept" || $bra == "sofpt" ||$bra=="propt" || $bra=="envpt" || $bra=="digpt"|| $bra=="strpt") 
	{
		$instfee = $instfee + ($sem%2?1375:1575);
	}
    */
    if($prog_type=='Teacher Candidate'||$prog_type=='Teacher Candidate (PT)'||$prog_type=='Teacher Canditate')
        $instfee=0;

  }
//********************************************phd calculation finish*************************************************//
//*******************************************************************************************************************//    
if($phd!="y"){
$due_q = "select * from dues where regno like \"$regno\" ";
$due_p = $fee_sql->process_query ($due_q);
$due_f = mysql_fetch_array ($due_p);
$instdue = $due_f['inst_due'];
if ($instdue == "") 
{
	$instdue = 0;
}
if ($messdue == "") 
{
	$messdue = 0;
}

if($instfee<=0)
{
  $instfee=0;
}
if($messfee<=0)
{
  $messfee=0;
}
}
//********************************************DASA CALCULATION START*************************************************//
//*******************************************************************************************************************//   
$is_swift = "select * from stu_per_rec where (category like \"%dasa%\" or category like \"%mea%\" or category like \"%iccr%\") and regno=\"$regno\"";
 //   echo $is_swift;
 $swift = $reg->process_query ($is_swift);
 $res=mysql_fetch_array($swift);
  /*if(strtolower($res['category'])=='mea'){
	  
  }
 else if(strtolower($res['category'])=='iccr'){
	$instfee=0; 
  }
  else*/ if(strtolower($res['category'])=='dasa')
  {
     $fee_q = "select * from fees where prog like \"%bt%\" and bra like \"%dasa%\" and sem like \"$sem\" ";
	//echo $fee_q;
     $fee_p = $fee_sql->process_query($fee_q); 
     $fee_f = mysql_fetch_array ($fee_p);
     $instfee = $fee_f['inst_fee'];
	 
  }
 
  $total=$instfee+$instdue;
  if ($instfee === "Invalid Semester")
  { 
    $total ="Registration for Odd Sem Not Permitted";
  }
  
//**************************************************SPECIAL FEES PICK FROM HERE***************************************************//
  
  $spl_sql="select * from semesterfees.spclinstifee  where regno=\"$regno\"";

  $spl_q=$fee_sql->process_query($spl_sql);
	if(mysql_num_rows($spl_q)!=0)
	{
  		$spl_f=mysql_fetch_array($spl_q);
  		$instfee=$spl_f['instfee']; 
		//$misc->palert2($spl_f['instfee']);
	}
    
	$_SESSION["inst_fee"]=$inst_fee;
	//$misc->palert2($spl_sql);
	
return $instfee+$instdue;	

}
?>
                                
