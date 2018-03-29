<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Image</title>
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
	<center><b style="font-size:18px;">Upload Photograph &amp; Signature</b></center>
<hr>

<p align="justify" class="larger-font"> 

<ul class="text-danger">
  <li> Photograph size should not exceed 300KB.</li>
  <li> The image file should be of JPG format.</li>
</ul>

<table class="table">
        <div align="center"><div style="margin-top:0px;margin-bottom:0px"><?php echo "<img src=photos/".$_SESSION['user'].".JPG style=\"margin-top:0px; border-width:thin;\" width=\"175\" height=\"180\" alt = \"Photo not in Records Please Upload Your Photo\" /> "; ?> </div>
        </div>
</table>

<table class="table">
        <div align="center"><div style="margin-top:0px;margin-bottom:0px"><?php echo "<img src=./photos/".$_SESSION['user']."_2.JPG style=\"margin-top:0px; border-width:thin;\" width=\"175\" height=\"50\" alt = \"Photo not in Records Please Upload Your Photo\" /> "; ?> </div>
        </div>
</table>

<form class="form-horizontal" name="reg_frm" method="post" action="upload_photo.php" enctype="multipart/form-data">
<div class="tab-content">
      <div id="home" class="tab-pane fade in active">
                <h3>Upload Photograph &amp; Signature:</h3>
                <hr>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Upload your photograph :</label>
                  <div class="col-sm-5">
                    <input type="file"  name="photo" required>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-3" for="dob"><span class="text-danger">*</span> Upload your Signature :</label>
                  <div class="col-sm-5">
                    <input type="file"  name="sign" required>
                  </div>
        </div>
        </div>

<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" name="image" class="btn btn-primary col-sm-12">Upload</button>
    </div>
  </div>
  </form>
</div>
</body>
</html>    