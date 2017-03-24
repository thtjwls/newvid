<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct()
	{		
		parent::__construct();		
	}	

	public function sitemap()
	{
		$this->load->view('sitemap_v');
	}

	public function index()
	{
		$this->load->view('index');
	}
	

	public function logo()
	{
		$this->load->view('logo/logo_v');
	}
}