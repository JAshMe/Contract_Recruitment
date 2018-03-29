<?php 
set_time_limit(0);
require_once ("./class_misc.php");
require_once ("./class_sql.php");
include ('./class.phpmailer.php');
include ("./class.smtp.php");
//$email=new sql_functions();

function getContent($roll)
{
   
 // $name=$email->get_value("name","student","regno",$regno);
  
  $content="A Blood donation camp   is being organized in the college campus during the annual cultural   festival of our college. All the interested students may register   themselves through the following link:<br />
<br />
<strong><a href=\"http://tinyurl.com/6ykte6c\" target=\"_blank\">http://tinyurl.com/6ykte6c</a><br />
<br />
<br />
</strong> Please note that:<br />
1)A team of Doctors will be coming from AMA Blood Bank <br />
2)Each Donor will get refreshment after donating blood(real juice,   biscuit packet). <br />
3)Each Donor will get a certificate of appreciation and a donors card,   which can be used to get blood (in exchange) from the blood bank in case   of need. <br />
4)There is no harm in donating blood <br />
5)Blood Donation is one of the very noble works which one may do in his     life, which is only for the purpose of helping the society.      Please do come and contribute for a noble cause.";
 
 
/* $content="<div>Dear Friends,<br />
  <br />
  It gives us immense pleasure to introduce to you <strong>CULRAV 2k11</strong>, the National Level Cultural Extravaganza of <strong>NIT Allahabad</strong> which is scheduled to be held from  <strong>17th to 19th February, 2011</strong>. The 3-day festival witnesses a participation of upto <strong>10,000 from over 150 colleges across the nation</strong>. The CULRAV 2010 website alone had<strong> 3,50,000 to 4,00,000 clicks</strong> in   a duration of 3 months prior to the festival! Prominent institutions   like the IITs, other NITs, Delhi College of Engineering, HBTI Kanpur,   ISM Dhanbad, etc are regular participants of CULRAV. I would go as far   as to say that CULRAV is not a festival, but rather it is a cultural   phenomenon!<br />
  <br />
  A wide gamut of events are organized during the festival that include <strong>RazzMaTazz</strong> (Western Dance contests), <strong>Impressions</strong> (English Literary competitions),<strong> Fine Arts</strong> (Arts Events), <strong>Cultural Panorama</strong> (Cultural Pavilions competition),<strong> Histrionics</strong> (Dramatics Events),<strong> Surabhi</strong> (Hindi   Literary events) amongst several others. Online events are also   organized which receives participation from across the globe. Other than   competitions,<strong> special shows, creative workshops, Celebrity Talks and Performances </strong>are organised for the registered participants during the 3-day extravaganza.<br />
  <br />
</div>
<div>
  <div>This year is being celebrated as the <strong>Golden Jubilee Year</strong> of our institute. And what better way to mark these celebrations than the grandest of celebrations itself, <strong>CULRAV</strong>! To commemorate this very special year, we are organizing an<strong> Inter-NIT</strong> competition in the events of <strong>Folk Dance </strong>(Dance event), <strong>Histrionics</strong> (Dramatics event) and <strong>Solo Singing </strong>(Singing   event). The competition will be tough, and the stakes high. But who   will come out on top and claim their rightful spots as the Inter-NIT   champions? It is CULRAV that will decide!</div>
  <div><br />
  </div>
  <div>We,   Team CULRAV 2k11 extend an invitation to your college to come and   participate in CULRAV 2k11, to grace us with your presence and to make   this event a grand success. </div>
  <div><br />
  </div>
  <strong>The Event Brochure</strong> is being   attached with this mail for your kind reference. The various details of   the Festival can also be obtained at our website<a href=\"http://www.culrav.org/\" target=\"_blank\"> www.culrav.org</a>. <br />
  <div><br />
  </div>
  <div><br />
  </div>
  <div>With warm regards,</div>
  <div><br />
  </div>
  <div>CULRAV 2k11 Team</div>
</div>
";*/
 	return 	 $content;
}

	
	    $list=new sql_functions();
		$list->sql="select email from email_new";
		//$list->sql="select email from stu_per_rec where regno = 20085038";
		$list->query =$list->process_query();
	    while($arr=mysql_fetch_array ($list->query))
		{
		$emailUser=$arr['email'];
     	
		$emailBody=getContent($regno);
		//echo $emailBody;
		
		//echo $emailUser;
		$mail = new PHPMailer ( );
		$mail->IsSMTP ();
		$mail->Host = "172.31.100.9"; // SMTP server
		$mail->SMTPAuth = false; 
		$mail->SMTPSecure="tls";// enable SMTP authentication
		//$mail->Host       = "172.31.100.9"; // sets the SMTP server
		$mail->Port = 25; // set the SMTP port for the GMAIL server
		$mail->Username = "cs074081"; // SMTP account username
		$mail->Password = "LogintoGomti"; // SMTP account password
		$mail->From = 'webteam@culrav.org';
		$mail->FromName = 'Team Culrav 2k11';
		$mail->AddAddress ($emailUser);
		$mail->Subject = "Blood Donation Camp @Culrav2k11";	
		$mail->Body = $emailBody;
		//$mail->AddAttachment("./TShirt.jpg");
	//	$mail->AddAttachment("./Brochure.pdf");
		//$mail->AddAttachment("./poster.jpg");
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
