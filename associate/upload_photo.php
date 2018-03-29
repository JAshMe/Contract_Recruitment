<?php
	session_start();
	include ('included_classes/class_sql.php');
	/*include('included_classes/class_user.php');*/
	include('included_classes/class_misc.php');
	$misc= new miscfunctions();
	$db = new sqlfunctions();
 
    $id=$_SESSION['user'];
	
	
	$query="SELECT * from freeze where user_id='$id'";
	$r = $db->process_query($query);
	if(mysql_num_rows($r)>0)
	{
		$misc->palert("You cannot upload photo after you have freezed your form","home.php?val=perinfo");
	}
	
	$targetDir="./photos";
	$imageName=stripslashes($_FILES['photo']['name']);
	//echo $imageName;
	//echo $misc->Extension($imageName);
	//print_r($_FILES);
	//die();
	$extension=$misc->Extension($imageName);
	$errorInUploading=0;
	if(!$extension)
	{
		;
		//$errorInUploading++;
		//$misc->palert("No File Selected!",""); 
	}
	else if (($extension != "JPG") &&($extension != "jpg"))
	{
		$errorInUploading++;
		$misc->palert("The Extension of your file was ".$extension.". Only JPG Files are allowed!","home.php?val=image");
	}
	else if(filesize($_FILES['photo']['tmp_name'])>1024*300)
	{
		$errorInUploading++;
		$misc->palert("File exceeds 300KB size Limit !!","home.php?val=image"); 
	}
	else if($errorInUploading==0)
	{
		$imageName=$_SESSION['user'].'.'."JPG";
		$newName=$targetDir."/".$imageName;
		exec("chmod 777 ".$newName);
		if (file_exists($newName))
		unlink($newName);
		if (!is_writable($targetDir))   die('Upload directory is not writable');
		//echo $newName;
		//echo $_FILES['image']['tmp_name'];
		$copied = move_uploaded_file($_FILES['photo']['tmp_name'], $newName);
		//$misc->palert($newName,"");
		if (!$copied) 
		{ 
				$errorInUploading=1;  				
				$misc->palert("Copy Unsuccessfull!","home.php?val=image");
		}
	}
	$imageName=stripslashes($_FILES['sign']['name']);
	//echo $imageName;
	//echo $misc->Extension($imageName);
	//print_r($_FILES);
	//die();
	$extension=$misc->Extension($imageName);
	$errorInUploading=0;
	if(!$extension)
	{
		;
		//$errorInUploading++;
		//$misc->palert("No File Selected!",""); 
	}
	else if (($extension != "JPG") &&($extension != "jpg"))
	{
		$errorInUploading++;
		$misc->palert("The Extension of your file was ".$extension.". Only JPG Files are allowed!","home.php?val=image");
	}
	else if(filesize($_FILES['sign']['tmp_name'])>1024*300)
	{
		$errorInUploading++;
		$misc->palert("File exceeds 300KB size Limit !!","home.php?val=image"); 
	}
	else if($errorInUploading==0)
	{
		$imageName=$_SESSION['user'].'_2.'."JPG";
		$newName=$targetDir."/".$imageName;
		exec("chmod 777 ".$newName);
		if (file_exists($newName))
		unlink($newName);
		if (!is_writable($targetDir))   die('Upload directory is not writable');
		//echo $newName;
		//echo $_FILES['image']['tmp_name'];
		$copied = move_uploaded_file($_FILES['sign']['tmp_name'], $newName);
		//$misc->palert($newName,"");
		if (!$copied) 
		{ 
				$errorInUploading=1;  				
				$misc->palert("Copy Unsuccessfull!","home.php?val=image");
		}
	}
	$misc->palert("Image successfully uploaded !!!","home.php?val=phd_info");
?>