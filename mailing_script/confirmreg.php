<?php 
require_once ("../included_classes/class_misc.php");
require_once ("../included_classes/class_sql.php");
include ('./class.phpmailer.php');
include ("./class.smtp.php");
$email=new sql_functions();


 
	    $list=new sql_functions();
		$list->sql="select inst_fee.reg_no,email,counter,rcpt_no,regno from stu_per_rec,inst_fee where inst_fee.reg_no=stu_per_rec.regno";
		//$list->sql="select email from stu_per_rec where regno = 20085038";
		$list->query =$list->process_query();
		echo mysql_num_rows($list->query);
		while($arr=mysql_fetch_array($list->query))
		{
		$emailUser=$arr['email'];
		$regno=$arr['regno'];
		echo $list->sql;
		echo $emailUser;
		$mail = new PHPMailer ( );
		$mail->IsSMTP ();
		$mail->Host = "172.31.100.9"; // SMTP server
		$mail->SMTPAuth = false; 
		$mail->SMTPSecure="tls";// enable SMTP authentication
		//$mail->Host       = "172.31.100.9"; // sets the SMTP server
		$mail->Port = 25; // set the SMTP port for the GMAIL server
		$mail->Username = "academics"; // SMTP account username
		$mail->Password = "Mnnitdatabase"; // SMTP account password
		$mail->From = 'academics@mnnit.ac.in';
		$mail->FromName = 'Office Of The Dean (Academic)';
		$mail->AddAddress ( $emailUser );
		$mail->Subject = "Confirmation of Registration for  Even Semester  2011";
		$name=$list->get_value("name","student","regno",$regno);	
		$emailBody= "<br />
						<br />
						Dear $name,
						<br />
						<br />
						You have been Successfully Registered for the even semester 2011.
						<p>Your Registration Details are as::</p>
						<p>Receipt No :".$arr['rcpt_no']."
						<p>Counter Of Registration :".$arr['counter']."
						<p>
						<br />";
						echo $emailBody; 
		$mail->Body = $emailBody;
		// Send and verify
		if (! $mail->Send ()) 
		{
			echo 'Your message was not sent to ' . $emailUser;
		echo 'Error is: ' . $mail->ErrorInfo.'<br />';
		    
			//$misc->palert("Nahhi hua","./per.php");
		} else {
			echo 'The message has been sent to ' . $emailUser . "<br /><br>";

		//	$misc->palert("Ho gya","./per.php");
	
		}
		}	
mysql_select_db("mainsite");
$query="INSERT INTO mailhistory(`id` ,`subject`,`date`)VALUES ('','$mail->Subject',CURRENT_TIMESTAMP());";
$process=mysql_query($query);
	?>
 