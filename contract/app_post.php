<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/31/2018
 * Time: 11:19 PM
 */


require_once("./included_classes/class_user.php");
require_once("./included_classes/class_misc.php");
require_once("./included_classes/class_sql.php");
$misc= new miscfunctions();
$db = new sqlfunctions();

$id=$_SESSION['user'];

$post_array=array(1,1,1,1,1,1,1);

/** Educational Checks **/

$field_d=$start_date_d=$end_date_d=$per_or_cgpa_d=$value_d=$marks_d=$max_marks_d=$university_d=$is_others_d='';
$degree_pg=$specialization_pg=$start_date_pg=$completion_date_pg=$per_or_cgpa_pg=$value_pg=$marks_pg=$max_marks_pg=$university_pg=$is_others_pg='';
$degree_ug=$specialization_ug=$start_date_ug=$completion_date_ug=$per_or_cgpa_ug=$value_ug=$marks_ug=$max_marks_ug=$university_ug=$is_others_ug='';


//dip data
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



post_1_edu:

if($max_marks_ug == '' or ($specialization_ug!='EE' and $specialization_ug!="CE"))
{
    if($max_marks_d=='')
    {
        $post_array[0] = 0;
        goto post_2_edu;
    }
    else
    {
        $diff_date_d_1=date_diff(date_create($start_date_d),date_create($end_date_d))->days;
        $year_3=365*3;
        if($value_d<70 or $year_3<$diff_date_d_1 or ($field_d!='CE' and $field_d!='EE')) {
            $post_array[0] = 0;
            goto post_2_edu;
        }
    }
}





post_2_edu:
if($max_marks_ug=='')
{
    $post_array[1] = 0;
    goto post_3_edu;
}
if($degree_ug=='BHM' or $degree_ug=='BHMS2' or $degree_pg == 'MHM')
{
    $post_array[1]=2;
    goto post_3_edu;
}


post_3_edu:

if($max_marks_ug='')
{
    $post_array[2]=0;
    goto post_4_edu;
}


post_4_edu:
if($max_marks_pg=='' or ($degree_pg!='MSC' and $degree_pg!="MS" and $degree_pg!='M.Tech') or $value_pg<55) {
    if ($max_marks_ug == '' or ($degree_ug != 'B.Sc' and $degree_ug !='B.Tech') or $value_ug<70) {
        if ($max_marks_d == '') {
            $post_array[3] = 0;
            goto post_5_edu;
        } else {
            $diff_date_d_1 = date_diff(date_create($start_date_d), date_create($end_date_d))->days;
            $year_3 = 365 * 3;
            if ($value_d < 70 or $year_3 < $diff_date_d_1 or ($field_d != 'DS' and $field_d != 'DE' and $field_d != 'DT')) {
                $post_array[3] = 0;
                goto post_5_edu;
            }

        }
    }
}
post_5_edu:

if($max_marks_pg=='' or ($degree_pg!='MSC' and $degree_pg!="MS" and $degree_pg!='M.Tech') or $value_pg<55) {
    if ($max_marks_ug == '' or ($degree_ug != 'B.Sc' and $degree_ug !='B.Tech') or $value_ug<70) {
        if ($max_marks_d == '') {
            $post_array[4] = 0;
            goto post_6_edu;
        } else {
            $diff_date_d_1 = date_diff(date_create($start_date_d), date_create($end_date_d))->days;
            $year_3 = 365 * 3;
            if ($value_d < 70 or $year_3 < $diff_date_d_1 or ($field_d != 'DS' and $field_d != 'DE' and $field_d != 'DT')) {
                $post_array[4] = 0;
                goto post_6_edu;
            }

        }
    }
}

post_6_edu:

if($max_marks_pg=='' or ($degree_pg=="MCA" and $degree_pg == "MSC") or $value_pg<70)
{
    if($max_marks_ug=='' or ($degree_pg=="B.Tech" and $degree_pg=="BE") or $value_ug <70){
        $post_array[5]=0;
        goto post_7_edu;
    }
}

post_7_edu:
if($max_marks_ug=='' or ($degree_pg=="B.Tech" and $degree_pg=="BE")) {

    if ($max_marks_d == '') {
        $post_array[4] = 0;
        goto post_1_exp;
    } else {
        $diff_date_d_1 = date_diff(date_create($start_date_d), date_create($end_date_d))->days;
        $year_3 = 365 * 3;
        if ($value_d < 70 or $year_3 < $diff_date_d_1 or ($field_d != 'DE' and $field_d != 'DT')) {
            $post_array[4] = 0;
            goto post_1_exp;
        }
    }
}

post_1_exp: