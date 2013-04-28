<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_pasien extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="perawat")
		{
			$d['data_retrieve'] = $this->app_global_perawat_model->generate_index_pasien($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pasien/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="perawat")
		{
			$d['id_ruang'] = "";
			$d['id_dokter'] = "";
			$d['nama_pasien'] = "";
			$d['tgl_lahir'] = "";
			$d['tempat_lahir'] = "";
			$d['jk'] = "";
			$d['usia'] = "";
			$d['alamat'] = "";
			$d['jenis_penyakit'] = "";
			$d['tgl_masuk'] = "";
			$d['tgl_keluar'] = "";
			$d['biaya'] = "";
			
			$d['dokter'] = $this->db->get("dlmbg_dokter");
			$d['ruang'] = $this->db->get("dlmbg_ruang");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pasien/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="perawat")
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
 			$this->load->view("pasien/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="perawat")
		{
			$tipe = $this->input->post("tipe");
			$id['id_pasien'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$d['id_ruang'] = $this->input->post("id_ruang");
				$d['id_dokter'] = $this->input->post("id_dokter");
				$d['nama_pasien'] = $this->input->post("nama_pasien");
				$d['tgl_lahir'] = $this->input->post("tgl_lahir");
				$d['tempat_lahir'] = $this->input->post("tempat_lahir");
				$d['jk'] = $this->input->post("jk");
				$d['usia'] = $this->input->post("usia");
				$d['alamat'] = $this->input->post("alamat");
				$d['jenis_penyakit'] = $this->input->post("jenis_penyakit");
				$d['tgl_masuk'] = $this->input->post("tgl_masuk");
				$d['tgl_keluar'] = $this->input->post("tgl_keluar");
				$d['biaya'] = $this->input->post("biaya");
				
				$this->db->insert("dlmbg_pasien",$d);
			}
			else if($tipe=="edit")
			{
				$d['id_ruang'] = $this->input->post("id_ruang");
				$d['id_dokter'] = $this->input->post("id_dokter");
				$d['nama_pasien'] = $this->input->post("nama_pasien");
				$d['tgl_lahir'] = $this->input->post("tgl_lahir");
				$d['tempat_lahir'] = $this->input->post("tempat_lahir");
				$d['jk'] = $this->input->post("jk");
				$d['usia'] = $this->input->post("usia");
				$d['alamat'] = $this->input->post("alamat");
				$d['jenis_penyakit'] = $this->input->post("jenis_penyakit");
				$d['tgl_masuk'] = $this->input->post("tgl_masuk");
				$d['tgl_keluar'] = $this->input->post("tgl_keluar");
				$d['biaya'] = $this->input->post("biaya");
				
				$this->db->update("dlmbg_pasien",$d,$id);
			}
			
			redirect("perawat/data_pasien");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="perawat")
		{
			$where['id_pasien'] = $id_param;
			$this->db->delete("dlmbg_pasien",$where);
			redirect("perawat/data_pasien");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superperawat.php */
