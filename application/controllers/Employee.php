<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.04.2017
 * Time: 11:44
 */
class Employee extends MY_Controller{


    public function __construct()
    {
        parent::__construct();
    }

    public function employees(){

        $this->data['title'] = 'Ходимлар рўйхати';
        $this->data['employees']=$this->EmployeeModel->getEmployeeList();
        $this->data['content'] = $this->load->view('/employee/employee_list', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function archives(){
        $this->data['title'] = 'Ходимлар рўйхати';
        $this->data['content'] = $this->load->view('/employee/employee_arch', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function stir(){
        $this->data['title'] = 'Ходимлар рўйхати';
        $this->data['content'] = $this->load->view('/employee/employee_stir', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }

    public function add_employee(){
        $this->data['title'] = 'Янги ходимни қўшиш';
        $this->data['employee'] = (object)$postData = [
                                                    'kadrid'              => 0,
                                                    'name_f'              => null,
                                                    'name_i'              => null,
                                                    'name_o'              => null,
                                                    'bdate'               => null,
                                                    'sex'                 => null,
                                                    'lavozim_id'          => null,
                                                    'malumot_id'          => null,
                                                    'malaka_lavozim_id'   => null,
                                                    'mutax_turi_id'       => 0,
                                                    'millat_id'           => null,
                                                    'oila_id'             => null,
                                                    'davlat_id'           => null,
                                                    'viloyat_id'          => null,
                                                    'tuman_id'   => null,
                                                    'umumiy_staj'   => null,
                                                    'ped_staj'   => null,
                                                    'partiya_id'   => null,
                                                    'inn'   => null,
                                                    'inps'   => null,
                                                    'email'   =>null,
                                                    'phone_work'   => null,
                                                    'phone_mobile'   => null,
        ];
        $this->data['content'] = $this->load->view('/employee/add_employee', $this->data, true);
        $this->view_lib->admin_layout($this->data);
    }


    public function create_employee(){

        $this->form_validation->set_rules('name_f','Фамилияси','required|max_length[50]');
        $this->form_validation->set_rules('name_i','Исми','required|max_length[50]');
        $this->form_validation->set_rules('name_o','Отасининг исми','max_length[20]');
        $this->form_validation->set_rules('bdate','Туғилган вақти','required|max_length[20]');
        $this->form_validation->set_rules('sex','Жинси','max_length[10]');
        $this->form_validation->set_rules('lavozim_id','Лавозими','required|max_length[10]');
        $this->form_validation->set_rules('malumot_id','Маълумоти','max_length[10]');
//        $this->form_validation->set_rules('malaka_lavozim_id','Address','required|max_length[255]');
        $this->form_validation->set_rules('mutax_kodi_id','Мутахасислиги','required');
        $kollej_id=$this->data['username'];
        $picture = $this->fileupload->do_upload(base_url('images/photos/'),'photo');
        if ($picture !== false && $picture != null) {
            $this->fileupload->do_resize($picture,200,150);
        }
        if ($picture === false) {
            $this->session->set_flashdata('exception', 'Invalid picture!');
        }
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
                'davlat_id' => $this->input->post('davlat_id', true),
                'viloyat_id' => $this->input->post('viloyat_id', true),
                'tuman_id' => $this->input->post('tuman_id', true),
                'umumiy_staj' => $this->input->post('umumiy_staj', true),
                'ped_staj' => $this->input->post('ped_staj', true),
                'partiya_id' => $this->input->post('partiya_id', true),
                'inn' => $this->input->post('inn', true),
                'inps' => $this->input->post('inps', true),
                'email' => $this->input->post('email', true),
                'phone_work' => $this->input->post('phone_work', true),
                'phone_mobile' => $this->input->post('phone_mobile', true),
            ];


        if ($this->form_validation->run() === true) {
            $kadrid=$this->EmployeeModel->createOrUpdate($postData);
            if ($kadrid) {
                 $postData2 = ['kadrid'=> $kadrid,'kollej_id'=>$kollej_id['kollej_id']];
                 $this->EmployeeModel->createOrUpdateItemsBind($postData2 );
                $this->session->set_flashdata('message',"Маълумот киритилди!");
                redirect("/employee/employees");
            } else {
                $this->session->set_flashdata('exception',"Маълумот киритилмади. Илтимос қайтадан кўриб чиқинг !");
                redirect("/employee/add_employee");
            }

        }else{
            $this->data['title'] = 'Янги ходимни қўшиш';
            $this->data['content'] = $this->load->view('/employee/add_employee', $this->data, true);
            $this->view_lib->admin_layout($this->data);
        }
    }


    public function edit_employee($kadrid= null){
       $editdata=$this->EmployeeModel->read_by_data($kadrid);
//       print_r($editdata);
        $this->data['employee'] = (object)$postData = [
            'kadrid'              => $editdata['kadrid'],
            'name_f'              => $editdata['name_f'],
            'name_i'              => $editdata['name_i'],
            'name_o'              => $editdata['name_o'],
            'bdate'               => $editdata['bdate'],
            'sex'                 => $editdata['sex'],
            'lavozim_id'          => $editdata['lavozim_id'],
            'malumot_id'          => $editdata['malumot_id'],
            'malaka_lavozim_id'   => $editdata['malaka_lavozim_id'],
            'mutax_turi_id'       => $editdata['mutax_turi_id'],
            'mutax_kodi_id'       => $editdata['mutax_kodi_id'],
            'millat_id'           => $editdata['millat_id'],
            'oila_id'             => $editdata['oila_id'],
            'davlat_id'           => $editdata['davlat_id'],
            'viloyat_id'          => $editdata['viloyat_id'],
            'tuman_id'            => $editdata['tuman_id'],
            'umumiy_staj'         => $editdata['umumiy_staj'],
            'ped_staj'            => $editdata['ped_staj'],
            'partiya_id'          => $editdata['partiya_id'],
            'inn'                 => $editdata['inn'],
            'inps'                => $editdata['inps'],
            'email'               => $editdata['email'],
            'phone_work'          => $editdata['phone_work'],
            'phone_mobile'        => $editdata['phone_mobile'],
        ];
        $this->data['title'] = 'Янги ходимни қўшиш';
        $this->data['content'] = $this->load->view('/employee/add_employee', $this->data, true);
        $this->view_lib->admin_layout($this->data);

    }


}