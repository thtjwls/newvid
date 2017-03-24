<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->system();
	}

	public function system()
	{
		$this->load->view('develop/system_v');
	}
}
