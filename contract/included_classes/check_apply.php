<?php
	require_once("class_user.php");
	require_once("class_misc.php");
	require_once("class_sql.php");
	$misc= new miscfunctions();
	$db = new sqlfunctions();

	$id=$_SESSION['user'];

	function check_apply(){
		global $id, $db,$post_array,$apply_array;
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
        $q="select * from `final_apply` where user_id like '$id'";
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
            $apply_array=array($pos1,$pos2,$pos3,$pos4,$pos5,$pos6,$pos7);
        }
  //       var_dump($post_array);
		// var_dump($apply_array);
		for ($x = 0; $x <= 6; $x++) {
    		if($post_array[$x]==0)
    		{
    			if($apply_array[$x]==1)
    			{
    				$z=$x+1;
    				$y="Withdrawing Your Application from Post ".$z." due to insufficient qualifications.";
    				echo "<script>
				      alert( \"$y\" );
				      </script>";
				    $q="update `final_apply` set pos".$z."=0 where user_id like '$id'";
				    //echo($q);
				    $q = $db->process_query($q);
				    $filename=$id."_".$z.".pdf";
				    unlink("./applications/".$filename);
				    unlink("./final_app/".$filename);
    			}
    		}
		} 
	}
//	check_apply();