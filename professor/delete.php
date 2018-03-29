<?php
session_start();
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   
    $id=$_SESSION['user'];
    $tmp_id = $_GET['id'];
    if($_GET['page']=='other_acads')
    {
    	 $q="delete from other_academic where id = '$tmp_id'";
		$q = $db->process_query($q);
		if($q)
		{
			$misc->palert("Deleted successfully","home.php?val=other_acads");
		}
		else
		{
			$misc->palert("Some error occured","home.php?val=other_acads");
		}
    }
    if($_GET['page']=='education_qual')
    {
    	 $q="delete from education where id = '$tmp_id'";
		$q = $db->process_query($q);
		if($q)
		{
			$misc->palert("Deleted successfully","home.php?val=education_qual");
		}
		else
		{
			$misc->palert("Some error occured","home.php?val=education_qual");
		}
    }
    if($_GET['page']=='tech_exp')
    {
    	 $q="delete from teaching where id = '$tmp_id'";
		$q = $db->process_query($q);
		if($q)
		{
			$misc->palert("Deleted successfully","home.php?val=tech_exp");
		}
		else
		{
			$misc->palert("Some error occured","home.php?val=tech_exp");
		}
    }
    if($_GET['page']=='research')
    {
    	 $q="delete from research where id = '$tmp_id'";
		$q = $db->process_query($q);
		if($q)
		{
			$misc->palert("Deleted successfully","home.php?val=research");
		}
		else
		{
			$misc->palert("Some error occured","home.php?val=research");
		}
    }
    if($_GET['page']=='industry')
    {
    	 $q="delete from industrial where id = '$tmp_id'";
		$q = $db->process_query($q);
		if($q)
		{
			$misc->palert("Deleted successfully","home.php?val=industry");
		}
		else
		{
			$misc->palert("Some error occured","home.php?val=industry");
		}
    }
	if($_GET['page']=='reference')
    {
    	 $q="delete from reference where id = '$tmp_id'";
		$q = $db->process_query($q);
		if($q)
		{
			$misc->palert("Deleted successfully","home.php?val=reference");
		}
		else
		{
			$misc->palert("Some error occured","home.php?val=reference");
		}
    }
 ?>