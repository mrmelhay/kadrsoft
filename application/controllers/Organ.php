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

        $this->data['title'] = 'Ташкилот маълумотлари рўйхати';
        $this->data['content'] = $this->load->view('/organ/org_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }




}