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

	//홈페이지
	public function homepage()
	{
		$this->load->view('web/homepage_v');
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