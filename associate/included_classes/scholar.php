<?php
function fee_semscholar($regno,$type="")
{
require_once ('class_sql.php');
require_once ('class_user.php');
require_once ('class_misc.php'); 
$user=new userfunctions();
$com=new sqlfunctions();
$tab=new sqlfunctions();
$reg=new sqlfunctions();
$fee_sql=new sqlfunctions();
$misc=new miscfunctions();

$curr_reg_db=$reg->get_curr_reg();

$phd = $_SESSION['type'];
if($type!="")
   $phd=$type;
$tab->database="tab";
$reg->database=$curr_reg_db;
if ($phd == "y")
  $com->database="phd";
else{
  $com->database=$curr_reg_db;
  $fee_sql->database="semesterfees";
}

$query1 = "select * from stu_per_rec where regno like \"$regno\" ";
$query2 = "select * from stu_acad_rec where regno like \"$regno\" ";
$query1_mysql= $com->process_query($query1);
$query2_mysql= $com->process_query($query2);
$num1 = mysql_num_rows ($query1_mysql);
$num2 = mysql_num_rows ($query2_mysql);
$results = mysql_fetch_array ($query1_mysql);
$cat = $results['category'];
 $CAT=substr(strtoupper($cat),0,2);/*---------------------------addded by umang---------------------------------*/
$sex = strtoupper ($results['sex']);

$results1 = mysql_fetch_array ($query2_mysql);
if($phd!="y")
{
  $course1 = $results1['prog'];
  $bra = $results1['bra'];
  $sem = $results1['sem_adm_to']+1;//get next sem
	//echo "sem=$sem";

  $course_name = $tab->get_value ( "value" , "map", "code", $course1 );
  $bra_name = $tab->get_value ("value" , "map", "code", $bra );
  $year=intval(substr($regno,0,4));
    if(( ($course1=='bt'&&$sem<=8)||(($course1=='mt'||$course1=='ms'||$course1=='mw')&&$sem<=4)||($course1=='mc'&&$sem<=6) )&&$year<2014)
  $fee_q = "select * from fees where prog like \"$course1\" and bra like \"$bra\" and sem like \"$sem\" and stud_type like 'old'";
  else if($course1=='mt'&&$sem>4)
  $fee_q = "select * from fees where prog like \"$course1\" and bra like \"$bra\" and sem like \"$sem\" and stud_type like'zz'";
  else
 $fee_q = "select * from fees where prog like \"$course1\" and bra like \"$bra\" and sem like \"$sem\" and stud_type like'zz'";
/*----------------can be used for querying fee-----------------
if(strtolower($regno)=="20114093"||strtolower($regno)=="20124078")
	echo $fee_q;*/
  $fee_p = $fee_sql->process_query($fee_q); 
  $fee_f = mysql_fetch_array ($fee_p);
$instfee = $fee_f['inst_fee'];

  $cond=(($CAT=='SC'||$CAT=='ST')&&($course1=='mt'||$course1=='mc'||$course1=='mb'||$course1=='ms'||$course1=='mw')?1:0);
  if($cond)
  {
	  
	  if($course1=='mt'&&($sem<=4)&&$year>=2014)//1 to 4
	  $instfee=$instfee-35000;
	  if($course1=='mt'&&($sem<=4)&&$year<2014)
	    $instfee=$instfee-17500;
	/*  if($course1=='mt'&&($sem<=6))//5 to 6 (pt)
	 $instfee=$instfee-4000;
	  */if($course1=='mc'&&($sem<=6)&&$year>=2014)
		$instfee=$instfee-35000;
		if($course1=='mc'&&($sem<=6)&&$year<2014)
		$instfee=$instfee-6000;
	  if($course1=='mb'&&($sem<=4)&&$year>=2014)
	  $instfee=$instfee-12000;
	  if($course1=='mb'&&($sem<=4)&&$year<2014)
	  $instfee=$instfee-12000;
	  if(($course1=='ms'||$course1=='mw')&&($sem<=4)&&$year>=2014)
	  $instfee=$instfee-7500;	
	   if(($course1=='ms'||$course1=='mw')&&($sem<=4)&&$year<2014)
	  $instfee=$instfee-5375;
  }
  
 $accod = $reg->get_value( "accomodation" , "$curr_reg_db.reg_type_accod", "regno", $regno );
  if ($accod == "daysch"&&!($course1=='mt'&&$sem>4))
   {
	   $instfee = $instfee -($sem%2?1375:1575) ; 
   }
	
	if ($instfee < 0)
	{
		$instfee = 0;
	}
}
//********************************************phd calculation start*************************************************//
//*******************************************************************************************************************//   
else
  {
    $dept = $results1['prog'];
    $sem = $results1['sem_adm_to']+1;//get next sem
	//echo "sem=$sem";
    $prog_type=$results1['prog_type'];
    $type=$com->get_value("type","stud_type","regno",$regno);
    $bra_name = $tab->get_value( "value" , "map", "code", $dept);
    $course_name="Doctor of Philosophy";
  
        if($sem==1)
		$fee_q = "select * from phd_fees where type=\"$type\" and sem like \"1\" ";
		else if($sem%2==0)		   
        	$fee_q = "select * from phd_fees where type=\"$type\" and sem like \"even\" ";
        else
         {   
            $fee_q="select * from phd_fees where type=\"$type\" and sem like \"odd\" ";
         }
        $fee_p = $com->process_query($fee_q);
        $fee_f = mysql_fetch_array ($fee_p);
        $instfee = $fee_f['inst_fees'];
		
		if($CAT=='SC'||$CAT=='ST')
			$instfee-=7500;
        
	  
    $acc_type=$reg->get_value("accomodation","$curr_reg_db.reg_type_accod","regno",$regno);
    if (($acc_type == "daysch"))//&&($type=="ft"))
      {
        $instfee = $instfee - ($sem%2?1375:1575);
      } 
	
	/*$bra = strtolower($bra);
	if ($bra == "conpt" || $bra == "pept" || $bra == "sofpt" ||$bra=="propt" || $bra=="envpt" || $bra=="digpt"|| $bra=="strpt") 
	{
		$instfee = $instfee + ($sem%2?1375:1575);
	}
    */
    if($prog_type=='Teacher Candidate'||$prog_type=='Teacher Candidate (PT)')
        $instfee=0;
  }
//********************************************phd calculation finish*************************************************//
//*******************************************************************************************************************//    
if($phd!="y"){
	$due_q = "select * from dues where regno like \"$regno\" ";
	$due_p = $fee_sql->process_query ($due_q);
	$due_f = mysql_fetch_array ($due_p);
	$instdue = $due_f['inst_due'];
	if ($instdue == "") 
	{
		$instdue = 0;
	}
	if($instfee<=0)
	{
	  $instfee=0;
	}
}

//********************************************DASA CALCULATION START*************************************************//
//*******************************************************************************************************************//   
$is_swift = "select * from stu_per_rec where (category like \"%dasa%\" or category like \"%mea%\" or category like \"%iccr%\") and regno=\"$regno\"";
 //   echo $is_swift;
 $swift = $reg->process_query ($is_swift);
 $res=mysql_fetch_array($swift);
  if(strtolower($res['category'])=='mea'){
	  
  }
 else if(strtolower($res['category'])=='iccr'){
	$instfee=0; 
  }
  else if(strtolower($res['category'])=='dasa')
  {
     $fee_q = "select * from fees where prog like \"%bt%\" and bra like \"%dasa%\" and sem like \"$sem\" ";
	//echo $fee_q;
     $fee_p = $fee_sql->process_query($fee_q); 
     $fee_f = mysql_fetch_array ($fee_p);
     $instfee = $fee_f['inst_fee'];
  }
   
//**************************************************SPECIAL FEES PICK FROM HERE***************************************************//
  
  $spl_sql="select * from semesterfees.spclinstifeeeven  where regno=\"$regno\"";

  $spl_q=$fee_sql->process_query($spl_sql);
	if(mysql_num_rows($spl_q)!=0)
	{
  		$spl_f=mysql_fetch_array($spl_q);
  		$instfee=$spl_f['instfee']; 
	}
    
	$_SESSION["inst_fee"]=$inst_fee;
	 
return $instfee+$instdue;	
}
?>
                                
