<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/31/2018
 * Time: 11:19 PM
 */

//if(!isset($_SESSION['verdict']))
//        die("<h3>Unauthorized Access!!</h3>");
//if(isset($_SESSION['verdict']) && $_SESSION['verdict']!="ok")
//        die("<h3>Please Complete All Details Correctly!!</h3>");


require_once("./included_classes/class_user.php");
require_once("./included_classes/class_misc.php");
require_once("./included_classes/class_sql.php");
require_once("./included_classes/check_post.php");
$misc= new miscfunctions();
$db = new sqlfunctions();


$id=$_SESSION['user'];
$query = "select * from final_apply where user_id = '$id'";
$r = $db->process_query($query);
$res = $db->fetch_rows($r);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Apply for Post</title>
</head>

<body>

<div id="main" style="font-size:13px; margin:0 0 0 0;" align="justify">
        <center><b style="font-size:18px;">Apply for Post</b></center>
        <hr>

        <p align="justify" class="larger-font">

        <ul class="text-danger">
                <li> * Marked fields are mandatory.</li>
        </ul>

        <form class="form-horizontal" name="post_frm" method="post" action="save.php" >
                <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                                <h3>Apply For Post</h3>
                                <hr>

                                <div class="form-group">
                                        <h4><label class="control-label col-sm-4" for="app_post_label">Choose the post:</label></h4>
                                        <br><br><br>
                                        <div class="checkbox col-md-offset-1">
                                                <label><input class="post_opt" type="checkbox" name="post[]" value="1" <?php if($res['pos1']) echo "checked"?>
                                                        >Post 1: Project Supervisor [Junior Engineer-Civil/ Electrical]</label>
                                        </div>
                                <!------------------------------Info Div---------------------------------->
                                        <div class="col-md-offset-2 col-md-8 info" style="font-size: 15px;" id="post_info_1">
                                                <table class="table table-striped posts_div" id="projectsuper">
<!--                                                      <tr><td><strong>Name of Post:</strong></td><td>Project Supervisor [Junior Engineer-Civil/ Electrical]</td></tr>-->
                                                      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
                                                      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
                                                      <tr><td><strong>Essential Qualification:</strong></td><td>First class diploma of three years duration in Civil/Electrical Engineering with one year experience in relevant field</td></tr>
                                                 </table>
                                        </div>

                                        <div class="checkbox col-md-offset-1">
                                                <label><input  class="post_opt" type="checkbox" name="post[]" value="2"  <?php if($res['pos2']) echo "checked"?> >Post 2: Executive in Executive Development Centre</label>
                                        </div>

                                <!------------------------------Info Div---------------------------------->
                                        <div class="col-md-offset-2 col-md-8 info" style="font-size: 15px;" id="post_info_2">
                                                <table class="table table-striped posts_div" id="executive">
<!--                                                      <tr><td><strong>Name of Post:</strong></td><td>Executive in Executive Development Centre</td></tr>-->
                                                      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
                                                      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
                                                      <tr><td><strong>Essential Qualification:</strong></td><td>Graduate in any discipline. Good working knowledge of computer [MS Office], and knowledge of accounts procedures.</td></tr>
                                                      <tr><td><strong>Experience:</strong></td><td>At least 3 years relevant work experience.</td></tr>
                                                      <tr><td><strong>Desirable Qualification:</strong></td><td>Bachelors’ Degree in Hotel Management/Hospitality Management and Masters’ Degree in the relevant field.</td></tr>
                                                 </table>
                                        </div>
                                        <div class="checkbox col-md-offset-1">
                                                <label><input class="post_opt" type="checkbox" name="post[]" value="3"  <?php if($res['pos3']) echo "checked"?> >Post 3: Office Assistant in EDC</label>
                                        </div>
                                <!------------------------------Info Div---------------------------------->
                                        <div class="col-md-offset-2 col-md-8 info" style="font-size: 15px;" id="post_info_3">
                                                <table class="table table-striped posts_div" id="officeass">
<!--                                                      <tr><td><strong>Name of Post:</strong></td><td>Office Assistant in EDC</td></tr>-->
                                                      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
                                                      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
                                                      <tr><td><strong>Essential Qualification:</strong></td><td>Bachelors Degree in any subject.</td></tr>
                                                      <tr><td><strong>Experience:</strong></td><td>Minimum 3 years experience in handling office papers &equipments /knowledge of computer applications etc. in reputed Industry/Educational/R&D Institutions. Knowledge of English typing/Hindi typing communication is essential. Graduate/Post-Graduate with English as a subject will be preferred. Experience of preparing report, presentation, educational material etc. is desired. Experience gained only after acquiring degree/diploma will be considered. </td></tr>
												 </table>
                                        </div>
                                        <div class="checkbox col-md-offset-1">
                                                <label><input class="post_opt" type="checkbox" name="post[]" value="4"  <?php if($res['pos4']) echo "checked"?> >Post 4: Technical Manpower [for Clinical Diagnostics and Pathological Studies,Animal Tissue Culture, Immunodiagnostics, PCR/ Molecular Based Diagnostics Lab]</label>
                                        </div>
                                <!------------------------------Info Div---------------------------------->
                                        <div class="col-md-offset-2 col-md-8 info" style="font-size: 15px;" id="post_info_4">
                                                 <table class="table table-striped posts_div"  id="techman_clinic">
<!--                                                      <tr><td><strong>Name of Post:</strong></td><td>Technical Manpower [for Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/ Molecular Based Diagnostics Lab]</td></tr>-->
                                                      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
                                                      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
                                                      <tr><td><strong>Essential Qualification:</strong></td><td>First class Diploma of minimum 3 years duration in appropriate branch of Science /Engineering/ Technology.&nbsp;<strong>OR</strong>&nbsp;
                                                        First class B.Sc. or M.Sc. degree with not less than 55% marks in appropriate branch of Science such as Biology, Zoology, Life Sciences, Biochemistry, Microbiology, Biotechnology or any other related field.</td></tr>
                                                      <tr><td><strong>Experience:</strong></td><td>Minimum one year experience in Industry/Educational/R&D Institutions/Laboratories in Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/Molecular Based Diagnostics Techniques. Experience gained only after acquiring degree/diploma will be considered. </td></tr>
                                                 </table>
                                        </div>
                                        <div class="checkbox col-md-offset-1">
                                                <label><input class="post_opt" type="checkbox" name="post[]" value="5"  <?php if($res['pos5']) echo "checked"?> >Post 5: Lab Assistant [for CMDR]</label>
                                        </div>
                                <!------------------------------Info Div---------------------------------->
                                        <div class="col-md-offset-2 col-md-8 info" style="font-size: 15px;"  id="post_info_5">
                                                <table class="table table-striped posts_div"  id="labass">
<!--                                                      <tr><td><strong>Name of Post:</strong></td><td>Lab Assistant [for CMDR]</td></tr>-->
                                                      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
                                                      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
                                                      <tr><td><strong>Essential Qualification:</strong></td><td>First class of minimum 3 years duration in appropriate branch of Science/ Engineering/ Technology.&nbsp;<strong>OR</strong>&nbsp;
                                                        First class B.Sc. or M.Sc. degree with not less than 55% marks in appropriate branch of Science such as Biology, Zoology, Life Sciences, Biochemistry, Microbiology, Biotechnology, or any other related field.</td></tr>
                                                      <tr><td><strong>Experience:</strong></td><td>Minimum one year experience in Industry/Educational/R&D Institutions/Laboratories in Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/Molecular Based Diagnostics Techniques, Experience gained only after acquiring degree/diploma will be considered.</td></tr>
                                                 </table>
                                        </div>
                                        <div class="checkbox col-md-offset-1">
                                                <label><input class="post_opt" type="checkbox" name="post[]" value="6"  <?php if($res['pos6']) echo "checked"?> >Post 6: Technical Officer [Centre for Interdisciplinary Research (CIR)]</label>
                                        </div>
                                <!------------------------------Info Div---------------------------------->
                                        <div class="col-md-offset-2 col-md-8 info" style="font-size: 15px;" id="post_info_6">
                                                <table class="table table-striped posts_div"  id="techoff">
<!--                                                      <tr><td><strong>Name of Post:</strong></td><td>Technical Officer [Centre for Interdisciplinary Research (CIR)]</td></tr>-->
                                                      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
                                                      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
                                                      <tr><td><strong>Essential Qualification:</strong></td><td>B.E./ B.Tech. or M.Sc./ MCA Degree in relevant filed with first class or equivalent grade (6.5 in 10 point scale) and consistently excellent academic record. </td></tr>
                                                      <tr><td><strong>Experience:</strong></td><td>Work experience in relevant field e.g. maintenance of scientific equipment, system administration, software development/ experience of working with different types of software, fabrication and support to research.</td></tr>
                                                 </table>
                                        </div>
                                        <div class="checkbox col-md-offset-1">
                                                <label><input class="post_opt" type="checkbox" name="post[]" value="7"  <?php if($res['pos7']) echo "checked"?> >Post 7: Technical Manpower [Centre for Interdisciplinary Research (CIR)]</label>
                                        </div>
                                <!------------------------------Info Div---------------------------------->
                                        <div class="col-md-offset-2 col-md-8 info" style="font-size: 15px;" id="post_info_7">
                                                <table class="table table-striped posts_div"  id="techman_CIR">
<!--                                                      <tr><td><strong>Name of Post:</strong></td><td>Technical Manpower [Centre for Interdisciplinary Research (CIR)]</td></tr>-->
                                                      <tr><td><strong>Remuneration:</strong></td><td>Will be communicated later</td></tr>
                                                      <tr><td><strong>Age Limit:</strong></td><td>Preferably below 35 years </td></tr>
                                                      <tr><td><strong>Essential Qualification :</strong></td><td>First class Diploma of minimum 3 years duration in appropriate branch of Engineering/ Technology.</td></tr>
                                                      <tr><td><strong>Experience:</strong></td><td>Minimum one year experience in Industry/Educational/R&D Institutions. Experience gained only after acquiring degree/ diploma will be considered.</td></tr>
                                                      <tr><td><strong>Desirable:</strong></td><td>Experience of handling research equipments such as XRD, SEM, AFM, Sputtering, PLD, Ellipsometer etc. will be preferred.</td></tr>
                                                 </table>

                                        </div>
                                </div>

                                <div class="col-md-offset-3" style="font-size: 15px;">
                                        <span class="text-danger">If you agree to possess the respective qualifications then only apply for the post.</span>
                                </div>
                                <br><br>
                                <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-4">
                                                <input type="submit" id="post_app" name="post_app" class="btn btn-primary col-sm-12" value="Apply">
                                        </div>
                                </div>
                        </div>
                </div>
        </form>

</div>
<script type="text/javascript">
        $("#post_app").click(function(e){
                var app_posts="";
				var posts = ["Post 1: Project Supervisor [Junior Engineer-Civil/ Electrical]","Post 2: Executive in Executive Development Centre", "Post 3: Office Assistant in EDC", "Post 4: Technical Manpower [for Clinical Diagnostics and Pathological Studies,Animal Tissue Culture, Immunodiagnostics, PCR/ Molecular Based Diagnostics Lab]", "Post 5: Lab Assistant [for CMDR]","Post 6: Technical Officer [Centre for Interdisciplinary Research (CIR)]","Post 7: Technical Manpower [Centre for Interdisciplinary Research (CIR)]" ];
                $(':checkbox').each(function(){
                        console.log("here");
                        if(this.checked)
                        {
                                console.log($(this).val());
                                app_posts+="\n"+posts[$(this).val()-1];
                        }
                });
                var answer=confirm('Do you want to apply for the following posts:' + app_posts);
                if(answer){
                       // $('form').submit();
                }
                else{
                        e.preventDefault();
                }
        })
</script>
<script type="text/javascript">
        $(".info").hide();
        $(':checkbox').change(function(){
                var id = $(this).val();
                id = "#post_info_"+id;
                console.log(id);
                if(this.checked)
                {
                        console.log("Checked");
                        $(".info").slideUp();
                        $(id).slideDown();
                }
                else
                {
                        console.log("Unchecked");
                        $(id).slideUp();
                }
        });
</script>
<script type="text/javascript">
//        $("#post_app").click(function(){
//                $(".curtain").show();
//                $(".loaderDiv").removeClass("loaderDiv-small").addClass("loaderDiv-big");
//                $(".loader").show(100);
//                $(".status").show().animate({opacity: 1},"slow");
//        });

</script>

</body>
</html>