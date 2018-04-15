<?php

	require_once("included_classes/class_user.php");
    require_once("included_classes/class_misc.php");
    require_once("included_classes/class_sql.php");
	require_once ("../mailing_script/class_misc.php");
	require_once ("../mailing_script/class_sql.php");
	include ("../mailing_script/PHPMailer/PHPMailerAutoload.php");
	
	
	
    
	$misc= new miscfunctions();
    $db = new sqlfunctions();

	//getting the data
	$email = validate($_POST['email']);
	$pass = validate($_POST['pass']);
	$conf_pass = validate($_POST['conf_pass']);
	
	//password check
	if($pass!=$conf_pass)
	{
		echo "pnm";
		die();
	}
		
	//duplicate user check
	
	$email = mysqli_real_escape_string($db->connection,trim(htmlentities($email)));
	$pass =hash('sha256',$_POST['pass']);
	$sql = "select * from login where email = '$email'";
	$r = $db->process_query($sql);
	if(mysqli_num_rows($r)>0)
	{
		$r = $db->fetch_rows($r);
		if($r['verify']>0)
			echo "uae";
		else
			echo "oag";
		die();
	}
	
	//insert user into database
	$sql = "select * from login";
	$r = $db->process_query($sql);
	$r=mysqli_num_rows($r)+1;

	$id=(string) $r;
	$id = str_pad($id,5,0,STR_PAD_LEFT);
	$id=date('Y').'JR'.$id;
	$sql = "insert into login(`user_id`,`email`,`password`,`verify`) values ('$id','$email','$pass','0')";
	$r = $db->process_query($sql);
	
	//generate otp and send it
	if($r)
	{
		$otp = randomNumber(8);
		$emailBody="<p align=\"justify\" style=\"text-indent:20px;\" > This e-mail was generated in response to a request to register on Contract Employee Recruitment portal<a href=\"academics.mnnit.ac.in/Contract_Recruitment/contract/index.php\"> academics.mnnit.ac.in/Contract_Recruitment/contract/ </a>.</p> <p align=\"justify\" style=\"text-indent:20px;\" >If you didn't perform this action, kindly ignore this e-mail. If you are being spammed, you can complain about it at recruitmentcell@mnnit.ac.in . The OTP is given below.</p><div align=\"center\"><h2><strong>$otp</strong></h2></div><br> Please enter this during registration to verify your email. <br /><br />";
		/*echo $emailBody;*/
		$emailUser = $email;
		$mail = new PHPMailer;
		//$mail->IsSMTP ();
		$mail->Host = "smtp.gmail.com";//"74.125.71.109"; // SMTP server- gmail.com
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "tls";
		//$mail->Host       = "172.31.100.9"; // sets the SMTP server
		$mail->Port = 587; // set the SMTP port for the GMAIL server
		$mail->Username = "academics@mnnit.ac.in"; // SMTP account username
		$mail->Password = "D_acad@2014"; // SMTP account password
		$mail->SetFrom('academics@mnnit.ac.in', 'Contract Employee Recruitment');
		$mail->Subject = "OTP For Registration";
		$mail->Body = $emailBody;
		$mail->AddAddress($emailUser);
		//$mail->SMTPDebug  = true;
		// Send and verify
		//$mail->Timeout = 3600;
		$mail->isHTML(true);
		if (! $mail->Send ()) 
		{
			echo "msf";
			die();
			//die( $mail->ErrorInfo);
		}
		
		//Entering the value of otp and current time in database
		
		$now  = time();
		$otpQuery = "update login set otp_sent = $now, otp = '$otp' where user_id = '$id'";
		$r = $db->process_query($otpQuery);
		if($r)
			echo "vss";
		else
			echo "te";	
	}
?>
