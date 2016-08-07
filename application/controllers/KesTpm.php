<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KesTpm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kelurahan');
		$this->load->model('m_kategoritpm');
		$this->load->model('m_parameterins');
		$this->load->model('m_kestpm');
	}

	public function index()
	{
		$data = array (
			'title' => 'Data Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan',
			'dInspeksi' => $this->m_kestpm->getAllInspeksi($this->session->userdata('IdPuskesmas'))
		);
		$this->template->load('default', 'page/kestpm/index', $data);
	}

	function getMasterPost()
	{
		$master = array(
				'IdKelurahan' => $this->input->post('IdKelurahan'),
				'IdKategoriTpm' => $this->input->post('IdKategoriTpm'),
				'NamaTpm' => $this->input->post('NamaTpm'),
				'NamaPengelolaTpm' => $this->input->post('NamaPengelolaTpm'),
				'TglKesTpm' =>  DateTime::createFromFormat('d F Y', $this->input->post('TglKesTpm'))->format('Y-m-d'),
				'HasilPemeriksaan' => $this->input->post('HasilPemeriksaan'),
				'SertifikatTpm' => $this->input->post('SertifikatTpm'),
			);
		return $master;
	}

	public function register()
	{
		$IdKesTpm = $this->uri->segment(3);
		if ($IdKesTpm <> ''){
			$data  = array(
				    'title' => 'Rubah Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan #'.$IdKesTpm,
				    'master' => $this->m_kestpm->getMaster($IdKesTpm),
				    'aksi' => '../rubahRegister',
				    'dParameter' => $this->m_kestpm->getDetil($IdKesTpm),
				    'dDesa' => $this->m_kelurahan->desaByPuskesmas($this->session->userdata('IdPuskesmas')),
				    'dKategori' => $this->m_kategoritpm->getAll()
				);
		}else{
			$data  = array(
				    'title' => 'Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan',
				    'aksi' => 'simpanRegister',
				    'dDesa' => $this->m_kelurahan->desaByPuskesmas($this->session->userdata('IdPuskesmas')),
				    'dKategori' => $this->m_kategoritpm->getAll(),
				    'dParameter' => $this->m_parameterins->getAll()
				);
		}
		$this->template->load('default', 'page/kestpm/register', $data);
	}

	public function simpanRegister()
	{

		$master = array(
				'IdKesTpm' => $this->m_kestpm->autoNoKesTpm(),
				'TglBuat' => date('Y-m-d H:i:s'),
				'IdPetugas' => $this->session->userdata('IdPetugas'),
				'IdPuskesmas' => $this->session->userdata('IdPuskesmas')
			);

		$dMaster = array_merge($this->getMasterPost(), $master);


		$simpanReg = $this->m_kestpm->simpanMasterRegister($dMaster);
		if ($simpanReg === "ada")
		{
			$this->alert->set('bg-info', "Register Inspeksi Untuk Data Tersebut Pernah di buat !");
		 	redirect(base_url('kestpm/register/'.$dMaster['IdKesTpm']));
		}elseif ($simpanReg == 1){
			foreach ($this->input->post('Parameter') as $IdParameter => $NilaiParameter) {
				$data = array(
						'IdDetilKesTpm' => Null,
						'IdKesTpm'	=> $dMaster['IdKesTpm'],
						'IdParameter' => $IdParameter,
						'NilaiParameter' => $NilaiParameter
					);
				$insParameter = $this->m_kestpm->simpanDetilParameter($data);
				if ($insParameter){
					$berhasilK ++;
				}else{
					$gagalK ++;
				}
			}

				$this->alert->set('bg-success', "Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan Berhasil Disimpan !");
				redirect(base_url('kestpm'));
		}else{
				$this->alert->set('bg-danger', "Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan Gagal Disimpan !");
				echo "<script>history.go(-1);</script>";
		}

	}

	public function rubahRegister()
	{

		$IdKesTpm = $this->input->post('IdKesTpm');
		$rubahReg = $this->m_kestpm->rubahMasterRegister($this->getMasterPost(),$IdKesTpm);
		if ($rubahReg === "ada")
		{
			$this->alert->set('bg-info', "Register Inspeksi Untuk Data Tersebut Pernah di buat !");
		 	echo "<script>history.go(-1);</script>";
		}elseif ($rubahReg == 1){
			foreach ($this->input->post('Parameter') as $IdParameter => $NilaiParameter) {
				$data = array(
						'IdKesTpm'	=> $IdKesTpm,
						'IdParameter' => $IdParameter,
						'NilaiParameter' => $NilaiParameter
					);
				$insParameter = $this->m_kestpm->rubahDetilParameter($data);
				if ($insParameter){
					$berhasilK ++;
				}else{
					$gagalK ++;
				}
			}

				$this->alert->set('bg-success', "Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan #".$IdKesTpm." Berhasil Dirubah !");
				redirect(base_url('kestpm'));
		}else{
				$this->alert->set('bg-danger', "Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan #".$IdKesTpm." Gagal Disimpan !");
				echo "<script>history.go(-1);</script>";
		}
	}

	public function hapusRegister()
	{
		$IdKesTpm = $this->input->post('id');
		$hapus = $this->m_kestpm->hapusRegister($IdKesTpm);
		if ($hapus){
			$lokasi = "window.location.href = '".base_url('kestpm')."'";
			$data = array(
					'pesan' => 'Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file KesTpm.php */
/* Location: ./application/controllers/KesTpm.php */