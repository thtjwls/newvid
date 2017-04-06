<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Qna extends MY_Controller
{
    public function __construct()
    {

        parent::__construct();
    }

    //qna
    public function index()
    {
        $this->lists();
    }

    public function lists()
    {
        parent::cateview(array('Board','Q&A'));
        $this->load->view('board/qna_v');
    }

    public function write()
    {
        $this->load->view('lib/writer_v');
    }

}