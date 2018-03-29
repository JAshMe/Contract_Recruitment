<html>
<body>
Hello,<br /><br />
The moment you had been eagerly waiting for, has finally come. You are cordially invited to the <b>Inaugural ceremony of Gnosiomania 2011</b>. The Inaugural ceremony will be followed by Open Panel Discussion (OPD).<br />
As OPD is one of the most high profile events at Gnosiomania, every year we have been witnessing a huge enthusiastic crowd following the event.  At Gnosiomania2011, the Open Panel Discussion promises to return with the same grand vision and holistic approach, blended with a fresh taste of youth, to present a lively and informal discussion that would stimulate fresh and articulate thinking among the youth. Gnosiomania has been witnessing the active participation of a huge mass to discuss and contemplate about the issues pertaining to the youth and society and impress ideas to solve these issues.<br />
OPD at Gnosiomania 2011 would take up <b>Indian Youth and Administrative Services</b> as its theme. The discussion would focus on issues related to the opportunities, hurdles and challenges that the Indian youth have to go through to get into the Indian Administration Service. Highly experienced and prominent dignitaries from the Indian Civil Services would be joining OPD as Panelists.<br />
Behold the panelists getting embroiled in a fiery discussion on the coveted Civil Services. Isn't it time that instead of criticizing &quot;the Indian system of things&quot;, the country's youth gets into the system and rectifies the flaws? Should the youth get its hands dirty or just leave things as they are, because the country is supposedly the next superpower? <br />
We bring all this and much more to OPD at Gnosiomania 2011.<br />
So be there,<br /><br />
<b>Date: 4th February 2011<br />
Time: 5:45PM<br />
Venue: Rajiv Gandhi MP Hall<br /><br />
With warm regards,<br />
Team Gnosiomania</b>
</body>
</html>
<?php 
require_once ("./class_misc.php");
require_once ("./class_sql.php");
include ('./class.phpmailer.php');
include ("./class.smtp.php");
$email=new sql_functions();

function getContent($roll)
{
   
 // $name=$email->get_value("name","student","regno",$regno);
  
  $content= "Hello,<br /><br />
The moment you had been eagerly waiting for, has finally come. You are cordially invited to the <b>Inaugural ceremony of Gnosiomania 2011</b>. The Inaugural ceremony will be followed by Open Panel Discussion (OPD).<br />
As OPD is one of the most high profile events at Gnosiomania, every year we have been witnessing a huge enthusiastic crowd following the event.  At Gnosiomania2011, the Open Panel Discussion promises to return with the same grand vision and holistic approach, blended with a fresh taste of youth, to present a lively and informal discussion that would stimulate fresh and articulate thinking among the youth. Gnosiomania has been witnessing the active participation of a huge mass to discuss and contemplate about the issues pertaining to the youth and society and impress ideas to solve these issues.<br />
OPD at Gnosiomania 2011 would take up <b>Indian Youth and Administrative Services</b> as its theme. The discussion would focus on issues related to the opportunities, hurdles and challenges that the Indian youth have to go through to get into the Indian Administration Service. Highly experienced and prominent dignitaries from the Indian Civil Services would be joining OPD as Panelists.<br />
Behold the panelists getting embroiled in a fiery discussion on the coveted Civil Services. Isn't it time that instead of criticizing &quot;the Indian system of things&quot;, the country's youth gets into the system and rectifies the flaws? Should the youth get its hands dirty or just leave things as they are, because the country is supposedly the next superpower? <br />
We bring all this and much more to OPD at Gnosiomania 2011.<br />
So be there,<br /><br />
<b>Date: 4th February 2011<br />
Time: 5:45PM<br />
Venue: Rajiv Gandhi MP Hall<br /><br />
With warm regards,<br />
Team Gnosiomania</b>";
 
 	return 	 $content;
}

	
	    $list=new sql_functions();
		$list->sql="select email from stu_per_rec where 1 ORDER BY regno DESC";
		//$list->sql="select email from stu_per_rec where regno = 20085038";
		$list->query =$list->process_query();
		while($arr=mysql_fetch_array ($list->query))
		{
		$emailUser=$arr['email'];
     	
		$emailBody=getContent($regno);
		//echo $emailBody;
		
		echo $emailUser;
		$mail = new PHPMailer ( );
		$mail->IsSMTP ();
		$mail->Host = "172.31.100.9"; // SMTP server
		$mail->SMTPAuth = false; 
		$mail->SMTPSecure="tls";// enable SMTP authentication
		//$mail->Host       = "172.31.100.9"; // sets the SMTP server
		$mail->Port = 25; // set the SMTP port for the GMAIL server
		$mail->Username = "pe086003"; // SMTP account username
		$mail->Password = "su60790"; // SMTP account password
		$mail->From = 'pe086003@mnnit.ac.in';
		$mail->FromName = 'Gnosiomania 2011';
		$mail->AddAddress ( $emailUser );
		$mail->Subject = "Invitation to Inaugural Ceremony of Gnosiomania 2011 and Open Panel Discussion";	
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
//mysql_select_db("mainsite");
//$query="INSERT INTO mailhistory(`id` ,`subject`,`date`)VALUES ('','$mail->Subject',CURRENT_TIMESTAMP());";
//$process=mysql_query($query);
	?>
 