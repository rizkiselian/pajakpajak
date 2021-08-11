<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_merek');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataMerek'] 	= $this->M_merek->select_all();

		$data['page'] 		= "merek";
		$data['judul'] 		= "Data Merek";
		$data['deskripsi'] 	= "Manage Data Merek";

		$data['modal_tambah_merek'] = show_my_modal('modals/modal_tambah_merek', 'tambah-merek', $data);

		$this->template->views('merek/home', $data);
	}

	public function tampil() {
		$data['dataMerek'] = $this->M_merek->select_all();
		$this->load->view('merek/list_data', $data);
	}

	public function prosesTambah() {
		
		$this->form_validation->set_rules('merek', 'Nama Merek Tidak Boleh Kosong', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_merek->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Merek Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Merek Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['datamerek'] 	= $this->M_merek->select_by_id($id);

		echo show_my_modal('modals/modal_update_merek', 'update-merek', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('merek', 'merek', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_merek->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data merek Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data merek Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_merek->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data merek Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data merek Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['merek'] = $this->M_merek->select_by_id($id);
		$data['jumlahmerek'] = $this->M_merek->total_rows();
		$data['datamerek'] = $this->M_merek->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_merek', 'detail-merek', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_merek->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama merek");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data merek.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data merek.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_merek->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_merek->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data merek Berhasil diimport ke database'));
						redirect('merek');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data merek Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('merek');
				}

			}
		}
	}
}

/* End of file merek.php */
/* Location: ./application/controllers/merek.php */