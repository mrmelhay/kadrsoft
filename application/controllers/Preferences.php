<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 17:01
 */

class Preferences extends MY_Controller{


    public function __construct(){
        parent::__construct();

    }

    public function organ(){
        $this->data['title']='Муассасалар рўйхати';
        $this->data['kollejs']=$this->PreferencesModel->getKollej();
        $this->data['content'] = $this->load->view('/preferences/organ_list',$this->data,true);
        $this->view_lib->admin_layout($this->data);
   }

    public function region(){
        $this->data['title']='Ҳудудлар рўйхати';
        $this->data['regions']=$this->PreferencesModel->getRegions();
        $this->data['content'] = $this->load->view('/preferences/region_list',$this->data,true);
        $this->view_lib->admin_layout($this->data);
    }

    public function banks(){
        $this->data['title']='Банклар рўйхати';
        $this->data['banks']=$this->PreferencesModel->getBanks();
        $this->data['content'] = $this->load->view('/preferences/bank_list',$this->data,true);
        $this->view_lib->admin_layout($this->data);
    }



}