<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/29/2018
 * Time: 5:54 PM
 */
    session_start();
    require_once("included_classes/class_user.php");
    require_once("included_classes/class_misc.php");
    require_once("included_classes/class_sql.php");
	require_once ("../mailing_script/class_misc.php");
require_once ("../mailing_script/class_sql.php");
//
include ("../mailing_script/PHPMailer/PHPMailerAutoload.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();

    if(isset($_SESSION['user']))
            $misc->redirect("home.php?val=perinfo");

    if(isset($_POST['login-submit'])){
            $email = $_POST['email'];
            $email = mysqli_real_escape_string($db->connection,trim(htmlentities($email)));
            $pass = $_POST['pass'];
            $pass = md5($pass);
            $sql = "select * from login where email = '$email' and password like '$pass'";

            $r = $db->process_query($sql);
            if(mysqli_num_rows($r)>0){
                    $r = $db->fetch_rows($r);
                    $_SESSION['user'] = $r['user_id'];
                    $verify=$r['verify'];
                    if($verify=='0')
                    {
                            session_destroy();
                            $misc->palert("Please verify your account","index.php");

                    }
                    $misc->palert("Logged in successfully","home.php?val=perinfo");

            }
            else{
                    $misc->palert("Log in failed","index.php");

            }
    }
    else if(isset($_POST['register-submit'])){
            $email = validate($_POST['email']);
            $email = mysqli_real_escape_string($db->connection,trim(htmlentities($email)));
            $pass =hash('sha256',$_POST['pass']);
            $sql = "select * from login where email = '$email'";
            $r = $db->process_query($sql);
            if(mysqli_num_rows($r)>0){
                    $misc->palert("Email id already exists","");
            }
            else{
                    $sql = "select * from login";
                    $r = $db->process_query($sql);
                    $r=mysqli_num_rows($r)+1;

                    $id=(string) $r;
                    $id = str_pad($id,5,0,STR_PAD_LEFT);
                    $id=date('Y').'JR'.$id;
                    $sql = "insert into login(`user_id`,`email`,`password`,`verify`) values ('$id','$email','$pass','1')";
                    $r = $db->process_query($sql);
                    if($r){
                            $hash=base64_encode($id);
                            $emailBody="<p align=\"justify\" style=\"text-indent:20px;\" > This e-mail was generated in response to a request to register on Faculty Recruitment portal<a href=\"academics.mnnit.ac.in/recruitment\"> academics.mnnit.ac.in/recruitment </a>.</p> <p align=\"justify\" style=\"text-indent:20px;\" >If you didn't perform this action, kindly ignore this e-mail. If you are being spammed, you can complain about it at recruitmentcell@mnnit.ac.in . The verification link is given below.</p><strong>Click <a href=\"academics.mnnit.ac.in/recruitment/assistant/verify.php?return=$hash\">here</a></b> to verify your email. <br /><br />";
                            //echo $emailBody;
                            $emailUser = $email;
                            $mail = new PHPMailer;
                            $mail->IsSMTP ();
                            $mail->Host = "smtp.gmail.com";//"74.125.71.109"; // SMTP server- gmail.com
                            $mail->SMTPAuth = true; // enable SMTP authentication
                            $mail->SMTPSecure = "tls";
                            //$mail->Host       = "172.31.100.9"; // sets the SMTP server
                            $mail->Port = 587; // set the SMTP port for the GMAIL server
                            $mail->Username = "academics@mnnit.ac.in"; // SMTP account username
                            $mail->Password = "D_acad@2014"; // SMTP account password
                            $mail->SetFrom('academics@mnnit.ac.in', 'Faculty Recruitment');
                            $mail->Subject = "Email Verification";
                            $mail->Body = $emailBody;
                            $mail->AddAddress($emailUser);
                            //$mail->SMTPDebug  = true;
                            // Send and verify
                            //$mail->Timeout = 3600;
                            $mail->isHTML(true);
//                            if (! $mail->Send ()) {
//
//                                    echo "Message sending failed . Try again later.";
//                                    die("Message sending failed . Try again later.");
//                                    //die( $mail->ErrorInfo);
//
//                            }

                            $misc->palert("Verification mail send successfully on your Email-Id","");
                    }
            }

    }
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
                <center><h3 style="color:white;font-family: 'Graduate', cursive;margin-left:50px; line-height:30px;">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY<br />ALLAHABAD<br /></h3><br><h3 style="color:white;">Recruitment for Contract Employee</h3></center>
        </div>
</div>


<div class="container" style="padding:90px;">
        <div class="row">
                <div class="col-md-6 col-md-offset-3" style="margin-top:30px">
                        <div class="panel panel-login">
                                <div class="panel-heading">
                                        <div class="row">
                                                <div class="col-xs-6">
                                                        <a href="#" class="active" id="login-form-link">Login</a>
                                                </div>
                                                <div class="col-xs-6">
                                                        <a href="#" id="register-form-link">Register</a>
                                                </div>
                                        </div>
                                        <hr>
                                </div>
                                <div class="panel-body">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                                                                <div class="form-group">
                                                                        <input type="email" name="email" id="username" tabindex="1" class="form-control" placeholder="Email Id" value="">
                                                                </div>
                                                                <div class="form-group">
                                                                        <input type="password" name="pass" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                                </div>

                                                                <div class="form-group">
                                                                        <div class="row">
                                                                                <div class="col-sm-6 col-sm-offset-3">
                                                                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                                                </div>
                                                                        </div>
                                                                </div>

                                                        </form>
                                                        <form id="register-form" action="" method="post" role="form" style="display: none;" onSubmit="return validate();">
                                                                <div class="form-group">
                                                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                                                </div>
                                                                <div class="form-group">
                                                                        <input type="password" name="pass" id="pass" tabindex="2" class="form-control" placeholder="Password">
                                                                </div>
                                                                <div class="form-group">
                                                                        <input type="password" name="conf_pass" id="conf_pass" tabindex="2" class="form-control" placeholder="Confirm Password">
                                                                </div>
                                                                <div class="form-group">
                                                                        <div class="row">
                                                                                <div class="col-sm-6 col-sm-offset-3">
                                                                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>

<div class="row" style="margin-top:-50px">
        <div class="col-md-6 col-md-push-3">
                <h2><center>Instructions to fill the form. <a href="General%20Instructions.pdf">Click Here</a></center></h2>
        </div>
</div>
<footer class="well col-sm-12" style="margin:0px; padding:10px;margin-top:12px;">
        <p class="small" style="margin-bottom:0px;" align="center">&copy; Webteam, Dean Academics <br />
                MNNIT Allahabad.<br />
                This is a &beta; version and is under devleopment.
        </p>
</footer>
<script>
        function validate(){
                if($('#pass').val()!=$('#conf_pass').val()){
                        alert("Passwords don't match!");
                        $('#pass').val('');
                        $('#conf_pass').val('');
                        return false;
                }
                return true;
        }
</script>
<script type="text/javascript">
        $(function() {

                $('#login-form-link').click(function(e) {
                        $("#login-form").delay(100).fadeIn(100);
                        $("#register-form").fadeOut(100);
                        $('#register-form-link').removeClass('active');
                        $(this).addClass('active');
                        e.preventDefault();
                });
                $('#register-form-link').click(function(e) {
                        $("#register-form").delay(100).fadeIn(100);
                        $("#login-form").fadeOut(100);
                        $('#login-form-link').removeClass('active');
                        $(this).addClass('active');
                        e.preventDefault();
                });

        });

</script>
<script type="text/javascript" src="include/lv-ripple.jquery.js"></script>
<script type="text/javascript" src="include/app.js"></script>
</body>
</html>
