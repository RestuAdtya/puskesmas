<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kesrumah extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function getAllInspeksi($IdPuskesmas)
	{
		$data = $this->db->select('*')
						->from('tbkes_rumah_master m')
						->join('tbkelurahan k', 'm.IdKelurahan = k.IdKelurahan')
						->join('tbpetugas p', 'm.IdPetugas = p.IdPetugas')
						->where('m.IdPuskesmas', $IdPuskesmas)
						->get();
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

	function cekInspeksi($data)
	{
		$time = strtotime($data['BulanInspeksi']);

		$bulan = date('m', $time);
		$tahun = date('Y', $time);
		$cek = $this->db->select('IdKesRumah')
						->from('tbkes_rumah_master')
						->where('IdKelurahan', $data['kecamatan'])
						->where('BulanKesRumah', $bulan)
						->where('TahunKesRumah', $tahun)
						->get();
		if ($cek->num_rows() > 0){
			$result = array(
					'IdKesRumah' => $cek->row('IdKesRumah'),
					'pesan' => 'lama'
				);
			return $result;
		}else{
			$master = array(
				'IdKesRumah' => $this->autoNoInsRumah(),
				'TglKesRumah' => date('Y-m-d'),
				'BulanKesRumah' => $bulan,
				'TahunKesRumah' => $tahun,
				'IdPuskesmas' => $this->session->userdata('IdPuskesmas'),
				'IdKelurahan' => $data['kecamatan'],
				'IdPetugas' => $this->session->userdata('IdPetugas'),
				'TglBuat' => date('Y-m-d')
				);
			$resMaster = $this->insertMasIns($master);
			if ($resMaster){
				$result = array(
					'IdKesRumah' => $master['IdKesRumah'],
					'pesan' => 'baru'
				);
				return $result;
			}else{
				return false;
			}
		}
	}

	function insertMasIns($data)
	{
		$qry = $this->db->insert('tbkes_rumah_master', $data);
		return $qry;
	}

	function autoNoInsRumah()
	{
		$qry = $this->db->query("SELECT MAX(RIGHT(IdKesRumah,4)) AS KodeAkhir FROM tbkes_rumah_master");
		if ($qry->num_rows() > 0){
			$nextCode = $qry->row('KodeAkhir') + 1;
		}else{
			$nextcode = 1;
		}
		$kode = 'IR-'.date('Y').sprintf("%04s", $nextCode);
		return $kode;
	}

	function getDetilInspeksi($IdKes)
	{
		$data = $this->db->select('*')
						 ->from('tbkes_rumah_detil')
						 ->where('IdKesRumah', $IdKes)
						 ->get();
		if ($data->num_rows() > 0 ){
			return $data->result();
		}else{
			return false;
		}
	}

	function getMasterInspeksi($IdKes)
	{
		$data = $this->db->select('m.IdKesRumah, m.BulanKesRumah, m.TahunKesRumah, k.NamaKelurahan, k.IdKelurahan, p.IdPetugas, p.NamaPetugas')
						 ->from('tbkes_rumah_master m')
						 ->join('tbkelurahan k', 'm.IdKelurahan = k.IdKelurahan')
						 ->join('tbpetugas p', 'm.IdPetugas = p.IdPetugas')
						 ->where('m.IdKesRumah', $IdKes)
						 ->group_by('m.IdKesRumah')
						 ->get();
		if ($data->num_rows() > 0){
			return $data->row();
		}else{
			return false;
		}
	}

	function getDetilRumah($IdDetil)
	{
		$data = $this->db->select('*')
						 ->from('tbkes_rumah_detil')
						 ->where('IdDetilKesRumah', $IdDetil)
						 ->get();
		if ($data->num_rows() > 0 ){
			return $data->row();
		}else{
			return false;
		}
	}

	function insertDetilIns($post)
	{
		$cek = $this->db->select('KepalaKeluarga')
						->from('tbkes_rumah_detil')
						->where('KepalaKeluarga', $post['KepalaKeluarga'])
						->where('IdKesRumah', $post['IdKesRumah'])
						->get();
		if ($cek->num_rows() >0){
			return 99;
		}else{
			$qry = $this->db->insert('tbkes_rumah_detil', $post);
			return $qry;
		}
		
	}

	function rubahDetilIns($post, $id)
	{
		$cek = $this->db->select('KepalaKeluarga')
						->from('tbkes_rumah_detil')
						->where('KepalaKeluarga', $post['KepalaKeluarga'])
						->where('IdDetilKesRumah !=', $id)
						->where('IdKesRumah', $post['IdKesRumah'])
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->where('IdDetilKesRumah', $id)
							->update('tbkes_rumah_detil', $post);
			return $result;
		}
	}

	function hapusDetilRumah($id)
	{
		$qry = $this->db->where('IdDetilKesRumah', $id)->delete('tbkes_rumah_detil');
		return $qry;
	}

	function simpanInspeksi($id)
	{

	}

	function batalInspeksi($id)
	{
		$detil = $this->db->where('IdKesRumah', $id)->delete('tbkes_rumah_detil');
		if ($detil){
			$master = $this->db->where('idKesRumah', $id)->delete('tbkes_rumah_master');
			return $master;
		}else{
			return false;
		}
	}

}

/* End of file m_kesrumah.php */
/* Location: ./application/models/m_kesrumah.php */