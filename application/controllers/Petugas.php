<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		
		$this->load->model('m_petugas');
	}

	public function index()
	{
		$data = array(
 
		    'title' => 'Data Petugas',
		    'dPetugas' => $this->m_petugas->getAll(),
		);
		$this->template->load('default', 'page/petugas/index', $data);
	}

	public function getpost()
	{
		$config = array(
        		'upload_path' => './images/petugas/',
        		'allowed_types' => 'gif|jpg|png|jpeg',
        		'max_size'		=> 2000,
        		'file_name'		=> 'p_'.$this->input->post('NIPPetugas')
        	);
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('FotoPetugas')) {
            $this->alert->set('bg-warning', $this->upload->display_errors());
			echo "<script>history.go(-1);</script>";
			return false;
        }

		$post = array(
				'NIPPetugas' => $this->input->post('NIPPetugas'),
				'NamaPetugas' => ucfirst($this->input->post('NamaPetugas')),
				'NoTelpPetugas' => $this->input->post('NoTelpPetugas'),
				'PasswordPetugas' => MD5($this->input->post('NIPPetugas')),
				'LevelPetugas' => 'Petugas',
				'IdPuskesmas' => $this->session->userdata('IdPuskesmas'),
				'FotoPetugas' => $this->upload->data('file_name'),
				'TglBuat' => date('Y-m-d'),
				'IdUser' => $this->session->userdata('IdPetugas')
			);
		return $post;
	}

	public function tambah()
	{
		if ($this->input->post('save')){
			  $post = $this->getpost();
			  $res = $this->m_petugas->insert($post);
			if ($res === "NIP"){
				$this->alert->set('bg-warning', 'NIP Petugas yang Anda Masukan Sudah Terdaftar !');
			}else if ($res === "Nama"){
				$this->alert->set('bg-warning', 'Nama Petugas yang Anda Masukan Sudah Terdaftar !');
			}else{
				$this->alert->set('bg-success', 'Data Petugas berhasil disimpan!');
				redirect(base_url('petugas'));
			}
			unlink('./images/petugas/'.$post['FotoPetugas']);
			echo "<script>history.go(-1);</script>";
		}else{
			$data = array(
				    'title' => 'Tambah Data Petugas',
				    'aksi' => 'insert'
				);
				$this->template->load('default', 'page/petugas/form', $data);
		}
	}

	public function hapus(){
		$id = $this->input->post('id');
		$petugas = $this->m_petugas->getCurrent($id);
		$foto = $petugas->FotoPetugas;
		$qry = $this->m_petugas->delete($id);
		if ($qry) {
			unlink('./images/petugas/'.$foto);
			$data = array(
					'pesan' => 'Data Petugas Berhasil Di Hapus',
					'aksi' => 'setTimeout("location.reload(true);",2000)'
              	);

			echo json_encode($data);
		}		
	}

}

/* End of file Petugas.php */
/* Location: ./application/controllers/Petugas.php */