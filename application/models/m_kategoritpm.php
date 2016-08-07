<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategoritpm extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function getAll()
	{
		$data = $this->db->select('kategori.*, petugas.NamaPetugas')
						 ->from('tbkes_tpm_kategori kategori')
						 ->join('tbpetugas petugas', 'kategori.IdPetugas = petugas.IdPetugas')
						 ->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}
		else
		{
			return false;
		}
	}

	function getById($id)
	{
		$data = $this->db->select('*')
						 ->from('tbkes_tpm_kategori')
						 ->where('IdKategoriTpm', $id)
						 ->get();
		if ($data->num_rows() > 0) {
			return $data->row();
		}
		else
		{
			return false;
		}
	}

	function simpan($data)
	{
		$cek = $this->db->select('KategoriTpm')
						->from('tbkes_tpm_kategori')
						->where('KategoriTpm', $data['KategoriTpm'])
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->insert('tbkes_tpm_kategori', $data);
			return $result;
		}
	}

	function rubah($data, $id)
	{
		$cek = $this->db->select('KategoriTpm')
						->from('tbkes_tpm_kategori')
						->where('KategoriTpm', $data['KategoriTpm'])
						->where('IdKategoriTpm !=', $id)
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->where('IdKategoriTpm', $id)->update('tbkes_tpm_kategori', $data);
			return $result;
		}
	}



	function hapus($id)
	{
		$qry = $this->db->where('IdKategoriTpm', $id)->delete('tbkes_tpm_kategori');
		return $qry;
	}

}

/* End of file m_kategoritpm.php */
/* Location: ./application/models/m_kategoritpm.php */