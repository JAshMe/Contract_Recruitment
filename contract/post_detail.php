<?php
   require_once("./included_classes/class_user.php");
   require_once("./included_classes/class_misc.php");
   require_once("./included_classes/class_sql.php");
   $misc= new miscfunctions();
   $db = new sqlfunctions();
   $id=$_SESSION['user'];
   //var_dump($id); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Work Experience</title>
<script type="text/javascript" src="./include/date_functions.js"></script>
</head>

<body>

 <div id="home" class="tab-pane fade in active">
<h3>Details Regarding Posts:</h3>
    <br>
    <form class="form-horizontal" name="reg_frm" method="post" action="">
        <div class="tab-content">
            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-3" for="posts"><span class="text-danger">*</span> Posts :</label>
                <div class="col-sm-3">
                    <select id="posts" name="posts" required class="form-control" style="width:100%;">
                        <option value="projectsuper">Project Supervisor [Junior Engineer-Civil/ Electrical]
                        </option>
                        <option value="executive" >Executive in Executive Development Centre</option>
                        <option value="officeass">Office Assistant in EDC</option>
                        <option value="techman_clinic" >Technical Manpower [for Clinical Diagnostics and Pathological Studies</option>
                        <option value="labass">Lab Assistant [for CMDR]</option>
                        <option value="techoff">Technical Officer [Centre for Interdisciplinary Research (CIR)]</option>
                        <option value="techman_CIR">Technical Manpower [Centre for Interdisciplinary Research (CIR)]</option>
                    </select>
                </div>
            </div>
            <hr>
        </div>
</form>
<!-- HTML for details for project supervisor -->
 <table class="table table-striped posts_div" id="projectsuper">
      <tr><th>Name of the Post</th><th>Remuneration</th><th>No. of Post</th><th>Age Limit</th><th>Essential Qualification</th><th>Experience</th><th>Desirable </th></tr>
 </table>
<!-- HTML for details for Executive in executive developement centre -->
 <table class="table table-striped posts_div" style=" display: none;" id="executive">
      <tr><th>Name of the Post</th><th>Remuneration</th><th>No. of Post</th><th>Age Limit</th><th>Essential Qualification</th><th>Experience</th><th>Desirable </th></tr>
 </table>
<!-- HTML for details for office assisant in edc -->
 <table class="table table-striped posts_div" style=" display: none;" id="officeass">
      <tr><th>Name of the Post</th><th>Remuneration</th><th>No. of Post</th><th>Age Limit</th><th>Essential Qualification</th><th>Experience</th><th>Desirable </th></tr>
 </table>
<!-- HTML for details for technical manpower in clinic -->
 <table class="table table-striped posts_div" style=" display: none;" id="techman_clinic">
      <tr><th>Name of the Post</th><th>Remuneration</th><th>No. of Post</th><th>Age Limit</th><th>Essential Qualification</th><th>Experience</th><th>Desirable </th></tr>
 </table>
<!-- HTML for details for lab assisant -->
 <table class="table table-striped posts_div" style=" display: none;" id="labass">
      <tr><th>Name of the Post</th><th>Remuneration</th><th>No. of Post</th><th>Age Limit</th><th>Essential Qualification</th><th>Experience</th><th>Desirable </th></tr>
 </table>
<!-- HTML for details for technical officer -->	
 <table class="table table-striped posts_div" style=" display: none;" id="techoff">
      <tr><th>Name of the Post</th><th>Remuneration</th><th>No. of Post</th><th>Age Limit</th><th>Essential Qualification</th><th>Experience</th><th>Desirable </th></tr>
 </table>
<!-- HTML for details for technical manpower in CIR -->
 <table class="table table-striped posts_div" style=" display: none;" id="techman_CIR">
      <tr><th>Name of the Post</th><th>Remuneration</th><th>No. of Post</th><th>Age Limit</th><th>Essential Qualification</th><th>Experience</th><th>Desirable </th></tr>
 </table>


<script type="text/javascript">
	$("#posts").change(function(){
                var posts  = $("#posts").val();
                $(".posts_div").hide();
                posts = "#".concat(posts);
                $(posts).show();
    });
</script>

</body>
</html>
