<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/31/2018
 * Time: 11:13 PM
 */

require_once ("class_sql.php");
require_once ("class_misc.php");
require_once ("class_user.php");


$misc = new miscfunctions();
$db = new sqlfunctions();



function verify_fill($id)
{
        //check if personal details
        global $db,$misc;
        $q = "select user_id from `user`  where user_id ='$id'";
        $r=$db->process_query($q);
        if(mysqli_num_rows($r)==0)
                return "Personal Details";


        //check if 10th info is filled
        $q = "select  user_id from `10th_mark` where user_id= '$id'";
        $r=$db->process_query($q);
        if(mysqli_num_rows($r)==0) return "10th Details";


        $q1= "select  user_id from `12th_mark` where user_id= '$id'";
        $q2= "select  user_id from `diploma` where user_id= '$id'";
        $r1=$db->process_query($q1);
        $r2=$db->process_query($q2);
        if(mysqli_num_rows($r2)==0&&mysqli_num_rows($r1)==0) return "12th/Diploma Details";


        $q1= "select  user_id from `ug` where user_id= '$id'";
        $q2= "select  user_id from `pg` where user_id= '$id'";
        $r1=$db->process_query($q1);
        $r2=$db->process_query($q2);
        if(mysqli_num_rows($r2)>0)
        {
            if(mysqli_num_rows($r1)==0) return "UG Details";
        }


        $q = "select  user_id  from `employer` where user_id= '$id'";
        $r=$db->process_query($q);
        if(mysqli_num_rows($r)==0)
                return "Present Employment";

        $q = "select  user_id  from `reference` where user_id= '$id'";
        $r=$db->process_query($q);
        if(mysqli_num_rows($r)<2)
        {
                $num = mysqli_num_rows($r);
                $ans = 2-$num." Reference";
                if($num==1)
                        return $ans;
                else
                        return $ans."s";
        }
//            $q = "select  user_id,completion_date from `10th_mark` where user_id= '$id'";
//            $q1= "select  user_id,completion_date from `12th_mark` where user_id= '$id'";
//            $r1=$db->process_query($q);
//            $r2=$db->process_query($q1);
//            if(mysqli_num_rows($r2)==0)
//            {
//                $q1= "select  user_id,start_date from `diploma` where user_id= '$id'";
//                $r2=$db->process_query($q1);
//                $r2=$db->fetch_rows($r2);
//                $r1=$db->fetch_rows($r1);
//                $comp_d=$r2['start_date'];
//                $comp_10=$r1['completion_date'];
//                $diff = date_diff(date_create($comp_10), date_create($comp_d))->days;
//                if ($diff->format("%R") == '+')
//                    return "10th grade completion date greater than diploma start timing";
//            }
//            else
//            {
//                $r2=$db->fetch_rows($r2);
//                $r1=$db->fetch_rows($r1);
//                $comp_12=$r2['completion_date'];
//                $comp_10=$r1['completion_date'];
//                $diff = date_diff(date_create($comp_10), date_create($comp_12))->days;
//                if ($diff->format("%R") == '+')
//                    return "12th grade completion date less than 10th grade completion date";
//
//
//            }
//        return "ok";
}