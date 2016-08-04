<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KesTtu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kelurahan');
		$this->load->model('m_kategorittu');
		$this->load->model('m_parameterins');
		$this->load->model('m_kesttu');
	}

	public function index()
	{
		$data = array (
			'title' => 'Data Register Inspeksi Kesehatan Lingkungan Tempat Tempat Umum',
			'dInspeksi' => $this->m_kesttu->getAllInspeksi($this->session->userdata('IdPuskesmas'))
		);
		$this->template->load('default', 'page/kesttu/index', $data);
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
				    'title' => 'Register Inspeksi Kesehatan Lingkungan Tempat Tempat Umum',
				    'aksi' => 'simpanRegister',
				    'dDesa' => $this->m_kelurahan->desaByPuskesmas($this->session->userdata('IdPuskesmas')),
				    'dKategori' => $this->m_kategorittu->getAll(),
				    'dParameter' => $this->m_parameterins->getAll()
				);
		}
		$this->template->load('default', 'page/kesttu/register', $data);
	}

	function getMasterPost()
	{
		$master = array(
				'IdKelurahan' => $this->input->post('IdKelurahan'),
				'IdKategoriTtu' => $this->input->post('IdKategoriTtu'),
				'NamaTempatUmum' => $this->input->post('NamaTempatUmum'),
				'TglKesTtu' =>  DateTime::createFromFormat('d F Y', $this->input->post('TglKesTtu'))->format('Y-m-d'),
				'JumlahTtu' => $this->input->post('JumlahTtu'),
				'JumlahDiperiksa' => $this->input->post('JumlahDiperiksa'),
				'HasilPemeriksaan' => $this->input->post('HasilPemeriksaan')
			);
		return $master;
	}

	public function simpanRegister()
	{
		$master = array(
				'IdKesTtu' => $this->m_kesttu->autoNoKesTtu(),
				'TglBuat' => date('Y-m-d H:i:s'),
				'IdPetugas' => $this->session->userdata('IdPetugas'),
				'IdPuskesmas' => $this->session->userdata('IdPuskesmas')
			);

		$dMaster = array_merge($this->getMasterPost(), $master);


		foreach ($this->input->post('Parameter') as $IdParameter => $NilaiParameter) {
			$data = array(
					'IdDetilKesTtu' => Null,
					'IdKesTtu'	=> $this->m_kesttu->autoNoKesTtu(),
					'IdParameter' => $IdParameter,
					'NilaiParameter' => $NilaiParameter
				);
			$insKualitas = $this->m_kesttu->simpanDetilParameter($data);
			if ($insKualitas){
				$berhasilK ++;
			}else{
				$gagalK ++;
			}
		}

		$simpanReg = $this->m_kesttu->simpanMasterRegister($dMaster);
		if ($simpanReg){
			$this->alert->set('bg-success', "Register Inspeksi Kesehatan Lingkungan Tempat - Tempat Umum Berhasil Disimpan !");
			redirect(base_url('kesttu'));
		}else{
			$this->alert->set('bg-danger', "Register Inspeksi Kesehatan Lingkungan Tempat - Tempat Umum Gagal Disimpan !");
			echo "<script>history.go(-1);</script>";
		}

	}

	public function hapusRegister()
	{
		$IdKesTtu = $this->input->post('id');
		$hapus = $this->m_kesttu->hapusRegister($IdKesTtu);
		if ($hapus){
			$lokasi = "window.location.href = '".base_url('kesttu')."'";
			$data = array(
					'pesan' => 'Register Inspeksi Kesehatan Lingkungan Tempat - Tempat Umum berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file KesTtu.php */
/* Location: ./application/controllers/KesTtu.php */