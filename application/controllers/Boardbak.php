<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('board_m');
		$this->load->helper(array('url','date'));
	}

	public function index()
	{
		$this->lists();
	}

	public function _remap($method)
	{
		//헤더
		$this->load->view('header_v');

		if ( method_exists($this, $method) )
		{
			$this->{"{$method}"}();
		}

		//푸터
		$this->load->view('footer_v');
	}

	public function lists()
	{
		//$this->output->enable_profiler(TRUE);
		//검색어 초기화
		$search_word = $page_url = '';
		$uri_segment = 5;

		//주소 중에서 q(검색어) 세그먼트가 있는지 검사하기 위해 주소를 배열로 반환
		$uri_array = $this->segment_explode($this->uri->uri_string());

		if ( in_array('q' , $uri_array ) ) {
			//주소에 검색어가 있을 경우의 처리. 즉 검색 시
			$search_word = urldecode( $this->url_explode( $uri_array, 'q' ) );

			//페이지 네이션용 주소
			$page_url = '/q/' . $search_word;
			$uri_segment = 7;
		}


		//페이지네이션 라이브러리 로딩
		$this->load->library('pagination');

		//페이지네이션 설정
		$config['base_url'] = '/bbs/board/lists/ci_board' . $page_url . '/page'; //페이징주소

		//게시물 전체게수
		$config['total_rows'] = $this->board_m->get_list($this->uri->segment(3) , 'count' , '', '' , $search_word);

		//한페이지 표시할 게시물 수
		$config['per_page'] = 5;

		//페이지 번호가 위치한 세그먼트
		$config['uri_segment'] = $uri_segment;

		//페이지네이션 초기화
		$this->pagination->initialize($config);

		//페이징 링크를 생성하여 view 에서 사용할 변수에 할당
		$data['pagination'] = $this->pagination->create_links();

		//게시물 목록을 불러오기 위한 offset, limit 값 가져오기
		$page = $this->uri->segment($uri_segment, 1);

		if ( $page > 1 )
		{
			$start = ( ($page/$config['per_page']) ) * $config['per_page'];
		}
		else
		{
			$start = ($page - 1) * $config['per_page'];
		}

		$limit = $config['per_page'];

		$data['list'] = $this->board_m->get_list($this->uri->segment(3) , '', $start, $limit , $search_word );

		$this->load->view('board/list_v',$data);
	}

	public function url_explode( $url , $key )
	{
		$cnt = count($url);
		for ( $i = 0; $cnt > $i; $i++ ) {
			if ( $url[$i] == $key ) {
				$k = $i + 1;
				return $url[$k];
			}
		}
	}

	public function segment_explode($seg) {
		//세그먼트 앞뒤 '/' 제거 후 url 을 배열로 반환
		$len = strlen( $seg );

		if ( substr( $seg , 0 , 1 ) == '/' )
		{
			$seg = substr( $seg , 1 , $len );
		}
		$len = strlen($seg);

		if ( substr( $seg, -1 ) == '/' )
		{
			$seg = substr($seg , 0 , $len - 1);
		}

		$seg_exp = explode("/" , $seg);

		return $seg_exp;
	}

	/* 게시물 보기 */
	public function view()
	{
		//$this->output->enable_profiler(TRUE);

		//게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
		$data['views'] = $this->board_m->get_view($this->uri->segment(3) , $this->uri->segment(4));

		//view 호출
		$this->load->view('board/view_v', $data);
	}

}
