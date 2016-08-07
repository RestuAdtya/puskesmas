<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kesttu extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function autoNoKesTtu()
	{
		$unikkode = 'ITU-'.date('Y');
		$qry = $this->db->query("SELECT MAX(RIGHT(IdKesTtu,4)) AS KodeAkhir FROM tbkes_ttu_master WHERE IdKesTtu like '$unikkode%'");
		if ($qry->num_rows() > 0){
			$nextCode = $qry->row('KodeAkhir') + 1;
		}else{
			$nextcode = 1;
		}
		$kode = $unikkode.sprintf("%04s", $nextCode);
		return $kode;
	}

	function simpanMasterRegister($data)
	{
		$simpan = $this->db->insert('tbkes_ttu_master', $data);
		return $simpan;
	}

	function simpanDetilParameter($data)
	{
		$qDetPenilaian = $this->db->insert('tbkes_ttu_detil', $data);
			if ($qDetPenilaian){
				return $qDetPenilaian;
			}else{
				return false;
			}
	}

	function getAllInspeksi($IdPuskesmas)
	{
		$qry = $this->db->select('*')
						->from('tbkes_ttu_master m')
						->join('tbkes_ttu_kategori k', 'm.IdKategoriTtu = k.IdKategoriTtu')
						->join('tbkelurahan l', 'm.IdKelurahan = l.IdKelurahan')
						->join('tbpetugas p', 'p.IdPetugas = m.IdPetugas')
						->where('m.IdPuskesmas', $IdPuskesmas)
						->get();
		if ($qry->num_rows() > 0){
			return $qry->result();
		}else{
			return false;
		}
	}

	function hapusRegister($id)
	{
		$detil = $this->db->where('IdKesTtu', $id)->delete('tbkes_ttu_detil');
		if ($detil){
			$qry = $this->db->where('IdKesTtu', $id)->delete('tbkes_ttu_master');
			if ($qry){
				return $qry;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

}

/* End of file m_kesttu.php */
/* Location: ./application/models/m_kesttu.php */