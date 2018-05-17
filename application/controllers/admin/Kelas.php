<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/MAdmin');
		if (!$this->session->userdata('masuk')) {
			redirect('login');
		}
	}
	public function index()
	{
		$data['tb_jurusan'] = $this->MAdmin->getDatas('tb_jurusan')->result(); 
		$data['judul_halaman'] = "Data Kelas";
		$this->load->view('template_admin/htmlopen');
		$this->load->view('template_admin/head',$data);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		// Start content
		$this->load->view('admin/kelas');
		// End content
		$this->load->view('template_admin/footer');
		$this->load->view('template_admin/contentclose');
		$this->load->view('template_admin/script.php');
		$this->load->view('template_admin/htmlclose');
	}
	public function datakelas()
	{
		$id = $this->input->post('id');
		$data = $this->MAdmin->getData('tb_kelas','kelas_id',$id)->result();
		echo json_encode($data);
	}
	public function tablekelas()
	{
		$data['tb_kelas'] = $this->MAdmin->getDataJoin('tb_kelas','tb_jurusan','tb_kelas.kelas_jurusan = tb_jurusan.jurusan_kode','inner')->result();
		return $this->load->view('components/tableKelas', $data);
	}
	public function tambah()
	{
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('kode_jurusan');
		$kode = trim(strtolower($nama));
		$kelas_kode = str_replace(' ', '', $kode);
		$data = [
			"kelas_nama" => $nama,
			"kelas_jurusan" => $jurusan,
			"kelas_kode" => $kelas_kode
		];
		$push = $this->MAdmin->input('tb_kelas',$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil disimpan"];
			echo json_encode($msg);
		}
	}
	public function editkelas()
	{
		$data['tb_jurusan'] = $this->MAdmin->getDatas('tb_jurusan')->result(); 
		$id = $this->input->post('id');
		$data['jurusan'] = $this->MAdmin->getDataJoinById('tb_kelas','tb_jurusan','tb_kelas.kelas_jurusan=tb_jurusan.jurusan_kode','inner','kelas_id',$id)->row_array();
		return $this->load->view('components/editKelas', $data);
	}
	public function edit()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('kode_jurusan');
		$data = [
			"kelas_nama" => $nama,
			"kelas_jurusan" => $jurusan
		];
		$push = $this->MAdmin->update('tb_kelas','kelas_id',$id,$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil perbarui"];
			echo json_encode($msg);
		}
	}
	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->MAdmin->hapus('tb_kelas','kelas_id',$id);
		$msg=["pesan"=>"Data berhasil dihapus"];
		echo json_encode($msg);	
	}
}

/* End of file Kelas.php */
/* Location: ./application/controllers/admin/Kelas.php */