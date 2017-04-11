<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10.04.2017
 * Time: 8:44
 */

class MY_Controller extends CI_Controller{

    public function __constuct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }

    
    public function search(){

    }
    public function pagination(){

    }
}