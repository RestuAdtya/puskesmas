<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lbpl1 extends CI_Model {

	function tambahdesa($post){
		$master = array(
				'IdLbpl1' => $post['IdLbpl1'],
				'NIPPetugas' => $_SESSION['IdPetugas'],
				'IdPuskesmas' => $_SESSION['IdPuskesmas'],
			);
		$this->db->select('IdLbpl1')
				 ->from('tbmaster_lbpl1')
				 ->where('IdLbpl1',$post['IdLbpl1']);
		$data = $this->db->get();
		if($data->num_rows() < 1){
			$ins_master = $this->db->insert('tbmaster_lbpl1', $master);
		}
			
			$this->db->select('NamaDesa')
						 ->from('tbdetil_lbpl1')
						 ->where('NamaDesa', $post['NamaDesa'])
						 ->where('IdLbpl1', $post['IdLbpl1']);
					$cek = $this->db->get();

					if ($cek->num_rows() > 0) {
						return false;
					}else{
						$qry = $this->db->insert('tbdetil_lbpl1', $post);
						return $qry;
					}
	}

	function getkodeunik($idp){ 
		echo "<script>alert('$idp')</script>";
        $qry = $this->db->query("SELECT MAX(RIGHT(IdLbpl1,4)) AS idmax FROM tbmaster_lbpl1");
        $kd = " ";
        if($qry->num_rows()>0){
            foreach($qry->result() as $k){
                $sementara = ((int)$k->idmax) + 1;
                $kd = sprintf("%04d", $sementara); 
            }
        }else{ 
            $kd = "0001";
        }
        $kar = sprintf("%'.03d", $idp); 
        
        return $kar."".date("mY")."".$kd;
   } 

   function getDesaLbpl1($id){
		if ($id <> ''){
			$this->db->select('*')
					 ->from('tbdetil_lbpl1')
					 ->where('IdLbpl1',$id);
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->result();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function getMaster($id){
		if ($id <> ''){
			$this->db->select('l.*, p.NamaPuskesmas, u.NamaPetugas, k.NamaKecamatan')
					 ->from('tbmaster_lbpl1 l')
					 ->join('tbpuskesmas p', 'l.IdPuskesmas = p.IdPuskesmas')
					 ->join('tbkecamatan k', 'p.IdKecamatan = k.IdKecamatan')
					 ->join('tbpetugas u', 'l.NIPPetugas = u.NIPPetugas')
					 ->where('l.IdLbpl1', $id)
					 ->group_by('l.IdLbpl1');
			$data = $this->db->get();
			if($data->num_rows() > 0){
				return $data->row();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function deletedetil($id){
		$this->db->where('IdDetilLbpl1', $id);
		$qry = $this->db->delete('tbdetil_lbpl1');
		return $qry;
	}

	function batallaporan($id){
		$this->db->where('IdLbpl1', $id);
		$qry = $this->db->delete('tbmaster_lbpl1');
		return $qry;
	}

	function ceklaporan($id){
		$this->db->select('IdLbpl1')
				 ->from('tbmaster_lbpl1')
				 ->where('IdLbpl1', $id);
		$cek = $this->db->get();
		if ($cek->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function cekpembuatan(){
		$IdPuskesmas = $this->session->userdata('IdPuskesmas');
		$this->db->select('IdLbpl1')
				 ->from('tbmaster_lbpl1')
				 ->where('IdPuskesmas', $IdPuskesmas)
				 ->where('MONTH(TglLbpl1)', date('m'))
				 ->where('YEAR(TglLbpl1)', date('Y'));
		$cek = $this->db->get();
		if ($cek->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}

	function getList(){
		$IdPuskesmas = $this->session->userdata('IdPuskesmas');
		$this->db->select('l.*, p.NamaPuskesmas, u.NamaPetugas')
				 ->from('tbmaster_lbpl1 l')
				 ->join('tbpuskesmas p', 'l.IdPuskesmas = p.IdPuskesmas')
				 ->join('tbpetugas u', 'l.NIPPetugas = u.NIPPetugas')
				 ->where('p.IdPuskesmas', $IdPuskesmas)
				 ->group_by('l.IdLbpl1');
		$qry = $this->db->get();
		if($qry->num_rows() > 0){
				return $qry->result();
		}else{
				return false;
		}
	}
}

/* End of file m_lbpl1.php */
/* Location: ./application/models/m_lbpl1.php */