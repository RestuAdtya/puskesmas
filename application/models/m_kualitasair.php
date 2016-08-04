<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kualitasair extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function getAll()
	{
		$data = $this->db->select('k.*, p.NamaPetugas')
						 ->from('tbkes_sam_kualitasair k')
						 ->join('tbpetugas p', 'k.IdPetugas = p.IdPetugas')
						 ->get();
		if ($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

	function getById($id)
	{
		$data = $this->db->select('*')
						 ->from('tbkes_sam_kualitasair pI')
						 ->where('pI.IdKualitasAir', $id)
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
		$cek = $this->db->select('KualitasAir')
						->from('tbkes_sam_kualitasair')
						->where('KualitasAir', $data['KualitasAir'])
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->insert('tbkes_sam_kualitasair', $data);
			return $result;
		}
	}

	function rubah($data, $Ip)
	{
		$cek = $this->db->select('KualitasAir')
						->from('tbkes_sam_kualitasair')
						->where('KualitasAir', $data['KualitasAir'])
						->where('IdKualitasAir !=', $Ip)
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->where('IdKualitasAir', $Ip)->update('tbkes_sam_kualitasair', $data);
			return $result;
		}
	}



	function hapus($id)
	{
		$qry = $this->db->where('IdKualitasAir', $id)->delete('tbkes_sam_kualitasair');
		return $qry;
	}

}

/* End of file m_kualitasair.php */
/* Location: ./application/models/m_kualitasair.php */