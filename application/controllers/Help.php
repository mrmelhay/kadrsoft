<?php

/**
 * Created by PhpStorm.
 * User: ideveloper
 * Date: 25.08.17
 * Time: 15:38
 */
class Help extends MY_Controller
{

    public function __construct(){
        parent::__construct();

    }

    public function index($param = null)
    {

//        $param=1;
//        echo $param;
        $url = "";
        switch ($param) {
            case '01':
                $url .= "01";
                break;
            case '02':
                $url .= "02";
                break;
            default:
                $url .= "index";
                break;
        }

        $this->data['title'] = 'Коллеж Кадр дастури қўлланмаси';
        $this->data['content'] = $this->load->view('book/' . $url, $this->data, true);
        $this->view_lib->admin_layout($this->data);

    }
}