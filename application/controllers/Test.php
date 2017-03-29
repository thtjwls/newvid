<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {
	
	public function get()
	{
		$fp = fopen('/interface/category.json', 'a');

		$this->load->view('get_v',array('fp' => $fp));
	}
	
}