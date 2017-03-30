<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Photoshop extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //포토샵
    public function index()
    {
        parent::cateview(array('Blog','Photoshop'));
        $this->load->view('blog/photoshop_v');
    }

}