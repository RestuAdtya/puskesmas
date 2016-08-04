<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategorittu extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function getAll()
	{
		$data = $this->db->select('*')
						 ->from('tbkes_ttu_kategori')
						 ->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}
		else
		{
			return false;
		}
	}
	

}

/* End of file m_kategorittu.php */
/* Location: ./application/models/m_kategorittu.php */