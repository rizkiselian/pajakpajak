<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendataan extends CI_Model {

	public function get_dataobjekpajakhotel(){
		$this->db->select('perusahan.*, 
			kel.nama_kelurahan as nama_kel, 
			kec.nama_kecamatan as nama_kec');
		$this->db->from('tbl_perusahaan perusahan');
		$this->db->join('kelurahan kel', 'kel.id_kelurahan = perusahan.id_desa', 'left');
		$this->db->join('kecamatan kec', 'kec.id_kecamatan = perusahan.id_kecamatan');
		$this->db->where('id_kategori', 1);
		$this->db->order_by('perusahan.id ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_detailpajakhotel($npwpd){
		$this->db->select('perusahan.*, 
			kel.nama_kelurahan as nama_kel, 
			kec.nama_kecamatan as nama_kec,
			kat.nama_kategori as nama_kat ');
		$this->db->from('tbl_perusahaan perusahan');
		$this->db->join('kelurahan kel', 'kel.id_kelurahan = perusahan.id_desa', 'left');
		$this->db->join('kecamatan kec', 'kec.id_kecamatan = perusahan.id_kecamatan');
		$this->db->join('tbl_kategori kat', 'kat.id = perusahan.id_kategori');
		$this->db->where('id_kategori', 1, 'npwpd', $npwpd);
		$this->db->order_by('perusahan.id ASC');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_tipejumlahtarifhotel($npwpd){
		$this->db->select('tbl_occupancy');
		$this->db->where('npwpd', $npwpd);
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file M_pendataan.php */
/* Location: ./application/models/M_pendataan.php */