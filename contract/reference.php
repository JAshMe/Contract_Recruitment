<?php
	require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   
    $id=$_SESSION['user'];
    $query="SELECT * from `reference` where `user_id` like '$id'";
    $c = $db->process_query($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<title>Reference</title>
	</head>
	<body>
		<div id="main" style="font-size:13px; margin:0px 0 0 0;" align="justify">
 		<center><b style="font-size:18px;">Reference</b></center>
		<hr>
		<table class="table table-striped">
	 	<tr><th>Name</th><th>Designation</th><th>Address</th><th>City</th><th>PIN</th><th>Mobile</th><th>Email</th><th>Remove</th></tr>
		<?php
			while(($r = $db->fetch_rows($c)))
		    {
			    $tmp_id=$r['id'];
			    $name=validate($r['name']);
				$designation=validate($r['designation']);
				$address=validate($r['address']);
				$city=validate($r['city']);
				$pincode=validate($r['pincode']);
				$mobile=validate($r['mobile']);
				$email=validate($r['email']);
		  
		  		echo "<tr><td>$name</td><td>$designation</td><td>$address</td><td>$city</td><td>$pincode</td><td>$mobile</td><td>$email</td><td><a href='delete.php?id=$tmp_id&page=reference'>Remove</a></td></tr>";
			}
	 	?>
		</table>
		<p align="justify" class="larger-font"> 

		<ul class="text-danger">
  			<li> * Marked fields are mandatory.</li>
  			<li> Two references must be filled.</li>
		</ul>

		<form class="form-horizontal" name="phd_frm" method="post" action="save.php" onsubmit="return validate();" >
			<div class="tab-content">
      		<div id="home" class="tab-pane fade in active">
        	<h3>Reference</h3>
        	<hr>

	        <div class="form-group">
	          <label class="control-label col-sm-3" for="name"><span class="text-danger">*</span> Name :</label> 
	          <div class="col-sm-3">
	            <input type="text" class="form-control"   name="name" required> 
	          </div>
	            <label class="control-label col-sm-2" for="designation"><span class="text-danger">*</span> Designation:</label>
	          <div class="col-sm-4">
	            <input type="text" class="form-control" name="designation" required> 
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label col-sm-3" for="address"><span class="text-danger">*</span> Address :</label>
	            <div class="col-sm-5">
	              <textarea type="text" class="form-control" name="address" required ></textarea>
	            </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label col-sm-3" for="city"><span class="text-danger">*</span> City :</label> 
	          <div class="col-sm-3">
	            <input type="text" class="form-control" name="city" required> 
	          </div>
	            <label class="control-label col-sm-2" for="pincode"><span class="text-danger">*</span> PIN:</label>
	          <div class="col-sm-4">
	            <input type="text" class="form-control" name="pincode" id="pincode" maxlength="6" required> 
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label col-sm-3" for="mobile"> <span class="text-danger">*</span>Mobile No. :</label> 
	          <div class="col-sm-3">
	            <input type="text" class="form-control"   name="mobile" id="mobile" maxlength="10" required> 
	          </div>
	            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Email:</label>
	          <div class="col-sm-4">
	            <input type="email" class="form-control" name="email" id="email" required> 
	          </div>
	        </div>

			<div class="form-group"> 
			    <div class="col-sm-offset-4 col-sm-4">
			      <button type="submit" name="reference" class="btn btn-primary col-sm-12">Submit Information</button>
			    </div>
			  </div>
		</form>
		<script>
			function validate(){
				mobile=$('#mobile').val();
				pin=$('#pincode').val();
				email=$('#email').val();
				if(!$.isNumeric(mobile)){
					alert('Mobile should be numeric');
					return false;
				}
				if(mobile.length!=10){
					alert('Mobile number should be of 10 digits');
					return false;
				}
				if(!$.isNumeric(pin)){
					alert('Pincode should be numeric');
					return false;
				}
				if(pin.length!=6){
					alert('Pincode should be of 6 digits');
					return false;
				}
				var filter = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
				if (!filter.test(email)){
					alert('Email should be of correct format');
					return false;
				}
				return true;
			}
		</script>
	</body>
</html>