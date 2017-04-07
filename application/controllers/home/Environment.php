<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//목표
class Environment extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        parent::cateview(array('HOME','제작환경'));
        $this->load->view('home/environment_v');
    }
}
