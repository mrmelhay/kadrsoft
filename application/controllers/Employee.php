<?php

class Employee extends MY_Controller
{

    public $kadr;

    public function __construct()
    {
        parent::__construct();
    }

    public function employees($action = null)
    {

        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url('users/login'));
        }
        $is_admin = $this->session->userdata('is_admin');
        $kollej_id = $this->session->userdata('kollej_id');
        $kollej_parent_id = $this->session->userdata('kollej_parent_id');
        $this->data['title'] = 'Ходимлар рўйхати';
        if ($kollej_parent_id) {
            $this->EmployeeModel->kollej_id = $kollej_id;
        }

        if ($this->input->get('kollej_id', true) != null) {
            $kollej_id = $this->input->get('kollej_id', true);
            $this->EmployeeModel->kollej_id = $kollej_id;
        }


        if ($this->input->get('query', true) != null) {
            $query = $this->input->get('query', false);
            $this->data['query'] = $query;
            $this->EmployeeModel->query = $query;
        } else {
            $this->data['query'] = '';
        }

        if ($this->input->get('type') != null) {
            $type = $_GET['type'];
            $this->EmployeeModel->type = $type;
        }

//        if ($this->input->get('att')!=null){
//        $count_malaka=$_GET['att'];
//        $this->EmployeeModel->count_malaka=$count_malaka;
//    }
        if ($action != null) {
            switch ($action) {
                case 'info':
                    $kadr = $this->input->get('kadr', true);
                    if ($kadr != null) {
                        if (is_array($kadr)) {
                            if (sizeof($kadr) > 0) {
                                foreach ($kadr as $key => $val) {
                                    if ($val == '') {
                                        unset($kadr[$key]);
                                    } else {
                                        $this->kadr = $val;
                                    }
                                }
                            }
                        }
                        redirect(base_url('employee/data_employee/' . $this->kadr));
                    }
                    break;
                case 'edit':
                    $kadr = $this->input->get('kadr', true);
                    if ($kadr != null) {
                        if (is_array($kadr)) {
                            if (sizeof($kadr) > 0) {
                                foreach ($kadr as $key => $val) {
                                    if ($val == '') {
                                        unset($kadr[$key]);
                                    } else {
                                        $this->kadr = $val;
                                    }
                                }
                            }
                        }
                        redirect(base_url('employee/edit_employee/' . $this->kadr));
                    }
                    break;
            }

        }

        $this->data['is_admin'] = $is_admin;

        $this->data['employees'] = $this->EmployeeModel->getEmployeeList();
        $this->data['content'] = $this->load->view('/employee/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function archives()
    {
        $this->data['title'] = 'Ходимлар рўйхати';
        $is_admin = $this->session->userdata('is_admin');
        $kollej_id = $this->session->userdata('kollej_id');
        $kollej_parent_id = $this->session->userdata('kollej_parent_id');
        $this->data['title'] = 'Ходимлар рўйхати';
        if ($kollej_parent_id) {
            $this->EmployeeModel->kollej_id = $kollej_id;
        }
        $this->data['employees'] = $this->EmployeeModel->getEmployeeListArchive();
        $this->data['content'] = $this->load->view('/employee/employee_arch', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function stir()
    {
        $this->data['title'] = 'Ходимлар рўйхати';
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url('users/login'));
        }
        $is_admin = $this->session->userdata('is_admin');
        $kollej_id = $this->session->userdata('kollej_id');
        $kollej_parent_id = $this->session->userdata('kollej_parent_id');
        $this->data['title'] = 'Ходимлар рўйхати';
        if ($kollej_parent_id) {
            $this->EmployeeModel->kollej_id = $kollej_id;
        }

        if ($this->input->post('kollej_id', true) != null) {
            $kollej_id = $this->input->post('kollej_id', true);
            $this->EmployeeModel->kollej_id = $kollej_id;
        }
        if ($this->input->post('query', true) != null) {
            $query = $this->input->post('query', true);
            $this->EmployeeModel->query = $query;
        }

        if ($this->input->get('type') != null) {
            $type = $_GET['type'];
            $this->EmployeeModel->type = $type;
        }

        $this->data['employees'] = $this->EmployeeModel->getEmployeeList();
        $this->data['content'] = $this->load->view('/employee/employee_stir', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function add_employee()
    {

        $this->data['title'] = 'Янги ходимни қўшиш';
        $this->data['employee'] = (object)$postData = [
            'kadrid' => null,
            'name_f' => null,
            'name_i' => null,
            'name_o' => null,
            'bdate' => null,
            'sex' => null,
            'lavozim_id' => null,
            'malumot_id' => null,
            'malaka_lavozim_id' => null,
            'mutax_turi_id' => 0,
            'millat_id' => null,
            'oila_id' => null,
            'davlat_id' => null,
            'viloyat_id' => null,
            'tuman_id' => null,
            'address' => null,
            'umumiy_staj' => null,
            'ped_staj' => null,
            'partiya_id' => null,
            'inn' => null,
            'inps' => null,
            'email' => null,
            'phone_work' => null,
            'phone_mobile' => null,
            'photo' => null,
        ];
        $this->data['content'] = $this->load->view('/employee/add_employee', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }


    public function create_employee()
    {
        $this->form_validation->set_rules('name_f', 'Фамилияси', 'required|max_length[50]');
        $this->form_validation->set_rules('name_i', 'Исми', 'required|max_length[50]');
        $this->form_validation->set_rules('name_o', 'Отасининг исми', 'max_length[20]');
//          $this->form_validation->set_rules('bdate','Туғилган вақти','required');
        $this->form_validation->set_rules('sex', 'Жинси', 'required|max_length[10]');
        $this->form_validation->set_rules('lavozim_id', 'Лавозими', 'required|max_length[10]');
        $this->form_validation->set_rules('malumot_id', 'Маълумоти', 'max_length[10]');
//          $this->form_validation->set_rules('malaka_lavozim_id','Address','required|max_length[255]');
        $this->form_validation->set_rules('mutax_kodi_id', 'Мутахасислиги');
        $kollej_id = $this->data['username'];
        $picture = $this->fileupload->do_upload('images/photos/', 'photo');
        if ($picture !== false && $picture != null) {
            $this->fileupload->do_resize($picture, 120, 160);
        }
        if ($picture === false) {
            $this->session->set_flashdata('exception', 'Расм файл юкланмади');
        }

        if ($this->input->post('kadrid', true) == null) {
//                $datearr = explode('/', $this->input->post('bdate', true));
//                $datef = $datearr[2] . '-' . $datearr[1] . '-' . $datearr[0];
            $datef =
                $this->data['employee'] = (object)$postData = [
                    'kadrid' => $this->input->post('kadrid', true),
                    'name_f' => $this->input->post('name_f', true),
                    'name_i' => $this->input->post('name_i', true),
                    'name_o' => $this->input->post('name_o', true),
                    'bdate' => $this->input->post('bdate', true),
                    'sex' => $this->input->post('sex', true),
                    'lavozim_id' => $this->input->post('lavozim_id', true),
                    'malumot_id' => $this->input->post('malumot_id', true),
                    'malaka_lavozim_id' => $this->input->post('malaka_lavozim_id', true),
                    'mutax_turi_id' => $this->input->post('mutax_turi_id', true),
                    'mutax_kodi_id' => $this->input->post('mutax_kodi_id', true),
                    'millat_id' => $this->input->post('millat_id', true),
                    'oila_id' => $this->input->post('oila_id', true),
//                    'mukofot_id' => $this->input->post('mukofot_id', true),
                    'davlat_id' => $this->input->post('davlat_id', true),
                    'viloyat_id' => $this->input->post('viloyat_id', true),
                    'tuman_id' => $this->input->post('tuman_id', true),
                    'address' => $this->input->post('address', true),
                    'umumiy_staj' => $this->input->post('umumiy_staj', true),
                    'ped_staj' => $this->input->post('ped_staj', true),
                    'partiya_id' => $this->input->post('partiya_id', true),
                    'inn' => $this->input->post('inn', true),
                    'inps' => $this->input->post('inps', true),
                    'email' => $this->input->post('email', true),
                    'phone_work' => $this->input->post('phone_work', true),
                    'phone_mobile' => $this->input->post('phone_mobile', true),
                    'photo' => !empty($picture) ? $picture : $this->input->post('old_picture'),
                    'addeduser' => $this->data['username']['user_id'],
                    'addtime' => date('Y-m-d H:i:s'),
                ];
        } else {
//                $datearr = explode('/', $this->input->post('bdate', true));
//                $datef = $datearr[2] . '-' . $datearr[1] . '-' . $datearr[0];
            $this->data['employee'] = (object)$postData = [
                'kadrid' => $this->input->post('kadrid', true),
                'name_f' => $this->input->post('name_f', true),
                'name_i' => $this->input->post('name_i', true),
                'name_o' => $this->input->post('name_o', true),
                'bdate' => $this->input->post('bdate', true),
                'sex' => $this->input->post('sex', true),
                'lavozim_id' => $this->input->post('lavozim_id', true),
                'malumot_id' => $this->input->post('malumot_id', true),
                'malaka_lavozim_id' => $this->input->post('malaka_lavozim_id', true),
                'mutax_turi_id' => $this->input->post('mutax_turi_id', true),
                'mutax_kodi_id' => $this->input->post('mutax_kodi_id', true),
                'millat_id' => $this->input->post('millat_id', true),
                'oila_id' => $this->input->post('oila_id', true),
//                    'mukofot_id' => $this->input->post('mukofot_id', true),
                'davlat_id' => $this->input->post('davlat_id', true),
                'viloyat_id' => $this->input->post('viloyat_id', true),
                'tuman_id' => $this->input->post('tuman_id', true),
                'address' => $this->input->post('address', true),
                'umumiy_staj' => $this->input->post('umumiy_staj', true),
                'ped_staj' => $this->input->post('ped_staj', true),
                'partiya_id' => $this->input->post('partiya_id', true),
                'inn' => $this->input->post('inn', true),
                'inps' => $this->input->post('inps', true),
                'email' => $this->input->post('email', true),
                'phone_work' => $this->input->post('phone_work', true),
                'phone_mobile' => $this->input->post('phone_mobile', true),
                'photo' => !empty($picture) ? $picture : $this->input->post('old_picture'),
                'edituser' => $this->data['username']['user_id'],
                'edittime' => date('Y-m-d H:i:s'),
            ];
        }

        if ($this->form_validation->run() === true) {
            $kadrid = $this->EmployeeModel->createOrUpdate($postData);

            $muassasa_ish_id = $this->EmployeeModel->read_by_muassasa_ish_is_active($kadrid);

            $postdata = [
                'kadr_id' => $kadrid,
                'muassasa_ish_id' => $muassasa_ish_id['muassasa_ish_id'],
                'lavozim_id' => $this->input->post('lavozim_id', true),
                'shartnoma_type_id' => 1,
                'is_active' => 1,
            ];

            $this->EmployeeModel->insert_date_info($postdata, 9);
            if ($kadrid) {
                if ($kollej_id['is_admin'] != 0) {
                    $kolljid = $this->input->post('kollej_id', true);
                } else {
                    $kolljid = $kollej_id['kollej_id'];
                }
                $postData2 = ['kadrid' => $kadrid, 'kollej_id' => $kolljid];
                $this->EmployeeModel->createOrUpdateItemsBind($postData2);
                $this->session->set_flashdata('message', "Маълумот сақланди!");
                redirect("/employee/employees");
            } else {
                $this->session->set_flashdata('exception', "Маълумот киритилмади. Илтимос қайтадан кўриб чиқинг !");
                $this->data['title'] = 'Ходимни маълумотларини ўзгартириш!!!';
                $this->data['content'] = $this->load->view('/employee/add_employee', $this->data, true);
                $this->view_lib->admin_layout($this->data);
            }

        } else {
            $this->data['title'] = 'Янги ходимни қўшиш';
            $this->data['content'] = $this->load->view('/employee/add_employee', $this->data, true);
            $this->view_lib->admin_layout($this->data);
        }
    }


    public function edit_employee($kadrid = null)
    {
        $kadr = $this->input->post('kadr', true);
        if (is_array($kadr)) {
            if (sizeof($kadr) > 0) {
                foreach ($kadr as $key => $val) {
                    if ($val == '') {
                        unset($kadr[$key]);
                    } else {
                        $kadrid = $val;
                    }
                }
            }
        }
        $editdata = $this->EmployeeModel->read_by_data($kadrid);
//            $dataarray = explode('-', $editdata['bdate']);
//            $dataf = $dataarray[2] . '/' . $dataarray[1] . '/' . $dataarray[0];
        $dataf = $editdata['bdate'];
        $this->data['employee'] = (object)$postData = [
            'kollej_id' => $editdata['kollej_id'],
            'kadrid' => $editdata['kadrid'],
            'name_f' => $editdata['name_f'],
            'name_i' => $editdata['name_i'],
            'name_o' => $editdata['name_o'],
            'bdate' => $dataf,
            'sex' => $editdata['sex'],
            'lavozim_id' => $editdata['lavozim_id'],
            'malumot_id' => $editdata['malumot_id'],
            'malaka_lavozim_id' => $editdata['malaka_lavozim_id'],
            'mutax_turi_id' => $editdata['mutax_turi_id'],
            'mutax_kodi_id' => $editdata['mutax_kodi_id'],
            'millat_id' => $editdata['millat_id'],
            'oila_id' => $editdata['oila_id'],
            'mukofot_id' => $editdata['mukofot_id'],
            'davlat_id' => $editdata['davlat_id'],
            'viloyat_id' => $editdata['viloyat_id'],
            'tuman_id' => $editdata['tuman_id'],
            'address' => $editdata['address'],
            'umumiy_staj' => $editdata['umumiy_staj'],
            'ped_staj' => $editdata['ped_staj'],
            'partiya_id' => $editdata['partiya_id'],
            'inn' => $editdata['inn'],
            'inps' => $editdata['inps'],
            'email' => $editdata['email'],
            'phone_work' => $editdata['phone_work'],
            'phone_mobile' => $editdata['phone_mobile'],
            'photo' => $editdata['photo'],
        ];
        $this->data['title'] = 'Ходимни маълумотларни ўзгартириш';
        $this->data['content'] = $this->load->view('/employee/add_employee', $this->data, true);
        $this->view_lib->admin_layout($this->data);

    }

    public function delete_employee($kadr_id = null)
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url('users/login'));
        }
        $data = ['kadr_id' => $kadr_id];
        if ($this->EmployeeModel->delete_employee($data)) {
            $this->session->set_flashdata('message', "Маълумот учирилди!");
            redirect("/employee/employees");
        } else {
            $this->session->set_flashdata('message', "Маълумот учирилмади!");
            redirect("/employee/employees");
        }

    }

    public function data_employee($kadrid = null)
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url('users/login'));
        }
        $editdata = $this->EmployeeModel->read_by_data($kadrid);

//        if ($editdata) {
        $this->data['employee'] = $postData = [$editdata];
        $this->data['passports'] = $this->EmployeeModel->read_by_passports($kadrid);
        $this->data['languages'] = $this->EmployeeModel->read_by_languages($kadrid);
        $this->data['uqigantms'] = $this->EmployeeModel->read_by_uqigantms($kadrid);
        $this->data['ilmiyunvons'] = $this->EmployeeModel->read_by_ilmiyunvons($kadrid);
        $this->data['ilmiydarajas'] = $this->EmployeeModel->read_by_ilmiydarajas($kadrid);
        $this->data['malakas'] = $this->EmployeeModel->read_by_malakas($kadrid);
        $this->data['qaytamalakas'] = $this->EmployeeModel->read_by_qaytamalakas($kadrid);
        $this->data['mehnats'] = $this->EmployeeModel->read_by_mehnats($kadrid);
        $this->data['muassasaishs'] = $this->EmployeeModel->read_by_muassasaishs($kadrid);
        $this->data['fanlars'] = $this->EmployeeModel->read_by_fanlars($kadrid);
        $this->data['atestasiyas'] = $this->EmployeeModel->read_by_attestasiyas($kadrid);
        $this->data['oilas'] = $this->EmployeeModel->read_by_oilas($kadrid);
        $this->data['mukofotlari'] = $this->EmployeeModel->read_by_mukofots($kadrid);
        $this->data['moderators'] = $this->EmployeeModel->read_by_moderators($kadrid);
        $this->data['sudlanganliks'] = $this->EmployeeModel->read_by_sudlangans($kadrid);
        $this->data['intizomchoras'] = $this->EmployeeModel->read_by_intizomchoras($kadrid);
        $this->data['ijodiyishs'] = $this->EmployeeModel->read_by_ijodiys($kadrid);
        $this->data['zahiras'] = $this->EmployeeModel->read_by_zahiras($kadrid);
        $this->data['saylov'] = $this->EmployeeModel->read_by_saylovs($kadrid);
        $this->data['title'] = 'Ходим хақида қўшимча маълумотлар';
        $this->data['content'] = $this->load->view('/employee/data_employee', $this->data, true);
        $this->view_lib->admin_layout($this->data);
//        }else{
//            $this->data['employee'] = array();
//            $this->session->set_flashdata('exception', "Маълумот топилмади!");
//            redirect("/employee/employees");
//        }
    }

    public function ajax_data_employee()
    {
        if (isset($_GET['emptype'])) {
            $emptype = $_GET['emptype'];
            $kadrid = isset($_GET['kadrid']) ? $_GET['kadrid'] : 0;

            switch ($emptype) {
                case 1:
                    $this->data['passport'] = $this->EmployeeModel->read_by_passport($kadrid);
                    $this->load->view('/employee/data/ajax_emp_passport', $this->data);
                    break;
                case 2:
                    $this->data['language'] = $this->EmployeeModel->read_by_language($kadrid);
                    $this->load->view('/employee/data/ajax_emp_language', $this->data);
                    break;
                case 3:
                    $this->data['uqigantm'] = $this->EmployeeModel->read_by_uqigantm($kadrid);
                    $this->load->view('/employee/data/ajax_emp_uqigan_tm', $this->data);
                    break;
                case 4:
                    $this->data['ilmiyunvon'] = $this->EmployeeModel->read_by_ilmiyunvon($kadrid);
                    $this->load->view('/employee/data/ajax_emp_ilmiy_unvon', $this->data);
                    break;

                case 5:
                    $this->data['ilmiydaraja'] = $this->EmployeeModel->read_by_ilmiydaraja($kadrid);
                    $this->load->view('/employee/data/ajax_emp_ilmiy_daraja', $this->data);
                    break;

                case 6:
                    $this->data['malaka'] = $this->EmployeeModel->read_by_malaka($kadrid);
                    $this->load->view('/employee/data/ajax_emp_malaka', $this->data);
                    break;
                case 7:
                    $this->data['qaytamalaka'] = $this->EmployeeModel->read_by_qaytamalaka($kadrid);
                    $this->load->view('/employee/data/ajax_emp_qaytat', $this->data);
                    break;
                case 8:
                    $this->data['mehnat'] = $this->EmployeeModel->read_by_mehnat($kadrid);
                    $this->load->view('/employee/data/ajax_emp_mehnat_faol', $this->data);
                    break;
                case 9:
                    $this->data['muassasaish'] = $this->EmployeeModel->read_by_muassasaish($kadrid);
                    $this->load->view('/employee/data/ajax_emp_muassasa_ish', $this->data);
                    break;
                case 10:
                    $this->data['fanlari'] = $this->EmployeeModel->read_by_fanlar($kadrid);
                    $this->load->view('/employee/data/ajax_emp_uqit_fan', $this->data);
                    break;
                case 11:
                    $this->data['attestasiya'] = $this->EmployeeModel->read_by_attestasiya($kadrid);
                    $this->load->view('/employee/data/ajax_emp_attestatsiya', $this->data);
                    break;
                case 12:
                    $this->data['oila'] = $this->EmployeeModel->read_by_oila($kadrid);
                    $this->load->view('/employee/data/ajax_emp_oila', $this->data);
                    break;
                case 13:
                    $this->data['mukofot'] = $this->EmployeeModel->read_by_mukofot($kadrid);
                    $this->load->view('/employee/data/ajax_emp_mukofot', $this->data);
                    break;
                case 14:
                    $this->data['moderator'] = $this->EmployeeModel->read_by_moderator($kadrid);
                    $this->load->view('/employee/data/ajax_emp_moderator', $this->data);
                    break;
                case 15:
                    $this->data['sudlanganlik'] = $this->EmployeeModel->read_by_sudlangan($kadrid);
                    $this->load->view('/employee/data/ajax_emp_sudlangan', $this->data);
                    break;
                case 16:
                    $this->data['intizomchora'] = $this->EmployeeModel->read_by_intizomchora($kadrid);
                    $this->load->view('/employee/data/ajax_emp_intizomchora', $this->data);
                    break;
                case 17:
                    $this->data['ijodiy'] = $this->EmployeeModel->read_by_ijodiy($kadrid);
                    $this->load->view('/employee/data/ajax_emp_ijodiyish', $this->data);
                    break;
                case 18:
                    $this->data['zahira'] = $this->EmployeeModel->read_by_zahira($kadrid);
                    $this->load->view('/employee/data/ajax_emp_zahira', $this->data);
                    break;
                case 19:
                    $this->data['saylov'] = $this->EmployeeModel->read_by_saylov($kadrid);
                    $this->load->view('/employee/data/ajax_emp_saylov', $this->data);
                    break;
            }
        } else {
            $this->data['title'] = array();
            $this->load->view('/employee/data/ajax_emp_passport', $this->data);
        }
    }

    public function create_date_info()
    {
        if (isset($_POST['emptype'])) {
            $emptype = $_POST['emptype'];
            switch ($emptype) {
                case 1:
                    $picture = $this->fileupload->do_upload('images/passport/', 'photo');
                    if ($picture === false) {
                        $this->session->set_flashdata('exception', 'Расм файл юкланмади');
                    }
                    $postdata = [
                        'passport_id' => $this->input->post('passport_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'ps_ser' => $this->input->post('ps_ser', true),
                        'ps_num' => $this->input->post('ps_num', true),
                        'date_of_given' => $this->input->post('date_of_given', true),
                        'date_of_expr' => $this->input->post('date_of_expr', true),
                        'davlat_id' => $this->input->post('davlat_id', true),
                        'viloyat_id' => $this->input->post('viloyat_id', true),
                        'tuman_id' => $this->input->post('tuman_id', true),
                        'is_active' => $this->input->post('is_active', true) ? $this->input->post('is_active', true) : 0,
                        'scan_photo' => !empty($picture) ? $picture : $this->input->post('scan_photo'),

                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 2:
                    $postdata = [
                        'tillar_bind_id' => $this->input->post('tillar_bind_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'tillar_id' => $this->input->post('tillar_id', true),
                        'tillar_turi_id' => $this->input->post('tillar_turi_id', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 3:
                    $picture = $this->fileupload->do_upload('images/diplom/', 'doc_photo');
                    if ($picture === false) {
                        $this->session->set_flashdata('exception', 'Расм файл юкланмади');
                    }

                    $postdata = [
                        'uqigan_tm_id' => $this->input->post('uqigan_tm_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'davlat_id' => $this->input->post('davlat_id', true),
                        'otm_id' => $this->input->post('otm_id', true),
                        'malumot_id' => $this->input->post('malumot_id', true),
                        'mutax_kodi_id' => $this->input->post('mutax_kodi_id', true),
                        'kirgan_yili' => $this->input->post('kirgan_yili', true),
                        'tugatgan_yili' => $this->input->post('tugatgan_yili', true),
                        'diplom_sana' => $this->input->post('diplom_sana', true),
                        'diplom_num' => $this->input->post('diplom_num', true),
                        'scan_photo' => !empty($picture) ? $picture : $this->input->post('scan_photo'),
                        'is_active' => $this->input->post('is_active', true) ? $this->input->post('is_active', true) : 0,
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;


                case 4:
                    $picture = $this->fileupload->do_upload('images/unvon/', 'photo');
                    if ($picture === false) {
                        $this->session->set_flashdata('exception', 'Расм файл юкланмади');
                    }
                    $postdata = [
                        'ilmiy_un_id' => $this->input->post('ilmiy_un_id', true),
                        'ilmiy_unvon_id' => $this->input->post('ilmiy_unvon_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'diplom_ser' => $this->input->post('diplom_num', true),
                        'diplom_date' => $this->input->post('diplom_date', true),
                        'scan_photo' => !empty($picture) ? $picture : $this->input->post('scan_photo'),

                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 5:
                    $picture = $this->fileupload->do_upload('images/daraja/', 'photo');
                    if ($picture === false) {
                        $this->session->set_flashdata('exception', 'Расм файл юкланмади');
                    }
                    $postdata = [
                        'd_ilmiy_daraja_id' => $this->input->post('d_ilmiy_daraja_id', true),
                        'ilm_daraja_id' => $this->input->post('ilm_daraja_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'ilm_fan_id' => $this->input->post('ilm_fan_id', true),
                        'berilgan_vaqt' => $this->input->post('berilgan_vaqt', true),
                        'diplom_ser' => $this->input->post('diplom_ser', true),
                        'scan_photo' => !empty($picture) ? $picture : $this->input->post('scan_photo'),

                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 6:
                    $postdata = [
                        'malaka_id' => $this->input->post('malaka_id', true),
                        'malaka_turi_id' => $this->input->post('malaka_turi_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'malaka_nomi' => $this->input->post('malaka_nomi', true),
                        'b_vaqti' => $this->input->post('b_vaqti', true),
                        't_vaqti' => $this->input->post('t_vaqti', true),
                        'otm_id' => $this->input->post('otm_id', true),
                        'malaka_xujjat_id' => $this->input->post('malaka_xujjat_id', true),
                        'malaka_xujjat_num' => $this->input->post('malaka_xujjat_num', true),
                        'malaka_xujjat_date' => $this->input->post('malaka_xujjat_date', true),
                        'malaka_soat' => $this->input->post('malaka_soat', true),
                        'malaka_keyingi_sana' => $this->input->post('malaka_keyingi_sana', true),
                        'davlat_id' => $this->input->post('davlat_id', true),
                        'malaka_xorij_institut' => $this->input->post('malaka_xorij_institut', true),
                        'xmb_vaqti' => $this->input->post('xmb_vaqti', true),
                        'xmt_vaqti' => $this->input->post('xmt_vaqti', true),
                        'malaka_organizator' => $this->input->post('malaka_organizator', true),
                        'malaka_yunalishi' => $this->input->post('malaka_yunalishi', true),
                        'is_active' => $this->input->post('is_active', true) ? $this->input->post('is_active', true) : 0,

                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 7:
                    $picture = $this->fileupload->do_upload('images/qayta/', 'photo');
                    if ($picture === false) {
                        $this->session->set_flashdata('exception', 'Расм файл юкланмади');
                    }
                    $postdata = [
                        'qaytat_id' => $this->input->post('qaytat_id', true),
                        'qayta_turi_id' => $this->input->post('qayta_turi_id', true),
                        'qayta_fan_id' => $this->input->post('qayta_fan_id', true),
                        'qayta_bdate' => $this->input->post('qayta_bdate', true),
                        'qayta_tdate' => $this->input->post('qayta_tdate', true),
                        'otm_id' => $this->input->post('otm_id', true),
                        'malaka_xujjat_id' => $this->input->post('malaka_xujjat_id', true),
                        'qayta_xujjat_num' => $this->input->post('qayta_xujjat_num', true),
                        'qayta_xujjat_date' => $this->input->post('qayta_xujjat_date', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'is_active' => $this->input->post('is_active', true) ? $this->input->post('is_active', true) : 0,
                        'scan_photo' => !empty($picture) ? $picture : $this->input->post('scan_photo'),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 8:
                    $postdata = [
                        'mehnat_id' => $this->input->post('mehnat_id', true),
                        'ish_vaqti' => $this->input->post('ish_vaqti', true),
                        'ish_tashkilot' => $this->input->post('ish_tashkilot', true),
                        'ordering' => $this->input->post('ordering', true),
                        'kadr_id' => $this->input->post('kadr_id', true),

                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 9:
                    $picture = $this->fileupload->do_upload('images/qayta/', 'photo');
                    if ($picture === false) {
                        $this->session->set_flashdata('exception', 'Расм файл юкланмади');
                    }
                    $postdata = [
                        'muassasa_ish_id' => $this->input->post('muassasa_ish_id', true),
                        'lavozim_id' => $this->input->post('lavozim_id', true),
                        'lavozim_bdate' => $this->input->post('lavozim_bdate', true),
                        'shartnoma_type_id' => $this->input->post('shartnoma_type_id', true),
                        'shartnoma_num' => $this->input->post('shartnoma_num', true),
                        'stavka' => $this->input->post('stavka', true),
                        'ish_kir_buyruq' => $this->input->post('ish_kir_buyruq', true),
                        'lavozim_tdate' => $this->input->post('lavozim_tdate', true),
                        'ish_bush_sabab' => $this->input->post('ish_bush_sabab', true),
                        'ish_bush_buyruq' => $this->input->post('ish_bush_buyruq', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'is_active' => $this->input->post('isactive', true) ? $this->input->post('isactive', true) : 0,
                        'scan_photo' => !empty($picture) ? $picture : $this->input->post('scan_photo'),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 10:
                    $postdata = [
                        'uqit_fan_id' => $this->input->post('uqit_fan_id', true),
                        'fan_turi_id' => $this->input->post('fan_turi_id', true),
                        'fanlar_id' => $this->input->post('fanlar_id', true),
                        'dars_soat_all' => $this->input->post('dars_soat_all', true),
                        'dars_soat1' => $this->input->post('dars_soat1', true),
                        'dars_soat2' => $this->input->post('dars_soat2', true),
                        'uqit_soha_id' => $this->input->post('uqit_soha_id', true),
                        'yillik_yuklama' => $this->input->post('yillik_yuklama', true),
                        'yil_uquv_yuklama' => $this->input->post('yil_uquv_yuklama', true),
                        'yil_ped_yuklama' => $this->input->post('yil_ped_yuklama', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 11:
                    $postdata = [
                        'attestatsiya_id' => $this->input->post('attestatsiya_id', true),
                        'malaka_lavozim_id' => $this->input->post('malaka_lavozim_id', true),
                        'amal_mal_lav_bdate' => $this->input->post('amal_mal_lav_bdate', true),
                        'amal_mal_lav_old_toifa' => $this->input->post('amal_mal_lav_old_toifa', true),
                        'oxirgi_att_yili' => $this->input->post('oxirgi_att_yili', true),
                        'fan_turi_id' => $this->input->post('fan_turi_id', true),
                        'fanlar_id' => $this->input->post('fanlar_id', true),
                        'nav_att_yili' => $this->input->post('nav_att_yili', true),
                        'oxirgi_att_xulosa' => $this->input->post('oxirgi_att_xulosa', true),
                        'tillar_id' => $this->input->post('tillar_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 12:
                    $postdata = [
                        'd_oila_id' => $this->input->post('d_oila_id', true),
                        'qarindosh_id' => $this->input->post('qarindosh_id', true),
                        'q_name' => $this->input->post('q_name', true),
                        'q_lname' => $this->input->post('q_lname', true),
                        'q_mname' => $this->input->post('q_mname', true),
                        'q_bdate' => $this->input->post('q_bdate', true),
                        'viloyat_id' => $this->input->post('viloyat_id', true),
                        'tuman_id' => $this->input->post('tuman_id', true),
                        'q_address' => $this->input->post('q_address', true),
                        'q_work' => $this->input->post('q_work', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 13:
                    $postdata = [
                        'dmukofot_id' => $this->input->post('dmukofot_id', true),
                        'mukofot_id' => $this->input->post('mukofot_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'year' => $this->input->post('year', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 14:
                    $postdata = [
                        'moderator_id' => $this->input->post('moderator_id', true),
                        'lavozim_id' => $this->input->post('lavozim_id', true),
                        'fanlar_id' => $this->input->post('fanlar_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'training_name' => $this->input->post('training_name', true),
                        'training_date' => $this->input->post('training_date', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 15:
                    $postdata = [
                        'sudlanganlik_id' => $this->input->post('sudlanganlik_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'sud_year' => $this->input->post('sud_year', true),
                        'sud_kodeks' => $this->input->post('sud_kodeks', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 16:
                    $postdata = [
                        'intizomchora_id' => $this->input->post('intizomchora_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'intizomchora' => $this->input->post('intizomchora', true),
                        'intizomchora_begin' => $this->input->post('intizomchora_begin', true),
                        'intizomchora_muddat' => $this->input->post('intizomchora_muddat', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 17:
                    $postdata = [
                        'ijodiyish_id' => $this->input->post('ijodiyish_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'ijodiyish_name' => $this->input->post('ijodiyish_name', true),
                        'ijodiyish_year' => $this->input->post('ijodiyish_year', true),
                        'ijodiyish_page' => $this->input->post('ijodiyish_page', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 18:
                    $postdata = [
                        'zahira_id' => $this->input->post('zahira_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'lavozim_id' => $this->input->post('lavozim_id', true),
                        'zahira_year' => $this->input->post('zahira_year', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 19:
                    $postdata = [
                        'dsaylov_id' => $this->input->post('dsaylov_id', true),
                        'kadr_id' => $this->input->post('kadr_id', true),
                        'saylov_id' => $this->input->post('saylov_id', true),
                        'saylov_year' => $this->input->post('saylov_year', true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
            }
        }
    }


    public
    function delete_data_info()
    {
        if (isset($_POST['emptype'])) {
            $emptype = $_POST['emptype'];

            switch ($emptype) {
                case 1:
                    $postdata = ['passport_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 2:
                    $postdata = ['tillar_bind_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 3:
                    $postdata = ['tillar_bind_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 4:
                    $postdata = ['ilmiy_un_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 5:
                    $postdata = ['d_ilmiy_daraja_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 6:
                    $postdata = ['malaka_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 7:
                    $postdata = ['qaytat_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 8:
                    $postdata = ['mehnat_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 9:
                    $postdata = ['muassasa_ish_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 10:
                    $postdata = ['uqit_fan_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 11:
                    $postdata = ['attestatsiya_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 13:
                    $postdata = ['dmukofot_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 14:
                    $postdata = ['moderator_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 15:
                    $postdata = ['sudlanganlik_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 16:
                    $postdata = ['intizomchora_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 17:
                    $postdata = ['ijodiyish_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 18:
                    $postdata = ['zahira_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 19:
                    $postdata = ['zahira_id' => $this->input->post('kadr_id', true)];
                    $this->EmployeeModel->delete_data_info($postdata, $emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
            }
        }
    }

    public function objective($kadrid)
    {
        $this->data['title'] = 'Ходимлар рўйхати';
        $editdata = $this->EmployeeModel->read_by_data($kadrid);


        $this->data['employee'] = (object)$editdata;
        $this->data['languages'] = $this->EmployeeModel->read_by_languages($kadrid);
        $this->data['mehnats'] = $this->EmployeeModel->read_by_mehnats($kadrid);
        $this->data['oilas'] = $this->EmployeeModel->read_by_oilas($kadrid);
        $this->data['content'] = $this->load->view('/employee/employee_objectiv', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function download($kadrid = null)
    {

        $kadr = $this->input->get('kadr', true);
        if (is_array($kadr)) {
            if (sizeof($kadr) > 0) {
                foreach ($kadr as $key => $val) {
                    if ($val == '') {
                        unset($kadr[$key]);
                    } else {
                        $kadrid = $val;
                    }
                }
            }
        }
        $editdata = $this->EmployeeModel->read_by_data($kadrid);
        $this->data['employee'] = [$editdata];
        $this->data['languages'] = $this->EmployeeModel->read_by_languages($kadrid);
        $this->data['mehnats'] = $this->EmployeeModel->read_by_mehnats($kadrid);
        $this->data['saylov'] = $this->EmployeeModel->read_by_saylovs($kadrid);
        $this->data['oilas'] = $this->EmployeeModel->read_by_oilas($kadrid);

        $this->word->download2($this->data);
    }

    public function exportxls($kollej_id = 0)
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url('users/login'));
        }
        $is_admin = $this->session->userdata('is_admin');


        if (isset($kollej_id)) {
            $this->EmployeeModel->kollej_id = $kollej_id;
            $kollej_name = $this->EmployeeModel->read_by_kollej_name($kollej_id);
        } else {
            $kollej_id = $this->session->userdata('kollej_id');
            $kollej_parent_id = $this->session->userdata('kollej_parent_id');
            $kollej_name = $this->session->userdata('kollej_name');
            if ($kollej_parent_id) {
                $this->EmployeeModel->kollej_id = $kollej_id;
            }

        }

        // echo $kollej_id;
        $kadr = $this->input->get('kadr', true);
        if (is_array($kadr)) {
            if (sizeof($kadr) > 0) {
                foreach ($kadr as $key => $val) {
                    if ($val == '') {
                        unset($kadr[$key]);
                    } else {
                        $kadrid = $val;
                    }
                }
            }
        }

        $editdata = $this->EmployeeModel->getEmployeeList();
        $this->data['employee'] = $editdata;
        $this->data['kollej_name'] = $kollej_name;
        foreach ($editdata as $kadrdata) {
            $this->data['languages'] = $this->EmployeeModel->read_by_languages($kadrdata['kadrid']);
            $this->data['mehnats'] = $this->EmployeeModel->read_by_mehnats($kadrdata['kadrid']);
            $this->data['oilas'] = $this->EmployeeModel->read_by_oilas($kadrdata['kadrid']);
        }
        $this->excel->exportxsl($this->data);
        redirect("/employee/employees");
//        }
    }

    public function exportstir()
    {
        $this->data['title'] = 'Ходимлар рўйхати';
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url('users/login'));
        }
        $is_admin = $this->session->userdata('is_admin');
        $kollej_id = $this->session->userdata('kollej_id');
        $kollej_parent_id = $this->session->userdata('kollej_parent_id');
        $this->data['title'] = 'Ходимлар рўйхати';
        if ($kollej_parent_id) {
            $this->EmployeeModel->kollej_id = $kollej_id;
        }

        if ($this->input->post('kollej_id', true) != null) {
            $kollej_id = $this->input->post('kollej_id', true);
            $this->EmployeeModel->kollej_id = $kollej_id;
        }
        if ($this->input->post('query', true) != null) {
            $query = $this->input->post('query', true);
            $this->EmployeeModel->query = $query;
        }

        if ($this->input->get('type') != null) {
            $type = $_GET['type'];
            $this->EmployeeModel->type = $type;
        }

        $this->data['employees'] = $this->EmployeeModel->getEmployeeList();
        $this->excel->exportstir($this->data);
    }

    public function proftex20()
    {
        $this->data['employees'] = $this->EmployeeModel->getEmployeeProfTex2();
        $this->excel->exportProfTex20($this->data);
    }
}

