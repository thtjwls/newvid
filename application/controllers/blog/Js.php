<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Js extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //PHP/JSP
    public function index()
    {
        parent::cateview(array('Blog','Javascript'));
        $this->load->view('blog/js_v');
    }

}