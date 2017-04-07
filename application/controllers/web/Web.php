<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends MY_Controller {

	public function __construct()
	{
		parent::__construct();		
	}

	//기본페이지
	public function index()
	{
		redirect('web/shoppingmall');
	}
	
	//쇼핑몰
	public function shoppingmall()
	{
		parent::cateview(array('web','쇼핑몰'));
		$this->load->view('web/shoppingmall_v');
	}

	//홈페이지
	public function homepage()
	{
		parent::cateview(array('web','홈페이지'));
		$this->load->view('web/homepage_v');
	}

	//솔루션
	public function solustion()
	{
		parent::cateview(array('web','솔루션'));
		$this->load->view('web/solustion_v');
	}

	//공공기관
	public function publics()
	{
		parent::cateview(array('web','공공기관'));
		$this->load->view('web/publics_v');
	}

	//웹배너
	public function webbanner()
	{
		parent::cateview(array('web','웹배너'));
		$this->load->view('web/webbanner_v');
	}
}