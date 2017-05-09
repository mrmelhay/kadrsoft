<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.04.2017
 * Time: 11:44
 */
class Employee extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function employees()
    {

        $this->data['title'] = 'Ходимлар рўйхати';
        $this->data['employees'] = $this->EmployeeModel->getEmployeeList();
        $this->data['content'] = $this->load->view('/employee/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function archives()
    {
        $this->data['title'] = 'Ходимлар рўйхати';
        $this->data['content'] = $this->load->view('/employee/employee_arch', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function stir()
    {
        $this->data['title'] = 'Ходимлар рўйхати';
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
//        $this->form_validation->set_rules('bdate','Туғилган вақти','required');
        $this->form_validation->set_rules('sex', 'Жинси', 'required|max_length[10]');
        $this->form_validation->set_rules('lavozim_id', 'Лавозими', 'required|max_length[10]');
        $this->form_validation->set_rules('malumot_id', 'Маълумоти', 'required|max_length[10]');
//        $this->form_validation->set_rules('malaka_lavozim_id','Address','required|max_length[255]');
        $this->form_validation->set_rules('mutax_kodi_id', 'Мутахасислиги', 'required');
        $kollej_id = $this->data['username'];
        $picture = $this->fileupload->do_upload('images/photos/', 'photo');
        if ($picture !== false && $picture != null) {
            $this->fileupload->do_resize($picture, 120, 160);
        }
        if ($picture === false) {
            $this->session->set_flashdata('exception', 'Расм файл юкланмади');
        }

        if ($this->input->post('kadrid', true) == null) {
            $datearr = explode('/', $this->input->post('bdate', true));
            $datef = $datearr[2] . '-' . $datearr[1] . '-' . $datearr[0];
            $this->data['employee'] = (object)$postData = [
                'kadrid' => $this->input->post('kadrid', true),
                'name_f' => $this->input->post('name_f', true),
                'name_i' => $this->input->post('name_i', true),
                'name_o' => $this->input->post('name_o', true),
                'bdate' => $datef,
                'sex' => $this->input->post('sex', true),
                'lavozim_id' => $this->input->post('lavozim_id', true),
                'malumot_id' => $this->input->post('malumot_id', true),
                'malaka_lavozim_id' => $this->input->post('malaka_lavozim_id', true),
                'mutax_turi_id' => $this->input->post('mutax_turi_id', true),
                'mutax_kodi_id' => $this->input->post('mutax_kodi_id', true),
                'millat_id' => $this->input->post('millat_id', true),
                'oila_id' => $this->input->post('oila_id', true),
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
            $datearr = explode('/', $this->input->post('bdate', true));
            $datef = $datearr[2] . '-' . $datearr[1] . '-' . $datearr[0];
            $this->data['employee'] = (object)$postData = [
                'kadrid' => $this->input->post('kadrid', true),
                'name_f' => $this->input->post('name_f', true),
                'name_i' => $this->input->post('name_i', true),
                'name_o' => $this->input->post('name_o', true),
                'bdate' => $datef,
                'sex' => $this->input->post('sex', true),
                'lavozim_id' => $this->input->post('lavozim_id', true),
                'malumot_id' => $this->input->post('malumot_id', true),
                'malaka_lavozim_id' => $this->input->post('malaka_lavozim_id', true),
                'mutax_turi_id' => $this->input->post('mutax_turi_id', true),
                'mutax_kodi_id' => $this->input->post('mutax_kodi_id', true),
                'millat_id' => $this->input->post('millat_id', true),
                'oila_id' => $this->input->post('oila_id', true),
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
//                echo $kadrid;
            if ($kadrid) {
                $postData2 = ['kadrid' => $kadrid, 'kollej_id' => $kollej_id['kollej_id']];
//                 print_r($postData2);
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
        $editdata = $this->EmployeeModel->read_by_data($kadrid);
        $dataarray = explode('-', $editdata['bdate']);
        $dataf = $dataarray[2] . '/' . $dataarray[1] . '/' . $dataarray[0];
        $this->data['employee'] = (object)$postData = [
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

    public function delete_employee(){

    }

    public function data_employee($kadrid)
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url('users/login'));
        }
        $editdata = $this->EmployeeModel->read_by_data($kadrid);
        if ($editdata) {
            $this->data['employee'] = $postData = [$editdata];
            $this->data['passports'] = $this->EmployeeModel->read_by_passports($kadrid);
            $this->data['languages'] = $this->EmployeeModel->read_by_languages($kadrid);
            $this->data['uqigantms'] = $this->EmployeeModel->read_by_uqigantms($kadrid);
            $this->data['ilmiyunvons'] = $this->EmployeeModel->read_by_ilmiyunvons($kadrid);
            $this->data['title'] = 'Ходим хақида қўшимча маълумотлар';
            $this->data['content'] = $this->load->view('/employee/data_employee', $this->data, true);
            $this->view_lib->admin_layout($this->data);
        }else{
//            $this->data['employee'] = array();
            $this->session->set_flashdata('exception', "Маълумот топилмади!");
            redirect("/employee/employees");
        }
    }

    public function ajax_data_employee(){
        if (isset($_GET['emptype'])) {
            $emptype = $_GET['emptype'];
            $kadrid=isset($_GET['kadrid'])?$_GET['kadrid']:0;

          switch ($emptype){
                case 1:
                    $this->data['passport']=$this->EmployeeModel->read_by_passport($kadrid);
                    $this->load->view('/employee/data/ajax_emp_passport',$this->data);
                    break;
                case 2:
                    $this->data['language']=$this->EmployeeModel->read_by_language($kadrid);
                    $this->load->view('/employee/data/ajax_emp_language',$this->data);
                    break;
                case 3:
                    $this->data['uqigantm']=$this->EmployeeModel->read_by_uqigantm($kadrid);
                    $this->load->view('/employee/data/ajax_emp_uqigan_tm',$this->data);
                    break;
              case '4':
                  $this->data['ilmiyunvon']=$this->EmployeeModel->read_by_ilmiyunvon($kadrid);
                  $this->load->view('/employee/data/ajax_emp_ilmiy_unvon',$this->data);
                  break;

              case '5':
                  $this->data['title'] = array();
                  $this->load->view('/employee/data/ajax_emp_ilmiy_daraja',$this->data);
                  break;
              case '6':
                  $this->data['title'] = array();
                  $this->load->view('/employee/data/ajax_emp_malaka',$this->data);
                  break;
              case '7':
                  $this->data['title'] = array();
                  $this->load->view('/employee/data/ajax_emp_qaytat',$this->data);
                  break;
              case '8':
                  $this->data['title'] = array();
                  $this->load->view('/employee/data/ajax_emp_mehnat_faol',$this->data);
                  break;
            }


    } else {
            $this->data['title'] = array();
            $this->load->view('/employee/data/ajax_emp_passport',$this->data);
        }
    }

    public function create_date_info(){

        if (isset($_POST['emptype'])) {
            $emptype = $_POST['emptype'];
            switch ($emptype){
                case 1:
                    $postdata=[
                                'passport_id'=>$this->input->post('passport_id',true),
                                'kadr_id'=>$this->input->post('kadr_id',true),
                                'ps_ser'=>$this->input->post('ps_ser',true),
                                'ps_num'=>$this->input->post('ps_num',true),
                                'date_of_given'=>$this->input->post('date_of_given',true),
                                'date_of_expr'=>$this->input->post('date_of_expr',true),
                                'davlat_id'=>$this->input->post('davlat_id',true),
                                'viloyat_id'=>$this->input->post('viloyat_id',true),
                                'tuman_id'=>$this->input->post('tuman_id',true),
                                'is_active'=>$this->input->post('is_active',true)?$this->input->post('is_active',true):0,
                               ];
                    $this->EmployeeModel->insert_date_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 2:
                    $postdata=[
                        'tillar_bind_id'=>$this->input->post('tillar_bind_id',true),
                        'kadr_id'=>$this->input->post('kadr_id',true),
                        'tillar_id'=>$this->input->post('tillar_id',true),
                        'tillar_turi_id'=>$this->input->post('tillar_turi_id',true),
                    ];
                    $this->EmployeeModel->insert_date_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 3:
                    $postdata=[
                        'uqigan_tm_id'=>$this->input->post('uqigan_tm_id',true),
                        'kadr_id'=>$this->input->post('kadr_id',true),
                        'davlat_id'=>$this->input->post('davlat_id',true),
                        'otm_id'=>$this->input->post('otm_id',true),
                        'malumot_id'=>$this->input->post('malumot_id',true),
                        'mutax_kodi_id'=>$this->input->post('mutax_kodi_id',true),
                        'kirgan_yili'=>$this->input->post('kirgan_yili',true),
                        'tugatgan_yili'=>$this->input->post('tugatgan_yili',true),
                        'diplom_sana'=>$this->input->post('diplom_sana',true),
                        'diplom_num'=>$this->input->post('diplom_num',true),
                        'is_active'=>$this->input->post('is_active',true)?$this->input->post('is_active',true):0,
                    ];
                    $this->EmployeeModel->insert_date_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;


                case 4:
                    $postdata=[
                        'ilmiy_un_id'=>$this->input->post('ilmiy_un_id',true),
                        'ilmiy_unvon_id'=>$this->input->post('ilmiy_unvon_id',true),
                        'kadr_id'=>$this->input->post('kadr_id',true),
                        'diplom_ser'=>$this->input->post('diplom_num',true),
                        'diplom_date'=>$this->input->post('diplom_date',true),

                    ];
                    $this->EmployeeModel->insert_date_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 5:
                    $postdata=[
                        'ilm_daraja_id'=>$this->input->post('ilm_daraja_id',true),
                        'kadr_id'=>$this->input->post('kadr_id',true),
                        'ilm_fan_id'=>$this->input->post('ilm_fan_id',true),
                        'berilgan_vaqt'=>$this->input->post('berilgan_vaqt',true),
                        'diplom_ser'=>$this->input->post('diplom_ser',true),

                    ];
                    $this->EmployeeModel->insert_date_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                case 5:
                    $postdata=[
                        'kadr_id'=>$this->input->post('kadr_id',true),
                        'ish_vaqti'=>$this->input->post('ish_vaqti',true),
                        'ish_tashkilot'=>$this->input->post('ish_tashkilot',true),
                        'ordering'=>$this->input->post('ordering',true),

                    ];
                    $this->EmployeeModel->insert_date_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;



            }
        }
    }


    public function delete_data_info(){
        if (isset($_POST['emptype'])) {
            $emptype = $_POST['emptype'];

            switch ($emptype) {
                case 1:
                    $postdata=['passport_id'=>$this->input->post('kadr_id',true)];
                    $this->EmployeeModel->delete_data_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 2:
                    $postdata=['tillar_bind_id'=>$this->input->post('kadr_id',true)];
                    $this->EmployeeModel->delete_data_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 3:
                    $postdata=['tillar_bind_id'=>$this->input->post('kadr_id',true)];
                    $this->EmployeeModel->delete_data_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 4:
                    $postdata=['ilmiy_un_id'=>$this->input->post('kadr_id',true)];
                    $this->EmployeeModel->delete_data_info($postdata,$emptype);
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
            }
        }
    }

}