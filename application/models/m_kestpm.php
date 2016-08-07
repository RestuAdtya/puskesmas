<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kestpm extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function autoNoKesTpm()
	{
		$unikkode = 'ITM-'.date('Y');
		$qry = $this->db->query("SELECT MAX(RIGHT(IdKesTpm,4)) AS KodeAkhir FROM tbkes_tpm_master WHERE IdKesTpm like '$unikkode%'");
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
		$cek = $this->db->select('IdKesTpm')
						 ->from('tbkes_tpm_master')
						 ->where('Month(TglKesTpm)', date("m", strtotime($data['TglKesTpm'])))
						 ->where('IdPuskesmas', $data['IdPuskesmas'])
						 ->where('IdKelurahan', $data['IdKelurahan'])
						 ->where('IdKategoriTpm', $data['IdKategoriTpm'])
						 ->where('NamaTpm', $data['NamaTpm'])
						 ->get();
		if ($cek->num_rows() > 0) {
			return "ada";
		}
		else
		{
			$simpan = $this->db->insert('tbkes_tpm_master', $data);
			return $simpan;
		}
	}

	function simpanDetilParameter($data)
	{
		$qDetParameter = $this->db->insert('tbkes_tpm_detil', $data);
			if ($qDetParameter){
				return $qDetParameter;
			}else{
				return false;
			}
	}

	function getMaster($id)
	{
		$data = $this->db->select('master.*, kelurahan.NamaKelurahan, kategori.KategoriTpm')
						 ->from('tbkes_tpm_master master')
						 ->join('tbkelurahan kelurahan', 'master.IdKelurahan = kelurahan.IdKelurahan')
						 ->join('tbkes_tpm_kategori kategori', 'master.IdKategoriTpm = kategori.IdKategoriTpm')
						 ->where('master.IdKesTpm', $id)
						 ->get();
		return $data->row();
	}

	function getDetil($id)
	{
		$data = $this->db->select('detil.*, parameter.ParameterInspeksi')
						 ->from('tbkes_tpm_detil detil')
						 ->join('tbkes_parameter_inspeksi parameter', 'detil.IdParameter = parameter.IdParameter')
						 ->where('detil.IdKesTpm', $id)
						 ->get();
		return $data->result();
	}

	function rubahMasterRegister($data, $id)
	{
		$cek = $this->db->select('IdKesTpm')
						 ->from('tbkes_tpm_master')
						 ->where('Month(TglKesTpm)', date("m", strtotime($data['TglKesTpm'])))
						 ->where('IdPuskesmas', $data['IdPuskesmas'])
						 ->where('IdKelurahan', $data['IdKelurahan'])
						 ->where('IdKategoriTpm', $data['IdKategoriTpm'])
						 ->where('NamaTpm', $data['NamaTpm'])
						 ->where('IdKesTpm', $id)
						 ->get();
		if ($cek->num_rows() > 0) {
			return "ada";
		}
		else
		{
			$rubah = $this->db->where('IdKesTpm', $id)->update('tbkes_tpm_master', $data);
			return $rubah;
		}
	}

	function rubahDetilParameter($data)
	{
		$qDetParameter = $this->db->set('NilaiParameter', $data['NilaiParameter'])
								  ->where('IdKesTpm', $data['IdKesTpm'])
								  ->where('IdParameter', $data['IdParameter'])
								  ->update('tbkes_tpm_detil');
		if ($qDetParameter){
			return $qDetParameter;
		}else{
			return false;
		}
	}

	function getAllInspeksi($IdPuskesmas)
	{
		$qry = $this->db->select('m.*, k.KategoriTpm, l.NamaKelurahan, p.NamaPetugas')
						->from('tbkes_tpm_master m')
						->join('tbkes_tpm_kategori k', 'm.IdKategoriTpm = k.IdKategoriTpm')
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
		$detil = $this->db->where('IdKesTpm', $id)->delete('tbkes_tpm_detil');
		if ($detil){
			$qry = $this->db->where('IdKesTpm', $id)->delete('tbkes_tpm_master');
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

/* End of file m_kestpm.php */
/* Location: ./application/models/m_kestpm.php */