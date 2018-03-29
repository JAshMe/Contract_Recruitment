<?php
class sql_functions
{
	private $connection,$host,$user,$password,$database;
	public $sql,$query;
	public function __construct()
	{ 
		$this->host="localhost";
		$this->user="root";
		$this->password="914passwd"; 
		$this->connection = mysql_connect($this->host,$this->user,$this->password) or die("Server Sleeping.");
		$this->database="reg_e_13"; 
		//echo "done";
	}
	
	public function process_query()
	{
		mysql_select_db($this->database,$this->connection) or die("Error Code:97"); 
		//echo $this->sql."<br>";
		$this->query  = mysql_query( $this->sql) or die(mysql_error().$this->sql);
		return $this->query;
	}	
	public function get_value($column,$table,$field,$value)
	{
  	 $this->sql = "SELECT $column  from $table WHERE $field = '$value'";
  	  $this->query = $this->process_query();
 	  $got_value = mysql_fetch_array($this->query);
	  $value=$got_value[$column];
	  return  $value;
   	}
}
?>
