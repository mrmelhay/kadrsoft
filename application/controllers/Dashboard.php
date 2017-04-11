<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.04.2017
 * Time: 15:32
 */

class Dashboard extends MY_Controller{

    private $data=array();

    public function __constuct(){
        parent::__construct();

    }

    public function index(){
        $this->data['title']='Асосий сахифа';
        $this->data['username']=$this->session->all_userdata();

        if($this->session->userdata('logged_in')!=TRUE){
            redirect(base_url('users'));
        }
        $this->data['content'] = $this->load->view('dashboard',$this->data,true);
        $this->view_lib->admin_layout($this->data);
    }
}