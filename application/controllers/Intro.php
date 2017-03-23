<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//소개
class Intro extends CI_Controller {
		
	

	public function index()
	{
		$this->perpose();
	}

	//조직도
	public function organization()
	{
		$this->load->view('intro/organization_v');
	}

	//목표
	public function perpose()
	{
		$this->load->view('intro/purpose_v');
	}

	//제작환경
	public function environment()
	{
		$this->load->view('intro/environment_v');
	}

	//CI
	public function ci()
	{
		$this->load->view('intro/ci_v');
	}
}
