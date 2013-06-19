<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_data_kunjungan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$cari = $this->session->userdata("bulan_cari");
			$kat = $this->session->userdata("tunjangan_cari");
			$d['bulan_cari'] = $cari;
			$d['id_tunjangan'] = $kat;
			$d['tunjangan'] = $this->db->get("dlmbg_tunjangan");
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kunjungan($cari,$kat,$GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("laporan_data_kunjungan/bg_home");
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
			$cari = $this->session->userdata("bulan_cari");
			$kat = $this->session->userdata("tunjangan_cari");
			$d['bulan_cari'] = $cari;
			$d['id_tunjangan'] = $kat;
			$d['tunjangan'] = $this->db->get("dlmbg_tunjangan");
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kunjungan_cetak($cari,$kat);
			
 			$this->load->view("laporan_data_kunjungan/bg_cetak",$d);
		}
		else
		{
			redirect(base_url());
		}
   }

   public function set()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$set['bulan_cari'] = $_POST['bulan'];
			$set['tunjangan_cari'] = $_POST['tunjangan'];
			$this->session->set_userdata($set);
			redirect("admin/laporan_data_kunjungan");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
