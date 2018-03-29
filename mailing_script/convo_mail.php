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
As you know that Convocation 2017 is scheduled to be held on December 15, 2017 and the rehearsal for the same will 
be held on December 14, 2017 at 02:00 pm<br> in the Rajiv Gandhi Multi-Purpose Hall. Honorable President of
 India Mr. Shri Ram Nath Kovind has consented to grace the occasion as Chief Guest.</p>

<p>
It is mandatory to attend rehearsal on December 14, 2017, in order to receive degree on December 15, 2017 during 
Convocation. Degree recipients who are not able to 
attend rehearsal due to any reason will not be allowed to receive degree during Convocation.</p>

<p>
Moreover, in view of strict security requirements we will not be able to help you out at last minutes even if we want 
to do so, for receiving degree in the convocation in case you do not attend rehearsal on December 14, 2017.
</p>

<p>
<br>
Expecting your presence in the Convocation.</p>


Best<br>
<b>Prof. Ramesh Kr. Tripathi</b><br>
Dean (Academic)<br>

Motilal Nehru National Institute of Technology Allahabad
Allahabad-211004";
		//echo $emailBody;
		//die();	
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
		$mail->Subject = "Instructions Regarding Fourteenth Annual Convocation 2017, MNNIT Allahabad";	
		$mail->Body = $emailBody;
		$mail->SMTPDebug  = true;
		$mail->isHTML(true);

//_________________________________________RDY____________________________________________________________________________
//die();
$sql->connect_db("convo2017");	
for($i=1401;$i<=1450;$i+=1)         // send batch of 100
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
