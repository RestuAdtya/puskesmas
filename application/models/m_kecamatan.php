<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kecamatan extends CI_Model {

	function getAll(){
		$data = $this->db->get('tbkecamatan');
		if ($data->num_rows() > 0) {
			return $data->result();
		}
		else
		{
			return false;
		}
	}

	function getCurrentData($id){
		if ($id != ''){
			$IdKecamatan = $id;
		}else{
			$IdKecamatan = $this->session->userdata('IdPuskesmas');
		}
		
		$this->db->select('*')
				 ->from('tbkecamatan')
				 ->where('IdKecamatan',$IdKecamatan);
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->row();
		}else{
			return false;
		}
	}

	function insert($post){
		$this->db->select('NamaKecamatan')
			 ->from('tbkecamatan')
			 ->where('NamaKecamatan', $post['NamaKecamatan']);
		$cek = $this->db->get();

		if ($cek->num_rows() > 0) {
			return false;
		}else{
			$qry = $this->db->insert('tbkecamatan', $post);
			return $qry;
		}
	}

	function update($post,$id){
		$this->db->select('NamaKecamatan')
			 ->from('tbkecamatan')
			 ->where('NamaKecamatan', $post['NamaKecamatan'])
			 ->where('IdKecamatan !=', $id);
		$cek = $this->db->get();

		if ($cek->num_rows() > 0) {
			return false;
		}else{
			$this->db->where('IdKecamatan', $id);
			$qry = $this->db->update('tbkecamatan', $post);
			return $qry;
		}
	}

	function delete($id){
		$this->db->where('IdKecamatan', $id);
		$qry = $this->db->delete('tbkecamatan');
		return $qry;
	}


}

/* End of file m_kecamatan.php */
/* Location: ./application/models/m_kecamatan.php */