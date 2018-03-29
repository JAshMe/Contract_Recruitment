<?php
class misc_functions
{
	
	
	public function redirect( $url ) 
	{
		echo '<script language="javascript">';	
		echo	"window.location.href= \"$url\"  ";
       	echo	'</script>';
		
	}
	public function palert($message,$tourl)
	{
      
	  echo "<script>
      alert( \"$message\" );
      </script>";
      $this-> redirect($tourl);
	}
	public function  isempty($value)
	{
		 if(strlen(trim($value))==0)
		 	return true;
		else 
			return false;
	}
 	public function myDate()
	{
		$day=date("d");
		$month=date("m");
		$yr=date("Y");
		$date=$day."-".$month."-".$yr;
		return $date;
	}
	public function myTime()
	{
		$hr=date("G");
		$min=date("i");
		$secs=date("s");
		$time=$hr.":".$min.":".$secs;
		return $time;
	}
	
 public  function top_links(){
	 $status=$_SESSION['status'];
	 
	 ?>
     
     
     <ul>
				<li><a href="admin.php">Home</a></li>
                <li><a href="#">Important Data</a>
                	<ul>
                    	<li><a href="data.php?id=1">Opening Date</a></li>
                        <li><a href="data.php?id=2">Closing Date</a></li>
                        <li><a href="data.php?id=3">Last Date</a></li>
                       	<li><a href="data.php?id=4">Set Fee</a></li>
                        <li><a href="data.php?id=5">Max Books</a></li>
                     </ul>
                  </li>
				<li><a href="#">Books</a>
                	<ul>
               			 <li><a href="books.php">Feed Books</a></li>
               			 <li><a href="print.php">Print List</a></li>
                         </ul>
                         </li>
                <li><a href="#">Fees</a>
              		<ul>
                    	<li><a href="fees.php">Collect Fees</a></li>
                        <li><a href="cancel.php">Cancel Fees</a></li>
           		  </ul> 
                </li>
				<?php if($status=="admin") { ?><li><a href="#">Users</a>
                	<ul>
                    	<li><a href="adduser.php">Add User</a></li>
                        <li><a href="edituser.php">Edit User</a></li>
                        <li><a href="deleteuser.php">Delete User </a></li>
                    </ul>
                </li>
                
                
				<li><a href="#">Allotment</a>
                <ul>
                    	<li><a href="allot.php">Allot books</a></li>
                        <li><a href="genforms.php">Generate Forms</a></li>
                        <li><a href="genlist.php">Print Forms</a></li>
                  </ul>
				</li>
               
                <li><a href="#">Collection Report</a>
                <ul>
                    	<li><a href="report.php?type=1">Today's Report</a></li>
                        <li><a href="report.php?type=2">Total Report</a></li>
              </ul>
				</li>
				<?php } ?>
                <li><a href="logout.php">Logout</a></li>
				</ul>
                <?php
 }
	
	
}
?>