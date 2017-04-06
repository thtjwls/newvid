<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('design/card');
	}

	//명함
	public function card()
	{
		parent::cateview(array('Design','명함'));
		$this->load->view('design/card_v');		
	}

	//전단지
	public function leaflet()
	{
		parent::cateview(array('Design','전단지'));
		$this->load->view('design/leaflet_v');		
	}

	//현수막
	public function plancart()
	{
		parent::cateview(array('Design','현수막'));
		$this->load->view('design/plancart_v');		
	}

	//간판
	public function signboard()
	{
		parent::cateview(array('Design','간판'));
		$this->load->view('design/signboard_v');		
	}

	//배너
	public function banner()
	{
		parent::cateview(array('Design','배너'));
		$this->load->view('design/banner_v');		
	}

	//스티커
	public function sticker()
	{
		parent::cateview(array('Design','스티커'));
		$this->load->view('design/sticker_v');		
	}

	//브로슈어
	public function brochure()
	{
		parent::cateview(array('Design','브로슈어'));
		$this->load->view('design/brochure_v');		
	}
}
