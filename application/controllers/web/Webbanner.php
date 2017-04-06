<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:36
 */
class Webbanner extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        parent::cateview(array('web','웹배너'));
        $this->load->view('web/webbanner_v');
    }
}