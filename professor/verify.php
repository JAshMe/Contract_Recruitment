<?php

require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
	 $misc= new miscfunctions();
    $db = new sqlfunctions();
	$id=base64_decode($_GET['return']);
	$sql = "update login set verify='1' where user_id='$id'";
	$r = $db->process_query($sql);
	if($r)
	{
		 $misc->palert("Your email has been verified","index.php");
	}
	else
	{
		 $misc->palert("Some error occcured","index.php");
	}
?>