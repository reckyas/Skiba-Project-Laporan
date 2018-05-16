<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/MAdmin');
	}
	public function index()
	{
		$data['judul_halaman'] = "Data Jurusan";
		$this->load->view('template_admin/htmlopen');
		$this->load->view('template_admin/head',$data);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		// Start content
		$this->load->view('admin/jurusan');
		// End content
		$this->load->view('template_admin/footer');
		$this->load->view('template_admin/contentclose');
		$this->load->view('template_admin/script.php');
		$this->load->view('template_admin/htmlclose');
	}
	public function tablejurusan()
	{
		$data['tb_jurusan'] = $this->MAdmin->getDatas('tb_jurusan')->result();
		return $this->load->view('components/tableJurusan', $data);
	}
	public function tambah()
	{
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');
		$keterangan = $this->input->post('keterangan');
		$data = [
			"jurusan_nama" => $nama,
			"jurusan_kode" => $kode,
			"jurusan_keterangan" => $keterangan
		];
		$push = $this->MAdmin->input('tb_jurusan',$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil disimpan"];
			echo json_encode($msg);
		}
	}
	public function editjurusan()
	{
		$id = $this->input->post('id');
		$data['jurusan'] = $this->MAdmin->getData('tb_jurusan','jurusan_id',$id)->row_array();
		return $this->load->view('components/editJurusan', $data);
	}
	public function edit()
	{
		$id = $this->input->post('id');
		$nama  = $this->input->post('nama');
		$kode  = $this->input->post('kode');
		$keterangan  = $this->input->post('keterangan');
		$data = [
			"jurusan_nama" => $nama,
			"jurusan_kode" => $kode,
			"jurusan_keterangan" => $keterangan
		];
		$push = $this->MAdmin->update('tb_jurusan','jurusan_id',$id,$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil perbarui"];
			echo json_encode($msg);
		}
	}
	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->MAdmin->hapus('tb_jurusan','jurusan_id',$id);
		$msg=["pesan"=>"Data berhasil dihapus"];
		echo json_encode($msg);	
	}
}

/* End of file jurusan.php */
/* Location: ./application/controllers/admin/jurusan.php */