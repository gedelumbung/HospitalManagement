<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_spesialis extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_spesialis($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("spesialis/bg_home");
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
			$d['spesialis'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("spesialis/bg_input");
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
			$where['id_spesialis'] = $id_param;
			$get = $this->db->get_where("dlmbg_spesialis",$where)->row();
			
			$d['spesialis'] = $get->spesialis;
			
			$d['id_param'] = $get->id_spesialis;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("spesialis/bg_input");
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
			$id['id_spesialis'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['spesialis'] = $this->input->post("spesialis");
				
				$this->db->insert("dlmbg_spesialis",$in);
			}
			else if($tipe=="edit")
			{
				$in['spesialis'] = $this->input->post("spesialis");
				
				$this->db->update("dlmbg_spesialis",$in,$id);
			}
			
			redirect("admin/data_spesialis");
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
			$where['id_spesialis'] = $id_param;
			$this->db->delete("dlmbg_spesialis",$where);
			redirect("admin/data_spesialis");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
