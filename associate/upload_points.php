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
		$misc->palert("You cannot upload file(s) after you have freezed your form","home.php?val=perinfo");
	}
	$targetDir="./CreditSheets";
	//print_r($_FILES);
	//die();
	
		$imageName=stripslashes($_FILES['sheet1']['name']);
		$extension=$misc->Extension($imageName);
		$errorInUploading=0;
		if(!$extension)
		{
			;
		}
		else if (($extension != "DOCX") &&($extension != "docx") &&($extension != "doc") &&($extension != "DOC"))
		{
			$errorInUploading++;
			$misc->palert("The Extension of your file was ".$extension.". Only DOCX Files are allowed!","home.php?val=points");
		}
		else if($errorInUploading==0)
		{
			$imageName=$_SESSION['user'].'.'."DOCX";
			$newName=$targetDir."/".$imageName;
			exec("chmod 777 ".$newName);
			if (file_exists($newName))
			unlink($newName);
			if (!is_writable($targetDir))   die('Upload directory is not writable');
			$copied = move_uploaded_file($_FILES['sheet1']['tmp_name'], $newName);
			
			/*$imageName1=$_SESSION['user'].'.'."pdf";
			$newName=$targetDir."/".$imageName1;
			copy($targetDir."/".$imageName,$targetDir."/".$imageName1);*/
			
			if (!$copied) 
			{ 
					$errorInUploading=1;  				
					$misc->palert("Copy Unsuccessfull!","home.php?val=points");
			}
		}
	
	
	
	
	
		$imageName=stripslashes($_FILES['sheet2']['name']);
		$extension=$misc->Extension($imageName);
		$errorInUploading=0;
		if(!$extension)
		{
			;
		}
		else if (($extension != "DOCX") &&($extension != "docx") &&($extension != "doc") &&($extension != "DOC") )
		{
			$errorInUploading++;
			$misc->palert("The Extension of your file was ".$extension.". Only DOCX Files are allowed!","home.php?val=points");
		}
		else if($errorInUploading==0)
		{
			$imageName=$_SESSION['user'].'_2.'."DOCX";
			$newName=$targetDir."/".$imageName;
			exec("chmod 777 ".$newName);
			if (file_exists($newName))
			unlink($newName);
			if (!is_writable($targetDir))   die('Upload directory is not writable');
			$copied = move_uploaded_file($_FILES['sheet2']['tmp_name'], $newName);
			if (!$copied) 
			{ 
					$errorInUploading=1;  				
					$misc->palert("Copy Unsuccessfull!","home.php?val=points");
			}
		}
	
	
	
	
	if(isset($_POST['points'])){
		$id=$_SESSION['user'];
		$points=validate($_POST['points']);
		$query="SELECT * from `points` where `user_id` like '$id'";
		$r = $db->process_query($query);
	
			if(mysql_num_rows($r)>0)
			{
			 $q="UPDATE `points` SET `points`='$points' WHERE user_id = '$id'";
			}
			else
			{
				 $q="INSERT INTO `points`(`user_id`, `points`) VALUES ('$id','$points')";
			}
			$r=$db->process_query($q);
			if(!$r)
		   {
					$misc->palert("Some error occured","home.php?val=points");
		   }
	}
	
	$misc->palert("Details Submitted","home.php?val=reference");
?>