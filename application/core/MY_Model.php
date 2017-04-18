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
    public $kollejList=array();
    public $rollsList=array();
    public $viloyat_id=0;
    public $kollej_id=0;
    public $userid=0;
    public $groupList;

    public function __construct()
    {
        parent::__construct();
        $this->loadViloyat();
        $this->loadKollej();

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

    public function loadKollej(){
        $this->db->select('*');
        $this->db->from('spr_kollej');
//        $this->db->where('viloyat_id',$this->viloyat_id);
        $this->db->order_by('spr_kollej.kollej_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->kollejList[$rows['kollej_id']]=$rows;
        }
        return $this->kollejList;
    }

    public function loadGroups(){
        $this->db->select('*');
        $this->db->from('user_groups');
//        $this->db->where('viloyat_id',$this->viloyat_id);
        $this->db->order_by('user_groups.group_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->groupList[$rows['group_id']]=$rows;
        }
        return $this->groupList;
    }

    public function loadRolls(){
        $this->db->select('*');
        $this->db->from('user_rolles');
//        $this->db->where('viloyat_id',$this->viloyat_id);
        $this->db->order_by('user_rolles.rolle_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->rollsList[$rows['rolle_id']]=$rows;
        }
        return $this->rollsList;
    }


    public function getTableList(){

    }

    public function delete($table,$field){
        $this->db->delete($table,$field);

    }


}