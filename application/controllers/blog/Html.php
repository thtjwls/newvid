<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Html extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //HTML/CSS
    public function index()
    {
        parent::cateview(array('Blog','HTML/CSS'));
        $this->load->view('blog/html_v');
    }

}