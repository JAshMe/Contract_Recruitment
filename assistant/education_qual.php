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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Educational Information</title>
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
	<center><b style="font-size:18px;">Educational Information</b></center>
<hr>



<!--<table class="table table-striped">-->
<!--  <tr><th>Qualification</th><th>Degree</th><th>Discipline</th><th>Institute</th><th>Board/Univ</th><th>Marks/CGPA</th><th>Max Marks/CGPA</th><th>Entry Date</th><th>Comp. Date</th><th>Div.</th><th>% age</th><th>Remove</th></tr>-->
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


<!--</table>-->
<p align="justify" class="larger-font">

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>



<form id ="10th" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Details of Academic Record (In Reverse Chronological Order) :</h3>
        <hr>




        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Qualification :</label>
          <div class="col-sm-3">
            <select name="qualification" required>
                <option value="10th_mark" >10th Standard</option>
                <option value="diploma" >Diploma</option>
                <option value="12th_mark">12th Standard</option>
                <option value="ug" >Under Graduate</option>
                <option value="pg">Post Graduate</option>
              </select>
            //10th standard



          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
          <div class="col-sm-4">
            <input type="date" class="form-control"   name="completion_date" value="<?= $comp_10?>" required>
          </div>
        </div>




      	<div id="10th" class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Board:</label>
          	<div class="col-sm-5">
          		<input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" value="<?= $board_10?>" required >
          	</div>
      	</div>





      	<div id="10th" class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> School Name :</label>
          <div class="col-sm-5">
            <input type="text" class="form-control"  name="school"  value="<?= $school_10?>" required>
          </div>
        </div>

<!--        <div class="form-group">-->
<!--          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Board :</label>-->
<!--          <div class="col-sm-5">-->
<!--            <input type="text" class="form-control" name="board" required>  -->
<!--          </div>-->



<!--        <div class="form-group">-->
<!--          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Entry Date :</label> -->
<!--          <div class="col-sm-3">-->
<!--            <input type="date" class="form-control"   name="entry_date" required id="from"> <font class="text-danger">(YYYY-MM-DD)</font>-->
<!--          </div>-->
<!--            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>-->
<!--          <div class="col-sm-4">-->
<!--            <input type="date" class="form-control"   name="complete_date" required id="to"> <span class="text-danger">(YYYY-MM-DD)</span>-->
<!--          </div>-->
<!--        </div>-->


          <div class="form-group">
              <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
              <div class=" col-sm-3" for="dob">

                  <label class="radio-inline">
                      <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='CGPA') echo 'checked="checked"'; ?> required>CGPA<br>
                  </label>
                  <label class="radio-inline">
                      <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" <?php if(isset($per_or_cgpa_10) && $per_or_cgpa_10=='Percentage') echo 'checked="checked"'; ?> required>Percentage
                  </label>

              </div>
          </div>


        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="marks" value="<?= $marks_10?>" required id="marks">
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control"  name="max_marks" value="<?= $max_marks_10?>" required id="max_marks">
          </div>
        </div>




        <div class="form-group">

          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="perc_marks" value="<?= $value_10?>" readonly>
          </div>

        </div>








<div class="form-group">
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="edu_ch[]" class="btn btn-primary col-sm-12">Submit Information</button>
    </div>
  </div>
  </form>
</div>





//12th div

<form id ="12th" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Details of Academic Record (In Reverse Chronological Order) :</h3>
            <hr>




            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Qualification :</label>
                <div class="col-sm-3">
                    <select name="qualification" required>
                        <option value="10th_mark" >10th Standard</option>
                        <option value="diploma" >Diploma</option>
                        <option value="12th_mark">12th Standard</option>
                        <option value="ug" >Under Graduate</option>
                        <option value="pg">Post Graduate</option>
                    </select>



                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control"   name="completion_date" value="<?= $comp_12?>" required>
                </div>
            </div>




            <div id="10th" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Board:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" value="<?= $board_12?>" required >
                </div>
            </div>





            <div id="10th" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> School Name :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control"  name="school"  value="<?= $school_12?>" required>
                </div>
            </div>

            <!--        <div class="form-group">-->
            <!--          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Board :</label>-->
            <!--          <div class="col-sm-5">-->
            <!--            <input type="text" class="form-control" name="board" required>  -->
            <!--          </div>-->
            <!--        </div>-->



            <!--        <div class="form-group">-->
            <!--          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Entry Date :</label> -->
            <!--          <div class="col-sm-3">-->
            <!--            <input type="date" class="form-control"   name="entry_date" required id="from"> <font class="text-danger">(YYYY-MM-DD)</font>-->
            <!--          </div>-->
            <!--            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>-->
            <!--          <div class="col-sm-4">-->
            <!--            <input type="date" class="form-control"   name="complete_date" required id="to"> <span class="text-danger">(YYYY-MM-DD)</span>-->
            <!--          </div>-->
            <!--        </div>-->


            <div class="form-group">
                <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                <div class=" col-sm-3" for="dob">

                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='CGPA') echo 'checked="checked"'; ?> required>CGPA<br></label>
                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_10=='Percentage') echo 'checked="checked"'; ?> required>Percentage
                    </label>

                </div>
            </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"   name="marks" required id="marks" value="<?= $marks_12?>" >
                      </div>
                        <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="max_marks" required id="max_marks" value="<?= $max_marks_12?>" >
                      </div>
                    </div>




            <div class="form-group">

                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="perc_marks" value="<?= $value_12?>" readonly>
                </div>

            </div>








            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" name="edu_ch[]" class="btn btn-primary col-sm-12">Submit Information</button>
                </div>
            </div>
</form>
</div>




//diploma


<form id ="diploma" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Details of Academic Record (In Reverse Chronological Order) :</h3>
            <hr>




            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Qualification :</label>
                <div class="col-sm-3">
                    <select name="qualification" required>
                        <option value="10th_mark" >10th Standard</option>
                        <option value="diploma" >Diploma</option>
                        <option value="12th_mark">12th Standard</option>
                        <option value="ug" >Under Graduate</option>
                        <option value="pg">Post Graduate</option>
                    </select>



                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Specialisation:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"   name="field" value="<?= $field_d?>" required>
                </div>
            </div>




<!--            <div id="diploma" class="form-group">-->
<!--                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Board:</label>-->
<!--                <div class="col-sm-5">-->
<!--                    <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" required >-->
<!--                </div>-->
<!--            </div>-->





            <div id="diploma" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> University:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control"  name="university" value="<?= $university_d?>" required>
                </div>
            </div>

            <!--        <div class="form-group">-->
            <!--          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Board :</label>-->
            <!--          <div class="col-sm-5">-->
            <!--            <input type="text" class="form-control" name="board" required>  -->
            <!--          </div>-->
            <!--        </div>-->



                    <div class="form-group">
                      <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                      <div class="col-sm-3">
                        <input type="date" class="form-control"   name="start_date" required id="from" value="<?= $start_date_d?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                      </div>
                        <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control"   name="end_date" required id="to" value="<?= $end_data_d?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                      </div>
                    </div>


            <div class="form-group">
                <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                <div class=" col-sm-3" for="dob">

                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='CGPA') echo 'checked="checked"';  ?> required>CGPA<br></label>
                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='percentage') echo 'checked="checked"'; ?> required>Percentage
                    </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="marks" required id="marks" value="<?= $marks_d?>" >
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="max_marks" required id="max_marks" value="<?= $max_marks_d?>" >
                </div>
            </div>




            <div class="form-group">

                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="perc_marks" readonly value="<?= $value_d?>" >
                </div>

            </div>








            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" name="edu_ch[]" class="btn btn-primary col-sm-12">Submit Information</button>
                </div>
            </div>
</form>
</div>


//undergradute


<form id ="ug" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Details of Academic Record (In Reverse Chronological Order) :</h3>
            <hr>




            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Qualification :</label>
                <div class="col-sm-3">
                    <select name="qualification" required>
                        <option value="10th_mark" >10th Standard</option>
                        <option value="diploma" >Diploma</option>
                        <option value="12th_mark">12th Standard</option>
                        <option value="ug" >Under Graduate</option>
                        <option value="pg">Post Graduate</option>
                    </select>



                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Degree:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"   name="field" required value="<?= $degree_pg?>" >
                </div>
            </div>

            <div id="pg" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Specialization</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Specialization" required value="<?= $specialization_pg?>" >
                </div>
            </div>




<!--            <div id="ug" class="form-group">-->
<!--                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Board:</label>-->
<!--                            <div class="col-sm-5">-->
<!--                                <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" required >-->
<!--                            </div>-->
<!--                        </div>-->





            <div id="ug" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> University:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="university"  required value="<?= $university_pg?>" >
                </div>
            </div>

            <!--        <div class="form-group">-->
            <!--          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Board :</label>-->
            <!--          <div class="col-sm-5">-->
            <!--            <input type="text" class="form-control" name="board" required>  -->
            <!--          </div>-->
            <!--        </div>-->



            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control"   name="start_date" required id="from" value="<?= $start_date_ug?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control"   name="end_date" required id="to" value="<?= $completion_date_ug?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                <div class=" col-sm-3" for="dob">

                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='CGPA') echo 'checked="checked"';  ?> required>CGPA<br></label>
                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='Percentage') echo 'checked="checked"';  ?> required>Percentage
                    </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="marks" required id="marks" value="<?= $marks_ug?>" >
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="max_marks" required id="max_marks" value="<?= $max_marks_ug?>" >
                </div>
            </div>




            <div class="form-group">

                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="perc_marks" readonly value="<?= $value_ug?>" >
                </div>

            </div>








            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" name="edu_ch[]" class="btn btn-primary col-sm-12">Submit Information</button>
                </div>
            </div>
</form>
</div>



//post graduate


<form id ="pg" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Details of Academic Record (In Reverse Chronological Order) :</h3>
            <hr>




            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Qualification :</label>
                <div class="col-sm-3">
                    <select name="qualification" required>
                        <option value="10th_mark" >10th Standard</option>
                        <option value="diploma" >Diploma</option>
                        <option value="12th_mark">12th Standard</option>
                        <option value="ug" >Under Graduate</option>
                        <option value="pg">Post Graduate</option>
                    </select>



                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Degree:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"   name="degree" required value="<?= $degree_pg?>" >
                </div>
            </div>




                        <div id="pg" class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Specialization</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="Specialization" required value="<?= $specialization_pg?>" >
                            </div>
                        </div>





            <div id="pg" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> University:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="university"  required value="<?= $university_pg?>" >
                </div>
            </div>

            <!--        <div class="form-group">-->
            <!--          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Board :</label>-->
            <!--          <div class="col-sm-5">-->
            <!--            <input type="text" class="form-control" name="board" required>  -->
            <!--          </div>-->
            <!--        </div>-->



            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Entry Date :</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control"   name="start_date" required id="from" value="<?= $start_date_pg?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control"   name="end_date" required id="to" value="<?= $completion_date_pg?>" > <span class="text-danger">(YYYY-MM-DD)</span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                <div class=" col-sm-3" for="dob">

                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='CGPA') echo 'checked="checked"';  ?> required>CGPA<br></label>
                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" required <?php if(isset($per_or_cgpa_12) && $per_or_cgpa_12=='Percentage') echo 'checked="checked"';  ?>>Percentage
                    </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="dob" value="<?= $marks_ug?>" ><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="marks" required id="marks">
                </div>
                <label class="control-label col-sm-2" for="email" ><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="max_marks" required id="max_marks" value="<?= $max_marks_pg?>" >
                </div>
            </div>




            <div class="form-group">

                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> % Marks/CGPA :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="perc_marks" readonly value="<?= $value_pg?>" >
                </div>

            </div>








            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" name="edu_ch[]" class="btn btn-primary col-sm-12">Submit Information</button>
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
</html>    