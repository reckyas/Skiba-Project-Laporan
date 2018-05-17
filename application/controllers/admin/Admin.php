<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('masuk')) {
			redirect('login');
		}
	}
	public function index()
	{ 
		$data['judul_halaman'] = "Dashboard";
		$this->load->view('template_admin/htmlopen');
		$this->load->view('template_admin/head',$data);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		// Start content
		$this->load->view('admin/dashboard', $data);
		// End content
		$this->load->view('template_admin/footer');
		$this->load->view('template_admin/contentclose');
		$this->load->view('template_admin/script.php');
		$this->load->view('template_admin/htmlclose');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/admin/Admin.php */