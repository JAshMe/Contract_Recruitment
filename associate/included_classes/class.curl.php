<?php
class curl {
var $headers;
var $user_agent;
var $compression;
var $cookie_file;
var $proxy;
function start($cookies=TRUE,$cookie='',$compression='gzip',$proxy='') {
//$this->headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
$this->headers[] = 'Connection: Keep-Alive';
//$this->headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
//$this->headers[] = 'Accept-Language: en-us,en;q=0.5';
//$this->headers[] = 'Accept-Encoding	gzip,deflate';
//$this->headers[] = 'Keep-Alive: 300';
//$this->headers[] = 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7';
$this->user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.11) Gecko/20101012 Firefox/3.6.11';
$this->compression=$compression;
$this->proxy=$proxy;
$this->cookies=$cookies;
if ($this->cookies == TRUE) $this->cookie('cookie'.time().".txt");
}
function end()
{
	if(file_exists($this->cookie_file))
	{
		unlink($this->cookie_file);
	}
}
function setUserAgent($ua)
{
	$this->user_agent=$ua;
}
function setProxy($proxy)
{
	$this->proxy=$proxy;
}

function cookie($cookie_file) {
if (file_exists($cookie_file)) {
$this->cookie_file=realpath($cookie_file);
} else {
$fp=fopen($cookie_file,'w') or $this->error('The cookie file could not be opened. Make sure this directory has the correct permissions');
$this->cookie_file=realpath($cookie_file);
fclose($fp);
}
}
function getcfile()
{
return 	$cookie_file;
}
function get($url) {
$process = curl_init($url);
curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
curl_setopt($process, CURLOPT_HEADER, 0);
curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
curl_setopt($process,CURLOPT_ENCODING , $this->compression);
curl_setopt($process, CURLOPT_TIMEOUT, 30);
//curl_setopt($process, CURLOPT_PROXY, "172.31.100.29:3128");
//curl_setopt($process,CURLOPT_PROXYUSERPWD,"absingh:pratap");
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
$return = curl_exec($process);	
curl_close($process);
return $return;
}
function post($url,$data,$referer=false) {
	$process = curl_init($url);
	curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
	curl_setopt($process, CURLOPT_HEADER, 0);
	curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
	if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);

	if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);

	curl_setopt($process, CURLOPT_ENCODING , $this->compression);
	curl_setopt($process, CURLOPT_TIMEOUT, 30);
	//curl_setopt($process, CURLOPT_PROXY, "172.31.100.25:3128");
	//curl_setopt($process,CURLOPT_PROXYUSERPWD,"ccb2011:ccb2011");
	curl_setopt($process, CURLOPT_POSTFIELDS, $data);
	//print_r($data);
	curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
	if($referer){
		curl_setopt($process, CURLOPT_REFERER, $referer);
	}
	curl_setopt($process, CURLOPT_POST, 1);
	curl_setopt($process, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($process, CURLOPT_SSL_VERIFYHOST, 2); 
	$return = curl_exec($process);
	curl_close($process);
	return $return;
}
function error($error) {
echo "<center><div style='width:500px;border: 3px solid #FFEEFF; padding: 3px; background-color: #FFDDFF;font-family: verdana; font-size: 10px'><b>cURL Error</b><br>$error</div></center>";
die;
}
}

?>