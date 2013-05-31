<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tampil_gravatar'))
{
	function tampil_gravatar($gbr)
	{
		$url = base_url().'asset/gravatar-member/thumb/'.$gbr;
		return $url;
	}
}

if ( ! function_exists('big_gravatar'))
{
	function big_gravatar($gbr)
	{
		$url = base_url().'asset/gravatar-member/medium/'.$gbr;
		return $url;
	}
}
