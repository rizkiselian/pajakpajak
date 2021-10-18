<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin_usaha extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_master');
	}

	public function index() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "data_wajib_pajak";
		$data['subpage'] = "Izin Usaha";
		$data['judul'] = "Data Izin Usaha";
		$data['deskripsi'] = "Manage Data Izin Usaha";

		$data['modal_tambah_izin_usaha'] = show_my_modal('modals/modal_tambah_izin_usaha', 'tambah-izin_usaha', $data);

		$this->template->views('izin_usaha/home', $data);
	}

	public function tampilIzin_usaha() {
		$data['dataIzin_usaha'] = $this->M_master->get_izin_usaha();
		$this->load->view('izin_usaha/list_data', $data);
	}

	public function prosesTambahPerusahaan() {
		$this->form_validation->set_rules('nama_usaha', 'Status Usaha', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_perusahaan';
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_perusahaan->insert($tbl, $data);

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

	public function detailPerusahaan() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataPerusahaan'] = $this->M_master->select_by_id($id);

		echo show_my_modal('modals/modal_detail_perusahaan', 'detail-perusahaan', $data, 'lg');
	}

	public function updatePerusahaan() {
		$id = trim($_POST['id']);

		$data['dataPerusahaan'] = $this->M_master->get_id('tbl_perusahaan', $id);
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_perusahaan', 'update-perusahaan', $data);
	}

	public function prosesUpdatePerusahaan() {
		$this->form_validation->set_rules('nama_usaha', 'Status Usaha', 'trim|required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$tbl = 'tbl_perusahaan';
		$data = $this->input->post();
		$id = $this->input->post('id');
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_perusahaan->update($tbl, $data, $id);

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

	public function deletePerusahaan() {
		$id = $_POST['id'];
		$result = $this->M_perusahaan->delete('tbl_perusahaan', $id);

		if ($result > 0) {
			echo show_succ_msg('Data Status Usaha Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Status usaha Gagal dihapus', '20px');
		}
	}

}
