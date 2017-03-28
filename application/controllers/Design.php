<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends MY_Controller {
	
	//명함
	public function card()
	{
		$this->load->view('design/card_v');		
	}

	//전단지
	public function leaflet()
	{
		$this->load->view('design/leaflet_v');		
	}

	//현수막
	public function plancart()
	{
		$this->load->view('design/plancart_v');		
	}

	//간판
	public function signboard()
	{
		$this->load->view('design/signboard_v');		
	}

	//배너
	public function banner()
	{
		$this->load->view('design/banner_v');		
	}

	//스티커
	public function sticker()
	{
		$this->load->view('design/sticker_v');		
	}

	//브로슈어
	public function brochure()
	{
		$this->load->view('design/brochure_v');		
	}
}
