<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10.04.2017
 * Time: 8:44
 */

class MY_Controller extends CI_Controller{

    public $data=array();

    public function __construct(){
        parent::__construct();

//        if($this->session->userdata('logged_in')!=TRUE){
//            redirect(base_url('users'));
//        }
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->model('PreferencesModel');
        $this->load->model('EmployeeModel');
        $this->data['username']=$this->session->all_userdata();
        $this->load->library('Fileupload');
        $this->load->library('Word');
        $this->load->library('Excel');
    }
}