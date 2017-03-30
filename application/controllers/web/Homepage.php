<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        parent::cateview(array('web','홈페이지'));
        $this->load->view('web/homepage_v');
    }
}