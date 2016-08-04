<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_parameterins extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function getAll()
	{
		$data = $this->db->select('pI.*, p.NamaPetugas')
						 ->from('tbkes_parameter_inspeksi pI')
						 ->join('tbpetugas p','pI.IdPetugas = p.IdPetugas')
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
						 ->from('tbkes_parameter_inspeksi pI')
						 ->where('pI.IdParameter', $id)
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
		$cek = $this->db->select('ParameterInspeksi')
						->from('tbkes_parameter_inspeksi')
						->where('ParameterInspeksi', $data['ParameterInspeksi'])
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->insert('tbkes_parameter_inspeksi', $data);
			return $result;
		}
	}

	function rubah($data, $Ip)
	{
		$cek = $this->db->select('ParameterInspeksi')
						->from('tbkes_parameter_inspeksi')
						->where('ParameterInspeksi', $data['ParameterInspeksi'])
						->where('IdParameter !=', $Ip)
						->get();
		if ($cek->num_rows() > 0){
			return 'sama';
		}else{
			$result = $this->db->where('IdParameter', $Ip)->update('tbkes_parameter_inspeksi', $data);
			return $result;
		}
	}



	function hapus($id)
	{
		$qry = $this->db->where('IdParameter', $id)->delete('tbkes_parameter_inspeksi');
		return $qry;
	}

}

/* End of file m_parameterins.php */
/* Location: ./application/models/m_parameterins.php */