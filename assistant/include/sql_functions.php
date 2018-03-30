<?php

function sql_connect_m()
{
		$host="localhost";
		$user="root";
		$password="914passwd";
		
		$connection = @mysql_connect($host,$user,$password,TRUE) or die("Server Sleeping.");
		return 	$connection;
}
function sql_connect_u()
{
		$host="localhost";
		$user="root";
		$password="914passwd";
		
		$connection = @mysql_connect($host,$user,$password,TRUE) or die("Server Sleeping.");
		return 	$connection;
}
function get_val($connection, $db, $column , $table, $var,$value, $query = 0)
{
   $get_map_query = "SELECT $column  from $table WHERE $var = '$value'";
   
   //if($query == 1)
   //echo $get_map_query."<br>";
   
   $get_map_res = query_process($connection,$get_map_query, $db ,1);
   $got_value = fetch_field($get_map_res);
   return $got_value[0];
   
}


function connection_close($connection)
{
	return mysql_close($connection);
}	


function num_rows($result)
{
	return mysql_num_rows($result);
}
	
	

function query_process( $connection , $query_string , $dbase , $query_type)
{
		switch ( $query_type )
		{
			case 1 :  //*********** SELECT QUERY ******************** //
					
					mysql_select_db($dbase,$connection) or die(mysql_error());
//echo $query_string;	
					$result = mysql_query( $query_string , $connection);

//if(!$result)
	//echo "?dfbjdfdhbfj";

					return $result;
					break;
					
			case 2:  //*********** DELETE QUERY ******************** //
					mysql_select_db($dbase,$connection) or die(mysql_error());
					$result = mysql_query( $query_string , $connection);
					return $result;
					break;
			case 3:  //*********** INSERT QUERY ******************** //
					mysql_select_db($dbase,$connection) or die(mysql_error());
					$result = mysql_query( $query_string , $connection);
					return $result;
					break;
			case 4:  //*********** UPDATE QUERY ******************** //
					mysql_select_db($dbase,$connection) or die(mysql_error());
					$result = mysql_query( $query_string , $connection);
					return $result;
					break;
		
		}	
}


function process_query ( $connection, $dbase, $query_string)
{	//echo $dbase; echo $connection;
	//echo $query_string;
	mysql_select_db($dbase,$connection) or die("Error Code:97");
	$result = mysql_query( $query_string , $connection) or die(mysql_error());
	return $result;
}		

function fetch_rows ( $result )
{
	return mysql_fetch_array($result);
}


function get_value ( $connection, $dbase, $column , $table, $variable, $value )
{
   $get_map_query = "SELECT $column from $table WHERE $variable = '$value'";
  	
	$get_map_res = process_query($connection, $dbase, $get_map_query);
   
    $got_value = fetch_rows($get_map_res);
   return $got_value[0];
}
function get_values ( $connection, $dbase, $column , $table, $variable, $value, $variable1, $value1 )
{
   $get_map_query = "SELECT $column from $table WHERE $variable = '$value' and $variable1 = '$value1'";
  	
	$get_map_res = process_query($connection, $dbase, $get_map_query);
   
    $got_value = fetch_rows($get_map_res);
   return $got_value[0];
}

function close_con($connection)
{
	return mysql_close($connection);
}	


function fetch_field ( $result)
{
	return mysql_fetch_array($result);
}

function log_error($connection,$url,$query,$res,$error=0)
{
	$error_db="error_log";
	if($error==1)
	{
		$errno=-1;
		$error="Prepare() Failed!";
	}
	else if ($error==2)
	{
		$errno=-2;
		$error="Binding() Failed!";
	}
	else if($error==3)
	{
		$errno=$res->errno;
		$error=$res->error;
	}
	$error=mysql_escape_string($error);
	$query=mysql_escape_string($query);
	echo $query;
	$error_query="INSERT INTO error_log (`sno`,`timestamp`,`url`,`query`,`sql_errorno`,`error`) VALUES (NULL,CURRENT_TIMESTAMP(),'$url','$query','$errno','$error')";
	$res=process_query($connection,$error_db,$error_query);
	return;
}
function get_dues($roll)
{
	
	$url=$_SERVER["PHP_SELF"];
	include_once('include/sql_func.php');
	include_once('include/misc_functions.php');
	$connection=new sqlfunctions();
	$err_connection=sql_connect_m();
	$connection->connect_db("mba_fresh");
	$session=2017;	//HARD CODED.... DO SOMETHING ABOUT IT...
	$sem=0;	//HARD CODED.... DO SOMETHING ABOUT IT...
	$prog='mb';	//HARD CODED.... DO SOMETHING ABOUT IT...
	$query="SELECT `cat` FROM `per_info` WHERE `roll`=?";
	
	if(!($res=$connection->prepare($query)))
	{
		log_error($err_connection,$url,$query,$res,1);
		$connection->close();
		redirect("error_page.html");
	}
	if(!($res->bind_param("s",$roll)))
	{
		log_error($err_connection,$url,$query,$res,2);
		$connection->close();
		redirect("error_page.html");
	}
	if($res->execute())
	{
		$res->store_result();
		if($res->num_rows!=1)
		{
			palert("You must first fill your personal information before proceeding to fee payment.","index.php?val=perinfo");
			$file1="photos/".$_SESSION['roll'].".JPG";
			$file2="signature/".$_SESSION['roll'].".JPG";
			if(!file_exists($file1) || !file_exists($file2))
			{
				palert("You still photos uploads remaining.","index.php?val=upload_photo");
			}
		}
		else
		{
			$res->bind_result($cat);
			$res->fetch();
			$cat=strtoupper($cat);
			if($cat=="SC" || $cat=="ST" )
				$val=2;
			else
				$val=1;
				
			$query="SELECT `fee` FROM `formfeenew` WHERE `val`=?";
			if(!($res2=$connection->prepare($query)))
			{
				log_error($err_connection,$url,$query,$res2,1);
				$connection->close();
				redirect("error_page.html");
			}
			if(!($res2->bind_param("s",$val)))
			{
				log_error($err_connection,$url,$query,$res2,2);
				$connection->close();
				redirect("error_page.html");
			}
			if($res2->execute())
			{
				$res2->store_result();
				if($res2->num_rows!=1)
				{
					palert("Something went wrong!","logout.php");
				}
				else
				{
					$res2->bind_result($amt);
					$res2->fetch();
					
				}
			}
			$query="SELECT sum(amount) FROM `fees`.`bank_detail` WHERE purpose like 'application' and sem='$sem' and `status` like 'success'  and session='$session' and regno=? GROUP BY regno";
			if(!($res3=$connection->prepare($query)))
			{
				log_error($err_connection,$url,$query,$res3,1);
				$connection->close();
				redirect("error_page.html");
			}
			if(!($res3->bind_param("s",$roll)))
			{
				log_error($err_connection,$url,$query,$res3,2);
				$connection->close();
				redirect("error_page.html");
			}
			if($res3->execute())
			{
				
				
				$res3->store_result();
				if($res3->num_rows==0)
				{
					$paid=0;
					$ret=array("amount"=>$amt,"paid"=>$paid,"due"=>($amt-$paid));
					return $ret;
				}
				else
				{
					
					$res3->bind_result($paid);
					$res3->fetch();
					$ret=array("amount"=>$amt,"paid"=>$paid,"due"=>($amt-$paid));
					return $ret;
				}
			}
		}
	}
	else
	{	
		log_error($err_connection,$url,$query,$res,3);
		$connection->close();
		redirect("error_page.html");	
	}
}
?>
