<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   
    $id=$_SESSION['user'];
    $query="SELECT * from `phd_info` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)>0)
    {
     $r = $db->fetch_rows($r);
   
    $date = validate($r['date']);
    $title = validate($r['title']);
    $university = validate($r['university']);
	$status = validate($r['status']);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHD Information</title>
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
	<center><b style="font-size:18px;">Ph. D. Information</b></center>
<hr>
<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>
<form class="form-horizontal" name="phd_frm" method="post" action="save.php" >
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Ph. D. Information</h3>
        <hr>


		<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Status :</label>  
          	<div class="col-sm-5">
          		<select name="status" required>
				  <option value="Submitted" <?php if(isset($status) && $status=='Submitted') echo 'selected';?> >Submitted</option>
				  <option value="Awarded" <?php if(isset($status) && $status=='Awarded') echo 'selected';?> >Awarded</option>
                </select>
          	</div>
      	</div>
        
        
		<div class="form-group">
         	<label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Title :</label>  
          	<div class="col-sm-5">
          		<input type="text" class="form-control" placeholder="Title" value="<?php if(isset($title)) echo "$title"; ?>" name="title" required >
          	</div>
      	</div>



        <div class="form-group">
            <label class="control-label col-sm-3" for="email"><span class="text-danger">*</span> Date :</label>
          <div class="col-sm-4">
            <input type="date" class="form-control"  value="<?php if(isset($date)) echo "$date"; ?>" name="date" required> <font class="text-danger">(YYYY-MM-DD)</font>
          </div>
        </div>


      	<div class="form-group">
          <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> University/Instuite :</label>  
            <div class="col-sm-5">
              <input type="text" class="form-control" placeholder="University" value="<?php if(isset($university)) echo "$university"; ?>" name="university" required >
            </div>
        </div>


<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="phd_ch" class="btn btn-primary col-sm-12">Submit Information</button>
    </div>
  </div>
  </form>
</div>
</body>
</html>    