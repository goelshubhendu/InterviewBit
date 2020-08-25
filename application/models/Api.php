<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Model {
	public function async($url,$params){
		$post_string = http_build_query($params);
		$parts=parse_url($url);
		$errno=0;
		$errstr="";
		$ans=true;
	    $fp = fsockopen($parts['host'],isset($parts['port'])?$parts['port']:80,$errno,$errstr,30);
	    if(!$fp){
	    	return false;
	    }
	    $out = "POST ".$parts['path']." HTTP/1.1\r\n";
	    $out.= "Host: ".$parts['host']."\r\n";
	    $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
	    $out.= "Content-Length: ".strlen($post_string)."\r\n";
	    $out.= "Connection: Close\r\n\r\n";
	    if (isset($post_string)) 
	    {
	    	$out.= $post_string;
	    }
	//    echo $out;
	    if(fwrite($fp,$out)==false)
	    	$ans=false;
	    fclose($fp);
	    return $ans;
	}
}