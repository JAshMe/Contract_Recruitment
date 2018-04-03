<?php
//@ob_start();
//error_reporting(E_ALL & ~E_NOTICE);
require_once "barcode.php";
function generatebarcode($data){
	$bdata=$data;
	$height="40";
	$scale="2";
	$bgcolor="#FFFFFF";
	$color="#000000";
	$file=md5($data);
	$type="png";
	$encode='CODE39';
	$qstr=NULL;
	//lets put all data into the array
	$attri = array('bdata' => $bdata, 'height' => $height, 'scale' => $scale, 'bgcolor' => $bgcolor, 'file' => $file, 'type' => $type,'encode'=>$encode,'color'=>$color);

    //generate barcode
	$st = genBq($attri);
	echo $st;
//    if(empty($attri['file'])){
//		foreach($attri as $key=>$value)
//		$qstr.=$key."=".urlencode($value)."&";
//

//		return '<img src="getbarcode/barcode.php?'.$qstr.' ">';
//	}else{
//		include("barcode.php");
//		return '<img src="getbarcode/'.$attri['file'].".".$attri['type'].' "> ';
//	}

}
