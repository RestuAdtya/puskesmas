<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kualitasair extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kualitasair');
	}

	public function index()
	{
		$data = array(
		    'title' => 'Data Penilaian Kualitas Air',
		    'dKualitas' => $this->m_kualitasair->getAll(),
		);
		$this->template->load('default', 'page/kualitasair/index', $data);
	}

	public function tambah()
	{
		$data = array(
			'title' => 'Tambah Penilaian Kualitas Air',
			'button' => 'Simpan',
			'aksi' => base_url('parameter/simpan')
		);

		$this->load->view('page/kualitasair/modal', $data);
	}

	public function rubah()
	{
		$id = $this->input->post('id');
		$data = array(
			'title' => 'Rubah Penilaian Kualitas Air #'.$id,
			'button' => 'Rubah',
			'master' => $this->m_kualitasair->getById($id)
		);

		$this->load->view('page/kualitasair/modal', $data);
	}

	public function simpan()
	{
		if ($this->input->post('IdKualitasAir') <> '') {
			$data = array('KualitasAir' => $this->input->post('KualitasAir'));
			$qry = $this->m_kualitasair->rubah($data,$this->input->post('IdKualitasAir'));
		}else{
			$data = array(
				'IdKualitasAir' => Null,
				'KualitasAir' => $this->input->post('KualitasAir'),
				'TglBuat' => date('Y-m-d'),
				'IdPetugas' => $this->session->userdata('IdPetugas')
			);

			$qry = $this->m_kualitasair->simpan($data);
		}
		
		if ($qry === 'sama'){
			echo "sama";
		}else{
			$this->alert->set('bg-success', "Penilaian kualitas air berhasil disimpan!");
			echo "berhasil";
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$qry = $this->m_kualitasair->hapus($id);
		if ($qry){
			$lokasi = "window.location.href = '".base_url('kualitasair')."'";
			$data = array(
					'pesan' => 'Data penilaian kualitas air berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file kualitasair.php */
/* Location: ./application/controllers/kualitasair.php */