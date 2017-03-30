<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//소개
class Intro extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        parent::cateview(array('HOME','소개'));
        $this->intro();
    }

    public function intro()
    {
        $this->load->view('home/intro_v');
    }
}
