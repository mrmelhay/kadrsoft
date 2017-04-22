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

    public function users()
    {
        $this->data['title'] = 'Фойдаланувчилар рўйхати';
        $this->data['userlist'] = $this->UserModel->getUserList();
        $this->data['content'] = $this->load->view('/user/users_list', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }

    public function user_group()
    {
        $this->data['title'] = 'Рўйхатга олиш';
        $this->data['content'] = $this->load->view('/user/user_reg', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }

    public function user_rolls()
    {
        $this->data['title'] = 'Фойдаланувчилар роллари';
        $this->data['content'] = $this->load->view('/user/user_rolls', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }

    public function user_access()
    {
        $this->data['title'] = 'Фойдаланувчилалрга рухсатлар';
        $this->data['content'] = $this->load->view('/user/user_access', $this->data, true);
        $this->view_lib->user_layout($this->data);
    }

    public function ajax_data_user()
    {
        if ($this->input->get('user_id') != "") {
            $did = $_GET['user_id'];
            $this->UserModel->userid = $did;
            $this->data['user'] = $this->UserModel->getUserList();
            $this->load->view('/user/ajax_user_form', $this->data);
        } else {
            $this->data['user'] = array();
            $this->load->view('/user/ajax_user_form', $this->data);
        }

    }

    public function create_user()
    {

        if ($this->input->post('user', false) != '') {
            $user = $_POST['user'];

            $this->form_validation->set_rules('username', 'Логин', 'required|max_length[50]');
            $this->form_validation->set_rules('password', 'Парол', 'max_length[32]');
            $this->form_validation->set_rules('firstname', 'Фамилияси', 'required|max_length[50]');
            $this->form_validation->set_rules('lastname', 'Исми', 'required|max_length[50]');
            $this->form_validation->set_rules('middlename', 'Шарифи', 'required|max_length[50]');
            $this->form_validation->set_rules('email', 'Электрон почта', 'required|max_length[50]|valid_email');
            $this->form_validation->set_rules('phone', 'Телефон', 'required|max_length[50]');
            $this->form_validation->set_rules('user_roll_id', 'User role', 'required');
            $this->form_validation->set_rules('kollej_id', 'Муассаса номи', 'required');
            $this->form_validation->set_rules('group_id', 'Гурух', 'required');
            $this->form_validation->set_rules('active', 'Холати', 'required');

            if ($this->form_validation->run() == TRUE) {

                $data=array('user_id'=>$user,
                            'username'=>$this->input->post('username',false),
                            'password'=>(!empty($this->input->post('password',false))?md5($this->input->post('password',false)):$this->input->post('password2',false)),
                            'firstname'=>$this->input->post('firstname',false),
                            'lastname'=>$this->input->post('lastname',false),
                            'middlename'=>$this->input->post('middlename',false),
                            'email'=>$this->input->post('email',false),
                            'phone'=>$this->input->post('phone',false),
                            'user_roll_id'=>$this->input->post('user_roll_id',false),
                            'kollej_id'=>$this->input->post('kollej_id',false),
                            'group_id'=>$this->input->post('group_id',false),
                            'active'=>$this->input->post('active',false),
                            );
                if ($this->UserModel->update_user($data)){
                    $this->session->set_flashdata('message',"Фойдаланувчи маълумотлари ўзгартирилди!!!");
                    redirect("/users/users");
                }else {
                    $this->session->set_flashdata('exception',"Фойдаланувчи маълумотлари ўзгартирилмади!!!");
                    redirect("/users/users");
                }
            } else {
                $this->data['title'] = 'Фойдаланувчилар рўйхати';
                $this->data['userlist'] = $this->UserModel->getUserList();
                $this->data['content'] = $this->load->view('/user/users_list', $this->data, true);
                $this->view_lib->user_layout($this->data);
            }
        } else{
            $this->form_validation->set_rules('username', 'Логин', 'required|max_length[50]');
            $this->form_validation->set_rules('password', 'Парол', 'required|max_length[32]');
            $this->form_validation->set_rules('firstname', 'Фамилияси', 'required|max_length[50]');
            $this->form_validation->set_rules('lastname', 'Исми', 'required|max_length[50]');
            $this->form_validation->set_rules('middlename', 'Шарифи', 'required|max_length[50]');
            $this->form_validation->set_rules('email', 'Электрон почта', 'required|max_length[50]|valid_email');
            $this->form_validation->set_rules('phone', 'Телефон', 'required|max_length[50]');
            $this->form_validation->set_rules('user_roll_id', 'User role', 'required');
            $this->form_validation->set_rules('kollej_id', 'Муассаса номи', 'required');
            $this->form_validation->set_rules('group_id', 'Гурух', 'required');
            $this->form_validation->set_rules('active', 'Холати', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data=array(
                    'username'=>$this->input->post('username',false),
                    'password'=>md5($this->input->post('password',false)),
                    'firstname'=>$this->input->post('firstname',false),
                    'lastname'=>$this->input->post('lastname',false),
                    'middlename'=>$this->input->post('middlename',false),
                    'email'=>$this->input->post('email',false),
                    'phone'=>$this->input->post('phone',false),
                    'user_roll_id'=>$this->input->post('user_roll_id',false),
                    'kollej_id'=>$this->input->post('kollej_id',false),
                    'group_id'=>$this->input->post('group_id',false),
                    'active'=>$this->input->post('active',false),
                );
                if ($this->UserModel->insert_user($data)){
                    $this->session->set_flashdata('message',"Янги фойдаланувчи рўйхатга олинди!!!");
                    redirect("/users/users");
                }else {
                    $this->session->set_flashdata('exception',"Янги фойдаланувчи рўйхатга олинмади!!!");
                    redirect("/users/users");
                }
            } else {
                $this->data['title'] = 'Фойдаланувчилар рўйхати';
                $this->data['userlist'] = $this->UserModel->getUserList();
                $this->data['content'] = $this->load->view('/user/users_list', $this->data, true);
                $this->view_lib->user_layout($this->data);
            }
        }
    }

    public function del_user($user_id){
        $data = array('user_id' => $user_id);
        if ($this->UserModel->delete_user($data)){
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилди!!!");
            redirect(base_url('/users/users'));
        }else{
            $this->session->set_flashdata('message', "Маълумот баъзадан ўчирилмади!!!");
            redirect(base_url('/users/users'));
        }
    }


}