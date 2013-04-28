<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_perawat extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_perawat($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("perawat/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['id_status'] = "";
			$d['id_spesialis'] = "";
			$d['nama_perawat'] = "";
			$d['nip'] = "";
			$d['golongan'] = "";
			$d['jk'] = "";
			$d['alamat'] = "";
			$d['telepon'] = "";
			
			$d['status'] = $this->db->get("dlmbg_status");
			$d['spesialis'] = $this->db->get("dlmbg_spesialis");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("perawat/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_perawat'] = $id_param;
			$get = $this->db->get_where("dlmbg_perawat",$where)->row();
			
			$d['id_status'] = $get->id_status;
			$d['id_spesialis'] = $get->id_spesialis;
			$d['nama_perawat'] = $get->nama_perawat;
			$d['nip'] = $get->nip;
			$d['golongan'] = $get->golongan;
			$d['jk'] = $get->jk;
			$d['alamat'] = $get->alamat;
			$d['telepon'] = $get->telepon;
			
			$d['status'] = $this->db->get("dlmbg_status");
			$d['spesialis'] = $this->db->get("dlmbg_spesialis");
			
			$d['id_param'] = $get->id_perawat;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("perawat/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_perawat'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$d['id_status'] = $this->input->post("id_status");
				$d['id_spesialis'] = $this->input->post("id_spesialis");
				$d['nama_perawat'] = $this->input->post("nama_perawat");
				$d['nip'] = $this->input->post("nip");
				$d['golongan'] = $this->input->post("golongan");
				$d['jk'] = $this->input->post("jk");
				$d['alamat'] = $this->input->post("alamat");
				$d['telepon'] = $this->input->post("telepon");
				
				$this->db->insert("dlmbg_perawat",$d);
			}
			else if($tipe=="edit")
			{
				$d['id_status'] = $this->input->post("id_status");
				$d['id_spesialis'] = $this->input->post("id_spesialis");
				$d['nama_perawat'] = $this->input->post("nama_perawat");
				$d['nip'] = $this->input->post("nip");
				$d['golongan'] = $this->input->post("golongan");
				$d['jk'] = $this->input->post("jk");
				$d['alamat'] = $this->input->post("alamat");
				$d['telepon'] = $this->input->post("telepon");
				
				$this->db->update("dlmbg_perawat",$d,$id);
			}
			
			redirect("admin/data_perawat");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_perawat'] = $id_param;
			$this->db->delete("dlmbg_perawat",$where);
			redirect("admin/data_perawat");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
