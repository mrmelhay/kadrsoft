<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.04.2017
 * Time: 13:08
 */

class UserModel extends MY_Model {



    public $rules=array(
        'username'=>array('field'=>'username','label'=>'Логин','rules'=>'required|max_length[50]'),
        'passowrd'=>array('field'=>'password','label'=>'Парол','rules'=>'required|max_length[32]')
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function login($login,$password)
    {
        $item_found=false;
        $this->db->select('users.*,spr_kollej.kollej_name,spr_kollej.kollej_parent_id,user_groups.group_name,user_groups.is_admin,user_rolles.roll_name');
        $this->db->from('users');
        $this->db->join('spr_kollej','spr_kollej.kollej_id=users.kollej_id','left');
        $this->db->join('user_groups','user_groups.group_id=users.group_id','left');
        $this->db->join('user_rolles','user_rolles.rolle_id=users.user_roll_id','left');
        $this->db->where('users.username', $login);
        $this->db->where('users.password', $password);
        $this->db->where('users.active', '1');
        $query = $this->db->get();
        $row_count = $query->num_rows();
        if ($row_count > 0) {
            $item_found=true;
            $userdata = $query->row();

            $newdata = array(
                'user_id' => $userdata->user_id,
                'username' => $userdata->username,
                'nname' => $userdata->firstname.'.'.mb_substr($userdata->lastname,0,1).'.'.mb_substr($userdata->middlename,0,1),
                'kollej_name' => $userdata->kollej_name,
                'kollej_id' => $userdata->kollej_id,
                'kollej_parent_id' => $userdata->kollej_parent_id,
                'group_id' => $userdata->group_id,
                'user_roll_id' => $userdata->user_roll_id,
                'email' => $userdata->email,
                'is_admin' => $userdata->is_admin,
                'group_name' => $userdata->group_name,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            $this->setLoginTime($userdata->user_id);
        }

        return $item_found;
    }

//    public function check_user($data = [])
//    {
//        return $this->db->select("*")
//            ->from("users")
//            ->where('email',$data['email'])
//            ->get();
//    }

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
        $user="";
        if (isset($this->userid) && $this->userid>0) {$user=$this->db->where('users.user_id',$this->userid);}

        $this->db->select('users.*,spr_kollej.kollej_name,user_groups.*');
        $this->db->from('users');
        $this->db->join('spr_kollej','spr_kollej.kollej_id=users.kollej_id','left');
        $this->db->join('user_groups','user_groups.group_id=users.group_id','left');
        $this->db->join('user_rolles','user_rolles.rolle_id=users.user_roll_id','left');
        $user;
        $this->db->order_by('users.user_id','ASC');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getGroupDropList($selected = false){
        $this->loadGroups();
//        $userdata=array();
//        $this->viloyat_id=$viloyat;

        if ($this->groupList){
            foreach ($this->groupList as $key => $row) {
                $sel = ($row['group_id']== $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['group_id'] . '"'.$sel.'">';
                print $row['group_name'] . '</option>';
            }
        }
    }

    public function getRollsDropList($selected = false){
        $this->loadRolls();
//        $userdata=array();
//        $this->viloyat_id=$viloyat;

        if ($this->rollsList){
            foreach ($this->rollsList as $key => $row) {
                $sel = ($row['rolle_id']== $selected) ? " selected=\"selected\"" : "";
                print '<option value="' . $row['rolle_id'] . '"'.$sel.'">';
                print $row['roll_name'] . '</option>';
            }
        }
    }

    public function insert_user($data){
        $this->db->insert('users',$data);
        if ($this->db->affected_rows()){
            return true;
        }
        else {
            return false;
        }
    }

    public function update_user($data){

        $this->db->where('users.user_id',$data['user_id']);
        $this->db->update('users',$data);
        if ($this->db->affected_rows()){
            return true;
        }
        else {
            return false;
        }
    }

    public function delete_user($data){
        $this->db->delete('users',$data);
        if ($this->db->affected_rows()){
            return true;
        }
        else {
            return false;
        }
    }

    public function update_login($data = [])
    {
        $this->db->where('users.user_id', $data['user_id']);
        $this->db->update('users', $data);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }




}