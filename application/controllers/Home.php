<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//소개
class Home extends MY_Controller {

	public function __construct()
	{		
		parent::__construct();
		
	}		
	

	public function index()
	{
		redirect('home/intro');	
	}

	public function intro()
	{		
		$this->pageCode = '001000';
		$this->pageName = '소개';

		$data = array(
			'pageCode' => $this->pageCode
			
		);

		$this->load->view('home/intro_v',$data);		
	}

	//조직도
	public function organization()
	{
		$this->pageCode = '002000';
		$this->load->view('home/organization_v');
	}

	//목표
	public function perpose()
	{
		$this->pageCode = '003000';
		$this->load->view('home/purpose_v');
	}

	//제작환경
	public function environment()
	{
		$this->pageCode = '004000';
		$this->load->view('home/environment_v');
	}

	//CI
	public function ci()
	{
		$this->pageCode = '005000';
		$this->load->view('home/ci_v');
	}
}
