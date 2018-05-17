<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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
		$data['tb_mapel'] = $this->MAdmin->getDatas('tb_mapel');
		$data['tb_jabatan'] = $this->MAdmin->getDatas('tb_jabatan');
		$data['judul_halaman'] = "Data Guru";
		$this->load->view('template_admin/htmlopen');
		$this->load->view('template_admin/head',$data);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		// Start content
		$this->load->view('admin/guru', $data);
		// End content
		$this->load->view('template_admin/footer');
		$this->load->view('template_admin/contentclose');
		$this->load->view('template_admin/script.php');
		$this->load->view('template_admin/htmlclose');
	}
	public function tableguru()
	{
		$data['tb_guru'] = $this->MAdmin->getGurus();
		return $this->load->view('components/tableGuru', $data);
	}
	public function guruedit()
	{
		$id = $this->input->post('id');
		$data['tb_mapel'] = $this->MAdmin->getDatas('tb_mapel');
		$data['tb_jabatan'] = $this->MAdmin->getDatas('tb_jabatan');
		$data['data'] = $this->MAdmin->getData('tb_guru','guru_id',$id)->row_array();
		return $this->load->view('components/editGuru', $data);
	}
	public function dataguru()
	{
		$id = $this->input->post('id');
		$data = $this->MAdmin->getData('tb_guru','guru_id',$id)->result();
		echo json_encode($data);
	}
	public function tambah()
	{
		// Mengambil data post
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$tl = $this->input->post('tl');
		$alamat = $this->input->post('alamat');
		$mapel = $this->input->post('mapel');
		$jabatan = $this->input->post('jabatan');
		// Memasukan data
		$data = [
			"guru_nip" => $nip,
			"guru_nama" => $nama,
			"guru_tl" => $tl,
			"guru_alamat" => $alamat,
			"guru_mapel" => $mapel,
			"guru_jabatan" => $jabatan
		];
		$push = $this->MAdmin->input('tb_guru',$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil disimpan"];
			echo json_encode($msg);
		}
	}
	public function edit()
	{
		// Mengambil data post
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$tl = $this->input->post('tl');
		$alamat = $this->input->post('alamat');
		$mapel = $this->input->post('mapel');
		$jabatan = $this->input->post('jabatan');
		// Memasukan data
		$data = [
			"guru_nip" => $nip,
			"guru_nama" => $nama,
			"guru_tl" => $tl,
			"guru_alamat" => $alamat,
			"guru_mapel" => $mapel,
			"guru_jabatan" => $jabatan
		];
		$update = $this->MAdmin->update('tb_guru','guru_id',$id,$data);
		if ($update==true) {
			$msg = ["pesan" => "Data berhasil disimpan"];
			echo json_encode($msg);
		}
	}
	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->MAdmin->hapus('tb_guru','guru_id',$id);
		$msg=["pesan"=>"Data berhasil dihapus"];
		echo json_encode($msg);	
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */