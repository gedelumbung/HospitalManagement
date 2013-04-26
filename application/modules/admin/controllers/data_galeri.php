<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_galeri extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_galeri($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("galeri/bg_home");
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
			$d['gambar'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("galeri/bg_input");
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
			$where['id_galeri'] = $id_param;
			$get = $this->db->get_where("dlmbg_galeri",$where)->row();
			
			$d['judul'] = $get->judul;
			$d['gambar'] = $get->gambar;
			
			$d['id_param'] = $get->id_galeri;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("galeri/bg_input");
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
			$id['id_galeri'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$config['upload_path'] = './asset/galeri/temp/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '3000';
				$config['max_width']  	= '3000';
				$config['max_height']  	= '3000';
		 
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();
		 
					/* PATH */
					$source             = "./asset/galeri/temp/".$data['file_name'] ;
					$destination_thumb	= "./asset/galeri/" ;
		 
					// Permission Configuration
					chmod($source, 0777) ;
		 
					/* Resizing Processing */
					// Configuration Of Image Manipulation :: Static
					$this->load->library('image_lib') ;
					$img['image_library'] = 'GD2';
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;
		 
					/// Limit Width Resize
					$limit_thumb    = 640 ;
		 
					// Size Image Limit was using (LIMIT TOP)
					$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
		 
					// Percentase Resize
					if ($limit_use > $limit_thumb) {
						$percent_thumb  = $limit_thumb/$limit_use ;
					}
		 
					//// Making THUMBNAIL ///////
					$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
					$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
		 
					// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '80%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_thumb ;
		 
					// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;
					
					$in_data['gambar'] = $data['file_name'];
					$in_data['judul'] = $this->input->post("judul");
					$this->db->insert("dlmbg_galeri",$in_data);
			
					unlink($source);
					
					redirect("admin/data_galeri");
				}
				else 
				{
					echo $this->upload->display_errors('<p>','</p>');
				}
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['userfile']['name']))
				{
					$in_data['judul'] = $this->input->post("judul");
					$this->db->update("dlmbg_galeri",$in_data,$id);
					redirect("admin/data_galeri");
				}
				else
				{
					$config['upload_path'] = './asset/galeri/temp/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
		
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/galeri/temp/".$data['file_name'] ;
						$destination_thumb	= "./asset/galeri/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_thumb    = 640 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '80%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$in_data['judul'] = $this->input->post("judul");
						$this->db->update("dlmbg_galeri",$in_data,$id);
				
						$old_thumb	= "./asset/galeri/".$this->input->post("gambar")."" ;
						unlink($source);
						unlink($old_thumb);
						
						redirect("admin/data_galeri");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param,$gbr)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_galeri'] = $id_param;
			$this->db->delete("dlmbg_galeri",$where);
			unlink("./asset/galeri/".$gbr."");
			redirect("admin/data_galeri");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
