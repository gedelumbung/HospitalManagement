<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fasilitas_ruang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$d['menu_atas'] = $this->app_global_web->generate_index_menu("atas");
		$d['menu_bawah'] = $this->app_global_web->generate_index_menu("bawah");
		$d['dt_kat'] = $this->app_global_web->generate_index_kategori_ruang($GLOBALS['site_limit_medium'],$uri);
		$d['dt'] = $this->app_global_web->generate_index_fasilitas_ruang($GLOBALS['site_limit_medium'],$uri);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/fasilitas_ruang/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
