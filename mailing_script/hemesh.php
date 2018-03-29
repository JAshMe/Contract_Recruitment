<?


//require_once ("include/class_users.php");
//require_once ("include/class_misc.php");
include ('./class.phpmailer.php');
include ("./class.smtp.php");
 $emailBody='<br />
<br />
Dear Students
<br />
<br />
The online registration for even semester 2010-11 has started for all undergraduate and postgraduate programs.
The registration for Ph.d programs will start soon.
Please log into http://academics.mnnit.ac.in/ for the same.
For any clarifications mail your query to academics@mnnit.ac.in or contact webteam.
<br />
<br />
<strong>Regards
<br />
Rajeev Tripathi
<br />
Dean (Academic)</strong>
<br />
';
		//echo $emailBody;
		//$email = new sql_functions();
		$emailUser = "abhiagarwal53@gmail.com";//$email->get_value("email","stu_per_rec","regno", $regno);
		//echo $emailUser;
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
		$mail->Subject = "Registration for Even Semester 2011";	
		$mail->Body = $emailBody;
		// Send and verify
		if (! $mail->Send ()) {
			echo 'Your message was not sent to ' . $emailUser;
		echo 'Error is: ' . $mail->ErrorInfo.'<br />';
		$misc->palert("Nahhi hua","./per.php");
		} else {
			echo 'The message has been sent to ' . $emailUser . "<br />";
			$misc->palert("Ho gya","./per.php");
		}
		
?>		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
