<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 11:37
 */
class Users extends MY_Controller{

    private $data=array();
    private $view;

    public function __construct(){

    }
    public function index(){
        $this->data['title']='Òèçèìãà êèğèø';
        $this->data['content']=$this->load->view('/user/login',$this->data,true);
        $this->view_lib->layout($this->data);
    }


}