<?php
   require_once("./included_classes/class_user.php");
   require_once("./included_classes/class_misc.php");
   require_once("./included_classes/class_sql.php");
   $misc= new miscfunctions();
   $db = new sqlfunctions();
   $id=$_SESSION['user'];
   $query="SELECT * from `experience` where `user_id` like '$id' order by id desc";
   $c = $db->process_query($query);
   //var_dump($id); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Work Experience</title>
<script type="text/javascript" src="./include/date_functions.js"></script>
</head>

<body>
<div id="main" style="font-size:13px; margin:0px 0 0 0;" align="justify">
	<center><b style="font-size:18px;">Work Experience</b></center>
<hr>


<table class="table table-striped">
  <tr><th>Organisation</th><th>Post Held</th><th>From</th><th>To</th><th>Experience</th><th>
  Basic Pay</th><th>Type of Employer</th><th>Nature of Work</th><th>Remove</th></tr>
<?php
	while(($r = $db->fetch_rows($c)))
    {
  		$tmp_id=$r['id'];
  		$organisation=validate($r['organisation']);
  		$position=validate($r['position']);
  		$from=validate($r['from']);
  		$to=validate($r['to']);
  		$pay=validate($r['pay']);
  		$nature=validate($r['nature']);
  		$emp_type=validate($r['emp_type']);
  		$tot_exp=validate($r['tot_exp']);
  		echo "<tr><td>$organisation</td><td>$position</td><td>$from</td><td>$to</td>
  		<td>$tot_exp</td><td>$pay</td><td>$emp_type</td><td>$nature</td><td><a href='delete.php?id=$tmp_id&page=work_exp'>Remove</a></td></tr>";
		}
 ?> 
</table>

<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

<form class="form-horizontal" name="reg_frm" method="post" action="save.php" onSubmit="return validate();" enctype="multipart/form-data">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Work Experience (In Reverse Chronological Order) :</h3>
        <hr>

    <div class="form-group">
      <label class="control-label col-sm-3" for="organisation"><span class="text-danger">*</span> Organization (with address):</label> 
      <div class="col-sm-5">
        <input type="text" class="form-control"   name="organisation" required> 
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="position"><span class="text-danger">*</span> Position Held :</label> 
      <div class="col-sm-3">
        <input type="text" class="form-control"   name="position" required>
      </div>
        <label class="control-label col-sm-2" for="emp_type"><span class="text-danger">*</span> Type of Employer:</label>
      <div class="col-sm-3">
        <select name="emp_type" class="form-control" required>
            <option value="gov">Government</option>
            <option value="private">Private</option>
            <option value="psu">PSU/Autonomous Body</option>
          </select>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-3" for="from"><span class="text-danger">*</span> From :</label> 
      <div class="col-sm-3">
        <input type="date" class="form-control"  id="from" name="from" required id="from"> <font class="text-danger">(DD-MM-YYYY)</font>
      </div>
        <label class="control-label col-sm-2" for="to"><span class="text-danger">*</span> To:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="to" name="to" required id="to"> <font class="text-danger">(DD-MM-YYYY)</font>
      </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="nature"><span class="text-danger">*</span> Experience :</label> 
        <div class="col-sm-5">
          <input type="text" class="form-control"  id="experience" name="experience" readonly required>  
        </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-3" for="pay"><span class="text-danger">*</span> Gross Salary :</label> 
      <div class="col-sm-3">
        <input type="text" class="form-control"   name="pay" required> 
      </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="nature"><span class="text-danger">*</span> Nature of work :</label> 
        <div class="col-sm-5">
          <input type="text" class="form-control"  name="nature" required>  
        </div>
    </div>

    <div class="form-group">
    	<div class="form-group">
            <label class="control-label col-sm-3" for="doc_exp"><span class="text-danger">*</span> Upload Appropriate Document :</label>
            <div class="col-sm-5">
                <input type="file"  name="doc_exp" required>
            </div>
        </div>
    	<ul class="text-danger">
  			<li> Doucument size should not exceed 1MB.</li>	
  			<li> Doucument should be in .pdf format.</li>	
		</ul>
    </div>

	<div class="form-group"> 
	    <div class="col-sm-offset-4 col-sm-4">
	      <button type="submit" name="work_exp" id="work_exp_submit" class="btn btn-primary col-sm-12">Submit Information</button>
	    </div>
	 </div>
</form>
<script>
  function validate(){
      if($('#experience').val()==''){
        alert('From and To Dates are incorrectly filled ');
        $("input[type=date]").val("");
        return false;
      }
      return true;
  }
  $("input[type=date").on('focusout',function(){
      //alert('change');
      var fd=new Date($('#from').val());
      var td=new Date($('#to').val());
      if(fd=='Invalid Date' || td=='Invalid Date'){
        //alert('ignore');
      }
      else{
        var diff=datediff(fd,td);
        var year=Math.floor(diff/365);
        var month=Math.floor((diff-(year)*365)/30);
        if(diff<0)
        {
            alert('Invalid dates:FROM date should be before TO date');
            $("input[type=date]").val("");
            $('#experience').val("");
        }
        else{
          $('#experience').val(year+' Years and '+month+' Months');
        }
      }
  });
</script>

</body>
</html>
