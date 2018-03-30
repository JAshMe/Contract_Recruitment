<?php
session_start();
include_once('included_classes/class_sql.php');
/*include('included_classes/class_user.php');*/
include_once('included_classes/class_misc.php');

//$db = new sqlfunctions();

function verify_doc($fileval,$targetDir,$site)
{
    $imageName = stripslashes($_FILES[$fileval]['name']);
    $misc= new miscfunctions();
    $extension = $misc->Extension($imageName);
    $errorInUploading = 0;
    if (!$extension) {
        ;
        $errorInUploading++;
        $misc->palert("No Extension!", "");
    } else if (($extension != "pdf") && ($extension != "PDF")) {
        $errorInUploading++;
        $misc->palert("The Extension of your file was " . $extension . ". Only PDF Files are allowed!", "home.php?val=$site");
    } else if (filesize($_FILES['$fileval']['tmp_name']) > 1024 * 1024) {
        $errorInUploading++;
        $misc->palert("File exceeds 1MB size Limit !!", "home.php?val=$site");
    } else if ($errorInUploading == 0) {
        $imageName = $_SESSION['user'].'_'."$fileval"."pdf";
        $newName = $targetDir . "/" . $imageName;
        exec("chmod 777 " . $newName);
        if (file_exists($newName))
            unlink($newName);
        if (!is_writable($targetDir)) die('Upload directory is not writable');
        //echo $newName;
        //echo $_FILES['image']['tmp_name'];
        $copied = move_uploaded_file($_FILES[$fileval]['tmp_name'], $newName);
        //$misc->palert($newName,"");
        if (!$copied) {
            $errorInUploading = 1;
            $misc->palert("Copy Unsuccessfull!", "home.php?val=$site");
        }
    }
    $misc->palert("Document successfully uploaded !!!", "home.php?val=$site");
}
?>