<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
	}
	
	public function index()
	{
		$data = array(
		    'title' => 'WHAHAHA',
		);
		$this->template->load('default', 'try',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */