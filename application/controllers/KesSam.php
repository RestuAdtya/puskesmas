<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KesSam extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kelurahan');
		$this->load->model('m_sarana');
		$this->load->model('m_kessam');
	}

	public function index()
	{
		$data = array (
			'title' => 'Data Register Inspeksi Kesehatan Lingkungan Sarana Air Minum',
			'dInspeksi' => $this->m_kessam->getAllInspeksi($this->session->userdata('IdPuskesmas'))
		);
		$this->template->load('default', 'page/kessam/index', $data);
	}

	public function inspeksisam()
	{
		$IdKes = $this->uri->segment(3);
		if ($IdKes <> ''){
			$this->load->model('m_penilaian');
			$this->load->model('m_kualitasair');
			$dMaster = $this->m_kessam->getMasterInspeksi($IdKes);
			if ($dMaster) {
				$data = array(
					'title' => 'Kartu Inspeksi Sanitasi Sarana Air Minum',
					'dDesa' => '',
					'dSarana' => '',
					'dDetilInspeksi' => '',
					'dMasterInspeksi' => $dMaster,
					'dPenilaian' => $this->m_penilaian->getPenilaianByKat($dMaster->IdKategoriSam),
					'dKualitasair' => $this->m_kualitasair->getAll()
				);

			}else{
				$this->alert->set('bg-danger', "Kesalahan pada url ! ".$IdKes);
				redirect(base_url('kessam/Inspeksisam'));
			}
		}else{

			$data  = array(
			    'title' => 'Kartu Inspeksi Sanitasi Sarana Air Minum',
			    'dDesa' => $this->m_kelurahan->desaByPuskesmas($this->session->userdata('IdPuskesmas')),
			    'dSarana' => $this->m_sarana->getAll(),
			    'dDetilInspeksi' => '',
			    'dMasterInspeksi' => '',
			    'dPenilaian' => '',
				'dKualitasair' => ''
			);
		}
		//echo json_encode($data);
		$this->template->load('default', 'page/KesSam/Sam', $data);
	}

	public function getMasterPost()
	{
		$mPost = array(
				'IdKelurahan' => $this->input->post('IdKelurahan'),
				'IdPuskesmas' => $this->input->post('IdPuskesmas'),
				'BulanInspeksi' => $this->input->post('bulanInspeksi'),
				'KodeSarana' => $this->input->post('KodeSarana'),
				'PemilikSam' => $this->input->post('PemilikSam'),
				'AlamatPemilik' => $this->input->post('AlamatPemilik')
		);
		return $mPost;
	}

	public function buatInspeksi()
	{
		$data = $this->getMasterPost();
		$cek = $this->m_kessam->buatInepeksi($data);
		if ($cek['pesan'] == 'lama'){
			$this->alert->set('bg-warning', "Inspeksi untuk desa tersebut per tanggal (".$data['BulanInspeksi'].") dengan pemilik (".$data['PemilikSam'].") sudah pernah dibuat !");
		}else{
			$this->alert->set('bg-success', "Inspeksi untuk desa tersebut per tanggal (".$data['BulanInspeksi'].") dengan pemilik (".$data['PemilikSam'].") berhasil dibuat !");
		}
		echo json_encode($cek);
	}

	public function saveInspeksiSam()
	{
		$IdKesSam = $this->input->post("IdKesSam");
		$masterUpdate = array(
				'JmlResiko' => $this->input->post("jmlResiko"),
				'ResikoKontaminasi' => $this->input->post("resikoKontaminasi"),
				'PersenKontaminasi' => $this->input->post("persenKontaminasi"),
				'HasilRekomendasi' => $this->input->post("hasilRekomendasi")
			);
		$berhasilK = 0; $gagalK = 0; $berhasilP = 0; $gagalP = 0;
		foreach ($this->input->post('Kualitas') as $IdKualitasAir => $HasilPenilaian) {
			$data = array(
					'IdDetilSamKualitas' => Null,
					'IdKesSam'	=> $IdKesSam,
					'IdKualitasAir' => $IdKualitasAir,
					'HasilPenilaian' => $HasilPenilaian
				);
			$insKualitas = $this->m_kessam->insertDetilKualitas($data);
			if ($insKualitas){
				$berhasilK ++;
			}else{
				$gagalK ++;
			}
		}
		foreach ($this->input->post('Penilaian') as $IdPenilaian => $HasilPenilaian) {
			$data = array(
					'IdDetilSamPenilaian' => Null,
					'IdKesSam'	=> $IdKesSam,
					'IdPenilaian' => $IdPenilaian,
					'HasilPenilaian' => $HasilPenilaian
				);
			$insPenilaian = $this->m_kessam->insertDetilPenilaian($data);
			if ($insPenilaian){
				$berhasilP ++;
			}else{
				$gagalP ++;
			}
		}
		$updateInsSam = $this->m_kessam->simpanInspeksiSam($masterUpdate, $IdKesSam);
		if ($updateInsSam){
			$this->alert->set('bg-success', "Kartu Inspeksi Sanitasi Sarana Air Minum Berhasil Di Simpan");
			redirect(base_url('kessam'));
		}else{
			$this->alert->set('bg-danger', "Kartu Inspeksi Sanitasi Sarana Air Minum Gagal Di Simpan");
			echo "<script>history.go(-1);</script>";
		}

	}

	public function delInspeksi()
	{
		$id = $this->input->post('id');
		$deleteIns = $this->m_kessam->deleteInspeksi($id);
		if ($deleteIns){
			$lokasi = "window.location.href = '".base_url('kessam')."'";
			$data = array(
					'pesan' => 'Data Kartu Inspeksi Sanitasi Sarana Air Minum Berhasil berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

	public function lihatDetil()
	{
		$data = array(
			'dMaster' => $this->m_kessam->getMasterModal($this->input->post('id')),
			'dPenilaian' => $this->m_kessam->getPenilaianModal($this->input->post('id')),
			'dKualitas' => $this->m_kessam->getKualitasModal($this->input->post('id'))
		);

		$this->load->view('page/kessam/modalDetilInspeksi', $data);
	}

}

/* End of file KesSam.php */
/* Location: ./application/controllers/KesSam.php */