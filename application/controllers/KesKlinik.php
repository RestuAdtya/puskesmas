<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KesKlinik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}

		$this->load->model('m_kesklinik');
		$this->load->model('m_kelurahan');
	}

	public function index()
	{
		$data = array (
			'title' => 'Daftar Klien Klinik Sanitasi',
			'dKlinik' => $this->m_kesklinik->getAll($this->session->userdata('IdPuskesmas'))
		);
		$this->template->load('default', 'page/kesklinik/index', $data);
	}

	public function konseling()
	{
		$NoIndeks = $this->uri->segment(3);
		if ($NoIndeks <> ''){
			$data = array(
					'title' => 'Konseling Klien Klinik Sanitasi',
					'aksi' => '',
					'dMaster' => $this->m_kesklinik->getById($NoIndeks),
					'dKonseling' => $this->m_kesklinik->getKonselingByNIK($NoIndeks)
				);
		}else{
			$data = array(
							'title' => 'Konseling Klien Klinik Sanitasi',
							'aksi' => 'buatKonseling',
							'dKlien' => $this->m_kesklinik->getKlien()
						);
		}
		$this->template->load('default', 'page/kesklinik/konseling', $data);
	}

	public function getKlienKonseling()
	{
		$NoIndeksKlien = $this->input->post('NoIndeks');
		$data = $this->m_kesklinik->getById($NoIndeksKlien);
		echo json_encode($data);
	}

	public function buatKonseling()
	{
		$NoIndeksKlien = $this->input->post('NoIndeksKlien');
		redirect(base_url('kesklinik/konseling/'.$NoIndeksKlien));
	}

	public function simpanKonseling()
	{
		
		$post = array(
			'IdKonselingKlinik' => NULL,
			'AnamnesaKonseling' => $this->input->post('AnamnesaKonseling'),
			'TglKonseling' => date('Y-m-d'),
			'NoIndeksKlien' => $this->input->post('NIK'),
			'SaranKonseling' => $this->input->post('SaranKonseling'),
			'KeteranganKunjungan' => $this->input->post('KeteranganKunjungan'),
			'KeteranganTgl' => DateTime::createFromFormat('d F Y', $this->input->post('KeteranganTanggal'))->format('Y-m-d'),
			'KeteranganWaktu' => $this->input->post('KeteranganJam'),
			'KeteranganLokasi' => $this->input->post('KeteranganLokasi'),
			'LamaKonseling' => $this->input->post('LamaKonseling'),
			'TglBuat' => date('Y-m-d H:i:s'),
			'IdPetugas' => $this->session->userdata('IdPetugas')
		);
		$simpanKons = $this->m_kesklinik->simpanKonseling($post);
		if ($simpanKons == 1){
			$this->alert->set('bg-success', "Data Konseling Klien Klinik Sanitasi Berhasil Ditambahkan!");
		}else{
			$this->alert->set('bg-danger', "Data Konseling Klien Klinik Sanitasi Gagal Ditambahkan!");
		}

		echo $post['NoIndeksKlien'];
	}

	public function hapusKonseling()
	{
		$qry = $this->m_kesklinik->hapusKonseling($this->input->post('id'));
		if ($qry){
			$data = array(
					'pesan' => 'Data konseling berhasil di hapus !',
					'aksi' => 'setTimeout("window.location.reload();",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

	public function lihatDetilKonseling()
	{
		$data = $this->m_kesklinik->getDetilKonseling($this->input->post('id'));
		$this->load->view('page/kesklinik/modalDetilKonseling', $data);
	}

	public function registrasi()
	{
		$NoIndeks = $this->uri->segment(3);
		if ($NoIndeks <> ''){
			$data  = array(
				    'title' => 'Rubah Registrasi Kesehatan Lingkungan Klinik Sanitasi #'.$NoIndeks,
				    'master' => $this->m_kesklinik->getById($NoIndeks),
				    'aksi' => '../simpanRegister/'.$NoIndeks,
				    'dDesa' => $this->m_kelurahan->desaByPuskesmas($this->session->userdata('IdPuskesmas'))
				);
		}else{
			$data  = array(
				    'title' => 'Registrasi Kesehatan Lingkungan Klinik Sanitasi',
				    'aksi' => 'simpanRegister',
				    'dDesa' => $this->m_kelurahan->desaByPuskesmas($this->session->userdata('IdPuskesmas'))
				);
		}
		$this->template->load('default', 'page/kesklinik/registrasi', $data);
	}

	function getPost()
	{
		$post = array(
				'NamaKlien' => $this->input->post('NamaKlien'),
				'NamaKK' => $this->input->post('NamaKK'),
				'UmurKlien' => $this->input->post('UmurKlien'),
				'KategoriUmur' => $this->input->post('kategoriUmur'),
				'JenisKelamin' => $this->input->post('JenisKelamin'),
				'AgamaKlien' => $this->input->post('AgamaKlien'),
				'PekerjaanKlien' => $this->input->post('PekerjaanKlien'),
				'AlamatKlien' => $this->input->post('AlamatKlien'),
				'RtRwKlien' => $this->input->post('RtRwKlien'),
				'DusunKlien' => $this->input->post('DusunKlien'),
				'IdKelurahan' => $this->input->post('IdKelurahan'),
				'IdPuskesmas' => $this->session->userdata('IdPuskesmas'),
				'GolonganKlien' => $this->input->post('GolonganKlien')
			);
		return $post;
	}

	public function simpanRegister()
	{
		$NoIndeks = $this->uri->segment(3);
		if ($NoIndeks <> ''){
			$rubah = $this->m_kesklinik->rubahRegister($this->getPost(), $NoIndeks);
				if ($rubah === "sama"){
					$this->alert->set('bg-warning', "Nama klien yang anda input sudah terdaftar");
					echo "<script>history.go(-1);</script>";
				}elseif ($rubah == 1){
					$this->alert->set('bg-success', "Perubahan Data Klien Klinik Sanitasi Berhasil Dibuat!");
					redirect(base_url('kesklinik'));
				}else{
					$this->rubah->set('bg-danger', "Perubahan Data Klien Klinik Sanitasi Gagal Dibuat!");
					echo "<script>history.go(-1);</script>";
				}
		}else{
			$simpan = $this->m_kesklinik->simpanRegister($this->getPost());
				if ($simpan === "sama"){
					$this->alert->set('bg-warning', "Nama klien yang anda input sudah terdaftar");
					echo "<script>history.go(-1);</script>";
				}elseif ($simpan == 1){
					$this->alert->set('bg-success', "Registrasi Klien Klinik Sanitasi Berhasil Dibuat!");
					redirect(base_url('kesklinik'));
				}else{
					$this->alert->set('bg-danger', "Registrasi Klien Klinik Sanitasi Gagal Dibuat!");
					echo "<script>history.go(-1);</script>";
				}
		}
	}

	public function lihatDetil()
	{
		$data = array(
			'dMaster' => $this->m_kesklinik->getById($this->input->post('id')),
			'dKonseling' => $this->m_kesklinik->getKonselingByNIK($this->input->post('id'))
		);

		$this->load->view('page/kesklinik/modalDetil', $data);
	}

}

/* End of file KesKlinik.php */
/* Location: ./application/controllers/KesKlinik.php */