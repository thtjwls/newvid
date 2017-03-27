<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
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
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');		
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	public function _remap( $method )
	{

		$url = explode('/',$_SERVER['PHP_SELF']);

		$path_name = array(
			'home'			=> 'HOME',
			'intro'			=> '소개',
			'organization' 	=> '조직도',
			'environment' 	=> '개발환경',
			'ci' 			=> 'CI',
			'web'			=> 'WEB',
			'shoppingmall'	=> '쇼핑몰',
			'homepage'		=> '홈페이지',
			'solustion'		=> '솔루션',
			'publics'		=> '공공기관',
			'webbanner'		=> '웹배너',
			'design'		=> '디자인',
			'card'			=> '명함',
			'leaflet'		=> '전단지',
			'plancart'		=> '현수막',
			'signboard'		=> '간판',
			'banner'		=> '배너',
			'sticker'		=> '스티커',
			'brochure'		=> '브로슈어',
			'blog'			=> '블로그',
			'illust'		=> '일러스트',
			'photoshop'		=> '포토샵',
			'program'		=> 'PHP/JSP',
			'js'			=> 'Javascript',
			'html'			=> 'HTML5/CSS3',
			'board'			=> '게시판',
			'notice'		=> '공지사항',
			'bbs'			=> '자유게시판',
			'qna'			=> 'Q&A',
			'culture'		=> '문화',
			'lecture'		=> '강의'
			);

		$this->load->view('header_v', 
			array(
				'path_name'=>$path_name
			)
		);

		if ( method_exists( $this , $method ) )
		{
			$this->{"{$method}"}();
		}

		$this->load->view('footer_v');
	}

}
