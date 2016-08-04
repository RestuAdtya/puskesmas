<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_puskesmas extends CI_Model {

	
	function getAll(){
		$this->db->select('k.NamaKecamatan, p.*');
		$this->db->from('tbpuskesmas p');
		$this->db->join('tbkecamatan k', 'k.IdKecamatan = p.IdKecamatan');
		$this->db->group_by('p.IdPuskesmas');
		$data = $this->db->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}
		else
		{
			return false;
		}
	}

	function insert($post){
		$this->db->select('NamaPuskesmas')
			 ->from('tbpuskesmas')
			 ->where('NamaPuskesmas', $post['NamaPuskesmas']);
		$cek = $this->db->get();

		if ($cek->num_rows() > 0) {
			return false;
		}else{
			$qry = $this->db->insert('tbpuskesmas', $post);
			return $qry;
		}
	}

	function delete($id){
		$this->db->where('IdPuskesmas', $id);
		$qry = $this->db->delete('tbpuskesmas');
		return $qry;
	}

	function update($post,$id){
		$this->db->select('NamaPuskesmas')
			 ->from('tbpuskesmas')
			 ->where('NamaPuskesmas', $post['NamaPuskesmas'])
			 ->where('IdPuskesmas !=', $id);
		$cek = $this->db->get();

		if ($cek->num_rows() > 0) {
			return false;
		}else{
			$this->db->where('IdPuskesmas', $id);
			$qry = $this->db->update('tbpuskesmas', $post);
			return $qry;
		}
	}

	function getCurrentData($id){
		if ($id != ''){
			$IdPuskesmas = $id;
		}else{
			$IdPuskesmas = $this->session->userdata('IdPuskesmas');
		}
		
		$this->db->select('p.*, k.NamaKecamatan')
				 ->from('tbpuskesmas p')
				 ->join('tbkecamatan k', 'p.IdKecamatan = p.IdKecamatan')
				 ->where('p.IdPuskesmas',$IdPuskesmas);
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->row();
		}else{
			return false;
		}
	}

}

/* End of file m_puskesmas.php */
/* Location: ./application/models/m_puskesmas.php */