<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
	$id=$_SESSION['user'];
    $query="SELECT * from `points` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)>0)
    {
     $r = $db->fetch_rows($r);
    $points = validate($r['points']);
    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Credit Points</title>
<style>
.login {
  display:none;
}
#loginbox{
  display:none;
  text-align:center;
  margin:65px 7px -25px 5px;
  padding:25px 5px 15px 55px;
  background:#fff;
  color:#b22d00;
  -moz-border-radius:6px;
  -webkit-border-radius:6px;
}
.submit{
  height:20px;
  width:80px;
}
</style>
</head>

<body>
<div id="main" style="font-size:13px; margin:0px 0 0 0;" align="justify">
  <center><b style="font-size:18px;">Credit Points</b></center>
<hr>

<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>
<form class="form-horizontal" name="phd_frm" method="post" action="upload_points.php" enctype="multipart/form-data">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Credit Points</h3>
        <hr>

		<p><b>Step 1: </b>Please fill the given Credit Calculation and Detailed Sheet and upload it in Step 2. Download from the links below.
        	<br />
            <ol>
            <li><a href="CreditCalculationSheet.docx" style="color:#E53935">Credit Calculation Sheet</a></li>
            <li><a href="CreditDetailSheet.docx" style="color:#E53935">Credit Detailed Sheet</a></li>
        	</ol>
        </p><br>
        <p><b>Step 2: </b></p>


        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Upload Credit Calculation Sheet :</label> 
          <div class="col-sm-6">
          
            <input type="file" class="form-control"  name="sheet1" id="sheet1" required> <?php
		  		
          		if(file_exists("CreditSheets/".$id.".DOCX")){
					echo "<p style=\"color:#388E3C\"><b>You have uploaded your file</b></p>";
				}
				else{
					echo "<p style=\"color:#E53935\"><b>You have not yet uploaded your file</b></p>";
				}
		  ?>
          </div>
         </div>
         <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Upload Credit Detail Sheet :</label> 
          <div class="col-sm-6">
            <input type="file" class="form-control"  name="sheet2" id="sheet2" required> <?php
		  		
          		if(file_exists("CreditSheets/".$id.".DOCX")){
					echo "<p style=\"color:#388E3C\"><b>You have uploaded your file</b></p>";
				}
				else{
					echo "<p style=\"color:#E53935\"><b>You have not yet uploaded your file</b></p>";
				}
		  ?>
          </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Total Credit Points:</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" value ="<?php if(isset($points)) echo "$points"; ?>" name="points" required> 
          </div>
        </div>	




  

<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="reference" class="btn btn-primary col-sm-12">Submit Information</button>
    </div>
  </div>
  </form>
</div>
</body>
</html>    