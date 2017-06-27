<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.04.2017
 * Time: 15:32
 */

class Dashboard extends MY_Controller{

    public function __construct(){
        parent::__construct();

    }

    public function index(){
        $this->data['title']='Асосий сахифа';

        if($this->session->userdata('logged_in')!=TRUE){
            redirect(base_url('users'));
        }
        $kollej_id=$this->session->userdata('kollej_id');
        $kollej_parent_id=$this->session->userdata('kollej_parent_id');
        if ($kollej_parent_id) {$this->EmployeeModel->kollej_id=$kollej_id;}

        $this->data['emp_count'] = count($this->EmployeeModel->getEmployeeList());
        $this->data['content'] = $this->load->view('dashboard',$this->data,true);
        $this->view_lib->admin_layout($this->data);
    }

    public function organ_info(){
        $this->data['title']='Асосий сахифа';

        if($this->session->userdata('logged_in')!=TRUE){
            redirect(base_url('users'));
        }

        $this->data['content'] = $this->load->view('dashboard',$this->data,true);
        $this->view_lib->admin_layout($this->data);
    }

}