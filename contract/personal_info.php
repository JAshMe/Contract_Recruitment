<?php

require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   
    $id=$_SESSION['user'];
	$emp="";
$query="SELECT * from `user` where `user_id` like '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
{
  $r = $db->fetch_rows($r);
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

<!DOCTYPE html>
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
<div id="main" style="font-size:13px; margin:0 0 0 0;" align="justify">
	<center><b style="font-size:18px;">Personal Information</b></center>
<hr>
<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

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
			<label class="control-label col-sm-3" for="emp_code"> MNNIT employee code :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control"  id="emp_code" value="<?php if(isset($emp_code)) echo "$emp_code"; ?>" name="emp_code" >
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3" for="name"><span class="text-danger">*</span> Name :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control"  id="name" required placeholder="Enter your full name" value="<?php if(isset($name)) echo "$name"; ?>" name="name" >
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Date of Birth :</label>
			<div class="col-sm-5">
				<input  id="dob" type="date" class="form-control" required value="<?php if(isset($dob)) echo "$dob"; ?>" name="dob" > <font class="text-danger">(MM-DD-YYYY)</font>
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
			<div class="col-sm-6">
				<label class="radio-inline"><input type="radio"  name="category" required value="UR" <?php if(isset($category) && strcmp($category,"UR")==0 ) {echo 'checked';}?> >Unreserved</label>
			<label class="radio-inline"><input type="radio" name="category" required value="OBC" <?php if(isset($category) && $category=='OBC') echo 'checked';?> >OBC (Non creamy layer)</label>
			<label class="radio-inline"><input type="radio" name="category" required value="SC" <?php if(isset($category) && $category=='SC') echo 'checked';?> >SC</label>
			<label class="radio-inline"><input type="radio" name="category" required value="ST" <?php if(isset($category) && $category=='ST') echo 'checked';?> >ST</label>
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Physically Handicapped:</label>
			<div class="col-sm-3">
				<label class="radio-inline"><input type="radio" required name="pwd" value="y" <?php if(isset($pwd) && $pwd=='y') echo 'checked';?> >Yes</label>
			<label class="radio-inline"><input type="radio" required name="pwd" value="n" <?php if(isset($pwd) && $pwd=='n') echo 'checked';?> >No</label>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="type_dis"><span class="text-danger">*</span> Type of Disability :</label>
			<div class="col-sm-5">
				<select  id="type_dis" class="form-control" name="pwd_type" >
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
			<label class="control-label col-sm-3" for="marit"><span class="text-danger">*</span> Marital Status :</label>
			<div class="col-sm-3">
				<select  id="marit" class="form-control" name="marital_status" required>
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
			<label class="control-label col-sm-3" for="c_add"><span class="text-danger">*</span> Correspondence Address:</label>
			<div class="col-sm-9">
				<textarea class="form-control" id="c_add" required  name="corr_address" value="<?php if(isset($corr_address)) echo "$corr_address"; ?>">
				</textarea>
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-sm-3" for="add"><span class="text-danger">*</span> Permanent Address:</label>
			<div class="col-sm-9">
				<textarea class="form-control" id="add" required  name="address" value="<?php if(isset($address)) echo "$address"; ?>">
				</textarea>
			</div>
		</div>

		<div class="form-group">
		    <label class="control-label col-sm-3" for="nationality"><span class="text-danger">*</span> Nationality:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="nationality" required placeholder="Nationality" name="nationality" value="<?php if(isset($nationality)) echo "$nationality"; ?>">
			</div>
		</div>


      	<div class="form-group">
         	<label class="control-label col-sm-3" for="poa"><span class="text-danger">*</span> Port/Place of Applying Application Form :</label>
          	<div class="col-sm-4">
          		<select id="poa" name="place_of_application" required class="form-control">
				  <option value="inside india" <?php if(isset($place_of_application) && $place_of_application=='inside india') echo 'selected';?> >INSIDE INDIA</option>
				  <option value="outside india" <?php if(isset($place_of_application) && $place_of_application=='outside india') echo 'selected';?> >OUTSIDE INDIA</option>
				</select>
          	</div>
      	</div>
        
        
        <div class="form-group">
         	<label class="control-label col-sm-3" for="id_type"><span class="text-danger">*</span> Identity Proof :</label>
          	<div class="col-sm-3">
          		<select id="id_type" name="id_type" required class="form-control">
			  <option value="AADHAR" <?php if(isset($id_type) && $id_type=='AADHAR') echo 'selected';?> >AADHAR NO.</option>
			  <option value="VOTER" <?php if(isset($id_type) && $id_type=='VOTER') echo 'selected';?> >VOTER ID</option>
                	</select>
          	</div>
            <div class="col-sm-4">
          		<input type="text" class="form-control" id="id_no" required placeholder="Identity Number" name="id_no" value="<?php if(isset($id_no)) echo "$id_no"; ?>">
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