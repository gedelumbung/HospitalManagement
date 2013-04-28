<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_perawat extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_jadwal_perawat($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal_perawat/bg_home");
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
			$d['id_perawat'] = "";
			$d['hari'] = "";
			$d['shift'] = "";
			
			$d['perawat'] = $this->db->get("dlmbg_perawat");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal_perawat/bg_input");
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
			$where['id_jadwal_perawat'] = $id_param;
			$get = $this->db->get_where("dlmbg_jadwal_perawat",$where)->row();
			
			$d['id_perawat'] = $get->id_perawat;
			$d['hari'] = $get->hari;
			$d['shift'] = $get->shift;
			
			$d['perawat'] = $this->db->get("dlmbg_perawat");
			
			$d['id_param'] = $get->id_jadwal_perawat;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal_perawat/bg_input");
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
			$id['id_jadwal_perawat'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$d['id_perawat'] = $this->input->post("id_perawat");
				$d['hari'] = $this->input->post("hari");
				$d['shift'] = $this->input->post("shift");
				
				$this->db->insert("dlmbg_jadwal_perawat",$d);
			}
			else if($tipe=="edit")
			{
				$d['id_perawat'] = $this->input->post("id_perawat");
				$d['hari'] = $this->input->post("hari");
				$d['shift'] = $this->input->post("shift");
				
				$this->db->update("dlmbg_jadwal_perawat",$d,$id);
			}
			
			redirect("admin/jadwal_perawat");
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
			$where['id_jadwal_perawat'] = $id_param;
			$this->db->delete("dlmbg_jadwal_perawat",$where);
			redirect("admin/jadwal_perawat");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
