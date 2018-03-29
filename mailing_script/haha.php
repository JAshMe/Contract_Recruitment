<?php 
set_time_limit(0);
require_once ("./class_misc.php");
require_once ("./class_sql.php");
include ('./class.phpmailer.php');
include ("./class.smtp.php");
//$email=new sql_functions();

function getContent()
{
  $content= 'vanditjain';
  return $content;
}

	echo "hi1";
	 	$list=new sql_functions();
		$list->sql="select 'vanjain18@gmail.com' from tab.tab limit 1";
		echo "hi2";		
		//$list->query =$list->process_query();
		//while($arr=mysql_fetch_array ($list->query))
		{
		//$emailUser="prakharpkt@gmail.com";	
	    	$emailUser="vanjain18@gmail.com";$arr['email'];
		echo $emailUser;
		if($emailUser == "")
			continue;
     	$emailBody=getContent();
		echo $emailBody;
		echo "<br><br>";
		echo $emailUser;
		$mail = new PHPMailer ( );
		$mail->IsSMTP ();
		$mail->Host = "smtp.gmail.com"; // SMTP server
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure="ssl";// enable SMTP authentication
		//$mail->Host       = "172.31.100.9"; // sets the SMTP server
		$mail->Port = 465; // set the SMTP port for the GMAIL server
		$mail->Username = "cs114093@mnnit.ac.in"; // SMTP account username
		$mail->Password = "vandit.12"; // SMTP account password
		$mail->From = 'academics@mnnit.ac.in';
		$mail->FromName ='Dean(Academic) MNNIT ALLAHABAD';
		$mail->AddAddress ( $emailUser );
		$mail->Subject = "Notice regarding Hostel Allotment";
		$mail->Body =$emailBody;
		//$mail->AddAttachment("../data/hostel preference_Proforma2013.xls");
		//$mail->AddAttachment("../data/NOTICE_Room AllotmentStudents2013.pdf");
		//$mail->AddAttachment("../data/format.xls");
		//$mail->AddAttachment("../data/2011_2012.pdf");
		echo "sent";
		// Send and verify
		if (! $mail->Send ()) 
		{
			echo 'Your message was not sent to ' . $emailUser;
		echo 'Error is: ' . $mail->ErrorInfo.'<br />';
		    
			//$misc->palert("Nahhi hua","./per.php");
		} 
		else {
			echo 'The message has been sent to ' . $emailUser . "<br /><br><br>";

		//	$misc->palert("Ho gya","./per.php");
	
		}
		}	
//mysql_select_db("mainsite");
//$query="INSERT INTO mailhistory(`id` ,`subject`,`date`)VALUES ('','$mail->Subject',CURRENT_TIMESTAMP());";
//$process=mysql_query($query);
	?>
 
