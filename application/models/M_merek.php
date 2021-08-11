<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_merek extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('merek');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM merek WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, merek.nama AS merek, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, merek, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_merek = merek.id AND pegawai.id_merek={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO merek VALUES('','" .$data['merek'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('merek', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE merek SET nama='" .$data['merek'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM merek WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('merek');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('merek');

		return $data->num_rows();
	}
}

/* End of file M_merek.php */
/* Location: ./application/models/M_merek.php */