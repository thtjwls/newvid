<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Culture extends MY_Controller
{
    public function __construct()
    {

        parent::__construct();
    }

    //문화
    public function index()
    {
        parent::cateview(array('Board','문화게시판'));
        $this->load->view('blog/culture_v');
    }
    
}