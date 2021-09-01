<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}
	
	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('login');
		} else {
			redirect('Home');
		}
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('min_length', '%s minimal 4 karakter');
		$this->form_validation->set_message('max_length', '%s maksimal 50 karakter');

		if ($this->form_validation->run() == TRUE) {
			$post = $this->input->post(null, TRUE);
			// $username = trim($_POST['username']);
			// $password = trim($_POST['password']);
			$username = htmlspecialchars($post['username']);
			$password = htmlspecialchars($post['password']);
			// $data = $this->M_auth->login($username, $password);
			$data = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
			// var_dump($data);
			// die();
			if ($data) {
				if (password_verify($password, $data['password'])) {
					$session = [
						'userdata' => $data,
						'status' => "Loged in"
					];
					$this->session->set_userdata($session);
					redirect('home');
				} else {
					$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
					redirect('Auth');
				}
			}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
		
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */