<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Leaflet extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //전단지
    public function index()
    {
        parent::cateview(array('Design','전단지'));
        $this->load->view('design/leaflet_v');
    }

}