<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->login_form();
	}

	//로그인
	public function login_form()
	{
        parent::cateview(array('MEMBERSHIP','로그인'));
		$this->load->view('/user/login_v.php');
	}

	//회원가입
	public function membership()
	{
		parent::cateview(array('MEMBERSHIP','회원가입'));
		$this->load->view('/user/member_add_v');
	}

	//아이디 , 비밀번호 찾기
    public function lose()
    {
        $this->load->view('/user/lose_v');
    }
}