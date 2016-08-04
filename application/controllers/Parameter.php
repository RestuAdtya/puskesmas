<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_parameterins');
	}

	public function index()
	{
		$data = array(
		    'title' => 'Data Parameter Inspeksi',
		    'dParameter' => $this->m_parameterins->getAll(),
		);
		$this->template->load('default', 'page/parameter/index', $data);
	}

	public function tambah()
	{
		$data = array(
			'title' => 'Tambah Parameter Inspeksi',
			'button' => 'Simpan',
			'aksi' => base_url('parameter/simpan')
		);

		$this->load->view('page/parameter/modal', $data);
	}

	public function simpan()
	{
		if ($this->input->post('IdParameter') <> '') {
			$data = array('ParameterInspeksi' => $this->input->post('ParameterInspeksi'));
			$qry = $this->m_parameterins->rubah($data,$this->input->post('IdParameter'));
		}else{
			$data = array(
				'IdParameter' => Null,
				'ParameterInspeksi' => $this->input->post('ParameterInspeksi'),
				'TglBuat' => date('Y-m-d'),
				'IdPetugas' => $this->session->userdata('IdPetugas')
			);

			$qry = $this->m_parameterins->simpan($data);
		}
		
		if ($qry === 'sama'){
			echo "sama";
		}else{
			$this->alert->set('bg-success', "Parameter inspeksi berhasil disimpan!");
			echo "berhasil";
		}
	}

	public function rubah()
	{
		$id = $this->input->post('id');
		$data = array(
			'title' => 'Rubah Parameter Inspeksi #'.$id,
			'button' => 'Rubah',
			'master' => $this->m_parameterins->getById($id)
		);

		$this->load->view('page/parameter/modal', $data);
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$qry = $this->m_parameterins->hapus($id);
		if ($qry){
			$lokasi = "window.location.href = '".base_url('parameter')."'";
			$data = array(
					'pesan' => 'Data parameter inspeksi berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file Parameter.php */
/* Location: ./application/controllers/Parameter.php */