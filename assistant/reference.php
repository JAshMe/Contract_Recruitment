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

</script>
<form class="form-horizontal" name="phd_frm" method="post" action="save.php" >
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Reference</h3>
        <hr>




        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Name :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="name" required> 
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Designation:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control"   name="designation" required> 
          </div>
        </div>




        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Address :</label>  
            <div class="col-sm-5">
              <textarea type="text" class="form-control"   name="address" required ></textarea>
            </div>
        </div>


        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"> City :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="city" > 
          </div>
            <label class="control-label col-sm-2" for="email"> PIN:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control"   name="pincode"  maxlength="6"> 
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="dob"> Mobile No. :</label> 
          <div class="col-sm-3">
            <input type="text" class="form-control"   name="mobile"  maxlength="10"> 
          </div>
            <label class="control-label col-sm-2" for="email"><span class="text-danger">*</span> Email:</label>
          <div class="col-sm-4">
            <input type="email" class="form-control"   name="email" required> 
          </div>
        </div>


      <div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="reference" class="btn btn-primary col-sm-12">Submit Information</button>
    </div>
  </div>
  </form>
</div>
</body>
</html>    