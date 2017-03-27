<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	public function index()
	{
		$this->notice();
	}

	//공지사항
	public function notice()
	{
		$this->load->view('board/notice_v');
	}

	//자유게시판
	public function bbs( $mod = 'list' )
	{
		$category = $this->uri->segment(2);

		switch ( $mod ) {
			
			case 'list' :
				$this->load->view('board/bbs_v',array('mod'=>$mod));
				break;
			case 'write' : 

				$this->load->view('lib/writer_v',array( 'mod'=>$mod, 'category'=>$category ));
				break;
			default :
				break;
		}
		
	}
	
	//qna
	public function qna()
	{
		$this->load->view('board/qna_v');
	}

	//문화
	public function culture()
	{
		$this->load->view('board/culture_v');
	}

	//강의
	public function lecture()
	{
		$this->load->view('board/lecture_v');
	}

}