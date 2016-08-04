<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stbm extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function autoNoStbm()
	{
		$unikkode = 'STBM-'.date('Y');
		$qry = $this->db->query("SELECT MAX(RIGHT(IdStbm,4)) AS KodeAkhir FROM tbstbm WHERE IdStbm like '$unikkode%'");
		if ($qry->num_rows() > 0){
			$nextCode = $qry->row('KodeAkhir') + 1;
		}else{
			$nextcode = 1;
		}
		$kode = $unikkode.sprintf("%04s", $nextCode);
		return $kode;
	}

	function getAll($IdPuskesmas)
	{
		$data = $this->db->select('*')
						->from('tbstbm m')
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

	function getById($IdStbm)
	{
		$data = $this->db->select('*')
						->from('tbstbm m')
						->join('tbkelurahan k', 'm.IdKelurahan = k.IdKelurahan')
						->where('m.IdStbm', $IdStbm)
						->get();
		if($data->num_rows() > 0){
			return $data->row();
		}else{
			return false;
		}
	}

	function simpanRegister($data)
	{
		$master = array(
				'IdStbm' => $this->autoNoStbm(),
				'TglBuat' => date('Y-m-d H:i:s')
			);
		$data = array_merge($data, $master);
		$simpan = $this->db->insert('tbstbm', $data);
		return $simpan;
	}

	function rubahRegister($data, $IdStbm)
	{
		
		$rubah = $this->db->where('IdStbm', $IdStbm)->update('tbstbm', $data);
		return $rubah;
	}

	function hapusRegister($IdStbm)
	{
		$hapus = $this->db->where('IdStbm', $IdStbm)->delete('tbstbm');
		return $hapus;
	}
	

}

/* End of file m_stbm.php */
/* Location: ./application/models/m_stbm.php */