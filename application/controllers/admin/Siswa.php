<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
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
		$data['tb_jurusan'] = $this->MAdmin->getDatas('tb_jurusan');
		$data['tb_kelas'] = $this->MAdmin->getDatas('tb_kelas');
		$data['data'] = $this->MAdmin->getSiswas();
		$data['judul_halaman'] = "Siswa";
		$this->load->view('template_admin/htmlopen');
		$this->load->view('template_admin/head',$data);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		// Start content
		$this->load->view('admin/siswa', $data);
		// End content
		$this->load->view('template_admin/footer');
		$this->load->view('template_admin/contentclose');
		$this->load->view('template_admin/script.php');
		$this->load->view('template_admin/htmlclose');
	}
	public function siswa()
	{
		$data['tb_kelas'] = $this->MAdmin->getDatas('tb_kelas');
		$data['data'] = $this->MAdmin->getSiswas();
		return $this->load->view('admin/siswa', $data);
	}
	public function tablesiswa()
	{
		$data['tb_jurusan'] = $this->MAdmin->getDatas('tb_jurusan');
		$data['tb_kelas'] = $this->MAdmin->getDatas('tb_kelas');
		$data['data'] = $this->MAdmin->getSiswas();
		return $this->load->view('components/tableSiswa', $data);
	}
	public function tambah()
	{
		// Mengambil data post
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$tl = $this->input->post('tl');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');
		// Memasukan data
		$data = [
			"siswa_nis" => $nis,
			"siswa_nama" => $nama,
			"siswa_tl" => $tl,
			"siswa_jk" => $jk,
			"siswa_alamat" => $alamat,
			"siswa_jurusan" => $jurusan,
			"siswa_kelas" => $kelas
		];
		$push = $this->MAdmin->input('tb_siswa',$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil disimpan"];
			echo json_encode($msg);
		}
	}
	public function editsiswa()
	{
		$id = $this->input->post('id');
		$data['tb_jurusan'] = $this->MAdmin->getDatas('tb_jurusan');
		$data['tb_kelas'] = $this->MAdmin->getDatas('tb_kelas');
		$data['data'] = $this->MAdmin->getData('tb_siswa','siswa_id',$id)->row_array();
		return $this->load->view('components/editSiswa', $data);
	}
	public function edit()
	{
		// Mengambil data post
		$where = $this->input->post('id');
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$tl = $this->input->post('tl');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');
		// Memasukan data
		$data = [
			"siswa_nis" => $nis,
			"siswa_nama" => $nama,
			"siswa_tl" => $tl,
			"siswa_jk" => $jk,
			"siswa_alamat" => $alamat,
			"siswa_jurusan" => $jurusan,
			"siswa_kelas" => $kelas
		];
		$update = $this->MAdmin->update('tb_siswa','siswa_id',$where,$data);
		if ($update==true) {
			$msg = ["pesan" => "Data berhasil update"];
			echo json_encode($msg);
		}
	}
	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->MAdmin->hapus('tb_siswa','siswa_id',$id);
		$msg=["pesan"=>"Data berhasil dihapus"];
		echo json_encode($msg);	
	}
}

/* End of file Siswa.php */
/* Location: ./application/controllers/admin/Siswa.php */