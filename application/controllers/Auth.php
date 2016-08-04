<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		
	}

	public function login()
	{				
		$this->template->load('login', 'login/index');
	}

	public function do_login()
	{
		$nip = $this->input->post('nip');
		$password = MD5($this->input->post('password'));
		
		$this->load->model('m_petugas');
		$petugas = $this->m_petugas->check_login($nip, $password);
		if($petugas){
			$set_petugas = array(
				'IdPetugas' => $petugas->IdPetugas,
				'NIPPetugas' => $petugas->NIPPetugas,
				'NamaPetugas' => $petugas->NamaPetugas,
				'NamaPuskesmas' => $petugas->NamaPuskesmas,
				'IdPuskesmas' => $petugas->IdPuskesmas,
				'is_login' => TRUE,
				'LevelPetugas' => $petugas->LevelPetugas,
			);
			
			$this->session->set_userdata($set_petugas);
			$this->alert->set('bg-danger', 'Selamat Datang !', true);
			redirect('home','refresh');
			
		}else{
			$this->alert->set('bg-danger', 'Akun yang anda masukan tidak terdaftar !', true);
			$this->template->load('login', 'login/index');
		}
	}
	public function logout(){
		session_destroy();
		redirect(base_url());
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */