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

 $emailBody="Dear Degree Recipient,<br><br>

Greetings!!<br>

<p>
It is my pleasure to invite you to attend the Fourteenth (14th) Annual
 Convocation-2017 of Motilal Nehru National Institute of Technology Allahabad <br>scheduled on 15th December, 2017 (Friday). 
 Rehearsal and physical registration will be held on 14th December, 2017 (Thursday) <br>between 09:00 a.m. to 03:00 p.m.</p>

<p>
You are advised to visit  <a href='https://academics.mnnit.ac.in/convocation'>Convocation Website</a>
 for online registration and other information. Last date of online registration is 10th December, 2016 (Sunday) up to 11:59 p.m. 
</p>



<p><b>P.S.</b><br> Please check your name in Hindi and English as displayed in<br>
            the list of degree recipients.<br>
In case of any discrepancy report immediately but not later than <b>25th November, 2017</b>. After that <u><b>NO CHANGE</b></u> will be possible.<br>
Expecting your presence in the Convocation.</p>


Best<br>
<b>Prof. Ramesh Kr. Tripathi</b><br>
Dean (Academic)<br>

Motilal Nehru National Institute of Technology Allahabad
Allahabad-211004";
		//echo $emailBody;
		
		$emailUser ;
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
		$mail->Subject = "Invitation for Fourteenth Annual Convocation 2017, MNNIT Allahabad";	
		$mail->Body = $emailBody;
		$mail->SMTPDebug  = true;
		$mail->isHTML(true);

//_________________________________________RDY____________________________________________________________________________

$sql->connect_db("convo2017");	
for($i=1301;$i<=1370;$i+=1)         // send batch of 100
{   $flag=0;
	echo $i.'<br>';

	$res=$sql->process_query("select s.regno,email from convo2017.degreegetters d left join tab.stu_per_rec s on d.regno=s.regno  and d.finalroll=0 limit $i,1");
	
	echo $n=$sql->num_rows();
	
	echo '<br>';
	
	if($n==0)
		break;
	
	
	while($arr=mysql_fetch_array($res)){
		
		  echo    $regno=$arr[0];		
		  	
			echo $emailUser=$arr[1];	
			
			//$emailUser="ravidutt20@gmail.com"	;
			
			
	    if($regno==""||$emailUser==""){
		 // echo "gotta you<br>";
		  $flag=1;
		  break;
		}
			
			$mail->AddAddress($emailUser);
			$res=$sql->process_query("update degreegetters set finalroll=1 where regno like \"$regno\" ");
				
	}
}
	 if (! $mail->Send ()) {			
		echo $err= "Message sending failed . Try again later.";
		
	} 
	else {
		echo $err="Convocation Invitation has been mailed successfully<br>"; 
		
		$mail->ClearAddresses();
		
	}
	

?>
