<div align="center"><u><strong>3D Animation and VFX</strong></u></div>
<br />

<br />
A two day Animation workshop on <strong>3D Animation and VFX</strong> is being held by <a href="http://www.maacindia.com" target="_blank">Maya Academy of Advanced Cinematic(MAAC</a>) in the college under Gnosiomania 2k11.<br />
The  workshop is scheduled on 5th and 6th of Feb,'11.Timings for   the workshop are 1p.m. to 5p.m. (for both the days). It will cover all   the details starting from the basics in animation technology,to full   fledged advanced animation. <strong>MAYA</strong>- a pioneer software in the animation industry will be used as the platform.<br /><br />
MAAC is providing a special   discount of 20% to all students of M.N.N.I.T,Allahabad.Hence, the charges for the workshop are:
<br />

	<ul>
		<li>Rs. 800/- each  for M.N.N.I.T. students </li>
		<li>Rs. 1000/- each  for outside candidates</li>
	</ul>
	MAAC will be providing CD's,study material and <u><strong>MAAC</strong> <strong>certificates</strong></u> to all participants.<br /><br />
A total of 200 entries will be entertained.Registration of the participants is on first come, first serve basis.<br />
Registration begins at 10:00 A.M., 3rd February, 2011.<br /><br />
For registration and further queries, kindly contact:<br /><br />
Devansh K. Srivastava<br />
(Workshop Co-ordinator)<br />
+9616272437<br />
Room No. 276, Tilak Hostel<br />
<a href="mailto:ur.devansh@gmail.com" target="_blank">ur.devansh@gmail.com</a>
<?php 
require_once ("./class_misc.php");
require_once ("./class_sql.php");
include ('./class.phpmailer.php');
include ("./class.smtp.php");
$email=new sql_functions();

function getContent($roll)
{
   
 // $name=$email->get_value("name","student","regno",$regno);
  
  $content= "<div align=\"center\"><u><strong>3D Animation and VFX</strong></u></div>
<br />

<br />
A two day Animation workshop on <strong>3D Animation and VFX</strong> is being held by <a href=\"http://www.maacindia.com\" target=\"_blank\">Maya Academy of Advanced Cinematic(MAAC</a>) in the college under Gnosiomania 2k11.<br />
The  workshop is scheduled on 5th and 6th of Feb,'11.Timings for   the workshop are 1p.m. to 5p.m. (for both the days). It will cover all   the details starting from the basics in animation technology,to full   fledged advanced animation. <strong>MAYA</strong>- a pioneer software in the animation industry will be used as the platform.<br /><br />
MAAC is providing a special   discount of 20% to all students of M.N.N.I.T,Allahabad.Hence, the charges for the workshop are:
<br />

	<ul>
		<li>Rs. 800/- each  for M.N.N.I.T. students </li>
		<li>Rs. 1000/- each  for outside candidates</li>
	</ul>
	MAAC will be providing CD's,study material and <u><strong>MAAC</strong> <strong>certificates</strong></u> to all participants.<br /><br />
A total of 200 entries will be entertained.Registration of the participants is on first come, first serve basis.<br />
Registration begins at 10:00 A.M., 3rd February, 2011.<br /><br />
For registration and further queries, kindly contact:<br /><br />
Devansh K. Srivastava<br />
(Workshop Co-ordinator)<br />
+9616272437<br />
Room No. 276, Tilak Hostel<br />
<a href=\"mailto:ur.devansh@gmail.com\" target=\"_blank\">ur.devansh@gmail.com</a>";
 
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
		$mail->Subject = "MAAC Animation Workshop in Gnosiomania";	
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
 