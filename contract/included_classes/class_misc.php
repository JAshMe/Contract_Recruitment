<?php
require_once ("class_sql.php");
class miscfunctions
{
    private $sql;

	
	public function redirect($url)
    {
        echo '<script type="text/javascript">';
        echo "window.location.href= \"$url\"  ";
       	echo '</script>';
    }
    public function palert($message,$tourl)
    {
      echo "<script> alert( \"$message\" ); </script>";
        $this->redirect($tourl);
	die();
    }
	public function palert_nr($message)
    {
      echo "<script> alert( \"$message\" ); </script>";
    }
	 public function palert2($message,$arr=0)
    {
      echo "<script> console.log( \"$message\" ); </script>";
       // $this->redirect($tourl);
	//die();
    }
    
    public function getMacAddress(){
        $location = `which arp`; 
        $arpTable = `$location`; 
        $arpSplitted = split("\n",$arpTable); 
        $remoteIp = $GLOBALS['REMOTE_ADDR'];  
        foreach ($arpSplitted as $value) { 
            $valueSplitted = split(" ",$value); 
            foreach ($valueSplitted as $spLine) { 
                if (preg_match("/$remoteIp/",$spLine)) { 
                    $ipFound = true; 
                 } 
            if ($ipFound) { 
                reset($valueSplitted); 
                foreach ($valueSplitted as $spLine) { 
                    if (preg_match("/[0-9a-f][0-9a-f][:-]". 
                         "[0-9a-f][0-9a-f][:-]". 
                         "[0-9a-f][0-9a-f][:-]". 
                         "[0-9a-f][0-9a-f][:-]". 
                         "[0-9a-f][0-9a-f][:-]". 
                         "[0-9a-f][0-9a-f]/i",$spLine)) { 
                            return $spLine; 
                    } 
                } 
            } 
            $ipFound = false; 
            } 
        } 
        return false; 
}  

    public function getUpdates()		//left panel
	{ 
		$sql=new sqlfunctions();	
		$sql->connect_db("mainsite");
		$sql1="SELECT * FROM updates WHERE display LIKE \"y\" ORDER BY pref DESC";
		$sql->query=$sql->process_query($sql1);
		?>
        <div id="leftheading">
        <div class="heading"> News &amp; Updates</div><br />
         </div>
		
		<?php
		while($array=mysql_fetch_array($sql->query))
		{
			$id=$array['pref'];	
			$title=$array['title'];
			$text=$array['text'];
			$date=$array['date'];
			if(time()-strtotime($date)<3*24*60*60)
				$new=1;
			else $new=0;
		?>	
  
        <div>
         	<div class="lefttxtblank">		<!--unnecessary extra formatting-->			
                <div class="leftboldtxtblank">
                    <div class="leftboldtxt"><img src="images/arrow_right.png" style="width:15px;height:15px;margin:0 2px 0 -20px;" class="ari"/><font size="3px" ><strong><?php echo $title;?></strong></font><?= ($new==1)?"<img src=\"images/new2.gif\" />":"" ?></div>
                    <div class="lefttxt">-<?php echo $date;?></div>
                 </div>
             </div>
              <div class="leftnormaltxtblank">
                  <div class="leftnormaltxt" style="font-size:13px;"><?php echo $text;?></div> 
                  <hr style="margin:6px -8px 0;"/>    
              </div>
         </div>
           
        <?php 
		}
		
	}
	
	public function getFooter()
	{
		?>
        <div id="footerbg">
  <div id="footerblank">
    <div id="footer"><br />
    
       <div id="copyrights"><font color="red"><strong>This Site works best when viewed in Mozilla Firefox (3.6.1 or higher)</strong></font></div>
      <div id="copyrights"> Copyright &copy MNNIT Allahabad. All rights reserved.</div>
            <div id="copyrights">For Suggestions and Feedback please contact academics@mnnit.ac.in</div>
      <div id="designedby">Designed by
	  <a href="webt14.html" style="color:#CCC;text-decoration:none">Webteam,DEAN (ACADEMICS)</a>
     
	  </div>
      </div>
      <div style="float:right;position:relative;top:-50px;right:0;">
      <script language="JavaScript" type="text/javascript">
TrustLogo("https://academics.mnnit.ac.in/data/comodo_secure.png", "CL1", "none");
</script>
<a  href="https://ssl.comodo.com/free-ssl-certificate.php" id="comodoTL">Free SSL</a>
      <!--<img src="data/comodo_secure.png">-->
</div>
      <!--
      <div style="float:right;position:relative;top:-50px;right:0;"><script type="text/javascript" src="https://seal.thawte.com/getthawteseal?host_name=academics.mnnit.ac.in&amp;size=S&amp;lang=en"></script>
</div>-->
  </div>
</div>

<?php
	}
	
	
	public function Extension($name) 	//filename extension
		{
			$pos=strpos($name,'.');
			return substr($name,$pos+1);
		}
		
	public function get_current_table()
	{
		$sql=new sqlfunctions();	
		$sql->connect_db("tab");
		echo $sql1="select cur_reg from current_reg";
		$sql->query=$sql->process_query($sql1);
		$array=mysqli_fetch_array($sql->query);
		return $array['cur_reg'];
	}

		
	public function getSideMenu($login/*0 for not logged in 1 for logged in*/){	//different side menu for if user logged in or not, by default not logged in
		$page=array("index.php","home.php");
		$sql=new sqlfunctions();
		
		//Added By Urjit --> to get current semester
		$sql->connect_db("tab");
		$sql1="select cur_reg from current_reg";
		$sql->query=$sql->process_query($sql1);
		$array=mysql_fetch_array($sql->query);
	    $maindb = $array['cur_reg'];
		$sql->connect_db($maindb);
		$sql1="select cur_reg from current_reg";
		$currsem = $sql->get_value("sem_adm_to","stu_acad_rec","regno",$_SESSION['regno']);
		$course = $sql->get_value("prog","stu_acad_rec","regno",$_SESSION['regno']);
		
		
		
		?>
        <div id="leftnav">
          <ul>
            <?php
            if($login==0){
				echo "<li><a class=\"leftnav\" href=\"./".$page[$login].'?val=home">&nbsp;&nbsp;Home</a></li>';
				echo "<li><a class=\"leftnav\" href=\"./certificates\" >Certificates and Degree<img src=\"./images/new2.gif\"></a></li>";
				echo '<li><a class="leftnav" target="_blank" href="data/acadcal_2017_18.pdf" >&nbsp;&nbsp;Academic Calendar  <img src="./images/new2.gif"></a></li>';
				echo "<li><a class=\"leftnav\" name=\"downloads\" href=\"./index.php?val=downloads\" >&nbsp;&nbsp;Downloads</a></li>";	
			}
			else {
				if($_SESSION['regno']=='20148091')
					echo '<li><a class="leftnav" name="profile" href="./home.php?val=pay_all" >&nbsp;&nbsp;Online Payment</a></li>';
			
			/*if(($currsem == 1 || $currsem == 2)&& $course == 'bt'){
					echo '<li><a class="leftnav" name="profile" href="./bankdetails/index.php?" >&nbsp;&nbsp;Fill Bank Details   <img src="./images/new2.gif"></a></li>';
			}*/
			?>
            <li><a class="leftnav" name="profile" href="./home.php?val=profile" >&nbsp;&nbsp;Profile</a></li>
            <li><a class="leftnav" href="./certificates" >Certificates and Degree<img src="./images/new2.gif"></a></li>
            <li><a class="leftnav" target="_blank" href="./data/acadcal_2017_18.pdf">&nbsp;&nbsp;Academic Calendar  <img src="./images/new2.gif"></a></li>
            <li><a class="leftnav" name="downloads" href="./home.php?val=downloads" >&nbsp;&nbsp;Downloads</a></li>
            <li><a class="leftnav" id="midframe" href="feedback/feedback.php">&nbsp;&nbsp;Course Feedback</a></li>
            <li><a class="leftnav" id="midframe" href="./home.php?val=result">&nbsp;&nbsp;View Result</a></li>
            <li><a class="leftnav" href="./transcript_pp.php">&nbsp;&nbsp;Transcript</a></li>
            <li><a class="leftnav" href="./register.php">&nbsp;&nbsp;Registration</a></li>
            <li><a class="leftnav" href="./home.php?val=feestatus">&nbsp;&nbsp;Transaction Status</a></li>
            
           <!-- <li><a class="leftnav" href="./certificates">&nbsp;&nbsp;Certificate Generation</a></li> -->         
            <?php	
			}
			?>
            <li><a class="leftnav" href="./<?=$page[$login]; ?>?val=slot_details">&nbsp;&nbsp;Registration Slots</a></li>
            <?php
				if($login==0)
				{
					?>
                    <li onMouseOver="document.getElementById('mymenu').style.display='block';" onMouseOut="document.getElementById('mymenu').style.display='none';"><a class="leftnav" href="#">&nbsp;&nbsp;Fee Structure <img src="./images/new2.gif"> </a></li>
          	
					<div id="mymenu" onMouseOver="document.getElementById('mymenu').style.display='block';" onMouseOut="document.getElementById('mymenu').style.display='none';"style="display:none;position:relative;left:181px;top:85px;border:1px solid #BBBBBB; background-color:white; height:70px; width:190px;">
                    <a class="leftnav" onMouseOver="this.style.color='black';this.style.fontWeight='600';" onMouseOut="this.style.color='#757575';this.style.fontWeight='400';" style="top:0px;left:0px;margin-left:-100px;text-decoration:none;padidng:5px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;cursor:pointer;color:#757575" href="Old_Fee_Structures.pdf">For Old Students</a><br>
                    	<a class="leftnav" onMouseOver="this.style.color='black';this.style.fontWeight='600';" onMouseOut="this.style.color='#757575';this.style.fontWeight='400';" style="top:0px;left:0px;margin-left:-100px;text-decoration:none;padidng:5px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;cursor:pointer;color:#757575" href="http://mnnit.ac.in/images/stories/499_Notification_for_revised_tution_fee_2.pdf?val=fee_struct">For Students 2014-15</a><br>
                     
                    <a class="leftnav" onMouseOver="this.style.color='black';this.style.fontWeight='600';" onMouseOut="this.style.color='#757575';this.style.fontWeight='400';"style="top:0px;left:0px;margin-left:-100px;text-decoration:none;padding-top:-50px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;cursor:pointer;color:#757575"href="../DR_ACAD_Consolidated_Fee_Structures.pdf?val=fee_struct">For New Students <img src="./images/new2.gif"></a>
					</div>
                    <?php
				}
				else
				{
					?>
                    
            		<li><a class="leftnav" href="./home.php?val=challanstatus">&nbsp;&nbsp;Challan Status</a></li>
                   <!--li><a class="leftnav" href="./home.php?val=evensemfee">&nbsp;&nbsp;Pay Next Sem Fee<img src="./images/new2.gif"> </a></li-->
			
                    <li onMouseOver="document.getElementById('mymenu').style.display='block';" onMouseOut="document.getElementById('mymenu').style.display='none';"><a class="leftnav" href="#">&nbsp;&nbsp;Fee Structure <img src="./images/new2.gif"> </a></li>
					<div id="mymenu" onMouseOver="document.getElementById('mymenu').style.display='block';" onMouseOut="document.getElementById('mymenu').style.display='none';"style="display:none;position:relative;left:181px;top:282px;border:1px solid #BBBBBB; background-color:white; height:70px; width:190px;">
                     <a class="leftnav" onMouseOver="this.style.color='black';this.style.fontWeight='600';" onMouseOut="this.style.color='#757575';this.style.fontWeight='400';" style="top:0px;left:0px;margin-left:-100px;text-decoration:none;padidng:5px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;cursor:pointer;color:#757575" href="Old_Fee_Structures.pdf">For Old Students</a><br>
                    	<a class="leftnav" onMouseOver="this.style.color='black';this.style.fontWeight='600';" onMouseOut="this.style.color='#757575';this.style.fontWeight='400';" style="top:0px;left:0px;margin-left:-100px;text-decoration:none;padidng:5px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;cursor:pointer;color:#757575" href="http://mnnit.ac.in/images/stories/499_Notification_for_revised_tution_fee_2.pdf?val=fee_struct">For Students 2014-15</a><br>
                    <a class="leftnav" onMouseOver="this.style.color='black';this.style.fontWeight='600';" onMouseOut="this.style.color='#757575';this.style.fontWeight='400';"style="top:0px;left:0px;margin-left:-100px;text-decoration:none;padding-top:-50px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;cursor:pointer;color:#757575"href="../DR_ACAD_Consolidated_Fee_Structures.pdf?val=fee_struct">For New Students <img src="./images/new2.gif"></a>
                    </div>
					<?php
				}
				?>      
           
           <li><a class="leftnav" href="./<?=$page[$login]; ?>?val=instructions">&nbsp;&nbsp;Instructions </a></li>
           <li><a class="leftnav" href="./<?=$page[$login]; ?>?val=feedback">&nbsp;&nbsp;Feedback</a></li>
           <li><a class="leftnav" href="./<?=$page[$login]; ?>?val=contact">&nbsp;&nbsp;Contact Us</a></li>
           <?php
		   if($login==1)
		   	echo '<li><a href="./logout.php" class="leftnav" >&nbsp;&nbsp;Logout</a></li>';
		   ?>
          </ul>
        </div>
        <?php
	}
	public function certiAmount($arr){
		switch($arr){
		case "": $amt=20;
			break;
		;
		default:0;	
		}
		//this function is incomplete
	}
}

function validate($var)
{
  return htmlentities(trim(stripslashes($var)));
}

function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}
?>