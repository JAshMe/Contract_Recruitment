<?php
	require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
	$id=$_SESSION['user'];
	$query="SELECT * from `final_apply` where `user_id` like '$id'";
   	$c = $db->process_query($query);
   	global $pos1,$pos2,$pos3,$pos4,$pos5,$pos6,$pos7;
   	while(($r = $db->fetch_rows($c)))
    {
  		$pos1=validate($r['pos1']);
  		$pos2=validate($r['pos2']);
  		$pos3=validate($r['pos3']);
  		$pos4=validate($r['pos4']);
  		$pos5=validate($r['pos5']);
  		$pos6=validate($r['pos6']);
  		$pos7=validate($r['pos7']);
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Documents</title>
</head>

<body>

<!-- <?php
	echo "$id";
	echo "$pos1 $pos2 $pos3 $pos4 $pos5 $pos6 $pos7";
?> -->
<p align="justify" class="larger-font"> 

<form class="form-horizontal" name="phd_frm" method="post" action="upload_points.php" enctype="multipart/form-data">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Print</h3>
        <hr>
        <ul>
            <?php if($pos1==1) echo"<li><a href="."printform.php"." target="."_blank"." style="."
            font-size:18px;".">Application Form for Project Supervisor [Junior Engineer-Civil/ Electrical]</a></li>"; ?>
            <?php if($pos2==1) echo"<li><a href="."printform.php"." target="."_blank"." style="."
            font-size:18px;".">Application Form for Executive in Executive Development Centre</a></li>"; ?>
            <?php if($pos3==1) echo"<li><a href="."printform.php"." target="."_blank"." style="."
            font-size:18px;".">Application Form for Office Assistant in EDC</a></li>"; ?>
            <?php if($pos4==1) echo"<li><a href="."printform.php"." target="."_blank"." style="."
            font-size:18px;".">Application Form for Technical Manpower for Clinical Diagnostics and Pathological Studies</a></li>"; ?>
            <?php if($pos5==1) echo"<li><a href="."printform.php"." target="."_blank"." style="."
            font-size:18px;".">Application Form for Lab Assistant [for CMDR]</a></li>"; ?>
            <?php if($pos6==1) echo"<li><a href="."printform.php"." target="."_blank"." style="."
            font-size:18px;".">Application Form for Technical Officer [Centre for Interdisciplinary Research (CIR)]</a></li>"; ?>
            <?php if($pos7==1) echo"<li><a href="."printform.php"." target="."_blank"." style="."
            font-size:18px;".">Application Form for Technical Manpower [Centre for Interdisciplinary Research (CIR)]</a></li>"; ?>
        </ul>
</div>
<?php
	if($pos1==0&&$pos2==0&&$pos3==0&&$pos4==0&&$pos5==0&&$pos6==0&&$pos7==0)
	{
		echo '<p align="justify" class="larger-font text-danger"> 
	You have not applied for any post.
    <br>Please apply for posts <a href="./home.php?val=app_post">Here</a>
</p>';
	}
?>
</body>
</html>    