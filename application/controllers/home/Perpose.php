<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//목표
class Perpose extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        parent::cateview(array('HOME','목표'));
        $this->load->view('home/purpose_v');
    }
}
