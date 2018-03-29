
	<?php 
require_once ("./class_misc.php");
require_once ("./class_sql.php");
include ('./class.phpmailer.php');
include ("./class.smtp.php");

$content = $_POST['content'];
//$recipient = $_POST['recipient'];
$username = $_POST['username'];
$password = $_POST['password'];
$from = $_POST['from'];
$subject = $_POST['subject'];

function getContent($roll)
{
   $email=new sql_functions();
 // $name=$email->get_value("name","student","regno",$regno);
  
  $content= "<p>Hello everybody,<br />
	 <br />
	 An anti-ragging committee has to be formed under Chief Warden Mr. Vinod Yadava for the next academic session.<br>
	 All   B.Tech final year students (Boys &amp; Girls) who are interested in to   be a part of that committee, mail your name, email-id,<br>
and mobile number to me at &lt;amar2020agarwal@gmail.com&gt;.
</p>
<br />
-- <br />
<p>Regards<br />
	Amar Kumar Garg<br />
	Information Technology<br />
	Motilal Nehru NIT Allahabad<br />
	Mob: (+91) - 9616831600</p>";
 
 	return 	 $content;
}

		$content= "";
	    $list=new sql_functions();
		//$list->sql="select email from stu_per_rec,inst_fee where inst_fee.reg_no=stu_per_rec.regno ";
		$list->sql="select email from stu_per_rec,stu_acad_rec where stu_per_rec.regno=stu_acad_rec.regno AND sem_adm_to LIKE \"6\"  ";
		$list->query =$list->process_query();
		while($arr=mysql_fetch_array ($list->query))
		{
				if($arr['email'] != '')
				{
		$emailUser="hemesh.mnnit@gmail.com";//$arr['email'];
		$emailBody=$content;
     	//$emailBody=getContent($regno);
		echo $emailBody;
		
		echo $emailUser;
		$mail = new PHPMailer ( );
		$mail->IsSMTP ();
		$mail->Host = "172.31.100.9"; // SMTP server
		$mail->SMTPAuth = false; // enable SMTP authentication
		$mail->SMTPSecure = "tls";
		//$mail->Host       = "172.31.100.9"; // sets the SMTP server
		$mail->Port = 25; // set the SMTP port for the GMAIL server
		$mail->Username = "me083076"; // SMTP account username
		$mail->Password = "amar"; // SMTP account password
		$mail->From = 'me083076@mnnit.ac.in';
		$mail->FromName = 'Chief Warden Office';
		$mail->AddAddress ( $emailUser );
		$mail->Subject = "Anti-Ragging Committee";	
		$mail->Body = $emailBody;
		// Send and verify
		// Uncomment the next line to enable sending message
		if (! $mail->Send ()) {
			echo 'Your message was not sent to ' . $emailUser;
		echo 'Error is: ' . $mail->ErrorInfo.'<br />';
			//$misc->palert("Nahhi hua","./per.php");
		} else {
			echo 'The message has been sent to ' . $emailUser . "<br /><br>";

		//	$misc->palert("Ho gya","./per.php");
	
		}
		}	}
	?>