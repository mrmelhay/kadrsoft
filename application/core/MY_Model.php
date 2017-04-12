<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 11:41
 */
class MY_Model extends CI_Model
{

    public function __constuct()
    {
        parent::__construct();
    }


    public function getTableList(){

    }

    public function delete($table,$field){
        $this->db->delete($table,$field);

    }


}