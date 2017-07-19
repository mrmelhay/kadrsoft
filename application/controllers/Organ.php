<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.04.2017
 * Time: 11:44
 */
class Organ extends MY_Controller{


    public function __construct()
    {
        parent::__construct();
    }

    public function organ_list(){

        if($this->session->userdata('logged_in')!=TRUE){
            redirect(base_url('users'));
        }
        $kollej_id=$this->session->userdata('kollej_id');
        $kollej_parent_id=$this->session->userdata('kollej_parent_id');

        $this->PreferencesModel->kollej_id=$kollej_id;
        $this->data['title'] = 'Ташкилот маълумотлари рўйхати';
        $this->data['organ'] = $this->PreferencesModel->getKollej();
//        print_r($this->data);
        $this->data['content'] = $this->load->view('/organ/org_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }




}