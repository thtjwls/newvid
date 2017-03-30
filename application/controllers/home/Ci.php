<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/* 목표 */
class Ci extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        parent::cateview(array('HOME','CI'));
        $this->load->view('home/ci_v');
    }
}
