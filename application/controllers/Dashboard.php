<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.04.2017
 * Time: 15:32
 */

class Dashboard extends MY_Controller{


    public function __constuct(){

    }

    public function index(){

        $this->pagination();
    }
}