<?php
//require_once("./included_classes/class_user.php");
//    require_once("./included_classes/class_misc.php");
//    require_once("./included_classes/class_sql.php");
//    $misc= new miscfunctions();
//    $db = new sqlfunctions();
//   $id=$_SESSION['user'];
//    $query="SELECT * from `education` where `user_id` like '$id'";
//    $c = $db->process_query($query);
//
//?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!--<html xmlns="http://www.w3.org/1999/xhtml">-->
<!--<head>-->
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--<title>Educational Information</title>-->
<!--<style>-->
<!--.login {-->
<!--	display:none;-->
<!--}-->
<!--#loginbox{-->
<!--	display:none;-->
<!--	text-align:center;-->
<!--	margin:65px 7px -25px 5px;-->
<!--	padding:25px 5px 15px 55px;-->
<!--	background:#fff;-->
<!--	color:#b22d00;-->
<!--	-moz-border-radius:6px;-->
<!--	-webkit-border-radius:6px;-->
<!--}-->
<!--.submit{-->
<!--	height:20px;-->
<!--	width:80px;-->
<!--}-->
<!--</style>-->
<!--</head>-->
<!---->
<!--<body>-->
<!--<div id="main" style="font-size:13px; margin:0px 0 0 0;" align="justify">-->
<!--	<center><b style="font-size:18px;">Educational Information</b></center>-->
<!--<hr>-->
<!---->
<!---->
<!--<table class="table table-striped">-->
<!--  <tr><th>Qualification</th><th>Degree</th><th>Discipline</th><th>Institute</th><th>Board/Univ</th><th>Marks/CGPA</th><th>Max Marks/CGPA</th><th>Entry Date</th><th>Comp. Date</th><th>Div.</th><th>% age</th><th>Remove</th></tr>-->
<?php
//
//
//    while(($r = $db->fetch_rows($c)))
//    {
//  $tmp_id=$r['id'];
//  $degree = validate($r['degree']);
//  $subject = validate($r['subject']);
//  $inst_name = validate($r['inst_name']);
//  $entry_date = validate($r['entry_date']);
//  $complete_date = validate($r['complete_date']);
//  $marks = validate($r['marks']);
//  $max_marks = validate($r['max_marks']);
//  $perc_marks = validate($r['perc_marks']);
//  $division = validate($r['division']);
//  $qualification = validate($r['qualification']);
//  $board = validate($r['board']);
//
//  echo "<tr><td>$qualification</td><td>$degree</td><td>$subject</td><td>$inst_name</td><td>$board</td><td>$marks</td><td>$max_marks</td><td>$entry_date</td><td>$complete_date</td><td>$division</td><td>$perc_marks</td><td><a href='delete.php?id=$tmp_id&page=education_qual'>Remove</a></td></tr>";
//
//}
////?>
<!--</table>-->
<!--<p align="justify" class="larger-font"> -->
<!---->
<!--<ul class="text-danger">-->
<!--  <li> * Marked fields are mandatory.</li>-->
<!--</ul>-->
<!---->
<!--</script>-->
<form id ="10th" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Details of Academic Record (In Reverse Cronological Order) :</h3>
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
            <input type="date" class="form-control"   name="completion_date" required>
          </div>
        </div>




      	<div id="10th" class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Board:</label>
          	<div class="col-sm-5">
          		<input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" required >
          	</div>
      	</div>





      	<div id="10th" class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> School Name :</label>
          <div class="col-sm-5">
            <input type="text" class="form-control"  name="school"  required>
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
                      <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" required>CGPA<br></label>
                  <label class="radio-inline">
                      <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" required>Percentage
                  </label>

              </div>
          </div>


        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="marks" required id="marks">
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control"  name="max_marks" required id="max_marks">
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
  </form>
</div>





//12th div

<form id ="12th" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Details of Academic Record (In Reverse Cronological Order) :</h3>
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
                    <input type="date" class="form-control"   name="completion_date" required>
                </div>
            </div>




            <div id="10th" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Board:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" required >
                </div>
            </div>





            <div id="10th" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> School Name :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control"  name="school"  required>
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
                        <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" required>CGPA<br></label>
                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" required>Percentage
                    </label>

                </div>
            </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"   name="marks" required id="marks">
                      </div>
                        <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control"  name="max_marks" required id="max_marks">
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
</form>
</div>




//diploma


<form id ="diploma" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Details of Academic Record (In Reverse Cronological Order) :</h3>
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
                    <input type="text" class="form-control"   name="field" required>
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
                    <input type="text" class="form-control"  name="university"  required>
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
                        <input type="date" class="form-control"   name="start_date" required id="from"> <span class="text-danger">(YYYY-MM-DD)</span>
                      </div>
                        <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control"   name="end_date" required id="to"> <span class="text-danger">(YYYY-MM-DD)</span>
                      </div>
                    </div>


            <div class="form-group">
                <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                <div class=" col-sm-3" for="dob">

                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" required>CGPA<br></label>
                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" required>Percentage
                    </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="marks" required id="marks">
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="max_marks" required id="max_marks">
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
</form>
</div>


//undergradute


<form id ="ug" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Details of Academic Record (In Reverse Cronological Order) :</h3>
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
                    <input type="text" class="form-control"   name="field" required>
                </div>
            </div>




                        <div id="ug" class="form-group">
                            <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Board:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" required >
                            </div>-->s
                        </div>





            <div id="ug" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> University:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="university"  required>
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
                    <input type="date" class="form-control"   name="start_date" required id="from"> <span class="text-danger">(YYYY-MM-DD)</span>
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control"   name="end_date" required id="to"> <span class="text-danger">(YYYY-MM-DD)</span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                <div class=" col-sm-3" for="dob">

                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" required>CGPA<br></label>
                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" required>Percentage
                    </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="marks" required id="marks">
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="max_marks" required id="max_marks">
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
</form>
</div>



//post graduate


<form id ="pg" class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Details of Academic Record (In Reverse Cronological Order) :</h3>
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
                    <input type="text" class="form-control"   name="field" required>
                </div>
            </div>




            <!--            <div id="diploma" class="form-group">-->
            <!--                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span>Board:</label>-->
            <!--                <div class="col-sm-5">-->
            <!--                    <input type="text" class="form-control" placeholder="Eg:-CBSE,ICSE" name="board" required >-->
            <!--                </div>-->
            <!--            </div>-->





            <div id="pg" class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> University:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="university"  required>
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
                    <input type="date" class="form-control"   name="start_date" required id="from"> <span class="text-danger">(YYYY-MM-DD)</span>
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control"   name="end_date" required id="to"> <span class="text-danger">(YYYY-MM-DD)</span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-offset-1 col-sm-2" for="email"><span class="text-danger">*</span>Marking Scheme</label>
                <div class=" col-sm-3" for="dob">

                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="CGPA" name="per_or_cgp" required>CGPA<br></label>
                    <label class="radio-inline">
                        <input type="radio" class="radio-inline" value="Percentage" name="per_or_cgp" required>Percentage
                    </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marks/CGPA Obtained :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"   name="marks" required id="marks">
                </div>
                <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Maximum Marks/CGPA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="max_marks" required id="max_marks">
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