<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/31/2018
 * Time: 11:19 PM
 */

if(!isset($_SESSION['verdict']))
    die("<h3>Unauthorized Access!!</h3>");
if(isset($_SESSION['verdict']) && $_SESSION['verdict']!="ok")
    die("<h3>Please Complete All Details Correctly!!</h3>");


require_once("./included_classes/class_user.php");
require_once("./included_classes/class_misc.php");
require_once("./included_classes/class_sql.php");
require_once("./included_classes/check_post.php");
$misc= new miscfunctions();
$db = new sqlfunctions();


$id=$_SESSION['user'];

//$post_array=check_posts();
check_edu();
check_exp();
$q="select * from `eligible` where `user_id` like '$id'";
$h=$db->process_query($q);
if(mysqli_num_rows($h)>0){
    $r=$db->fetch_rows($h);
    $pos1=$r['pos1'];
    $pos2=$r['pos2'];
    $pos3=$r['pos3'];
    $pos4=$r['pos4'];
    $pos5=$r['pos5'];
    $pos6=$r['pos6'];
    $pos7=$r['pos7'];
    $post_array=array($pos1,$pos2,$pos3,$pos4,$pos5,$pos6,$pos7);
}
//adding values to session variables
for($i = 0; $i < 7 ; $i++)
    $_SESSION['post_'.($i+1)] = $post_array[$i];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Apply for Post</title>
</head>

<body>
<div id="main" style="font-size:13px; margin:0px 0 0 0;" align="justify">
    <center><b style="font-size:18px;">Apply for Post</b></center>
    <hr>

    <p align="justify" class="larger-font">

    <ul class="text-danger">
        <li> * Marked fields are mandatory.</li>
    </ul>

    <form class="form-horizontal" name="phd_frm" method="post" action="save.php" >
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Apply For Post</h3>
                <hr>

                <div class="form-group">
                    <h4><label class="control-label col-sm-11" for="app_post_label">These are the posts for which you can apply (based on the information you provided earlier) :</label></h4>
                    <br><br><br>
                    <div class="col-sm-offset-3 col-sm-6">
                        <select id="app_post_label" class="form-control" name="app_post">
                                <option value="0">---Choose your post---</option>
                                <?php if($post_array[0]) echo "<option value=\"1\">Project Supervisor [Junior Engineer-Civil/ Electrical]</option>" ?>
                                <?php if($post_array[1]) echo "<option value=\"2\" >Executive in Executive Development Centre</option>" ?>
                                <?php if($post_array[2]) echo "<option value=\"3\">Office Assistant in EDC</option>" ?>
                                <?php if($post_array[3]) echo "<option value=\"4\" >Technical Manpower [for Clinical Diagnostics and Pathological Studies,Animal Tissue Culture, Immunodiagnostics, PCR/ Molecular Based Diagnostics Lab]</option>" ?>
                                <?php if($post_array[4]) echo "<option value=\"5\">Lab Assistant [for CMDR]</option>" ?>
                                <?php if($post_array[5]) echo "<option value=\"6\">Technical Officer [Centre for Interdisciplinary Research (CIR)]</option>" ?>
                                <?php if($post_array[6]) echo "<option value=\"7\">Technical Manpower [Centre for Interdisciplinary Research (CIR)]</option> " ?>
                        </select>
                    </div>
                </div>

<!-- ------------------------Info Divs--------------------------->
                <div class="col-md-offset-2 col-md-8 info" style="font-size: 15px;">
                    <strong>This post requires:</strong><br><br><br>


                    <div class="info_div" id="post_info_1">
                        <p>First class diploma of three years duration in Civil/Electrical Engineering with one year
                        experience in relevant field.</p><br><br><br>
                    </div>

                    <div class="info_div" id="post_info_2">
                        <p>Graduate in any discipline
                        At least 3 years relevant work experience.
                        Good working knowledge of computer [MS Office], and knowledge of accounts procedures.</p>
                        <strong>Some desirable qualifications:</strong><br>
                        <p>Bachelors’ Degree in Hotel Management/Hospitality Management and Masters’ Degree in the relevant field.</p>
                        <br><br><br>
                    </div>

                    <div class="info_div" id="post_info_3">
                        <p>Bachelors Degree in any subject.</p>
                        <p>Minimum 3 years experience in handling office papers &equipments /knowledge of computer applications etc. in reputed Industry/Educational/R&D Institutions. Knowledge of English typing/Hindi typing communication is essential. Graduate/Post-Graduate with English as a subject will be preferred. Experience of preparing report, presentation, educational material etc. is desired. Experience gained only after acquiring degree/diploma will be considered.</p>
                        <br><br><br>
                    </div>

                    <div class="info_div" id="post_info_4">
                        <p>First class Diploma of minimum 3 years duration in appropriate branch of Science /Engineering/ Technology. </p>
                        <div align="center"><strong>OR</strong></div>
                        <p>First class B.Sc. or M.Sc. degree with not less than 55% marks in appropriate branch of Science such as Biology, Zoology, Life Sciences, Biochemistry, Microbiology, Biotechnology or any other related field.</p>
                        <p>Minimum one year experience in Industry/Educational/R&D Institutions/Laboratories in Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/Molecular Based Diagnostics Techniques. Experience gained only after acquiring degree/diploma will be considered.</p>
                        <br><br><br>
                    </div>

                    <div class="info_div" id="post_info_5">
                        <p>First class Diploma of minimum 3 years duration in appropriate branch of Science /Engineering/ Technology. </p>
                        <div align="center"><strong>OR</strong></div>
                        <p>First class B.Sc. or M.Sc. degree with not less than 55% marks in appropriate branch of Science such as Biology, Zoology, Life Sciences, Biochemistry, Microbiology, Biotechnology or any other related field.</p>
                        <p>Minimum one year experience in Industry/Educational/R&D Institutions/Laboratories in Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/Molecular Based Diagnostics Techniques. Experience gained only after acquiring degree/diploma will be considered.</p>
                        <br><br><br>
                    </div>

                    <div class="info_div" id="post_info_6">
                        <p>B.E./ B.Tech. or M.Sc./ MCA Degree in relevant filed with first class or equivalent grade (6.5 in 10 point scale) and consistently excellent academic record.</p>
                        <p>Work experience in relevant field e.g. maintenance of scientific equipment, system administration, software development/ experience of working with different types of software, fabrication and support to research.</p>

                        <div align="center"><strong>OR</strong></div>

                        <p>Experience of handling research equipments such as XRD, SEM, AFM, Sputtering, PLD, Ellipsometer etc. will be preferred.</p>
                        <br><br><br>
                    </div>

                    <div class="info_div" id="post_info_7">
                        <p>First class Diploma of minimum 3 years duration in appropriate branch of Engineering/ Technology.</p>
                        <p>Minimum one year experience in Industry/Educational/R&D Institutions. Experience gained only after acquiring degree/ diploma will be considered. </p>

                        <div align="center"><strong>OR</strong></div>

                        <p>Experience of handling research equipments such as XRD, SEM, AFM, Sputtering, PLD, Ellipsometer etc. will be preferred.</p>

                        <br><br><br>
                    </div>


                    <span class="text-danger">If you agree to possess this qualifications then only apply for this post.</span>
                    <br><br>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" name="post_app" class="btn btn-primary col-sm-12">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<script type="text/javascript">
    $(".info").hide();
    $("#app_post_label").change(function(){
        var id = $(this).val();
        var first = 1;
        if(id=="0")
                $(".info").slideUp();
        else
            $(".info").slideDown();
        id = "#post_info_"+id;
        $(".info_div").hide();
        $(id).show();


    });
</script>

</body>
</html>