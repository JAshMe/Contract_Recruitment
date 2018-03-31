<?php
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
   
    $id=$_SESSION['user'];
    $query="SELECT * from `other_info` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysqli_num_rows($r)>0)
    {
     $r = $db->fetch_rows($r);
    $info = validate($r['info']);
    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Any Other Information</title>
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
  <center><b style="font-size:18px;">Any Other Information</b></center>
<hr>

<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> * Marked fields are mandatory.</li>
</ul>

</script>
<form class="form-horizontal" name="phd_frm" method="post" action="save.php" >
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Any Other Information</h3>
        <hr>




        <div class="form-group">
            <label class="control-label col-sm-2" for="email"> Other Information:<br>(Max. 500 characters)</label>
          <div class="col-sm-6">
            <textarea type="text" row="50" class="form-control"   name="info" required maxlength="500"> <?php if(isset($info)) echo "$info"; ?> </textarea>
          </div>
        </div>




        

<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="info_pg" class="btn btn-primary col-sm-12">Submit Information</button>
    </div>
  </div>
  </form>
</div>
</body>
</html>    