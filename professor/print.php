<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
	$id=$_SESSION['user'];
    $query="SELECT * from `points` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)>0)
    {
     $r = $db->fetch_rows($r);
    $points = validate($r['points']);
    
	}
	$query="SELECT * from `freeze` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0){
		$misc->palert("Confirm to print form!!","home.php?val=payment");	
		die();
	}
	
	$query="SELECT * from `user` where `user_id` like '$id'";
	$r = $db->process_query($query);
	if(mysql_num_rows($r)>0)
	{
		$r = $db->fetch_rows($r);
		$category=validate($r['category']);
		$emp=validate($r['emp']);
		$emp_code=validate($r['emp_code']);
	}
	$amt=1;
	if($category=='ST'||$category=='SC'||$pwd=='y')
		$amt=0;
	if($emp=='y'&&$emp_code!="")
	{
		$query="SELECT * FROM `emp` WHERE emp_code='$emp_code'";
		$r = $db->process_query($query);
		if(mysql_num_rows($r)!=0)
		{
		 $amt=0;
		}
	}
	$fee = new sqlfunctions();
	$fee->database="fees";
	if($amt>0)
	{
		$query="SELECT * from `bank_detail` where `regno` like '$id' and status like 'Success' and purpose like 'Recruitment'";
		$c = $fee->process_query($query);
		if(mysql_num_rows($c)==0)
		{
			$misc->palert("Pay fees to print form!!","home.php?val=payment");	
			die();
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Documents</title>
<style>
.login {
  display:none;
}
#loginbox{
  display:none;
  text-align:center;
  margin:65px 7px -25px 5px;
  padding:25px 5px 15px 55px;
  background:#fff;
  color:#b22d00;
  -moz-border-radius:6px;
  -webkit-border-radius:6px;
}
.submit{
  height:20px;
  width:80px;
}
</style>
</head>

<body>
<div id="main" style="font-size:13px; margin:0px 0 0 0;" align="justify">
  <center><b style="font-size:18px;">Print</b></center>
<hr>

<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>
<form class="form-horizontal" name="phd_frm" method="post" action="upload_points.php" enctype="multipart/form-data">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Print</h3>
        <hr>
		<h3 style="color:#E53935"><b>NOTE: </b> All the 3 forms, must be attached together with proper signature.</h3>
        
        <ol>
        	<li><a href="printform.php" target="_blank" style="font-size:18px">Application Form</a></li>
        	<li><a href="CreditSheets/<?=$_SESSION['user']?>.DOCX" style="font-size:18px">Credit Calulation Sheet</a></li>
            <li><a href="CreditSheets/<?=$_SESSION['user']?>_2.DOCX" style="font-size:18px">Credit Detail Sheet</a></li>
        </ol>
		
</div>
</body>
</html>    