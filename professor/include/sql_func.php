<?php
$allow_ip=array("172.31.9.27","172.31.9.3","172.31.9.25","172.31.9.7","172.31.9.5","172.31.84.243");
/*if(!in_array($_SERVER['REMOTE_ADDR'],$allow_ip))
	die("Portal under maintenance...");*/
//ini_set('display_errors', 1); 
//error_reporting(E_ALL);
class sqlfunctions extends MySQLi
{
	
	public static $db;
    private  $host,$con,$user,$pass,$connection,$arra,$curr_reg_db,$curr_sem_type;
    public  $sql,$qry,$database; 
	public function __construct()
	{
	   $this->host="localhost";
       $this->user="root";
       $this->pass="914passwd";
	   $this->database="tab";
	   $this->connection= parent::__construct($this->host,$this->user,$this->pass,$this->database);
	   if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
	   }
	   $this->curr_reg_db = $this->get_value("cur_reg","current_reg","1","1");
	   $this->curr_sem_type = $this->get_value("cur_sem","current_reg","1","1");
	}
	public function connect_db($db)
    {
		$this->database=$db;
       $this->select_db($this->database) or die("<span style='color:red'>Error connecting Database :(</span>");
    }
	public function get_value($column,$table,$var,$value)
	{
		$this->sql = "SELECT $column from $table WHERE $var = \"$value\"";
		$this->qry=$this->query($this->sql) or die("<span style='color:red'>Error 2</span>");
		
		$this->qry=$this->qry->fetch_array();
		return $this->qry[0];
	}
	
	public function get_curr_reg()
	{
		return $this->curr_reg_db;
	}
	public function get_rows($qry)
	{
		$this->sql=$qry;
		$this->qry=$this->query($qry) or die("<span style='color:red'>Error 3</span>");
		$res=array();
		$i=0;
		while($t=$this->qry->fetch_array()) $res[$i++]=$t;
		return $res;
	}
	public function sanitize($arr)
	{
		foreach($arr as &$i)
		{
			$i=$this->real_escape_string(htmlentities(trim($i)));
		}
		return $arr;
	}
	public function gen_err($qr)
	{	
		echo $qry="insert into error_log (code,msg,query,ip) values($this->errno,\"".$this->real_escape_string($this->error)."\",\"".$this->real_escape_string($qr)."\",'$this->get_ip()')";
		echo $this->query($qry);
		echo $code=$this->get_value('max(id)','error_log',1,1);
		echo "alert('Server error...Please contact Webteam (Dean Academic).\nError-Log Code (note it down): $code');";
		return false;
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
}
?>