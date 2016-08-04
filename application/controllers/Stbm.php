<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stbm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kelurahan');
		$this->load->model('m_stbm');
	}

	public function index()
	{
		$data = array (
			'title' => 'Data Bina Desa Sanitasi Total Berbasis Masyarakat',
			'dSTBM' => $this->m_stbm->getAll($this->session->userdata('IdPuskesmas'))
		);
		$this->template->load('default', 'page/stbm/index', $data);
	}

	public function register()
	{
		$IdStbm = $this->uri->segment(3);
		if ($IdStbm <> ''){
			$data  = array(
				    'title' => 'Rubah Register Bina Desa Sanitasi Total Berbasis Masyarakat #'.$IdStbm,
				    'master' => $this->m_stbm->getById($IdStbm),
				    'aksi' => '../simpanRegister/'.$IdStbm,
				    'dDesa' => ''
				);
		}else{
			$data  = array(
				    'title' => 'Register Bina Desa Sanitasi Total Berbasis Masyarakat',
				    'aksi' => 'simpanRegister',
				    'dDesa' => $this->m_kelurahan->desaByPuskesmas($this->session->userdata('IdPuskesmas'))
				);
		}
		$this->template->load('default', 'page/stbm/register', $data);
	}

	function getPost()
	{
		$post = array(
				'IdKelurahan' => $this->input->post('IdKelurahan'),
				'JumlahSD' => $this->input->post('JumlahSD'),
				'JumlahDusun' => $this->input->post('JumlahDusun'),
				'TglPemicuan' => DateTime::createFromFormat('d F Y', $this->input->post('TanggalPemicuan'))->format('Y-m-d'),
				'JumlahKK' => $this->input->post('JumlahKK'),
				'BaselineJSP' => $this->input->post('BaselineJSP'),
				'BaselineJSSP' => $this->input->post('BaselineJSSP'),
				'BaselineSharing' => $this->input->post('BaselineSharing'),
				'BaselineOD' => $this->input->post('BaselineOD'),
				'ProgressJSP' => $this->input->post('ProgressJSP'),
				'ProgressJSSP' => $this->input->post('ProgressJSSP'),
				'ProgressSharing' => $this->input->post('ProgressSharing'),
				'ProgressOD' => $this->input->post('ProgressOD'),
				'IdPuskesmas' => $this->session->userdata('IdPuskesmas'),
				'IdPetugas' => $this->session->userdata('IdPetugas')
			);
		return $post;
	}

	public function simpanRegister()
	{
		$IdStbm = $this->uri->segment(3);
		if ($IdStbm <> ''){
			$rubah = $this->m_stbm->rubahRegister($this->getPost(), $IdStbm);
				if ($rubah){
					$this->alert->set('bg-success', "Register Bina Desa Sanitasi Total Berbasis Masyarakat Berhasil di rubah");
					redirect(base_url('stbm'));
				}else{
					$this->alert->set('bg-danger', "Register Bina Desa Sanitasi Total Berbasis Masyarakat gagal");
					echo "<script>history.go(-1);</script>";
				}
		}else{
			$simpan = $this->m_stbm->simpanRegister($this->getPost());
				if ($simpan){
					$this->alert->set('bg-success', "Register Bina Desa Sanitasi Total Berbasis Masyarakat Berhasil di buat");
					redirect(base_url('stbm'));
				}else{
					$this->alert->set('bg-danger', "Register Bina Desa Sanitasi Total Berbasis Masyarakat gagal");
					echo "<script>history.go(-1);</script>";
				}
		}
	}

	public function hapusRegister()
	{
		$IdStbm = $this->input->post('id');
		$hapus = $this->m_stbm->hapusRegister($IdStbm);
		if ($hapus){
			$lokasi = "window.location.href = '".base_url('stbm')."'";
			$data = array(
					'pesan' => 'Register Bina Desa Sanitasi Total Berbasis Masyarakat berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file Stbm.php */
/* Location: ./application/controllers/Stbm.php */