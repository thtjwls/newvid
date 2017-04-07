<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Illust extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //일러스트
    public function index()
    {
        parent::cateview(array('Blog','일러스트'));
        $this->load->view('blog/illust_v');
    }

}