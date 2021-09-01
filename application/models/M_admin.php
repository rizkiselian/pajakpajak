<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function updateuser($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("tbl_user", $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE tbl_user SET nama_lengkap='" .$data['nama_lengkap'] ."', username='" .$data['username'] ."' WHERE id='" .$data['id'] ."'";

		// $this->db->where("id", $id);
		// $this->db->update("tbl_user", $data);
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('tbl_user');

		return $data->row();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */