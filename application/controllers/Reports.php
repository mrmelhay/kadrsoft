<?php

class Reports extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function employees(){
        $this->data['title'] = 'Муассасалар рўйхати';
        $this->data['content'] = $this->load->view('/reports/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function stir_list(){
        $this->data['title'] = 'Муассасалар рўйхати';
        $this->data['content'] = $this->load->view('/reports/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function malaka_osh(){
        $this->data['title'] = 'Муассасалар рўйхати';
        $this->data['content'] = $this->load->view('/reports/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }
}