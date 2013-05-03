<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_status extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_status($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("status/bg_home");
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
			$d['status'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("status/bg_input");
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
			$where['id_status'] = $id_param;
			$get = $this->db->get_where("dlmbg_status",$where)->row();
			
			$d['status'] = $get->status;
			
			$d['id_param'] = $get->id_status;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("status/bg_input");
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
			$id['id_status'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['status'] = $this->input->post("status");
				
				$this->db->insert("dlmbg_status",$in);
			}
			else if($tipe=="edit")
			{
				$in['status'] = $this->input->post("status");
				
				$this->db->update("dlmbg_status",$in,$id);
			}
			
			redirect("admin/data_status");
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
			$where['id_status'] = $id_param;
			$this->db->delete("dlmbg_status",$where);
			redirect("admin/data_status");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
