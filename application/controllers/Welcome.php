<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$data = array(
 
		    'title' => 'WHAHAHA',
		);
		$this->template->load('default', 'try', $data);
	}
}
