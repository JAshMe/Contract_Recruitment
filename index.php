<?php
 // header("location:assistant/index.php");
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dean Academics, MNNIT Allahabad</title>
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




    <style type="text/css">
        
        .panel-login {
    border-color: #ccc;
    -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
    color: #00415d;
    background-color: #fff;
    border-color: #fff;
    text-align:center;
}
.panel-login>.panel-heading a{
    text-decoration: none;
    color: #666;
    font-weight: bold;
    font-size: 15px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
    color: #23527c;
    font-size: 18px;
}
.panel-login>.panel-heading hr{
    margin-top: 10px;
    margin-bottom: 0px;
    clear: both;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
    height: 45px;
    border: 1px solid #ddd;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
    outline:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
}
.btn-login {
    background-color: #59B2E0;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
    color: #fff;
    background-color: #53A3CD;
    border-color: #53A3CD;
}
.forgot-password {
    text-decoration: underline;
    color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
    text-decoration: underline;
    color: #666;
}

.btn-register {
    background-color: #1CB94E;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
    color: #fff;
    background-color: #1CA347;
    border-color: #1CA347;
}

    </style>
   
    <body style="overflow-x:hidden;">
        
    
        <div id="headerbg" class="col-md-12" style="padding:1%"> 
            <div class="col-md-2 col-xs-4 col-xs-offset-4" style="margin-left:40px;width:150px">
                <img class="img-responsive" src="logo-MNNIT.png" style="height:150px">
            </div>
            <div class="col-md-9">
            <center><h3 style="color:white;font-family: 'Graduate', cursive;margin-left:50px; line-height:30px;">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY<br />ALLAHABAD<br /></h3></center>
            </div>
        </div>
        

    	<div class="container" style="padding:90px">
        	<div class="row" style="margin-top:150px;">
            	<div class="col-md-4 col-md-push-4">
                	<center><a href="assistant"><button class="btn btn-primary">Assistant Professor</button></a></center>
                </div>
            </div>
            <!--<div class="row" style="margin-top:50px;">
            	<div class="col-md-4 col-md-push-4">
                	<center><a href="assistant"><button class="btn btn-primary">Assistant Professor</button></a></center>
                </div>
            </div>-->
        </div>
        

    
    <footer class="well col-sm-12" style="margin:0px; padding:10px;margin-top:12px;">
         <p class="small" style="margin-bottom:0px;" align="center">&copy; Webteam, Dean Academics <br />
                MNNIT Allahabad.<br />
                This is a &beta; version and is under devleopment.
         </p>
     </footer>
    </body>
    </html>