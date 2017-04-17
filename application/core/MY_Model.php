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

    public $viloyatList=array();
    public $tumanList=array();
    public $viloyat_id=0;
    public $kollej_id=0;

    public function __construct()
    {
        parent::__construct();
        $this->loadViloyat();
    }


    public function loadViloyat(){

        $this->db->select('*');
        $this->db->from('spr_viloyat');
        $this->db->order_by('spr_viloyat.viloyat_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->viloyatList[$rows['viloyat_id']]=$rows;
        }
        return $this->viloyatList;
    }

    public function loadTuman(){

        $this->db->select('*');
        $this->db->from('spr_tuman');
        $this->db->where('viloyat_id',$this->viloyat_id);
        $this->db->order_by('spr_tuman.tuman_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->tumanList[$rows['tuman_id']]=$rows;
        }
        return $this->tumanList;
    }

    public function getTableList(){

    }

    public function delete($table,$field){
        $this->db->delete($table,$field);

    }


}