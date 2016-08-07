<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelurahan extends CI_Model {

	function getAll(){
		$data = $this->db->select('l.*, k.NamaKecamatan, p.NamaPetugas')
					 ->from('tbkelurahan l')
					 ->join('tbkecamatan k', 'l.IdKecamatan = k.IdKecamatan')
					 ->join('tbpetugas p', 'l.IdPetugas = p.IdPetugas')
					 ->group_by('l.IdKelurahan')
					 ->get();
		if ($data->num_rows() > 0) {
			return $data->result();
		}
		else
		{
			return false;
		}
	}

	function insert($post){
		$cek =  $this->db->select('NamaKelurahan')
					 ->from('tbkelurahan')
					 ->where('NamaKelurahan', $post['NamaKelurahan'])
					 ->get();

		if ($cek->num_rows() > 0) {
			return false;
		}else{
			$qry = $this->db->insert('tbkelurahan', $post);
			return $qry;
		}
	}

	function getCurrentData($id){
		$data =  $this->db->select('l.*, k.NamaKecamatan')
					 ->from('tbkelurahan l')
					 ->join('tbkecamatan k', 'l.IdKecamatan = k.IdKecamatan')
					 ->where('l.IdKelurahan', $id)
					 ->get();
		if($data->num_rows() > 0){
			return $data->row();
		}else{
			return false;
		}
	}

	function update($post,$id){
		$cek =  $this->db->select('NamaKelurahan')
					 ->from('tbkelurahan')
					 ->where('NamaKelurahan', $post['NamaKelurahan'])
					 ->get();

		if ($cek->num_rows() > 0) {
			return false;
		}else{
			$this->db->where('IdKelurahan', $id);
			$qry = $this->db->update('tbkelurahan', $post);
			return $qry;
		}
	}

	function delete($id){
		$this->db->where('IdKelurahan', $id);
		$qry = $this->db->delete('tbkelurahan');
		return $qry;
	}

	function desaByPuskesmas($id){
		$data = $this->db->select('l.NamaKelurahan, l.IdKelurahan')
						 ->from('tbkelurahan l')
						 ->join('tbpuskesmas p', 'l.IdKecamatan = p.IdKecamatan')
						 ->where('p.IdPuskesmas', $id)
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

/* End of file m_kelurahan.php */
/* Location: ./application/models/m_kelurahan.php */