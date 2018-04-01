<?php
session_start();
require_once("./included_classes/class_user.php");
    require_once("./included_classes/class_misc.php");
    require_once("./included_classes/class_sql.php");
    require_once ("./include/verify_document.php");
    $misc= new miscfunctions();
    $db = new sqlfunctions();
 
    $id=$_SESSION['user'];
	
	
//	$query="SELECT * from freeze where user_id='$id'";
//	$r = $db->process_query($query);
//	if(mysql_num_rows($r)>0)
//	{
//		$misc->palert("You cannot modify you information after you have freezed your form","home.php?val=perinfo");
//	}
	

if(isset($_POST['per_ch']))
    {
	$name=validate($_POST['name']);
	$dob=validate($_POST['dob']);
	$gender=validate($_POST['gender']);
	$category=validate($_POST['category']);

	$pwd=validate($_POST['pwd']);

	//verifying his age
    $dob_date = date_create($dob);
    $relQuery = "select rel from age_relax where cat = '$category' and isPWD = '$pwd' ";
    $rel = $db->process_query($relQuery);
    $rel = $db->fetch_rows($rel);
    $rel = $rel['rel'];

    $rel_days = $rel*365 + $rel/4;
    $diff_days = 35*365+8 + $rel_days;

    $curr_date = date_create(date("Y-m-d"));
    $diff = date_diff($dob_date,$curr_date);
    $days = $diff->days;

    if($days>$diff_days)
        $misc->palert("Your age is greater than 35 years. So you aren't eligible for any post available right now. ","home.php?val=perinfo");


    $f_name=validate($_POST['f_name']);
	$m_name=validate($_POST['m_name']);
	$marital_status=validate($_POST['marital_status']);
	$domicile=validate($_POST['domicile']);
	$nationality=validate($_POST['nationality']);
	$corr_address=validate($_POST['corr_address']);
	$emp=validate($_POST['emp']);
	$place_of_application=validate($_POST['place_of_application']);
	$mobile=validate($_POST['mobile']);
	$address=validate($_POST['address']);
	$pwd_type=validate($_POST['pwd_type']);
	$id_type=validate($_POST['id_type']);
	$id_no=validate($_POST['id_no']);

	$emp_code=validate($_POST['emp_code']);

	if($emp=='y'&&$emp_code!="")
	{
		$query="SELECT * FROM `emp` WHERE emp_code='$emp_code'";
		$r = $db->process_query($query);
		if(mysqli_num_rows($r)==0)
			$misc->palert("Your Employee Code is not present","home.php?val=perinfo");

	}
	

	if(!is_numeric($mobile))	{
		$misc->palert("Enter 10 digit valid mobile number","home.php?val=perinfo");
	}
	if(strlen($mobile)!=10)
	{
		$misc->palert("Enter 10 digit mobile number","home.php?val=perinfo");
	}
	if($pwd=='y'&&$pwd_type=='NA')
	{
		$misc->palert("Enter valid Type of Disability","home.php?val=perinfo");
	}
	//print_r($_POST['dept']);
	$query="SELECT * from `user` where `user_id` like '$id'";
	$r = $db->process_query($query);

	if(mysqli_num_rows($r)>0)
	{
	   $query="UPDATE `user` SET `name`='$name',`dob`='$dob',`gender`='$gender',`category`='$category',`pwd`='$pwd',`f_name`='$f_name',`m_name`='$m_name',`marital_status`='$marital_status',`domicile`='$domicile',`nationality`='$nationality',`corr_address`='$corr_address',`place_of_application`='$place_of_application',`mobile`='$mobile',`address`='$address',`pwd_type`='$pwd_type',`id_type`='$id_type',`id_no`='$id_no',`emp_code`='$emp_code',`emp`='$emp' WHERE user_id = '$id' ";

	}
	else
	{
	  $query="INSERT INTO `user`(`user_id`, `name`, `dob`, `gender`, `category`, `pwd`, `f_name`, `m_name`, `marital_status`, `domicile`, `nationality`, `corr_address`, `place_of_application`, `mobile`, `address`,`pwd_type`,`id_type`, `id_no`,`emp_code`,`emp`) VALUES ('$id','$name','$dob','$gender','$category','$pwd','$f_name','$m_name','$marital_status','$domicile','$nationality','$corr_address','$place_of_application','$mobile','$address','$pwd_type','$id_type','$id_no','$emp_code','$emp')";
	}
	$r=$db->process_query($query);
	if($r)
		$misc->palert("Details Submitted","home.php?val=image");
	else
		$misc->palert("Some error occured","home.php?val=perinfo");
    }
if(isset($_POST['edu_ch_0']))
{
	// 10th data
	$per_cgp_10th = validate($_POST['per_or_cgp_10th']);
	$school_10th = validate($_POST['school_10th']);
	$completion_date_10th = validate($_POST['completion_date_10th']);
	$marks_10th = validate($_POST['marks_10th']);
	$max_marks_10th = validate($_POST['max_marks_10th']);
	$perc_marks_10th = validate($_POST['perc_marks_10th']);
	$board_10th = validate($_POST['board_10th']);

	//checking if data already exists
	$q = "select user_id from 10th_mark where user_id = '$id' ";
	$r = $db->process_query($q);
    verify_doc("doc_10th",'./doc_edu','education_qual',"");
	if(mysqli_num_rows($r)>0) //then update
		$q = "update 10th_mark set completion_date = '$completion_date_10th',board = '$board_10th',school = '$school_10th', marks = '$marks_10th', max_marks = '$max_marks_10th', per_or_cgpa = '$per_cgp_10th', `value` = '$perc_marks_10th' where user_id = '$id' ";
	else  //insert in table
		$q="INSERT INTO `10th_mark` VALUES ('$id','$completion_date_10th','$board_10th','$school_10th','$marks_10th','$max_marks_10th','$per_cgp_10th','$perc_marks_10th')";

	$r=$db->process_query($q);
	if($r)
		$misc->palert("Details Submitted","home.php?val=education_qual");
       else
                $misc->palert("Some error occured","home.php?val=education_qual");
    	
}
if(isset($_POST['edu_ch_1']))
{
	// diploma data
	$spec = validate($_POST['dip_field']);
	$per_cgp = validate($_POST['dip_per_or_cgp']);
	$university = validate($_POST['dip_university']);
	$start_date = validate($_POST['dip_start_date']);
	$completion_date= validate($_POST['dip_end_date']);
	$marks = validate($_POST['dip_marks']);
	$max_marks = validate($_POST['dip_max_marks']);
	$perc_marks = validate($_POST['dip_perc_marks']);
    $is_others=validate($_POST['dip_other_degree']);
    if(isset($is_others) && $spec =="Others"){

    }
    else
        $is_others="0";
	//checking if data already exists
	$q = "select user_id from diploma where user_id = '$id' ";
	$r = $db->process_query($q);
    verify_doc("doc_diploma",'./doc_edu','education_qual',"");
	if(mysqli_num_rows($r)>0)
		$q = "update diploma set field = '$spec', start_date = '$start_date' , end_date = '$completion_date', university = '$university', marks = '$marks', max_marks = '$max_marks', per_or_cgpa = '$per_cgp', `value` = '$perc_marks' , is_others = '$is_others' where user_id = '$id';";
	else
		$q="INSERT INTO `diploma` VALUES ('$id','$spec','$start_date','$completion_date','$university','$marks','$max_marks','$per_cgp','$perc_marks','$is_others')";

	$r=$db->process_query($q);
	if($r){
		$misc->palert("Details Submitted","home.php?val=education_qual");
	}
	else
	{
		$misc->palert("Some error occured","home.php?val=education_qual");
	}

}
if(isset($_POST['edu_ch_2']))
{
	// 12th data
	$per_cgp = validate($_POST['per_or_cgp_12th']);
	$school = validate($_POST['school_12th']);
	$completion_date = validate($_POST['completion_date_12th']);
	$marks = validate($_POST['marks_12th']);
	$max_marks= validate($_POST['max_marks_12th']);
	$perc_marks = validate($_POST['perc_marks_12th']);
	$board = validate($_POST['board_12th']);


	//checking if data already exists
	$q = "select user_id from 12th_mark where user_id = '$id' ";
	$r = $db->process_query($q);
    verify_doc("doc_12th",'./doc_edu','education_qual',"");
	if(mysqli_num_rows($r)>0) //then update
		$q = "update 12th_mark set completion_date = '$completion_date',board = '$board',school = '$school', marks = '$marks', max_marks = '$max_marks', per_or_cgpa = '$per_cgp', `value` = '$perc_marks' where user_id = '$id' ";
	else  //insert in table
		$q="INSERT INTO `12th_mark` VALUES ('$id','$completion_date','$board','$school','$marks','$max_marks','$per_cgp','$perc_marks')";
	$r=$db->process_query($q);
	if($r)
	{
		$misc->palert("Details Submitted","home.php?val=education_qual");
	}
	else
	{
		$misc->palert("Some error occured","home.php?val=education_qual");
	}

}
if(isset($_POST['edu_ch_3']))
{
	// ug data
	$degree = validate($_POST['ug_degree']);
	$spec = validate($_POST['ug_specialization']);
	$per_cgp = validate($_POST['ug_per_or_cgp']);
	$university = validate($_POST['ug_university']);
	$start_date = validate($_POST['ug_start_date']);
	$completion_date= validate($_POST['ug_end_date']);
	$marks = validate($_POST['ug_marks']);
	$max_marks = validate($_POST['ug_max_marks']);
	$perc_marks = validate($_POST['ug_perc_marks']);
    $is_others=validate($_POST['ug_other_degree']);
    if(isset($is_others) && $degree =="Others"){

    }
    else
        $is_others="0";
	//checking if data already exists
	$q = "select user_id from ug where user_id = '$id' ";
	$r = $db->process_query($q);
    verify_doc("doc_ug",'./doc_edu','education_qual',"");

	if(mysqli_num_rows($r)>0)
		$q = "update ug set specialization = '$spec', start_date = '$start_date' , completion_date = '$completion_date', university = '$university', marks = '$marks', max_marks = '$max_marks', per_or_cgpa = '$per_cgp', `value` = '$perc_marks', degree = '$degree' , is_others = '$is_others' where user_id = '$id';";
	else
		$q="INSERT INTO `ug` VALUES ('$id','$spec','$start_date','$completion_date','$university','$marks','$max_marks','$per_cgp','$perc_marks','$degree','$is_others')";
	$r=$db->process_query($q);
	if($r)
	{
		$misc->palert("Details Submitted","home.php?val=education_qual");
	}
	else
	{
		$misc->palert("Some error occured","home.php?val=education_qual");
	}

}
if(isset($_POST['edu_ch_4']))
{
	// pg data
	$degree = validate($_POST['pg_field']);
	$spec = validate($_POST['pg_specialization']);
	$per_cgp = validate($_POST['pg_per_or_cgp']);
	$university = validate($_POST['pg_university']);
	$start_date = validate($_POST['pg_start_date']);
	$completion_date= validate($_POST['pg_end_date']);
	$marks = validate($_POST['pg_marks']);
	$max_marks = validate($_POST['pg_max_marks']);
	$perc_marks = validate($_POST['pg_perc_marks']);
	$is_others=validate($_POST['pg_other_specialization']);

	//checking if data already exists
    if(isset($is_others) && $degree =="Others"){

    }
    else
        $is_others="0";
	$q = "select user_id from pg where user_id = '$id' ";
	$r = $db->process_query($q);
    verify_doc("doc_pg",'./doc_edu','education_qual',"");

	if(mysqli_num_rows($r)>0)  //update
		$q = "update pg set specialization = '$spec', start_date = '$start_date' , completion_date = '$completion_date', university = '$university', marks = '$marks', max_marks = '$max_marks', per_or_cgpa = '$per_cgp', `value` = '$perc_marks', degree = '$degree'is_others = '$is_others' where user_id = '$id';";
	else  //insert
		$q="INSERT INTO `pg` VALUES ('$id','$spec','$start_date','$completion_date','$university','$marks','$max_marks','$per_cgp','$perc_marks','$degree','$is_others')";
	$r=$db->process_query($q);
	if($r){
		$misc->palert("Details Submitted","home.php?val=education_qual");
	}
	else
	{
		$misc->palert("Some error occured","home.php?val=education_qual");
	}

}
if(isset($_POST['work_exp']))
{
    $organisation=validate($_POST['organisation']);
    $position=validate($_POST['position']);
    $from=validate($_POST['from']);
    $to=validate($_POST['to']);
    $pay=validate($_POST['pay']);
    $nature=validate($_POST['nature']);
    $emp_type=validate($_POST['emp_type']);
    $tot_exp= date_diff(date_create($from), date_create($to))->days;

    $q1="SELECT * FROM `experience` WHERE user_id = '$id' ORDER BY id limit 1 ";
    $r1=$db->process_query($q1);

    $rowid=0;


    if(($r2 = $db->fetch_rows($r1)))
    {
    	$rowid=validate($r2['id']);
    }

    $rowid=$rowid+1;

    $q="INSERT INTO `experience` VALUES ('$id','$rowid','$organisation','$position','$emp_type',
  		'$from','$to','$pay','$nature','$tot_exp')";

    // $imageName = stripslashes($_FILES['doc_exp']['name']);
    // echo $imageName;
    verify_doc("doc_exp",'./doc_exp','work_exp',"$rowid");

    $r=$db->process_query($q);
    if($r){
        $misc->palert("Details Submitted","home.php?val=work_exp");
    }
    else
    {
        $misc->palert("Some error occured","home.php?val=work_exp");
    }
}
if(isset($_POST['other_ch']))
{
	$exam = validate($_POST['exam']);
	$subject = validate($_POST['subject']);
	$inst_name = validate($_POST['inst_name']);
	$marks = validate($_POST['marks']);
	$max_marks = validate($_POST['max_marks']);
	$year = validate($_POST['year']);
	$division = validate($_POST['division']);
	$board = validate($_POST['board']);
	$per_marks = validate($_POST['per_marks']);
	if($exam=="")
	$exam="--";
	if($marks=="")
	$marks="--";
	if($max_marks=="")
	$max_marks="--";
	if($per_marks=="")
	$per_marks="--";



$q="INSERT INTO `other_academic`(`user_id`,`exam`, `subject`, `inst_name`, `board`, `marks`, `max_marks`, `year`, `division`,`per_marks`) VALUES ('$id','$exam','$subject','$inst_name','$board','$marks','$max_marks','$year','$division','$per_marks')";
$r=$db->process_query($q);
if($r){
                $misc->palert("Details Submitted","home.php?val=other_acads");
       }
       else
       {
                $misc->palert("Some error occured","home.php?val=other_acads");
       }
    	
}
if(isset($_POST['emp_ch']))
{
	 $nat_emp = validate($_POST['nat_emp']);
	 $position=validate($_POST['position']);
	 $from=validate($_POST['from']);
	 $to=validate($_POST['to']);
	 $pay=validate($_POST['pay']);
	 $agp=validate($_POST['agp']);
	 $basic_pay=validate($_POST['basic_pay']);
	 $nature=validate($_POST['nature']);
	 $organisation=validate($_POST['organisation']);
	 $emp_type=validate($_POST['emp_type']);
	$emol = validate($_POST['emol']);


	$id=$_SESSION['user'];
	$query="SELECT * from `employer` where `user_id` like '$id'";
	$r = $db->process_query($query);

	if(mysqli_num_rows($r)>0)
	{
		$q="UPDATE `employer` SET nat_emp = '$nat_emp', `position`='$position',`from`='$from',`to`='$to',`pay`='$pay',`agp`='$agp',`basic_pay`='$basic_pay',`nature`='$nature',`organisation`='$organisation',`emp_type`='$emp_type', emoluments = '$emol' WHERE user_id = '$id'";
	}
	else
	{
		 $q="INSERT INTO `employer`(`user_id`, `nat_emp`,`position`, `from`, `to`, `pay`, `agp`, `basic_pay`, `nature`, `organisation`, `emp_type`, `emoluments`) VALUES ('$id','$nat_emp','$position','$from','$to','$pay','$agp','$basic_pay','$nature','$organisation','$emp_type','$emol')";
	}
	$r=$db->process_query($q);
	if($r){
	                $misc->palert("Details Submitted","home.php?val=present_emp");
	       }
	       else
	       {
	                $misc->palert("Some error occured","home.php?val=present_emp");
	       }
}
if(isset($_POST['reference']))
{
	$name=validate($_POST['name']);
	$designation=validate($_POST['designation']);
	$address=validate($_POST['address']);
	$city=validate($_POST['city']);
	$pincode=validate($_POST['pincode']);
	$mobile=validate($_POST['mobile']);
	$email=validate($_POST['email']);
	
	if(!is_numeric($mobile)){
		$misc->palert("Enter 10 digit valid mobile number","home.php?val=reference");
	}

	if(strlen($mobile)!=10)
	{
		$misc->palert("Enter 10 digit mobile number","home.php?val=reference");
	}

	if(!is_numeric($pincode))
	{
		$misc->palert("Enter 6 digit Pin Code","home.php?val=reference");
	}

	if(strlen($pincode)!=6)
	{
		$misc->palert("Enter 6 digit Pin Code","home.php?val=reference");
	}
	$q="Select * from reference where user_id='$id'";
	$r=$db->process_query($q);
    if(mysqli_num_rows($r)==2){
		$misc->palert("Only 2 references can be submitted","home.php?val=reference");
	}

	$q="INSERT INTO `reference`( `user_id`, `name`, `designation`, `address`, `city`, `pincode`, `mobile`, `email`) VALUES ('$id','$name','$designation','$address','$city','$pincode','$mobile','$email')";

	$r=$db->process_query($q);
	if($r){
	    $misc->palert("Details Submitted","home.php?val=reference");
	}
	else
	{
	    $misc->palert("Some error occured","home.php?val=reference");
	}   	
}
if(isset($_POST['info_pg']))
{
 	$info=validate($_POST['info']);
	$id=$_SESSION['user'];
	$query="SELECT * from `other_info` where `user_id` like '$id'";
	$r = $db->process_query($query);
	if(strlen($info)>500)
	{
		$misc->palert("Only 500 characters allowed","home.php?val=info");
	}
	if(mysqli_num_rows($r)>0)
	{
		$q="UPDATE `other_info` SET `info`='$info' WHERE user_id = '$id'";
	}
	else
	{
		 $q="INSERT INTO `other_info`(`user_id`, `info`) VALUES ('$id','$info')";
	}
	$r=$db->process_query($q);
	if($r)
	{
	    $misc->palert("Details Submitted","home.php?val=other_info");
	}
	else
	{
	    $misc->palert("Some error occured","home.php?val=other_info");
	}
}

echo "nowhere!!!";
	
?>