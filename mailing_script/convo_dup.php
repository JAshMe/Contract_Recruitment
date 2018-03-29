<?php
session_start();
require_once("../included_classes/class_sql.php");

//require_once ("./class_sql.php");
//include ('./mailing_script/PHPMailer/class.phpmailer.php');
//include ("./mailing_script/PHPMailer/class.smtp.php");
include ("./PHPMailer/PHPMailerAutoload.php");
$sql=new sqlfunctions();

die();


//----------------------------------------------------------------------------

echo $emailBody="Dear Degree Recipient,<br><br>

Greetings!!<br>

<p>
It is my pleasure to invite you to attend the Thirteenth (13th) Annual
 Convocation-2016 of Motilal Nehru National Institute of Technology Allahabad <br>scheduled on 11th December, 2016 (Sunday). 
 Rehearsal and physical registration will be held on 10th December, 2016 (Saturday) <br>between 09:00 a.m. to 06:00 p.m.</p>

<p>
You are advised to visit  <a href='https://academics.mnnit.ac.in/convocation'>Convocation Website</a>
 for online registration and other information. Last date of online registration is 7th December, 2016 (Wednesday) up to 11:59 p.m. 
</p>



<p><b>P.S.</b><br> Please check your name in Hindi and English as displayed in<br>
            the list of degree recipients.<br>
In case of any discrepancy report immediately but not later than <b>15th November, 2016</b>. After that <u><b>NO CHANGE</b></u> will be possible.<br>
Expecting your presence in the Convocation.</p>


Best<br>
<b>Prof. Geetika</b><br>
Dean (Academic)<br>

Motilal Nehru National Institute of Technology Allahabad
Allahabad-211004";
		//echo $emailBody;
		
		$emailUser = $email;
		//$emailUser;
		$mail = new PHPMailer;
		$mail->IsSMTP ();
		$mail->Host = "smtp.gmail.com";//"74.125.71.109"; // SMTP server- gmail.com
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "ssl";
		//$mail->Host       = "172.31.100.9"; // sets the SMTP server
		$mail->Port = 465; // set the SMTP port for the GMAIL server
		$mail->Username = "academics@mnnit.ac.in"; // SMTP account username
		$mail->Password = "D_acad@2014"; // SMTP account password
		$mail->SetFrom('convocation@mnnit.ac.in', 'Office of the Dean(Academics)');
		$mail->Subject = "Invitation for Thirteenth Annual Convocation 2016, MNNIT Allahabad";	
		$mail->Body = $emailBody;
		$mail->SMTPDebug  = true;
		$mail->isHTML(true);

//_________________________________________RDY____________________________________________________________________________

$sql->connect_db("convo2016");	
for($i=1301;$i<1307;$i+=1)         // send batch of 1000 
{   $flag=0;
	echo $i.'<br>';
	$res=$sql->process_query("select s.regno,email from convo2016.degreegetters d left join tab.stu_per_rec s on d.regno=s.regno  and d.finalroll=0
	limit $i,1");
	
	echo $n=$sql->num_rows();
	echo '<br>';
	//die();
	if($n==0)
		break;
	//$res=$sql->process_query("select s.regno,s.email from tab.stu_per_rec s where s.regno in('20134061')");
	//$regnos=array('20128004','20134061');
	
	
	while($arr=mysql_fetch_array($res)){
		     $regno=$arr[0];		
		   	
			$emailUser=$arr[1];	
			
			print_r($arr);
	    if($regno==""||$emailUser==""){
		 // echo "gotta you<br>";
		  $flag=1;
		  break;
		}
			
			$mail->AddAddress($emailUser);
			
			//$mail->AddBCC($emailUser);
			//
			// Send and verify
			//$mail->Timeout = 3600;
			
	}
}
	 if (! $mail->Send ()) {			
		echo $err= "Message sending failed . Try again later.";
		die();
	} 
	else {
		echo $err="Convocation Invitation has been mailed successfully<br>"; 
	//	$res=$sql->process_query("update degreegetters set finalroll=1 where regno like \"$regno\" ");
		$mail->ClearAddresses();
		
	}
//	echo $regno.'-->'.$emailUser.'<br/>';
	//die();

?>
