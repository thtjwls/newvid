<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//소개
class Organization extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        parent::cateview(array('HOME','조직도'));
        $this->load->view('home/organization_v');
    }
}
