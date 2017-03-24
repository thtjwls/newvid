<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index()
	{
		$this->load->view('main_v');
	}

	public function siteMap()
	{
		$this->load->view('sitemap/sitemap');
	}
}
