<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.04.2017
 * Time: 17:03
 */
class EmployeeModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function getEmployeeList(){
        $kollej="";
        if (isset($this->kollej_id) && $this->kollej_id>0) {$kollej=$this->db->where('spr_kollej.kollej_id',$this->kollej_id);}
        $this->db->select('*');
        $this->db->from('d_kadr');
        $this->db->join('d_kadr_items_bind', 'd_kadr_items_bind.kadrid = d_kadr.kadrid', 'left');
        $this->db->join('spr_viloyat', 'spr_viloyat.viloyat_id = d_kadr.viloyat_id', 'left');
        $this->db->join('spr_tuman', 'spr_tuman.tuman_id = d_kadr.tuman_id', 'left');
        $this->db->join('spr_kollej', 'spr_kollej.kollej_id = d_kadr_items_bind.kollej_id', 'left');
        $this->db->join('spr_lavozim', 'spr_lavozim.lavozim_id = d_kadr.lavozim_id', 'left');
        $this->db->join('spr_malumot', 'spr_malumot.malumot_id = d_kadr.malumot_id', 'left');

        $kollej;
        $this->db->order_by('d_kadr.kadrid','ASC');
        $query=$this->db->get();
        return $query->result_array();
    }


    public function createOrUpdate($data = [])
    {
        $result= $this->db->select("*")
            ->from('d_kadr_items_bind')
            ->where('kadrid',$data['kadrid'])
            ->get();
        $row= $result->num_rows();

        if ($row) {
            $this->db->update('d_kadr', $data);
            $this->db->where('kadrid',$data['kadrid']);
            if ($this->db->affected_rows()) {
                return true;
            } else {
                return false;
            }
        }else{
            $this->db->insert('d_kadr', $data);
            if ($this->db->affected_rows()) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }


    }

    public function createOrUpdateItemsBind($data = []){


       $result= $this->db->select("*")
            ->from('d_kadr_items_bind')
             ->where('kadrid',$data['kadrid'])
            ->get();
           $row= $result->num_rows();
           if ($row){
               $this->db->update('d_kadr_items_bind', $data);
            $this->db->where('kadrid',$data['kadrid']);
           }else{
            $this->db->insert('d_kadr_items_bind', $data);
            echo "Insert";
        }

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }




}