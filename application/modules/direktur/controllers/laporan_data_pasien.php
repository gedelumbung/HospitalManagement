<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_data_pasien extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="direktur")
		{
			$d['data_retrieve'] = $this->app_global_direktur_model->generate_index_laporan_pasien($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("laporan_data_pasien/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function detail($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="direktur")
		{
			$where['id_pasien'] = $id_param;
			$get = $this->db->get_where("dlmbg_pasien",$where)->row();
			
			$d['id_ruang'] = $get->id_ruang;
			$d['id_dokter'] = $get->id_dokter;
			$d['nama_pasien'] = $get->nama_pasien;
			$d['tgl_lahir'] = $get->tgl_lahir;
			$d['tempat_lahir'] = $get->tempat_lahir;
			$d['jk'] = $get->jk;
			$d['usia'] = $get->usia;
			$d['alamat'] = $get->alamat;
			$d['jenis_penyakit'] = $get->jenis_penyakit;
			$d['tgl_masuk'] = $get->tgl_masuk;
			$d['tgl_keluar'] = $get->tgl_keluar;
			$d['biaya'] = $get->biaya;
			
			$d['dokter'] = $this->db->get("dlmbg_dokter");
			$d['ruang'] = $this->db->get("dlmbg_ruang");
			
			$d['id_param'] = $get->id_pasien;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("laporan_data_pasien/bg_detail");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
