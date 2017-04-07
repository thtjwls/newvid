<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer_m extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}

	/**
	 * 쿼리 
	 * @param  [array] $query 시스템 커맨드 배열
	 * @return array
	 */
	public function exec( $query )
	{
		return exec( $query );
	}

}
?>