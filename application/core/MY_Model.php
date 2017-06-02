<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 11:41
 */
class MY_Model extends CI_Model{

    public $viloyatList=array();
    public $tumanList=array();
    public $kollejList=array();
    public $rollsList=array();
    public $lavozimList=array();
    public $malumotList=array();
    public $mutaxassislikList=array();
    public $mutaxassislikturList=array();
    public $millatiList=array();
    public $davlatList=array();
    public $partiyaList=array();
    public $otmlist=array();
    public $ilmiyunvonList=array();
    public $ilmiydarajaList=array();
    public $ilmiyfanList=array();
    public $malakaturiList=array();
    public $malakaxujjatList=array();
    public $qaytatfanList=array();
    public $qaytatturiList=array();
    public $shartnomatypeList=array();
    public $fanturiList=array();
    public $fanlarList=array();
    public $uqitsohaList=array();
    public $qarindoshList=array();
    public $malakaLavList=array();
    public $mukofotList=array();

    public $viloyat_id=0;
    public $kollej_id=0;
    public $userid=0;
    public $groupList;
    public $otm_id=0;
    public $bank_id=0;
    public $partiya_id=0;
    public $mutax_kodi_id=0;
    public $millati_id=0;
    public $shartnoma_type_id=0;
    public $tillar_id=0;
    public $tillar_turi_id=0;
    public $uqit_soha_id=0;
    public $tuman_id=0;
    public $fan_turi_id=0;


    public function __construct()
    {
        parent::__construct();
        $this->loadViloyat();
        $this->loadKollej();
        $this->loadLavozim();
        $this->loadMalumoti();
        $this->loadMutaxassislik();
        $this->loadMutaxassisliktur();
        $this->loadPartiya();
        $this->loadUnvier();
        $this->loadIlmiyUnvon();
        $this->loadIlmiyDaraja();
        $this->loadIlmiyFanL();
        $this->loadMalakaXujjat();
        $this->loadMalakaTuri();
        $this->loadQaytatturi();
        $this->loadQaytatfan();
        $this->loadShartnomaType();
        $this->loadFanTuri();
        $this->loadFanlar();
        $this->loadUqitSoha();
        $this->loadQarindosh();
        $this->loadMalakaLavozim();
        $this->loadMukofot();
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

    public function loadFanlar(){

        $this->db->select('*');
        $this->db->from('spr_fanlar');
        if ($this->fan_turi_id!=null) {
            $this->db->where('fan_turi_id', $this->fan_turi_id);
        }
        $this->db->order_by('spr_fanlar.fanlar_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->fanlarList[$rows['fanlar_id']]=$rows;
        }
        return $this->fanlarList;
    }

    public function loadUnvier(){
        $this->db->select('*');
        $this->db->from('spr_otm');
        $this->db->order_by('spr_otm.otm_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->otmlist[$rows['otm_id']]=$rows;
        }
        return $this->otmlist;
    }


    public function loadMukofot(){
        $this->db->select('*');
        $this->db->from('spr_dav_mukofot');
        $this->db->order_by('spr_dav_mukofot.mukofot_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->mukofotList[$rows['mukofot_id']]=$rows;
        }
        return $this->mukofotList;
    }

    public function loadMalakaLavozim(){
        $this->db->select('*');
        $this->db->from('spr_malaka_lavozim');
        $this->db->order_by('spr_malaka_lavozim.malaka_lavozim_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->malakaLavList[$rows['malaka_lavozim_id']]=$rows;
        }
        return $this->malakaLavList;
    }

    public function loadQarindosh(){
        $this->db->select('*');
        $this->db->from('spr_qarindoshlar');
        $this->db->order_by('spr_qarindoshlar.qarindosh_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->qarindoshList[$rows['qarindosh_id']]=$rows;
        }
        return $this->qarindoshList;
    }

    public function loadUqitSoha(){
        $this->db->select('*');
        $this->db->from('spr_uqit_soha');
        $this->db->order_by('spr_uqit_soha.uqit_soha_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->uqitsohaList[$rows['uqit_soha_id']]=$rows;
        }
        return $this->uqitsohaList;
    }


    public function loadFanTuri(){
        $this->db->select('*');
        $this->db->from('spr_fan_turi');
        $this->db->order_by('spr_fan_turi.fan_turi_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->fanturiList[$rows['fan_turi_id']]=$rows;
        }
        return $this->fanturiList;
    }

    public function loadShartnomaType(){
        $this->db->select('*');
        $this->db->from('spr_shartnoma_type');
        $this->db->order_by('spr_shartnoma_type.shartnoma_type_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->shartnomatypeList[$rows['shartnoma_type_id']]=$rows;
        }
        return $this->shartnomatypeList;
    }


    public function loadQaytatfan(){
        $this->db->select('*');
        $this->db->from('spr_qayta_fan');
        $this->db->order_by('spr_qayta_fan.qayta_fan_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->qaytatfanList[$rows['qayta_fan_id']]=$rows;
        }
        return $this->qaytatfanList;
    }


    public function loadQaytatturi(){
        $this->db->select('*');
        $this->db->from('spr_qayta_turi');
        $this->db->order_by('spr_qayta_turi.qayta_turi_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->qaytatturiList[$rows['qayta_turi_id']]=$rows;
        }
        return $this->qaytatturiList;
    }


    public function loadMalakaTuri(){
        $this->db->select('*');
        $this->db->from('spr_malaka_turi');
        $this->db->order_by('spr_malaka_turi.malaka_turi_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->malakaturiList[$rows['malaka_turi_id']]=$rows;
        }
        return $this->malakaturiList;
    }

    public function loadMalakaXujjat(){
        $this->db->select('*');
        $this->db->from('spr_malaka_xujjat');
        $this->db->order_by('spr_malaka_xujjat.malaka_xujjat_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->malakaxujjatList[$rows['malaka_xujjat_id']]=$rows;
        }
        return $this->malakaxujjatList;
    }


    public function loadIlmiyUnvon(){
        $this->db->select('*');
        $this->db->from('spr_ilmiy_unvon');
        $this->db->order_by('spr_ilmiy_unvon.ilmiy_unvon_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->ilmiyunvonList[$rows['ilmiy_unvon_id']]=$rows;
        }
        return $this->ilmiyunvonList;
    }


    public function loadIlmiyFanL(){
        $this->db->select('*');
        $this->db->from('spr_ilm_fan');
        $this->db->order_by('spr_ilm_fan.ilm_fan_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->ilmiyfanList[$rows['ilm_fan_id']]=$rows;
        }
        return $this->ilmiyfanList;
    }


    public function loadIlmiydaraja(){
        $this->db->select('*');
        $this->db->from('spr_ilmiy_daraja');
        $this->db->order_by('spr_ilmiy_daraja.ilm_daraja_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->ilmiydarajaList[$rows['ilm_daraja_id']]=$rows;
        }
        return $this->ilmiydarajaList;
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

    public function loadLavozim(){
        $this->db->select('*');
        $this->db->from('spr_lavozim');
//        $this->db->where('viloyat_id',$this->viloyat_id);
        $this->db->order_by('spr_lavozim.lavozim_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->lavozimList[$rows['lavozim_id']]=$rows;
        }
        return $this->lavozimList;
    }

    public function loadMalumoti(){
        $this->db->select('*');
        $this->db->from('spr_malumot');
        $this->db->order_by('spr_malumot.malumot_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->malumotList[$rows['malumot_id']]=$rows;
        }
        return $this->malumotList;
    }

    public function loadMutaxassislik(){
        $this->db->select('*');
        $this->db->from('spr_mutaxasislik');
        $this->db->order_by('spr_mutaxasislik.mutax_kodi_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->mutaxassislikList[$rows['mutax_kodi_id']]=$rows;
        }
        return $this->mutaxassislikList;
    }

    public function loadMutaxassisliktur(){
        $this->db->select('*');
        $this->db->from('spr_mutax_turi');
        $this->db->order_by('spr_mutax_turi.mutax_turi_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->mutaxassislikturList[$rows['mutax_turi_id']]=$rows;
        }
        return $this->mutaxassislikturList;
    }

    public function loadMillati(){
        $this->db->select('*');
        $this->db->from('spr_millat');
        $this->db->order_by('spr_millat.millat_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->millatiList[$rows['millat_id']]=$rows;
        }
        return $this->millatiList;
    }

    public function loadDavlat(){
        $this->db->select('*');
        $this->db->from('spr_davlat');
        $this->db->order_by('spr_davlat.davlat_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->davlatList[$rows['davlat_id']]=$rows;
        }
        return $this->davlatList;
    }

    public function loadPartiya(){
        $this->db->select('*');
        $this->db->from('spr_partiya');
        $this->db->order_by('spr_partiya.partiya_id','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $this->partiyaList[$rows['partiya_id']]=$rows;
        }
        return $this->partiyaList;
    }




}