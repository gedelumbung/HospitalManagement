<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_kategori_ruang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kategori_ruang($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kategori_ruang/bg_home");
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
			$d['kategori_ruang'] = "";
			$d['biaya_ruang'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kategori_ruang/bg_input");
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
			$where['id_kategori_ruang'] = $id_param;
			$get = $this->db->get_where("dlmbg_kategori_ruang",$where)->row();
			
			$d['kategori_ruang'] = $get->kategori_ruang;
			$d['biaya_ruang'] = $get->biaya_ruang;
			
			$d['id_param'] = $get->id_kategori_ruang;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kategori_ruang/bg_input");
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
			$id['id_kategori_ruang'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['kategori_ruang'] = $this->input->post("kategori_ruang");
				$in['biaya_ruang'] = $this->input->post("biaya_ruang");
				
				$this->db->insert("dlmbg_kategori_ruang",$in);
			}
			else if($tipe=="edit")
			{
				$in['kategori_ruang'] = $this->input->post("kategori_ruang");
				$in['biaya_ruang'] = $this->input->post("biaya_ruang");
				
				$this->db->update("dlmbg_kategori_ruang",$in,$id);
			}
			
			redirect("admin/data_kategori_ruang");
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
			$where['id_kategori_ruang'] = $id_param;
			$this->db->delete("dlmbg_kategori_ruang",$where);
			redirect("admin/data_kategori_ruang");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
