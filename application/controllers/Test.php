<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MSkiba');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->database();
		$jumlah_data = $this->db->get('mahasiswa')->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/test/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 2;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['mahasiswa'] = $this->MSkiba->getMahasiswa($config['per_page'],$from)->result();

		$this->load->view('template_part/htmlopen',$data);
		$this->load->view('template_part/head',$data);
		$this->load->view('template_part/header',$data);
		$this->load->view('template_part/sidebar',$data);
		// Start content
		$this->load->view('pages/pagination', $data);
		// End content
		$this->load->view('template_part/footer',$data);
		$this->load->view('template_part/contentclose',$data);
		$this->load->view('template_part/script.php',$data);
		$this->load->view('template_part/htmlclose',$data);
	}
	public function pagination()
	{
		$this->load->database();
		$jumlah_data = $this->db->get('mahasiswa')->num_rows('mahasiswa');
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/test/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 2;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['mahasiswa'] = $this->MSkiba->getMahasiswa($config['per_page'],$from)->result();
		$this->load->view('template_part/htmlopen');
		$this->load->view('template_part/head');
		$this->load->view('template_part/header');
		$this->load->view('template_part/sidebar');
		// Start content
		$this->load->view('pages/pagination', $data);
		// End content
		$this->load->view('template_part/footer');
		$this->load->view('template_part/contentclose');
		$this->load->view('template_part/script.php');
		$this->load->view('template_part/htmlclose');
	}

}

/* End of file pagination.php */
/* Location: ./application/controllers/pagination.php */