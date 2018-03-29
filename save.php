<?php
session_start();
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
 
    $id=$_SESSION['user'];
	
	
	$query="SELECT * from freeze where user_id='$id'";
	$r = $db->process_query($query);
	if(mysql_num_rows($r)>0)
	{
		$misc->palert("You cannot modify you information after you have freezed your form","home.php?val=perinfo");
	}
	
	
    if(isset($_POST['phd_ch']))
    {     	
	$status = validate($_POST['status']);
$date = validate($_POST['date']);
$title = validate($_POST['title']);
$university = validate($_POST['university']);

$id=$_SESSION['user'];
$query="SELECT * from `phd_info` where `user_id` like '$id'";
$r = $db->process_query($query);

if(mysql_num_rows($r)>0)
{
	$q="UPDATE `phd_info` SET `date`='$date',`title`='$title',`university`='$university',`status`='$status' WHERE `user_id` = '$id'";
}
else
{
	  $q="INSERT INTO `phd_info`(`user_id`, `date`, `title`, `university`,`status`) VALUES ('$id','$date','$title','$university','$status')";
}
$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=education_qual");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=phd_info");
       }
    }
    
    if(isset($_POST['per_ch']))
    {
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
$corr_address=validate($_POST['corr_address']);
$emp=validate($_POST['emp']);
$place_of_application=validate($_POST['place_of_application']);
$mobile=validate($_POST['mobile']);
$address=validate($_POST['address']);
$pwd_type=validate($_POST['pwd_type']);
$id_type=validate($_POST['id_type']);
$id_no=validate($_POST['id_no']);

$emp_code=validate($_POST['emp_code']);
$mnnit_staff=validate($_POST['mnnit_staff']);
if(strlen($mobile)!=10)
{
	$misc->palert("Enter 10 digit mobile number","home.php?val=perinfo");
}
if($mnnit_staff=='y' &&$emp_code=="")
{
	$misc->palert("Enter valid Employee ID","home.php?val=perinfo");
}
if($pwd=='y'&&$pwd_type=='NA')
{
	$misc->palert("Enter valid Type of Disability","home.php?val=perinfo");
}
//print_r($_POST['dept']);
$query="SELECT * from `user` where `user_id` like '$id'";
$r = $db->process_query($query);

if(mysql_num_rows($r)>0)
{
	 $q="delete from department where user_id = '$id'";
	$q = $db->process_query($q);
   $query="UPDATE `user` SET `post_applied`='$post_applied',`specialization`='$specialization',`dolp`='$dolp',`name`='$name',`dob`='$dob',`gender`='$gender',`category`='$category',`pwd`='$pwd',`f_name`='$f_name',`m_name`='$m_name',`marital_status`='$marital_status',`domicile`='$domicile',`nationality`='$nationality',`corr_address`='$corr_address',`place_of_application`='$place_of_application',`mobile`='$mobile',`address`='$address',`pwd_type`='$pwd_type',`id_type`='$id_type',`id_no`='$id_no',`emp_code`='$emp_code',`emp`='$emp' WHERE user_id = '$id' ";
  
}
else
{
  $query="INSERT INTO `user`(`user_id`, `post_applied`, `specialization`, `dolp`, `name`, `dob`, `gender`, `category`, `pwd`, `f_name`, `m_name`, `marital_status`, `domicile`, `nationality`, `corr_address`, `place_of_application`, `mobile`, `address`,`pwd_type`,`id_type`, `id_no`,`emp_code`,`emp`) VALUES ('$id','$post_applied','$specialization','$dolp','$name','$dob','$gender','$category','$pwd','$f_name','$m_name','$marital_status','$domicile','$nationality','$corr_address','$place_of_application','$mobile','$address','$pwd_type','$id_type','$id_no','$emp_code','$emp')";
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
    }
if(isset($_POST['edu_ch']))
{
	$degree = validate($_POST['degree']);
	$subject = validate($_POST['subject']);
	$inst_name = validate($_POST['inst_name']);
	$entry_date = validate($_POST['entry_date']);
	$complete_date = validate($_POST['complete_date']);
	$marks = validate($_POST['marks']);
	$max_marks = validate($_POST['max_marks']);
	$perc_marks = validate($_POST['perc_marks']);
	$division = validate($_POST['division']);
	$qualification = validate($_POST['qualification']);
	$board = validate($_POST['board']);


$q="INSERT INTO `education`(`user_id`, `degree`, `subject`, `inst_name`, `entry_date`, `complete_date`, `marks`, `max_marks`, `perc_marks`, `division`, `qualification`, `board`) VALUES ('$id','$degree','$subject','$inst_name','$entry_date','$complete_date','$marks','$max_marks','$perc_marks','$division','$qualification','$board')";
$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=education_qual");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=education_qual");
       }
    	
}
//test comment
if(isset($_POST['other_ch']))
{
	$exam = validate($_POST['exam']);
	$subject = validate($_POST['subject']);
	$inst_name = validate($_POST['inst_name']);
	$marks = validate($_POST['marks']);
	$max_marks = validate($_POST['max_marks']);
	$year = validate($_POST['year']);
	$division = validate($_POST['division']);
	$board = validate($_POST['board']);
	$per_marks = validate($_POST['per_marks']);
	if($exam=="")
	$exam="--";
	if($marks=="")
	$marks="--";
	if($max_marks=="")
	$max_marks="--";
	if($per_marks=="")
	$per_marks="--";



$q="INSERT INTO `other_academic`(`user_id`,`exam`, `subject`, `inst_name`, `board`, `marks`, `max_marks`, `year`, `division`,`per_marks`) VALUES ('$id','$exam','$subject','$inst_name','$board','$marks','$max_marks','$year','$division','$per_marks')";
$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=other_acads");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=other_acads");
       }
    	
}
if(isset($_POST['emp_ch']))
    {
 $position=validate($_POST['position']);
 $from=validate($_POST['from']);
 $to=validate($_POST['to']);
 $pay=validate($_POST['pay']);
 $agp=validate($_POST['agp']);
 $basic_pay=validate($_POST['basic_pay']);
 $nature=validate($_POST['nature']);
 $organisation=validate($_POST['organisation']);
 $emp_type=validate($_POST['emp_type']);


$id=$_SESSION['user'];
$query="SELECT * from `employer` where `user_id` like '$id'";
$r = $db->process_query($query);

if(mysql_num_rows($r)>0)
{
	$q="UPDATE `employer` SET `position`='$position',`from`='$from',`to`='$to',`pay`='$pay',`agp`='$agp',`basic_pay`='$basic_pay',`nature`='$nature',`organisation`='$organisation',`emp_type`='$emp_type' WHERE user_id = '$id'";
}
else
{
	 $q="INSERT INTO `employer`(`user_id`, `position`, `from`, `to`, `pay`, `agp`, `basic_pay`, `nature`, `organisation`, `emp_type`) VALUES ('$id','$position','$from','$to','$pay','$agp','$basic_pay','$nature','$organisation','$emp_type')";
}
$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=tech_exp");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=education_qual");
       }
    }
    if(isset($_POST['teach_ch']))
{
	$organisation=validate($_POST['organisation']);
	$position=validate($_POST['position']);
	$from=validate($_POST['from']);
	$to=validate($_POST['to']);
	$year=validate($_POST['year']);
	$pay=validate($_POST['pay']);
	
	$emp_type=validate($_POST['emp_type']);
		$month=validate($_POST['month']);


$q="INSERT INTO `teaching`(`user_id`,`organisation`, `position`, `from`, `to`, `month`, `pay`, `emp_type`,`year`) VALUES ('$id','$organisation','$position','$from','$to','$month','$pay','$emp_type','$year')";

$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=tech_exp");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=tech_exp");
       }
    	
}
if(isset($_POST['research']))
{
	$organisation=validate($_POST['organisation']);
	$position=validate($_POST['position']);
	$from=validate($_POST['from']);
	$to=validate($_POST['to']);
	$month=validate($_POST['month']);
	$salary=validate($_POST['salary']);
	$nature=validate($_POST['nature']);
	$year=validate($_POST['year']);
	


$q="INSERT INTO `research`(`user_id`, `organisation`, `position`, `from`, `to`, `month`, `salary`, `nature`,`year`) VALUES ('$id','$organisation','$position','$from','$to','$month','$salary','$nature','$year')";

$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=research");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=research");
       }
    	
}
if(isset($_POST['industry']))
{
	$organisation=validate($_POST['organisation']);
	$position=validate($_POST['position']);
	$from=validate($_POST['from']);
	$to=validate($_POST['to']);
	$pay=validate($_POST['pay']);
	$nature=validate($_POST['nature']);
	$emp_type=validate($_POST['emp_type']);
	
	


$q="INSERT INTO `industrial`(`user_id`, `organisation`, `position`, `emp_type`, `from`, `to`, `pay`, `nature`) VALUES ('$id','$organisation','$position','$emp_type','$from','$to','$pay','$nature')";

$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=industry");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=industry");
       }
    	
}
if(isset($_POST['reference']))
{
	$city="--";
	$pincode="--";
	$mobile="--";
	$name=validate($_POST['name']);
	$designation=validate($_POST['designation']);
	$address=validate($_POST['address']);
	if(isset($_POST['city']))
	$city=validate($_POST['city']);
	if(isset($_POST['pincode']))
	$pincode=validate($_POST['pincode']);
	if(isset($_POST['mobile']))
	$mobile=validate($_POST['mobile']);
	$email=validate($_POST['email']);
	if(strlen($mobile)!=10)
{
	$misc->palert("Enter 10 digit mobile number","home.php?val=reference");
}

if(isset($pincode)&&strlen($pincode)!=6)
{
	$misc->palert("Enter 6 digit Pin Code","home.php?val=reference");
}
	$q="Select * from reference where user_id='$id'";
	$r=$db->process_query($q);
     if(mysql_num_rows($r)==2){
		  $misc->palert("Only 2 references can be submitted","home.php?val=reference");
	 }

$q="INSERT INTO `reference`( `user_id`, `name`, `designation`, `address`, `city`, `pincode`, `mobile`, `email`) VALUES ('$id','$name','$designation','$address','$city','$pincode','$mobile','$email')";

$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=reference");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=reference");
       }
    	
}
if(isset($_POST['info_pg']))
    {
 $info=validate($_POST['info']);
$id=$_SESSION['user'];
$query="SELECT * from `other_info` where `user_id` like '$id'";
$r = $db->process_query($query);
if(strlen($info)>500)
{
	$misc->palert("Only 500 characters allowed","home.php?val=info");
}
if(mysql_num_rows($r)>0)
{
	$q="UPDATE `other_info` SET `info`='$info' WHERE user_id = '$id'";
}
else
{
	 $q="INSERT INTO `other_info`(`user_id`, `info`) VALUES ('$id','$info')";
}
$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=other_info");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=other_info");
       }
    }
	
?>