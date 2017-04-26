<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.04.2017
 * Time: 11:44
 */
class Employee extends MY_Controller{


    public function __construct()
    {
        parent::__construct();
    }

    public function employees(){

        $this->data['title'] = 'Ходимлар рўйхати';
        $this->data['content'] = $this->load->view('/employee/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function archives(){
        $this->data['title'] = 'Ходимлар рўйхати';
        $this->data['content'] = $this->load->view('/employee/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function stir(){
        $this->data['title'] = 'Ходимлар рўйхати';
        $this->data['content'] = $this->load->view('/employee/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }
}