<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('nama_hari'))
{
	function nama_hari($tgl,$bulan,$tahun)
	{
		$nama = date("l", mktime(0,0,0,$bulan,$tgl,$tahun));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}
