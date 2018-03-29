<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
    
    $id=$_SESSION['user'];
    $query="SELECT * from `other_academic` where `user_id` like '$id'";
    $c = $db->process_query($query);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Other Academic Qualifications</title>
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
	<center><b style="font-size:18px;">Other Academic Qualifications</b></center>
<hr>


<table class="table table-striped">
  <tr><th>Degree</th><th>Discipline</th><th>Institute</th><th>Board/Univ</th><th>Marks/CGPA</th><th>Max Marks/CGPA</th><th>% Marks/CGPA</th><th>Division</th><th>Year</th><th>Remove</th></tr>
<?php


    while(($r = $db->fetch_rows($c)))
    {
      $tmp_id=$r['id'];
      $exam = validate($r['exam']);
  $subject = validate($r['subject']);
  $inst_name = validate($r['inst_name']);
  $marks = validate($r['marks']);
  $max_marks = validate($r['max_marks']);
  $year = validate($r['year']);
  $division = validate($r['division']);
  $board = validate($r['board']);
   $per_marks = validate($r['per_marks']);
  echo "<tr><td>$exam</td><td>$subject</td><td>$inst_name</td><td>$board</td><td>$marks</td><td>$max_marks</td><td>$per_marks</td><td>$division</td><td>$year</td><td><a href='delete.php?id=$tmp_id&page=other_acads'>Remove</a></td></tr>";
} ?>
</table>



<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>
<form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Other Academic Qualifications (Any other academic degree not covered earlier) :</h3>
        <hr>



        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"> Examination Passed :</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"   name="exam" > 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Subject/Discipline :</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"   name="subject" required>  
          </div>
        </div>
  

   

      	<div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Institute Name :</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"   name="inst_name" required> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Board/University :</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"  name="board" required>  
          </div>
        </div>






        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"> Marks/CGPA Obtained :</label> 
          <div class="col-sm-2">
            <input type="text" class="form-control"   name="marks" id="marks"> 
          </div>
            <label class="control-label col-sm-2" for="email"> Maximum Marks/CGPA:</label>
          <div class="col-sm-2">
            <input type="text" class="form-control"   name="max_marks"  id="max_marks"> 
          </div>
        </div>
		<div class="form-group">
        <label class="control-label col-sm-3" for="email"> % Marks/CGPA:</label>
          <div class="col-sm-2">
            <input type="text" class="form-control"   name="per_marks" > 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Year :</label> 
          <div class="col-sm-3">
            <select name="year" required>
                <?php 
                  for($y=2017;$y>=1950;$y--){
                    echo "<option value='".$y."'>".$y."</option>";
                  }
                ?>
              </select>
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Division:</label>
          <div class="col-sm-3">
            <select name="division" required>
               <option value="NA" >NA</option>
                <option value="1"  >1st</option>
                <option value="2"  >2nd</option>
              </select>
          </div>
        </div>




<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="other_ch" class="btn btn-primary col-sm-12">Submit Information</button>
    </div>
  </div>
  </form>
</div>
</body>
<script>
function validate(){
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