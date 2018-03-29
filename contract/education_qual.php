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
            $board_10 = $r['board'];
            $comp_10 = $r['completion date'];
            $school_10 = $r['school'];
            $per_or_cgpa_10 = $r['per_or_cgpa'];
            $value_10 = $r['value'];
            $marks_10 = $r['marks'];
            $max_marks_10 = $r['max_marks'];
        }
?>



 <?php
 $id=$_SESSION['user'];
 $query="SELECT * from `12th_mark` where `user_id` like '$id'";
 $c = $db->process_query($query);
 /*while(($r = $db->fetch_rows($c)))
 {*/
 $board_12=$comp_12=$school_12=$per_or_cgpa_12=$value_12=$marks_12=$max_marks_12=null;
 if(mysqli_num_rows($c)>0) {
     $board_12 = $r['board'];
     $comp_12 = $r['completion_date'];
     $school_12 = $r['school'];
     $per_or_cgpa_12 = $r['per_or_cgpa'];
     $value_12 = $r['value'];
     $marks_12 = $r['marks'];
     $max_marks_12 = $r['max_marks'];
 }
 /*}*/

 ?>

 <?php
 $id=$_SESSION['user'];
 $query="SELECT * from `diploma` where `user_id` like '$id'";
 $c = $db->process_query($query);
// while(($r = $db->fetch_rows($c)))
// {
 $field_d=$start_date_d=$end_data_d=$per_or_cgpa_d=$value_d=$marks_d=$max_marks_d=$university_d=null;
 if(mysqli_num_rows($c)>0) {
     $field_d = $r['field'];
     $start_date_d = $r['start_date'];
     $end_data_d = $r['end_data'];
     $per_or_cgpa_d = $r['per_or_cgpa'];
     $value_d = $r['value'];
     $marks_d = $r['marks'];
     $max_marks_d = $r['max_marks'];
     $university_d = $r['university'];
 }
// }
?>


    <?php
    $id=$_SESSION['user'];
    $query="SELECT * from `ug` where `user_id` like '$id'";
    $c = $db->process_query($query);
    $degree_ug=$specialization_ug=$start_date_ug=$completion_date_ug=$per_or_cgpa_ug=$value_ug=$marks_ug=$max_marks_ug=$university_ug=null;
    if(mysqli_num_rows($c)>0) {
        $degree_ug = $r['degree'];
        $specialization_ug = $r['specialization'];
        $start_date_ug = $r['start_date'];
        $completion_date_ug = $r['completion_data'];
        $per_or_cgpa_ug = $r['per_or_cgpa'];
        $value_ug = $r['value'];
        $marks_ug = $r['marks'];
        $max_marks_ug = $r['max_marks'];
        $university_ug = $r['university'];
    }
    ?>
    <?php
    $id=$_SESSION['user'];
    $query="SELECT * from `pg` where `user_id` like '$id'";
    $c = $db->process_query($query);
    $degree_pg=$specialization_pg=$start_date_pg=$completion_date_pg=$per_or_cgpa_pg=$value_pg=$marks_pg=$max_marks_pg=$university_pg=null;
    if(mysqli_num_rows($c)>0) {
        $degree_pg = $r['degree'];
        $specialization_pg = $r['specialization'];
        $start_date_pg = $r['start_date'];
        $completion_date_pg = $r['completion_data'];
        $per_or_cgpa_pg = $r['per_or_cgpa'];
        $value_pg = $r['value'];
        $marks_pg = $r['marks'];
        $max_marks_pg = $r['max_marks'];
        $university_pg = $r['university'];
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
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
                <div id ="10th" class="qual_div">

                    <div class="row">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Completion Date:</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control"   name="10th_completion_date" required value="<?= $comp_10?>" >
                                </div>
                                <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Board:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board_10th" required value="<?= $board_10?>" >
                                </div>
                            </div>
                    </div>


                        <div id="10th" class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> School Name :</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"  name="school_10th"  required value="<?= $school_10?>" >
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                        <div class=" col-sm-3" for="dob">

                            <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="0" name="per_or_cgp_10th" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='CGPA') echo 'checked="checked"'; ?> >CGPA<br></label>
                            <label class="radio-inline">
                                <input type="radio" class="radio-inline" value="1" name="per_or_cgp_10th" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='Percentage') echo 'checked="checked"'; ?> >Percentage
                            </label>
                        </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="marks_10th" required id="marks" value="<?= $marks_10?>" >
                            </div>
                            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="max_marks_10th" required id="max_marks" value="<?= $max_marks_10?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="perc_marks_10th" readonly value="<?= $marks_10?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4">
                                <button type="submit" name="10th_edu_ch_0" class="btn btn-primary col-sm-12">Submit Information</button>
                            </div>
                        </div>
                </div>
            </form>
            <!-------------------------------------------------------------Diploma---------------------------------------------------------->
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
            <div id="diploma" class="qual_div"  style=" display: none;">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Specialisation:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"   name="dip_field" required value="<?= $field_d?>">
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> University:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"  name="dip_university"  required value="<?= $university_d?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   name="dip_start_date" required id="from" value="<?= $start_date_d?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                            </div>
                            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   name="dip_end_date" required id="to" value="<?= $end_data_d?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                            <div class=" col-sm-3" for="dob">
                                <label class="radio-inline">
                                    <input type="radio" class="radio-inline" value="0" name="dip_per_or_cgp" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='CGPA') echo 'checked="checked"'; ?> >CGPA<br></label>
                                <label class="radio-inline">
                                    <input type="radio" class="radio-inline" value="1" name="dip_per_or_cgp" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='Percentage') echo 'checked="checked"'; ?>>Percentage
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
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="dip_perc_marks" readonly value="<?= $value_d?>" >
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
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
                <div id="12th" class="qual_div" style=" display: none;">

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Completion Date:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   name="12th_completion_date" required value="<?= $comp_12?>" >
                            </div>
                            <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Board:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board_12th" required value="<?= $board_12?>"  >
                            </div>
                        </div>
                    </div>


                    <div id="10th" class="form-group">
                        <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> School Name :</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"  name="12th_school"  required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                        <div class=" col-sm-3" for="dob">

                            <label class="radio-inline">
                                <input type="radio" class="radio-inline" value="0" name="per_or_cgp_12th" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='CGPA') echo 'checked="checked"'; ?>>CGPA<br></label>
                            <label class="radio-inline">
                                <input type="radio" class="radio-inline" value="1" name="per_or_cgp_12th" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='Percentage') echo 'checked="checked"'; ?>>Percentage
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
                        <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"   name="perc_marks_12th" readonly value="<?= $value_12?>"  >
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
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
            <div id="ug" class="qual_div"  style=" display: none;">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Degree:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="ug_field" required value="<?= $degree_ug?>"  >
                    </div>
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Specialization</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ug_specialization" required value="<?= $specialization_ug?>"   >
                    </div>
                </div>

                <div id="ug" class="form-group">
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="ug_university"  requiredvalue="<?= $university_ug?>"  >
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="ug_start_date" required id="from" value="<?= $start_date_ug?>"  > <span class="text-danger">(YYYY-MM-DD)</span>
                    </div>
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="ug_end_date" required id="to"> <span class="text-danger" value="<?= $completion_date_ug?>"  >(YYYY-MM-DD)</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span>Marking Scheme:</label>
                    <div class=" col-sm-5" for="dob">

                        <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="0" name="ug_per_or_cgp" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='CGPA') echo 'checked="checked"'; ?> >CGPA<br></label>
                        <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="1" name="ug_per_or_cgp" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='Percentage') echo 'checked="checked"'; ?> >Percentage
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

                    <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="perc_marks" readonly value="<?= $value_ug?>">
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
            <form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
            <div id="pg"  class="qual_div" style=" display: none;">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Degree:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_field" required value="<?= $degree_pg ?>">
                    </div>
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Specialization</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pg_specialization" required value="<?= $specialization_pg?>">
                    </div>
                </div>

                <div id="ug" class="form-group">
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="university"  required value="<?= $university_pg?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="pg_start_date" required id="from" value="<?= $start_date_pg?>"> <span class="text-danger">(YYYY-MM-DD)</span>
                    </div>
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="pg_end_date" required id="to" value="<?= $completion_date_pg?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span>Marking Scheme:</label>
                    <div class=" col-sm-5" for="dob">

                        <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="0" name="pg_per_or_cgp" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='CGPA') echo 'checked="checked"'; ?> >CGPA<br></label>
                        <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="1" name="pg_per_or_cgp" required  <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='Percentage') echo 'checked="checked"'; ?> >Percentage
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="dob"><span class="text-danger" >*</span> Marks/CGPA Obtained :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_marks" required id="marks" value="<?= $marks_pg?>" >
                    </div>
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  name="pg_max_marks" required id="max_marks"  value="<?= $max_marks_pg?>" >
                    </div>
                </div>




                <div class="form-group">

                    <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_perc_marks" readonly  value="<?= $value_pg?>" >
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


    </body>


    <script>
        function validate(){
            if($(this).children().filter('#from').val()>$(this).children().filter('#to')..val()){
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


</html>