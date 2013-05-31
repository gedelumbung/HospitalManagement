<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_permalink'))
{
	function set_permalink($content)
	{
		$karakter = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
		$s = strtolower(str_replace($karakter,"",$content));
		$link = strtolower(str_replace(' ', '-', $s));
		return $link;
	}
}

// ------------------------------------------------------------------------

/* End of file captcha_helper.php */
/* Location: ./system/heleprs/captcha_helper.php */