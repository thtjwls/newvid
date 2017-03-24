<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
	}

	//기본페이지
	public function index()
	{
		$this->shoppingmall();
	}
	
	//쇼핑몰
	public function shoppingmall()
	{
		$this->load->view('web/shoppingmall_v');
	}

	//기업 단체홈페이지
	public function company()
	{
		$this->load->view('web/company_v');
	}

	//개인홈페이지
	public function personal()
	{
		$this->load->view('web/personal_v');
	}

	//솔루션
	public function solustion()
	{
		$this->load->view('web/solustion_v');
	}

	//공공기관
	public function publics()
	{
		$this->load->view('web/publics_v');
	}

	//웹배너
	public function webbanner()
	{
		$this->load->view('web/webbanner_v');
	}
}