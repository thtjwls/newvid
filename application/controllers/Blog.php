<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
	public function illust()
	{
		$this->load->view('blog/illust_v');
	}

	public function photoshop()
	{
		$this->load->view('blog/photoshop_v');
	}

	public function program()
	{
		$this->load->view('blog/program_v');
	}

	public function js()
	{
		$this->load->view('blog/js_v');
	}

	public function html()
	{
		$this->load->view('blog/html_v');
	}
}