<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_tunjangan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_tunjangan($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("data_tunjangan/bg_home");
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
			$d['tunjangan'] = "";
			$d['besaran'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("data_tunjangan/bg_input");
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
			$where['id_tunjangan'] = $id_param;
			$get = $this->db->get_where("dlmbg_tunjangan",$where)->row();
			
			$d['tunjangan'] = $get->tunjangan;
			$d['besaran'] = $get->besaran;
			
			$d['id_param'] = $get->id_tunjangan;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("data_tunjangan/bg_input");
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
			$id['id_tunjangan'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['tunjangan'] = $this->input->post("tunjangan");
				$in['besaran'] = $this->input->post("besaran");
				
				$this->db->insert("dlmbg_tunjangan",$in);
			}
			else if($tipe=="edit")
			{
				$in['tunjangan'] = $this->input->post("tunjangan");
				$in['besaran'] = $this->input->post("besaran");
				
				$this->db->update("dlmbg_tunjangan",$in,$id);
			}
			
			redirect("admin/data_tunjangan");
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
			$where['id_tunjangan'] = $id_param;
			$this->db->delete("dlmbg_tunjangan",$where);
			redirect("admin/data_tunjangan");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
