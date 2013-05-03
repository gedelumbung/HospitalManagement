<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_direktur_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	 
	public function generate_index_jadwal_perawat($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_jadwal_perawat");

		$config['base_url'] = base_url() . 'direktur/jadwal_perawat/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select b.nama_perawat, a.id_jadwal_perawat, a.hari, a.shift from dlmbg_jadwal_perawat a left join dlmbg_perawat b
		on a.id_perawat=b.id_perawat LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Perawat</th>
					<th>Hari</th>
					<th>Shift</th>
					<th width='150'><a href='".base_url()."direktur/jadwal_perawat/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_perawat."</td>
					<td>".$h->hari."</td>
					<td>".$h->shift."</td>
					<td>";
			$hasil .= "<a href='".base_url()."direktur/jadwal_perawat/edit/".$h->id_jadwal_perawat."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."direktur/jadwal_perawat/hapus/".$h->id_jadwal_perawat."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	 
	public function generate_index_jadwal_dokter($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_jadwal_dokter");

		$config['base_url'] = base_url() . 'direktur/jadwal_dokter/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select b.nama_dokter, a.id_jadwal_dokter, a.hari, a.shift from dlmbg_jadwal_dokter a left join dlmbg_dokter b
		on a.id_dokter=b.id_dokter LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Dokter</th>
					<th>Hari</th>
					<th>Shift</th>
					<th width='150'><a href='".base_url()."direktur/jadwal_dokter/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_dokter."</td>
					<td>".$h->hari."</td>
					<td>".$h->shift."</td>
					<td>";
			$hasil .= "<a href='".base_url()."direktur/jadwal_dokter/edit/".$h->id_jadwal_dokter."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."direktur/jadwal_dokter/hapus/".$h->id_jadwal_dokter."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
}
