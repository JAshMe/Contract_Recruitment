<?php
session_start();
require_once ('./included_classes/class_sql.php');
require_once ('./included_classes/class_user.php');
require_once ('./included_classes/class_misc.php');
if(!isset($_SESSION['user']))
{
  echo"<script>alert('Login first');</script>";
  header("location:index.php");
}
$name="";
$dob="";
$mobile="";
$category="";
$pwd="";
$no=0;
$emp="";
$emp_code="";
$misc= new miscfunctions();
$db = new sqlfunctions();
 $id=$_SESSION['user'];
    $query="SELECT * from `department` where `user_id` like '$id'";
    $r = $db->process_query($query);
	$no = mysql_num_rows($r);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter Department(s)","home.php?val=perinfo");
	}
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
	$query="SELECT * from `phd_info` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter your PhD Information","home.php?val=phd_info");
	}
	$query="SELECT * from `education` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter your Academic Information","home.php?val=education_qual");
	}
	/*$query="SELECT * from `other_academic` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter your Other Academic Information","home.php?val=other_acads");
	}*/
	$query="SELECT * from `employer` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter information about your present employer","home.php?val=present_emp");
	}
	$query="SELECT * from `teaching` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter information about your teaching experience","home.php?val=tech_exp");
	}
	$query="SELECT * from `research` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter information about your research experience","home.php?val=research");
	}
	$query="SELECT * from `industrial` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter information about your industrial experience","home.php?val=industry");
	}
	$query="SELECT * from `points` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter your Total Credit Points","home.php?val=points");
	}
	$query="SELECT * from `reference` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
    {
     $misc->palert("Please enter information about your reference(s)","home.php?val=reference");
	}
	
	$targetDir="./photos";
	$imageName=$_SESSION['user'].'.'."JPG";
	$newName=$targetDir."/".$imageName;
	if (!file_exists($newName))
	{
		$misc->palert("Please upload you photos","home.php?val=image");
	}
	$targetDir="./photos";
	$imageName=$_SESSION['user'].'_2.'."JPG";
	$newName=$targetDir."/".$imageName;
	if (!file_exists($newName))
	{
		$misc->palert("Please upload you signature","home.php?val=image");
	}
	$targetDir="./CreditSheets";
	$imageName=$_SESSION['user'].'.'."DOCX";
	$newName=$targetDir."/".$imageName;
	if (!file_exists($newName))
	{
		$misc->palert("Please upload you Credit Calculation Sheet","home.php?val=points");
	}
	$targetDir="./CreditSheets";
	$imageName=$_SESSION['user'].'_2.'."DOCX";
	$newName=$targetDir."/".$imageName;
	if (!file_exists($newName))
	{
		$misc->palert("Please upload you Credit Detail Sheet","home.php?val=points");
	}
	
	
	$q="Select * from reference where user_id='$id'";
	$r=$db->process_query($q);
     if(mysql_num_rows($r)!=2){
		  $misc->palert("You need to give 2 references","home.php?val=reference");
	 }
	 
	 
	 
	$query="SELECT * from `freeze` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)==0)
	{
	 $query="INSERT INTO `freeze`(`user_id`) VALUES ('$id')";
	 $r = $db->process_query($query);
	}
	
	
	 
	//********************Payment integration*********************************
	$_SESSION['regno']='$id';
	$amt=500;
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
	$amt=$amt*$no;
	if($amt==0)
	{
		$_SESSION['amt']=0;
		header('location:home.php?val=print');
		die();
	}
	$_SESSION['amt'] = $amt;
	$ar= array('appid' => $_SESSION['user'],'name' =>$name,'dob' => $dob,'contact' => $mobile,'prog' =>'NA','bra' => 'NA','amt' => $amt, 'sourcefee'=>'recruitment','semester'=>'0','session'=>'2018');
         $_SESSION['admission_alldata']=json_encode($ar);
		 header('location:../../admissionfee.php');
		 //die($amt);
?>
