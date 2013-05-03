<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sistem extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_sistem($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("sistem/bg_home");
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
			$where['id_setting'] = $id_param;
			$get = $this->db->get_where("dlmbg_setting",$where)->row();
			
			$d['tipe'] = $get->tipe;
			$d['title'] = $get->title;
			$d['content_setting'] = $get->content_setting;
			
			$d['id_param'] = $get->id_setting;
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("sistem/bg_input");
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
			$id['id_setting'] = $this->input->post("id_param");
			
			$in['tipe'] = $this->input->post("tipe");
			$in['title'] = $this->input->post("title");
			$in['content_setting'] = strip_tags($this->input->post("content_setting"));
			
			$this->db->update("dlmbg_setting",$in,$id);
			
			redirect("admin/sistem");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
