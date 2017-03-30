<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shoppingmall extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        parent::cateview(array('web','쇼핑몰'));
        $this->load->view('web/shoppingmall_v');
    }
}