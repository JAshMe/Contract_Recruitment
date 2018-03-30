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
 $field_d=$start_date_d=$end_data_d=$per_or_cgpa_d=$value_d=$marks_d=$max_marks_d=$university_d=null;
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
 }
// }
?>


    <?php
    $id=$_SESSION['user'];
    $query="SELECT * from `ug` where `user_id` like '$id'";
    $c = $db->process_query($query);
    $degree_ug=$specialization_ug=$start_date_ug=$completion_date_ug=$per_or_cgpa_ug=$value_ug=$marks_ug=$max_marks_ug=$university_ug=null;
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
    }
    ?>
    <?php
    $id=$_SESSION['user'];
    $query="SELECT * from `pg` where `user_id` like '$id'";
    $c = $db->process_query($query);
    $degree_pg=$specialization_pg=$start_date_pg=$completion_date_pg=$per_or_cgpa_pg=$value_pg=$marks_pg=$max_marks_pg=$university_pg=null;
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
    }
    ?>
    <p align="justify" class="larger-font">

    <ul class="text-danger">
        <li> * Marked fields are mandatory.</li>
    </ul>
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
                        <option value="pg">Post Graduate</option>
                    </select>
                </div>
            </div>
            <hr>
        </div>
    </form>
<!--   -----------------------------10th Div ---------------------------------------------->
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
                <div id ="10th" class="qual_div">

                    <div class="row">
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
                    </div>


                        <div id="10th" class="form-group">
                            <label class="control-label col-sm-3" for="school_1th"><span class="text-danger">*</span> School Name:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="school_1th" name="school_10th"  required value="<?= $school_10?>" >
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
                            <label class="control-label col-sm-3" for="marks"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="marks_10th" required id="marks" value="<?= $marks_10?>" >
                            </div>
                            <label class="control-label col-sm-2" for="max_marks"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="max_marks_10th" required id="max_marks" value="<?= $max_marks_10?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="per_or_cgp_10"><span class="text-danger">*</span> % Marks/CGPA :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   id="per_or_cgp_10" name="perc_marks_10th" readonly value="<?= $marks_10?>" >
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="doc_10th"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                        <div class="col-sm-5">
                            <input type="file"  name="doc_10th" id="doc_10th" required>
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
                            <select id="degree2" name="dip_field" required class="form-control">
                                <option value="EE" id="ee" <?php if($field_d=="EE") echo "selected" ?> >Electical Engineering</option>
                                <option value="CE" id="ce" <?php if($field_d=="CE") echo "selected" ?> >Civil Engineering</option>
                                <option value="Others" id="others2" <?php if($field_d=="Others") echo "selected" ?> >Others</option>
                            </select>
                        </div>
                        </div>


                <div class="form-group"   id="otherscome2" <?php if(isset($field_d) && $field_d=='Others') echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?> >
                    <label class="control-label col-sm-2" for="degree_d"><span class="text-danger">*</span>Others:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  id="degree_d" <?php if(isset($field_d) && $field_d=="Others") echo "value=\"$field_d\" required "; ?> name="dip_other_degree" >
                    </div>
                </div>



                <div class="form-group">
                            <label class="control-label col-sm-2" for="university_d" ><span class="text-danger">*</span> University:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"  id="university_d" name="dip_university"  required value="<?= $university_d?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="from"><span class="text-danger">*</span> Entry Date :</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   name="dip_start_date" required id="from" value="<?= $start_date_d?>" > <span class="text-danger">(DD-MM-YYYY)</span>
                            </div>
                            <label class="control-label col-sm-2" for="to"><span class="text-danger">*</span> Completion Date:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   name="dip_end_date" required id="to" value="<?= $end_data_d?>" > <span class="text-danger">(DD-MM-YYYY)</span>
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
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="dip_marks" required id="marks" value="<?= $marks_d?>" >
                            </div>
                            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="dip_max_marks" required id="max_marks" value="<?= @$max_marks_d?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="value_d"><span class="text-danger">*</span> % Marks/CGPA :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"  id="value_d" name="dip_perc_marks" readonly value="<?= $value_d?>" >
                            </div>
                        </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="doc_diploma"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                    <div class="col-sm-5">
                        <input type="file"  name="doc_diploma" id="pdf1" required>
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

                    <div class="row">
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
                    </div>


                    <div id="10th" class="form-group">
                        <label class="control-label col-sm-3" for="school_12th"><span class="text-danger">*</span> School Name :</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"  name="school_12th"  id="school_12th" value="<?= $school_12 ?>" required>
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
                        <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"   name="marks_12th" required id="marks" value="<?= @$marks_12?>"  >
                        </div>
                        <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  name="max_marks_12th" required id="max_marks" value="<?= $max_marks_12?>"  >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="per_or_cgp_12"><span class="text-danger">*</span> % Marks/CGPA :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"   name="perc_marks_12th" readonly value="<?= $value_12?>"  id="per_or_cgp_12" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="doc_12th"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                        <div class="col-sm-5">
                            <input type="file"  name="doc_12th" id="doc_12th" required>
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


                <div class="form-group">
                    <label class="control-label col-sm-2" for="degree1"><span class="text-danger">*</span> Degree:</label>

                    <div class="col-sm-3">
                        <select id="degree1" name="ug_degree" required class="form-control">
                            <option value="BA" id="ba" <?php if($degree_ug=="BA") echo "selected" ?> >Bachelor of Arts (BA)</option>
                            <option value="B.Sc" id="bsc" <?php if($degree_ug=="B.Sc") echo "selected" ?> >Bachelor of Science (B.Sc)</option>
                            <option value="B.Com" id="ms" <?php if($degree_ug=="B.Com") echo "selected" ?> >Bachelor of Commerce (B.Com)</option>
                            <option value="BE" id="be" <?php if($degree_ug=="BE") echo "selected" ?> >Bachelor of Engineering (BE)</option>
                            <option value="B.Tech" id="btech" <?php if($degree_ug=="B.Tech)") echo "selected" ?> >Bachelor of Technology (B.Tech)</option>
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
                            <option value="Others" id="others" <?php if($degree_ug=="Others") echo "selected" ?> >Others</option>
                        </select>
                    </div>
                </div>


                <div class="form-group"   id="otherscome1" <?php if(isset($degree_ug) && $degree_ug=='Others') echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?> >
                    <label class="control-label col-sm-2" for="degree_ug"><span class="text-danger">*</span>Others:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  id="degree_ug" <?php if(isset($degree_ug) && $degree_ug=='Others') echo "value=\"$degree_ug\" required "; ?> name="ug_other_degree"  >
                    </div>
                </div>



                <div id="ug" class="form-group">
                <label class="control-label col-sm-2" for="specialization_ug"><span class="text-danger">*</span>Specialization:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="ug_specialization" id="specialization_ug" required value="<?= $specialization_ug?>"   >
                    </div>
                </div>

                <div id="ug" class="form-group">
                    <label class="control-label col-sm-2" for="university_ug"><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  name="ug_university" id="university_ug" required value="<?= $university_ug?>"  >
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="from"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="ug_start_date" required id="from" value="<?= $start_date_ug?>"  > <span class="text-danger">(DD-MM-YYYY)</span>
                    </div>
                    <label class="control-label col-sm-3" for="to"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="ug_end_date" required id="to" value="<?= $completion_date_ug?>"> <span class="text-danger"   >(DD-MM-YYYY)</span>
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
                    <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="ug_marks" required id="marks" value="<?= $marks_ug?>">
                    </div>
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  name="ug_max_marks" required id="max_marks" value="<?= $max_marks_ug?>">
                    </div>
                </div>




                <div class="form-group">

                    <label class="control-label col-sm-3" for="value_ug"><span class="text-danger">*</span> % Marks/CGPA :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   id="value_ug" name="ug_perc_marks" readonly value="<?= $value_ug?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="doc_ug"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                    <div class="col-sm-5">
                        <input type="file"  name="doc_ug" id="doc_ug" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" name="edu_ch_3" class="btn btn-primary col-sm-12">Submit Information</button>
                    </div>
                </div>
            </div>
            </form>
            <!-------------------------------------------------------------PG---------------------------------------------------------->
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
            <div id="pg"  class="qual_div" style=" display: none;">



                <div id="pg" class="form-group">
                    <label class="control-label col-sm-2" for="university_pg"><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="pg_university"  required value="<?= $university_pg?>" id="university_pg">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="from"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="pg_start_date" required id="from" value="<?= $start_date_pg?>"> <span class="text-danger">(DD-MM-YYYY)</span>
                    </div>
                    <label class="control-label col-sm-2" for="to"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="pg_end_date" required id="to" value="<?= $completion_date_pg?>" > <span class="text-danger">(DD-MM-YYYY)</span>
                    </div>
                </div>



                    <div class="form-group">
                        <label class="control-label col-sm-2" for="degree"><span class="text-danger">*</span> Degree:</label>

                        <div class="col-sm-3">
                            <select id="degree" name="pg_field" required class="form-control">
                                <option value="M Tech" id="mtech" <?php if($degree_pg=="M Tech") echo "selected" ?> >Master of Tech (M.Tech)</option>
                                <option value="MSC" id="msc" <?php if($degree_pg=="MSC") echo "selected" ?> >Master of Science (M.Sc)</option>
                                <option value="MS" id="ms" <?php if($degree_pg=="MS") echo "selected" ?> >Master of Science (MS)</option>
                                <option value="ME" id="me" <?php if($degree_pg=="ME") echo "selected" ?> >Master of Engineering (ME)</option>
                                <option value="Others" id="others" <?php if($degree_pg=="Others") echo "selected" ?> >Others</option>
                            </select>
                        </div>
                    </div>


                <div class="form-group"   id="otherscome" <?php if(isset($degree_pg) && $degree_pg=='Others') echo"style=\"display:block\""; else echo "style=\"display:none\"; ";?> >
                    <label class="control-label col-sm-2" for="degree_pg"><span class="text-danger">*</span>Others:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  id="degree_pg" <?php if(isset($degree_pg) && $degree_pg=='Others') echo "value=\"$degree_pg\" required "; ?> name="pg_other_specialization" >
                    </div>
                </div>

                <div id="ug" class="form-group">
                    <label class="control-label col-sm-2" for="specialization_pg"><span class="text-danger">*</span>Specialization:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="pg_specialization" id="specialization_pg" required value="<?= $specialization_ug?>"   >
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span>Marking Scheme:</label>
                    <div class=" col-sm-5" >

                        <label class="radio-inline" for="per_or_cgp_pg0">
                            <input type="radio" class="radio-inline" id="per_or_cgp_pg0" value="0" name="pg_per_or_cgp" required  <?php if(isset($per_or_cgpa_pg) && $per_or_cgpa_pg=='0') echo 'checked="checked"'; ?> >CGPA<br></label>
                        <label class="radio-inline" for="per_or_cgp_pg1">
                            <input type="radio" class="radio-inline" id="per_or_cgp_pg1" value="1" name="pg_per_or_cgp" required  <?php if(isset($per_or_cgpa_pg) && $per_or_cgpa_pg=='1') echo 'checked="checked"'; ?> >Percentage
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="marks"><span class="text-danger" >*</span> Marks/CGPA Obtained :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_marks" required id="marks" value="<?= $marks_pg?>" >
                    </div>
                    <label class="control-label col-sm-2" for="max_marks"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  name="pg_max_marks" required id="max_marks"  value="<?= $max_marks_pg?>" >
                    </div>
                </div>




                <div class="form-group">

                    <label class="control-label col-sm-3" for="value"><span class="text-danger">*</span> % Marks/CGPA :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_perc_marks" readonly  value="<?= $value_pg?>" id="value" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="doc_pg"><span class="text-danger">*</span> Attach Appropriate proof:</label>
                    <div class="col-sm-5">
                        <input type="file"  name="doc_pg" id="doc_pg" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" name="edu_ch_4" class="btn btn-primary col-sm-12">Submit Information</button>
                    </div>
                </div>

            </div>
    </form>
</div>





    <script>
        function validate(){
            if($(this).children().filter('#from').val()>$(this).children().filter('#to').val()){
                alert("Completion Date must be greater than start date!");
                $(this).children().filter('#from').val('');
                $(this).children().filter('#to').val('');
                return false;
            }
            if( $(this).children().filter('#marks').val()> $(this).children().filter('#max_marks').val()){
                console.log( $(this).children().filter('#marks').val()+"  "+ $(this).children().filter('#max_marks').val());
                alert("Marks should not be greater than maximum marks!");
                $(this).children().filter('#marks').val('');
                $(this).children().filter('#max_marks').val('');
                return false;
            }
            return true;
        }
    </script>

<script>
    $("#qual").change(function(){
                var qual  = $("#qual").val();
                $(".qual_div").hide();
                qual = "#".concat(qual);
                $(qual).show();
    });
</script>

    <script>
        $(document).ready(function () {
            $('#otherscome').hide();

            $('#degree').change(function () {
                var val = $(this).val();
                if (val === "Others")
                    $('#otherscome').stop(true, true).show(200).attr("required","true"); //than show
                else
                    $('#otherscome').stop(true, true).hide(200).removeAttr("required"); //than hide


            });
        });

        </script>

<script>
    $(document).ready(function () {
        $('#otherscome1').hide();

        $('#degree1').change(function () {
            var val = $(this).val();
            if (val === "Others")
                $('#otherscome1').stop(true, true).show(200).attr("required","true"); //than show
            else
                $('#otherscome1').stop(true, true).hide(200).removeAttr("required"); //than hide


        });
    });

</script>

<script>
    $(document).ready(function () {
        $('#otherscome2').hide();

        $('#degree2').change(function () {
            var val = $(this).val();
            if (val === "Others")
                $('#otherscome2').stop(true, true).show(200).attr("required","true"); //than show
            else
                $('#otherscome2').stop(true, true).hide(200).removeAttr("required"); //than hide


        });
    });

</script>
