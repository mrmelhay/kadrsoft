<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.04.2017
 * Time: 15:21
 */
class Examples extends CI_Controller
{

    public function __construct(){
        parent::__constuct();
    }

    public function index(){
        echo "Hello World";
    }
}