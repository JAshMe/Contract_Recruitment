<?php
class sqlfunctions {
	public static $db;
    private  $host,$con,$user,$pass,$arra,$curr_reg_db,$curr_sem_type;
    public  $sql,$query,$database;
	public $connection;
    public  function  __construct()
    {
      		$this->connect_db("recruitment_contract");
	  
    }
   public function connect_db($db)
    {
		    $this->host="localhost";
		    $this->user="root";
		    $pass="";
	           $con= mysqli_connect($this->host,$this->user,$pass,$db) or die(mysqli_error($con));
	           $this->connection = $con;
	           $this->database=$db;
    }
   public function get_value($column, $table , $var,$value)
    {  
		$value=mysqli_real_escape_string($this->connection,$value);
       $this->sql = "SELECT $column from $table WHERE $var = \"$value\"";
	     //echo $this->sql;
    	/*if($_SESSION['regno']=='20148035')
		 echo $this->sql;*/
		//echo $this->database;
        $this->query=$this->process_query($this->sql);
		$this->arra=mysqli_fetch_array($this->query);
		//echo $this->arra[0];
        return $this->arra[0];
    }
	public function num_rows($result)
	{
		return mysqli_num_rows($result);
	}
	public function get_ip(){
		if(!isset($_SERVER))
			return $ip;
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	public function sv_query($qr){
		$ip=get_ip();
		$this->connect_db($this->database);
		$qr=$this->real_escape_string($qr);
		$this->query("INSERT INTO sql_queries (query,date,ip) VALUES ('$qr',NOW(),'$ip')");
	}

	public function process_query1($query1)
    {
		//if($this->user=="20114093")
			//echo $query1;
	$this->connect_db($this->database);
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		mysqli_query($this->connection,"INSERT INTO post.sql_queries (query,date,ip) VALUES ('$query1',NOW(),'$ip')") or die(mysqli_error($this->connection));
		//echo $this->database;
		//sv_query($query1);
		$this->query=mysqli_query($this->connection,$query1) or die("There is some Technical fault! Please try after sometime and if the problem persists, then contact Web Team");
		//echo $query1;
	return $this->query;
    }
    public function process_query($query1)
    {    // echo "server error";
		//if($this->user=="20114093")
			//echo $query1;
		//echo $this->database;
		//sv_query($query1);
		//if(substr($query1,0,6)!='select')
		$this->query=mysqli_query($this->connection,$query1)or die(mysqli_error($this->connection));// or die("There is some Technical fault! Please try after sometime and if the problem persists, then contact Web Team");
		//echo $query1;
	return $this->query;
    }
	public function printTable($result)
	{
		$c=1;
		$noc=mysqli_num_fields($result);
	echo "<tr>";
	echo "<th>S.No.</th>";
	for($i=0;$i<$noc;$i++){
		$xx=mysqli_fetch_field($result);
		echo "<th>".$xx->name."</th>";
	}
	echo "</tr>";
	while($f=mysqli_fetch_array($result))
	{
		echo '<tr>';
		echo "<td>$c</td>";
		$c++;
		for($i=0;$i<$noc;$i++){
			echo '<td>'.$f[$i].'</td>';
		}
		echo '</tr>';
	}
	}
	public function fetch_field()
	{
		return $this->arra[0];
	}
	public function fetch_array()
	{
		return $this->arra;
	}

    public function fetch_rows ($query2)
    {
		return mysqli_fetch_assoc($query2);
    }

    public  function close_con()
    {
	return mysql_close($this->connection);
    }
	public function errno(){
		return mysql_errno($this->connection);
	}
	public function error(){
		return mysqli_error($this->connection);
	}
}
?>