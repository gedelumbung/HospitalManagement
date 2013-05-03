<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buku_tamu extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$d['menu_atas'] = $this->app_global_web->generate_index_menu("atas");
		$d['menu_bawah'] = $this->app_global_web->generate_index_menu("bawah");
		$d['dt'] = $this->app_global_web->generate_index_buku_tamu($GLOBALS['site_limit_small'],$uri);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/buku_tamu/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}

	function kirim()
	{
		$in['nama'] = $_POST['nama'];
		$in['email'] = $_POST['email'];
		$in['pesan'] = $_POST['pesan'];
		$in['st'] = 0;
		$this->db->insert("dlmbg_buku_tamu",$in);
		$this->session->set_flashdata("hasil","Data anda telah terkirim, dan akan kami moderisasi terlebih dahulu. Terima Kasih.");
		redirect("web/buku_tamu");
	}
}
