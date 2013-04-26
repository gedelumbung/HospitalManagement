<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function cekUserLogin($data)
	{
		$cek['username'] 	= mysql_real_escape_string($data['username']);
		$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$GLOBALS['key_login']);
		$cek['level'] 		= mysql_real_escape_string($data['st']);
		$q_cek_login = $this->db->get_where('dlmbg_user', $cek);
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qad)
			{
				$sess_data['logged_in'] = 'yesGetMeLoginBaby';
				$sess_data['nama_user_login'] = $qad->nama_user;
				$sess_data['kode_user'] = $qad->kode_user;
				$sess_data['username'] = $qad->username;
				$sess_data['level'] = $qad->level;
				$this->session->set_userdata($sess_data);
			}
			redirect("app_route");
		}
		else
		{
			$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
			redirect("login");
		}
		
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */