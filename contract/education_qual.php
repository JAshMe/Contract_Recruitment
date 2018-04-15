<?php
require_once("./included_classes/class_user.php");
require_once("./included_classes/class_misc.php");
require_once("./included_classes/class_sql.php");
$misc= new miscfunctions();
$db = new sqlfunctions();
$id=$_SESSION['user'];
$query="SELECT * from `10th_mark` where `user_id` like '$id'";
$c = $db->process_query($query);
?>
<script type="text/javascript" src="./include/date_functions.js"></script>

<?php
$board_10=$comp_10=$school_10=$per_or_cgpa_10=$value_10=$marks_10=$max_marks_10=null;
        if(mysqli_num_rows($c)>0) {
            $c = $db->fetch_rows($c);
            $board_10 = $c['board'];
            $comp_10 = $c['completion_date'];
            $school_10 = $c['school'];
            $per_or_cgpa_10 = $c['per_or_cgpa'];
            $value_10 = $c['value'];
            $marks_10 = $c['marks'];
            $max_marks_10 = $c['max_marks'];
        }
?>



 <?php
 $id=$_SESSION['user'];
 $query="SELECT * from `12th_mark` where `user_id` like '$id'";
 $c = $db->process_query($query);
 /*while(($c = $db->fetch_rows($c)))
 {*/
 $board_12=$comp_12=$school_12=$per_or_cgpa_12=$value_12=$marks_12=$max_marks_12=null;
 if(mysqli_num_rows($c)>0) {
     $c = $db->fetch_rows($c);
     $board_12 = $c['board'];
     $comp_12 = $c['completion_date'];
     $school_12 = $c['school'];
     $per_or_cgpa_12 = $c['per_or_cgpa'];
     $value_12 = $c['value'];
     $marks_12 = $c['marks'];
     $max_marks_12 = $c['max_marks'];
 }
 /*}*/

 ?>

 <?php
 $id=$_SESSION['user'];
 $query="SELECT * from `diploma` where `user_id` like '$id'";
 $c = $db->process_query($query);
// while(($c = $db->fetch_rows($c)))
// {
 $field_d=$start_date_d=$end_data_d=$per_or_cgpa_d=$value_d=$marks_d=$max_marks_d=$university_d=$is_others_d=null;
 if(mysqli_num_rows($c)>0) {
     $c = $db->fetch_rows($c);
     $field_d = $c['field'];
     $start_date_d = $c['start_date'];
     $end_data_d = $c['end_date'];
     $per_or_cgpa_d = $c['per_or_cgpa'];
     $value_d = $c['value'];
     $marks_d = $c['marks'];
     $max_marks_d = $c['max_marks'];
     $university_d = $c['university'];
     $is_others_d= $c['is_others'];
 }
// }
?>


    <?php
    $id=$_SESSION['user'];
    $query="SELECT * from `ug` where `user_id` like '$id'";
    $c = $db->process_query($query);
    $degree_ug=$specialization_ug=$start_date_ug=$completion_date_ug=$per_or_cgpa_ug=$value_ug=$marks_ug=$max_marks_ug=$university_ug=$is_others_ug=null;
    if(mysqli_num_rows($c)>0) {
        $c = $db->fetch_rows($c);
        $degree_ug = $c['degree'];
        $specialization_ug = $c['specialization'];
        $start_date_ug = $c['start_date'];
        $completion_date_ug = $c['completion_date'];
        $per_or_cgpa_ug = $c['per_or_cgpa'];
        $value_ug = $c['value'];
        $marks_ug = $c['marks'];
        $max_marks_ug = $c['max_marks'];
        $university_ug = $c['university'];
        $is_others_ug= $c['is_others'];
        $is_others_spec=$c['is_others_spec'];
    }
    ?>
    <?php
    $id=$_SESSION['user'];
    $query="SELECT * from `pg` where `user_id` like '$id'";
    $c = $db->process_query($query);
    $degree_pg=$specialization_pg=$start_date_pg=$completion_date_pg=$per_or_cgpa_pg=$value_pg=$marks_pg=$max_marks_pg=$university_pg=$is_others_pg=null;
    if(mysqli_num_rows($c)>0) {
        $c = $db->fetch_rows($c);
        $degree_pg = $c['degree'];
        $specialization_pg = $c['specialization'];
        $start_date_pg = $c['start_date'];
        $completion_date_pg = $c['completion_date'];
        $per_or_cgpa_pg = $c['per_or_cgpa'];
        $value_pg = $c['value'];
        $marks_pg = $c['marks'];
        $max_marks_pg = $c['max_marks'];
        $university_pg = $c['university'];
        $is_others_pg= $c['is_others'];
    }

    $id=$_SESSION['user'];
    $query="SELECT * from `dug` where `user_id` like '$id'";
    $c = $db->process_query($query);
    $degree_dug=$specialization_dug=$start_date_dug=$completion_date_dug=$per_or_cgpa_dug=$value_dug=$marks_dug=$max_marks_dug=$university_dug=$is_others_dug=null;
    if(mysqli_num_rows($c)>0) {
        $c = $db->fetch_rows($c);
        $degree_dug = $c['degree'];
        $specialization_dug = $c['specialization'];
        $start_date_dug = $c['start_date'];
        $completion_date_dug = $c['completion_date'];
        $per_or_cgpa_dug = $c['per_or_cgpa'];
        $value_dug = $c['value'];
        $marks_dug = $c['marks'];
        $max_marks_dug = $c['max_marks'];
        $university_dug = $c['university'];
        $is_others_dug= $c['is_others'];
        $is_others_spec=$c['is_others_spec'];
    }


    $id=$_SESSION['user'];
    $query="SELECT * from `dpg` where `user_id` like '$id'";
    $c = $db->process_query($query);
    $degree_dpg=$specialization_dpg=$start_date_dpg=$completion_date_dpg=$per_or_cgpa_dpg=$value_dpg=$marks_dpg=$max_marks_dpg=$university_dpg=$is_others_dpg=null;
    if(mysqli_num_rows($c)>0) {
        $c = $db->fetch_rows($c);
        $degree_dpg = $c['degree'];
        $specialization_dpg = $c['specialization'];
        $start_date_dpg = $c['start_date'];
        $completion_date_dpg = $c['completion_date'];
        $per_or_cgpa_dpg = $c['per_or_cgpa'];
        $value_dpg = $c['value'];
        $marks_dpg = $c['marks'];
        $max_marks_dpg = $c['max_marks'];
        $university_dpg = $c['university'];
        $is_others_dpg= $c['is_others'];
    }


    ?>
    <p align="justify" class="larger-font">

    <ul class="text-danger">
        <li> * Marked fields are mandatory.</li>
        <li>Format of date is (YYYY-MM-DD), if format not shown in field</li>
    </ul>

<style>
    .otherscome2{
        display: none;
    }
</style>
<div id="home" class="tab-pane fade in active">
<h3>Details of Academic Record (In Reverse Chronological Order) :</h3>
    <br>
    <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
        <div class="tab-content">
            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-3" for="qual"><span class="text-danger">*</span> Qualification :</label>
                <div class="col-sm-3">
                    <select id="qual" name="qual" required class="form-control">
                        <option value="10th">10th Standard</option>
                        <option value="diploma" >Diploma</option>
                        <option value="12th">12th Standard</option>
                        <option value="ug" >Under Graduate</option>
                        <option value="dug">Double Under Graduate (if any)</option>
                        <option value="pg">Post Graduate</option>
                        <option value="dpg">Double Post Graduate (if any)</option>
                    </select>
                </div>
            </div>
            <hr>
        </div>
    </form>
<!--   -----------------------------10th Div ---------------------------------------------->


            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
                <div id ="10th" class="qual_div">

                    <div id="10th" class="form-group">
                        <label class="control-label col-sm-3" for="school_10th"><span class="text-danger">*</span> School Name:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="school_10th" name="school_10th"  required value="<?= $school_10?>" >
                        </div>
                    </div>

                        <div class="form-group">
                             <label class="control-label col-sm-3" for="completion_date_10th"><span class="text-danger">*</span> Completion Date:</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="completion_date_10th"  name="completion_date_10th" required value="<?= $comp_10?>" >
                                </div>
                                <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Board:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board_10th" required value="<?= $board_10?>" >
                                </div>
                            </div>




                        <div class="form-group">
                        <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                        <div class=" col-sm-3">

                            <label class="radio-inline" for="per_or_cgp_100">
                            <input type="radio" class="radio-inline" value="0" id="per_or_cgp_100" name="per_or_cgp_10th" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='0') echo 'checked="checked"'; ?> >CGPA<br></label>
                            <label class="radio-inline" for="per_or_cgp_101">
                                <input type="radio" class="radio-inline" value="1" id="per_or_cgp_101" name="per_or_cgp_10th" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='1') echo 'checked="checked"'; ?> >Percentage
                            </label>
                        </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3" for="marks_10"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control marks event_marks"   name="marks_10th" required id="marks_10" value="<?= $marks_10?>" >
                            </div>
                            <label class="control-label col-sm-2" for="max_marks_10"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control max_marks event_marks"  name="max_marks_10th" required id="max_marks_10" value="<?= $max_marks_10?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="value_10"><span class="text-danger">*</span> % Marks/CGPA :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   id="value_10" name="perc_marks_10th" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="perc_marks_10th" value="<?= $value_10?>">

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="doc_10th"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                        <div class="col-sm-5">
                            <input type="file"  name="doc_10th" id="doc_10th" required>
                            <span class="text-danger">*Max File Size 1MB. PDF Documents Required</span>
                        </div>
                    </div>


                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4">
                                <button type="submit" name="edu_ch_0" class="btn btn-primary col-sm-12">Submit Information</button>
                            </div>
                        </div>
                </div>
            </form>
            <!-------------------------------------------------------------Diploma---------------------------------------------------------->
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
            <div id="diploma" class="qual_div"  style=" display: none;">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="field_d"><span class="text-danger">*</span> Specialisation:</label>
<!--                            <div class="col-sm-5">-->
<!--                                <input type="text" class="form-control"  id="field_d" name="dip_field" required value="--><?//= $field_d?><!--">-->
<!--                            </div>-->

                        <div class="col-sm-3">
                            <select id="degree2" name="dip_field" required class="form-control degree2">
                                <option value="EE" id="ee" <?php if($field_d=="EE") echo "selected" ?> >Electical Engineering</option>
                                <option value="CE" id="ce" <?php if($field_d=="CE") echo "selected" ?> >Civil Engineering</option>
                                <option value="DE" id="ds" <?php if($field_d=="DE") echo "selected" ?> >Diploma in Engineering</option>
                                <option value="DS" id="ds" <?php if($field_d=="DS") echo "selected" ?> >Diploma in Sciences</option>
                                <option value="DT" id="dt" <?php if($field_d=="DT") echo "selected" ?> >Diploma in Technology</option>
                                <option value="Others" id="others2" <?php if($field_d== "Others") echo "selected" ?> >Others</option>
                            </select>
                        </div>
                        </div>


                <div class="form-group otherscome2"   id="otherscome2" <?php if(isset($field_d) && $field_d=="Others") echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?> >
                    <label class="control-label col-sm-2" for="degree_d"><span class="text-danger">*</span>Others:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  id="degree_d" <?php if(isset($field_d) && $field_d=="Others") echo "value=\"$is_others_d\" required "; ?> name="dip_other_degree" >
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-2" for="university_d" ><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  id="university_d" name="dip_university"  required value="<?= $university_d?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="from_dip"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control from_1"   name="dip_start_date" required id="from_dip" value="<?= $start_date_d?>" > 
                    </div>
                    <label class="control-label col-sm-2" for="to_dip"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control to_1"   name="dip_end_date" required id="to_dip" value="<?= $end_data_d?>" > 
                    </div>
                </div>


                        <div class="form-group">
                            <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                            <div class=" col-sm-3" >
                                <label class="radio-inline" for="per_or_cgp_d0">
                                    <input type="radio" class="radio-inline" id="per_or_cgp_d0" value="0" name="dip_per_or_cgp" required  <?php if(isset($per_or_cgpa_d) && $per_or_cgpa_d=='0') echo 'checked="checked"'; ?> >CGPA<br></label>
                                <label class="radio-inline" for="per_or_cgp_d1">
                                    <input type="radio" class="radio-inline" value="1" id="per_or_cgp_d1" name="dip_per_or_cgp" required  <?php if(isset($per_or_cgpa_d) && $per_or_cgpa_d=='1') echo 'checked="checked"'; ?>>Percentage
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="marks_d"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control marks event_marks"   name="dip_marks" required id="marks_d" value="<?= $marks_d?>" >
                            </div>
                            <label class="control-label col-sm-2" for="max_marks_d"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control max_marks event_marks"  name="dip_max_marks" required id="max_marks_d" value="<?= @$max_marks_d?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="value_d"><span class="text-danger">*</span> % Marks/CGPA :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"  id="value_d" name="dip_perc_marks" readonly value="" >
                            </div>
                        </div>
                <input type="hidden" name="dip_perc_marks" value="<?= $value_d?>">

                <div class="form-group">
                    <label class="control-label col-sm-3" for="doc_diploma"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                    <div class="col-sm-5">
                        <input type="file"  name="doc_diploma" id="pdf1" required>
                        <span class="text-danger">*Max File Size 1MB. PDF Documents Required</span>
                    </div>
                </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" name="edu_ch_1" class="btn btn-primary col-sm-12">Submit Information</button>
                        </div>
                    </div>
                </div>
            </form>
                <!-------------------------------------------------------------12th---------------------------------------------------------->
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
                <div id="12th" class="qual_div" style=" display: none;">

                    <div id="12th" class="form-group">
                        <label class="control-label col-sm-3" for="school_12th"><span class="text-danger">*</span> School Name :</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"  name="school_12th"  id="school_12th" value="<?= $school_12 ?>" required>
                        </div>
                    </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3" for="comp_12"><span class="text-danger">*</span> Completion Date:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   id="comp_12" name="completion_date_12th" required value="<?= $comp_12?>" >
                            </div>
                            <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Board:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board_12th" required value="<?= $board_12?>"  >
                            </div>
                        </div>




                    <div class="form-group">
                        <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                        <div class=" col-sm-3" >

                            <label class="radio-inline" for="per_or_cgp_12th0">
                                <input type="radio" class="radio-inline" id="per_or_cgp_12th0" value="0" name="per_or_cgp_12th" required  <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='0') echo 'checked="checked"'; ?>>CGPA<br></label>
                            <label class="radio-inline" for="per_or_cgp_12th1">
                                <input type="radio" class="radio-inline" value="1" id="per_or_cgp_12th1" name="per_or_cgp_12th" required  <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='1') echo 'checked="checked"'; ?>>Percentage
                            </label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3" for="marks_12"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control marks event_marks"   name="marks_12th" required id="marks_12" value="<?= @$marks_12?>"  >
                        </div>
                        <label class="control-label col-sm-2" for="max_marks_12"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control max_marks event_marks"  name="max_marks_12th" required id="max_marks_12" value="<?= $max_marks_12?>"  >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="value_12"><span class="text-danger">*</span> % Marks/CGPA :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"   name="perc_marks_12th" readonly value=""  id="value_12" >
                        </div>
                    </div>
                    <input type="hidden" name="perc_marks_12th" value="<?= $value_12?>">

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="doc_12th"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                        <div class="col-sm-5">
                            <input type="file"  name="doc_12th" id="doc_12th" required>
                            <span class="text-danger">*Max File Size 1MB. PDF Documents Required</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" name="edu_ch_2" class="btn btn-primary col-sm-12">Submit Information</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-------------------------------------------------------------UG---------------------------------------------------------->
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
            <div id="ug" class="qual_div"  style=" display: none;">
<!--                <div class="form-group">-->
<!--                    <label class="control-label col-sm-2" for="field_ug"><span class="text-danger">*</span> Degree:</label>-->
<!--                    <div class="col-sm-3">-->
<!--                        <input type="text" class="form-control"   name="ug_field" required value="--><?//= $degree_ug?><!--"  id="field_ug">-->
<!--                    </div>-->
                <div id="ug" class="form-group">
                    <label class="control-label col-sm-2" for="university_ug"><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  name="ug_university" id="university_ug" required value="<?= $university_ug?>"  >
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="degree1"><span class="text-danger">*</span> Degree:</label>

                    <div class="col-sm-3">
                        <select id="degree1" name="ug_degree" required class="form-control degree2">
                            <option value="BA" id="ba" <?php if($degree_ug=="BA") echo "selected" ?> >Bachelor of Arts (BA)</option>
                            <option value="B.Sc" id="bsc" <?php if($degree_ug=="B.Sc") echo "selected" ?> >Bachelor of Science (B.Sc)</option>
                            <option value="B.Com" id="ms" <?php if($degree_ug=="B.Com") echo "selected" ?> >Bachelor of Commerce (B.Com)</option>
                            <option value="BE" id="be" <?php if($degree_ug=="BE") echo "selected" ?> >Bachelor of Engineering (BE)</option>
                            <option value="B.Tech" id="btech" <?php if($degree_ug=="B.Tech") echo "selected" ?> >Bachelor of Technology (B.Tech)</option>
                            <option value="LLB" id="llb" <?php if($degree_ug=="LLB") echo "selected" ?> >Bachelor of Law (LLB)</option>
                            <option value="BCA" id="bca" <?php if($degree_ug=="BCA") echo "selected" ?> >Bachelor of Computer Application (BCA)</option>
                            <option value="BBA" id="bba" <?php if($degree_ug=="BBA") echo "selected" ?> >Bachelor of Business Administration (BBA)</option>
                            <option value="B.Pharma" id="bpharma" <?php if($degree_ug=="B.Pharma") echo "selected" ?> >Bachelor of Pharmacy (B.Pharma)</option>
                            <option value="B.Arch" id="barch" <?php if($degree_ug=="B.Arch") echo "selected" ?> >Bachelor of Architecture (B.Arch)</option>
                            <option value="BDS" id="bds" <?php if($degree_ug=="BDS") echo "selected" ?> >Bachelor of Dental Surgery (BDS)</option>
                            <option value="BHMS" id="bhms" <?php if($degree_ug=="BHMS") echo "selected" ?> >Bachelor of Homeopathic Medicine & Surgery (BHMS)</option>
                            <option value="BAMS" id="bams" <?php if($degree_ug=="BAMS") echo "selected" ?> >Bachelor of Ayurvedic Medicine & Surgery (BAMS)</option>
                            <option value="BHM" id="bhm" <?php if($degree_ug=="BHM") echo "selected" ?> >Bachelor of Hotel Management (BHM)</option>
                            <option value="B.P.Ed" id="bped" <?php if($degree_ug=="B.P.Ed") echo "selected" ?> >Bachelor of Physical Education (B.P.Ed)</option>
                            <option value="B.Ed" id="bed" <?php if($degree_ug=="B.Ed") echo "selected" ?> >Bachelor of Education (B.Ed)</option>
                            <option value="BHMS2" id="bhms2" <?php if($degree_ug=="BHMS2") echo "selected" ?> >Bachelor of Hospitality Management</option>
                            <option value="Others" id="others" <?php if($degree_ug=="Others") echo "selected" ?> >Others</option>
                        </select>
                    </div>
                </div>


                <div class="form-group otherscome2"   id="otherscome1" <?php if(isset($degree_ug) && $degree_ug=="Others") echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?> >
                    <label class="control-label col-sm-2" for="degree_ug"><span class="text-danger">*</span>Others:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  id="degree_ug" <?php if(isset($degree_ug) && $degree_ug=="Others") echo "value=\"$is_others_ug\" required "; ?> name="ug_other_degree"  >
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-2" for="specialization_ug"><span class="text-danger">*</span>Specialization:</label>
                <div class="col-sm-4" >
<!--                    <select id="specialization_ug" name="ug_specialization" required class="form-control degree3">-->
<!--                        <option value="CSE" id="cse" --><?php //if($specialization_ug=="CSE") echo "selected" ?><!-- >Computer Science Engineering (CSE)</option>-->
<!--                        <option value="ECE" id="ece" --><?php //if($specialization_ug=="ECE") echo "selected" ?><!-- >Electronics and Communication Engineering (ECE)</option>-->
<!--                        <option value="CE" id="ce" --><?php //if($specialization_ug=="CE") echo "selected" ?><!-- >Civil Engineering (CE)</option>-->
<!--                        <option value="EE" id="ee" --><?php //if($specialization_ug=="EE") echo "selected" ?><!-- >Electrical Engineering (EE)</option>-->
<!--                        <option value="ME" id="me" --><?php //if($specialization_ug=="ME") echo "selected" ?><!-- >Mechanical Engineering(ME)</option>-->
<!--                        <option value="PIE" id="pie" --><?php //if($specialization_ug=="PIE") echo "selected" ?><!-- >Production and Industrial Engineering(PIE)</option>-->
<!--                        <option value="IT" id="it" --><?php //if($specialization_ug=="IT") echo "selected" ?><!-- >Information Technology(IT)</option>-->
<!--                        <option value="EEE" id="eee" --><?php //if($specialization_ug=="EEE") echo "selected" ?><!-- >Electrical And Electronics Engineering (EEE)</option>-->
<!--                        <option value="BT" id="bt" --><?php //if($specialization_ug=="BT") echo "selected" ?><!-- >Biotechnology</option>-->
<!--                        <option value="CHE" id="che" --><?php //if($specialization_ug=="CHE") echo "selected" ?><!-- >Chemical Engineering (CE)</option>-->
<!--                        <option value="IE" id="ie" --><?php //if($specialization_ug=="IE") echo "selected" ?><!-- >Industrial Engineering (IE)</option>-->
<!--                        <option value="AE" id="ae" --><?php //if($specialization_ug=="AE") echo "selected" ?><!-- >Aerospace engineering (AE)</option>-->
<!--                        <option value="Others" id="others" --><?php //if($specialization_ug=="Others") echo "selected" ?><!-- >Others</option>-->
<!--                    </select>-->
                        <input type="text" class="form-control" id="specialization_ug" name="ug_specialization"  value="<?=$specialization_ug?>" required>
                </div>
            </div>


<!--                <div class="form-group otherscome3"   id="otherscome1" --><?php //if(isset($specialization_ug) && $specialization_ug=="Others") echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?><!-- >-->
<!--                    <label class="control-label col-sm-2" for="specialization_ug"><span class="text-danger">*</span>Others:</label>-->
<!--                    <div class="col-sm-4">-->
<!--                        <input type="text" class="form-control"  id="specialization_ug" --><?php //if(isset($specialization_ug) && $specialization_ug=="Others") echo "value=\"$is_others_spec\" required "; ?><!-- name="ug_other_specs"  >-->
<!--                    </div>-->
<!--                </div>-->







                <div class="form-group">
                    <label class="control-label col-sm-2" for="from"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control from_1" name="ug_start_date" required id="from" value="<?= $start_date_ug?>"  > 
                    </div>
                    <label class="control-label col-sm-3" for="to"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control to_1"   name="ug_end_date" required id="to" value="<?= $completion_date_ug?>"> <span class="text-danger"   >(DD-MM-YYYY)</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"> <span class="text-danger">*</span>Marking Scheme:</label>
                    <div class=" col-sm-5" >

                        <label class="radio-inline" for="per_or_cgp_ug0">
                            <input type="radio" id="per_or_cgp_ug0" class="radio-inline" value="0" name="ug_per_or_cgp" required  <?php if(isset($per_or_cgpa_ug) && $per_or_cgpa_ug=='0') echo 'checked="checked"'; ?> >CGPA<br></label>
                        <label class="radio-inline" for="per_or_cgp_ug1">
                            <input type="radio" id="per_or_cgp_ug1" class="radio-inline" value="1" name="ug_per_or_cgp" required  <?php if(isset($per_or_cgpa_ug) && $per_or_cgpa_ug=='1') echo 'checked="checked"'; ?> >Percentage
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="marks_ug"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control marks event_marks"   name="ug_marks" required id="marks_ug" value="<?= $marks_ug?>">
                    </div>
                    <label class="control-label col-sm-2" for="max_marks_ug"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control max_marks event_marks"  name="ug_max_marks" required id="max_marks_ug" value="<?= $max_marks_ug?>">
                    </div>
                </div>




                <div class="form-group">

                    <label class="control-label col-sm-3" for="value_ug"><span class="text-danger">*</span> % Marks/CGPA :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   id="value_ug" name="ug_perc_marks" readonly value="">
                    </div>
                </div>
                <input type="hidden" name="ug_perc_marks" value="<?= $value_ug?>">

                <div class="form-group">
                    <label class="control-label col-sm-3" for="doc_ug"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                    <div class="col-sm-5">
                        <input type="file"  name="doc_ug" id="doc_ug" required>
                        <span class="text-danger">*Max File Size 1MB. PDF Documents Required</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" name="edu_ch_3" class="btn btn-primary col-sm-12">Submit Information</button>
                    </div>
                </div>
            </div>
            </form>
            <!------------------------------------------Double UG--------------------------------------------------------------------->
    <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
        <div id="dug" class="qual_div"  style=" display: none;">
            <div id="dug" class="form-group">
                <label class="control-label col-sm-2" for="university_dug"><span class="text-danger">*</span> University:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="dug_university" id="university_dug" required value="<?= $university_dug?>"  >
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="degree1"><span class="text-danger">*</span> Degree:</label>

                <div class="col-sm-3">
                    <select id="degree1" name="dug_degree" required class="form-control degree2">
                        <option value="BA" id="ba" <?php if($degree_dug=="BA") echo "selected" ?> >Bachelor of Arts (BA)</option>
                        <option value="B.Sc" id="bsc" <?php if($degree_dug=="B.Sc") echo "selected" ?> >Bachelor of Science (B.Sc)</option>
                        <option value="B.Com" id="ms" <?php if($degree_dug=="B.Com") echo "selected" ?> >Bachelor of Commerce (B.Com)</option>
                        <option value="BE" id="be" <?php if($degree_dug=="BE") echo "selected" ?> >Bachelor of Engineering (BE)</option>
                        <option value="B.Tech" id="btech" <?php if($degree_dug=="B.Tech") echo "selected" ?> >Bachelor of Technology (B.Tech)</option>
                        <option value="LLB" id="llb" <?php if($degree_dug=="LLB") echo "selected" ?> >Bachelor of Law (LLB)</option>
                        <option value="BCA" id="bca" <?php if($degree_dug=="BCA") echo "selected" ?> >Bachelor of Computer Application (BCA)</option>
                        <option value="BBA" id="bba" <?php if($degree_dug=="BBA") echo "selected" ?> >Bachelor of Business Administration (BBA)</option>
                        <option value="B.Pharma" id="bpharma" <?php if($degree_dug=="B.Pharma") echo "selected" ?> >Bachelor of Pharmacy (B.Pharma)</option>
                        <option value="B.Arch" id="barch" <?php if($degree_dug=="B.Arch") echo "selected" ?> >Bachelor of Architecture (B.Arch)</option>
                        <option value="BDS" id="bds" <?php if($degree_dug=="BDS") echo "selected" ?> >Bachelor of Dental Surgery (BDS)</option>
                        <option value="BHMS" id="bhms" <?php if($degree_dug=="BHMS") echo "selected" ?> >Bachelor of Homeopathic Medicine & Surgery (BHMS)</option>
                        <option value="BAMS" id="bams" <?php if($degree_dug=="BAMS") echo "selected" ?> >Bachelor of Ayurvedic Medicine & Surgery (BAMS)</option>
                        <option value="BHM" id="bhm" <?php if($degree_dug=="BHM") echo "selected" ?> >Bachelor of Hotel Management (BHM)</option>
                        <option value="B.P.Ed" id="bped" <?php if($degree_dug=="B.P.Ed") echo "selected" ?> >Bachelor of Physical Education (B.P.Ed)</option>
                        <option value="B.Ed" id="bed" <?php if($degree_dug=="B.Ed") echo "selected" ?> >Bachelor of Education (B.Ed)</option>
                        <option value="BHMS2" id="bhms2" <?php if($degree_dug=="BHMS2") echo "selected" ?> >Bachelor of Hospitality Management</option>
                        <option value="Others" id="others" <?php if($degree_dug=="Others") echo "selected" ?> >Others</option>
                    </select>
                </div>
            </div>


            <div class="form-group otherscome2"   id="otherscome1" <?php if(isset($degree_dug) && $degree_dug=="Others") echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?> >
                <label class="control-label col-sm-2" for="degree_dug"><span class="text-danger">*</span>Others:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  id="degree_dug" <?php if(isset($degree_dug) && $degree_dug=="Others") echo "value=\"$is_others_dug\" required "; ?> name="dug_other_degree"  >
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-sm-2" for="specialization_dug"><span class="text-danger">*</span>Specialization:</label>
                <div class="col-sm-4" >
                    <!--                    <select id="specialization_dug" name="dug_specialization" required class="form-control degree3">-->
                    <!--                        <option value="CSE" id="cse" --><?php //if($specialization_dug=="CSE") echo "selected" ?><!-- >Computer Science Engineering (CSE)</option>-->
                    <!--                        <option value="ECE" id="ece" --><?php //if($specialization_dug=="ECE") echo "selected" ?><!-- >Electronics and Communication Engineering (ECE)</option>-->
                    <!--                        <option value="CE" id="ce" --><?php //if($specialization_dug=="CE") echo "selected" ?><!-- >Civil Engineering (CE)</option>-->
                    <!--                        <option value="EE" id="ee" --><?php //if($specialization_dug=="EE") echo "selected" ?><!-- >Electrical Engineering (EE)</option>-->
                    <!--                        <option value="ME" id="me" --><?php //if($specialization_dug=="ME") echo "selected" ?><!-- >Mechanical Engineering(ME)</option>-->
                    <!--                        <option value="PIE" id="pie" --><?php //if($specialization_dug=="PIE") echo "selected" ?><!-- >Production and Industrial Engineering(PIE)</option>-->
                    <!--                        <option value="IT" id="it" --><?php //if($specialization_dug=="IT") echo "selected" ?><!-- >Information Technology(IT)</option>-->
                    <!--                        <option value="EEE" id="eee" --><?php //if($specialization_dug=="EEE") echo "selected" ?><!-- >Electrical And Electronics Engineering (EEE)</option>-->
                    <!--                        <option value="BT" id="bt" --><?php //if($specialization_dug=="BT") echo "selected" ?><!-- >Biotechnology</option>-->
                    <!--                        <option value="CHE" id="che" --><?php //if($specialization_dug=="CHE") echo "selected" ?><!-- >Chemical Engineering (CE)</option>-->
                    <!--                        <option value="IE" id="ie" --><?php //if($specialization_dug=="IE") echo "selected" ?><!-- >Industrial Engineering (IE)</option>-->
                    <!--                        <option value="AE" id="ae" --><?php //if($specialization_dug=="AE") echo "selected" ?><!-- >Aerospace engineering (AE)</option>-->
                    <!--                        <option value="Others" id="others" --><?php //if($specialization_dug=="Others") echo "selected" ?><!-- >Others</option>-->
                    <!--                    </select>-->
                    <input type="text" class="form-control" id="specialization_dug" name="dug_specialization"  value="<?=$specialization_dug?>" required>
                </div>
            </div>


            <!--                <div class="form-group otherscome3"   id="otherscome1" --><?php //if(isset($specialization_dug) && $specialization_dug=="Others") echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?><!-- >-->
            <!--                    <label class="control-label col-sm-2" for="specialization_dug"><span class="text-danger">*</span>Others:</label>-->
            <!--                    <div class="col-sm-4">-->
            <!--                        <input type="text" class="form-control"  id="specialization_dug" --><?php //if(isset($specialization_dug) && $specialization_dug=="Others") echo "value=\"$is_others_spec\" required "; ?><!-- name="dug_other_specs"  >-->
            <!--                    </div>-->
            <!--                </div>-->







            <div class="form-group">
                <label class="control-label col-sm-2" for="from"><span class="text-danger">*</span> Entry Date :</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control from_1" name="dug_start_date" required id="from" value="<?= $start_date_dug?>"  >
                </div>
                <label class="control-label col-sm-3" for="to"><span class="text-danger">*</span> Completion Date:</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control to_1"   name="dug_end_date" required id="to" value="<?= $completion_date_dug?>"> <span class="text-danger"   >(DD-MM-YYYY)</span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-3" for="email"> <span class="text-danger">*</span>Marking Scheme:</label>
                <div class=" col-sm-5" >

                    <label class="radio-inline" for="per_or_cgp_dug0">
                        <input type="radio" id="per_or_cgp_dug0" class="radio-inline" value="0" name="dug_per_or_cgp" required  <?php if(isset($per_or_cgpa_dug) && $per_or_cgpa_dug=='0') echo 'checked="checked"'; ?> >CGPA<br></label>
                    <label class="radio-inline" for="per_or_cgp_dug1">
                        <input type="radio" id="per_or_cgp_dug1" class="radio-inline" value="1" name="dug_per_or_cgp" required  <?php if(isset($per_or_cgpa_dug) && $per_or_cgpa_dug=='1') echo 'checked="checked"'; ?> >Percentage
                    </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="marks_dug"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control marks event_marks"   name="dug_marks" required id="marks_dug" value="<?= $marks_dug?>">
                </div>
                <label class="control-label col-sm-2" for="max_marks_dug"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control max_marks event_marks"  name="dug_max_marks" required id="max_marks_dug" value="<?= $max_marks_dug?>">
                </div>
            </div>




            <div class="form-group">

                <label class="control-label col-sm-3" for="value_dug"><span class="text-danger">*</span> % Marks/CGPA :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   id="value_dug" name="dug_perc_marks" readonly value="">
                </div>
            </div>
            <input type="hidden" name="dug_perc_marks" value="<?= $value_dug?>">

            <div class="form-group">
                <label class="control-label col-sm-3" for="doc_dug"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                <div class="col-sm-5">
                    <input type="file"  name="doc_dug" id="doc_dug" required>
                    <span class="text-danger">*Max File Size 1MB. PDF Documents Required</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" name="edu_ch_5" class="btn btn-primary col-sm-12">Submit Information</button>
                </div>
            </div>
        </div>
    </form>
            <!-------------------------------------------------------------PG---------------------------------------------------------->
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
            <div id="pg"  class="qual_div" style=" display: none;">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="degree"><span class="text-danger">*</span> Degree:</label>

                    <div class="col-sm-3">
                        <select id="degree" name="pg_field" required class="form-control degree2">
                            <option value="M.Tech" id="mtech" <?php if($degree_pg=="M.Tech") echo "selected" ?> >Master of Tech (M.Tech)</option>
                            <option value="MSC" id="msc" <?php if($degree_pg=="MSC") echo "selected" ?> >Master of Science (M.Sc)</option>
                            <option value="MS" id="ms" <?php if($degree_pg=="MS") echo "selected" ?> >Master of Science (MS)</option>
                            <option value="ME" id="me" <?php if($degree_pg=="ME") echo "selected" ?> >Master of Engineering (ME)</option>
                            <option value="MA" id="ma" <?php if($degree_pg=="MA") echo "selected" ?> >Master of Arts (MA)</option>
                            <option value="MHM" id="mh," <?php if($degree_pg=="MHM") echo "selected" ?> >Master of Hotel Management (MHM)</option>
                            <option value="MCA" id="mca" <?php if($degree_pg=="MCA") echo "selected" ?> >Master of Computer Applications (MCA)</option>
                            <option value="Others" id="others" <?php if($degree_pg=="Others") echo "selected" ?> >Others</option>
                        </select>
                    </div>
                </div>


                <div class="form-group otherscome2"   id="otherscome" <?php if(isset($degree_pg) && $degree_pg=="Others") echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?> >
                    <label class="control-label col-sm-2" for="degree_pg"><span class="text-danger">*</span>Others:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  id="degree_pg" <?php if(isset($degree_pg) && $degree_pg=="Others") echo "value=\"$is_others_pg\" required "; ?> name="pg_other_specialization" >
                    </div>
                </div>

                <div id="pg" class="form-group">
                    <label class="control-label col-sm-2" for="specialization_pg"><span class="text-danger">*</span>Specialization:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="pg_specialization" id="specialization_pg" required value="<?= $specialization_pg?>"   >
                    </div>
                </div>



                <div id="pg" class="form-group">
                    <label class="control-label col-sm-2" for="university_pg"><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="pg_university"  required value="<?= $university_pg?>" id="university_pg">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="from"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control from_1"   name="pg_start_date" required id="from" value="<?= $start_date_pg?>"> 
                    </div>
                    <label class="control-label col-sm-2" for="to"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control to_1"   name="pg_end_date" required id="to" value="<?= $completion_date_pg?>" > 
                    </div>
                </div>








                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span>Marking Scheme:</label>
                    <div class=" col-sm-5" >

                        <label class="radio-inline " for="per_or_cgp_pg0">
                            <input type="radio" class="radio-inline" id="per_or_cgp_pg0" value="0" name="pg_per_or_cgp" required  <?php if(isset($per_or_cgpa_pg) && $per_or_cgpa_pg=='0') echo 'checked="checked"'; ?> >CGPA<br></label>
                        <label class="radio-inline" for="per_or_cgp_pg1">
                            <input type="radio" class="radio-inline" id="per_or_cgp_pg1" value="1" name="pg_per_or_cgp" required  <?php if(isset($per_or_cgpa_pg) && $per_or_cgpa_pg=='1') echo 'checked="checked"'; ?> >Percentage
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="marks_pg"><span class="text-danger" >*</span> Marks/CGPA Obtained :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control marks event_marks"   name="pg_marks" required id="marks_pg" value="<?= $marks_pg?>" >
                    </div>
                    <label class="control-label col-sm-2" for="max_marks_pg"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control max_marks event_marks"  name="pg_max_marks" required id="max_marks_pg"  value="<?= $max_marks_pg?>" >
                    </div>
                </div>




                <div class="form-group">

                    <label class="control-label col-sm-3" for="value_pg"><span class="text-danger">*</span> % Marks/CGPA :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_perc_marks" readonly  value="" id="value_pg" >
                    </div>
                </div>
                <input type="hidden" name="pg_perc_marks" value="<?= $value_pg?>">

                <div class="form-group">
                    <label class="control-label col-sm-3" for="doc_pg"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                    <div class="col-sm-5">
                        <input type="file"  name="doc_pg" id="doc_pg" required>
                        <span class="text-danger">*Max File Size 1MB. PDF Documents Required</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" name="edu_ch_4" class="btn btn-primary col-sm-12">Submit Information</button>
                    </div>
                </div>

            </div>
    </form>

                <!-------------------------------------Double PG -------------------------------------------------------->
    <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
        <div id="dpg"  class="qual_div" style=" display: none;">

            <div class="form-group">
                <label class="control-label col-sm-2" for="degree"><span class="text-danger">*</span> Degree:</label>

                <div class="col-sm-3">
                    <select id="degree" name="dpg_field" required class="form-control degree2">
                        <option value="M.Tech" id="mtech" <?php if($degree_dpg=="M.Tech") echo "selected" ?> >Master of Tech (M.Tech)</option>
                        <option value="MSC" id="msc" <?php if($degree_dpg=="MSC") echo "selected" ?> >Master of Science (M.Sc)</option>
                        <option value="MS" id="ms" <?php if($degree_dpg=="MS") echo "selected" ?> >Master of Science (MS)</option>
                        <option value="ME" id="me" <?php if($degree_dpg=="ME") echo "selected" ?> >Master of Engineering (ME)</option>
                        <option value="MA" id="ma" <?php if($degree_dpg=="MA") echo "selected" ?> >Master of Arts (MA)</option>
                        <option value="MHM" id="mh," <?php if($degree_dpg=="MHM") echo "selected" ?> >Master of Hotel Management (MHM)</option>
                        <option value="MCA" id="mca" <?php if($degree_dpg=="MCA") echo "selected" ?> >Master of Computer Applications (MCA)</option>
                        <option value="Others" id="others" <?php if($degree_dpg=="Others") echo "selected" ?> >Others</option>
                    </select>
                </div>
            </div>


            <div class="form-group otherscome2"   id="otherscome" <?php if(isset($degree_dpg) && $degree_dpg=="Others") echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?> >
                <label class="control-label col-sm-2" for="degree_dpg"><span class="text-danger">*</span>Others:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  id="degree_dpg" <?php if(isset($degree_dpg) && $degree_dpg=="Others") echo "value=\"$is_others_dpg\" required "; ?> name="dpg_other_specialization" >
                </div>
            </div>

            <div id="dpg" class="form-group">
                <label class="control-label col-sm-2" for="specialization_dpg"><span class="text-danger">*</span>Specialization:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="dpg_specialization" id="specialization_dpg" required value="<?= $specialization_dpg?>"   >
                </div>
            </div>



            <div id="dpg" class="form-group">
                <label class="control-label col-sm-2" for="university_dpg"><span class="text-danger">*</span> University:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control"  name="dpg_university"  required value="<?= $university_dpg?>" id="university_dpg">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="from"><span class="text-danger">*</span> Entry Date :</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control from_1"   name="dpg_start_date" required id="from" value="<?= $start_date_dpg?>">
                </div>
                <label class="control-label col-sm-2" for="to"><span class="text-danger">*</span> Completion Date:</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control to_1"   name="dpg_end_date" required id="to" value="<?= $completion_date_dpg?>" >
                </div>
            </div>








            <div class="form-group">
                <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span>Marking Scheme:</label>
                <div class=" col-sm-5" >

                    <label class="radio-inline " for="per_or_cgp_dpg0">
                        <input type="radio" class="radio-inline" id="per_or_cgp_dpg0" value="0" name="dpg_per_or_cgp" required  <?php if(isset($per_or_cgpa_dpg) && $per_or_cgpa_dpg=='0') echo 'checked="checked"'; ?> >CGPA<br></label>
                    <label class="radio-inline" for="per_or_cgp_dpg1">
                        <input type="radio" class="radio-inline" id="per_or_cgp_dpg1" value="1" name="dpg_per_or_cgp" required  <?php if(isset($per_or_cgpa_dpg) && $per_or_cgpa_dpg=='1') echo 'checked="checked"'; ?> >Percentage
                    </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="marks_dpg"><span class="text-danger" >*</span> Marks/CGPA Obtained :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control marks event_marks"   name="dpg_marks" required id="marks_dpg" value="<?= $marks_dpg?>" >
                </div>
                <label class="control-label col-sm-2" for="max_marks_dpg"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control max_marks event_marks"  name="dpg_max_marks" required id="max_marks_dpg"  value="<?= $max_marks_dpg?>" >
                </div>
            </div>




            <div class="form-group">

                <label class="control-label col-sm-3" for="value_dpg"><span class="text-danger">*</span> % Marks/CGPA :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="dpg_perc_marks" readonly  value="" id="value_dpg" >
                </div>
            </div>
            <input type="hidden" name="dpg_perc_marks" value="<?= $value_dpg?>">

            <div class="form-group">
                <label class="control-label col-sm-3" for="doc_dpg"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                <div class="col-sm-5">
                    <input type="file"  name="doc_dpg" id="doc_dpg" required>
                    <span class="text-danger">*Max File Size 1MB. PDF Documents Required</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" name="edu_ch_6" class="btn btn-primary col-sm-12">Submit Information</button>
                </div>
            </div>

        </div>
    </form>
</div>



<script>

</script>

<script>
    $(document).ready(function () {

        $('.degree2').change(function () {
            var val = $(this).val();
            //console.log(val);
            if (val === "Others")
                $('.otherscome2').stop(true, true).show(200).attr("required","true"); //than show
            else
                $('.otherscome2').stop(true, true).hide(200).removeAttr("required"); //than hide


        });

        function update_perc_cpi_sel(sel_div)
        {
            // console.log('change');
            var marks = $(sel_div).parents('form').find(".marks");
            var max_marks = $(sel_div).parents('form').find(".max_marks");
            var marks_fl = parseFloat(marks.val());
            var max_marks_fl = parseFloat(max_marks.val());
            // console.log(marks_fl+" "+max_marks_fl);
            if(max_marks_fl === 0)
            {
                alert("Max Marks is zero . Change the value to a valid number");
                $(marks).val("");
                $(max_marks).val("");
            }

            if(marks_fl>max_marks_fl)
            {
                alert("Max Marks is less than your original marks");
                $(marks).val("");
                $(max_marks).val();
            }

            var ans=marks_fl/max_marks_fl;
            // console.log(ans);
            var x= $(sel_div).parents("form").find("input[type=radio]:checked").val();
            //console.log(x);
            if(x === '1') {
                // console.log(ans);
                ans = ans * 100;
				ans=ans.toFixed(2);
                $(sel_div).parents("form").find("input[readonly]").val(ans);
            }
            else
            {
                $(sel_div).parents("form").find("input[readonly]").val(marks.val()+"/"+max_marks.val());

            }
            ans=ans.toFixed(2);
            $(sel_div).parents("form").find("input[type=hidden]").val(ans);
            //console.log(ans);
        }
        update_perc_cpi_sel("#10th");


        $("#qual").change(function(){
            var qual  = $("#qual").val();
            $(".qual_div").hide();
            qual = "#".concat(qual);
            $(qual).show();
            update_perc_cpi_sel(qual);

        });


    });

</script>


<script>
    $(document).ready(function () {

        $('.degree3').change(function () {
            var val = $(this).val();
            //console.log(val);
            if (val === "Others")
                $('.otherscome3').stop(true, true).show(200).attr("required","true"); //than show
            else
                $('.otherscome3').stop(true, true).hide(200).removeAttr("required"); //than hide


        });

    });

</script>

<script>


    function update_perc_cpi()
    {
        // console.log('change');
        var marks = $(this).parents('form').find(".marks");
        var max_marks = $(this).parents('form').find(".max_marks");
        var marks_fl = parseFloat(marks.val());
        var max_marks_fl = parseFloat(max_marks.val());
        // console.log(marks_fl+" "+max_marks_fl);
        if(max_marks_fl === 0)
        {
            alert("Max Marks is zero . Change the value to a valid number");
            $(marks).val("");
            $(max_marks).val("");
        }

        if(marks_fl>max_marks_fl)
        {
            alert("Max Marks is less than your original marks");
            $(marks).val("");
            $(max_marks).val();
        }

        var ans=marks_fl/max_marks_fl;
        // console.log(ans);
        var x= $(this).parents("form").find("input[type=radio]:checked").val();
        //console.log(x);
        if(x === '1') {
            // console.log(ans);
            ans = ans * 100;
			ans=ans.toFixed(2);
            $(this).parents("form").find("input[readonly]").val(ans);
        }
        else
        {
            $(this).parents("form").find("input[readonly]").val(marks.val()+"/"+max_marks.val());

        }
        ans=ans.toFixed(2);
        $(this).parents("form").find("input[type=hidden]").val(ans);
        //console.log(ans);
    }
    $(".event_marks").on('focusout',update_perc_cpi);

    $(".radio-inline").on('change',update_perc_cpi);


</script>


<script>
    $("input[type=date").on('focusout',function(){
       // console.log('change');
        var from_date = $(this).parents(".form-group").find('.from_1');
        var to_date = $(this).parents(".form-group").find('.to_1');
        var fd=new Date(from_date.val());
        var td=new Date(to_date.val());
        //console.log(from_date.val());
        //console.log(to_date.val());
        var diff=datediff(fd,td);
        if(diff<0)
        {
            alert('Invalid dates: FROM date should be before TO date');
            $(this).val("");

        }

    });
</script>

