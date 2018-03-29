<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   $id=$_SESSION['user'];
    $query="SELECT * from `research` where `user_id` like '$id'";
    $c = $db->process_query($query);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Research  Experience (In Reverse Chronological Order)</title>
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
	<center><b style="font-size:18px;">Research  Experience</b></center>
<hr>


<table class="table table-striped">


  <tr><th>Organisation</th><th>Designation</th><th>From</th><th>To</th><th>Salary/Fellowship/Stipend</th><th>Nature of Work</th><th>Tenure (Years)</th><th>Tenure (Months)</th><th>Remove</th></tr>
<?php
while(($r = $db->fetch_rows($c)))
    {
  $tmp_id=$r['id'];
  $organisation=validate($r['organisation']);
  $position=validate($r['position']);
  $from=validate($r['from']);
  $to=validate($r['to']);
  $year=validate($r['year']);
  $month=validate($r['month']);
  $salary=validate($r['salary']);
  $nature=validate($r['nature']);
echo "<tr><td>$organisation</td><td>$position</td><td>$from</td><td>$to</td><td>$salary</td><td>$nature</td><td>$year</td><td>$month</td><td><a href='delete.php?id=$tmp_id&page=research'>Remove</a></td></tr>";
}
  ?>
</table>



<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>
<form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" >
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Research  Experience (In Reverse Chronological Order) :</h3>
        <hr>



        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Organization (with address):</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"   name="organisation" required> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Position Held :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="position" required>
          </div>
            
        </div>


         <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> From :</label> 
          <div class="col-sm-3">
            <input type="date" class="form-control"   name="from" required id="from"> <font class="text-danger">(YYYY-MM-DD)</font>
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> To:</label>
          <div class="col-sm-4">
            <input type="date" class="form-control"   name="to" required id="to"> <font class="text-danger">(YYYY-MM-DD)</font>
          </div>
        </div>



  


        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Tenure in Year & Months :</label> 
          <div class="col-sm-1">
            <input type="text" class="form-control"   name="year" required> Year(s)
          </div>
          <div class="col-sm-1">
            <input type="text" class="form-control"   name="month" required> Month(s)
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Salary/Fellowship/Stipend :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"  name="salary" required> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Nature of work :</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"   name="nature" required>  
          </div>
        </div>




<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="research" class="btn btn-primary col-sm-12">Submit Information</button>
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
    return true;
}
</script>
</html>    