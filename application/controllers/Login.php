<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/MAdmin');
	}
	public function index()
	{
		$data['judul_halaman'] = "Login";
		$this->load->view('login',$data);
	}
	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cekUsername = $this->MAdmin->authUser($username);
		if ($cekUsername->num_rows() > 0) {
			$data = $cekUsername->row_array();
			if (password_verify($password,$data['password'])) {
				$this->session->set_userdata('masuk',true);
				$this->session->set_userdata('akses',$data['akses']);
				$this->session->set_userdata('ses_id',$data['username']);
				$this->session->set_userdata('ses_nama',$data['nama']);
				switch ($data['akses']) {
					case 1:
						$msg = ["pesan" => 1,"redirect" => 'administrator'];
						echo json_encode($msg);
						break;
					case 2:
						$msg = ["pesan" => 2,"redirect" => ''];
						echo json_encode($msg);
						break;
					default:
						# code...
						break;
				}
			} else {
				$msg = ["pesan" => "Username atau passwor salah"];
				echo json_encode($msg);
				die();
			}
		} else {
			$msg = ["pesan" => "Username atau passwor salah"];
			echo json_encode($msg);
			die();
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */