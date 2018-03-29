<?php
function pkcs5_pad ($text, $blocksize)
{
    $pad = $blocksize - (strlen($text) % $blocksize);
    return $text . str_repeat(chr($pad), $pad);
}
function encryptAES($encdatamd5){
	//$cc = 'my secret text';
	$iv =  '1234567890123456';
//	$iv='12345678901276766';
	$length = strlen($encdatamd5);
 $key=(file_get_contents('MNNIT.key', true));

    $size = mcrypt_get_block_size('rijndael_128', 'cbc');
	$cc = pkcs5_pad($encdatamd5, $size);
	$length = strlen($encdatamd5);
	$cipher = mcrypt_module_open('rijndael_128','','cbc','');
	mcrypt_generic_init($cipher, $key, $iv);
	$encryptedData = base64_encode(mcrypt_generic($cipher,$cc));
	return $encryptedData;
}
function decryptAES($encrypted){
	$iv =  '1234567890123456';
	$key=(file_get_contents('MNNIT.key', true));
	$cipher = mcrypt_module_open('rijndael_128','','cbc','');
	mcrypt_generic_init($cipher, $key, $iv);
	$decrypted = mdecrypt_generic($cipher,base64_decode($encrypted));
	$DecryptArr = explode('|',$decrypted);
	return $DecryptArr;
	}
function decryptData($encrypted){
	$decryptedArr=decryptAES($encrypted);
	foreach( $decryptedArr as $a){
		$temp=explode("=",$a);
		$dataArr[trim($temp[0])]=trim($temp[1]);
	}
	return $dataArr;

}
function decryptAESN($encrypted){
	$iv =  '1234567890123456';
	$key=(file_get_contents('MNNIT.key', true));
	$cipher = mcrypt_module_open('rijndael_128','','cbc','');
	mcrypt_generic_init($cipher, $key, $iv);
	$decrypted = mdecrypt_generic($cipher,base64_decode($encrypted));
	$DecryptArr = $decrypted;
	return $DecryptArr;
	}
function encryptAESm($encdatamd5,$key){
	//$cc = 'my secret text';
	$iv =  '1234567890123456';
//	$iv='12345678901276766';
	$length = strlen($encdatamd5);
	//$key=(file_get_contents('MNNIT.key', true));
	$key="f221751f2ebd05459487d7e3e792e1bb";
	$size = mcrypt_get_block_size('rijndael_128', 'cbc');
	$cc = pkcs5_pad($encdatamd5, $size);
	$length = strlen($encdatamd5);
	$cipher = mcrypt_module_open('rijndael_128','','cbc','');
	mcrypt_generic_init($cipher, $key, $iv);
	$encryptedData = base64_encode(mcrypt_generic($cipher,$cc));
	return $encryptedData;
}
function decryptAESm($encrypted){
	$iv =  '1234567890123456';
	$key= 'f221751f2ebd05459487d7e3e792e1bb';//(file_get_contents('MNNIT.key', true));
	$cipher = mcrypt_module_open('rijndael_128','','cbc','');
	mcrypt_generic_init($cipher, $key, $iv);
	$decrypted = mdecrypt_generic($cipher,base64_decode($encrypted));
	$DecryptArr = $decrypted;//explode('|',$decrypted);
	return $DecryptArr;
	}

?>