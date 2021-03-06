<?php

class Reports extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function employee_list(){
        $this->data['title'] = 'Муассасалар рўйхати';
        $this->data['alldata']=$this->EmployeeModel->getAllEnterData();
        $this->data['content'] = $this->load->view('/reports/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function stir_list(){
        $this->data['title'] = 'Муассасалар рўйхати';
        $this->data['content'] = $this->load->view('/reports/employee_stir', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function malaka_osh(){
        $this->data['title'] = 'Муассасалар рўйхати';
        $this->data['content'] = $this->load->view('/reports/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }
}