<?php
session_start();
require_once ('included_classes/class_sql.php');
require_once ('included_classes/class_user.php');
require_once ('included_classes/class_misc.php');
require_once ("included_classes/verify_func.php");
if(!isset($_SESSION['user']))
{
  echo"<script>alert('Login first');</script>";
  header("location:index.php");
}
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MNNIT Allahabad</title>
    <script src="include/jquery-2.1.4.min.js"></script>
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="icon" href="images/MNNIT1.ico" />
    <link href="https://fonts.googleapis.com/css?family=Graduate|Roboto+Condensed|Yanone+Kaffeesatz" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="include/lv-ripple.css">
	<link rel="stylesheet" type="text/css" href="include/style.css">
     <link rel="stylesheet" type="text/css" href="main.css" >
    </head>
   
    <body style="overflow-x:hidden;">
        
    <?php include("template.php");?>

        <div class="col-xs-offset-0 col-xs-12 col-md-offset-0 col-md-8" style="margin-top:3%">
            <div class="panel panel-default" style="border:0px">
                <div class="panel panel-heading" style="background:#012B5D">
                        <h3 align="center" class="text-info" style="font-family: 'Yanone Kaffeesatz', sans-serif;font-size:26px;color:#fff;margin-top:10px">
                        	Online Application for Contract Employee Position
                        </h3>
                </div>
                <div class="panel panel-body" style="padding:0px;">
                	<div class="well">
                        <div class="list-group">
                             <?php 
        			                        if($_GET['val']=="perinfo")
                                                                 include("personal_info.php");
							else  if($_GET['val']=="image")
								include("image.php");
							else  if($_GET['val']=="education_qual")
								include("education_qual.php");
							else  if($_GET['val']=="present_emp")
								include("present_emp.php");
							else  if($_GET['val']=="work_exp")
								include("work_exp.php");
							else  if($_GET['val']=="reference")
								include("reference.php");
                                                         else if($_GET['val']=="app_post")
                                                                 include("app_post.php");
							else if($_GET['val']=="print")
								include("print.php");
                                                        else if($_GET['val']=='other_info')
                                                                include("other_info.php");
							else if($_GET['val']=="contact")
								include("contact.php");
           	   				?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <footer class="well col-sm-12" style="margin:0px; padding:10px;margin-top:12px;">
         <p class="small" style="margin-bottom:0px;" align="center">&copy; Webteam, Dean Academics <br />
                MNNIT Allahabad.<br />
                This is a &beta; version and is under devleopment.
         </p>
     </footer>
     <script type="text/javascript" src="include/lv-ripple.jquery.js"></script>
	<script type="text/javascript" src="include/app.js"></script>
    </body>
    </html>
                                                   