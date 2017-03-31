<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class MY_Controller extends CI_Controller {

	//page 코드를 리턴한다. 이 값으로 각 페이지를 컨트롤 할수 있다.
	public $pageCode;

	//pageName
	public $pageName;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function _remap( $method, $params = array() )
	{
	
		/**
		 *@param array('페이지코드(String)','컨트롤러 class(String) or 메서드(String) or url(String)','리네임(String)','하위메뉴(Int)) 
		 */		
		
		//대메뉴		
		$mn0 = array(
			array('000000','home/intro','HOME',4),
			array('100000','web/homepage','Web',5),
			array('200000','design/card','Design',7),
			array('300000',"blog/illust",'Blog',7),
			array('400000','board/notice','Board',3)
		);

		//중메뉴
		$mn1[0] = array(
			//pagecode , method , name , subcategory count
			array('001000','intro','소개',0),
			array('002000','organization','조직도',0),
			array('003000','environment','개발환경',0),
			array('004000','ci','CI',0),
		);

		$mn1[1] = array(
			array('101000','homepage','홈페이지',0),
			array('102000','shoppingmall','쇼핑몰',0),
			array('103000','solustion','솔루션',0),
			array('104000','publics','공공기관',0),
			array('105000','webbanner','웹배너',0),
		);

		$mn1[2] = array(
			array('201000','card','명함',0),
			array('202000','leaflet','전단지',0),
			array('203000','plancart','현수막',0),
			array('204000','signboard','간판',0),
			array('205000','banner','배너',0),
			array('206000','sticker','스티커',0),
			array('207000','brochure','브로슈어',0)
		);

		$mn1[3] = array(
			array('301000','illust','일러스트',0),
			array('302000','photoshop','포토샵',0),
			array('303000','program','PHP/JSP',0),
			array('304000','js','Javascript',0),
			array('305000','html','HTML5/CSS3',0),
            array('306000','culture','문화',0),
            array('307000','lecture','강의',0)
		);
		
		$mn1[4] = array(
			array('401000','notice','공지사항',0),
			array('402000','bbs','자유게시판',0),
			array('403000','qna','Q&A',0)
		);
		

		

		$this->load->view('header_v', 
			array(
				'mn0' => $mn0,
				'mn1' => $mn1,
			)
		);

		if ( method_exists( $this , $method ) ) {

			call_user_func_array(array($this, $method), $params);

		}else{
			echo 'URL을 잘못 입력하셨습니다.';
		}

		$this->load->view('footer_v');
	}

	public function cateview( $cateName )
	{
		$this->load->view('path_v',array('cate' => $cateName));
	}

}
