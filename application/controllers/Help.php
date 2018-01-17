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
            case '03':
                $url .= "03";
                break;
            case '04':
                $url .= "04";
                break;
            case '05':
                $url .= "05";
                break;
            case '06':
                $url .= "06";
                break;
            case '07':
                $url .= "07";
                break;
            case '08':
                $url .= "08";
                break;
            case '09':
                $url .= "09";
                break;
            case '10':
                $url .= "10";
                break;
            case '11':
                $url .= "11";
                break;
            default:
                $url .= "index";
                break;
        }

        $this->data['title']='Коллеж Кадр дастури қўлланмаси';
        $this->data['content'] = $this->load->view('book/' . $url, $this->data, true);
        $this->view_lib->admin_layout($this->data);

    }
}