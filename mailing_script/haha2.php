   <?php 
set_time_limit(0);
require_once ("./class_misc.php");
require_once ("./class_sql.php");
include ('./class.phpmailer.php');
include ("./class.smtp.php");
//$email=new sql_functions();

function getContent()
{
  $content= 'Padma Bhushan Vidushi Uma Sharma shall be presenting "Kathak performance" <br>as per the following schedule:<br><b>Date:</b> 5-09-2013 (Thursday)<br><b>Time:</b> 6:30 pm<br><b>Venue:</b> Rajiv Gandhi MP Hall
<br>You are cordially invited with family to be with us on the occasion of this cultural event.<br><br><b>Student Activity Center</b>';
  return $content;
}

	
	 	$list=new sql_functions();
		$list->sql='select email from reg_o_14.stu_per_rec where regno in (select reg_no from reg_o_14.inst_fee)';		
		$list->query =$list->process_query();
		while($arr=mysql_fetch_array ($list->query))
		{
		//$emailUser="yugalrawat1@gmail.com";	
	    	$emailUser=$arr['email'];
		echo $emailUser;
		if($emailUser == "")
			continue;
     	$emailBody=getContent();
		echo $emailBody;
		echo "<br><br>";
		echo $emailUser;
		$mail = new PHPMailer ( );
		$mail->IsSMTP ();
		$mail->Host = "172.31.100.9"; // SMTP server
		$mail->SMTPAuth = false; 
		$mail->SMTPSecure="tls";// enable SMTP authentication
		//$mail->Host       = "172.31.100.9"; // sets the SMTP server
		$mail->Port = 25; // set the SMTP port for the GMAIL server
		$mail->Username = "academics"; // SMTP account username
		$mail->Password = "sushub12"; // SMTP account password
		$mail->From = 'sac@mnnit.ac.in';
		$mail->FromName ='Student Activity Center';
		$mail->AddAddress ( $emailUser );
		$mail->Subject = "Invitation For Cultural Event";
		$mail->Body =$emailBody;
	//	$mail->AddAttachment("../data/hostel preference_Proforma2013.xls");
	//	$mail->AddAttachment("../data/NOTICE_Room AllotmentStudents2013.pdf");
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
//$query="INSERT INTO mailhistory(`id` ,`subject`,`date`)VALUES (','$mail->Subject',CURRENT_TIMESTAMP());";
//$process=mysql_query($query);
	?>
 
   