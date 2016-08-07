<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenilaianResiko extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_sarana');
		$this->load->model('m_penilaian');
	}

	public function index()
	{
		$data = array(
		    'title' => 'Data Penilaian Resiko Kesehatan Lingkungan Sarana Air Minum',
		    'dPenilaian' => $this->m_penilaian->getAll(),
		);
		$this->template->load('default', 'page/penilaianresiko/index', $data);
	}

	public function tambah()
	{
		$data = array(
			'title' => 'Tambah Penilaian Penilaian Resiko Kesehatan Lingkungan Sarana Air Minum',
			'button' => 'Simpan',
			'aksi' => base_url('parameter/simpan'),
			'dKategori' => $this->m_sarana->getAll()
		);

		$this->load->view('page/penilaianresiko/modal', $data);
	}

	public function rubah()
	{
		$id = $this->input->post('id');
		$data = array(
			'title' => 'Rubah Penilaian Penilaian Resiko Kesehatan Lingkungan Sarana Air Minum #'.$id,
			'button' => 'Rubah',
			'master' => $this->m_penilaian->getById($id),
			'dKategori' => $this->m_sarana->getAll()
		);

		$this->load->view('page/penilaianresiko/modal', $data);
	}

	public function simpan()
	{
		if ($this->input->post('IdPenilaian') <> '') {
			$data = array(
					'PenilaianResikoSam' => $this->input->post('PenilaianResikoSam'),
					'IdKategoriSam'	=> $this->input->post('KodeSarana')
				);
			$qry = $this->m_penilaian->rubah($data,$this->input->post('IdPenilaian'));
		}else{
			$data = array(
				'IdPenilaian' => Null,
				'IdKategoriSam' => $this->input->post('KodeSarana'),
				'PenilaianResikoSam' => $this->input->post('PenilaianResikoSam'),
				'TglBuat' => date('Y-m-d'),
				'IdPetugas' => $this->session->userdata('IdPetugas')
			);

			$qry = $this->m_penilaian->simpan($data);
		}
		
		if ($qry === 'sama'){
			echo "sama";
		}else{
			$this->alert->set('bg-success', "Penilaian resiko sarana air minum berhasil disimpan!");
			echo "berhasil";
		}

	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$qry = $this->m_penilaian->hapus($id);
		if ($qry){
			$lokasi = "window.location.href = '".base_url('penilaianresiko')."'";
			$data = array(
					'pesan' => 'Data penilaian resiko sarana air minum berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file PenilaianResiko.php */
/* Location: ./application/controllers/PenilaianResiko.php */