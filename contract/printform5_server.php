<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 4/2/2018
 * Time: 1:41 AM
 */
require_once("./included_classes/class_user.php");
require_once("./included_classes/class_misc.php");
require_once("./included_classes/class_sql.php");
require_once ("./include/verify_document.php");
$misc= new miscfunctions();
$db = new sqlfunctions();

if(!isset($_SESSION['user']))
        die("Please Login First!!");
$id=$_SESSION['user'];



$posts = array("Project Supervisor [Junior Engineer-Civil/ Electrical]","Executive in Executive Development Centre","Office Assistant in EDC","Technical Manpower [for Clinical Diagnostics and Pathological Studies, Animal Tissue Culture, Immunodiagnostics, PCR/ Molecular Based Diagnostics Lab]","Lab Assistant [for CMDR]","Technical Officer [Centre for Interdisciplinary Research (CIR)]","Technical Manpower [Centre for Interdisciplinary Research (CIR)]");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Form</title>
        <link rel="stylesheet" type="text/css" href="../include/bootstrap/css/bootstrap.min.css" >
        <script type="text/javascript" src="../include/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="../include/bootstrap/js/bootstrap.min.js"></script>
        <!--        <link href="https://fonts.googleapis.com/css?family=Graduate|Roboto+Condensed|Yanone+Kaffeesatz" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="main.css" >
        <style type="text/css">
                .table-bordered{
                        border:none;
                }
                .style1 {font-size: 16px}
        </style>
        <style type="text/css">
                /*!* latin *!*/
                @font-face {
                        font-family: 'Graduate';
                        font-style: normal;
                        src:url('../fonts/Graduate/Graduate-Regular.ttf');
                }

                @font-face {
                        font-family: 'Roboto Condensed';
                        src: url(http://localhost/Contract_Recruitment/fonts/Roboto_Condensed/RobotoCondensed-Regular.ttf) format('truetype');
                }
                @font-face {
                        font-family: 'Roboto Condensed';
                        font-weight: bold;
                        src: url(http://localhost/Contract_Recruitment/fonts/Roboto_Condensed/RobotoCondensed-Bold.ttf) format('truetype');
                }
                .style5 {font-size: 18px; font-weight: bold; font-family: 'Roboto Condensed',sans-serif;}
                label{
                        display:inline-block;
                        width:200px;
                }
                th{
                        width:35%;
                }
                input[type=checkbox]{
                        margin-right:10px;

                }
                h4{
                        font-family: 'Roboto Condensed',sans-serif;
                }
                .form
                {
                        width:600px;
                        height:auto;
                        position:relative;
                        margin-right:auto;
                        margin-left:auto;
                }
        </style>


</head>

<body>

<div class="form" style="width: 700px">

        <table width="100%" border="0">
                <tr>
                        <td width="12%" height="70"><div align="center"><img alt="MNNIT Logo" src="logo-MNNIT.png" width="110" height="105" /></div></td>
                        <td width="73%">
                                <h3 align="center" class="style5">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY <br /> ALLAHABAD - 211004 (INDIA)<br><div style="margin-top: 10px;">APPLICATION FORM</div>
                                </h3>
                        </td>
                        <td width="8%" class="right">
                                <table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#000000"></table>
                        </td>

                </tr>

                <tr>
                        <td colspan="3" style="padding-top:0;"><div align="center">
                                        <strong>Advertisement No.</strong> <span class="style1">1/2018, Dated <?= date("d-m-Y") ?></span><br />
                                        <hr style="margin:0"/>
                                </div></td>
                </tr>
        </table>

        <br>

        <div class="row">



                <?php
                $query="SELECT * from `user` where `user_id` like '$id'";
                $c = $db->process_query($query);
                $r = $db->fetch_rows($c);
                $name=$r['name'];
                $dob=validate($r['dob']);
                $gender = validate($r['gender']);
                $category=validate($r['category']);
                $nationality=validate($r['nationality']);
                $f_name=validate($r['f_name']);
                $m_name=validate($r['m_name']);
                $address=validate($r['address']);
                $pwd=validate($r['pwd']);
                $pwd_type=validate($r['pwd_type']);
                $marital=validate($r['marital_status']);
                $domicile=validate($r['domicile']);
                $corr_address=validate($r['corr_address']);
                $place_of_application=validate($r['place_of_application']);
                $mobile=validate($r['mobile']);
                $id_type=validate($r['id_type']);
                $id_no=validate($r['id_no']);
                $emp = $r['emp'];
                $emp_code = $r['emp_code'];
                $query="SELECT * from `login` where `user_id` like '$id'";
                $c = $db->process_query($query);
                $r = $db->fetch_rows($c);
                $email=validate($r['email']);

                 ?>


                <div class="col-md-8 col-xs-8">
                        <br>
                        <table class="table table-bordered table-striped">
                                <tr><th>Application Id:</th><td><?=$_SESSION['user'];?></td></tr>
                                <tr><th>Post Applied For:</th><td><?= $posts[4];?></td></tr>
                                <!-- <tr><th>Department:</th><td></td></tr> -->
                        </table>
                </div>

                <div class="col-md-4 col-xs-4" style="margin-top: -25px;height: 230px;">
                        <table class="table">
                                <div align="center">
                                        <div style="margin-top:10px;margin-bottom:0"><?php echo "<img src=./photos/".$_SESSION['user']."_2.JPG style=\"margin-top:0; border-width:thin;\" width=\"175\" height=\"50\" alt = \"Photo not in Records Please Upload Your Photo\" /> "; ?> </div>
                                </div>
                                <div align="center">
                                        <div style="margin-top:0;margin-bottom:0"><?php echo "<img src=./photos/".$_SESSION['user'].".JPG style=\"margin-top:0; border-width:thin;\" width=\"175\" height=\"180\" alt = \"Photo not in Records Please Upload Your Photo\" /> "; ?> </div>
                                </div>
                        </table>
                </div>
        </div>
        <h4 style="margin-top:-45px;"><strong>1. Personal Info:</strong></h4>
        <hr>
        <table class="table table-bordered table-striped">
                <tr>
                        <th>A) Name of the Candidate:</th><td><?php echo $name;?></td>
                        <th>B) Mobile No:</th><td><?php echo $mobile;?></td>
                </tr>
                <tr>
                        <th>C)Age as on date of application: </th><td><?php  ?></td>
                        <th>D) Date of Birth:</th><td><?php echo $dob;?></td>
                </tr>
                <tr>
                        <th>E) Gender:</th><td><?php $sex=strtolower($gender);if($gender=="m")echo " Male"; else echo " Female"; ?></td>
                        <th>F) Marital Status:</th><td><?php echo $marital;?></td>
                </tr>
                <tr>
                        <th>G) Nationality:</th><td><?php echo $nationality;?></td>
                        <th>H) Domicile:</th><td><?php echo $domicile;?></td>
                </tr>
                <tr>
                        <th>I) Category:</th><td><?php echo strtoupper($category);?></td>
                        <th>J) Physically Handicapped:</th><td><?php if($pwd=="y")echo "Yes (".$pwd_type.")";else echo "No";?></td>
                </tr>
                <tr><th>K) Email:</th><td><?php echo $email;?></td></tr>
                <tr><th>L) Name of Father:</th><td><?php echo $f_name;?></td></tr>
                <tr><th>M) Name of Mother:</th><td><?php echo $m_name;?></td></tr>
                <tr><th>N) Identity Proof:</th><td><?php echo $id_type." - ".$id_no;?></td></tr>
                <tr><th>O) Correspondence Address:</th><td><?php echo $corr_address;?></td></tr>
                <tr><th>P) Permanent Address:</th><td><?php echo $address;?></td></tr>
                <!-- <tr><th>Q) Port/Place of Applying Application Form:</th><td><?php //echo $place_of_application;?></td></tr> -->
        </table>


        <?php
        $board_12=$comp_12=$school_12=$per_or_cgpa_12=$value_12=$marks_12=$max_marks_12=null;
        $board_10=$comp_10=$school_10=$per_or_cgpa_10=$value_10=$marks_10=$max_marks_10=null;
        $field_d=$start_date_d=$end_date_d=$per_or_cgpa_d=$value_d=$marks_d=$max_marks_d=$university_d=$is_others_d='';
        $degree_pg=$specialization_pg=$start_date_pg=$completion_date_pg=$per_or_cgpa_pg=$value_pg=$marks_pg=$max_marks_pg=$university_pg=$is_others_pg='';
        $degree_ug=$specialization_ug=$start_date_ug=$completion_date_ug=$per_or_cgpa_ug=$value_ug=$marks_ug=$max_marks_ug=$university_ug=$is_others_ug='';


        //10th data
        $query="SELECT * from `10th_mark` where `user_id` like '$id'";
        $c = $db->process_query($query);
        if(mysqli_num_rows($c)>0) {
                $c = $db->fetch_rows($c);
                $board_10 = $c['board'];
                $comp_10 = $c['completion_date'];
                $school_10 = $c['school'];
                $per_or_cgpa_10 = $c['per_or_cgpa'];
                $value_10 = $c['value'];
                $marks_10 = $c['marks'];
                $max_marks_10 = $c['max_marks'];
        }


        //diploma data
        $query="SELECT * from `diploma` where `user_id` like '$id'";
        $c = $db->process_query($query);
        if(mysqli_num_rows($c)>0) {
                $c = $db->fetch_rows($c);
                $field_d = $c['field'];
                $start_date_d = $c['start_date'];
                $end_date_d = $c['end_date'];
                $per_or_cgpa_d = $c['per_or_cgpa'];
                $value_d = $c['value'];
                $marks_d = $c['marks'];
                $max_marks_d = $c['max_marks'];
                $university_d = $c['university'];
                $is_others_d= $c['is_others'];
        }

        //12th data
        $query="SELECT * from `12th_mark` where `user_id` like '$id'";
        $c = $db->process_query($query);
        if(mysqli_num_rows($c)>0) {
                $c = $db->fetch_rows($c);
                $board_12 = $c['board'];
                $comp_12 = $c['completion_date'];
                $school_12 = $c['school'];
                $per_or_cgpa_12 = $c['per_or_cgpa'];
                $value_12 = $c['value'];
                $marks_12 = $c['marks'];
                $max_marks_12 = $c['max_marks'];
        }

        //ug data
        $query="SELECT * from `ug` where `user_id` like '$id'";
        $c = $db->process_query($query);

        if(mysqli_num_rows($c)>0) {
                $c = $db->fetch_rows($c);
                $degree_ug = $c['degree'];
                $specialization_ug = $c['specialization'];
                $start_date_ug = $c['start_date'];
                $completion_date_ug = $c['completion_date'];
                $per_or_cgpa_ug = $c['per_or_cgpa'];
                $value_ug = $c['value'];
                $marks_ug = $c['marks'];
                $max_marks_ug = $c['max_marks'];
                $university_ug = $c['university'];
                $is_others_ug= $c['is_others'];
        }

        //pg data
        $query="SELECT * from `pg` where `user_id` like '$id'";
        $c = $db->process_query($query);

        if(mysqli_num_rows($c)>0) {
                $c = $db->fetch_rows($c);
                $degree_pg = $c['degree'];
                $specialization_pg = $c['specialization'];
                $start_date_pg = $c['start_date'];
                $completion_date_pg = $c['completion_date'];
                $per_or_cgpa_pg = $c['per_or_cgpa'];
                $value_pg = $c['value'];
                $marks_pg = $c['marks'];
                $max_marks_pg = $c['max_marks'];
                $university_pg = $c['university'];
                $is_others_pg= $c['is_others'];
        }
        //dug data
$query="SELECT * from `dug` where `user_id` like '$id'";
$c = $db->process_query($query);
$degree_dug=$specialization_dug=$start_date_dug=$completion_date_dug=$per_or_cgpa_dug=$value_dug=$marks_dug=$max_marks_dug=$university_dug=$is_others_dug=null;
if(mysqli_num_rows($c)>0) {
        $c = $db->fetch_rows($c);
        $degree_dug = $c['degree'];
        $specialization_dug = $c['specialization'];
        $start_date_dug = $c['start_date'];
        $completion_date_dug = $c['completion_date'];
        $per_or_cgpa_dug = $c['per_or_cgpa'];
        $value_dug = $c['value'];
        $marks_dug = $c['marks'];
        $max_marks_dug = $c['max_marks'];
        $university_dug = $c['university'];
        $is_others_dug= $c['is_others'];
        $is_others_spec=$c['is_others_spec'];
}

//dpg data
$query="SELECT * from `dpg` where `user_id` like '$id'";
$c = $db->process_query($query);
$degree_dpg=$specialization_dpg=$start_date_dpg=$completion_date_dpg=$per_or_cgpa_dpg=$value_dpg=$marks_dpg=$max_marks_dpg=$university_dpg=$is_others_dpg=null;
if(mysqli_num_rows($c)>0) {
        $c = $db->fetch_rows($c);
        $degree_dpg = $c['degree'];
        $specialization_dpg = $c['specialization'];
        $start_date_dpg = $c['start_date'];
        $completion_date_dpg = $c['completion_date'];
        $per_or_cgpa_dpg = $c['per_or_cgpa'];
        $value_dpg = $c['value'];
        $marks_dpg = $c['marks'];
        $max_marks_dpg = $c['max_marks'];
        $university_dpg = $c['university'];
        $is_others_dpg= $c['is_others'];
}
//?>
        <div></div>
        <hr />
        <h4><strong>2. Educational Qualification:</strong></h4>
        <hr />

        <h4 align="center"><u><strong>HIGH SCHOOL</strong></u></h4>
        <table class="table acdqual table-bordered">
                <tr style="width:100%"><th style="width:20%">Board</th><th style="width: 43%">School</th><th style="width: 12%">Date of Passing</th>
                        <th style="width: 8%"><?php
                                if($per_or_cgpa_10) echo "Marks </th><th style='width: 8%'>Max Marks</th>";
                                else echo "Pointer</th><th style='width: 8%'>Scale</th>"
                                ?>
                        <th style="width: 8%">Percentage</th>
                </tr>
                <?php
                echo "<tr><td>$board_10</td><td>$school_10</td><td>$comp_10</td><td>$marks_10</td><td>$max_marks_10</td><td>$value_10</td></tr>";
                ?>
        </table>

        <?php if($max_marks_d!=''){ ?>

                <h4 align="center"><u><strong>DIPLOMA</strong></u></h4>
                <table class="table acdqual table-bordered">
                        <tr style="width:100%"><th style="width:22%">Field</th><th style="width: 41%">Institute</th><th style="width: 12%">Start Date</th><th style="width: 12%">End Date</th>
                                <th style="width: 8%"><?php
                                        if($per_or_cgpa_d) echo "Marks </th><th style='width: 8%'>Max Marks</th></tr>";
                                        else echo "Pointer</th><th style='width: 8%'>Scale</th>"
                                        ?>
                                <th style="width: 8%">Percentage</th>
                        </tr>
                        <?php
                        echo "<tr><td>$field_d</td><td>$university_d</td><td>$start_date_d</td><td>$end_date_d</td><td>$marks_d</td><td>$max_marks_d</td><td>$value_d</td></tr>";
                        ?>
                </table>


        <?php } ?>
        <?php if($max_marks_12!=''){ ?>


                <h4 align="center"><u><strong>INTERMEDIATE</strong></u></h4>
                <table class="table acdqual table-bordered">
                        <tr style="width:100%"><th style="width:20%">Board</th><th style="width: 43%">School</th><th style="width: 12%">Date of Passing</th>
                                <th style="width: 8%"><?php
                                        if($per_or_cgpa_12) echo "Marks </th><th style='width:8%'>Max Marks</th>";
                                        else echo "Pointer</th><th style='width: 8%'>Scale</th>"
                                        ?>
                                <th style="width: 8%">Percentage</th>
                        </tr>
                        <?php
                        echo "<tr><td>$board_12</td><td>$school_12</td><td>$comp_12</td><td>$marks_12</td><td>$max_marks_12</td><td>$value_12</td></tr>";
                        ?>
                </table>

        <?php } ?>

        <?php if($max_marks_ug!=''){ ?>

                <h4 align="center"><u><strong>GRADUATION</strong></u></h4>
                <table class="table acdqual table-bordered">
                        <tr style="width:100%"><th style="width:10%">Degree</th><th style="width:22%">Specialization</th><th style="width: 31%">Institute</th><th style="width: 12%">Start Date</th><th style="width: 12%">End Date</th>
                                <th style="width: 8%"><?php
                                        if($per_or_cgpa_ug) echo "Marks </th><th style='width: 8%'>Max Marks</th></tr>";
                                        else echo "Pointer</th><th style='width: 8%'>Scale</th>"
                                        ?>
                                <th style="width: 8%">Percentage</th>
                        </tr>
                        <?php
                        echo "<tr><td>$degree_ug</td><td>$specialization_ug</td><td>$university_ug</td><td>$start_date_ug</td><td>$completion_date_ug</td><td>$marks_ug</td><td>$max_marks_ug</td><td>$value_ug</td></tr>";
                        ?>
                </table>
       <?php } if($max_marks_dug!=''){ ?>

        <h4 align="center"><u><strong>DOUBLE GRADUATION</strong></u></h4>
        <table class="table acdqual table-bordered">
                <tr style="width:100%"><th style="width:10%">Degree</th><th style="width:22%">Specialization</th><th style="width: 31%">Institute</th><th style="width: 12%">Start Date</th><th style="width: 12%">End Date</th>
                        <th style="width: 8%"><?php
                                if($per_or_cgpa_dug) echo "Marks </th><th style='width: 8%'>Max Marks</th></tr>";
                                else echo "Pointer</th><th style='width: 8%'>Scale</th>"
                                ?>
                        <th style="width: 8%">Percentage</th>
                </tr>
                <tr><td>
                <?php
                echo "$degree_dug</td><td>$specialization_dug</td><td>$university_dug</td><td>$start_date_dug</td><td>$completion_date_dug</td><td>$marks_dug</td><td>$max_marks_dug</td><td>";
                if($per_or_cgpa_dug) echo $value_dug; else echo $marks_dug."/".$max_marks_dug;
                ?></td></tr>
        </table>
<?php } ?>

        <?php if($max_marks_pg!=''){ ?>

                <h4 align="center"><u><strong>POST GRADUATION</strong></u></h4>
                <table class="table acdqual table-bordered">
                        <tr style="width:100%"><th style="width:10%">Degree</th><th style="width:22%">Specialization</th><th style="width: 31%">Institute</th><th style="width: 12%">Start Date</th><th style="width: 12%">End Date</th>
                                <th style="width: 8%"><?php
                                        if($per_or_cgpa_pg) echo "Marks </th><th style='width: 8%'>Max Marks</th></tr>";
                                        else echo "Pointer</th><th style='width: 8%'>Scale</th>"
                                        ?>
                                <th style="width: 8%">Percentage</th>
                        </tr>
                        <?php
                        echo "<tr><td>$degree_pg</td><td>$specialization_pg</td><td>$university_pg</td><td>$start_date_pg</td><td>$completion_date_pg</td><td>$marks_pg</td><td>$max_marks_pg</td><td>$value_pg</td></tr>";
                        ?>
                </table>
        <?php } if($max_marks_dpg!=''){ ?>

        <h4 align="center"><u><strong>DOUBLE POST GRADUATION</strong></u></h4>
        <table class="table acdqual table-bordered">
                <tr style="width:100%"><th style="width:10%">Degree</th><th style="width:22%">Specialization</th><th style="width: 31%">Institute</th><th style="width: 12%">Start Date</th><th style="width: 12%">End Date</th>
                        <th style="width: 8%"><?php
                                if($per_or_cgpa_dpg) echo "Marks </th><th style='width: 8%'>Max Marks</th></tr>";
                                else echo "Pointer</th><th style='width: 8%'>Scale</th>"
                                ?>
                        <th style="width: 8%">Pointer/Percentage</th>
                </tr>
                <tr><td>
                        <?php
                        echo "$degree_dpg</td><td>$specialization_dpg</td><td>$university_dpg</td><td>$start_date_dpg</td><td>$completion_date_dpg</td><td>$marks_dpg</td><td>$max_marks_dpg</td><td>";
                        if($per_or_cgpa_dpg) echo $value_dpg; else echo $marks_dpg."/".$max_marks_dpg;
                        ?></td></tr>
        </table>
<?php } ?>





       
        <?php
        $query="SELECT * from `experience` where `user_id` like '$id' ORDER by id desc";
        $c = $db->process_query($query);
        ?>
        <hr />
        <h4><strong>3. Work Experience:</strong></h4>
        <hr>
        <ol>
                <?php
                while(($r = $db->fetch_rows($c)))
                {
                        $organisation=validate($r['organisation']);
                        $position=validate($r['position']);
                        $from=validate($r['from']);
                        $to=validate($r['to']);
                        $tot_days=validate($r['tot_exp']);
                        $pay=validate($r['pay']);
                        $type=validate($r['emp_type']);

                        //$tenure = $year." Year(s) ".$month." Month(s)";

                        ?>
                        <li>
                                <table class="table table-bordered table-striped">
                                        <tr><th>A) Organisation:</th><td><?php echo $organisation;?></td><th>B) Position Held:</th><td><?php echo $position;?></td></tr>
                                        <tr><th>C) From:</th><td><?php echo $from;?></td><th style="width:10%">D) To</th><td><?php echo $to;?></td></tr>
                                        <tr><th>E) Pay Scale with AGP:</th><td><?php echo $pay;?></td><th>F) Type of Employer:</th><td><?php echo $type;?></td></tr>
                                        <tr><th>G) Tenure:</th><td><?php ?></td></tr>
                                </table>
                        </li>
                <?php } ?>

        </ol>
        <!---->
        <!---->
        <!---->
<?php
$query="SELECT * from `employer` where `user_id` like '$id'";
$r = $db->process_query($query);
if(mysqli_num_rows($r)>0)
{
	$r = $db->fetch_rows($r);
	$nat_emp = validate($r['nat_emp']);
	$position=validate($r['position']);
	$from=validate($r['from']);
	$to=validate($r['to']);
	$pay=validate($r['pay']);
	$agp=validate($r['agp']);
	$basic_pay=validate($r['basic_pay']);
	$nature=validate($r['nature']);
	$organisation=validate($r['organisation']);
	$type=validate($r['emp_type']);
	$emol = validate($r['emoluments']);
}
?>

<hr />
<h4><strong>4. Present Employment Information:</strong></h4>
<hr>
<?php if(!$pres) echo "<span style=\"font-size:18px;\">NA</span>";

else {
?>
<table class="table table-bordered table-striped">
        <tr><th>A) Nature of Employment:</th><td><?php echo $nat_emp;?></td></tr>
        <tr><th>B) Organisation:</th><td><?php echo $organisation;?></td></tr>
        <tr><th>C) Position Held:</th><td><?php echo $position;?></td><th style="width:10%">D) Type of Employer:</th><td><?php echo $type;?></td></tr>
        <tr><th>E) From:</th><td><?php echo $from;?></td><th style="width:10%">F) To</th><td><?php echo $to;?></td></tr>
        <tr><th>G) Pay in Pay Band:</th><td><?php echo $pay;?></td><th>H) AGP/GP:</th><td><?php echo $agp;?></td></tr>
        <tr><th>I) Basic Pay:</th><td><?php echo $basic_pay;?></td><th>J) Total emoluments per month drawn at present:</th><td><?php echo $emol;?></td></tr>
        <tr><th>K) Nature of work:</th><td><?php echo $nature;?></td></tr>
</table>
<?php } ?>
        <!---->
        <!---->
        <!---->
        <!---->
        <?php
        $query="SELECT * from `reference` where `user_id` like '$id'";
        $c = $db->process_query($query);
        ?>
        <hr />
        <h4><strong>5. References:</strong></h4>
        <hr>
        <ol>
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
                        ?>
                        <li>
                                <table class="table table-bordered table-striped">
                                        <tr><th>A) Name:</th><td><?php echo $name;?></td><th>B) Desgination:</th><td><?php echo $designation;?></td></tr>
                                        <tr><th>C) Mobile:</th><td><?php echo $mobile;?></td><th>D) Email:</th><td><?php echo $email;?></td></tr>
                                        <tr><th>E) Address:</th><td><?php echo $address;?></td><th>F) City:</th><td><?php echo $city;?></td></tr>
                                        <tr><th>G) PIN:</th><td><?php echo $pincode;?></td></tr>

                                </table>
                        </li>
                <?php } ?>
        </ol>

        <?php
        $query="SELECT * from `other_info` where `user_id` like '$id'";
        $r = $db->process_query($query);
        if(mysqli_num_rows($r)>0)
        {
                $r = $db->fetch_rows($r);
                $info = validate($r['info']);
        }
        ?>
        <hr />
        <h4><strong>6. Any Other Information:</strong></h4>
        <hr>
        <table class="table table-bordered table-striped">
                <tr><th>Information:</th><td><?php//echo $info;?></td></tr>
        </table>

        <br />
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There are _________ number of enclosures with __________ pages attached alongwith this form.</p>
        <br>

        <h4><strong>DECLARATION</strong></h4>
        <table class="table">
                <tr>
                        <td height="41" colspan="4" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I hereby declare that the information furnished above is true to the best of my knowledge and belief. If at any time             it is found that I have concealed any information or have given any incorrect data, my candidature/ appointment, may be cancelled/terminated, without any notice or compensation.</td>
                </tr>
                <tr>
                        <td height="45" colspan="2" class="title02" style="vertical-align:baseline"><br><br>Date: <?= date("d-M-Y") ?></td>
                        <td height="45" class="title02">&nbsp;</td>
                        <td height="45" class="title02"><div align="right"><br />
                                        <br /><br>
                                        (Signature Of Candidate) </div></td>
                </tr>
        </table>
</div>
</body>

</html>