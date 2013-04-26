<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$this->load->view($GLOBALS['site_theme']."/login/login");
		}
		else
		{
			redirect("app_route");
		}
	}
	
	function act()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$dt['username'] = $_POST['username'];
 			$dt['password'] = $_POST['password'];
 			$dt['st'] = $_POST['st'];
			$this->app_user_login_model->cekUserLogin($dt);
		}
		else
		{
			redirect("app_route");
		}
	}
	
	function logout()
	{
		if($this->session->userdata("logged_in")!="")
		{
 			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
}
