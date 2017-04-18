<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.04.2017
 * Time: 13:44
 */

class PreferencesModel extends MY_Model{


    public $organrules=array(
        'kollej_name'=>array('field'=>'kollej_name','label'=>'Муассаса номи','rules'=>'required|max_length[150]'),
        'viloyat_id'=>array('field'=>'viloyat_id','label'=>'Вилоят','rules'=>'required|max_length[32]'),
        'tuman_id'=>array('field'=>'tuman_id','label'=>'Туман','rules'=>'required|max_length[32]'),
        'kollej_adres'=>array('field'=>'kollej_adres','label'=>'Манзил','rules'=>'required|max_length[32]'),
        'empl_count1'=>array('field'=>'empl_count1','label'=>'Ходимлар сони','rules'=>'required|max_length[32]'),
        'empl_count2'=>array('field'=>'empl_count2','label'=>'Пeдагогик ходимлар сони','rules'=>'required|max_length[32]'),
        'students_count'=>array('field'=>'students_count','label'=>'Талабалар сони','rules'=>'required|max_length[32]'),
        'phone'=>array('field'=>'phone','label'=>'Телефон','rules'=>'required|max_length[32]'),
        'email'=>array('field'=>'email','label'=>'Электрон почта','rules'=>'required|max_length[32]'),
        'website'=>array('field'=>'website','label'=>'Веб сайт','rules'=>'required|max_length[32]'),
    );


    public function __construct(){
        parent::__construct();
    }

    public function getKollej(){
        $kollej="";
        if (isset($this->kollej_id) && $this->kollej_id>0) {$kollej=$this->db->where('spr_kollej.kollej_id',$this->kollej_id);}
        $this->db->select('spr_kollej.*,
                           spr_viloyat.viloyat,spr_tuman.tuman,d_kadr_items_bind.is_director,d_kadr.name_f,d_kadr.name_i,d_kadr.name_o');
        $this->db->from('spr_kollej');
        $this->db->join('spr_viloyat', 'spr_viloyat.viloyat_id = spr_kollej.viloyat_id', 'left');
        $this->db->join('spr_tuman', 'spr_tuman.tuman_id = spr_kollej.tuman_id', 'left');
        $this->db->join('d_kadr_items_bind', 'd_kadr_items_bind.kollej_id = spr_kollej.kollej_id', 'left');
        $this->db->join('d_kadr', 'd_kadr.kadrid = d_kadr_items_bind.kadrid', 'left');
        $kollej;
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



    public function getCountry(){
        $davlat="";
       if (isset($this->davlat_id) && $this->davlat_id>0) {$davlat=$this->db->where('spr_davlat.davlat_id',$this->davlat_id);}
       $this->db->select('*');
        $this->db->from('spr_davlat');
        $davlat;
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getUniver(){
        $this->db->select('*');
        $this->db->from('spr_otm');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getPartiya(){
        $this->db->select('*');
        $this->db->from('spr_partiya');
        $query=$this->db->get();
        return $query->result_array();
    }
    public function getNation(){
        $this->db->select('*');
        $this->db->from('spr_millati');
        $query=$this->db->get();
        return $query->result_array();
    }
    public function getContract(){
        $this->db->select('*');
        $this->db->from('spr_shartnoma_type');
        $query=$this->db->get();
        return $query->result_array();
    }
    public function getLanguages(){
        $this->db->select('*');
        $this->db->from('spr_tillar');
        $query1=$this->db->get();
        $this->db->select('*');
        $this->db->from('spr_tillar_turi');
        $query2=$this->db->get();
        return array('tillar'=>$query1->result_array(),'tillar_turi'=>$query2->result_array());
    }

    public function getStudyType(){
        $this->db->select('*');
        $this->db->from('spr_uqit_soha');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getDirections(){
        $this->db->select('*');
        $this->db->from('spr_mutax_kodi');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getViloyatDropList($selected = false){
        if ($this->viloyatList){
            foreach ($this->viloyatList as $key => $row) {
                $sel = ($row['viloyat_id']== $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['viloyat_id'] . '"'.$sel.'">';
                                print $row['viloyat'] . '</option>';
            }
        }
    }

    public function getTumanDropList($viloyat,$selected = false){
        $userdata=array();
        $this->viloyat_id=$viloyat;
        $this->loadTuman();
        if ($this->tumanList){
            foreach ($this->tumanList as $key => $row) {
                $sel = ($row['tuman_id']== $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['tuman_id'] . '"'.$sel.'">';
                print $row['tuman'] . '</option>';
            }
        }
    }


    public function getKollejDropList($selected = false){
//        $userdata=array();
//        $this->viloyat_id=$viloyat;

        if ($this->kollejList){
            foreach ($this->kollejList as $key => $row) {
                $sel = ($row['kollej_id']== $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['kollej_id'] . '"'.$sel.'">';
                print $row['kollej_name'] . '</option>';
            }
        }
    }


    public function save_organ($data){
        $this->db->insert('spr_kollej',$data);
        if ($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function update_organ($data){
        $this->db->where('spr_kollej.kollej_id',$data['kollej_id']);
        $this->db->update('spr_kollej',$data);
        if ($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_organ($data){

        $this->db->delete('spr_kollej',$data);
        if ($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function save_davlat($data){
        $this->db->insert('spr_davlat',$data);
        if ($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function update_davlat($data){
        $this->db->where('spr_davlat.davlat_id',$data['davlat_id']);
        $this->db->update('spr_davlat',$data);
        if ($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_davlat($data){

        $this->db->delete('spr_davlat',$data);
        if ($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}