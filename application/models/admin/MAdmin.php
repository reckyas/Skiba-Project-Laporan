<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAdmin extends CI_Model {

	function getDatas($table)
	{
		return $this->db->get($table);
	}
	function getData($table,$field,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field, $where);
		return $this->db->get();
	}
	function getDataJoin($table,$join,$on,$type)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join, $on, $type);
		return $this->db->get();
	}
	function getDataJoinById($table,$join,$on,$type,$field,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join, $on, $type);
		$this->db->where($field, $where);
		return $this->db->get();
	}
	function input($table,$data)
	{
		$this->db->insert($table, $data);
		return true;
	}
	function update($table,$field,$where,$data)
	{
		$this->db->where($field, $where);
		$this->db->update($table, $data);
		return true;
	}
	function hapus($table,$field,$where)
	{
		$this->db->where($field, $where);
		$this->db->delete($table);
	}

	// Siswa
	function getSiswas()
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama,siswa_tl,siswa_jk,siswa_alamat,jurusan_kode,jurusan_nama,kelas_kode,kelas_nama');
		$this->db->from('tb_siswa');
		$this->db->join('tb_jurusan', 'tb_siswa.siswa_jurusan = tb_jurusan.jurusan_kode', 'left');
		$this->db->join('tb_kelas', 'tb_siswa.siswa_kelas = tb_kelas.kelas_kode', 'left');
		return $this->db->get();
	}
	// Guru
	function getGurus()
	{
		$this->db->select('guru_id,guru_nip,guru_nama,guru_tl,guru_alamat,guru_mapel,mapel_kode,mapel_nama,guru_jabatan,jabatan_kode,jabatan_nama');
		$this->db->from('tb_guru');
		$this->db->join('tb_mapel', 'tb_guru.guru_mapel = tb_mapel.mapel_kode', 'left');
		$this->db->join('tb_jabatan', 'tb_guru.guru_jabatan = tb_jabatan.jabatan_kode', 'left');
		return $this->db->get();
	}

}

/* End of file MAdmin.php */
/* Location: ./application/models/admin/MAdmin.php */