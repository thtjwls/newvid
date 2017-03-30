<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//redirect('/blog/illust','refresh',301);
		$this->total();
	}
	
	public function illust()
	{
		parent::cateview(array('Blog','일러스트'));
		$this->load->view('blog/illust_v');
	}

	public function photoshop()
	{
		parent::cateview(array('Blog','Photoshop'));
		$this->load->view('blog/photoshop_v');
	}

	public function program()
	{
		parent::cateview(array('Blog','Program'));
		$this->load->view('blog/program_v');
	}

	public function js()
	{
		parent::cateview(array('Blog','Javascript'));
		$this->load->view('blog/js_v');
	}

	public function html()
	{
		parent::cateview(array('Blog','HTML/CSS'));
		$this->load->view('blog/html_v');
	}

	public function total()
	{
		parent::cateview(array('Blog','블로그'));
		$this->load->view('blog/total_v');
	}
}