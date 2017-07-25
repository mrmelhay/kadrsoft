<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 11:44
 */
class View_lib{

    private $CI;

    public function user_layout($data){
        $this->CI=& get_instance();
        $this->CI->load->view('header');
        $this->CI->load->view('content',$data);
        $this->CI->load->view('footer');
    }

    public function admin_layout($data){
        $this->CI=& get_instance();
        $this->CI->load->view('header',$data);
        $this->CI->load->view('content',$data);
        $this->CI->load->view('footer');
    }
}
?>