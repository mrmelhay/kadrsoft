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
        $this->data['country'] = $this->PreferencesModel->getCountry();
        $this->data['content'] = $this->load->view('/preferences/davlat_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }


    public function otm()
    {
        $this->data['title'] = 'Давлатлар рўйхати';
        $this->data['univers'] = $this->PreferencesModel->getUniver();
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


    public function create_organ()
    {
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


}