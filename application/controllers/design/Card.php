<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Card extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //명함
    public function index()
    {
        parent::cateview(array('Design','명함'));
        $this->load->view('design/card_v');
    }

}