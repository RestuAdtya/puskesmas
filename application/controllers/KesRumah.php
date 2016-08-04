<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KesRumah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kelurahan');
		$this->load->model('m_kesrumah');
		
	}

	public function index()
	{
		$data = array (
			'title' => 'Data Register Inspeksi Kesehatan Rumah',
			'dInspeksi' => $this->m_kesrumah->getAllInspeksi($this->session->userdata('IdPuskesmas'))
		);
		$this->template->load('default', 'page/KesRumah/index', $data);
	}

	public function InspeksiRumah()
	{
		$IdKes = $this->uri->segment(3);
		if ($IdKes <> ''){
			$dMaster = $this->m_kesrumah->getMasterInspeksi($IdKes);
			if ($dMaster) {
				$data = array(
					'title' => 'Register Inspeksi Kesehatan Lingkungan Rumah',
					'dDesa' => '',
					'dDetilInspeksi' => $this->m_kesrumah->getDetilInspeksi($IdKes),
					'dMasterInspeksi' => $dMaster
				);
			}else{
				$this->alert->set('bg-danger', "Kesalahan pada url !");
				redirect(base_url('KesRumah/InspeksiRumah'));
			}
		}else{
			$data  = array(
			    'title' => 'Register Inspeksi Kesehatan Lingkungan Rumah',
			    'dDesa' => $this->m_kelurahan->desaByPuskesmas($this->session->userdata('IdPuskesmas')),
			    'dDetilInspeksi' => '',
			    'dMasterInspeksi' => ''
			);
		}
		//echo json_encode($data);
		$this->template->load('default', 'page/KesRumah/Rumah', $data);
	}


	private function getPost()
	{
		$post = array(
				'IdKesRumah' => $this->input->post('IdKesRumah'),
				'KepalaKeluarga' => $this->input->post('NamaKepalaKeluarga'),
				'AlamatRumah' => $this->input->post('AlamatRumah'),
				'ParamEcoli' => $this->input->post('ParamEcoli'),
				'ParamPh' => $this->input->post('ParamPh'),
				'ParamChlor' => $this->input->post('ParamChlor'),
				'ParamPh' => $this->input->post('ParamPh'),
				'ParamTDS' => $this->input->post('ParamTDS'),
				'StatusRumah' => $this->input->post('Hasil'),
			);
			return $post;
	}

	public function tambahRumahInspeksi()
	{
		$tambah = $this->m_kesrumah->insertDetilIns($this->getPost());
		if ($tambah == 99){
			$this->alert->set('bg-danger', "Nama kepala keluarga sudah dimasukan !");
			echo "<script>history.go(-1);</script>";
		}else if($tambah == 1){
			$this->alert->set('bg-success', "Nama kepala keluarga berhasil ditambahkan !");
			redirect(base_url('KesRumah/rumahs/'.$this->post("IdKesRumah")));
		}else{

		}
	}

	public function cekInspeksi()
	{
		$data = array(
				'bulan' => $this->input->post("bulan"),
				'kecamatan' => $this->input->post("IdKecamatan")
		);
		$cek = $this->m_kesrumah->cekInspeksi($data);
		if ($cek['pesan'] == 'lama'){
			$this->alert->set('bg-warning', "Inspeksi untuk desa tersebut per tanggal (".$data['bulan'].") sudah pernah dibuat !");
		}else{
			$this->alert->set('bg-success', "Inspeksi untuk desa tersebut per tanggal (".$data['bulan'].") berhasil dibuat !");
		}
		echo json_encode($cek);
	}

	public function get_modal()
	{
		$data = array(
				'DetilKesRumah' => $this->m_kesrumah->getDetilRumah($this->input->post('id'))
			);
		$this->load->view('page/KesRumah/modal', $data);
	}

	public function rubahDetilInsR()
	{
		//$post = $this->input->post();
		$IdDetil = $this->input->post('IdDetilKesRumah');
		$res = $this->m_kesrumah->rubahDetilIns($this->getpost(), $IdDetil);
		if ($res === 'sama'){
			echo "sama";
		}else{
			$this->alert->set('bg-success', "Detil inspeksi berhasil dirubah!");
			echo "berhasil";
		}
	}

	public function hapusRumah()
	{
		$id = $this->input->post('id');
		$qry = $this->m_kesrumah->hapusDetilRumah($id);
		if ($qry) {
			$data = array(
					'pesan' => 'Data detil inspeksi berhasil dihapus !',
					'aksi' => 'setTimeout("location.reload(true);",2000)'
              	);
			echo json_encode($data);
		}
	}

	public function batalKeslingRumah()
	{
		$id = $this->input->post('id');
		$qry = $this->m_kesrumah->batalInspeksi($id);
		if ($qry){
			$lokasi = "window.location.href = '".base_url('KesRumah/data')."'";
			$data = array(
					'pesan' => 'Data detil inspeksi berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file KesRumah.php */
/* Location: ./application/controllers/KesRumah.php */