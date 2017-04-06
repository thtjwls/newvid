<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Notice extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //공지사항
    public function index()
    {
        parent::cateview(array('Board','공지사항'));
        $this->load->view('board/notice_v');
    }

}