<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   $id=$_SESSION['user'];
    $query="SELECT * from `teaching` where `user_id` like '$id'";
    $c = $db->process_query($query);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teaching Experience (In Reverse Chronological Order)</title>
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
	<center><b style="font-size:18px;">Teaching Experience</b></center>
<hr>


<table class="table table-striped">
  <tr><th>Organisation</th><th>Designation</th><th>From</th><th>To</th><th>Pay Scale with AGP</th><th>Type of Employer</th><th>Tenure (Year)</th><th>Tenure (Months)</th><th>Remove</th></tr>
<?php
while(($r = $db->fetch_rows($c)))
    {
  $tmp_id=$r['id'];
  $organisation=validate($r['organisation']);
  $position=validate($r['position']);
  $from=validate($r['from']);
  $to=validate($r['to']);
  $pay=validate($r['pay']);
 
  $emp_type=validate($r['emp_type']);
  $year=validate($r['year']);
  $month=validate($r['month']);
  
  echo "<tr><td>$organisation</td><td>$position</td><td>$from</td><td>$to</td><td>$pay</td><td>$emp_type</td><td>$year</td><td>$month</td><td><a href='delete.php?id=$tmp_id&page=tech_exp'>Remove</a></td></tr>";
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
        <h3>Teaching Experience (In Reverse Chronological Order) :</h3>
        <hr>



        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Organization (with address):</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"  name="organisation" required> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Position Held :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="position" required>
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Type of Employer:</label>
          <div class="col-sm-3">
            <select name="emp_type" required>
                <option value="gov"  >Government</option>
                <option value="private" >Private</option>
                <option value="psu" >PSU/Autonomous Body</option>
              </select>
          </div>
        </div>


         <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> From :</label> 
          <div class="col-sm-3">
            <input type="date" class="form-control"   name="from" required id="from"> <font class="text-danger">(YYYY-MM-DD)</font>
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> To:</label>
          <div class="col-sm-4">
            <input type="date" class="form-control"  name="to" required id="to"> <font class="text-danger">(YYYY-MM-DD)</font>
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
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Pay Scale with AGP :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="pay" required>  (Ex. 15600-39100 AGP 6000)
          </div>
        </div>

       




<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="teach_ch" class="btn btn-primary col-sm-12">Submit Information</button>
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