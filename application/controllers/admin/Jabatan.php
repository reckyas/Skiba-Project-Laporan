 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
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
		$data['judul_halaman'] = "Data Jabatan";
		$this->load->view('template_admin/htmlopen');
		$this->load->view('template_admin/head',$data);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		// Start content
		$this->load->view('admin/jabatan');
		// End content
		$this->load->view('template_admin/footer');
		$this->load->view('template_admin/contentclose');
		$this->load->view('template_admin/script.php');
		$this->load->view('template_admin/htmlclose');
	}
	public function tablejabatan()
	{
		$data['tb_jabatan'] = $this->MAdmin->getDatas('tb_jabatan')->result();
		return $this->load->view('components/tableJabatan', $data);
	}
	public function tambah()
	{
		$nama = $this->input->post('nama');
		$kode = trim(strtolower($nama));
		$kode = str_replace(' ', '_', $kode);
		$data = [
			"jabatan_nama" => $nama,
			"jabatan_kode" => $kode
		];
		$push = $this->MAdmin->input('tb_jabatan',$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil disimpan"];
			echo json_encode($msg);
		}
	}
	public function editjabatan()
	{
		$id = $this->input->post('id');
		$data['jabatan'] = $this->MAdmin->getData('tb_jabatan','jabatan_id',$id)->row_array();
		return $this->load->view('components/editJabatan', $data);
	}
	public function edit()
	{
		$id = $this->input->post('id');
		$nama  = $this->input->post('nama');
		$kode  = strtolower($nama);
		$data = [
			"jabatan_nama" => $nama,
			"jabatan_kode" => $kode
		];
		$push = $this->MAdmin->update('tb_jabatan','jabatan_id',$id,$data);
		if ($push==true) {
			$msg = ["pesan" => "Data berhasil perbarui"];
			echo json_encode($msg);
		}
	}
	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->MAdmin->hapus('tb_jabatan','jabatan_id',$id);
		$msg=["pesan"=>"Data berhasil dihapus"];
		echo json_encode($msg);	
	}
}

/* End of file jurusan.php */
/* Location: ./application/controllers/admin/jurusan.php */