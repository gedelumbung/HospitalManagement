<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ruang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_ruang($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("ruang/bg_home");
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
			$d['id_kategori_ruang'] = "";
			$d['nama_ruang'] = "";
			$d['status_ruangan'] = "";
			$d['fasilitas_ruangan'] = "";
			
			$d['kat'] = $this->db->get("dlmbg_kategori_ruang");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("ruang/bg_input");
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
			$where['id_ruang'] = $id_param;
			$get = $this->db->get_where("dlmbg_ruang",$where)->row();
			
			$d['id_kategori_ruang'] = $get->id_kategori_ruang;
			$d['nama_ruang'] = $get->nama_ruang;
			$d['status_ruangan'] = $get->status_ruangan;
			$d['fasilitas_ruangan'] = $get->fasilitas_ruangan;
			
			$d['kat'] = $this->db->get("dlmbg_kategori_ruang");
			
			$d['id_param'] = $get->id_ruang;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("ruang/bg_input");
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
			$id['id_ruang'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_ruang'] = $this->input->post("nama_ruang");
				$in['id_kategori_ruang'] = $this->input->post("id_kategori_ruang");
				$in['status_ruangan'] = $this->input->post("status_ruangan");
				$in['fasilitas_ruangan'] = $this->input->post("fasilitas_ruangan");
				
				$this->db->insert("dlmbg_ruang",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama_ruang'] = $this->input->post("nama_ruang");
				$in['id_kategori_ruang'] = $this->input->post("id_kategori_ruang");
				$in['status_ruangan'] = $this->input->post("status_ruangan");
				$in['fasilitas_ruangan'] = $this->input->post("fasilitas_ruangan");
				
				$this->db->update("dlmbg_ruang",$in,$id);
			}
			
			redirect("admin/ruang");
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
			$where['id_ruang'] = $id_param;
			$this->db->delete("dlmbg_ruang",$where);
			redirect("admin/ruang");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
