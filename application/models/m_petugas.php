<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function check_login($nip, $password)
	{
		$this->db->select('u.*, p.NamaPuskesmas')
				->from('tbpetugas u')
				->join('tbpuskesmas p', 'u.IdPuskesmas = u.IdPuskesmas')
				->where('u.StatusPetugas', '1')
				->where('u.NIPPetugas', $nip)
				->where('u.PasswordPetugas', $password);
				
		$query = $this->db->get();
			return $query->row();
	}

	public function getAll()
	{
		$this->db->select('p.*, k.NamaPuskesmas')
			 ->from('tbpetugas p')
			 ->join('tbpuskesmas k', 'p.IdPuskesmas = k.IdPuskesmas')
			 ->group_by('p.NIPPetugas');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function cekPetugas($nip, $nama)
	{
		$cek = $this->db->select('NIPPetugas')
				 ->from('tbpetugas')
				 ->where('NIPPetugas', $nip)
				 ->get();
		if ($cek->num_rows() > 0){
			return "NIP";
		}else{
			$cek = $this->db->select('NamaPetugas')
				 ->from('tbpetugas')
				 ->where('NamaPetugas', $nama)
				 ->get();
			if ($cek->num_rows() > 0){
				return "Nama";
			}else{
				return true;
			}
		}
	}

	public function insert($post){
		$cek = $this->cekPetugas($post['NIPPetugas'], $post['NamaPetugas']);
		if ($cek === "NIP"){
			return "NIP";
		}else if ($cek === "Nama"){
			return "Nama";
		}else{

			$qry = $this->db->insert('tbpetugas', $post);
			return $qry;
		}
		
	}

	public function getCurrent($id)
	{
		$data =  $this->db->select('*')
				      ->from('tbpetugas')
				      ->where('NIPPetugas',$id)
					  ->get();
		if($data->num_rows() > 0){
			return $data->row();
		}else{
			return false;
		}
	}

	function delete($id){
		$this->db->where('NIPPetugas', $id);
		$qry = $this->db->delete('tbpetugas');
		return $qry;
	}

}

/* End of file m_petugas.php */
/* Location: ./application/models/m_petugas.php */