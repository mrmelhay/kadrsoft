<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.04.2017
 * Time: 13:44
 */

class PreferencesModel extends MY_Model{


    public function __construct(){
        parent::__construct();
    }

    public function getKollej(){
        $this->db->select('*');
        $this->db->from('spr_kollej');
        $this->db->join('spr_viloyat', 'spr_viloyat.viloyat_id = spr_kollej.viloyat_id', 'left');
        $this->db->join('spr_tuman', 'spr_tuman.tuman_id = spr_kollej.tuman_id', 'left');
        $this->db->join('d_kadr_items_bind', 'd_kadr_items_bind.kollej_id = spr_kollej.kollej_id', 'left');
        $this->db->join('d_kadr', 'd_kadr.kadrid = d_kadr_items_bind.kadrid', 'left');
        $this->db->order_by('spr_kollej.kollej_id','ASC');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getRegions(){
        $this->db->select('*');
        $this->db->from('spr_viloyat');
        $this->db->join('spr_tuman', 'spr_viloyat.viloyat_id = spr_tuman.viloyat_id', 'left');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getBanks(){
        $this->db->select('*');
        $this->db->from('spr_bank');
//        $this->db->join('spr_tuman', 'spr_viloyat.viloyat_id = spr_tuman.viloyat_id', 'left');
        $query=$this->db->get();
        return $query->result_array();
    }


}