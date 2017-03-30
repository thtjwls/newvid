<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-30
 * Time: 오후 6:43
 */
class Sticker extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //스티커
    public function index()
    {
        parent::cateview(array('Design','스티커'));
        $this->load->view('design/sticker_v');
    }

}