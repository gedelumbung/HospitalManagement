<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('download'))
{
	function download($url,$fakename)
	{
		ob_start();
		$mm_type="application/octet-stream";
		header("Cache-Control: public, must-revalidate");
		header("Pragma: File Download");
		header("Content-Type:". $mm_type);
		header("Content-Length: ".(string)(filesize($url)));
		header('Content-Disposition: attachment; filename="'.$fakename.'"');
		header("Content-Transfer-Encoding: binary\n");
		ob_end_clean();
		readfile($url);
		exit();
	}
}
