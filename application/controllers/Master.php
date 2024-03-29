<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_master');
	}

	public function kecamatan() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Kecamatan";
		$data['judul'] = "Data Kecamatan";

		$this->template->views('master/kecamatan/home', $data);
	}

	public function tampil_kecamatan() {
		$id_labusel = 1222;
		$data['dataKecamatan'] = $this->M_master->get_id_kecamatan('kecamatan', $id_labusel);
		$this->load->view('master/kecamatan/list_data', $data);
	}

	public function desa() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Desa";
		$data['judul'] = "Data Desa";

		$this->template->views('master/desa/home', $data);
	}

	public function tampil_desa() {
		$id_kecamatan = 12220;
		$data['dataDesa'] = $this->M_master->get_kec($id_kecamatan);
		$this->load->view('master/desa/list_data', $data);
	}

	public function kategori() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Kategori";
		$data['judul'] = "Data Kategori";

		$this->template->views('master/kategori/home', $data);
	}

	public function tampil_kategori() {
		$data['dataKategori'] = $this->M_master->get('tbl_kategori', "id ASC");
		$this->load->view('master/kategori/list_data', $data);
	}

	public function klasifikasi() {
		$data['userdata'] = $this->userdata;
		$data['dataKategori'] = $this->M_master->get_klasifikasi();

		$data['page'] = "Master";
		$data['subpage'] = "Klasifikasi";
		$data['judul'] = "Data Klasifikasi";
		$data['deskripsi'] = "Manage Data Klasifikasi";

		$data['modal_tambah_klasifikasi'] = show_my_modal('master/modals/modal_tambah_klasifikasi', 'tambah-klasifikasi', $data);

		$this->template->views('master/klasifikasi/home', $data);
	}

	public function tampilKlasifikasi() {
		$data['dataKlasifikasi'] = $this->M_master->get_klasifikasi();
		$this->load->view('master/klasifikasi/list_data', $data);
	}

	public function prosesTambahKlasifikasi() {
		$this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_klasifikasi';
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->insert($tbl, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Klasifikasi Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Klasifikasi Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function updateKlasifikasi() {
		$id = trim($_POST['id']);

		$data['dataKlasifikasi'] = $this->M_master->select_by_id($id);
		$data['dataKategori'] = $this->M_master->select_all_kategori();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('master/modals/modal_update_klasifikasi', 'update-klasifikasi', $data);
	}

	public function prosesUpdateKlasifikasi() {
		$this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_klasifikasi';
		$data = $this->input->post();
		$id = $this->input->post('id');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->update($tbl, $data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Klasifikasi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Klasifikasi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function deleteKlasifikasi() {
		$tbl = 'tbl_klasifikasi';
		$id = $_POST['id'];
		$result = $this->M_master->delete($tbl, $id);

		if ($result > 0) {
			echo show_succ_msg('Data Klasifikasi Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Klasifikasi Gagal dihapus', '20px');
		}
	}

	public function tipekamar() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Tipekamar";
		$data['judul'] = "Data Tipe Kamar";
		$data['deskripsi'] = "Manage Data Tipe Kamar";

		$data['modal_tambah_tipekamar'] = show_my_modal('master/modals/modal_tambah_tipekamar', 'tambah-tipekamar', $data);

		$this->template->views('master/tipe_kamar/home', $data);
	}

	public function tampilTipekamar() {
		$tbl = 'tbl_tipe_kamar';
		$orderby = 'id ASC';
		$data['dataTipekamar'] = $this->M_master->get($tbl, $orderby);
		$this->load->view('master/tipe_kamar/list_data', $data);
	}

	public function prosesTambahTipekamar() {
		$this->form_validation->set_rules('tipekamar', 'Tipe Kamar', 'trim|required');
		$this->form_validation->set_rules('jumlahunit', 'Jumlah Unit', 'trim|required');
		$this->form_validation->set_rules('tarif', 'Tarif Kamar', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_tipe_kamar';
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->insert($tbl, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Tipe Kamar Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Tipe Kamar Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function updateTipekamar() {

		$tbl = 'tbl_tipe_kamar';
		$id = trim($_POST['id']);

		$data['dataTipekamar'] = $this->M_master->get_id($tbl, $id);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('master/modals/modal_update_tipekamar', 'update-tipekamar', $data);
	}

	public function prosesUpdateTipekamar() {
		$this->form_validation->set_rules('tipekamar', 'Tipe Kamar', 'trim|required');
		$this->form_validation->set_rules('jumlahunit', 'Jumlah Unit', 'trim|required');
		$this->form_validation->set_rules('tarif', 'Tarif Kamar', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_tipe_kamar';
		$data = $this->input->post();
		$id = $this->input->post('id');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->update($tbl, $data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Tipe Kamar Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Tipe Kamar Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function deleteTipekamar() {
		$tbl = 'tbl_tipe_kamar';
		$id = $_POST['id'];
		$result = $this->M_master->delete($tbl, $id);

		if ($result > 0) {
			echo show_succ_msg('Data Tipe Kamar Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Tipe Kamar Gagal dihapus', '20px');
		}
	}

	public function tipehiburan() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Tipehiburan";
		$data['judul'] = "Data Tipe Hiburan";
		$data['deskripsi'] = "Manage Data Tipe Hiburan";

		$data['modal_tambah_tipehiburan'] = show_my_modal('master/modals/modal_tambah_tipehiburan', 'tambah-tipehiburan', $data);

		$this->template->views('master/tipe_hiburan/home', $data);
	}

	public function tampilTipehiburan() {
		$tbl = 'tbl_tipe_hiburan';
		$orderby = 'id ASC';
		$data['dataTipehiburan'] = $this->M_master->get($tbl, $orderby);
		$this->load->view('master/tipe_hiburan/list_data', $data);
	}

	public function prosesTambahTipehiburan() {
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'trim|required');
		$this->form_validation->set_rules('jumlahunit', 'Jumlah Unit', 'trim|required');
		$this->form_validation->set_rules('tarif', 'Tarif Kamar', 'trim|required');
		$this->form_validation->set_rules('occupancy', 'Occupancy', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_tipe_hiburan';
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->insert($tbl, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Tipe Hiburan Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Tipe Hiburan Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function updateTipehiburan() {
		$tbl = 'tbl_tipe_hiburan';
		$id = trim($_POST['id']);

		$data['dataTipehiburan'] = $this->M_master->get_id($tbl, $id);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('master/modals/modal_update_tipehiburan', 'update-tipehiburan', $data);
	}

	public function prosesUpdateTipehiburan() {
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'trim|required');
		$this->form_validation->set_rules('jumlahunit', 'Jumlah Unit', 'trim|required');
		$this->form_validation->set_rules('tarif', 'Tarif Kamar', 'trim|required');
		$this->form_validation->set_rules('occupancy', 'Occupancy', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_tipe_hiburan';
		$data = $this->input->post();
		$id = $this->input->post('id');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->update($tbl, $data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Tipe Hiburan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Tipe Hiburan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function deleteTipehiburan() {
		$tbl = 'tbl_tipe_hiburan';
		$id = $_POST['id'];
		$result = $this->M_master->delete($tbl, $id);

		if ($result > 0) {
			echo show_succ_msg('Data Tipe Hiburan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Tipe Hiburan Gagal dihapus', '20px');
		}
	}

	public function jenisreklame() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Jenisreklame";
		$data['judul'] = "Data Jenis Reklame";
		$data['deskripsi'] = "Manage Data Jenis Reklame";

		$data['modal_tambah_jenisreklame'] = show_my_modal('master/modals/modal_tambah_jenisreklame', 'tambah-jenisreklame', $data);

		$this->template->views('master/jenis_reklame/home', $data);
	}

	public function tampilJenisreklame() {
		$tbl = 'tbl_jenis_reklame';
		$orderby = 'id ASC';
		$data['dataJenisreklame'] = $this->M_master->get($tbl, $orderby);
		$this->load->view('master/jenis_reklame/list_data', $data);
	}

	public function prosesTambahJenisreklame() {
		$this->form_validation->set_rules('nama', 'Jenis Reklame', 'trim|required');
		$this->form_validation->set_rules('nilaijual', 'Nilai Jual', 'trim|required');
		$this->form_validation->set_rules('indeks_1', 'Indeks I', 'trim|required');
		$this->form_validation->set_rules('indeks_2', 'Indeks II', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_jenis_reklame';
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->insert($tbl, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jenis Reklame Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Jenis Reklame Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function updateJenisreklame() {
		$tbl = 'tbl_jenis_reklame';
		$id = trim($_POST['id']);

		$data['dataJenisreklame'] = $this->M_master->get_id($tbl, $id);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('master/modals/modal_update_jenisreklame', 'update-jenisreklame', $data);
	}

	public function prosesUpdateJenisreklame() {
		$this->form_validation->set_rules('nama', 'Jenis Reklame', 'trim|required');
		$this->form_validation->set_rules('nilaijual', 'Nilai Jual', 'trim|required');
		$this->form_validation->set_rules('indeks_1', 'Indeks I', 'trim|required');
		$this->form_validation->set_rules('indeks_2', 'Indeks II', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_jenis_reklame';
		$data = $this->input->post();
		$id = $this->input->post('id');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->update($tbl, $data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jenis Reklame Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Jenis Reklame Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function deleteJenisreklame() {
		$tbl = 'tbl_jenis_reklame';
		$id = $_POST['id'];
		$result = $this->M_master->delete($tbl, $id);

		if ($result > 0) {
			echo show_succ_msg('Data Jenis Reklame Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Jenis Reklame Gagal dihapus', '20px');
		}
	}

	public function jenis() {
		$data['userdata'] = $this->userdata;
		$data['dataKategori'] = $this->M_master->get('tbl_kategori', 'id ASC');

		$data['page'] = "Master";
		$data['subpage'] = "Jenis";
		$data['judul'] = "Data Jenis";
		$data['deskripsi'] = "Manage Data Jenis";

		$data['modal_tambah_jenis'] = show_my_modal('master/modals/modal_tambah_jenis', 'tambah-jenis', $data);

		$this->template->views('master/jenis/home', $data);
	}

	public function tampilJenis() {
		$tbl = 'tbl_jenis';
		$orderby = 'id ASC';
		$data['dataJenis'] = $this->M_master->get_jenis($tbl, $orderby);
		$this->load->view('master/jenis/list_data', $data);
	}

	public function prosesTambahJenis() {
		$this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_jenis';
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->insert($tbl, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jenis Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Jenis Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function updateJenis() {
		$tbl = 'tbl_jenis';
		$id = trim($_POST['id']);
		$data['dataJenis'] = $this->M_master->get_id($tbl, $id);
		$data['dataKategori'] = $this->M_master->get_data('tbl_kategori');
		$data['userdata'] = $this->userdata;

		echo show_my_modal('master/modals/modal_update_jenis', 'update-jenis', $data);
	}

	public function prosesUpdateJenis() {
		$this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_jenis';
		$data = $this->input->post();
		$id = $this->input->post('id');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->update($tbl, $data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jenis Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Jenis Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function deleteJenis() {
		$tbl = 'tbl_jenis';
		$id = $_POST['id'];
		$result = $this->M_master->delete($tbl, $id);

		if ($result > 0) {
			echo show_succ_msg('Data Jenis Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Jenis Gagal dihapus', '20px');
		}
	}

	public function statuskepemilikan() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Status Kepemilikan";
		$data['judul'] = "Data Status Kepemilikan";
		$data['deskripsi'] = "Manage Data Status Kepemilikan";

		$data['modal_tambah_status_kepemilikan'] = show_my_modal('master/modals/modal_tambah_status_kepemilikan', 'tambah-status-kepemilikan', $data);

		$this->template->views('master/status_kepemilikan/home', $data);
	}

	public function tampilStatuskepemilikan() {
		$tbl = 'tbl_status_kepemilikan';
		$orderby = 'id ASC';
		$data['dataStatuskepemilikan'] = $this->M_master->get($tbl, $orderby);
		$this->load->view('master/status_kepemilikan/list_data', $data);
	}

	public function prosesTambahStatuskepemilikan() {
		$this->form_validation->set_rules('nama_kepemilikan', 'Status Kepemilikan', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_status_kepemilikan';
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->insert($tbl, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Status Kepemilikan Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Status Kepemilikan Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function updateStatuskepemilikan() {
		$id = trim($_POST['id']);

		$data['dataStatuskepemilikan'] = $this->M_master->get_id('tbl_status_kepemilikan', $id);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('master/modals/modal_update_status_kepemilikan', 'update-status-kepemilikan', $data);
	}

	public function prosesUpdateStatuskepemilikan() {
		$this->form_validation->set_rules('nama_kepemilikan', 'Status Kepemilikan', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_status_kepemilikan';
		$data = $this->input->post();
		$id = $this->input->post('id');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->update($tbl, $data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Status Kepemilikan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Status Kepemilikan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function deleteStatuskepemilikan() {
		$id = $_POST['id'];
		$result = $this->M_master->delete('tbl_status_kepemilikan', $id);

		if ($result > 0) {
			echo show_succ_msg('Data Status Kepemilikan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Status Kepemilikan Gagal dihapus', '20px');
		}
	}

	public function statususaha() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Status Usaha";
		$data['judul'] = "Data Status Usaha";
		$data['deskripsi'] = "Manage Data Status Usaha";

		$data['modal_tambah_status_usaha'] = show_my_modal('master/modals/modal_tambah_status_usaha', 'tambah-status-usaha', $data);

		$this->template->views('master/status_usaha/home', $data);
	}

	public function tampilStatususaha() {
		$tbl = 'tbl_status_usaha';
		$orderby = 'id ASC';
		$data['dataStatususaha'] = $this->M_master->get($tbl, $orderby);
		$this->load->view('master/status_usaha/list_data', $data);
	}

	public function prosesTambahStatususaha() {
		$this->form_validation->set_rules('nama_usaha', 'Status Usaha', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_status_usaha';
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->insert($tbl, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Status Usaha Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Status Usaha Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function updateStatususaha() {
		$id = trim($_POST['id']);

		$data['dataStatususaha'] = $this->M_master->get_id('tbl_status_usaha', $id);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('master/modals/modal_update_status_usaha', 'update-status-usaha', $data);
	}

	public function prosesUpdateStatususaha() {
		$this->form_validation->set_rules('nama_usaha', 'Status Usaha', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_status_usaha';
		$data = $this->input->post();
		$id = $this->input->post('id');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->update($tbl, $data, $id);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Status Usaha Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Status usaha Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function deleteStatususaha() {
		$id = $_POST['id'];
		$result = $this->M_master->delete('tbl_status_usaha', $id);

		if ($result > 0) {
			echo show_succ_msg('Data Status Usaha Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Status usaha Gagal dihapus', '20px');
		}
	}

}
