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

}

/* End of file m_penlianaian.php */
/* Location: ./application/models/m_penlianaian.php */