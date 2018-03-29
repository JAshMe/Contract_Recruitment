<?php
session_start();
require_once("./included_classes/class_user.php");
require_once("./included_classes/class_misc.php");
require_once("./included_classes/class_sql.php");
$misc= new miscfunctions();
 $db = new sqlfunctions();
$id=$_SESSION['user'];

	
	$doc1 = $id.".DOCX";
	$doc2 = $id."_2.DOCX";
	$pdf1 = $id.".pdf";
	$pdf2 = $id."_2.pdf";
	$img1 = $id.".jpeg";
	$img2 = $id."_2.jpeg";
	
    //shell_exec('chmod 777 /var/www/html/academics/acadserver/academic_new/recruitment/assistant/create_pdf.sh; sudo sh /var/www/html/academics/acadserver/academic_new/recruitment/assistant/create_pdf.sh 2017AS0100');
	//print_r($out);
	//die();
	//shell_exec('sudo sh /var/www/html/academics/acadserver/academic_new/recruitment/assistant/create_pdf.sh 2017AS0100');
/*	$c11 = "sudo soffice --headless --convert-to pdf CreditSheets/".$doc1." --outdir CreditSheets/";
	$c12 = "convert -density 300 -trim -quality 100 CreditSheets/".$pdf1." CreditSheets/".$img1;
	exec($c11);
	exec($c22);
  echo exec('whoami');*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Form</title>
<link rel="stylesheet" type="text/css" href="../include/bootstrap/css/bootstrap.min.css" >
<script src="../include/bootstrap/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Graduate|Roboto+Condensed|Yanone+Kaffeesatz" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="main.css" >
<style type="text/css">
.table-bordered{
	border:none;
}
.style1 {font-size: 16px}
</style>
<link href="styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">

.style5 {font-size: 18px; font-weight: bold; }
.style51 {font-size: 16px; font-weight: bold; }
.style6 {
font-size: 18px;
font-weight: bold;
}
.style7 {font-size: 12px}
.style8 {font-size: 24px}
.style10 {color: #000000}
.style37 {font-size: 18px; font-weight: bold; color: #000000; }
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
<?php
	$queryd="SELECT * from `department` where `user_id` like '$id'";
	$count = 0;
	$cd = $db->process_query($queryd);
	$totalcount = mysql_num_rows($cd);
	while(($rd = $db->fetch_rows($cd))){
		$dept = $rd['dept'];
		$count++;
?>


<div class="form" style="width:900px;page-break-before: always">
<table width="100%" border="0">
<tr>
<td width="12%" height="87"><div align="center"><img src="logo-MNNIT.png" width="110" height="105" /></div></td>
<td width="73%"><h3 align="center" class="style5">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY <br /> ALLAHABAD - 211004 (INDIA)<div class="style51"><br>APPLICATION FORM
</div> </h3></td>
<td width="8%" class="right"><table width="100%" height="25%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">

</tr>
</table></td>
</tr>
<tr>
<td colspan="3"><div align="center"><strong> </strong>
<strong>Advertisement No.</strong> <span class="style1">4/2017, Dated 21-9-2017</span><br />
<hr style="margin:0"/>
</div></td>
</tr>
</table>
<div class="row">



<?php
$query="SELECT * from `user` where `user_id` like '$id'";
$c = $db->process_query($query);
while(($r = $db->fetch_rows($c)))
{
  $name=$r['name'];
  $post=validate($r['post_applied']);
  $specialization=validate($r['specialization']);
  $dolp=validate($r['dolp']);
  $dob=validate($r['dob']);
  $nationality=validate($r['nationality']);
  $f_name=validate($r['f_name']);
  $m_name=validate($r['m_name']);
  $address=validate($r['address']);
  $category=validate($r['category']);
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
 }
 $query="SELECT * from `user`,`login` where `user`.`user_id` like '$id' and `user`.`user_id` = `login`.`user_id`";
$c = $db->process_query($query);
while(($r = $db->fetch_rows($c)))
{
	$email=validate($r['email']);
}


 $query="SELECT * from `emp` where emp_code = '$emp_code'";
$cc = $db->process_query($query);
while(($rr = $db->fetch_rows($cc)))
{
	$emp_name=validate($rr['emp_name']);
	$emp_code = $rr['emp_code'];
}
?>
<?php
$fee = new sqlfunctions();
$fee->database="fees";
$query="SELECT * from `bank_detail` where `regno` like '$id' and status like 'Success'";
$c = $fee->process_query($query);
if(mysql_num_rows($c)==0){
  $refno="NA";
  $tranid="NA";
  $amount="0 (MNNIT Staff/ PWD)";
}
while(($r = $db->fetch_rows($c)))
{
  $refno=$r['refno'];
  $tranid=$r['transaction_id'];
  $amount=$r['amount'];
}
?>
<div class="col-md-8 col-xs-8">
<table class="table table-bordered table-striped">
<?php
	if($emp == 'y'){
		$emp = $emp_code." - ".$emp_name;
		echo "<tr><th>MNNIT Staff:</th><td>$emp</td></tr>";
	}
?>
	
<tr><th>Application Id:</th><td><?php echo $_SESSION['user']."/ ".$count." (".$totalcount.")";?></td></tr>
<tr><th>Post Applied For:</th><td>Assistant Professor AGP-<?php echo $post;?></td></tr>
<tr><th>Department:</th><td><?php echo $rd['dept'];?></td></tr>
<tr><th>MNNIT Reference No.:</th><td><?php echo $refno;?></td></tr> 	
<tr><th>Bank Transaction Id:</th><td><?php echo $tranid;?></td></tr> 
<tr><th>Amount:</th><td><?php echo " Rs ".$amount;?></td></tr> 
</table>
</div>


<div class="col-md-4 col-xs-4">
<table class="table">
<div align="center"><div style="margin-top:0px;margin-bottom:0px"><?php echo "<img src=./photos/".$_SESSION['user'].".JPG style=\"margin-top:0px; border-width:thin;\" width=\"175\" height=\"180\" alt = \"Photo not in Records Please Upload Your Photo\" /> "; ?> </div>
</div></div>
<div align="center"><div style="margin-top:0px;margin-bottom:0px"><?php echo "<img src=./photos/".$_SESSION['user']."_2.JPG style=\"margin-top:0px; border-width:thin;\" width=\"175\" height=\"50\" alt = \"Photo not in Records Please Upload Your Photo\" /> "; ?> </div>
</div></div>
</table>
</div>
</div>



<hr />
<h4><strong>1. Personal Info:</strong></h4>

<table class="table table-bordered table-striped">
<tr><th>A) Name of the Candidate:</th><td><?php echo $name;?></td></tr>
<tr><th>B) Specialization:</th><td><?php echo $specialization;?></td></tr>
<tr><th>C) Email:</th><td><?php echo $email;?></td><th style="width:10%">D) Gender:</th><td><?php $sex=strtolower($gender); if($gender=="m")echo " Male"; else echo " Female"; ?></td></tr>
<tr><th>E) Marital Status:</th><td><?php echo $marital;?></td><th style="width:10%">F) Domicile:</th><td><?php echo $domicile;?></td></tr>

<tr><th>G) Catagory:</th><td><?php echo strtoupper($category);?></td><th style="width:20%">H) Physically Handicapped:</th><td><?php if($pwd=="y")echo "Yes (".$pwd_type.")";else echo "No";?></td></tr>
<tr><th>I) Date of Last Promotion:</th><td><?php echo $dolp;?></td></tr>
<tr><th>J) Date of Birth:</th><td><?php echo $dob;?></td></tr>
<tr><th>K) Nationality:</th><td><?php echo $nationality;?></td></tr>
<tr><th>L) Name of Father:</th><td><?php echo $f_name;?></td></tr>
<tr><th>M) Name of Mother:</th><td><?php echo $m_name;?></td></tr>
<tr><th>N) Identity Proof:</th><td><?php echo $id_type." - ".$id_no;?></td></tr>
<tr><th>O) Correspondence Address:</th><td><?php echo $corr_address;?></td></tr>
<tr><th>P) Permanent Address:</th><td><?php echo $address;?></td></tr>

<tr><th>Q) Mobile No:</th><td><?php echo $mobile;?></td></tr>


<tr><th>R) Port/Place of Applying Application Form:</th><td><?php echo $place_of_application;?></td></tr>


</table>



<?php
	$query="SELECT * from `phd_info` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)>0)
    {
		$r = $db->fetch_rows($r);
		$date = validate($r['date']);
		$title = validate($r['title']);
		$status = validate($r['status']);
		$university = validate($r['university']);
	}
?>
<hr />
<h4><strong>2. Educational Qualification(Ph. D.):</strong></h4>
<table class="table acdqual table-bordered">
<tr style="width:100%"><th style="width:10%">Status</th><th>Title</th><th>Institute/University</th><th>Date of Award</th></tr>
<tr><td><?php echo $status;?></td><td><?php echo $title;?></td><td><?php echo $university;?></td><td><?php echo $date;?></td></tr>
</table>




<?php
	$query="SELECT * from `education` where `user_id` like '$id'";
    $c = $db->process_query($query);
?>
<hr />
<h4><strong>3. Educational Qualification:</strong></h4>
<table class="table acdqual table-bordered">
<tr style="width:100%"><th style="width:10%">Qualification</th><th style="width:10%">Degree</th><th style="width:10%">Discipline</th><th>Institute</th><th>Board/Univ</th><th>Date of passing</th><th>Div.</th><th>% age/CGPA</th></tr>
<?php
    while(($r = $db->fetch_rows($c)))
    {
	  $tmp_id=$r['id'];
	  $degree = validate($r['degree']);
	  $subject = validate($r['subject']);
	  $inst_name = validate($r['inst_name']);
	  $entry_date = validate($r['entry_date']);
	  $complete_date = validate($r['complete_date']);
	  $marks = validate($r['marks']);
	  $max_marks = validate($r['max_marks']);
	  $perc_marks = validate($r['perc_marks']);
	  $division = validate($r['division']);
	  $qualification = validate($r['qualification']);
	  $board = validate($r['board']);
	  
	  if($division=='2'){
	  	$division = "<u><b>2</b></u>";
	  }

  echo "<tr><td>$qualification</td><td>$degree</td><td>$subject</td><td>$inst_name</td><td>$board</td><td>$complete_date</td><td>$division</td><td>$perc_marks</td></tr>";

}
?>
</table>



<?php
	$query="SELECT * from `other_academic` where `user_id` like '$id'";
    $c = $db->process_query($query);
	if(mysql_num_rows($c)>0){
?>
<hr />
<h4><strong>4. Other Academic Qualification:</strong></h4>
<table class="table acdqual table-bordered">
<tr><th>Degree</th><th>Discipline</th><th>Institute</th><th>Board/Univ</th><th>Marks/CGPA</th><th>Max Marks/CGPA</th><th>%age Marks/CGPA</th><th>Division</th><th>Year</th></tr>
<?php


    while(($r = $db->fetch_rows($c)))
    {
      $tmp_id=$r['id'];
      $exam = validate($r['exam']);
  $subject = validate($r['subject']);
  $inst_name = validate($r['inst_name']);
  $marks = validate($r['marks']);
  $max_marks = validate($r['max_marks']);
  $year = validate($r['year']);
  $division = validate($r['division']);
  $board = validate($r['board']);
  $per_marks = validate($r['per_marks']);
  if($division=='2'){
	  	$division = "<u><b>2</b></u>";
	  }
  echo "<tr><td>$exam</td><td>$subject</td><td>$inst_name</td><td>$board</td><td>$marks</td><td>$max_marks</td><td>$per_marks</td><td>$division</td><td>$year</td></tr>";
} }?>
</table>



<?php
$query="SELECT * from `employer` where `user_id` like '$id'";
$r = $db->process_query($query);
if(mysql_num_rows($r)>0)
{
  $r = $db->fetch_rows($r);
  $position=validate($r['position']);
 $from=validate($r['from']);
 $to=validate($r['to']);
 $pay=validate($r['pay']);
 $agp=validate($r['agp']);
 $basic_pay=validate($r['basic_pay']);
  $nature=validate($r['nature']);
 $organisation=validate($r['organisation']);
 $type=validate($r['emp_type']);
}
?>
<hr />
<h4><strong>5. Present Employer:</strong></h4>
<table class="table table-bordered table-striped">
<tr><th>A) Organisation:</th><td><?php echo $organisation;?></td></tr>
<tr><th>B) Position Held:</th><td><?php echo $position;?></td><th style="width:10%">C) Type of Employer:</th><td><?php echo $type;?></td></tr>
<tr><th>D) From:</th><td><?php echo $from;?></td><th style="width:10%">E) To</th><td><?php echo $to;?></td></tr>
<tr><th>F) Pay in Pay Band:</th><td><?php echo $pay;?></td><th>G) AGP/GP:</th><td><?php echo $agp;?></td></tr>
<tr><th>H) Basic Pay:</th><td><?php echo $basic_pay;?></td></tr>
<tr><th>I) Nature of work:</th><td><?php echo $nature;?></td></tr> 
</table>
 
 
 
 
 <?php
 	$query="SELECT * from `teaching` where `user_id` like '$id'";
    $c = $db->process_query($query);
 ?>
 <hr />
<h4><strong>6. Teaching Experience:</strong></h4>
<ol>
<?php
	while(($r = $db->fetch_rows($c)))
    {
	  $tmp_id=$r['id'];
	  $organisation=validate($r['organisation']);
	  $position=validate($r['position']);
	  $from=validate($r['from']);
	  $to=validate($r['to']);
	  $year=validate($r['year']);
	  $month=validate($r['month']);
	  $pay=validate($r['pay']);
	  $type=validate($r['emp_type']);
	  
	  $tenure = $year." Year(s) ".$month." Month(s)";
	  
?>
	<li>
    	<table class="table table-bordered table-striped">
        <tr><th>A) Organisation:</th><td><?php echo $organisation;?></td><th>B) Position Held:</th><td><?php echo $position;?></td></tr>
        <tr><th>C) From:</th><td><?php echo $from;?></td><th style="width:10%">D) To</th><td><?php echo $to;?></td></tr>
        <tr><th>E) Pay Scale with AGP:</th><td><?php echo $pay;?></td><th>F) Type of Employer:</th><td><?php echo $type;?></td></tr>
        <tr><th>G) Tenure:</th><td><?php echo $tenure;?></td></tr> 
        </table>
	</li>
    <?php } ?>
    
</ol>
</table>



<?php
	$query="SELECT * from `research` where `user_id` like '$id'";
    $c = $db->process_query($query);
?>
 <hr />
<h4><strong>7. Research Experience / Post Doctoral Research:</strong></h4>
<ol>
<?php 
while(($r = $db->fetch_rows($c)))
    {
  $tmp_id=$r['id'];
  $organisation=validate($r['organisation']);
  $position=validate($r['position']);
  $from=validate($r['from']);
  $to=validate($r['to']);
  $year=validate($r['year']);
  $month=validate($r['month']);
  $salary=validate($r['salary']);
  $nature=validate($r['nature']);
  
  $tenure = $year." Year(s) ".$month." Month(s)";
?>
	<li>
    	<table class="table table-bordered table-striped">
        <tr><th>A) Organisation:</th><td><?php echo $organisation;?></td><th>B) Position Held:</th><td><?php echo $position;?></td></tr>
        <tr><th>C) From:</th><td><?php echo $from;?></td><th style="width:10%">D) To</th><td><?php echo $to;?></td></tr>
        <tr><th>E) Salary/Fellowship/Stipend:</th><td><?php echo $salary;?></td></tr>
        <tr><th>F) Nature of work:</th><td><?php echo $nature;?></td><th>G) Tenure:</th><td><?php echo $tenure;?></td></tr> 
        </table>
	</li>
    <?php } ?>
</ol>
</table>



<?php
	$query="SELECT * from `industrial` where `user_id` like '$id'";
    $c = $db->process_query($query);
?>
 <hr />
<h4><strong>8. Industrial Experience:</strong></h4>
<ol>
<?php
while(($r = $db->fetch_rows($c)))
    {
  $tmp_id=$r['id'];
  $organisation=validate($r['organisation']);
  $position=validate($r['position']);
  $from=validate($r['from']);
  $to=validate($r['to']);
  $pay=validate($r['pay']);
  $nature=validate($r['nature']);
  $type=validate($r['emp_type']);
  ?>
	<li>
    	<table class="table table-bordered table-striped">
        <tr><th>A) Organisation:</th><td><?php echo $organisation;?></td><th>B) Position:</th><td><?php echo $position;?></td></tr>
        <tr><th>C) From:</th><td><?php echo $from;?></td><th style="width:10%">D) To</th><td><?php echo $to;?></td></tr>
        <tr><th>E) Pay Scale with AGP:</th><td><?php echo $pay;?></td><th>F) Type of Employer:</th><td><?php echo $type;?></td></tr>
        <tr><th>G) Nature of work:</th><td><?php echo $nature;?></td></tr> 
        </table>
	</li>
     <?php } ?>
</ol>
</table>



<?php
	$query="SELECT * from `reference` where `user_id` like '$id'";
    $c = $db->process_query($query);
?>
 <hr />
<h4><strong>9. Reference(s):</strong></h4>
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
        <tr><th>C) Address:</th><td><?php echo $address;?></td></tr>
        <tr><th>D) City:</th><td><?php echo $city;?></td><th>E) PIN:</th><td><?php echo $pincode;?></td></tr>
        <tr><th>F) Mobile:</th><td><?php echo $mobile;?></td><th>G) Email:</th><td><?php echo $email;?></td></tr> 
        </table>
	</li>
    <?php } ?>
</ol>
</table>



<?php
	$query="SELECT * from `other_info` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)>0)
    {
    	$r = $db->fetch_rows($r);
   	    $info = validate($r['info']);  
	}
?>
 <hr />
<h4><strong>10. Any Other Information:</strong></h4>
    <table class="table table-bordered table-striped">
    <tr><th>Information:</th><td><?php echo $info;?></td></tr>
    </table>
</table>



<?php
	$query="SELECT * from `points` where `user_id` like '$id'";
    $r = $db->process_query($query);
    if(mysql_num_rows($r)>0)
    {
    	$r = $db->fetch_rows($r);
   	    $points = validate($r['points']);  
	}
?>
<hr/>
<center><h2>Total Credit Points : <?php echo $points;?></h2></center>
<br />
<h4>To claim credit points in different categories, enclose relevant documents with self-attestation. </h4>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There are _________ number of enclosures with __________ pages attached alongwith this form.</p>

<h4><strong>DECLARATION</strong></h4>
<table class="table">
<tr>
<td height="41" colspan="4" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I hereby declare that the information furnished above is true to the best of my knowledge and belief. If at any time             it is found that I have concealed any information or have given any incorrect data, my candidature/ appointment, may be cancelled/terminated, without any notice or compensation.</td>
</tr>
<tr>
<td height="45" colspan="2" class="title02" style="vertical-align:baseline">Date _____________/____________/2017</td>
<td height="45" class="title02">&nbsp;</td>
<td height="45" class="title02"><div align="right"><br />
<br />
(Signature Of Candidate) </div></td>
</tr>
</table>
<?php } ?><!-- END OF DEPARTMENT LOOP-->


<script> window.print(); </script>
</div> 

