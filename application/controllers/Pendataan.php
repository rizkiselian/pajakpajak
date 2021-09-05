<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendataan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pendataan');
	}

	public function hotel() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Pendataan";
		$data['subpage'] = "Pendataan Hotel";
		$data['judul'] = "Pendataan Pajak Hotel";

		$this->template->views('pendataan/hotel/home', $data);
	}

	public function tampil_hotel() {
		$data['dataHotel'] = $this->M_pendataan->get_dataobjekpajakhotel();
		$this->load->view('pendataan/hotel/list_data', $data);
	}

	public function detail_hotel($npwpd) {
		$data['userdata'] = $this->userdata;
		$data['dataHotel'] = $this->M_pendataan->get_detailpajakhotel($npwpd);

		$data['page'] = "Pendataan";
		$data['subpage'] = "Pendataan Hotel";
		$data['judul'] = "Detail Pendataan Pajak Hotel";

		$this->template->views('pendataan/hotel/detail', $data);
	}

	public function tampil_detail_hotel($npwpd) {
		$data['tipe_jumlah_tarif_hotel'] = $this->M_pendataan->get_tipejumlahtarifhotel($npwpd);

		$this->load->view('pendataan/hotel/list_data_tipe_kamar', $data);
	}

}
