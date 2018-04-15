<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   
    $id=$_SESSION['user'];
    $query="SELECT * from `employer` where `user_id` like '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
{
  $r = $db->fetch_rows($r);
  $nat_emp = validate($r['nat_emp']);
  $position=validate($r['position']);
 $from=validate($r['from']);
 $to=validate($r['to']);
 $pay=validate($r['pay']);
 $agp=validate($r['agp']);
 $basic_pay=validate($r['basic_pay']);
  $nature=validate($r['nature']);
 $organisation=validate($r['organisation']);
 $emp_type=validate($r['emp_type']);
$emol   =  validate($r['emoluments']);
}
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Present Employer Information</title>
</head>

<body>
<div id="main" style="font-size:13px; margin:0px 0 0 0;" align="justify">
	<center><b style="font-size:18px;">Present Employment Information</b></center>
<hr>





<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
  <li>Format of date is (YYYY-MM-DD), if format not shown in field</li>
</ul>

<form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Present Employment Information :</h3>
        <hr>

              <div class="form-group">
                      <label class="control-label col-sm-3" for="nat_emp"><span class="text-danger">*</span>Nature of Employment:</label>
                      <div class="col-sm-3">
                              <select  id = "nat_emp" name="nat_emp" required class="form-control">
                                      <option value="ad_hoc" <?php if(isset($nat_emp) && $nat_emp=='ad_hoc') echo 'selected';?> >Ad hoc</option>
                                      <option value="temp" <?php if(isset($nat_emp) && $nat_emp=='temp') echo 'selected';?>>Temporary</option>
                                      <option value="qausi_perm" <?php if(isset($nat_emp) && $nat_emp=='quasi_perm') echo 'selected';?>>Quasi Permanent</option>
                                      <option value="perm" <?php if(isset($nat_emp) && $nat_emp=='perm') echo 'selected';?>>Permanent</option>
                              </select>
                      </div>
              </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Organization (with address):</label> 
          <div class="col-sm-5">
            <input  required type="text" class="form-control"  value="<?php if(isset($organisation)) echo "$organisation"; ?>" name="organisation" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Position Held :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"  value="<?php if(isset($position)) echo "$position"; ?>" name="position" required>
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger" >*</span> Type of Employment:</label>
          <div class="col-sm-3">
            <select name="emp_type" required class="form-control">
                <option value="gov" <?php if(isset($emp_type) && $emp_type=='gov') echo 'selected';?> >Government</option>
                <option value="private" <?php if(isset($emp_type) && $emp_type=='private') echo 'selected';?>>Private</option>
                <option value="psu" <?php if(isset($emp_type) && $emp_type=='psu') echo 'selected';?>>PSU/Autonomous Body</option>
              </select>
          </div>
        </div>


         <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> From :</label> 
          <div class="col-sm-3">
            <input type="date" class="form-control"  value="<?php if(isset($from)) echo "$from"; ?>" name="from" required id="from">
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> To:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control"  value="<?= date("m-d-Y") ?>" readonly name="to" required id="to">
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
              <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Total Number of emoluments per month drawn at present :</label>
              <div class="col-sm-3">
                      <input type="text" class="form-control"  value="<?php if(isset($emol)) echo "$emol"; ?>" name="emol" required>
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
<script src="include/date_functions.js"></script>
<script>
function validate(){
    if(datediff($('#from').val(),$('#to').val())<0){
        alert("Completion Date must be greater than start date!");
        $('#from').val('');
        $('#to').val('');
        return false;   
    }
    return true;
}
</script>
</html>    