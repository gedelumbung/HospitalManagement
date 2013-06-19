<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_fasilitas_ruang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_laporan_fasilitas_ruang($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("laporan_fasilitas_ruang/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function cetak()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_laporan_fasilitas_ruang_cetak();
			
 			$this->load->view("laporan_fasilitas_ruang/bg_cetak",$d);
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
