<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('link_url'))
{
	function link_url($teks)
	{
		$c = array (' ');
    	$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
		$s = strtolower(str_replace($d,"",$teks));
		$link = strtolower(str_replace($c, '-', $s));

		return $link;
	}
}
