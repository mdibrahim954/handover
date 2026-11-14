<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Developer: Moshahed Alam
 * Date: 12-April-2018

 */
class User_dashboard_model extends CI_Model {

    /**
     * @author Md. Moshahed Alam

     */
    public function selectAllProductPagination($limit, $offset) {
        return $this->db
                        ->select('*')
//                        ->where("status", '1')
                        ->from('product')
                        ->order_by("id", "DESC")
//                        ->order_by("created_at", "DESC")
                        ->limit($limit)
                        ->get('', $limit, $offset)
                        ->result();
    }

    public function searchProduct($search_text, $category_id) {
        $this->db->select('*');
        if ($category_id != '') {
            $this->db->where('category_id', $category_id);
        }
        $this->db->like('name', $search_text);
        $this->db->or_like('item_code', $search_text);

        $this->db->from('product');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function today_unassign_order() {
        $current_date = date('Y-m-d 00:00:00');
        $today_target = date('Y-m-d 23:59:59');

        $this->db->select('*');
        $this->db->where('created_at BETWEEN "' . $current_date . '" and "' . $today_target . '"');
        $this->db->where('showing_status', 1);
        $this->db->where('order_state_id', 13); //Unassigned
        $this->db->from('orders');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function today_accepted_order() {
        $current_date = date('Y-m-d 00:00:00');
        $today_target = date('Y-m-d 23:59:59');

        $this->db->select('*');
        $this->db->where('updated_at BETWEEN "' . $current_date . '" and "' . $today_target . '"');
        $this->db->where('showing_status', 1);
        $this->db->where('order_state_id', 11); //Accepted
        $this->db->from('orders');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function today_completed_order() {
        $current_date = date('Y-m-d 00:00:00');
        $today_target = date('Y-m-d 23:59:59');

        $this->db->select('*');
        $this->db->where('updated_at BETWEEN "' . $current_date . '" and "' . $today_target . '"');
        $this->db->where('showing_status', 1);
        $this->db->where('order_state_id', 35); //Completed
        $this->db->from('orders');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function today_cancelled_order() {
        $current_date = date('Y-m-d 00:00:00');
        $today_target = date('Y-m-d 23:59:59');

        $this->db->select('*');
        $this->db->where('updated_at BETWEEN "' . $current_date . '" and "' . $today_target . '"');
        $this->db->where('showing_status', 1);
        $this->db->where('order_state_id', 2); //Cancelled
        $this->db->from('orders');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function today_declined_order() {
        $current_date = date('Y-m-d 00:00:00');
        $today_target = date('Y-m-d 23:59:59');

        $this->db->select('*');
        $this->db->where('updated_at BETWEEN "' . $current_date . '" and "' . $today_target . '"');
        $this->db->where('showing_status', 1);
        $this->db->where('order_state_id', 22); //Declined
        $this->db->from('orders');
        $query = $this->db->get();
        //return fetched data
        
        
        
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    
    public function today_booked_order() {
        $current_date = date('Y-m-d 00:00:00');
        $today_target = date('Y-m-d 23:59:59');

        $this->db->select('*');
        $this->db->where('updated_at BETWEEN "' . $current_date . '" and "' . $today_target . '"');
        $this->db->where('showing_status', 1);
        $this->db->where('order_state_id', 37); //Booked
        $this->db->from('orders');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function order_report_by_client($data) {

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';

        $target_date = $data['date_to'];
        $current_date = $data['date_from'];

        $this->db->select('*');
        $this->db->where('delivery_time BETWEEN "' . $current_date . '" and "' . $target_date . '"');
        $this->db->where('user_id', $data['user_id']);
        $this->db->where('showing_status', 1);
        $this->db->from('orderlist');
//        $this->db->order_by($data['orderby'], $data['sortby']);
//        $this->db->limit(20);
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function delivery_list_search($data) {

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';

        $target_date = $data['date_to'];
        $current_date = $data['date_from'];

        $this->db->select('*');
        $this->db->where('showing_status', 1);
        $this->db->where('delivery_time BETWEEN "' . $current_date . '" and "' . $target_date . '"');
        if ($data['areaname'] != 'All') {
            $this->db->where('delivery_area', $data['areaname']);
        }
        if ($data['orderstatename'] != 'All') {
            $this->db->where('orderstatename', $data['orderstatename']);
        }
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->from('orderlist');
        $this->db->order_by($data['orderby'], $data['sortby']);
//        $this->db->limit(20);
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function client_delivery_list_search($data) {

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';

        $target_date = $data['date_to'];
        $current_date = $data['date_from'];

        $this->db->select('*');
        $this->db->where('showing_status', 1);
        $this->db->where('delivery_time BETWEEN "' . $current_date . '" and "' . $target_date . '"');
        if ($data['areaname'] != 'All') {
            $this->db->where('delivery_area', $data['areaname']);
        }
        if ($data['orderstatename'] != 'All') {
            $this->db->where('orderstatename', $data['orderstatename']);
        }
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->from('orderlist');
        $this->db->order_by($data['orderby'], $data['sortby']);
//        $this->db->limit(20);
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function admin_delivery_list_search($data) {

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';

        $target_date = $data['date_to'];
        $current_date = $data['date_from'];

        $this->db->select('*');
        $this->db->where('showing_status', 1);
        $this->db->where('delivery_time BETWEEN "' . $current_date . '" and "' . $target_date . '"');
        if ($data['areaname'] != 'All') {
            $this->db->where('delivery_area', $data['areaname']);
        }
        if ($data['orderstatename'] != 'All') {
            $this->db->where('orderstatename', $data['orderstatename']);
        }
//        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->from('orderlist');
        $this->db->order_by($data['orderby'], $data['sortby']);
//        $this->db->limit(20);
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function client_all_list($data) {


        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('showing_status', 1);
        $this->db->from('orderlist');
//        $this->db->order_by($data['orderby'], $data['sortby']);
//        $this->db->limit(20);
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function admin_all_list($data) {

        $this->db->where('showing_status', 1);
        $this->db->from('orderlist');
//        $this->db->order_by($data['orderby'], $data['sortby']);
//        $this->db->limit(20);
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

}
