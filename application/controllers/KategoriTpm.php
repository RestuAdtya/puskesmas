<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriTpm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kategoritpm');
	}

	public function index()
	{
		$data = array(
		    'title' => 'Data Kategori Tempat Pengelolaan Makanan',
		    'dKategori' => $this->m_kategoritpm->getAll(),
		);
		$this->template->load('default', 'page/kategoritpm/index', $data);
	}

	public function tambah()
	{
		$data = array(
			'title' => 'Tambah Kategori Tempat Pengelolaan Makanan',
			'button' => 'Simpan',
			'aksi' => base_url('parameter/simpan')
		);

		$this->load->view('page/kategoritpm/modal', $data);
	}

	public function rubah()
	{
		$id = $this->input->post('id');
		$data = array(
			'title' => 'Rubah Kategori Tempat Pengelolaan #'.$id,
			'button' => 'Rubah',
			'master' => $this->m_kategoritpm->getById($id)
		);

		$this->load->view('page/kategoritpm/modal', $data);
	}

	public function simpan()
	{
		if ($this->input->post('IdKategoriTpm') <> '') {
			$data = array('KategoriTpm' => $this->input->post('KategoriTpm'));
			$qry = $this->m_kategoritpm->rubah($data,$this->input->post('IdKategoriTpm'));
		}else{
			$data = array(
				'IdKategoriTpm' => Null,
				'KategoriTpm' => $this->input->post('KategoriTpm'),
				'TglBuat' => date('Y-m-d'),
				'IdPetugas' => $this->session->userdata('IdPetugas')
			);

			$qry = $this->m_kategoritpm->simpan($data);
		}
		
		if ($qry === 'sama'){
			echo "sama";
		}else{
			$this->alert->set('bg-success', "Kategori Tempat Pengelolaan Makanan berhasil disimpan!");
			echo "berhasil";
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$qry = $this->m_kategoritpm->hapus($id);
		if ($qry){
			$lokasi = "window.location.href = '".base_url('kategoritpm')."'";
			$data = array(
					'pesan' => 'Data tempat pengelolaan makanan berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file KategoriTpm.php */
/* Location: ./application/controllers/KategoriTpm.php */