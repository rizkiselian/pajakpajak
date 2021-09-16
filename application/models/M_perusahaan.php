<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perusahaan extends CI_Model {

	public function get($tbl, $orderby){
		$query = $this->db->get($tbl);
		$this->db->order_by($orderby);
		return $query->result_array();
	}

	Function get_id($tbl, $id)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
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
}