<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$d['menu_atas'] = $this->app_global_web->generate_index_menu("atas");
		$d['menu_bawah'] = $this->app_global_web->generate_index_menu("bawah");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/contact/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}

	function kirim()
	{
		$in['nama'] = $_POST['nama'];
		$in['email'] = $_POST['email'];
		$in['alamat'] = $_POST['alamat'];
		$in['telepon'] = $_POST['telepon'];
		$in['pesan'] = $_POST['pesan'];
		$this->db->insert("dlmbg_contact",$in);
		$this->session->set_flashdata("hasil","Data anda telah terkirim, kami akan segera menanggapinya. Terima Kasih.");
		redirect("web/contact");
	}
}
