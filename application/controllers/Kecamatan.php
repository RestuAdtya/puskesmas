<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kecamatan');
	}

	public function index()
	{
		$data = array(
 
		    'title' => 'Data Kecamatan',
		    'dKecamatan' => $this->m_kecamatan->getAll(),
		);
		$this->template->load('default', 'page/kecamatan/index', $data);

	}

	public function getpost()
	{
		$post = array(
				'NamaKecamatan' => $this->input->post('NamaKecamatan'),
				'TglBuat' => date('Y-m-d'),
				'IdUser' => $this->session->userdata('IdPetugas')
			);
		return $post;
	}

	public function tambah()
	{
		if ($this->input->post('save')){
			$res = $this->m_kecamatan->insert($this->getpost());
			echo $res;
			if ($res == 1){
				$this->alert->set('bg-success', 'Data Kecamatan berhasil disimpan!');
				redirect(base_url('kecamatan'));
			}
				$this->alert->set('bg-warning', 'Nama Kecamatan yang Anda Masukan Sudah Terdaftar !');
				echo "<script>history.go(-1);</script>";
		}else{
			$data = array(
				    'title' => 'Tambah Data Kecamatan',
				    'aksi' => 'insert'
				);
				$this->template->load('default', 'page/kecamatan/form', $data);
		}
	}

	public function rubah()
	{
		$dt = $this->uri->segment(3);
		if ($this->input->post('save')){
			$res = $this->m_kecamatan->update($this->getpost(), $dt);
			if ($res == 1){
				$this->alert->set('bg-success', 'Data Kecamatan berhasil dirubah!');
				redirect(base_url('kecamatan'));
			}
				$this->alert->set('bg-warning', 'Nama Kecamatan yang Anda Masukan Sudah Terdaftar !');
				echo "<script>history.go(-1);</script>";
		}else{
				$data = array(
						    'title' => 'Rubah Data Kecamatan',
						    'data' => $this->m_kecamatan->getCurrentData($dt),
						    'aksi' => 'insert'
						);
				$this->template->load('default', 'page/kecamatan/form', $data);
		}
	}

	public function hapus(){
		$id = $this->input->post('id');
		$qry = $this->m_kecamatan->delete($id);
		if ($qry) {
			$data = array(
					'pesan' => "Data kecamatan berhasil di hapus",
					'aksi' => 'setTimeout("location.reload(true);",2000)'
              	);
			echo json_encode($data);
		}
		
	}

}

/* End of file Kecamatan.php */
/* Location: ./application/controllers/Kecamatan.php */