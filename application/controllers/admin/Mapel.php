 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/MAdmin');
	}
	public function index()
	{
		$data['judul_halaman'] = "Data Mapel";
		$this->load->view('template_admin/htmlopen');
		$this->load->view('template_admin/head',$data);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		// Start content
		$this->load->view('admin/mapel');
		// End content
		$this->load->view('template_admin/footer');
		$this->load->view('template_admin/contentclose');
		$this->load->view('template_admin/script.php');
		$this->load->view('template_admin/htmlclose');
	}
	public function tablemapel()
	{
		$data['tb_mapel'] = $this->MAdmin->getDatas('tb_mapel')->result();
		return $this->load->view('components/tableMapel', $data);
	}
	public function tambah()
	{
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');
		$data = [
			"mapel_nama" => $nama,
			"mapel_kode" => $kode
		];
		$push = $this->MAdmin->input('tb_mapel',$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil disimpan"];
			echo json_encode($msg);
		}
	}
	public function editmapel()
	{
		$id = $this->input->post('id');
		$data['mapel'] = $this->MAdmin->getData('tb_mapel','mapel_id',$id)->row_array();
		return $this->load->view('components/editMapel', $data);
	}
	public function edit()
	{
		$id = $this->input->post('id');
		$nama  = $this->input->post('nama');
		$kode  = $this->input->post('kode');
		$data = [
			"mapel_nama" => $nama,
			"mapel_kode" => $kode
		];
		$push = $this->MAdmin->update('tb_mapel','mapel_id',$id,$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil perbarui"];
			echo json_encode($msg);
		}
	}
	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->MAdmin->hapus('tb_mapel','mapel_id',$id);
		$msg=["pesan"=>"Data berhasil dihapus"];
		echo json_encode($msg);	
	}
}

/* End of file jurusan.php */
/* Location: ./application/controllers/admin/jurusan.php */