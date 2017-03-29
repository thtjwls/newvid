<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//소개
class Home extends MY_Controller {

	public $category;

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
		
		
		parent::cateview(array('HOME','소개'));
		$this->load->view('home/intro_v');		
	}

	//조직도
	public function organization()
	{
		$this->category[1] = '조직도';
		
		parent::cateview(array('HOME','조직도'));
		$this->load->view('home/organization_v');
	}

	//목표
	public function perpose()
	{
		parent::cateview(array('HOME','목표'));
		$this->load->view('home/purpose_v');
	}

	//제작환경
	public function environment()
	{
		parent::cateview(array('HOME','제작환경'));
		$this->load->view('home/environment_v');
	}

	//CI
	public function ci()
	{
		

		parent::cateview(array('HOME','CI'));
		$this->load->view('home/ci_v');
	}
}
