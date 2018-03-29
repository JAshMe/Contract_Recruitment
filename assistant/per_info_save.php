<?php
session_start();
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
    $db->database = "recruitment_assistant";

$id=$_SESSION['user'];
$post_applied=validate($_POST['post_applied']);
$specialization=validate($_POST['specialization']);
$dolp=validate($_POST['dolp']);
$name=validate($_POST['name']);
$dob=validate($_POST['dob']);
$gender=validate($_POST['gender']);
$category=validate($_POST['category']);
$pwd=validate($_POST['pwd']);
$f_name=validate($_POST['f_name']);
$m_name=validate($_POST['m_name']);
$marital_status=validate($_POST['marital_status']);
$domicile=validate($_POST['domicile']);
$nationality=validate($_POST['nationality']);
$minority_status=validate($_POST['minority_status']);
$no_of_attempts=validate($_POST['no_of_attempts']);
$place_of_application=validate($_POST['place_of_application']);
$mobile=validate($_POST['mobile']);
$address=validate($_POST['address']);
//print_r($_POST['dept']);
$query="SELECT * from `user` where `user_id` like '$id'";
$r = $db->process_query($query);

if(mysql_num_rows($r)>0)
{
	 $q="delete from department where user_id = '$id'";
	$q = $db->process_query($q);
   $query="UPDATE `user` SET `post_applied`='$post_applied',`specialization`='$specialization',`dolp`='$dolp',`name`='$name',`dob`='$dob',`gender`='$gender',`category`='$category',`pwd`='$pwd',`f_name`='$f_name',`m_name`='$m_name',`marital_status`='$marital_status',`domicile`='$domicile',`nationality`='$nationality',`minority_status`='$minority_status',`no_of_attempts`='$no_of_attempts',`place_of_application`='$place_of_application',`mobile`='$mobile',`address`='$address' WHERE user_id = '$id' ";
  
}
else
{
  $query="INSERT INTO `user`(`user_id`, `post_applied`, `specialization`, `dolp`, `name`, `dob`, `gender`, `category`, `pwd`, `f_name`, `m_name`, `marital_status`, `domicile`, `nationality`, `minority_status`, `no_of_attempts`, `place_of_application`, `mobile`, `address`) VALUES ('$id','$post_applied','$specialization','$dolp','$name','$dob','$gender','$category','$pwd','$f_name','$m_name','$marital_status','$domicile','$nationality','$marital_status','$no_of_attempts','$place_of_application','$mobile','$address')";
}
$r=$db->process_query($query);
foreach ($_POST['dept'] as $dep) {
	echo $q="INSERT INTO `department`(`user_id`, `dept`) VALUES ('$id','$dep')";
	$q = $db->process_query($q);
}

if($r){
                $misc->palert("Details Submitted","home.php?val=image");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=perinfo");
       }
     
?>