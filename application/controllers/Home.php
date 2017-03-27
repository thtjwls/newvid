<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//소개
class Home extends CI_Controller {
		
	

	public function index()
	{
		$this->perpose();
	}

	public function intro()
	{
		$this->load->view('home/intro_v');
	}

	//조직도
	public function organization()
	{
		$this->load->view('home/organization_v');
	}

	//목표
	public function perpose()
	{
		$this->load->view('home/purpose_v');
	}

	//제작환경
	public function environment()
	{
		$this->load->view('home/environment_v');
	}

	//CI
	public function ci()
	{
		$this->load->view('home/ci_v');
	}
}
