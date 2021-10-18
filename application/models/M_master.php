<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

	public function get($tbl, $orderby){
		$query = $this->db->get($tbl);
		$this->db->order_by($orderby);
		return $query->result_array();
	}

	public function get_data($tbl){
		$query = $this->db->get($tbl);
		return $query->result();
	}

	Function get_id($tbl, $id) {
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM tbl_perusahaan WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->result_array();
	}

	Function get_id_kecamatan($table_name, $where, $order = null)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('id_kabupaten', $where);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_kec($id_kecamatan) {
		$this->db->select('kel.*, kec.nama_kecamatan as nama_kec');
		$this->db->from('kelurahan kel');
		$this->db->like('kel.id_kecamatan', $id_kecamatan, 'both');
		$this->db->join('kecamatan kec', 'kec.id_kecamatan = kel.id_kecamatan', 'left');
		$this->db->order_by('kec.nama_kecamatan, kel.nama_kelurahan ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_klasifikasi(){
		$this->db->select('klaskel.*, katkec.nama_kategori as nama_kat');
		$this->db->from('tbl_klasifikasi klaskel');
		$this->db->join('tbl_kategori katkec', 'katkec.id = klaskel.id_kategori', 'left');
		$this->db->order_by('klaskel.id DESC');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function get_perusahaan(){
		$this->db->select('tp.*, kel.nama_kelurahan, kec.nama_kecamatan, tk.nama_kategori');
		$this->db->from('tbl_perusahaan tp');
		$this->db->join('kelurahan kel', 'kel.id_kelurahan = tp.id_desa', 'left');
		$this->db->join('kecamatan kec', 'kec.id_kecamatan = tp.id_kecamatan', 'left');
		$this->db->join('tbl_kategori tk', 'tk.id = tp.id_kategori', 'left');
		$this->db->order_by('tp.id DESC');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function get_izin_usaha(){
		$this->db->select('*');
		$this->db->from('tbl_izin_usaha');
		// $this->db->where("npwpd", $npwpd);
		$this->db->order_by('id DESC');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function get_jenis() {
		$this->db->select('tj.*, tk.nama_kategori');
		$this->db->from('tbl_jenis tj');
		$this->db->join('tbl_kategori tk', 'tk.id = tj.id_kategori', 'left');
		$this->db->order_by('tj.id ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert($tbl, $data) {
		$this->db->insert($tbl, $data);

		return $this->db->affected_rows();
	}

	public function update($tbl, $data, $id) {
		$this->db->where("id", $id);
		$this->db->update($tbl, $data);
		return $this->db->affected_rows();
	}

	public function delete($tbl, $id) {

		$this->db->where('id', $id);
		$this->db->delete($tbl);
		return $this->db->affected_rows();
	}

	// public function insert_batch($data) {
	// 	$this->db->insert_batch('pegawai', $data);

	// 	return $this->db->affected_rows();
	// }

	// public function check_nama($nama) {
	// 	$this->db->where('nama', $nama);
	// 	$data = $this->db->get('pegawai');

	// 	return $data->num_rows();
	// }

	// public function total_rows() {
	// 	$data = $this->db->get('pegawai');

	// 	return $data->num_rows();
	// }
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */