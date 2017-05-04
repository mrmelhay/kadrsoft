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
        $this->db->select('d_kadr.*,spr_kollej.kollej_id,spr_lavozim.*,spr_malumot.*');
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
            ->from('d_kadr')
            ->where('kadrid',$data['kadrid'])
            ->get();
        $query=$result->row_array();
        $row= $result->num_rows();

        if ($row>0) {
            $this->db->where('kadrid',$query['kadrid'])->update('d_kadr', $data);
            return $query['kadrid'];
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
             ->where('d_kadr_items_bind.kadrid',$data['kadrid'])
             ->get();
           $query=$result->row_array();
           $row= $result->num_rows();
           if ($row>0){
               $this->db->where('d_kadr_items_bind.kadrid',$query['kadrid'])->update('d_kadr_items_bind', $data);
           }else{
                $this->db->insert('d_kadr_items_bind', $data);
        }

    }

    public function read_by_data($user_id = null)
    {
        return $this->db->select("*")
                        ->from("d_kadr")
                        ->join('spr_lavozim','spr_lavozim.lavozim_id=d_kadr.lavozim_id','left')
                        ->where('kadrid',$user_id)
                        ->get()
                        ->row_array();
    }

    public function read_by_passports($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_passport")
            ->join('spr_davlat','spr_davlat.davlat_id=d_passport.davlat_id','left')
            ->join('spr_viloyat','spr_viloyat.viloyat_id=d_passport.viloyat_id','left')
            ->join('spr_tuman','spr_tuman.tuman_id=d_passport.tuman_id','left')
            ->where('d_passport.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_passport($user_id = null)
    {
        return $this->db->select("d_passport.*")
            ->from("d_passport")
            ->join('spr_davlat','spr_davlat.davlat_id=d_passport.davlat_id','left')
            ->join('spr_viloyat','spr_viloyat.viloyat_id=d_passport.viloyat_id','left')
            ->join('spr_tuman','spr_tuman.tuman_id=d_passport.tuman_id','left')
            ->where('d_passport.passport_id',$user_id)
            ->get()
            ->row_array();
    }

    public function insert_date_info($data=[],$type){
        switch ($type){
            case 1:
                $result= $this->db->select("*")
                    ->from('d_passport')
                    ->where('d_passport.passport_id',$data['passport_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('passport_id',$query['passport_id'])->update('d_passport', $data);
                    return $query['passport_id'];
                }else{
                    $this->db->insert('d_passport', $data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;

            case 2:
                $this->db->insert("d_passport",$data);
                break;

            case 3:
                $this->db->insert("d_uqigan_tm",$data);
                break;
        }

    }
    public function read_by_isDirector($kadrid = null)
    {
        $this->lavozimList[''];
    }



}