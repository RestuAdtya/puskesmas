<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriTtu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_kategorittu');
	}

	public function index()
	{
		$data = array(
		    'title' => 'Data Kategori Tempat-Tempat Umum',
		    'dKategori' => $this->m_kategorittu->getAll(),
		);
		$this->template->load('default', 'page/kategorittu/index', $data);
	}

	public function tambah()
	{
		$data = array(
			'title' => 'Tambah Kategori Tempat - tempat Umum',
			'button' => 'Simpan',
			'aksi' => base_url('parameter/simpan')
		);

		$this->load->view('page/kategorittu/modal', $data);
	}

	public function rubah()
	{
		$id = $this->input->post('id');
		$data = array(
			'title' => 'Rubah Kategori Tempat - tempat Umum #'.$id,
			'button' => 'Rubah',
			'master' => $this->m_kategorittu->getById($id)
		);

		$this->load->view('page/kategorittu/modal', $data);
	}

	public function simpan()
	{
		if ($this->input->post('IdKategoriTtu') <> '') {
			$data = array('KategoriTtu' => $this->input->post('KategoriTtu'));
			$qry = $this->m_kategorittu->rubah($data,$this->input->post('IdKategoriTtu'));
		}else{
			$data = array(
				'IdKategoriTtu' => Null,
				'KategoriTtu' => $this->input->post('KategoriTtu'),
				'TglBuat' => date('Y-m-d'),
				'IdPetugas' => $this->session->userdata('IdPetugas')
			);

			$qry = $this->m_kategorittu->simpan($data);
		}
		
		if ($qry === 'sama'){
			echo "sama";
		}else{
			$this->alert->set('bg-success', "Kategori Tempat-tempat UMum berhasil disimpan!");
			echo "berhasil";
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$qry = $this->m_kategorittu->hapus($id);
		if ($qry){
			$lokasi = "window.location.href = '".base_url('kategorittu')."'";
			$data = array(
					'pesan' => 'Data tempat umum berhasil dihapus !',
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

}

/* End of file KategoriTtu.php */
/* Location: ./application/controllers/KategoriTtu.php */