<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   
    $id=$_SESSION['user'];
    $query="SELECT * from `employer` where `user_id` like '$id'";
$r = $db->process_query($query);
if(mysql_num_rows($r)>0)
{
  $r = $db->fetch_rows($r);
  $position=validate($r['position']);
 $from=validate($r['from']);
 $to=validate($r['to']);
 $pay=validate($r['pay']);
 $agp=validate($r['agp']);
 $basic_pay=validate($r['basic_pay']);
  $nature=validate($r['nature']);
 $organisation=validate($r['organisation']);
 $emp_type=validate($r['emp_type']);
}
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Present Employer Information</title>
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
	<center><b style="font-size:18px;">Present Employer Information</b></center>
<hr>





<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>
<form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Present Employer Information :</h3>
        <hr>



        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Organization (with address):</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"  value="<?php if(isset($organisation)) echo "$organisation"; ?>" name="organisation" required> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Position Held :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"  value="<?php if(isset($position)) echo "$position"; ?>" name="position" required>
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger" >*</span> Type of Employer:</label>
          <div class="col-sm-3">
            <select name="emp_type" required>
                <option value="gov" <?php if(isset($emp_type) && $emp_type=='gov') echo 'selected';?> >Government</option>
                <option value="private" <?php if(isset($emp_type) && $emp_type=='private') echo 'selected';?>>Private</option>
                <option value="psu" <?php if(isset($emp_type) && $emp_type=='psu') echo 'selected';?>>PSU/Autonomous Body</option>
              </select>
          </div>
        </div>


         <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> From :</label> 
          <div class="col-sm-3">
            <input type="date" class="form-control"  value="<?php if(isset($from)) echo "$from"; ?>" name="from" required id="from"> <font class="text-danger">(YYYY-MM-DD)</font>
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> To:</label>
          <div class="col-sm-4">
            <input type="date" class="form-control"  value="<?php if(isset($to)) echo "$to"; ?>" name="to" required id="to"> <font class="text-danger">(YYYY-MM-DD)</font>
          </div>
        </div>



        <div class="form-group">
          <label class="control-label col-sm-3" for="dob">Pay Band :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"  value="<?php if(isset($pay)) echo "$pay"; ?>" name="pay"> 
          </div>
            <label class="control-label col-sm-2" for="email">AGP/GP:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control"  value="<?php if(isset($agp)) echo "$agp"; ?>" name="agp"> 
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Basic Pay :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"  value="<?php if(isset($basic_pay)) echo "$basic_pay"; ?>" name="basic_pay" required>  
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Nature of work :</label> 
          <div class="col-sm-5">
            <input type="text" class="form-control"  value="<?php if(isset($nature)) echo "$nature"; ?>" name="nature" required>  
          </div>
        </div>








<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="emp_ch" class="btn btn-primary col-sm-12">Submit Information</button>
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