<?php

/**
 * Created by PhpStorm.
 * User: Hayrulla
 * Date: 27.04.2017
 * Time: 11:34
 */
class EmployeeModel extends MY_Model
{

    public function loadEmployee()
    {
        $this->db->select('*');
        $this->db->from('d_kadr.*, d_kadr_items_bind');
        $this->db->join('d_kadr_items_bind', 'd_kadr_items_bind.kadr_id = d_kadr.kadr_id', 'left');
        $this->db->order_by('d_kadr.kadr_id', 'ASC');
        $query=$this->db->get();
        return $query->result_array();

    }

}