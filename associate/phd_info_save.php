<?php
session_start();
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
    $db->database = "recruitment_assistant";
$status = validate($_POST['status']);
$date = validate($_POST['date']);
$title = validate($_POST['title']);
$university = validate($_POST['university']);

$id=$_SESSION['user'];
$query="SELECT * from `phd_info` where `user_id` like '$id'";
$r = $db->process_query($query);

if(mysql_num_rows($r)>0)
{
	$q="UPDATE `phd_info` SET `status`='$status',`date`='$date',`title`='$title',`university`='$university' WHERE `user_id` = '$id'";
}
else
{
	 $q="INSERT INTO `phd_info`(`user_id`, `status`, `date`, `title`, `university`) VALUES ('$id','$status','$date','title','$university')";
}
$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=education_qual");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=phd_info");
       }
?>
