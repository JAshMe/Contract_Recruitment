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
<title>Post Details</title>
<script type="text/javascript" src="./include/date_functions.js"></script>
</head>

<body>

 <div id="home" class="tab-pane fade in active">
<h3>Details Regarding Posts:</h3>
<br>
<br>
<div class="container">
	<form class="form-horizontal" name="reg_frm" method="post" action="">
        <div class="tab-content">
            <div class="form-group">
                <label class="control-label col-sm-2" for="posts">Posts :</label>
                <div class="col-sm-4">
                    <select id="posts" name="posts" required class="form-control">
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
        </div>
</form>
</div>
<hr>
<!-- HTML for details for project supervisor -->
 <table class="table table-striped posts_div" id="projectsuper">
      <!-- <tr><td><strong>Name of Post:</strong></td><td>Project Supervisor [Junior Engineer-Civil/ Electrical]</td></tr> -->
      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
      <tr><td><strong>Essential Qualification:</strong></td><td>First class diploma of three years duration in Civil/Electrical Engineering with one year experience in relevant field</td></tr>
 </table>
<!-- HTML for details for Executive in executive developement centre -->
 <table class="table table-striped posts_div" style=" display: none;" id="executive">
      <!-- <tr><td><strong>Name of Post:</strong></td><td>Executive in Executive Development Centre</td></tr> -->
      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
      <tr><td><strong>Essential Qualification:</strong></td><td>Graduate in any discipline. Good working knowledge of computer [MS Office], and knowledge of accounts procedures.</td></tr>
      <tr><td><strong>Experience:</strong></td><td>At least 3 years relevant work experience.</td></tr>
      <tr><td><strong>Desirable Qualification:</strong></td><td>Bachelors’ Degree in Hotel Management/Hospitality Management and Masters’ Degree in the relevant field.</td></tr>
 </table>
<!-- HTML for details for office assisant in edc -->
 <table class="table table-striped posts_div" style=" display: none;" id="officeass">
      <!-- <tr><td><strong>Name of Post:</strong></td><td>Office Assistant in EDC</td></tr> -->
      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
      <tr><td><strong>Essential Qualification:</strong></td><td>Bachelors Degree in any subject.</td></tr>
      <tr><td><strong>Experience:</strong></td><td>Minimum 3 years experience in handling office papers &equipments /knowledge of computer applications etc. in reputed Industry/Educational/R&D Institutions. Knowledge of English typing/Hindi typing communication is essential. Graduate/Post-Graduate with English as a subject will be preferred. Experience of preparing report, presentation, educational material etc. is desired. Experience gained only after acquiring degree/diploma will be considered. </td></tr>
 </table>
<!-- HTML for details for technical manpower in clinic -->
 <table class="table table-striped posts_div" style=" display: none;" id="techman_clinic">
      <!-- <tr><td><strong>Name of Post:</strong></td><td>Technical Manpower [for Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/ Molecular Based Diagnostics Lab]</td></tr> -->
      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
      <tr><td><strong>Essential Qualification:</strong></td><td>First class Diploma of minimum 3 years duration in appropriate branch of Science /Engineering/ Technology.&nbsp;<strong>OR</strong>&nbsp;
		First class B.Sc. or M.Sc. degree with not less than 55% marks in appropriate branch of Science such as Biology, Zoology, Life Sciences, Biochemistry, Microbiology, Biotechnology or any other related field.</td></tr>
      <tr><td><strong>Experience:</strong></td><td>Minimum one year experience in Industry/Educational/R&D Institutions/Laboratories in Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/Molecular Based Diagnostics Techniques. Experience gained only after acquiring degree/diploma will be considered. </td></tr>
 </table>
<!-- HTML for details for lab assisant -->
 <table class="table table-striped posts_div" style=" display: none;" id="labass">
      <!-- <tr><td><strong>Name of Post:</strong></td><td>Lab Assistant [for CMDR]</td></tr>  -->
      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
      <tr><td><strong>Essential Qualification:</strong></td><td>First class of minimum 3 years duration in appropriate branch of Science/ Engineering/ Technology.&nbsp;<strong>OR</strong>&nbsp;
		First class B.Sc. or M.Sc. degree with not less than 55% marks in appropriate branch of Science such as Biology, Zoology, Life Sciences, Biochemistry, Microbiology, Biotechnology, or any other related field.</td></tr>
      <tr><td><strong>Experience:</strong></td><td>Minimum one year experience in Industry/Educational/R&D Institutions/Laboratories in Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/Molecular Based Diagnostics Techniques, Experience gained only after acquiring degree/diploma will be considered.</td></tr>
 </table>
<!-- HTML for details for technical officer -->	
 <table class="table table-striped posts_div" style=" display: none;" id="techoff">
     <!-- <tr><td><strong>Name of Post:</strong></td><td>Technical Officer [Centre for Interdisciplinary Research (CIR)]</td></tr> -->
      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
      <tr><td><strong>Essential Qualification:</strong></td><td>B.E./ B.Tech. or M.Sc./ MCA Degree in relevant filed with first class or equivalent grade (6.5 in 10 point scale) and consistently excellent academic record. </td></tr>
      <tr><td><strong>Experience:</strong></td><td>Work experience in relevant field e.g. maintenance of scientific equipment, system administration, software development/ experience of working with different types of software, fabrication and support to research.</td></tr>
 </table>
<!-- HTML for details for technical manpower in CIR -->
 <table class="table table-striped posts_div" style=" display: none;" id="techman_CIR">
      <!-- <tr><td><strong>Name of Post:</strong></td><td>Technical Manpower [Centre for Interdisciplinary Research (CIR)]</td></tr> -->
      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
      <tr><td><strong>Essential Qualification :</strong></td><td>First class Diploma of minimum 3 years duration in appropriate branch of Engineering/ Technology.</td></tr>
      <tr><td><strong>Experience:</strong></td><td>Minimum one year experience in Industry/Educational/R&D Institutions. Experience gained only after acquiring degree/ diploma will be considered.</td></tr>
      <tr><td><strong>Desirable:</strong></td><td>Experience of handling research equipments such as XRD, SEM, AFM, Sputtering, PLD, Ellipsometer etc. will be preferred.</td></tr>
 </table>

<br>
<p align="justify" class="larger-font text-danger"> 
	If you have any query regarding eligibilty of post as apply post section.
    <br>please contact <a href="./home.php?val=contact">Here</a>
</p>
 
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
