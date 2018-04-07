<?php
	session_start();
	require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();

    if(!isset($_SESSION['verdict'])||$_SESSION['verdict']!="delete")
    die("<h3>Unauthorized Access!!</h3>");

    $id=$_SESSION['user'];

    $q="update `final_apply` set pos";
    $q2="=0 where user_id='$id'";
    
    if(isset($_GET['type'])&&$_GET['type']=='1')
    {
        $q=$q.'1'.$q2;
    }
    if(isset($_GET['type'])&&$_GET['type']=='2')
    {
        $q=$q.'2'.$q2;
    }
    if(isset($_GET['type'])&&$_GET['type']=='3')
    {
        $q=$q.'3'.$q2;
    }
    if(isset($_GET['type'])&&$_GET['type']=='4')
    {
        $q=$q.'4'.$q2;
    }
    if(isset($_GET['type'])&&$_GET['type']=='5')
    {
        $q=$q.'5'.$q2;
    }
    if(isset($_GET['type'])&&$_GET['type']=='6')
    {
        $q=$q.'6'.$q2;
    }
    if(isset($_GET['type'])&&$_GET['type']=='7')
    {
        $q=$q.'7'.$q2;
    }
    $q = $db->process_query($q);
    if($q)
    {
        $filename=$id."_".$_GET['type'].".pdf";
        unlink("./applications/".$filename);
        unlink("./final_app/$filename");
        $misc->palert("Withdrawn Successfully","home.php?val=withdraw");
    }
    else
    {
        $misc->palert("Some error occured","home.php?val=withdraw");
    }
?>