<?php
if(!isset($_SESSION))
	session_start();
require_once ("class_sql.php");
require_once ("class_misc.php");
class userfunctions
{
	public static $sql,$misc;
	public $regNo;
	private $username,$password, $login,$database,$type;
	public function __construct($regno=false)
	{
		$this->database="login";
		$this->regNo=$regno;
	}
	public  function logging($username,$password)
	{
                
                $misc=new miscfunctions();
                //$mac=$misc->getMacAddress();
               // $ip=$_SERVER['REMOTE_ADDR'];
                if(!ctype_alnum($username)){
             
                  // mysql_query("insert into injection(`ip`,`mac`) values(\"$ip\",\"$mac\")"); 
                   //$misc->palert("Before you even begin With that SQL Injection thing The back door has been closed Right on your nose. Name's not down so you're NOT coming in.",'./index.php');
                   $misc->palert("Inconsistency in data.",'./index.php');
				   exit(0);
                }
                $sql=new sqlfunctions();
		$sql->connect_db("login");
		$dummy=mysqli_real_escape_string($sql->connection,$sql->get_value("pass","login","regno",$username));
		// $sql->get_value("pass","login","regno=",$username);
		 //$this->login->sql="select * from login where regno=\"$username\" and pass=\"$password\" and regno not in (select regno from reg_e_11.track)";
     	 //.$this->login->process_query($this->login->sql);
		 if($sql->num_rows()==1 && !strcmp(md5($password),$dummy))
			return 1;
                else
			return 0;
	}
	public function is_blocked($regno)
	{
		
			$sql=new sqlfunctions();
			$sql->database=$sql->get_curr_reg();
			$dummy=$sql->get_value("*","track","regno",$regno);
			if($sql->num_rows())
			return 1;
			else 
			return 0;
	}
	
	public function is_logged()
	{
			$sql=new sqlfunctions();
			$sql->database="login";
		if(isset($_SESSION['regno']) && $sql->get_value("regno","login","regno",$_SESSION['regno'])!="") 
			return true;
		else
			return false;
	}
	public function checkUser($regno)
	{
		//echo 'hi';
		$sql2=new sqlfunctions();
		//echo 'hi2';
		$sql2->connect_db("phd");
		$dummy=$sql2->get_value("regno", "stu_per_rec","regno",$regno);
		
		//if($regno=='2013RHU01') echo 'hi';
		
		if($sql2->num_rows()){
			$this->type="y";
			$name=$sql2->get_value("name","stu_per_rec","regno",$regno);
		}
		else if($sql2->num_rows()==0 && $regno!="admin"){
			$this->type="n";
			$sql2->connect_db($sql2->get_curr_reg());
			$name=$sql2->get_value("name","student","regno",$regno);
		}
		else{
			$this->type="admin";
			$sql2->connect_db($sql2->get_curr_reg());
			$name=$sql2->get_value("name","student","regno",$regno);
		}
		$_SESSION['name']=$name;
		
		$_SESSION['regno']=$regno;
		$_SESSION['type']=$this->type;
		
	}
	public function logout()
	{
		session_destroy();
		$misc=new miscfunctions();
		$misc->redirect("home.php");
	}
	
	public function setPhotoPath()
   {
   		$sql=new sqlfunctions();
		$sql->connect_db("icard");
		$photo_id=$sql->get_value("photoid","registeration","regisno",$this->regNo);
		$photo_id= trim ($photo_id);
		
		if($photo_id)
		{
				//exec("chmod 400 ./photos/".$photo_id.".JPG"); 
				$photoPath="./photos/".$photo_id.".JPG";
		}
		return $photoPath;
	}
	public function unsetPhotoId()
   {
   		$sql=new sqlfunctions();
		$sql->connect_db("icard");
		$photo_id=$sql->get_value("photoid","registeration","regisno",$this->regNo);
		$photo_id= trim ($photo_id);
		if($photo_id)
		{
				//exec("chmod 000 ./photos/".$photo_id.".JPG"); 
		}
	}
	
}
?>
