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
        $edata=$this->EmployeeModel->getEmployeeList();
//        echo '<pre>';
//        print_r($edata);
//        echo '</pre>';

        $this->data['emp_count']['total'] = count($edata);
        $rahbar=0;
        $pedagog=0;
        $tehnik=0;
        foreach($edata as $edatum) {

            if ($edatum['type']==1){
                  $rahbar+=1;
            } else if ($edatum['type']==2){
                 $pedagog+=1;
            } else if ($edatum['type'] == 3){
                $tehnik+=1;
            }
        }
        $this->data['emp_count']['rahbar'] =$rahbar;
        $this->data['emp_count']['pedagog'] = $pedagog;
        $this->data['emp_count']['tehnik'] = $tehnik;
        $this->data['emp_count']['att_soni'] = count($this->EmployeeModel->count_att_soni($kollej_id));
        $this->data['emp_count']['malaka_soni'] = count($this->EmployeeModel->malaka_soni($kollej_id));
//        print_r($this->EmployeeModel->count_att_soni($kollej_id));
        $this->data['content'] = $this->load->view('dashboard',$this->data,true);
        $this->view_lib->admin_layout($this->data);
    }

    public function organ_info(){
        $this->data['title']='Асосий сахифа';

        $this->data['title']='Асосий сахифа';

        if($this->session->userdata('logged_in')!=TRUE){
            redirect(base_url('users'));
        }
        $kollej_id=$this->session->userdata('kollej_id');
        $kollej_parent_id=$this->session->userdata('kollej_parent_id');
        if ($kollej_parent_id) {$this->EmployeeModel->kollej_id=$kollej_id;}
        $edata=$this->EmployeeModel->getEmployeeList();
//        echo '<pre>';
//        print_r($edata);
//        echo '</pre>';

        $this->data['emp_count']['total'] = count($edata);
        $rahbar=0;
        $pedagog=0;
        $tehnik=0;
        foreach($edata as $edatum) {

            if ($edatum['type']==1){
                $rahbar+=1;
            } else if ($edatum['type']==2){
                $pedagog+=1;
            } else if ($edatum['type'] == 3){
                $tehnik+=1;
            }
        }
        $this->data['emp_count']['rahbar'] =$rahbar;
        $this->data['emp_count']['pedagog'] = $pedagog;
        $this->data['emp_count']['tehnik'] = $tehnik;
        $this->data['emp_count']['att_soni'] = $this->EmployeeModel->count_att_soni($kollej_id);
        $this->data['content'] = $this->load->view('dashboard',$this->data,true);


        $this->view_lib->admin_layout($this->data);
    }

}