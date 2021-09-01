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

	//get
	function get_data($table_name, $order = null)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		if ($order != null) {
			$this->db->order_by($order);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function insert_data($table_name, $data)
	{
		$this->db->trans_start();
		$this->db->insert($table_name, $data);
		// $this->db->insert($this->table_log, $log);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	// /

	public function get_klasifikasi(){
		$this->db->select('klaskel.*, katkec.nama_kategori as nama_kat');
		$this->db->from('tbl_klasifikasi klaskel');
		$this->db->join('tbl_kategori katkec', 'katkec.id = klaskel.id_kategori', 'left');
		// $this->db->order_by('klaskel.id_kategori ASC');
		$this->db->order_by('klaskel.id DESC');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function get_tipe_kamar(){
		$query = $this->db->get('tbl_tipe_kamar');
		return $query->result_array();
	}

	public function get_tipe_hiburan(){
		$query = $this->db->get('tbl_tipe_hiburan');
		return $query->result_array();
	}

	public function get_jenis_reklame(){
		$this->db->order_by('id ASC');
		$query = $this->db->get('tbl_jenis_reklame');
		return $query->result_array();
	}

	public function get_jenis(){
		$this->db->order_by('id ASC');
		$query = $this->db->get('tbl_jenis');
		return $query->result_array();
	}

	public function get_kategori(){
		$query = $this->db->get('tbl_kategori');
		return $query->result_array();
	}

	public function select_all_kategori() {
		$sql = "SELECT * FROM tbl_kategori";

		$data = $this->db->query($sql);

		return $data->result();
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

	public function updateKlasifikasi($data) {
		$sql = "UPDATE tbl_klasifikasi SET nama_klasifikasi='" .$data['nama_klasifikasi'] ."', id_kategori='" .$data['id_kategori'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function updateTipekamar($data) {
		$sql = "UPDATE tbl_tipe_kamar SET tipekamar='" .$data['tipekamar'] ."', jumlahunit='" .$data['jumlahunit'] ."', tarif='" .$data['tarif'] ."', keterangan='" .$data['keterangan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function updateTipehiburan($data) {
		$sql = "UPDATE tbl_tipe_hiburan SET klasifikasi='" .$data['klasifikasi'] ."', jumlahunit='" .$data['jumlahunit'] ."', tarif='" .$data['tarif'] ."', occupancy='" .$data['occupancy'] ."', keterangan='" .$data['keterangan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function updateJenisreklame($data) {
		$sql = "UPDATE tbl_jenis_reklame SET nama='" .$data['nama'] ."', nilaijual='" .$data['nilaijual'] ."', indeks_1='" .$data['indeks_1'] ."', indeks_2='" .$data['indeks_2'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function updateJenis($data) {
		$sql = "UPDATE tbl_jenis SET nama_jenis='" .$data['nama_jenis'] ."', id_kategori='" .$data['id_kategori'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function deleteKlasifikasi($id) {
		$sql = "DELETE FROM tbl_klasifikasi WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function deleteTipekamar($id) {
		$sql = "DELETE FROM tbl_tipe_kamar WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function deleteTipehiburan($id) {
		$sql = "DELETE FROM tbl_tipe_hiburan WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function deleteJenisreklame($id) {
		$sql = "DELETE FROM tbl_jenis_reklame WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function deleteJenis($id) {
		$sql = "DELETE FROM tbl_jenis WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertKlasifikasi($data) {
		// $id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO tbl_klasifikasi VALUES('','" .$data['nama_klasifikasi'] ."', " .$data['id_kategori'] .",'')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertTipekamar($data) {
		// $id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO tbl_tipe_kamar VALUES('','" .$data['tipekamar'] ."','" .$data['jumlahunit'] ."','" .$data['tarif'] ."','" .$data['keterangan'] ."','','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertTipehiburan($data) {
		// $id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO tbl_tipe_hiburan VALUES('','" .$data['klasifikasi'] ."','" .$data['jumlahunit'] ."','" .$data['tarif'] ."','" .$data['occupancy'] ."','" .$data['keterangan'] ."','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertJenisreklame($data) {
		// $id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO tbl_jenis_reklame VALUES('','" .$data['nama'] ."','" .$data['nilaijual'] ."','" .$data['indeks_1'] ."','" .$data['indeks_2'] ."','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertJenis($data) {
		// $id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO tbl_jenis VALUES('','" .$data['nama_jenis'] ."','" .$data['id_kategori'] ."','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */