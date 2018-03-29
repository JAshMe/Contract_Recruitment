<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   $id=$_SESSION['user'];
    $query="SELECT * from `education` where `user_id` like '$id'";
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


<table class="table table-striped">
  <tr><th>Qualification</th><th>Degree</th><th>Discipline</th><th>Institute</th><th>Board/Univ</th><th>Marks/CGPA</th><th>Max Marks/CGPA</th><th>Entry Date</th><th>Comp. Date</th><th>Div.</th><th>% age</th><th>Remove</th></tr>
<?php


    while(($r = $db->fetch_rows($c)))
    {
  $tmp_id=$r['id'];
  $degree = validate($r['degree']);
  $subject = validate($r['subject']);
  $inst_name = validate($r['inst_name']);
  $entry_date = validate($r['entry_date']);
  $complete_date = validate($r['complete_date']);
  $marks = validate($r['marks']);
  $max_marks = validate($r['max_marks']);
  $perc_marks = validate($r['perc_marks']);
  $division = validate($r['division']);
  $qualification = validate($r['qualification']);
  $board = validate($r['board']);

  echo "<tr><td>$qualification</td><td>$degree</td><td>$subject</td><td>$inst_name</td><td>$board</td><td>$marks</td><td>$max_marks</td><td>$entry_date</td><td>$complete_date</td><td>$division</td><td>$perc_marks</td><td><a href='delete.php?id=$tmp_id&page=education_qual'>Remove</a></td></tr>";

}
?>
</table>
<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>
<form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Details of Academic Record (In Reverse Cronological Order) :</h3>
        <hr>




        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Qualification :</label> 
          <div class="col-sm-3">
            <select name="qualification" required>
                <option value="pg"  >PG</option>
                <option value="ug" >UG</option>
                <option value="hssc" >HSSC (12th)</option>
                <option value="ssc">SSC (10th)</option>
              </select>
            
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Degree Name:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control"   name="degree" required> 
          </div>
        </div>




      	<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Subjects/Discipline :</label>  
          	<div class="col-sm-5">
          		<input type="text" class="form-control" placeholder="Subjects/Discipline" name="subject" required >
          	</div>
      	</div>



   

      	<div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Institute Name :</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"  name="inst_name" required> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Board/University :</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control" name="board" required>  
          </div>
        </div>



        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Entry Date :</label> 
          <div class="col-sm-3">
            <input type="date" class="form-control"   name="entry_date" required id="from"> <font class="text-danger">(YYYY-MM-DD)</font>
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Completion Date:</label>
          <div class="col-sm-4">
            <input type="date" class="form-control"   name="complete_date" required id="to"> <font class="text-danger">(YYYY-MM-DD)</font>
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
            <input type="text" class="form-control"   name="perc_marks" required> 
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Division:</label>
          <div class="col-sm-4">
            <select name="division" required>
                <option value="NA"  >NA</option>
                <option value="1" >1st</option>
                <option value="2" >2nd</option>
              </select>
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