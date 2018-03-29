<?php
require_once("./included_classes/class_user.php");
require_once("./included_classes/class_misc.php");
require_once("./included_classes/class_sql.php");
//$misc= new miscfunctions();
//$db = new sqlfunctions();
//$id=$_SESSION['user'];
//$query="SELECT * from `education` where `user_id` like '$id'";
//$c = $db->process_query($query);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Educational Information</title>
    <style>

    </style>
</head>

<body>
<!--<div id="main" style="font-size:13px; margin:0px 0 0 0;" align="justify">-->
<!--    <center><b style="font-size:18px;">Educational Information</b></center>-->
<!--    <hr>-->
<!---->
<!---->
<!--    <table class="table table-striped">-->
<!--        <tr><th>Qualification</th><th>Degree</th><th>Discipline</th><th>Institute</th><th>Board/Univ</th><th>Marks/CGPA</th><th>Max Marks/CGPA</th><th>Entry Date</th><th>Comp. Date</th><th>Div.</th><th>% age</th><th>Remove</th></tr>-->
<!--        --><?php
//
//
//        while(($r = $db->fetch_rows($c)))
//        {
//            $tmp_id=$r['id'];
//            $degree = validate($r['degree']);
//            $subject = validate($r['subject']);
//            $inst_name = validate($r['inst_name']);
//            $entry_date = validate($r['entry_date']);
//            $complete_date = validate($r['complete_date']);
//            $marks = validate($r['marks']);
//            $max_marks = validate($r['max_marks']);
//            $perc_marks = validate($r['perc_marks']);
//            $division = validate($r['division']);
//            $qualification = validate($r['qualification']);
//            $board = validate($r['board']);
//
//            echo "<tr><td>$qualification</td><td>$degree</td><td>$subject</td><td>$inst_name</td><td>$board</td><td>$marks</td><td>$max_marks</td><td>$entry_date</td><td>$complete_date</td><td>$division</td><td>$perc_marks</td><td><a href='delete.php?id=$tmp_id&page=education_qual'>Remove</a></td></tr>";
//
//        }
//        //?>
<!--    </table>-->
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

<!--   -----------------------------10th Div ---------------------------------------------->
                <div id ="10th" class="qual_div">

                    <div class="row">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Completion Date:</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control"   name="10th_completion_date" required>
                                </div>
                                <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Board:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" required >
                                </div>
                            </div>
                    </div>


                        <div id="10th" class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> School Name :</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"  name="10th_school"  required>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                        <div class=" col-sm-3" for="dob">

                            <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="CGPA" name="10th_per_or_cgp" required>CGPA<br></label>
                            <label class="radio-inline">
                                <input type="radio" class="radio-inline" value="Percentage" name="10th_per_or_cgp" required>Percentage
                            </label>
                        </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="10th_marks" required id="marks">
                            </div>
                            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="max_marks" required id="max_marks">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="10th_perc_marks" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4">
                                <button type="submit" name="10th_edu_ch" class="btn btn-primary col-sm-12">Submit Information</button>
                            </div>
                        </div>
                </div>
            <!-------------------------------------------------------------Diploma---------------------------------------------------------->
                <div id="diploma" class="qual_div"  style=" display: none;">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Specialisation:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"   name="dip_field" required>
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> University:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"  name="dip_university"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   name="dip_start_date" required id="from"> <span class="text-danger">(YYYY-MM-DD)</span>
                            </div>
                            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   name="dip_end_date" required id="to"> <span class="text-danger">(YYYY-MM-DD)</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                            <div class=" col-sm-3" for="dob">
                                <label class="radio-inline">
                                    <input type="radio" class="radio-inline" value="CGPA" name="dip_per_or_cgp" required>CGPA<br></label>
                                <label class="radio-inline">
                                    <input type="radio" class="radio-inline" value="Percentage" name="dip_per_or_cgp" required>Percentage
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="dip_marks" required id="marks">
                            </div>
                            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="dip_max_marks" required id="max_marks">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"   name="dip_perc_marks" readonly>
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" name="edu_ch" class="btn btn-primary col-sm-12">Submit Information</button>
                        </div>
                    </div>
                </div>

                <!-------------------------------------------------------------12th---------------------------------------------------------->
                <div id="12th" class="qual_div" style=" display: none;">

                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Completion Date:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control"   name="12th_completion_date" required>
                            </div>
                            <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Board:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="12th_board" required >
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
                                <input type="radio" class="radio-inline" value="CGPA" name="12th_per_or_cgp" required>CGPA<br></label>
                            <label class="radio-inline">
                                <input type="radio" class="radio-inline" value="Percentage" name="12th_per_or_cgp" required>Percentage
                            </label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"   name="12th_marks" required id="marks">
                        </div>
                        <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  name="12th_max_marks" required id="max_marks">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"   name="12th_perc_marks" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" name="edu_ch" class="btn btn-primary col-sm-12">Submit Information</button>
                        </div>
                    </div>
                </div>

            <!-------------------------------------------------------------UG---------------------------------------------------------->
            <div id="ug" class="qual_div"  style=" display: none;">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Degree:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="ug_field" required>
                    </div>
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Specialization</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ug_specialization" required >
                    </div>
                </div>

                <div id="ug" class="form-group">
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="ug_university"  required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="ug_start_date" required id="from"> <span class="text-danger">(YYYY-MM-DD)</span>
                    </div>
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="ug_end_date" required id="to"> <span class="text-danger">(YYYY-MM-DD)</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span>Marking Scheme:</label>
                    <div class=" col-sm-5" for="dob">

                        <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="CGPA" name="ug_per_or_cgp" required>CGPA<br></label>
                        <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="Percentage" name="ug_per_or_cgp" required>Percentage
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="ug_marks" required id="marks">
                    </div>
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  name="ug_max_marks" required id="max_marks">
                    </div>
                </div>




                <div class="form-group">

                    <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="perc_marks" readonly>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" name="edu_ch" class="btn btn-primary col-sm-12">Submit Information</button>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------PG---------------------------------------------------------->
            <div id="pg"  class="qual_div" style=" display: none;">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Degree:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_field" required>
                    </div>
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span>Specialization</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pg_specialization" required >
                    </div>
                </div>

                <div id="ug" class="form-group">
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> University:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="university"  required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="pg_start_date" required id="from"> <span class="text-danger">(YYYY-MM-DD)</span>
                    </div>
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"   name="pg_end_date" required id="to"> <span class="text-danger">(YYYY-MM-DD)</span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span>Marking Scheme:</label>
                    <div class=" col-sm-5" for="dob">

                        <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="CGPA" name="pg_per_or_cgp" required>CGPA<br></label>
                        <label class="radio-inline">
                            <input type="radio" class="radio-inline" value="Percentage" name="pg_per_or_cgp" required>Percentage
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_marks" required id="marks">
                    </div>
                    <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  name="pg_max_marks" required id="max_marks">
                    </div>
                </div>




                <div class="form-group">

                    <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"   name="pg_perc_marks" readonly>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" name="edu_ch" class="btn btn-primary col-sm-12">Submit Information</button>
                    </div>
                </div>
        </div>

    </form>
</div>


    </body>


    <script>
    function validate(){
        if($('#from').val()>$('#to').val()){
            alert("Completion Date must be greater than start date!");
            $('#from').val('');
            $('#to').val('');
            return false;
        }
        if($('#marks').val()>$('#max_marks').val()){
            alert("Marks should not be greater than maximum marks!");
            $('#marks').val('');
            $('#max_marks').val('');
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