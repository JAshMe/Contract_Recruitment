<?php
	require_once("class_user.php");
	require_once("class_misc.php");
	require_once("class_sql.php");
	$misc= new miscfunctions();
	$db = new sqlfunctions();


	$id=$_SESSION['user'];

	function check_posts()
    {
        global $id, $db;
      //  $post_array = array(1, 1, 1, 1, 1, 1, 1);
        $q="select * from `eligible` where `user_id` like '$id'";
        $h=$db->process_query($q);
        if(mysqli_num_rows($h)>0){
            $r=$db->fetch_rows($h);
            $pos1=$r['pos1'];
            $pos2=$r['pos2'];
            $pos3=$r['pos3'];
            $pos4=$r['pos4'];
            $pos5=$r['pos5'];
            $pos6=$r['pos6'];
            $pos7=$r['pos7'];
            $post_array=array($pos1,$pos2,$pos3,$pos4,$pos5,$pos6,$pos7);
        }

        /** Educational Checks **/

        $field_d = $start_date_d = $end_date_d = $per_or_cgpa_d = $value_d = $marks_d = $max_marks_d = $university_d = $is_others_d = '';
        $degree_pg = $specialization_pg = $start_date_pg = $completion_date_pg = $per_or_cgpa_pg = $value_pg = $marks_pg = $max_marks_pg = $university_pg = $is_others_pg = '';
        $degree_ug = $specialization_ug = $start_date_ug = $completion_date_ug = $per_or_cgpa_ug = $value_ug = $marks_ug = $max_marks_ug = $university_ug = $is_others_ug = '';


        //dip data
        $query = "SELECT * from `diploma` where `user_id` like '$id'";
        $c = $db->process_query($query);
        if (mysqli_num_rows($c) > 0) {
            $c = $db->fetch_rows($c);
            $field_d = $c['field'];
            $start_date_d = $c['start_date'];
            $end_date_d = $c['end_date'];
            $per_or_cgpa_d = $c['per_or_cgpa'];
            $value_d = $c['value'];
            $marks_d = $c['marks'];
            $max_marks_d = $c['max_marks'];
            $university_d = $c['university'];
            $is_others_d = $c['is_others'];
        }

//ug data
        $query = "SELECT * from `ug` where `user_id` like '$id'";
        $c = $db->process_query($query);

        if (mysqli_num_rows($c) > 0) {
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
            $is_others_ug = $c['is_others'];
        }

//pg data
        $query = "SELECT * from `pg` where `user_id` like '$id'";
        $c = $db->process_query($query);

        if (mysqli_num_rows($c) > 0) {
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
            $is_others_pg = $c['is_others'];
        }


        post_1_edu:

        if ($max_marks_ug == '' or ($specialization_ug != 'EE' and $specialization_ug != "CE")) {
            if ($max_marks_d == '') {
                $post_array[0] = 0;
                goto post_2_edu;
            } else {
                $diff_date_d_1 = date_diff(date_create($start_date_d), date_create($end_date_d))->days;
                $year_3 = 365 * 3;
                if ($value_d < 70 or $year_3 < $diff_date_d_1 or ($field_d != 'CE' and $field_d != 'EE')) {
                    $post_array[0] = 0;
                    goto post_2_edu;
                }
            }
        }


        post_2_edu:
        if ($max_marks_ug == '') {
            $post_array[1] = 0;
            goto post_3_edu;
        }
        if ($degree_ug == 'BHM' or $degree_ug == 'BHMS2' or $degree_pg == 'MHM') {
            $post_array[1] = 2;
            goto post_3_edu;
        }


        post_3_edu:

        if ($max_marks_ug == '') {
            $post_array[2] = 0;
            goto post_4_edu;
        }

        post_4_edu:
        if ($max_marks_pg == '' or ($degree_pg != 'MSC' and $degree_pg != "MS" and $degree_pg != 'M.Tech') or $value_pg < 55) {
            if ($max_marks_ug == '' or ($degree_ug != 'B.Sc' and $degree_ug != 'B.Tech') or $value_ug < 70) {
                echo $max_marks_ug;
                if ($max_marks_d == '') {
                    $post_array[3] = 0;
                    goto post_5_edu;
                } else {
                    $diff_date_d_1 = date_diff(date_create($start_date_d), date_create($end_date_d))->days;
                    $year_3 = 365 * 3;
                    if ($value_d < 70 or $year_3 < $diff_date_d_1 or ($field_d == 'Others')) {
                        $post_array[3] = 0;
                        goto post_5_edu;
                    }

                }
            }
        }
        post_5_edu:

        if ($max_marks_pg == '' or ($degree_pg != 'MSC' and $degree_pg != "MS" and $degree_pg != 'M.Tech') or $value_pg < 55) {
            if ($max_marks_ug == '' or ($degree_ug != 'B.Sc' and $degree_ug != 'B.Tech') or $value_ug < 70) {
                if ($max_marks_d == '') {
                    $post_array[4] = 0;
                    goto post_6_edu;
                } else {
                    $diff_date_d_1 = date_diff(date_create($start_date_d), date_create($end_date_d))->days;
                    $year_3 = 365 * 3;
                    if ($value_d < 70 or $year_3 < $diff_date_d_1 or ($field_d == 'Others')) {
                        $post_array[4] = 0;
                        goto post_6_edu;
                    }

                }
            }
        }

        post_6_edu:

        if ($max_marks_pg == '' or ($degree_pg != "MCA" and $degree_pg != "MSC") or $value_pg < 70) {
            if ($max_marks_ug == '' or ($degree_ug != "B.Tech" and $degree_ug != "BE") or $value_ug < 70) {
                $post_array[5] = 0;
                goto post_7_edu;
            }
        }

        post_7_edu:
        if ($max_marks_ug == '' or ($degree_ug != "B.Tech" and $degree_ug != "BE")) {

            if ($max_marks_d == '') {
                $post_array[6] = 0;
                goto end;
            } else {
                $diff_date_d_1 = date_diff(date_create($start_date_d), date_create($end_date_d))->days;
                $year_3 = 365 * 3;
                if ($value_d < 70 or $year_3 < $diff_date_d_1 or ($field_d == 'Others' or $field_d == 'DS')) {
                    $post_array[4] = 0;
                    goto end;
                }
            }
        }
        end:
        $q="update `eligible` set `pos1` = '$post_array[0]',`pos2` = '$post_array[1]',`pos3` = '$post_array[2]',`pos4` = '$post_array[3]',`pos5` = '$post_array[4]',`pos6` = '$post_array[5]',`pos7` = '$post_array[6]' where `user_id` like '$id'";
        $db->process_query($q);

        }

		/*** Experience Checks ***/
function check_exp()
{
    global $id, $db;
    //  $post_array = array(1, 1, 1, 1, 1, 1, 1);
    $q="select * from `eligible` where `user_id` like '$id'";
    $h=$db->process_query($q);
    if(mysqli_num_rows($h)>0){
        $r=$db->fetch_rows($h);
        $pos1=$r['pos1'];
        $pos2=$r['pos2'];
        $pos3=$r['pos3'];
        $pos4=$r['pos4'];
        $pos5=$r['pos5'];
        $pos6=$r['pos6'];
        $pos7=$r['pos7'];
    }
    $post_array=array($pos1,$pos2,$pos3,$pos4,$pos5,$pos6,$pos7);
		exp_check:
		goto end;

		//getting info of experience
		$info_query = "select * from experience where user_id='$id'";
		$r = $db->process_query($info_query);
		$exp = array(array()); //$exp[0]['organisation'] will give organisation for 1st experience
		$num_exp = 0;
		if(mysqli_num_rows($r)>0)
		{
		    while($res = $db->fetch_rows($r))
		    {
		        $exp[$num_exp]['user_id'] = $res['user_id'];
		        $exp[$num_exp]['id'] = $res['id'];
		        $exp[$num_exp]['organisation'] = $res['organisation'];
		        $exp[$num_exp]['position'] = $res['position'];
		        $exp[$num_exp]['emp_type'] = $res['emp_type'];
		        $exp[$num_exp]['from'] = $res['from'];
		        $exp[$num_exp]['to'] = $res['to'];
		        $exp[$num_exp]['pay'] = $res['pay'];
		        $exp[$num_exp]['nature'] = $res['nature'];
		        $exp[$num_exp]['tot_exp'] = $res['tot_exp'];
		        $num_exp++;

		    }
		}

		//now checking for each post
		post_1_exp:
		if($post_array[0]==0)
		    goto post_2_exp;

		for($i=0;$i<$num_exp;$i++)
		{
		    if($exp[$i]['tot_exp']>365) //experience less than 1 year
		        goto post_2_exp;
		}
		$post_array[0]=0;


		post_2_exp:

		if(!$post_array[1])
		    goto post_3_exp;

		for($i=0;$i<$num_exp;$i++)
		{
		    if($exp[$i]['tot_exp']>365*3) //experience greater than 3 years
		        goto post_3_exp;
		}
		$post_array[1]=0;


		post_3_exp:

		if(!$post_array[2])
		    goto post_4_exp;

		for($i=0;$i<$num_exp;$i++)
		{

		    if($exp[$i]['tot_exp']>365*3) //experience greater than 3 years
		    {
		        //check if the experience is after acquiring diploma or ug degree
		        $end_date = $completion_date_ug or $end_date_d;
		        $diff = date_diff(date_create($end_date), date_create($exp[$i]['from']));
		        if ($diff->format("%R") == '+') //end date is less than start of experience
		            goto post_4_exp;
		    }
		}
		$post_array[2]=0;


		post_4_exp:
		if(!$post_array[3])
		    goto post_5_exp;

		for($i=0;$i<$num_exp;$i++)
		{

		    if($exp[$i]['tot_exp']>365) //experience greater than 1 year
		    {
		        //check if the experience is after acquiring diploma or ug degree
		        $end_date = $completion_date_ug or $end_date_d;
		        $diff = date_diff(date_create($end_date), date_create($exp[$i]['from']));
		        if ($diff->format("%R") == '+') //end date is less than start of experience
		            goto post_5_exp;
		    }
		}
		$post_array[3]=0;


		post_5_exp:
		if(!$post_array[4])
		    goto post_6_exp;

		for($i=0;$i<$num_exp;$i++)
		{

		    if($exp[$i]['tot_exp']>365) //experience greater than 1 year
		    {
		        //check if the experience is after acquiring diploma or ug degree
		        $end_date = $completion_date_ug or $end_date_d;
		        $diff = date_diff(date_create($end_date), date_create($exp[$i]['from']));
		        if ($diff->format("%R") == '+') //end date is less than start of experience
		            goto post_6_exp;
		    }
		}
		$post_array[4]=0;

		post_6_exp:

		if(!$post_array[5] || $num_exp)  //there should be some experience
		    goto post_7_exp;

		$post_array[5]=0;

		post_7_exp:

		if(!$post_array[6])
		    goto end;

		for($i=0;$i<$num_exp;$i++)
		{

		    if($exp[$i]['tot_exp']>365) //experience greater than 1 year
		    {
		        //check if the experience is after acquiring diploma or ug degree
		        $end_date = $completion_date_ug or $end_date_d;
		        $diff = date_diff(date_create($end_date), date_create($exp[$i]['from']));
		        if ($diff->format("%R") == '+') //end date is less than start of experience
		            goto end;
		    }
		}
		$post_array[6]=0;


		end:
    $q="update `eligible` set `pos1` = '$post_array[0]',`pos2` = '$post_array[1]',`pos3` = '$post_array[2]',`pos4` = '$post_array[3]',`pos5` = '$post_array[4]',`pos6` = '$post_array[5]',`pos7` = '$post_array[6]' where `user_id` like '$id'";
    $db->process_query($q);

	}
?>