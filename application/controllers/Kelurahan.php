<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kecamatan');
		$this->load->model('m_kelurahan');
	}

	public function index()
	{
		$data = array(
 
		    'title' => 'Data Kelurahan',
		    'dKelurahan' => $this->m_kelurahan->getAll(),
		);
		$this->template->load('default', 'page/kelurahan/index', $data);
	}

	private function getpost()
	{
		$post = array(
				'IdKecamatan' => $this->input->post('IdKecamatan'),
				'NamaKelurahan' => $this->input->post('NamaKelurahan'),
				'TglBuat' => date('Y-m-d'),
				'IdUser' => $this->session->userdata('IdPetugas')
		);
		return $post;
	}

	public function tambah()
	{
		if ($this->input->post('save')){
			$res = $this->m_kelurahan->insert($this->getpost());
			if ($res == 1){
				$this->alert->set('bg-success', 'Data Kelurahan berhasil disimpan!');
				redirect(base_url('kelurahan'));
			}
				$this->alert->set('bg-warning', 'Nama Kelurahan yang Anda Masukan Sudah Terdaftar !');
				echo "<script>history.go(-1);</script>";
		}else{
			$data = array(
				    'title' => 'Tambah Data Kelurahan',
				    'dKecamatan' => $this->m_kecamatan->getAll(),
				    'aksi' => 'insert'
				);
				$this->template->load('default', 'page/kelurahan/form', $data);
		}
	}

	public function rubah()
	{
		$dt = $this->uri->segment(3);
		if ($this->input->post('save')){
			$post = array(
					'IdKecamatan' => $this->input->post('IdKecamatan'),
					'NamaKelurahan' => $this->input->post('NamaKelurahan')
				);
			$res = $this->m_kelurahan->update($post, $dt);
			if ($res == 1){
				$this->alert->set('bg-success', 'Data Kelurahan berhasil dirubah!');
				redirect(base_url('kelurahan'));
			}
				$this->alert->set('bg-warning', 'Nama Kelurahan yang Anda Masukan Sudah Terdaftar !');
				echo "<script>history.go(-1);</script>";
		}else{
				$data = array(
						    'title' => 'Rubah Data Kelurahan',
						    'dKecamatan' => $this->m_kecamatan->getAll(),
						    'data' => $this->m_kelurahan->getCurrentData($dt),
						    'aksi' => 'insert'
						);
				$this->template->load('default', 'page/kelurahan/form', $data);
		}
	}

	public function hapus(){
		$id = $this->input->post('id');
		$qry = $this->m_kelurahan->delete($id);
		if ($qry) {
			$data = array(
					'pesan' => "Data kelurahan berhasil di hapus",
					'aksi' => 'setTimeout("location.reload(true);",2000)'
              	);
			echo json_encode($data);
		}
	}

}

/* End of file Kelurahan.php */
/* Location: ./application/controllers/Kelurahan.php */