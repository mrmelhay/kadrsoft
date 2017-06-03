<?php
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
            ->join('d_kadr_items_bind','d_kadr_items_bind.kadrid=d_kadr.kadrid','left')
            ->join('spr_kollej','spr_kollej.kollej_id=d_kadr_items_bind.kollej_id','left')
            ->join('spr_lavozim','spr_lavozim.lavozim_id=d_kadr.lavozim_id','left')
            ->join('spr_viloyat','spr_viloyat.viloyat_id=d_kadr.viloyat_id','left')
            ->join('spr_tuman','spr_tuman.tuman_id=d_kadr.tuman_id','left')
            ->join('spr_millat','spr_millat.millat_id=d_kadr.millat_id','left')
            ->join('spr_partiya','spr_partiya.partiya_id=d_kadr.partiya_id','left')
            ->join('spr_malumot','spr_malumot.malumot_id=d_kadr.malumot_id','left')
            ->join('d_uqigan_tm','d_uqigan_tm.kadr_id=d_kadr.kadrid','left')
            ->join('spr_otm','spr_otm.otm_id=d_uqigan_tm.kadr_id','left')
            ->join('spr_mutaxasislik','spr_mutaxasislik.mutax_kodi_id=d_uqigan_tm.mutax_kodi_id','left')
            ->join('d_ilmiy_daraja','d_ilmiy_daraja.kadr_id =d_kadr.kadrid','left')
            ->join('spr_ilmiy_daraja','spr_ilmiy_daraja.ilm_daraja_id =d_ilmiy_daraja.ilm_daraja_id','left')
            ->join('d_ilmiy_unvon','d_ilmiy_unvon.kadr_id =d_kadr.kadrid','left')
            ->join('spr_ilmiy_unvon','spr_ilmiy_unvon.ilmiy_unvon_id =d_ilmiy_unvon.ilmiy_unvon_id','left')
            ->join('d_tillar_bind','d_tillar_bind.kadr_id =d_kadr.kadrid','left')
            ->join('spr_tillar','spr_tillar.tillar_id =d_tillar_bind.tillar_id','left')
            ->join('spr_tillar_turi','spr_tillar_turi.tillar_turi_id =d_tillar_bind.tillar_turi_id','left')
            ->join('d_mukofot','d_mukofot.kadr_id=d_kadr.kadrid', 'left')
            ->join('spr_dav_mukofot', 'spr_dav_mukofot.mukofot_id=d_mukofot.mukofot_id', 'left')
            ->join('d_saylov', 'd_saylov.kadr_id=d_kadr.kadrid', 'left')
            ->join('spr_saylov', 'spr_saylov.saylov_id=d_saylov.saylov_id', 'left')
            ->join('d_mehnat_faol','d_mehnat_faol.kadr_id=d_kadr.kadrid', 'left')
            ->join('d_oila', 'd_oila.kadr_id=d_kadr.kadrid', 'left')
            ->join('spr_qarindoshlar', 'spr_qarindoshlar.qarindosh_id=d_oila.qarindosh_id', 'left')
            ->where('d_kadr.kadrid',$user_id)
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

    public function read_by_uqigantms($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_uqigan_tm")
            ->join('spr_davlat','spr_davlat.davlat_id=d_uqigan_tm.davlat_id','left')
            ->join('spr_otm','spr_otm.otm_id=d_uqigan_tm.otm_id','left')
            ->join('spr_malumot','spr_malumot.malumot_id=d_uqigan_tm.malumot_id','left')
            ->join('spr_mutaxasislik','spr_mutaxasislik.mutax_kodi_id=d_uqigan_tm.mutax_kodi_id','left')
            ->where('d_uqigan_tm.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_uqigantm($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_uqigan_tm")
            ->join('spr_davlat','spr_davlat.davlat_id=d_uqigan_tm.davlat_id','left')
            ->join('spr_otm','spr_otm.otm_id=d_uqigan_tm.otm_id','left')
            ->join('spr_malumot','spr_malumot.malumot_id=d_uqigan_tm.malumot_id','left')
            ->join('spr_mutaxasislik','spr_mutaxasislik.mutax_kodi_id=d_uqigan_tm.mutax_kodi_id','left')
            ->where('d_uqigan_tm.uqigan_tm_id',$user_id)
            ->get()
            ->row_array();
    }


    public function read_by_ilmiyunvons($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_ilmiy_unvon")
            ->join('spr_ilmiy_unvon','spr_ilmiy_unvon.ilmiy_unvon_id=d_ilmiy_unvon.ilmiy_unvon_id','left')
            ->where('d_ilmiy_unvon.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_ilmiyunvon($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_ilmiy_unvon")
            ->join('spr_ilmiy_unvon','spr_ilmiy_unvon.ilmiy_unvon_id=d_ilmiy_unvon.ilmiy_unvon_id','left')
            ->where('d_ilmiy_unvon.ilmiy_un_id',$user_id)
            ->get()
            ->row_array();
    }


    public function read_by_ilmiydarajas($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_ilmiy_daraja")
            ->join('spr_ilmiy_daraja','spr_ilmiy_daraja.ilm_daraja_id=d_ilmiy_daraja.ilm_daraja_id','left')
            ->join('spr_ilm_fan','spr_ilm_fan.ilm_fan_id=d_ilmiy_daraja.ilm_fan_id','left')
            ->where('d_ilmiy_daraja.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_ilmiydaraja($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_ilmiy_daraja")
            ->join('spr_ilmiy_daraja','spr_ilmiy_daraja.ilm_daraja_id=d_ilmiy_daraja.ilm_daraja_id','left')
            ->join('spr_ilm_fan','spr_ilm_fan.ilm_fan_id=d_ilmiy_daraja.ilm_fan_id','left')
            ->where('d_ilmiy_daraja.d_ilmiy_daraja_id',$user_id)
            ->get()
            ->row_array();
    }


    public function read_by_malakas($user_id = null)
    {
        return $this->db->select("*")
                ->from("d_malaka")
                ->join('spr_malaka_turi','spr_malaka_turi.malaka_turi_id=d_malaka.malaka_turi_id','left')
                ->join('spr_otm','spr_otm.otm_id=d_malaka.otm_id','left')
                ->join('spr_davlat','spr_davlat.davlat_id=d_malaka.davlat_id','left')
                ->where('d_malaka.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_malaka($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_malaka")
            ->join('spr_malaka_turi','spr_malaka_turi.malaka_turi_id=d_malaka.malaka_turi_id','left')
            ->join('spr_otm','spr_otm.otm_id=d_malaka.otm_id','left')
            ->join('spr_davlat','spr_davlat.davlat_id=d_malaka.davlat_id','left')
            ->where('d_malaka.malaka_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_qaytamalakas($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_qaytat")
            ->join('spr_otm','spr_otm.otm_id=d_qaytat.otm_id','left')
            ->join('spr_qayta_fan','spr_qayta_fan.qayta_fan_id=d_qaytat.qayta_fan_id','left')
            ->join('spr_qayta_turi','spr_qayta_turi.qayta_turi_id=d_qaytat.qayta_turi_id','left')
            ->join('spr_malaka_xujjat','spr_malaka_xujjat.malaka_xujjat_id=d_qaytat.malaka_xujjat_id','left')
            ->where('d_qaytat.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_qaytamalaka($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_qaytat")
            ->join('spr_qayta_fan','spr_qayta_fan.qayta_fan_id=d_qaytat.qayta_fan_id','left')
            ->join('spr_qayta_turi','spr_qayta_turi.qayta_turi_id=d_qaytat.qayta_turi_id','left')
            ->join('spr_malaka_xujjat','spr_malaka_xujjat.malaka_xujjat_id=d_qaytat.malaka_xujjat_id','left')
            ->where('d_qaytat.qaytat_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_mehnats($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_mehnat_faol")
            ->where('d_mehnat_faol.kadr_id',$user_id)
            ->order_by('ordering','asc')
            ->get()
            ->result_array();
    }

    public function read_by_mehnat($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_mehnat_faol")
             ->where('d_mehnat_faol.mehnat_id',$user_id)
            ->order_by('ordering','asc')
            ->get()
            ->row_array();
    }

    public function read_by_muassasaishs($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_muassasa_ish")
            ->join('spr_lavozim','spr_lavozim.lavozim_id=d_muassasa_ish.lavozim_id','left')
            ->join('spr_shartnoma_type','spr_shartnoma_type.shartnoma_type_id=d_muassasa_ish.shartnoma_type_id','left')
            ->where('d_muassasa_ish.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_muassasaish($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_muassasa_ish")
            ->join('spr_lavozim','spr_lavozim.lavozim_id=d_muassasa_ish.lavozim_id','left')
            ->join('spr_shartnoma_type','spr_shartnoma_type.shartnoma_type_id=d_muassasa_ish.shartnoma_type_id','left')
            ->where('d_muassasa_ish.muassasa_ish_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_fanlars($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_uqit_fan")
            ->join('spr_fan_turi','spr_fan_turi.fan_turi_id=d_uqit_fan.fan_turi_id','left')
            ->join('spr_fanlar','spr_fanlar.fanlar_id=d_uqit_fan.fanlar_id','left')
            ->join('spr_uqit_soha','spr_uqit_soha.uqit_soha_id=d_uqit_fan.uqit_soha_id','left')
            ->where('d_uqit_fan.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_fanlar($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_uqit_fan")
            ->join('spr_fan_turi','spr_fan_turi.fan_turi_id=d_uqit_fan.fan_turi_id','left')
            ->join('spr_fanlar','spr_fanlar.fanlar_id=d_uqit_fan.fanlar_id','left')
            ->join('spr_uqit_soha','spr_uqit_soha.uqit_soha_id=d_uqit_fan.uqit_soha_id','left')
            ->where('d_uqit_fan.uqit_fan_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_attestasiyas($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_attestatsiya")
            ->join('spr_malaka_lavozim','spr_malaka_lavozim.malaka_lavozim_id=d_attestatsiya.malaka_lavozim_id','left')
            ->join('spr_tillar','spr_tillar.tillar_id=d_attestatsiya.tillar_id','left')
            ->join('spr_mutaxasislik','spr_mutaxasislik.mutax_kodi_id=d_attestatsiya.mutax_kodi_id','left')
            ->where('d_attestatsiya.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_attestasiya($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_attestatsiya")
            ->join('spr_malaka_lavozim','spr_malaka_lavozim.malaka_lavozim_id=d_attestatsiya.malaka_lavozim_id','left')
            ->join('spr_tillar','spr_tillar.tillar_id=d_attestatsiya.tillar_id','left')
            ->join('spr_mutaxasislik','spr_mutaxasislik.mutax_kodi_id=d_attestatsiya.mutax_kodi_id','left')
            ->where('d_attestatsiya.attestatsiya_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_oilas($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_oila")
            ->join('spr_qarindoshlar','spr_qarindoshlar.qarindosh_id=d_oila.qarindosh_id','left')
            ->join('spr_viloyat','spr_viloyat.viloyat_id=d_oila.viloyat_id','left')
            ->join('spr_tuman','spr_tuman.tuman_id=d_oila.tuman_id','left')
            ->where('d_oila.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_oila($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_oila")
            ->join('spr_qarindoshlar','spr_qarindoshlar.qarindosh_id=d_oila.qarindosh_id','left')
            ->join('spr_viloyat','spr_viloyat.viloyat_id=d_oila.viloyat_id','left')
            ->join('spr_tuman','spr_tuman.tuman_id=d_oila.tuman_id','left')
            ->where('d_oila.d_oila_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_mukofots($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_mukofot")
            ->join('spr_dav_mukofot','spr_dav_mukofot.mukofot_id=d_mukofot.mukofot_id','left')
            ->where('d_mukofot.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_mukofot($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_mukofot")
            ->join('spr_dav_mukofot','spr_dav_mukofot.mukofot_id=d_mukofot.mukofot_id','left')
            ->where('d_mukofot.dmukofot_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_moderators($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_moderator")
            ->join('spr_lavozim','spr_lavozim.lavozim_id=d_moderator.lavozim_id','left')
            ->join('spr_fanlar','spr_fanlar.fanlar_id=d_moderator.fanlar_id','left')
            ->where('d_moderator.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_moderator($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_moderator")
            ->join('spr_lavozim','spr_lavozim.lavozim_id=d_moderator.lavozim_id','left')
            ->join('spr_fanlar','spr_fanlar.fanlar_id=d_moderator.fanlar_id','left')
            ->where('d_moderator.moderator_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_sudlangan($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_sudlanganlik")
            ->where('d_sudlanganlik.sudlanganlik_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_sudlangans($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_sudlanganlik")
            ->where('d_sudlanganlik.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_intizomchora($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_intizomchora")
            ->where('d_intizomchora.intizomchora_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_intizomchoras($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_intizomchora")
            ->where('d_intizomchora.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_ijodiy($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_ijodiyish")
            ->where('d_ijodiyish.ijodiyish_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_ijodiys($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_ijodiyish")
            ->where('d_ijodiyish.kadr_id',$user_id)
            ->get()
            ->result_array();
    }


    public function read_by_zahira($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_zahira")
            ->join('spr_lavozim','spr_lavozim.lavozim_id=d_zahira.lavozim_id','left')
            ->where('d_zahira.zahira_id',$user_id)
            ->get()
            ->row_array();
    }

    public function read_by_zahiras($user_id = null)
    {
        return $this->db->select("*")
            ->from("d_zahira")
            ->join('spr_lavozim','spr_lavozim.lavozim_id=d_zahira.lavozim_id','left')
            ->where('d_zahira.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_languages($user_id = null)
    {
        return $this->db->select("d_tillar_bind.*,spr_tillar.tillar_nomi,spr_tillar_turi.tillar_turi_nomi")
            ->from("d_tillar_bind")
            ->join('spr_tillar','spr_tillar.tillar_id=d_tillar_bind.tillar_id','left')
            ->join('spr_tillar_turi','spr_tillar_turi.tillar_turi_id=d_tillar_bind.tillar_turi_id','left')
            ->where('d_tillar_bind.kadr_id',$user_id)
            ->get()
            ->result_array();
    }

    public function read_by_language($user_id = null)
    {
        return $this->db->select("d_tillar_bind.*,spr_tillar.tillar_nomi,spr_tillar_turi.tillar_turi_nomi")
            ->from("d_tillar_bind")
            ->join('spr_tillar','spr_tillar.tillar_id=d_tillar_bind.tillar_id','left')
            ->join('spr_tillar_turi','spr_tillar_turi.tillar_turi_id=d_tillar_bind.tillar_turi_id','left')
            ->where('d_tillar_bind.tillar_bind_id',$user_id)
            ->get()
            ->row_array();
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
                $result= $this->db->select("*")
                    ->from('d_tillar_bind')
                    ->where('d_tillar_bind.tillar_bind_id',$data['tillar_bind_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('tillar_bind_id',$query['tillar_bind_id'])->update('d_tillar_bind', $data);
                    return $query['tillar_bind_id'];
                }else{
                    $this->db->insert('d_tillar_bind', $data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;

            case 3:
                $result= $this->db->select("*")
                    ->from('d_uqigan_tm')
                    ->where('d_uqigan_tm.uqigan_tm_id',$data['uqigan_tm_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_uqigan_tm.uqigan_tm_id',$query['uqigan_tm_id'])->update('d_uqigan_tm', $data);
                    return $query['uqigan_tm_id'];
                }else{
                    $this->db->insert("d_uqigan_tm",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;
            case 4:
                $result= $this->db->select("*")
                    ->from('d_ilmiy_unvon')
                    ->where('d_ilmiy_unvon.ilmiy_un_id',$data['ilmiy_un_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_ilmiy_unvon.ilmiy_un_id',$query['ilmiy_un_id'])->update('d_ilmiy_unvon', $data);
                    return $query['ilmiy_un_id'];
                }else{
                    $this->db->insert("d_ilmiy_unvon",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;

            case 5:
                $result= $this->db->select("*")
                    ->from('d_ilmiy_daraja')
                    ->where('d_ilmiy_daraja.d_ilmiy_daraja_id',$data['d_ilmiy_daraja_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_ilmiy_daraja.d_ilmiy_daraja_id',$query['d_ilmiy_daraja_id'])->update('d_ilmiy_daraja', $data);
                    return $query['d_ilmiy_daraja_id'];
                }else{
                    $this->db->insert("d_ilmiy_daraja",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;
            case 6:
                $result= $this->db->select("*")
                    ->from('d_malaka')
                    ->where('d_malaka.malaka_id',$data['malaka_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_malaka.malaka_id',$query['malaka_id'])->update('d_malaka', $data);
                    return $query['malaka_id'];
                }else{
                    $this->db->insert("d_malaka",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;

            case 7:
                $result= $this->db->select("*")
                    ->from('d_qaytat')
                    ->where('d_qaytat.qaytat_id',$data['qaytat_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_qaytat.qaytat_id',$query['qaytat_id'])->update('d_qaytat', $data);
                    return $query['qaytat_id'];
                }else{
                    $this->db->insert("d_qaytat",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;

            case 8:
                $result= $this->db->select("*")
                    ->from('d_mehnat_faol')
                    ->where('d_mehnat_faol.mehnat_id',$data['mehnat_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_mehnat_faol.mehnat_id',$query['mehnat_id'])->update('d_mehnat_faol', $data);
                    return $query['mehnat_id'];
                }else{
                    $this->db->insert("d_mehnat_faol",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;
            case 9:
                $result= $this->db->select("*")
                    ->from('d_muassasa_ish')
                    ->where('d_muassasa_ish.muassasa_ish_id',$data['muassasa_ish_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_muassasa_ish.muassasa_ish_id',$query['muassasa_ish_id'])->update('d_muassasa_ish', $data);
                    return $query['muassasa_ish_id'];
                }else{
                    $this->db->insert("d_muassasa_ish",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;

            case 10:
                $result= $this->db->select("*")
                    ->from('d_uqit_fan')
                    ->where('d_uqit_fan.uqit_fan_id',$data['uqit_fan_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_uqit_fan.uqit_fan_id',$query['uqit_fan_id'])->update('d_uqit_fan', $data);
                    return $query['muassasa_ish_id'];
                }else{
                    $this->db->insert("d_uqit_fan",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;
            case 11:
                $result= $this->db->select("*")
                    ->from('d_attestatsiya')
                    ->where('d_attestatsiya.attestatsiya_id',$data['attestatsiya_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_attestatsiya.attestatsiya_id',$query['attestatsiya_id'])->update('d_attestatsiya', $data);
                    return $query['attestatsiya_id'];
                }else{
                    $this->db->insert("d_attestatsiya",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }

                break;
            case 12:
                $result= $this->db->select("*")
                    ->from('d_oila')
                    ->where('d_oila.d_oila_id',$data['d_oila_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_oila.d_oila_id',$query['d_oila_id'])->update('d_oila', $data);
                    return $query['d_oila_id'];
                }else{
                    $this->db->insert("d_oila",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;
            case 13:
                $result= $this->db->select("*")
                    ->from('d_mukofot')
                    ->where('d_mukofot.dmukofot_id',$data['dmukofot_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_mukofot.dmukofot_id',$query['dmukofot_id'])->update('d_mukofot', $data);
                    return $query['dmukofot_id'];
                }else{
                    $this->db->insert("d_mukofot",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;
            case 14:
                $result= $this->db->select("*")
                    ->from('d_moderator')
                    ->where('d_moderator.moderator_id',$data['moderator_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_moderator.moderator_id',$query['moderator_id'])->update('d_moderator', $data);
                    return $query['moderator_id'];
                }else{
                    $this->db->insert("d_moderator",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;

            case 15:
                $result= $this->db->select("*")
                    ->from('d_sudlanganlik')
                    ->where('d_sudlanganlik.sudlanganlik_id',$data['sudlanganlik_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_sudlanganlik.sudlanganlik_id',$query['sudlanganlik_id'])->update('d_sudlanganlik', $data);
                    return $query['sudlanganlik_id'];
                }else{
                    $this->db->insert("d_sudlanganlik",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;

            case 16:
                $result= $this->db->select("*")
                    ->from('d_intizomchora')
                    ->where('d_intizomchora.intizomchora_id',$data['intizomchora_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_intizomchora.intizomchora_id',$query['intizomchora_id'])->update('d_intizomchora', $data);
                    return $query['intizomchora_id'];
                }else{
                    $this->db->insert("d_intizomchora",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;

            case 17:
                $result= $this->db->select("*")
                    ->from('d_ijodiyish')
                    ->where('d_ijodiyish.ijodiyish_id',$data['ijodiyish_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_ijodiyish.ijodiyish_id',$query['ijodiyish_id'])->update('d_ijodiyish', $data);
                    return $query['ijodiyish_id'];
                }else{
                    $this->db->insert("d_ijodiyish",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;
            case 18:
                $result= $this->db->select("*")
                    ->from('d_zahira')
                    ->where('d_zahira.zahira_id',$data['zahira_id'])
                    ->get();
                $query=$result->row_array();
                $row= $result->num_rows();
                if ($row>0) {
                    $this->db->where('d_zahira.zahira_id',$query['zahira_id'])->update('d_zahira', $data);
                    return $query['zahira_id'];
                }else{
                    $this->db->insert("d_zahira",$data);
                    if ($this->db->affected_rows()) {
                        return $this->db->insert_id();
                    } else {
                        return false;
                    }
                }
                break;
        }
    }

    public function delete_data_info($data=[],$type){
        switch ($type){
            case 1:
                   $this->db->where('passport_id',$data['passport_id'])->delete('d_passport', $data);
                 break;

            case 2:
                   $this->db->where('tillar_bind_id',$data['tillar_bind_id'])->delete('d_tillar_bind', $data);
                break;

            case 3:
                $this->db->where('uqigan_tm_id',$data['uqigan_tm_id'])->delete('d_uqigan_tm', $data);
                break;
            case 4:
                $this->db->where('ilmiy_un_id',$data['ilmiy_un_id'])->delete('d_ilmiy_unvon', $data);
                break;
            case 5:
                $this->db->where('d_ilmiy_daraja_id',$data['d_ilmiy_daraja_id'])->delete('d_ilmiy_daraja', $data);
                break;
            case 6:
                $this->db->where('malaka_id',$data['malaka_id'])->delete('d_malaka', $data);
                break;
            case 7:
                $this->db->where('qaytat_id',$data['qaytat_id'])->delete('d_qaytat', $data);
                break;
            case 8:
                $this->db->where('mehnat_id',$data['mehnat_id'])->delete('d_mehnat_faol', $data);
                break;
            case 9:
                $this->db->where('muassasa_ish_id',$data['muassasa_ish_id'])->delete('d_muassasa_ish', $data);
                break;
            case 10:
                $this->db->where('uqit_fan_id',$data['uqit_fan_id'])->delete('d_uqit_fan', $data);
                break;
            case 11:
                $this->db->where('attestatsiya_id',$data['attestatsiya_id'])->delete('d_attestatsiya', $data);
                break;
            case 12:
                $this->db->where('uqit_fan_id',$data['uqit_fan_id'])->delete('d_uqit_fan', $data);
                break;
            case 13:
                $this->db->where('d_mukofot.dmukofot_id',$data['dmukofot_id'])->delete('d_mukofot', $data);
                break;
            case 14:
                $this->db->where('d_moderator.moderator_id',$data['moderator_id'])->delete('d_moderator', $data);
                break;
            case 15:
                $this->db->where('d_sudlanganlik.sudlanganlik_id',$data['sudlanganlik_id'])->delete('d_sudlanganlik', $data);
                break;
            case 16:
                $this->db->where('d_intizomchora.intizomchora_id',$data['intizomchora_id'])->delete('d_intizomchora', $data);
                break;
            case 17:
                $this->db->where('d_ijodiyish.ijodiyish_id',$data['ijodiyish_id'])->delete('d_ijodiyish', $data);
                break;
            case 18:
                $this->db->where('d_zahira.zahira_id',$data['zahira_id'])->delete('d_zahira', $data);
                break;
        }
    }
    public function read_by_isDirector($kadrid = null)
    {
        $this->lavozimList[''];
    }



}