<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function getPenilaianByKat($Id)
	{
		$data = $this->db->select('IdPenilaian, PenilaianResikoSam')
						 ->from('tbkes_sam_penilaian')
						 ->where('IdKategoriSam', $Id)
						 ->get();
		if ($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

	function getAll()
	{
		$data = $this->db->select('penilaian.*, petugas.NamaPetugas, kategori.KategoriSam')
						 ->from('tbkes_sam_penilaian penilaian')
						 ->join('tbpetugas petugas', 'penilaian.IdPetugas = petugas.IdPetugas')
						 ->join('tbkes_sam_kategori kategori', 'penilaian.IdKategoriSam = kategori.IdKategoriSam')
						 ->get();
		if ($data->num_rows() > 0)
		{
			return $data->result();
		}else{
			return false;
		}
	}

	function getById($id)
	{
		$data = $this->db->select('penilaian.*, kategori.KategoriSam')
						 ->from('tbkes_sam_penilaian penilaian')
						 ->join('tbkes_sam_kategori kategori', 'penilaian.IdKategoriSam = kategori.IdKategoriSam')
						 ->where('penilaian.IdPenilaian', $id)
						 ->get();
		if ($data->num_rows() > 0)
		{
			return $data->row();
		}else{
			return false;
		}
	}

	function simpan($data)
	{
		$cek = $this->db->select('PenilaianResikoSam')
						->from('tbkes_sam_penilaian')
						->where('IdKategoriSam', $data['IdKategoriSam'])
						->where('PenilaianResikoSam', $data['PenilaianResikoSam'])
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->insert('tbkes_sam_penilaian', $data);
			return $result;
		}
	}

	function rubah($data, $id)
	{
		$cek = $this->db->select('PenilaianResikoSam')
						->from('tbkes_sam_penilaian')
						->where('IdKategoriSam', $data['IdKategoriSam'])
						->where('PenilaianResikoSam', $data['PenilaianResikoSam'])
						->where('IdPenilaian !=', $id)
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->where('IdPenilaian', $id)->update('tbkes_sam_penilaian', $data);
			return $result;
		}
	}

	function hapus($id)
	{
		$qry = $this->db->where('IdPenilaian', $id)->delete('tbkes_sam_penilaian');
		return $qry;
	}

}

/* End of file m_penlianaian.php */
/* Location: ./application/models/m_penlianaian.php */