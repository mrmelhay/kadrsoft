<?php

/**
 * Created by PhpStorm.
 * User: ideveloper
 * Date: 25.08.17
 * Time: 15:38
 */
class Help extends MY_Controller
{

    public function __construct(){
        parent::__construct();

    }

    public function index()
    {

        $this->data['content'] = $this->load->view('book/index',$this->data,true);
        $this->view_lib->admin_layout($this->data);
    }
}