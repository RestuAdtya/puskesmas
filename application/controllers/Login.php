<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data = array(
 
		    'title' => ' ',
		     
		);
		$this->template->load('login', 'login/index', $data);
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */