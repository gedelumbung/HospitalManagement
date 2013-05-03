<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class password extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['kode_user'] = $this->session->userdata("kode_user");	
			$d['username'] = $this->session->userdata("username");	
			
 			$this->load->view("password/bg_home",$d);
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
			$id['password'] = md5($this->input->post("old").$GLOBALS['key_login']);
			$cek = $this->db->get_where("dlmbg_user",$id)->num_rows();
			
			if($cek>0)
			{
				if($_POST['new']==$_POST['retype'])
				{
					$id_up['kode_user'] = $this->input->post("kode_user");
					$id_up['username'] = $this->input->post("username");
					$up['password'] = md5($_POST['new'].$GLOBALS['key_login']);
					$this->db->update("dlmbg_user",$up,$id_up);
					$this->session->set_flashdata("result_login","Berhasil mengubah password");
					redirect("global/password");
				}
				else
				{
					$this->session->set_flashdata("result_login","Password tidak sama");
					redirect("global/password");
				}
			}
			else
			{
				$this->session->set_flashdata("result_login","Password lama tidak valid");
				redirect("global/password");
			}
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
