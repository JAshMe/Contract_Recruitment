<?php

require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   
    $id=$_SESSION['user'];
    $dept=array();
	$emp="";
    $query="SELECT * from `department` where `user_id` like '$id'";
    $c = $db->process_query($query);
    if(mysqli_num_rows($c)>0)
    {
       while($r = $db->fetch_rows($c))
       array_push($dept, $r['dept']);
     }  
$query="SELECT * from `user` where `user_id` like '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
{
  $r = $db->fetch_rows($r);
  $post_applied=$r['post_applied'];
  $specialization=$r['specialization'];
$dolp=validate($r['dolp']);
$name=validate($r['name']);
$dob=validate($r['dob']);
$gender=validate($r['gender']);
$category=validate($r['category']);
$pwd=validate($r['pwd']);
$f_name=validate($r['f_name']);
$m_name=validate($r['m_name']);
$marital_status=validate($r['marital_status']);
$domicile=validate($r['domicile']);
$nationality=validate($r['nationality']);
$corr_address=validate($r['corr_address']);
$emp=validate($r['emp']);

$place_of_application=validate($r['place_of_application']);
$mobile=validate($r['mobile']);
$address=validate($r['address']);
$pwd_type=validate($r['pwd_type']);
$id_type=validate($r['id_type']);
$id_no=validate($r['id_no']);
$emp_code=validate($r['emp_code']);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Personal Information</title>
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
	<center><b style="font-size:18px;">Personal Information</b></center>
<hr>
<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</div>
<form class="form-horizontal" name="reg_frm" method="post" action="save.php" >
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Personal Details</h3>
        <hr>

		<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Staff of MNNIT :</label>  
          	<div class="col-sm-5">
          		<label class="radio-inline"><input type="radio" name="emp" value="y" id="mnnit_yes" <?php if(isset($emp) && $emp=='y') echo 'checked';?> >Yes</label>
				<label class="radio-inline"><input type="radio" name="emp" value="n" id="mnnit_no" <?php if(isset($emp) && $emp=='n') echo 'checked';?> >No</label>
          	</div>
      	</div>
		
        <div class="form-group"  id="mnnitemp" <?php if(isset($emp)&&$emp=='y') echo"style=\"display:block\"; else style=\"display:none\"; ";?> >
         	<label class="control-label col-sm-3" for="dob"> MNNIT employee code :</label>  
          	<div class="col-sm-5">
          		<input type="text" class="form-control"  value="<?php if(isset($emp_code)) echo "$emp_code"; ?>" name="emp_code" >
          	</div>
      	</div>

        <div class="form-group">
         	<label class="control-label col-sm-3" for="dept"><span class="text-danger">*</span> Department(s) Applied For :</label>  
          	<div class="col-sm-5">
          		<label style="font-weight:400"><input type="checkbox" name="dept[]" value="Applied Mechanics" <?php if(isset($dept) && in_array('Applied Mechanics', $dept)) echo 'checked="checked"'; ?> >Applied Mechanics</label><br>
          		
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Chemical Engineering" <?php if(isset($dept) &&in_array('Chemical Engineering', $dept)) echo 'checked="checked"'; ?> >Chemical Engineering</label><br>
             
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Civil Engineering" <?php if(isset($dept) &&in_array('Civil Engineering', $dept)) echo 'checked="checked"'; ?> >Civil Engineering</label><br>
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Computer Science Engineering" <?php if(isset($dept) &&in_array('Computer Science Engineering', $dept)) echo 'checked="checked"'; ?> >Computer Science Engineering</label><br>
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Electronics & Comm Engineering" <?php if(isset($dept) &&in_array('Electronics & Comm Engineering', $dept)) echo 'checked="checked"'; ?> >Electronics & Comm Engineering</label><br>
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Electrical Engineering" <?php if(isset($dept) &&in_array('Electrical Engineering', $dept)) echo 'checked="checked"'; ?> >Electrical Engineering</label><br>
              
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Humanities and Social Sciences" <?php if(isset($dept) &&in_array('Humanities and Social Sciences', $dept)) echo 'checked="checked"'; ?> >Humanities and Social Sciences</label><br>
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Mathematics" <?php if(isset($dept) &&in_array('Mathematics', $dept)) echo 'checked="checked"'; ?> >Mathematics</label><br>
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Mechanical Engineering" <?php if(isset($dept) &&in_array('Mechanical Engineering', $dept)) echo 'checked="checked"'; ?> >Mechanical Engineering</label><br>
              
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="School of Management Sciences " <?php if(isset($dept) &&in_array('School of Management Sciences ', $dept)) echo 'checked="checked"'; ?> >School of Management Sciences </label>
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="III [Institute Industry Interaction] Cell" <?php if(isset($dept) &&in_array('III [Institute Industry Interaction] Cell', $dept)) echo 'checked="checked"'; ?> >III [Institute Industry Interaction] Cell</label><br>
              
              <div id="mnnitdept" <?php if(isset($emp)&&$emp=='y') echo"style=\"display:block\"; else style=\"display:none\"; ";?> >
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Physics" <?php if(isset($dept) &&in_array('Physics', $dept)) echo 'checked="checked"'; ?> >Physics</label><br>
               <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Chemistry" <?php if(isset($dept) &&in_array('Chemistry', $dept)) echo 'checked="checked"'; ?> >Chemistry</label><br>
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="GIS [Geographic Information System] Cell" <?php if(isset($dept) &&in_array('GIS [Geographic Information System] Cell', $dept)) echo 'checked="checked"'; ?> >GIS [Geographic Information System] Cell</label><br>
              <label style="font-weight:400"><input type="checkbox" name="dept[]" value="Biotechnology" <?php if(isset($dept) &&in_array('Biotechnology', $dept)) echo 'checked="checked"'; ?> >Biotechnology</label><br>
             </div>
             
             
              <!--<label style="font-weight:400"><input type="checkbox" name="dept[]" value="Professor, Training & Placement" <?php if(isset($dept) &&in_array('Professor, Training & Placement', $dept)) echo 'checked="checked"'; ?> >Professor, Training & Placement</label>-->
          		
          	</div>
      	</div>



      	<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Post Applied For :</label>  
          	<div class="col-sm-5">
          		<select name="post_applied" required>
				  <option value="6000" <?php if(isset($post_applied) && $post_applied=='6000') echo 'selected';?> >Assistant Professor AGP-6000</option>
				  <option value="7000" <?php if(isset($post_applied) && $post_applied=='7000') echo 'selected';?> >Assistant Professor AGP-7000</option>
				  <option value="8000" <?php if(isset($post_applied) && $post_applied=='8000') echo 'selected';?> >Assistant Professor AGP-8000</option>
				</select>
          	</div>
      	</div>


      	<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Specialization :</label>  
          	<div class="col-sm-5">
          		<input type="text" class="form-control" placeholder="Specialization" required value="<?php if(isset($specialization)) echo "$specialization"; ?>" name="specialization" >
          	</div>
      	</div>


      	<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Date of Last Promotion :</label>  
          	<div class="col-sm-5">
          		<input type="date" class="form-control" required value="<?php if(isset($dolp)) echo "$dolp"; ?>" name="dolp" > <font class="text-danger">(YYYY-MM-DD)</font>
          	</div>
      	</div>


      	<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Name :</label>  
          	<div class="col-sm-5">
          		<input type="text" class="form-control" required placeholder="Enter your full name" value="<?php if(isset($name)) echo "$name"; ?>" name="name" >
          	</div>
      	</div>


      	<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Date of Birth :</label>  
          	<div class="col-sm-5">
          		<input type="date" class="form-control" required value="<?php if(isset($dob)) echo "$dob"; ?>" name="dob" > <font class="text-danger">(YYYY-MM-DD)</font>
          	</div>
      	</div>


        <div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Gender :</label>  
          	<div class="col-sm-5">
          		<label class="radio-inline"><input type="radio" name="gender" required value="m" <?php if(isset($gender) && $gender=='m') echo 'checked';?> >Male</label>
                <label class="radio-inline"><input type="radio" name="gender" required value="f" <?php if(isset($gender) && $gender=='f') echo 'checked';?>>Female</label>
          	</div>
      	</div>



        <div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Category:</label>  
          	<div class="col-sm-5">
          		<label class="radio-inline"><input type="radio" name="category" required value="UR" <?php if(isset($category) && strcmp($category,"UR")==0 ) {echo 'checked';}?> >Unreserved</label>
                <label class="radio-inline"><input type="radio" name="category" required value="OBC" <?php if(isset($category) && $category=='OBC') echo 'checked';?> >OBC (Non creamy layer)</label>
                <label class="radio-inline"><input type="radio" name="category" required value="SC" <?php if(isset($category) && $category=='SC') echo 'checked';?> >SC</label>
                <label class="radio-inline"><input type="radio" name="category" required value="ST" <?php if(isset($category) && $category=='ST') echo 'checked';?> >ST</label>
          	</div>
      	</div>


        <div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Physically Handicapped:</label>
          	<div class="col-sm-5">
          		<label class="radio-inline"><input type="radio" required name="pwd" value="y" <?php if(isset($pwd) && $pwd=='y') echo 'checked';?> >Yes</label>
                <label class="radio-inline"><input type="radio" required name="pwd" value="n" <?php if(isset($pwd) && $pwd=='n') echo 'checked';?> >No</label>
          	</div>
      	</div>
        <div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Type of Disability :</label>  
          	<div class="col-sm-5">
          		<select name="pwd_type" >
                  <option value="NA" <?php if(isset($pwd_type) && $pwd_type=='NA') echo 'selected';?> >NA</option>
				  <option value="OH" <?php if(isset($pwd_type) && $pwd_type=='OH') echo 'selected';?> >Orthopedically Handicapped</option>
				  <option value="VH" <?php if(isset($pwd_type) && $pwd_type=='VH') echo 'selected';?> >Visually Handicapped</option>
				  <option value="HH" <?php if(isset($pwd_type) && $pwd_type=='HH') echo 'selected';?> >Hearing Handicapped</option>
				</select>
          	</div>
      	</div>
  


      	<div class="form-group">
        	<label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Father's Name:</label>
        	<div class="col-sm-9">
         		<input type="text" class="form-control" id="f_name" value="<?php if(isset($f_name)) echo "$f_name"; ?>" placeholder="Enter your father's name here..." name="f_name" required>
        	</div>
      	</div>


        <div class="form-group">
        	<label class="control-label col-sm-3" for="email"><span class="text-danger">*</span>Mother's Name:</label>
        	<div class="col-sm-9">
         		<input type="text" class="form-control" required placeholder="Enter your mother's name here..." value="<?php if(isset($m_name)) echo "$m_name"; ?>" name="m_name">
        	</div>
      	</div>


      	<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Marital Status :</label>  
          	<div class="col-sm-5">
          		<select name="marital_status" required>
				  <option value="single" <?php if(isset($marital_status) && $marital_status=='single') echo 'selected';?> >Single</option>
				  <option value="married" <?php if(isset($marital_status) && $marital_status=='married') echo 'selected';?> >Married</option>
				</select>
          	</div>
      	</div>


      	 <div class="form-group">
        	<label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Domicile:</label>
        	<div class="col-sm-9">
         		<input type="text" class="form-control" placeholder="" required value="<?php if(isset($domicile)) echo "$domicile"; ?>" name="domicile" maxlength="10">
        	</div>
      	</div>



        <div class="form-group">
        	<label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Mobile No.:</label>
        	<div class="col-sm-9">
         		<input type="text" class="form-control" placeholder="Enter your Mobile No." required value="<?php if(isset($mobile)) echo "$mobile"; ?>" name="mobile" >
        	</div>
      	</div>
      


		<div class="form-group">
        	<label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Correspondence Address:</label>
        	<div class="col-sm-9">
         		<input type="textarea" class="form-control" id="c_add" required  name="corr_address" value="<?php if(isset($corr_address)) echo "$corr_address"; ?>" required>
        	</div>
      	</div>
        
        
        <div class="form-group">
        	<label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Permanent Address:</label>
        	<div class="col-sm-9">
         		<input type="textarea" class="form-control" id="add" required  name="address" value="<?php if(isset($address)) echo "$address"; ?>" required>
        	</div>
      	</div>
       
        <div class="form-group">
            <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Nationality:</label>
        	<div class="col-sm-4">
         		<input type="text" class="form-control" id="nationality" required placeholder="Nationality" name="nationality" value="<?php if(isset($nationality)) echo "$nationality"; ?>" required>
        	</div>
      	</div>
      	

      


      	<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Port/Place of Applying Application Form :</label>  
          	<div class="col-sm-5">
          		<select name="place_of_application" required>
				  <option value="inside india" <?php if(isset($place_of_application) && $place_of_application=='inside india') echo 'selected';?> >INSIDE INDIA</option>
				  <option value="outside india" <?php if(isset($place_of_application) && $place_of_application=='outside india') echo 'selected';?> >OUTSIDE INDIA</option>
				</select>
          	</div>
      	</div>
        
        
        <div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Identity Proof :</label>  
          	<div class="col-sm-2">
          		<select name="id_type" required>
				  <option value="AADHAR" <?php if(isset($id_type) && $id_type=='AADHAR') echo 'selected';?> >AADHAR NO.</option>
				  <option value="PASSPORT" <?php if(isset($id_type) && $id_type=='PASSPORT') echo 'selected';?> >PASSPORT</option>
				  <option value="VOTER" <?php if(isset($id_type) && $id_type=='VOTER') echo 'selected';?> >VOTER ID</option>
                  <option value="DRIVING" <?php if(isset($id_type) && $id_type=='DRIVING') echo 'selected';?> >DRIVING LINCENSE</option>
                  <option value="OTHER" <?php if(isset($id_type) && $id_type=='OTHER') echo 'selected';?> >OTHER</option>


                </select>
          	</div>
            <div class="col-sm-4">
          		<input type="text" class="form-control" id="id_no" required placeholder="Identity Number" name="id_no" value="<?php if(isset($id_no)) echo "$id_no"; ?>" required>
          	</div>
      	</div>
        
        
        
</div>
<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="per_ch" class="btn btn-primary col-sm-12">Submit Information</button>
    </div>
  </div>
  </form>
</div>
</body>
<script>
<?php
if($emp!='y')
{?>
	$(document).ready(function () {
    $('#mnnitemp').hide();
    $("#mnnit_yes").click(function () { //use change event
            $('#mnnitemp').stop(true,true).show(200); //than show
    });
	$("#mnnit_no").click(function () { //use change event
            $('#mnnitemp').stop(true,true).hide(200); //than show
    });
});
<?php
}?>
<?php
if($emp!='y')
{?>
	$(document).ready(function () {
    $('#mnnitdept').hide();
    $("#mnnit_yes").click(function () { //use change event
            $('#mnnitdept').stop(true,true).show(200); //than show
    });
	$("#mnnit_no").click(function () { //use change event
            $('#mnnitdept').stop(true,true).hide(200); //than show
    });
});
<?php
}?>
</script>
</html>    