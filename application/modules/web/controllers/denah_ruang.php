<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class denah_ruang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index()
	{
		$d['menu_atas'] = $this->app_global_web->generate_index_menu("atas");
		$d['menu_bawah'] = $this->app_global_web->generate_index_menu("bawah");
		$d['dt'] = $this->app_global_web->generate_index_koordinat();
		$d['dt_koor'] = $this->app_global_web->generate_index_list_koordinat();

 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/denah_ruang/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
