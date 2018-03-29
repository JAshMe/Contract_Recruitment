<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   $id=$_SESSION['user'];
   $category="";
   $pwd="";
   $emp="";
$emp_code="";
   $query="SELECT * from `department` where `user_id` like '$id'";
    $r = $db->process_query($query);
	$no = mysql_num_rows($r);
   $query="SELECT * from `user` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter your Personal Information","home.php?val=perinfo");
	}
	else
	{
		$r = $db->fetch_rows($r);
		$mobile=validate($r['mobile']);
		$name=validate($r['name']);
		$dob=validate($r['dob']);
		 $category=validate($r['category']);
		 $pwd=validate($r['pwd']);
		 $emp_code=validate($r['emp_code']);
		$emp=validate($r['emp']);
	}
	$amt=500;
	
	
	if($emp=='y'&&$emp_code!="")
	{
	$query="SELECT * FROM `emp` WHERE emp_code='$emp_code'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)!=0)
    {
     $amt=0;
	}
	}
	
	
	if($category=='ST'||$category=='SC'||$pwd=='y')
	{$amt=0;}
	$amt=$amt*$no;
    
    //$db->database = "fees";

?>
<script>
function check(){
						var a=confirm('Click YES to freeze your form and procced to payment else click CANCEL.');
						if (a)
							document.location.href='pay.php';
						else
							document.location.href='home.php?val=perinfo';
}
                        </script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment</title>
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
  <center><b style="font-size:18px;">Confirm &amp; Pay</b></center>
<hr>

<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>

<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Confirm &amp; Pay</h3>
        <hr>
        <h4 style="color:#E53935"><b>Note: </b>You won't be able to edit any details, after payment.</h4>
        <center><h2 style="color:#388E3C;">Your fees is &#8377; <?php echo $amt; ?></h2></center>
        <?php
		 $q="SELECT * from fees.bank_detail where regno like '$id' and purpose='Recruitment' and sem='0' and (status='Pending' or status ='Success')";
		 $r = $db->process_query($q);
		
if(mysql_num_rows($r)>0)
{
	$_SESSION['regno']=$id;
	 $r = $db->fetch_rows($r);
	 $link = "<a href=\"../../printreceiptadm.php?refno=$r[refno]\">$r[refno]</a>";
     echo "<center><h4>Your fee status : ".$r['status'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaction Id: ".$link."</h4></center>";
}
else
{
       echo "<center><button class='btn btn-primary' onClick='check()'>Confirm &amp; Pay</button></center>";
}

		?>
       </div>
</div>
		
</div>
</body>
</html>    