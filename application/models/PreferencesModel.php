<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.04.2017
 * Time: 13:44
 */
class PreferencesModel extends MY_Model
{


    public $organrules = array(
        'kollej_name' => array('field' => 'kollej_name', 'label' => 'Муассаса номи', 'rules' => 'required|max_length[150]'),
        'viloyat_id' => array('field' => 'viloyat_id', 'label' => 'Вилоят', 'rules' => 'required|max_length[32]'),
        'tuman_id' => array('field' => 'tuman_id', 'label' => 'Туман', 'rules' => 'required|max_length[32]'),
        'kollej_adress' => array('field' => 'kollej_adress', 'label' => 'Манзил', 'rules' => 'required|max_length[32]'),
        'empl_count1' => array('field' => 'empl_count1', 'label' => 'Ходимлар сони', 'rules' => 'required|max_length[32]'),
        'empl_count2' => array('field' => 'empl_count2', 'label' => 'Пeдагогик ходимлар сони', 'rules' => 'required|max_length[32]'),
        'students_count' => array('field' => 'students_count', 'label' => 'Талабалар сони', 'rules' => 'required|max_length[32]'),
        'phone' => array('field' => 'phone', 'label' => 'Телефон', 'rules' => 'required|max_length[32]'),
        'email' => array('field' => 'email', 'label' => 'Электрон почта', 'rules' => 'required|max_length[32]'),
        'website' => array('field' => 'website', 'label' => 'Веб сайт', 'rules' => 'required|max_length[32]'),
    );


    public function __construct()
    {
        parent::__construct();
    }

    public function getKollej()
    {
        $kollej = "";
        if (isset($this->kollej_id) && $this->kollej_id > 0) {
            $kollej = $this->db->where('spr_kollej.kollej_id', $this->kollej_id);
        }
        $this->db->select('spr_kollej.*,
                           spr_viloyat.viloyat,spr_tuman.tuman,d_kadr_items_bind.is_director,d_kadr.name_f,d_kadr.name_i,d_kadr.name_o');
        $this->db->from('spr_kollej');
        $this->db->join('spr_viloyat', 'spr_viloyat.viloyat_id = spr_kollej.viloyat_id', 'left');
        $this->db->join('spr_tuman', 'spr_tuman.tuman_id = spr_kollej.tuman_id', 'left');
        $this->db->join('d_kadr_items_bind', 'd_kadr_items_bind.kollej_id = spr_kollej.kollej_id', 'left');
        $this->db->join('d_kadr', 'd_kadr.kadrid = d_kadr_items_bind.kadrid', 'left');
        $this->db->where('d_kadr_items_bind.is_director', 1);
        $kollej;
        $this->db->order_by('spr_kollej.kollej_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRegions()
    {
        $this->db->select('*');
        $this->db->from('spr_viloyat');
        $this->db->join('spr_tuman', 'spr_viloyat.viloyat_id = spr_tuman.viloyat_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBanks()
    {
        $bank = "";
        if (isset($this->bank_id) && $this->bank_id > 0) {
            $bank = $this->db->where('spr_bank.bank_id', $this->bank_id);
        }
        $this->db->select('*');
        $this->db->from('spr_bank');
        $bank;
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getCountry()
    {
        $davlat = "";
        if (isset($this->davlat_id) && $this->davlat_id > 0) {
            $davlat = $this->db->where('spr_davlat.davlat_id', $this->davlat_id);
        }
        $this->db->select('*');
        $this->db->from('spr_davlat');
        $davlat;
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUniver()
    {
        $otm = "";
        if (isset($this->otm_id) && $this->otm_id > 0) {
            $otm = $this->db->where('spr_otm.otm_id', $this->otm_id);
        }
        $this->db->select('*');
        $this->db->from('spr_otm');
        $otm;
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUniverDropList($selected = false)
    {
        if ($this->otmlist) {
            foreach ($this->otmlist as $key => $row) {
                $sel = ($row['otm_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['otm_id'] . '"' . $sel . '">';
                print $row['otm_name'] . '</option>';
            }
        }
    }

    public function getQaytatfanDropList($selected = false)
    {   $this->loadQaytatfan();
        if ($this->qaytatfanList) {
            foreach ($this->qaytatfanList as $key => $row) {
                $sel = ($row['qayta_fan_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['qayta_fan_id'] . '"' . $sel . '">';
                print $row['qayta_fan_name'] . '</option>';
            }
        }
    }

    public function getQaytatturiDropList($selected = false)
    {  $this->loadQaytatturi();
        if ($this->qaytatturiList) {
            foreach ($this->qaytatturiList as $key => $row) {
                $sel = ($row['qayta_turi_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['qayta_turi_id'] . '"' . $sel . '">';
                print $row['qayta_turi_name'] . '</option>';
            }
        }
    }

    public function getIlmiyunvonDropList($selected = false)
    {
        if ($this->ilmiyunvonList) {
            foreach ($this->ilmiyunvonList as $key => $row) {
                $sel = ($row['ilmiy_unvon_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['ilmiy_unvon_id'] . '"' . $sel . '">';
                print $row['ilmiy_unvon_nomi'] . '</option>';
            }
        }
    }

    public function getIlmiyDarajaDropList($selected = false)
    {
        if ($this->ilmiydarajaList) {
            foreach ($this->ilmiydarajaList as $key => $row) {
                $sel = ($row['ilm_daraja_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['ilm_daraja_id'] . '"' . $sel . '">';
                print $row['ilm_daraja_name'] . '</option>';
            }
        }
    }

    public function getIlmiyFanDropList($selected = false)
    {
        if ($this->ilmiyfanList) {
            foreach ($this->ilmiyfanList as $key => $row) {
                $sel = ($row['ilm_fan_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['ilm_fan_id'] . '"' . $sel . '">';
                print $row['ilm_fan_name'] . '</option>';
            }
        }
    }

    public function getMalakaTuriDropList($selected = false){
        $this->loadMalakaTuri();
        if ($this->malakaturiList){
            foreach ($this->malakaturiList as $key => $row) {
                $sel = ($row['malaka_turi_id']== $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['malaka_turi_id'] . '"'.$sel.'">';
                print $row['malaka_turi_name'] . '</option>';
            }
        }
    }

    public function getMalakaLavDropList($selected = false){

        if ($this->malakaLavList){
            foreach ($this->malakaLavList as $key => $row) {
                $sel = ($row['malaka_lavozim_id']== $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['malaka_lavozim_id'] . '"'.$sel.'">';
                print $row['malaka_lavozim_name'] . '</option>';
            }
        }
    }

    public function getMalakaXujjatDropList($selected = false){
        $this->loadMalakaXujjat();
        if ($this->malakaxujjatList){
            foreach ($this->malakaxujjatList as $key => $row) {
                $sel = ($row['malaka_xujjat_id']== $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['malaka_xujjat_id'] . '"'.$sel.'">';
                print $row['malaka_xujjat_name'] . '</option>';
            }
        }
    }

    public function getPartiya()
    {
        $partiya = "";
        if (isset($this->partiya_id) && $this->partiya_id > 0) {
            $partiya = $this->db->where('spr_partiya.partiya_id', $this->partiya_id);
        }
        $this->db->select('*');
        $this->db->from('spr_partiya');
        $partiya;
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNation()
    {
        $nation = "";
        if (isset($this->millat_id) && $this->millat_id > 0) {
            $nation = $this->db->where('spr_millat.millat_id', $this->millat_id);
        }
        $this->db->select('*');
        $this->db->from('spr_millat');
        $nation;
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getContract()
    {
        $sprcontract = "";
        if (isset($this->shartnoma_type_id) && $this->shartnoma_type_id > 0) {
            $sprcontract = $this->db->where('spr_shartnoma_type.shartnoma_type_id', $this->shartnoma_type_id);
        }
        $this->db->select('*');
        $this->db->from('spr_shartnoma_type');
        $sprcontract;
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLanguages()
    {
        $langs = "";
        if (isset($this->tillar_id) && $this->tillar_id > 0) {
            $langs = $this->db->where('spr_tillar.tillar_id', $this->tillar_id);
        }
        $this->db->select('*');
        $this->db->from('spr_tillar');
        $langs;
        $query1 = $this->db->get();
        $langs = "";
        if (isset($this->tillar_turi_id) && $this->tillar_turi_id > 0) {
            $langs = $this->db->where('spr_tillar_turi.tillar_turi_id', $this->tillar_turi_id);
        }
        $this->db->select('*');
        $this->db->from('spr_tillar_turi');
        $langs;
        $query2 = $this->db->get();
        return array('tillar' => $query1->result_array(), 'tillar_turi' => $query2->result_array());
    }

    public function getStudyType()
    {
        $uqit_soha = "";
        if (isset($this->uqit_soha_id) && $this->uqit_soha_id > 0) {
            $uqit_soha = $this->db->where('spr_uqit_soha.uqit_soha_id', $this->uqit_soha_id);
        }
        $this->db->select('*');
        $this->db->from('spr_uqit_soha');
        $uqit_soha;
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDirections()
    {
        $direction = "";
        if (isset($this->mutax_kodi_id) && $this->mutax_kodi_id > 0) {
            $direction = $this->db->where('spr_mutaxasislik.mutax_kodi_id', $this->mutax_kodi_id);
        }
        $this->db->select('*');
        $this->db->from('spr_mutaxasislik');
        $direction;
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getViloyatDropList($selected = false)
    {
        if ($this->viloyatList) {
            foreach ($this->viloyatList as $key => $row) {
                $sel = ($row['viloyat_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['viloyat_id'] . '"' . $sel . '">';
                print $row['viloyat'] . '</option>';
            }
        }
    }

    public function getTumanDropList($viloyat, $selected = false)
    {
        //  $userdata=array();
        print "<option value=''>Танланг...</option>";
        $this->viloyat_id = $viloyat;
        $this->loadTuman();
        if ($this->tumanList) {
            foreach ($this->tumanList as $key => $row) {
                $sel = ($row['tuman_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['tuman_id'] . '"' . $sel . '">';
                print $row['tuman'] . '</option>';
            }
        }
    }


    public function getFanlarDropList($fan_turi=null, $selected = false)
    {
        //  $userdata=array();
        print "<option value=''>Танланг...</option>";
        $this->fan_turi_id = $fan_turi;
        $this->loadFanlar();
        if ($this->fanlarList) {
            foreach ($this->fanlarList as $key => $row) {
                $sel = ($row['fanlar_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['fanlar_id'] . '"' . $sel . '">';
                print $row['fanlar_name'] . '</option>';
            }
        }
    }


    public function getKollejDropList($parent_id, $level = 0, $spacer, $selected = false)
    {
//        $userdata=array();
//        $this->viloyat_id=$viloyat;

        if ($this->kollejList) {
            foreach ($this->kollejList as $key => $row) {
                $sel = ($row['kollej_id'] == $selected) ? " selected=\"selected\"" : "";
                if ($parent_id == $row['kollej_parent_id']) {
                    print '<option value="' . $row['kollej_id'] . '"' . $sel . '">';
                    for ($i = 0; $i < $level; $i++)
                        print $spacer;
                    print $row['kollej_name'] . '</option>';

                    $level++;
                    $this->getKollejDropList($key, $level, $spacer, $selected);
                    $level--;
                }
            }
        }
    }

    public function getMukofotDropList($selected = false)
    {
        if ($this->mukofotList) {
            foreach ($this->mukofotList as $key => $row) {
                $sel = ($row['mukofot_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['mukofot_id'] . '"' . $sel . '">';
                print $row['mukofot_name'] . '</option>';
            }
        }
    }


    public function getLavozimDropList($selected = false)
    {
        if ($this->lavozimList) {
            foreach ($this->lavozimList as $key => $row) {
                $sel = ($row['lavozim_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['lavozim_id'] . '"' . $sel . '">';
                print $row['lavozim_name'] . '</option>';
            }
        }
    }

    public function getSaylovDropList($selected = false)
    {
        if ($this->saylovList) {
            foreach ($this->saylovList as $key => $row) {
                $sel = ($row['saylov_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['saylov_id'] . '"' . $sel . '">';
                print $row['saylov_name'] . '</option>';
            }
        }
    }


    public function getQarindoshDropList($selected = false)
    {
        if ($this->qarindoshList) {
            foreach ($this->qarindoshList as $key => $row) {
                $sel = ($row['qarindosh_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['qarindosh_id'] . '"' . $sel . '">';
                print $row['qarindosh_name'] . '</option>';
            }
        }
    }


    public function getUqitSohaDropList($selected = false)
    {
        if ($this->uqitsohaList) {
            foreach ($this->uqitsohaList as $key => $row) {
                $sel = ($row['uqit_soha_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['uqit_soha_id'] . '"' . $sel . '">';
                print $row['uqit_soha_name'] . '</option>';
            }
        }
    }

    public function getMalumotDropList($selected = false)
    {
        if ($this->malumotList) {
            foreach ($this->malumotList as $key => $row) {
                $sel = ($row['malumot_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['malumot_id'] . '"' . $sel . '">';
                print $row['malumot_name'] . '</option>';
            }
        }
    }

    public function getShartnomatypeDropList($selected = false)
    {
        if ($this->shartnomatypeList) {
            foreach ($this->shartnomatypeList as $key => $row) {
                $sel = ($row['shartnoma_type_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['shartnoma_type_id'] . '"' . $sel . '">';
                print $row['shartnoma_type_name'] . '</option>';
            }
        }
    }

    public function getFanTuriDropList($selected = false)
    {
        if ($this->fanturiList) {
            foreach ($this->fanturiList as $key => $row) {
                $sel = ($row['fan_turi_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['fan_turi_id'] . '"' . $sel . '">';
                print $row['fan_turi_name'] . '</option>';
            }
        }
    }

    public function getMutaxasislikDropList($selected = false)
    {
        if ($this->mutaxassislikList) {
            foreach ($this->mutaxassislikList as $key => $row) {
                $sel = ($row['mutax_kodi_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['mutax_kodi_id'] . '"' . $sel . '">';
                print $row['mutax_kodi'] . ' - ' . $row['mutax_kodi_name'] . '</option>';
            }
        }
    }

    public function getMutaxasislikTurDropList($selected = false)
    {

        if ($this->mutaxassislikturList) {
            foreach ($this->mutaxassislikturList as $key => $row) {
                $sel = ($row['mutax_turi_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['mutax_turi_id'] . '"' . $sel . '">';
                print $row['mutax_turi_name'] . '</option>';
            }
        }
    }

    public function getMillatiDropList($selected = false)
    {
        $this->loadMillati();
        if ($this->millatiList) {
            foreach ($this->millatiList as $key => $row) {
                $sel = ($row['millat_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['millat_id'] . '"' . $sel . '">';
                print $row['millat_name'] . '</option>';
            }
        }
    }

    public function getDavlatDropList($selected = false)
    {
        $this->loadDavlat();
        if ($this->davlatList) {
            foreach ($this->davlatList as $key => $row) {
                $sel = ($row['davlat_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['davlat_id'] . '"' . $sel . '">';
                print $row['gov_uzc'] . '</option>';
            }
        }
    }

    public function getParpiaDropList($selected = false)
    {

        if ($this->partiyaList) {
            foreach ($this->partiyaList as $key => $row) {
                $sel = ($row['partiya_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['partiya_id'] . '"' . $sel . '">';
                print $row['partiya_name'] . '</option>';
            }
        }
    }

    public function getLanguageDropList($selected = false)
    {
        $lang = $this->getLanguages();
        if ($lang['tillar']) {
            foreach ($lang['tillar'] as $key => $row) {
                $sel = ($row['tillar_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['tillar_id'] . '"' . $sel . '">';
                print $row['tillar_nomi'] . '</option>';
            }
        }
    }

    public function getLanguageTypeDropList($selected = false)
    {
        $lang = $this->getLanguages();
        if ($lang['tillar_turi']) {
            foreach ($lang['tillar_turi'] as $key => $row) {
                $sel = ($row['tillar_turi_id'] == $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['tillar_turi_id'] . '"' . $sel . '">';
                print $row['tillar_turi_nomi'] . '</option>';
            }
        }
    }


    public function save_organ($data)
    {

        $this->db->insert('spr_kollej', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_organ($data)
    {
        $this->db->where('spr_kollej.kollej_id', $data['kollej_id']);
        $this->db->update('spr_kollej', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_organ($data)
    {

        $this->db->delete('spr_kollej', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    /****************** DAVLATLAR **************************/
    public function save_davlat($data)
    {
        $this->db->insert('spr_davlat', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_davlat($data)
    {
        $this->db->where('spr_davlat.davlat_id', $data['davlat_id']);
        $this->db->update('spr_davlat', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_davlat($data)
    {

        $this->db->delete('spr_davlat', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof DAVLATLAR **************************/

    /****************** OTM **************************/
    public function save_otm($data)
    {
        $this->db->insert('spr_otm', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_otm($data)
    {
        $this->db->where('spr_otm.otm_id', $data['otm_id']);
        $this->db->update('spr_otm', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_otm($data)
    {

        $this->db->delete('spr_otm', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof OTM **************************/


    /****************** bank **************************/
    public function save_bank($data)
    {
        $this->db->insert('spr_bank', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_bank($data)
    {
        $this->db->where('spr_bank.bank_id', $data['bank_id']);
        $this->db->update('spr_bank', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_bank($data)
    {

        $this->db->delete('spr_bank', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof bank **************************/


    /****************** partiya **************************/
    public function save_partiya($data)
    {
        $this->db->insert('spr_partiya', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_partiya($data)
    {
        $this->db->where('spr_partiya.partiya_id', $data['partiya_id']);
        $this->db->update('spr_partiya', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_partiya($data)
    {

        $this->db->delete('spr_partiya', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof partiya **************************/


    /****************** Directions **************************/
    public function save_direction($data)
    {
        $this->db->insert('spr_mutaxasislik', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_direction($data)
    {
        $this->db->where('spr_mutaxasislik.mutax_kodi_id', $data['mutax_kodi_id']);
        $this->db->update('spr_mutaxasislik', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_direction($data)
    {

        $this->db->delete('spr_mutaxasislik', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof direction **************************/


    /****************** Nations **************************/
    public function save_nation($data)
    {
        $this->db->insert('spr_millat', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_nation($data)
    {
        $this->db->where('spr_millat.millat_id', $data['millat_id']);
        $this->db->update('spr_millat', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_nation($data)
    {

        $this->db->delete('spr_millat', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof direction **************************/


    /****************** Nations **************************/
    public function save_sprcontract($data)
    {
        $this->db->insert('spr_shartnoma_type', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_sprcontract($data)
    {
        $this->db->where('spr_shartnoma_type.shartnoma_type_id', $data['shartnoma_type_id']);
        $this->db->update('spr_shartnoma_type', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_sprcontract($data)
    {

        $this->db->delete('spr_shartnoma_type', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof Nations **************************/


    /****************** StudyType **************************/
    public function save_stdtype($data)
    {
        $this->db->insert('spr_uqit_soha', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_stdtype($data)
    {
        $this->db->where('spr_uqit_soha.uqit_soha_id', $data['uqit_soha_id']);
        $this->db->update('spr_uqit_soha', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_stdtype($data)
    {

        $this->db->delete('spr_uqit_soha', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof StudyType **************************/


    /****************** Tillar **************************/
    public function save_tillar($data)
    {
        $this->db->insert('spr_tillar', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_tillar($data)
    {
        $this->db->where('spr_tillar.tillar_id', $data['tillar_id']);
        $this->db->update('spr_tillar', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_tillar($data)
    {

        $this->db->delete('spr_tillar', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof Tillar **************************/

    /****************** Tillar TURI **************************/
    public function save_tillar_turi($data)
    {
        $this->db->insert('spr_tillar_turi', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_tillar_turi($data)
    {
        $this->db->where('spr_tillar_turi.tillar_turi_id', $data['tillar_turi_id']);
        $this->db->update('spr_tillar_turi', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_tillar_turi($data)
    {

        $this->db->delete('spr_tillar_turi', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    /****************** eof Tillar Turi **************************/


}

