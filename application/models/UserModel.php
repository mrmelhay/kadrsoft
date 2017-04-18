<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 13:08
 */

class UserModel extends CI_Model{

    public $rules=array(
        'username'=>array('field'=>'username','label'=>'Логин','rules'=>'required|max_length[50]'),
        'passowrd'=>array('field'=>'password','label'=>'Парол','rules'=>'required|max_length[32]')
    );

    public function login($login,$password)
    {
        $item_found=false;
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $login);
        $this->db->where('password', $password);
        $this->db->where('active', '1');
        $query = $this->db->get();
        $row_count = $query->num_rows();
        if ($row_count > 0) {
            $item_found=true;
            $userdata = $query->row();
            $newdata = array(
                'user_id' => $userdata->user_id,
                'username' => $userdata->username,
                'nname' => $userdata->firstname.' '.$userdata->lastname.' '.$userdata->middlename,
                'kollej_id' => $userdata->kollej_id,
                'group_id' => $userdata->group_id,
                'user_roll_id' => $userdata->user_roll_id,
                'email' => $userdata->email,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            $this->setLoginTime($userdata->user_id);
        }

        return $item_found;
    }

    public function setLoginTime($user_id){
        $data['last_visit']=date("Y-m-d H:i:s");
        $data['lastip']=$_SERVER['SERVER_ADDR'];
        $this->db->where('user_id',$user_id);
        $this->db->update('users',$data);
    }

    public function logout(){
        $this->session->sess_destroy();
    }

    public function getUserList(){
        $this->db->select('users.*,spr_kollej.kollej_name,user_groups');
        $this->db->from('users');
        $this->db->join('spr_kollej','sp_kollej.kollej_id=users.kollej_id','left');
        $this->db->join('user_groups','user_groups.group_id=users.group_id','left');
        $this->db->join('user_rolles','user_rolles.rolle_id=users.user_roll_id','left');
    }
}