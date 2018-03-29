<?php

function redirect( $tourl ) 
{
		echo '<script language="javascript">';	
		echo	"window.location.href= \"$tourl\"  ";
       	echo	'</script>';
		
}
function logout($tourl)
{
        session_unset();
		session_destroy();
		redirect( $tourl );
}

function check_logged_in($tourl)
{
	if( !isset($_SESSION['cntr']) )
		{
			$session_error = "<span class=\"error-style\">Please Login First !!</span> ";
			$_SESSION['session_error'] = $session_error;

			redirect($tourl);
			exit();
		}

		
}

function palert($message,$tourl)
{
      echo "<script>
      alert( \"$message\" );
      </script>";
         redirect($tourl);
}
function alert($message)
{
      echo "<script>
      alert( \"$message\" );
      </script>";
}

function get_regno($rollno,$connection)
{
	
	/**********************************************************************************************************************************
	
	
	
$year = get_val($connection, $database, "value", "code_map", "code", "year"); 
	
	$brcd = get_val($connection, $database, "brcd", "allotment", "rollno", $roll);
	$bra = get_val($connection, $database, "abbrnm", "branch_map", "brcd", $brcd);	

	$bra_code = get_val($connection, $database, "bra_code", "code_map", "value", $bra);

	$regno = $year . $bra_code;
	
	//**********************Locking the table************
	
	$query_lock_write = "LOCK TABLES regno_map_roll WRITE ";
	$lock_result = query_process( $connection , $query_lock_write , $database , 1);
	if( ! $lock_result )
		palert("Error - Try Again(Locking Failed)" , "./per_info.php" );

	$match_query = "SELECT count(*) as num FROM regno_map_roll WHERE regno LIKE \"$regno%\"";

	$match_res = query_process($connection , $match_query , $database , 1 );
	$match_field = fetch_field($match_res);
	$matches = $match_field['num'];
	
	$new = $matches + 1;
	
	if( $new >= 100 )
			$full  = $new;
			
	if( $new < 10)
			$full =  "00" . $new;
	else if( $new >= 10 && $new <100) 
		$full .=  "0" . $new;

	$regno .= $full;

	$insert_query = "INSERT INTO regno_map_roll VALUES (\"$regno\" , \"$roll\" )";
	$insert_res = query_process($connection , $insert_query , $database, 3);
	
	//*****************Unlocking Table******************
	$query_unlock = "UNLOCK TABLES";
	$unlock_result = query_process( $connection , $query_unlock , $database , 1);
	
	return($regno);
**********************************************************************************************/
 
	
	$table="allotment";
	
	//echo $table."dsfsfdf";
$regno=$connection->get_value("regno","regno_map_roll","roll",$rollno);
         if($regno!=""){
			 		echo "Already exists";
                  return $regno;
             }

	$brcd = $connection->get_value("brcd", $table, "roll", $rollno);
	
	$prog =$connection->get_value("prog", $table, "roll", $rollno);
  $prog;
	if(!$brcd){
	    $brcd = $connection->get_value("brcd", $table, "roll", $rollno);
	$brcd=trim($brcd);
      }
	if(!$prog)
	$prog="bt";
	$bra_code = $connection->get_value("branch_text", "regno_details", "branch", $brcd);	
	$bra_num = $connection->get_value("bra_code", "code_map", "code", $bra_code); // eg 4,3
	//$bra_code=get_val($connection, "fresh_reg", "code", "code_map", "value", $bra); // eg cs , el 
	//echo $bra_num."aaaa";
	$connection->begin_transaction();
	$getsql="select * from regno_details where branch=\"$brcd\" and prog like \"$prog\" ";
	 $getsql;
	$getq=$connection->query($getsql) or die('Error reg1');
	
	$array=$getq->fetch_array();
	//print_r($array);
	 $last=$array['last_index'];
	 $text=$array['branch_text'];
	
	
	$last++;
	 $last;
   $curr_year=$connection->get_value("value","code_map","code","year");   //culprit is here
	$code=$connection->get_value("value","code_map","code","year");
	$lock_sql="LOCK TABLES regno_details WRITE";
	$lock_q=$connection->query($lock_sql);
	 $prog."and ".$brcd;
	if((!$prog) ||( !$brcd))
	{
		echo "Incorrect Program or Branch";
		return NULL;
		
	}
	if($prog=="bt")
	{
		/*if($last<10)
			$regno=$curr_year.$bra_num."00".$last;
		else if($last>=10 && $last<100)
			$regno=$curr_year.$bra_num."0".$last;
		else if($last>=100)*/
			$regno=$curr_year.$bra_num.sprintf("%03s",$last);
	}
	else
	{
		/*if($last<10)
		{
			$regno=$curr_year.$text."0".$last;
		}
		else*/
			$regno=$curr_year.$text.sprintf("%02s",$last);;
			//echo "here $regno"; 
	}
	$regno=strtoupper($regno);
	$unlock_sql="UNLOCK TABLES";
	$unlock_q=$connection->query($unlock_sql);
	$up_sql="update regno_details set last_index=\"$last\" where prog=\"$prog\" and branch=\"$brcd\"";
	//echo $up_sql;
	$up_q=$connection->query($up_sql);
	
	$ins_sql="insert into regno_map_roll values(\"$regno\",\"$rollno\")";
	//echo $ins_sql;
	$ins_q=$connection->query($ins_sql);
	if(!$ins_q)
	    echo "Regno already exists";
		
	if($getsql && $lock_q && $unlock_q && $up_q && $ins_q)	//all transaction stmts succesful :)
		$connection->commit();
	else
		$connection->rollback();
	
        return($regno);
		
}
	
function get_pagination($pgname)
{
	//session_start();
	$_SESSION['fr_prog']=isset($_SESSION['fr_prog'])?$_SESSION['fr_prog']:'bt';
	$_SESSION['fr_quota']=isset($_SESSION['fr_quota'])?$_SESSION['fr_quota']:'os';
	if($_SESSION['fr_prog']=='bt')
	{
		//if($_SESSION['fr_quota']=='dasa')
			$pgs=array("index.php","get_det.php","adm_frm.php","activity.php","activity2.php","regno.php","payment.php","print_forms.php");
		//else
			//$pgs=array("index.php","get_det.php","adm_frm.php","activity.php","activity2.php","regno.php","print_forms.php");
	}
	else
	{
		//if($_SESSION['fr_quota']=='qip')
			$pgs=array("index.php","get_det.php","adm_frm.php","regno.php","payment.php","print_forms.php");
		//else
			//$pgs=array("index.php","get_det.php","adm_frm.php","regno.php","print_forms.php");
	}
	
	$i=0;
	$in=array_search($pgname,$pgs);
	
	?>
    <div align="center">
    <nav>
      <ul class="pagination">
        <li <?php if($in==0) echo 'class="disabled"'; ?>>
          <?php if($in==0) echo '<a href="#" aria-label="Previous">';else echo '<a href="'.$pgs[$in-1].'" aria-label="Previous">'; ?>
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
		<?php foreach ($pgs as $k )
		{$i++; ?>
        <li <?php echo (($i-1)==$in)?"class='active'":""?>><a href="<?php echo $k ?>" ><?php echo $i ;?></a></li>
        <?php } ?>
        <li <?php if($in==(sizeof($pgs)-1)) echo 'class="disabled"'; ?>>
          <?php if($in==(sizeof($pgs)-1)) echo '<a href="#" aria-label="Next">';else echo '<a href="'.$pgs[$in+1].'" aria-label="Next">'; ?>
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    </li>
    <?php
}
function get_header()
{
	?>
  <div style="margin-top:0px; overflow:hidden;;" class="page-header">
    <div class="row">
       <div class="col-sm-2" align="center" >
            <img  src="images/logo-MNNIT.png" height="120px;" width="100px;" />
            </div>
           <div class="col-sm-8" align="center" >
            	<h3 align="center" >MOTILAL NEHRU NATIONAL INSTITUTE OF
               	TECHNOLOGY<br />
               	 ALLAHABAD</h3>
           </div>
        </div>
   </div>

    <?php
}
function get_side_menu()
{
	?>
    <div class="panel panel-info">
    	<div class="panel-heading" align="center"><b> Academics</b>
        </div>
        <div class="panel-body side">
        	<div class="navbar">
            	<div class="navbar-inner">
                	<ul class="nav">
                    <table class="table">
                    	<tr><td><li>
                        	<a href="index.php" style="color:#2F8196" >Home</a>
                        </li></td></tr>
                 <tr><td>       <li>
                        	<a href="get_det.php" style="color:#2F8196" >Academic Details</a>
                        </li></td></tr>
                    <tr><td>    <li>
                        	<a href="adm_frm.php" style="color:#2F8196" >Personal Details</a>
                        </li></td></tr>
                        <?php ?>
                       <tr><td> <li>
                        	<a href="regno.php" style="color:#2F8196" >Registration Details</a>
                        </li></td></tr>
                        <?php
							if(($_SESSION['fr_prog']=='bt'&&$_SESSION['fr_quota']=='dasa')||$_SESSION['fr_quota']=='qip')
							{
								?>
                                <tr><td> <li>
                                    <a href="payment.php" style="color:#2F8196" >Payment Details</a>
                                </li></td></tr>
								<?php
							}
								
						?>
                    <tr><td>    <li>
                        	<a href="print_forms.php" style="color:#2F8196" > Print Forms</a>
                        </li></td></tr>
                    <tr><td align="center" style="color:#2F8196" >  
                    <a href="logout.php"><button class="btn btn-info" id="logout"> Logout</button></a>
                      </td></tr>    
                        
                        </table>
                    </ul>                	
                </div>
            </div>
            
        </div>
    
    </div>
    
    
    
    <?php
}
function get_updates()
{	
		//echo "hello12";
		$sql1="SELECT * FROM updates WHERE display LIKE 'y' ORDER BY pref DESC";
		//echo "hello13";
		$con=new sqlfunctions();
		//echo "hello1";
		//$con=sql_connect_m();
		$con->connect_db("fresh_reg_new");
		$res=$con->query($sql1) or die('Error up1');
		
		?>
        <div class="panel panel-info">
            <div class="panel-heading" align="center"><b> News &amp; Updates</b></div>
            
            <div class="panel-body side">
            	<div class="navbar">
                	<div class="navbar-inner">
                    	<ul class="nav">
                        	<table class="table">
                        	<script>
															</script>
							<?php
                                while($row=mysqli_fetch_array($res))
                                {
									
                                    ?>
                                    
                                    <tr><td>	<li><p align="left"> <b style="color:#04622C">  <?= $row['title'] ?>  </b></p>
                                        <small style="float:right;color:red"><?= $row['date'] ?></small><br>
                                        <p align="left"><?= $row['text'] ?></p>                                        
                                        </li></td></tr>
                                    <?php
                                }
                            ?>
                            </table>
                         </ul>
                   </div>
				</div>
    		 </div>
		</div>
 
 <?php	
		
}
function get_fees($prog,$cat,$acd)
{
	$sql=new sqlfunctions();
	$sql->select_db("fresh_reg_new");
	$query="SELECT fees FROM dd_details WHERE prog='$prog' and acd='$acd' and cat='$cat'";
	$res=$sql->query($query) or die('Error fee1');
	$row=mysqli_fetch_array($res);
	return $row[0];
}

function get_footer()
{
	?>
    <footer class="footer">
      <div class="container">
        <p class="text-muted" align="center">  Copyright © MNNIT Allahabad. All rights reserved.
<br> For Suggestions and Feedback please contact academics@mnnit.ac.in
<br> Designed by Webteam,DEAN (ACADEMICS) </p>
      </div>
    </footer>
    <?php	
	
}
/*
function get_dues($roll){
	$url=$_SERVER["PHP_SELF"];
	include_once('include/sql_func.php');
	include_once('include/sql_functions.php');
	$connection=new sqlfunctions();
	$err_connection=sql_connect_m();
	$connection->connect_db("mba_fresh");
	$query="SELECT `cat` FROM per_info WHERE roll=?";
	if(!($res=$connection->prepare($query)))
	{
		log_error($err_connection,$url,$query,$res,1);
		$connection->close();
		redirect("error_page.html");
	}
	if(!($res->bind_param("s",$roll)))
	{
		log_error($err_connection,$url,$query,$res,2);
		$connection->close();
		redirect("error_page.html");
	}
	$roll=$_SESSION['roll'];
	if($res->execute())
	{
		$res->store_result();
		$res->bind_result($cat);
		$res->fetch();
	}
	else
	{	
		log_error($err_connection,$url,$query,$res,3);
		$connection->close();
		redirect("error_page.html");	
	}
	$cat = strtoupper($cat);
	if($cat=='SC' || $cat=='ST')
		$cat=2;
	else
		$cat=1;
	$query="SELECT `fee` FROM formfeesnew WHERE val=?";
	if(!($res=$connection->prepare($query)))
	{
		log_error($err_connection,$url,$query,$res,1);
		$connection->close();
		redirect("error_page.html");
	}
	if(!($res->bind_param("s",$cat)))
	{
		log_error($err_connection,$url,$query,$res,2);
		$connection->close();
		redirect("error_page.html");
	}
	$roll=$_SESSION['roll'];
	if($res->execute())
	{
		$res->store_result();
		$res->bind_result($amt);
		$res->fetch();
	}
	else
	{	
		log_error($err_connection,$url,$query,$res,3);
		$connection->close();
		redirect("error_page.html");	
	}
	$sem = 0;
	$session=2017;
	$query="SELECT regno,sum(amount),GROUP_CONCAT(refno SEPARATOR ' | '),GROUP_CONCAT(`transaction_id` SEPARATOR ' | '),GROUP_CONCAT(`date_recv` SEPARATOR ' | ') FROM `fees`.`bank_detail` WHERE purpose like 'application' and sem='$sem' and `status` like 'success'  and session='$session' and regno=? GROUP BY regno";
	if(!($res3=$connection->prepare($query)))
	{
		log_error($err_connection,$url,$query,$res3,1);
		$connection->close();
		redirect("error_page.html");
	}
	if(!($res3->bind_param("s",$roll)))
	{
		log_error($err_connection,$url,$query,$res3,2);
		$connection->close();
		redirect("error_page.html");
	}
	if($res3->execute())
	{
		$res3->store_result();
		if($res3->num_rows==0)
		{
			$paid=0;
			$refno='';
			$tranid='';
			$dateoftran='';
		}
		else
		{
			$res3->bind_result($x,$paid,$refno,$tranid,$dateoftran);
			$res3->fetch();
		}
		$connection->close();
	}
	$remain=$amt-$paid;
	$ret=array("amount" => $amt,"paid"=>$paid,"due"=>$remain,"transid"=>$tranid,"refno"=>$refno);
	return ret;
	
}
*/
?>
                    