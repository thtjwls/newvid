<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	public function get( $id = '' )
	{
		$this->load->view('get_v', array('id' => $id));
	}
	
}