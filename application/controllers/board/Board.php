<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('/board/notice');
	}

	//공지사항
	public function notice()
	{
		parent::cateview(array('Board','공지사항'));
		$this->load->view('board/notice_v');
	}

	//자유게시판
    /*
	public function bbs( $mod = 'list' )
	{
		$category = $this->uri->segment(2);

		switch ( $mod ) {
			
			case 'list' :
				parent::cateview(array('Board','자유게시판'));
				$this->load->view('board/bbs_v',array('mod'=>$mod));
				break;
			case 'write' : 
				parent::cateview(array('Board','자유게시판','작성하기'));
				$this->load->view('lib/writer_v',array( 'mod'=>$mod, 'category'=>$category ));
				break;
			default :
				break;
		}
		
	}
    */
	
	//qna
	public function qna()
	{
		parent::cateview(array('Board','Q&A'));
		$this->load->view('board/qna_v');
	}

	//문화
	public function culture()
	{
		parent::cateview(array('Board','문화게시판'));
		$this->load->view('board/culture_v');
	}

	//강의
	public function lecture()
	{
		parent::cateview(array('Board','강의'));
		$this->load->view('board/lecture_v');
	}

}