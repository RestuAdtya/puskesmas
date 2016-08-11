<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kesklinik extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function autoNoKlinik()
	{
		$unikkode = 'KS-'.date('Y');
		$qry = $this->db->query("SELECT MAX(RIGHT(NoIndeksKlien,4)) AS KodeAkhir FROM tbkes_klinik_klien WHERE NoIndeksKlien like '$unikkode%'");
		if ($qry->num_rows() > 0){
			$nextCode = $qry->row('KodeAkhir') + 1;
		}else{
			$nextcode = 1;
		}
		$kode = $unikkode.sprintf("%04s", $nextCode);
		return $kode;
	}

	function simpanRegister($data)
	{
		$master = array(
				'NoIndeksKlien' => $this->autoNoKlinik(),
				'TglBuat' => date('Y-m-d H:i:s'),
				'IdPetugas' => $this->session->userdata('IdPetugas')
			);
		$data = array_merge($data, $master);
		$cek = $this->db->select('master.NoIndeksKlien')
						->from('tbkes_klinik_klien master')
						->where('master.NamaKlien', $data['NamaKlien'])
						->where('master.NamaKK', $data['NamaKK'])
						->get();
		if ($cek->num_rows() > 0){
			return "sama";
		}else{
			$simpan = $this->db->insert('tbkes_klinik_klien', $data);
			return $simpan;
		}
	}

	function rubahRegistrasi($data, $id)
	{
		$cek = $this->db->select('master.NoIndeksKlien')
						->from('tbkes_klinik_klien master')
						->where('master.NamaKlien', $data['NamaKlien'])
						->where('master.NamaKK', $data['NamaKK'])
						->where('master.NoIndeksKlien !=', $id)
						->get();
		if ($cek->num_rows() > 0){
			return "sama";
		}else{
			$rubah = $this->db->where('NoIndeksKlien', $id)->update('tbkes_klinik_klien', $data);
			return $rubah;
		}
	}

	function getById($id)
	{
		$data = $this->db->select('master.*, kelurahan.NamaKelurahan, petugas.NamaPetugas')
						 ->from('tbkes_klinik_klien master')
						 ->join('tbkelurahan kelurahan', 'master.IdKelurahan = kelurahan.IdKelurahan')
						 ->join('tbpetugas petugas', 'master.IdPetugas = petugas.IdPetugas')
						 ->where('master.NoIndeksKlien', $id)
						 ->get();
		if ($data->num_rows() > 0)
		{
			return $data->row();
		}else{
			return false;
		}
	}

	function getAll()
	{
		$data = $this->db->select('master.*, kelurahan.NamaKelurahan, petugas.NamaPetugas')
						 ->from('tbkes_klinik_klien master')
						 ->join('tbkelurahan kelurahan', 'master.IdKelurahan = kelurahan.IdKelurahan')
						 ->join('tbpetugas petugas', 'master.IdPetugas = petugas.IdPetugas')
						 ->where('master.IdPuskesmas', $this->session->userdata('IdPuskesmas'))
						 ->get();
		if ($data->num_rows() > 0)
		{
			return $data->result();
		}else{
			return false;
		}
	}

	function getKlien()
	{
		$data = $this->db->select('master.NoIndeksKlien, master.NamaKlien, master.NamaKK')
						 ->from('tbkes_klinik_klien master')
						 ->where('master.IdPuskesmas', $this->session->userdata('IdPuskesmas'))
						 ->get();
		if ($data->num_rows() > 0)
		{
			return $data->result();
		}else{
			return false;
		}
	}

	function getKonselingByNIK($NIK)
	{
		$data = $this->db->select('master.*, petugas.NamaPetugas')
						 ->from('tbkes_klinik_konseling master')
						 ->join('tbpetugas petugas', 'master.IdPetugas = petugas.IdPetugas')
						 ->where('master.NoIndeksKlien', $NIK)
						 ->get();
		if ($data->num_rows() > 0)
		{
			return $data->result();
		}else{
			return false;
		}

	}

	function simpanKonseling($data)
	{
		$qry = $this->db->insert('tbkes_klinik_konseling', $data);
		if ($qry){
			return true;
		}else{
			return $this->db->_error_message();
		}
	}

	function hapusKonseling($id)
	{
		$qry = $this->db->where('IdKonselingKlinik', $id)->delete('tbkes_klinik_konseling');
		return $qry;
	}

	function getDetilKonseling($id)
	{
		$data = $this->db->select('master.*, petugas.NamaPetugas')
						 ->from('tbkes_klinik_konseling master')
						 ->join('tbpetugas petugas', 'master.IdPetugas = petugas.IdPetugas')
						 ->where('IdKonselingKlinik', $id)
						 ->get();
		return $data->row();
	}

}

/* End of file m_kesklinik.php */
/* Location: ./application/models/m_kesklinik.php */