<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['kode_user'] = $this->session->userdata("kode_user");	
			$d['nama_user_login'] = $this->session->userdata("nama_user_login");	
			$d['username'] = $this->session->userdata("username");	
			$d['level'] = $this->session->userdata("level");	
			
 			$this->load->view("profil/bg_home",$d);
		}
		else
		{
			redirect(base_url());
		}
   }
   
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_user'] = $this->input->post("kode_user");
			$id['username'] = $this->input->post("username");
			
			$in['nama_user'] = $this->input->post("nama_user");
			$sess_data['nama_user_login'] = $in['nama_user'];
			$this->session->set_userdata($sess_data);
			$this->db->update("dlmbg_user",$in,$id);
			
			$this->session->set_flashdata("result_login","Berhasil memperbaharui profil");
			redirect("global/profil");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
