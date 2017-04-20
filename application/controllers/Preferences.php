<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 17:01
 */
class Preferences extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();

    }

    public function organ()
    {
        $this->data['title'] = 'Муассасалар рўйхати';
        $this->data['kollejs'] = $this->PreferencesModel->getKollej();
        $this->data['content'] = $this->load->view('/preferences/organ_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function region()
    {
        $this->data['title'] = 'Ҳудудлар рўйхати';
        $this->data['regions'] = $this->PreferencesModel->getRegions();
        $this->data['content'] = $this->load->view('/preferences/region_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function banks()
    {
        $this->data['title'] = 'Банклар рўйхати';
        $this->data['banks'] = $this->PreferencesModel->getBanks();
        $this->data['content'] = $this->load->view('/preferences/bank_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function davlat()
    {
        $this->data['title'] = 'Давлатлар рўйхати';
        $this->data['davlats'] = $this->PreferencesModel->getCountry();
        $this->data['content'] = $this->load->view('/preferences/davlat_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }


    public function otm()
    {
        $this->data['title'] = 'Олий таълим муассасалари рўйхати';
        $this->data['otms'] = $this->PreferencesModel->getUniver();
        $this->data['content'] = $this->load->view('/preferences/univer_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    /********************************/
    public function partiya()
    {
        $this->data['title'] = 'Мавжуд партиялар рўйхати';
        $this->data['partiyas'] = $this->PreferencesModel->getPartiya();
        $this->data['content'] = $this->load->view('/preferences/partiyas_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function millat()
    {
        $this->data['title'] = 'Миллатлар рўйхати';
        $this->data['nations'] = $this->PreferencesModel->getNation();
        $this->data['content'] = $this->load->view('/preferences/nations_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function shartnoma()
    {
        $this->data['title'] = 'Шартнома турлари рўйхати';
        $this->data['contracts'] = $this->PreferencesModel->getContract();
        $this->data['content'] = $this->load->view('/preferences/contracts_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function tillar()
    {
        $this->data['title'] = 'Тиллар рўйхати';
        $this->data['langs'] = $this->PreferencesModel->getLanguages();
        $this->data['content'] = $this->load->view('/preferences/langs_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function uq_soha()
    {
        $this->data['title'] = 'Ўқитиш соҳалари рўйхати';
        $this->data['stdtype'] = $this->PreferencesModel->getStudyType();
        $this->data['content'] = $this->load->view('/preferences/stdtype_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function mutaxassislik()
    {
        $this->data['title'] = 'Мутахассисликлар рўйхати';
        $this->data['directions'] = $this->PreferencesModel->getDirections();
        $this->data['content'] = $this->load->view('/preferences/directions_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }


    public function ajax_data_tuman()
    {
        if ($this->input->post('viloyat_id') != "") {
            $did = $_POST['viloyat_id'];
            $this->PreferencesModel->getTumanDropList($did);
        }
    }

    public function ajax_data_organ(){
        if ($this->input->get('kollej_id') != "") {
            $did = $_GET['kollej_id'];
            $this->PreferencesModel->kollej_id=$did;
            $this->data['kollej'] = $this->PreferencesModel->getKollej();
            $this->load->view('/preferences/ajax_organ_form_edit',$this->data);
        } else{
            $this->data['kollej'] = array();
            $this->load->view('/preferences/ajax_organ_form_edit',$this->data);
        }

    }


    public function create_organ()
    {
        if ($this->input->post('kollej',false)!=''){
            $kollej=$_POST['kollej'];
            $rules = $this->PreferencesModel->organrules;
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'kollej_name' => $this->input->post('kollej_name', false),
                    'viloyat_id' => $this->input->post('viloyat_id', false),
                    'tuman_id' => $this->input->post('tuman_id', false),
                    'kollej_adres' => $this->input->post('kollej_adres', false),
                    'empl_count1' => $this->input->post('empl_count1', false),
                    'empl_count2' => $this->input->post('empl_count2', false),
                    'students_count' => $this->input->post('students_count', false),
                    'phone' => $this->input->post('phone', false),
                    'email' => $this->input->post('email', false),
                    'website' => $this->input->post('website', false),
                    'kollej_id'=>$kollej,
                );
                if ($this->PreferencesModel->update_organ($data)) {
                    $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилди!!!");
                    redirect(base_url('preferences/organ'));
                } else {
                    $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилмади!!!");
                    redirect(base_url('preferences/organ'));
                }
            } else {
                $this->data['title'] = 'Муассасалар рўйхати';
                $this->data['kollejs'] = $this->PreferencesModel->getKollej();
                $this->data['content'] = $this->load->view('/preferences/organ_list', $this->data, true);
                $this->view_lib->admin_layout($this->data);
            }

        }else {
            $rules = $this->PreferencesModel->organrules;
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'kollej_name' => $this->input->post('kollej_name', false),
                    'viloyat_id' => $this->input->post('viloyat_id', false),
                    'tuman_id' => $this->input->post('tuman_id', false),
                    'kollej_adres' => $this->input->post('kollej_adres', false),
                    'empl_count1' => $this->input->post('empl_count1', false),
                    'empl_count2' => $this->input->post('empl_count2', false),
                    'students_count' => $this->input->post('students_count', false),
                    'phone' => $this->input->post('phone', false),
                    'email' => $this->input->post('email', false),
                    'website' => $this->input->post('website', false),
                );
                if ($this->PreferencesModel->save_organ($data)) {
                    $this->session->set_flashdata('message', "Маълумот баъзага қўшилди!!!");
                    redirect(base_url('preferences/organ'));
                } else {
                    $this->session->set_flashdata('message', "Маълумот баъзага қўшилмади!!!");
                    redirect(base_url('preferences/organ'));
                }
            } else {
                $this->data['title'] = 'Муассасалар рўйхати';
                $this->data['kollejs'] = $this->PreferencesModel->getKollej();
                $this->data['content'] = $this->load->view('/preferences/organ_list', $this->data, true);
                $this->view_lib->admin_layout($this->data);
            }


        }
    }


    public function del_organ($kollej_id)
    {
        $data = array('kollej_id' => $kollej_id);
        if ($this->PreferencesModel->delete_organ($data)){
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилди!!!");
            redirect(base_url('preferences/organ'));
        }else{
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилмади!!!");
            redirect(base_url('preferences/organ'));
        }
    }

    /**************************** davlatlar ***************/

    public function ajax_data_davlat(){
        if ($this->input->get('davlat_id') != "") {
            $did = $_GET['davlat_id'];
            $this->PreferencesModel->davlat_id=$did;
            $this->data['davlat'] = $this->PreferencesModel->getCountry();
            $this->load->view('/preferences/ajax_davlat_form',$this->data);
        } else{
            $this->data['davlat_id'] = array();
            $this->load->view('/preferences/ajax_davlat_form',$this->data);
        }

    }

    public function create_davlat()
    {
        if ($this->input->post('davlat',false)!=''){
            $davlat=$_POST['davlat'];
                $data = array(
                    'cis' => $this->input->post('cis', false),
                    'gov_ru' => $this->input->post('gov_ru', false),
                    'gov_uzc' => $this->input->post('gov_uzc', false),
                    'iso' => $this->input->post('iso', false),
                    'url' => $this->input->post('url', false),
                    'davlat_id'=>$davlat,
                );
                if ($this->PreferencesModel->update_davlat($data)) {
                    $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилди!!!");
                    redirect(base_url('preferences/davlat'));
                } else {
                    $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилмади!!!");
                    redirect(base_url('preferences/davlat'));
                }
        } else {

                $data = array(
                    'cis' => $this->input->post('cis', false),
                    'gov_ru' => $this->input->post('gov_ru', false),
                    'gov_uzc' => $this->input->post('gov_uzc', false),
                    'iso' => $this->input->post('iso', false),
                    'url' => $this->input->post('url', false),
                );
                if ($this->PreferencesModel->save_davlat($data)) {
                    $this->session->set_flashdata('message', "Маълумот баъзага қўшилди!!!");
                    redirect(base_url('preferences/davlat'));
                } else {
                    $this->session->set_flashdata('message', "Маълумот баъзага қўшилмади!!!");
                    redirect(base_url('preferences/davlat'));
                }
        }
    }

    public function del_davlat($davlat_id)
    {
        $data = array('davlat_id' => $davlat_id);
        if ($this->PreferencesModel->delete_davlat($data)){
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилди!!!");
            redirect(base_url('preferences/davlat'));
        }else{
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилмади!!!");
            redirect(base_url('preferences/davlat'));
        }
    }

    /*****************end davlat *****/


    /**************************** OTM ***************/

    public function ajax_data_otm(){
        if ($this->input->get('otm_id') != "") {
            $did = $_GET['otm_id'];
            $this->PreferencesModel->otm_id=$did;
            $this->data['otm'] = $this->PreferencesModel->getUniver();
            $this->load->view('/preferences/ajax_otm_form',$this->data);
        } else{
            $this->data['otm_id'] = array();
            $this->load->view('/preferences/ajax_otm_form',$this->data);
        }

    }

    public function create_otm()
    {
        if ($this->input->post('otm',false)!=''){
            $otm=$_POST['otm'];
            $data = array(
                'otm_name' => $this->input->post('otm_name', false),
                'otm_lname' => $this->input->post('otm_lname', false),
                'otm_web' => $this->input->post('otm_web', false),
                'otm_email' => $this->input->post('otm_email', false),
                'otm_id'=>$otm,
            );
            if ($this->PreferencesModel->update_otm($data)) {
                $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилди!!!");
                redirect(base_url('preferences/otm'));
            } else {
                $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилмади!!!");
                redirect(base_url('preferences/otm'));
            }
        } else {

            $data = array(
                'otm_name' => $this->input->post('otm_name', false),
                'otm_lname' => $this->input->post('otm_lname', false),
                'otm_web' => $this->input->post('otm_web', false),
                'otm_email' => $this->input->post('otm_email', false)
            );
            if ($this->PreferencesModel->save_otm($data)) {
                $this->session->set_flashdata('message', "Маълумот баъзага қўшилди!!!");
                redirect(base_url('preferences/otm'));
            } else {
                $this->session->set_flashdata('message', "Маълумот баъзага қўшилмади!!!");
                redirect(base_url('preferences/otm'));
            }
        }
    }

    public function del_otm($otm_id)
    {
        $data = array('otm_id' => $otm_id);
        if ($this->PreferencesModel->delete_otm($data)){
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилди!!!");
            redirect(base_url('preferences/otm'));
        }else{
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилмади!!!");
            redirect(base_url('preferences/otm'));
        }
    }

    /*****************end OTM *****/

    /**************************** bank ***************/

    public function ajax_data_bank(){
        if ($this->input->get('bank_id') != "") {
            $did = $_GET['bank_id'];
            $this->PreferencesModel->bank_id=$did;
            $this->data['bank'] = $this->PreferencesModel->getBanks();
            $this->load->view('/preferences/ajax_bank_form',$this->data);
        } else{
            $this->data['bank_id'] = array();
            $this->load->view('/preferences/ajax_bank_form',$this->data);
        }

    }

    public function create_bank()
    {
        if ($this->input->post('bank',false)!=''){
            $bank=$_POST['bank'];
            $data = array(
                'bank_name' => $this->input->post('bank_name', false),
                'bank_filial_name' => $this->input->post('bank_filial_name', false),
                'bank_addres' => $this->input->post('bank_addres', false),
                'bank_mfo' => $this->input->post('bank_mfo', false),
                'bank_stir' => $this->input->post('bank_stir', false),
                'bank_id'=>$bank,
            );
            if ($this->PreferencesModel->update_bank($data)) {
                $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилди!!!");
                redirect(base_url('preferences/banks'));
            } else {
                $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилмади!!!");
                redirect(base_url('preferences/banks'));
            }
        } else {

            $data = array(
                'bank_name' => $this->input->post('bank_name', false),
                'bank_filial_name' => $this->input->post('bank_filial_name', false),
                'bank_addres' => $this->input->post('bank_addres', false),
                'bank_mfo' => $this->input->post('bank_mfo', false),
                'bank_stir' => $this->input->post('bank_stir', false)
            );
            if ($this->PreferencesModel->save_bank($data)) {
                $this->session->set_flashdata('message', "Маълумот баъзага қўшилди!!!");
                redirect(base_url('preferences/banks'));
            } else {
                $this->session->set_flashdata('message', "Маълумот баъзага қўшилмади!!!");
                redirect(base_url('preferences/banks'));
            }
        }
    }

    public function del_bank($bank_id)
    {
        $data = array('bank_id' => $bank_id);
        if ($this->PreferencesModel->delete_bank($data)){
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилди!!!");
            redirect(base_url('preferences/banks'));
        }else{
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилмади!!!");
            redirect(base_url('preferences/banks'));
        }
    }

    /*****************end bank *****/

    /**************************** partiya ***************/

    public function ajax_data_partiya(){
        if ($this->input->get('partiya_id') != "") {
            $did = $_GET['partiya_id'];
            $this->PreferencesModel->partiya_id=$did;
            $this->data['partiya'] = $this->PreferencesModel->getPartiya();
            $this->load->view('/preferences/ajax_partiya_form',$this->data);
        } else{
            $this->data['partiya_id'] = array();
            $this->load->view('/preferences/ajax_partiya_form',$this->data);
        }

    }

    public function create_partiya()
    {
        if ($this->input->post('partiya',false)!=''){
            $partiya=$_POST['partiya'];
            $data = array(
                'partiya_name' => $this->input->post('partiya_name', false),
                'partiya_web' => $this->input->post('partiya_web', false),
                'partiya_id'=>$partiya,
            );
            if ($this->PreferencesModel->update_partiya($data)) {
                $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилди!!!");
                redirect(base_url('preferences/partiya'));
            } else {
                $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилмади!!!");
                redirect(base_url('preferences/partiya'));
            }
        } else {

            $data = array(
                'partiya_name' => $this->input->post('partiya_name', false),
                'partiya_web' => $this->input->post('partiya_web', false),
            );
            if ($this->PreferencesModel->save_partiya($data)) {
                $this->session->set_flashdata('message', "Маълумот баъзага қўшилди!!!");
                redirect(base_url('preferences/partiya'));
            } else {
                $this->session->set_flashdata('message', "Маълумот баъзага қўшилмади!!!");
                redirect(base_url('preferences/partiya'));
            }
        }
    }

    public function del_partiya($partiya_id)
    {
        $data = array('partiya_id' => $partiya_id);
        if ($this->PreferencesModel->delete_partiya($data)){
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилди!!!");
            redirect(base_url('preferences/partiya'));
        }else{
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилмади!!!");
            redirect(base_url('preferences/partiya'));
        }
    }

    /*****************end partiya *****/


    /**************************** direction ***************/

    public function ajax_data_direction(){
        if ($this->input->get('mutax_kodi_id') != "") {
            $did = $_GET['mutax_kodi_id'];
            $this->PreferencesModel->mutax_kodi_id=$did;
            $this->data['direction'] = $this->PreferencesModel->getDirections();
            $this->load->view('/preferences/ajax_direction_form',$this->data);
        } else{
            $this->data['mutax_kodi_id'] = array();
            $this->load->view('/preferences/ajax_direction_form',$this->data);
        }

    }

    public function create_direction()
    {
        if ($this->input->post('direction',false)!=''){
            $direction=$_POST['direction'];
            $data = array(
                'mutax_kodi' => $this->input->post('mutax_kodi', false),
                'mutax_kodi_name' => $this->input->post('mutax_kodi_name', false),
                'mutax_kodi_id'=>$direction,
            );
            if ($this->PreferencesModel->update_direction($data)) {
                $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилди!!!");
                redirect(base_url('preferences/mutaxassislik'));
            } else {
                $this->session->set_flashdata('message', "Маълумот баъзаси ўзгартирилмади!!!");
                redirect(base_url('preferences/mutaxassislik'));
            }
        } else {

            $data = array(
                'mutax_kodi' => $this->input->post('mutax_kodi', false),
                'mutax_kodi_name' => $this->input->post('mutax_kodi_name', false),
            );
            if ($this->PreferencesModel->save_direction($data)) {
                $this->session->set_flashdata('message', "Маълумот баъзага қўшилди!!!");
                redirect(base_url('preferences/mutaxassislik'));
            } else {
                $this->session->set_flashdata('message', "Маълумот баъзага қўшилмади!!!");
                redirect(base_url('preferences/mutaxassislik'));
            }
        }
    }

    public function del_direction($direction_id)
    {
        $data = array('mutax_kodi_id' => $direction_id);
        if ($this->PreferencesModel->delete_direction($data)){
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилди!!!");
            redirect(base_url('preferences/mutaxassislik'));
        }else{
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилмади!!!");
            redirect(base_url('preferences/mutaxassislik'));
        }
    }

    /*****************end direction *****/
}