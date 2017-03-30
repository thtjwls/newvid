<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {
	
	public function get()
	{

		$this->load->view('test');
	}
	
}