<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kessam extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}


	function getAllInspeksi($IdPuskesmas)
	{
		$data = $this->db->select('*')
						->from('tbkes_sam_master m')
						->join('tbkelurahan k', 'm.IdKelurahan = k.IdKelurahan')
						->join('tbkes_sam_kategori kat', 'm.IdKategoriSam = kat.IdKategoriSam')
						->join('tbpetugas p', 'm.IdPetugas = p.IdPetugas')
						->where('m.IdPuskesmas', $IdPuskesmas)
						->get();
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

	function autoNoInsSam()
	{
		$qry = $this->db->query("SELECT MAX(RIGHT(IdKesSam,4)) AS KodeAkhir FROM tbkes_sam_master");
		if ($qry->num_rows() > 0){
			$nextCode = $qry->row('KodeAkhir') + 1;
		}else{
			$nextcode = 1;
		}
		$kode = 'IS-'.date('Y').sprintf("%04s", $nextCode);
		return $kode;
	}

	function buatInepeksi($data)
	{
		$time = strtotime($data['BulanInspeksi']);

		$bulan = date('m', $time);
		$tahun = date('Y', $time);
		$cek = $this->db->select('IdKesSam')
						->from('tbkes_sam_master')
						->where('IdKelurahan', $data['IdKelurahan'])
						->where('PemilikSam', $data['PemilikSam'])
						->where('BulanKesSam', $bulan)
						->where('TahunKesSam', $tahun)
						->get();
		if ($cek->num_rows() > 0) {
			$result = array(
					'IdKesSam' => $cek->row('IdKesSam'),
					'pesan' => 'lama'
				);
			return $result;
		}else{
			$master = array(
				'IdKesSam' => $this->autoNoInsSam(),
				'TglKesSam' => date('Y-m-d'),
				'IdPuskesmas' => $this->session->userdata('IdPuskesmas'),
				'IdKelurahan' => $data['IdKelurahan'],
				'IdKategoriSam' => $data['KodeSarana'],
				'BulanKesSam' => $bulan,
				'TahunKesSam' => $tahun,
				'PemilikSam' => $data['PemilikSam'],
				'AlamatPemilik' => $data['AlamatPemilik'],
				'TglBuat' => date('Y-m-d'),
				'IdPetugas' => $this->session->userdata('IdPetugas')
			);
			$qMaster = $this->db->insert('tbkes_sam_master', $master);
			if ($qMaster){
				$result = array(
					'IdKesSam' => $master['IdKesSam'],
					'pesan' => 'baru'
				);
				return $result;
			}else{
				return false;
			}
		}
	}

	function getMasterInspeksi($IdKes)
	{
		$data = $this->db->select('m.IdKesSam, m.BulanKesSam, m.TahunKesSam, m.PemilikSam, m.AlamatPemilik, l.IdKelurahan, l.NamaKelurahan, p.NamaPetugas, k.IdKategoriSam, k.KategoriSam')
						 ->from('tbkes_sam_master m')
						 ->join('tbkelurahan l', 'm.IdKelurahan = l.IdKelurahan')
						 ->join('tbpetugas p', 'm.IdPetugas = p.NIPPetugas')
						 ->join('tbkes_sam_kategori k', 'm.IdKategoriSam = k.IdKategoriSam')
						 ->where('m.IdKesSam', $IdKes)
						 ->group_by('m.IdKesSam')
						 ->get();
		if ($data->num_rows() > 0){
			return $data->row();
		}else{
			return false;
		}
	}

	function insertDetilPenilaian($data)
	{
		$qDetPenilaian = $this->db->insert('tbkes_sam_detil_penilaian', $data);
			if ($qDetPenilaian){
				return $qDetPenilaian;
			}else{
				return false;
			}
	}

	function insertDetilKualitas($data)
	{
		$qDetKualitas = $this->db->insert('tbkes_sam_detil_kualitas', $data);
			if ($qDetKualitas){
				return $qDetKualitas;
			}else{
				return false;
			}
	}

	function simpanInspeksiSam($data, $id)
	{
		$qInspeksiSam = $this->db->where('IdKesSam' ,$id)
								 ->update('tbkes_sam_master' ,$data);
		return $qInspeksiSam;
	}

	function deleteInspeksi($id)
	{
		$kualitas = $this->db->where('IdKesSam', $id)->delete('tbkes_sam_detil_kualitas');
		$penilaian = $this->db->where('IdKesSam', $id)->delete('tbkes_sam_detil_penilaian');
		if ($kualitas && $penilaian){
			$master = $this->db->where('idKessam', $id)->delete('tbkes_sam_master');
			return $master;
		}else{
			return false;
		}
	}

	function getMasterModal($id)
	{
		$data = $this->db->select('m.*, k.NamaKelurahan, kat.KategoriSam, p.NamaPetugas')
						->from('tbkes_sam_master m')
						->join('tbkelurahan k', 'm.IdKelurahan = k.IdKelurahan')
						->join('tbkes_sam_kategori kat', 'm.IdKategoriSam = kat.IdKategoriSam')
						->join('tbpetugas p', 'm.IdPetugas = p.IdPetugas')
						->where('m.IdKesSam', $id)
						->get();
		if($data->num_rows() > 0){
			return $data->row();
		}else{
			return false;
		}
	}

	function getKualitasModal($id)
	{
		$data = $this->db->select('k.KualitasAir, dk.HasilPenilaian')
						->from('tbkes_sam_detil_kualitas dk')
						->join('tbkes_sam_kualitasair k', 'dk.IdKualitasAir = k.IdKualitasAir')
						->where('dk.IdKesSam', $id)
						->group_by('dk.IdDetilSamKualitas')
						->get();
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

	function getPenilaianModal($id)
	{
		$data = $this->db->select('k.PenilaianResikoSam, dk.HasilPenilaian')
						->from('tbkes_sam_detil_penilaian dk')
						->join('tbkes_sam_penilaian k', 'dk.IdPenilaian = k.IdPenilaian')
						->where('dk.IdKesSam', $id)
						->group_by('dk.IdDetilSamPenilaian')
						->get();
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

}

/* End of file m_kessam.php */
/* Location: ./application/models/m_kessam.php */