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
  
  $content="
  CulRav, the annual cultural festival of Motilal Nehru National Institute   of Technology is back to offer you three days of absolute unalloyed   revelery on its platter from 26th to 28th January 2012. Taking a cue   from its successful past and continuing to take big steps forward,   Culrav 2012's theme is <strong>&quot;Angels and Demons&quot;</strong>, with a view to rewarding not just the angelic but your demonic side as well. <br />
With a footfall of over 6000 students and participation from colleges   and universities from across the country, Culrav has been hugely   successful since its inception. From street plays, dances, fashion shows   to rock nights, the fest has all the stimulation students desire.<br />
So with your passion as the inspiration and talent as the means, come   join us, in this zestful mélange of culture, art, literature, music and   life!  Get ready to feel the exhilarating rush of adrenaline and challenge your   self-complacency as Culrav introduces this year's kaleidoscope of   events.<br />
<br />
<strong><u>Aayam</u> – <em>the dramatic dimension</em></strong><br />
Actions speak louder than words. Dazzle everyone with your acting skills   and keep the crowd in awe with your performance. Conquer the audience   with your ability in events like 'Chalchitra', a documentary making   competition, 'Nukkad', the Street Play , the stage play 'Pratibimb' and   many others.<br />
<br />
<strong><u>Resonance</u>- <em>musically yours</em></strong><br />
This is where the sounds express harmony and wash away your tautness due   to work. For all music lovers, this is the place to be!  It comprises of events like War of the Bands, Indian classical singing,   Intrumentals, Solo, Duet and Group singing competitions to list a few.<br />
<br />
<strong><u>Razzmatazz</u>- <em>groove it your way</em></strong><br />
Dance to the tune of passion, let the emotion flow and moonwalk your way   to glory. Let your dance steps do all the talking. The category   includes events like 'Flit-O-Mania', the group dance battle, 'Swing with   Zing' duet and 'Foot It', the solo dance competition.<br />
<br />
<strong><u>Art Beat</u>- <em>sound of colour</em></strong><br />
Life is beautiful with colors. Whether it is a mural or a simple   painting, colors define the carefree yet glorious part of us. This is   where titans of art express their message by the use of colors in varied   forms from Rangoli making, Street Painting, Collage to Wall Graffiti   and Thematic sketching.<br />
<br />
<strong><u>Spandan</u>- <em>I am Fashion</em></strong><br />
The cynosure of all eyes, the nitty-gritty and the most celebrated   event, Spandan is where glamorous beauties and handsome hunks get   together to merge their creativity, fashion statement and attitude on   the ramp. So If you have the attitude, the poise and the charisma that's   needed, then be the fashionistas to grab the eyeballs.<br />
<br />
<strong><u>Kavyasandhya</u> – <em>Ek shaam kaviyon ke naam</em></strong><br />
Gear up for the most anticipated Kavi Sammelan in the college in its   newest avatar with a promise that it will tickle your funny bone one   moment and will send your head spinning into thoughts the next. Get   overwhelmed by thoughts which hit you hard and make a difference in your   lives. Swagatam !<br />
<br />
<strong><u>Lok Tarang </u>– <em>Indian Folk Dance</em></strong><br />
&quot;Dance is the hidden language of the soul.&quot; From the impulsive beats of   Bhangra to the graceful Dhunche, from the energetic Marathi to elegant   Bihu, we bring the beautiful amalgamation of dancing cultures across the   nation. So start dreaming with your feet!!!<br />
<br />
<strong><u>Panorama</u> – <em>defining Unity in Diversity</em></strong><br />
India is a unique blend of various cultures. Panorama is the confluence   of all these cultures via various pavilions. Witness the rich cultures   of India and countries like our neighbors Nepal and Bhutan, Saudi Arabia   and Malaysia all at one place.<br />
<br />
<strong><u>Varchasva</u> – <em>Mr. &amp; Ms. Culrav '12</em></strong><br />
If you can face the crowd and influence the throngs by your wit and   eloquence; if  you have that gumption and aura to cast a magical spell,   then this is certainly the place to be. <br />
So here's the invitation to the 'silver-tongued' on this festive 'Golden   Jubilee' to make an indelible impact with their diamond words and walk   away with the prestigious title of Mr and Miss Culrav 2012.<br />
<br />
<strong><u>Literary Events</u> –<br />
Impressions : English Literary Events -</strong> Let the strokes of your pen   take you to the zenith of the war of words. Let the Shakespeare in you   surface and get its deserved acclaim. Some of the events planned are   Motley, Debate, Dumb Charades and Liar-liar.<br />
<strong>Surbhi : Hindi Literary Events -</strong> Surbhi invites you to celebrate   the rich hindi sahitya. Its time to pour your thoughts and articulate   them with the richness of your shabd-kosh. Events under this category   are Magazine making, Poetry writing, Creative Writing and the Hindi   Debate.<br />
<br />
<strong><u>Darkroom</u> – <em>shutterbug unplugged</em></strong><br />
Time for you to get engaged in gruelling sessions in the darkroom and   buoy it up with the flashes of your camera. So expose dark negatives,   make amazing documentaries to blow people's minds, and relive in your   photography for eons. From tagging friends to having your pictures tell   us their own story, we have it all in store for you.<br />
<br />
And to add to all the fun, Prizes worth <strong>LAKHS</strong> to be won this   time.  So Hold your breath, Take a leap and Dive straight into the Heart of the   Celebration. Indulge, Revel, Showcase your talent, or if you wish, just   come for the 'laid-back fun'.<br />
The official website for Culrav 2012 has been launched. <strong>Register and be a part of the CULtural RAVolution - 'CulRav 2012'.</strong> <br />
<br />
Visit: <a href=\"http://www.culrav.org\" target=\"_blank\">www.culrav.org</a> (powered by <a href=\"http://www.znetlive.in\" target=\"_blank\"> ZNET</a> )<br />
Follow us on Facebook : <br />
<a href=\"http://www.facebook.com/groups/260208374028872/?ref=ts\" target=\"_blank\">http://www.facebook.com/groups/260208374028872/?ref=ts</a> (group)<br />
<a href=\"http://www.facebook.com/culrav2012?ref=ts\" target=\"_blank\">http://www.facebook.com/culrav2012?ref=ts</a> (community page)

  ";
 	return 	 $content;
}

	
	    $list=new sql_functions();
		$list->sql="select email from culrav2012.try";
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
		$mail->Username = "sacadmin"; // SMTP account username
		$mail->Password = "sacred_@db10"; // SMTP account password
		$mail->From = 'webteam@culrav.org';
		$mail->FromName = 'Team Culrav 2k11';
		$mail->AddAddress ($emailUser);
		$mail->Subject = "CULRAV 2012 - ANNUAL CULTURAL FEST OF MNNIT, ALLAHABAD";	
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
