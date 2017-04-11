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
        $this->data['content'] = $this->load->view('/preferences/organ_list',$this->data,true);
        $this->view_lib->admin_layout($this->data);
   }



}