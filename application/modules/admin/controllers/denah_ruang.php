<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class denah_ruang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_denah_ruang($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("denah_ruang/bg_home");
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
			$d['judul'] = "";
			$d['koordinat'] = "";
			$d['keterangan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("denah_ruang/bg_input");
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
			$where['id_denah'] = $id_param;
			$get = $this->db->get_where("dlmbg_denah",$where)->row();
			
			$d['judul'] = $get->judul;
			$d['koordinat'] = $get->koordinat;
			$d['keterangan'] = $get->keterangan;
			
			
			$d['id_param'] = $get->id_denah;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("denah_ruang/bg_input");
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
			$id['id_denah'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['judul'] = $this->input->post("judul");
				$in['koordinat'] = $this->input->post("koordinat");
				$in['keterangan'] = $this->input->post("keterangan");

				$hasil = array();
				$hasil = explode(",",$in['koordinat']);
				$in['koordinat'] = "";
				for($i=0;$i<count($hasil);$i++)
				{
					$in['koordinat'] .= ($hasil[$i]*2).',';
				}
				
				$this->db->insert("dlmbg_denah",$in);
			}
			else if($tipe=="edit")
			{
				$in['judul'] = $this->input->post("judul");
				$in['koordinat'] = $this->input->post("koordinat");
				$in['keterangan'] = $this->input->post("keterangan");

				$hasil = array();
				$hasil = explode(",",$in['koordinat']);
				$in['koordinat'] = "";
				for($i=0;$i<count($hasil);$i++)
				{
					$in['koordinat'] .= ($hasil[$i]*2).',';
				}
				
				$this->db->update("dlmbg_denah",$in,$id);
			}
			
			redirect("admin/denah_ruang");
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
			$where['id_denah'] = $id_param;
			$this->db->delete("dlmbg_denah",$where);
			redirect("admin/denah_ruang");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
