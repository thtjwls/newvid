<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Bbs extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //게시판
    public function index()
    {
        $this->lists();
    }

    public function lists()
    {
        parent::cateview(array('Board','자유게시판'));
        $this->load->view('board/bbs_v');
    }

    public function write()
    {
        //parent::cateview(array('Board','자유게시판','작성하기'));
        $this->load->view('lib/writer_v');
    }

}