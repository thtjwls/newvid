<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:35
 */
class Publics extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        parent::cateview(array('web','공공기관'));
        $this->load->view('web/publics_v');
    }
}