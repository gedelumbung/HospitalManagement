<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_dokter extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="direktur")
		{
			$d['data_retrieve'] = $this->app_global_direktur_model->generate_index_jadwal_dokter($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal_dokter/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="direktur")
		{
			$d['id_dokter'] = "";
			$d['hari'] = "";
			$d['shift'] = "";
			
			$d['dokter'] = $this->db->get("dlmbg_dokter");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal_dokter/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="direktur")
		{
			$where['id_jadwal_dokter'] = $id_param;
			$get = $this->db->get_where("dlmbg_jadwal_dokter",$where)->row();
			
			$d['id_dokter'] = $get->id_dokter;
			$d['hari'] = $get->hari;
			$d['shift'] = $get->shift;
			
			$d['dokter'] = $this->db->get("dlmbg_dokter");
			
			$d['id_param'] = $get->id_jadwal_dokter;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal_dokter/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="direktur")
		{
			$tipe = $this->input->post("tipe");
			$id['id_jadwal_dokter'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$d['id_dokter'] = $this->input->post("id_dokter");
				$d['hari'] = $this->input->post("hari");
				$d['shift'] = $this->input->post("shift");
				
				$this->db->insert("dlmbg_jadwal_dokter",$d);
			}
			else if($tipe=="edit")
			{
				$d['id_dokter'] = $this->input->post("id_dokter");
				$d['hari'] = $this->input->post("hari");
				$d['shift'] = $this->input->post("shift");
				
				$this->db->update("dlmbg_jadwal_dokter",$d,$id);
			}
			
			redirect("direktur/jadwal_dokter");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="direktur")
		{
			$where['id_jadwal_dokter'] = $id_param;
			$this->db->delete("dlmbg_jadwal_dokter",$where);
			redirect("direktur/jadwal_dokter");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superdirektur.php */
