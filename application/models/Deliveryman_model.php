<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Developer: Moshahed Alam
 * Date: 12-April-2018

 */
class Deliveryman_model extends CI_Model {

    /**
     * @author Md. Moshahed Alam

     */
    public function todays_tasklist($user_id) {
        $current_date=date('Y-m-d 00:00:00');
        $today_target=date('Y-m-d 23:59:59');

        $this->db->select('*');
        $this->db->where('user_id',$user_id);
        $this->db->where('created_at BETWEEN "' . $current_date . '" and "' . $today_target . '"');
        $this->db->from('order_task_person');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
//    public function today_unassign_order() {
//        $current_date=date('Y-m-d 00:00:00');
//        $today_target=date('Y-m-d 23:59:59');
//
//        $this->db->select('*');
//        $this->db->where('created_at BETWEEN "' . $current_date . '" and "' . $today_target . '"');
//        $this->db->where('showing_status', 1);
//        $this->db->where('order_state_id', 13);//Unassigned
//        $this->db->from('orders');
//        $query = $this->db->get();
//        //return fetched data
//        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
//    }


}
