<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

	Function get_id($table_name, $where, $order = null)
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

	public function get($tbl, $orderby){
		$query = $this->db->get($tbl);
		$this->db->order_by($orderby);
		return $query->result_array();
	}

	public function get_klasifikasi(){
		$this->db->select('klaskel.*, katkec.nama_kategori as nama_kat');
		$this->db->from('tbl_klasifikasi klaskel');
		$this->db->join('tbl_kategori katkec', 'katkec.id = klaskel.id_kategori', 'left');
		// $this->db->order_by('klaskel.id_kategori ASC');
		$this->db->order_by('klaskel.id DESC');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function select_all() {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	// public function select_all_kategori() {
	// 	$sql = " SELECT tbl_jenis.id AS id, tbl_jenis.id_kategori AS id_kategori, tbl_kategori.nama_kategori AS nama_kategori FROM tbl_jenis, tbl_kategori WHERE tbl_jenis.id_kategori = tbl_kategori.id ";

	// 	$data = $this->db->query($sql);

	// 	return $data->result();
	// }

	public function select_by_id($id) {
		$sql = "SELECT tbl_klasifikasi.id AS id_klasifikasi, tbl_klasifikasi.nama_klasifikasi AS nama, tbl_klasifikasi.id_kategori AS id_kategori FROM tbl_klasifikasi, tbl_kategori WHERE tbl_klasifikasi.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_id_tipekamar($id) {
		$sql = "SELECT * FROM tbl_tipe_kamar WHERE tbl_tipe_kamar.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_id_tipehiburan($id) {
		$sql = "SELECT * FROM tbl_tipe_hiburan WHERE tbl_tipe_hiburan.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_id_jenisreklame($id) {
		$sql = "SELECT * FROM tbl_jenis_reklame WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_id_jenis($id) {
		$sql = "SELECT * FROM tbl_jenis WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_id_status_kepemilikan($id) {
		$sql = "SELECT * FROM tbl_status_kepemilikan WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
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