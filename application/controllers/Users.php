<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 11:37
 */
class Users extends MY_Controller
{
    private $view;
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url('users/login'));
        } else {
            redirect(base_url('dashboard'));
        }
//        $this->data['title']='Тизимга кириш';
//        $this->data['content']=$this->load->view('/user/login',$this->data,true);
//        $this->view_lib->layout($this->data);
    }

    public function login()
    {
        $this->data['title'] = 'Тизимга кириш';
        $this->data['content'] = $this->load->view('/user/login', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }


    public function check()
    {
        $this->load->model('UserModel');
        $rules = $this->UserModel->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $login = $this->input->post('username', false);
            $password = $this->input->post('password', false);
            if ($this->UserModel->login($login, md5($password))) {
                if ($this->session->userdata('logged_in') == TRUE) {
                    redirect(base_url('users'));
                }
            } else {
                $this->session->set_flashdata('message', "Логин ва пароль нотўғри!!!");
                redirect(base_url('users/login'));
            }
        } else {
            $this->data['title'] = 'Тизимга кириш';
            $this->data['content'] = $this->load->view('/user/login', $this->data, true);
            $this->view_lib->user_layout($this->data);
        }


    }


    public function logout()
    {
        $this->load->model('UserModel');
        $this->UserModel->logout();
        redirect(base_url('users'));
    }

    public function users(){
        $this->data['title'] = 'Фойдаланувчилар рўйхати';
        $this->data['content'] = $this->load->view('/user/users_list', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }

    public function user_reg(){
        $this->data['title'] = 'Рўйхатга олиш';
        $this->data['content'] = $this->load->view('/user/user_reg', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }

    public function user_rolls(){
        $this->data['title'] = 'Фойдаланувчилар роллари';
        $this->data['content'] = $this->load->view('/user/user_rolls', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }

    public function user_access(){
        $this->data['title'] = 'Фойдаланувчилалрга рухсатлар';
        $this->data['content'] = $this->load->view('/user/user_access', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }



}