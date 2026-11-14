<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daynamic_order_model extends CI_Model {

public function getUserAddress() {
    if (!$this->session->userdata('menu_permission')) {
        return ["message" => "Permission denied!"];
    }
    $per_page = $_GET['per_page'] ?? 20;
    $page     = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $offset   = ($page - 1) * $per_page;

    $search       = trim($_GET['search'] ?? '');
    $search_terms = array_values(array_filter(array_map('trim', explode(' ', $search))));
    $is_multi     = count($search_terms) > 1;

    $this->db->select('*');
    $this->db->from('orders');

    $this->db->group_start();

        // These fields: use full phrase as-is
        $this->db->like('order_id', $search);
        $this->db->or_like('track_number', $search);
        $this->db->or_like('customer_mobile', $search);

        if ($is_multi) {
            // customer_name: match full phrase OR each word individually
            $this->db->or_group_start();
                $this->db->like('customer_name', $search);
            $this->db->group_end();

            // customer_address: each word must appear (AND logic = order-independent)
            $this->db->or_group_start();
                foreach ($search_terms as $term) {
                    $this->db->like('customer_address', $term); // chained = AND
                }
            $this->db->group_end();

        } else {
            // Single word: normal OR LIKE is fine
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
        }

    $this->db->group_end();

    // Total count of rows matching the search (keeps WHERE conditions for next query)
    $total       = $this->db->count_all_results('', false);
    $total_pages = ceil($total / $per_page);

    $data = $this->db->order_by('order_id', 'DESC')
                      ->limit($per_page, $offset)
                      ->get()
                      ->result_array();

    return [
        "totalpage" => $total_pages,
        "total"     => $total,
        "data"      => $data
    ];
}

    public function get_invoice_Data(){
        $order_id = $_GET['order_id'] ?? null;
        $limit = $_GET['limit'] ?? 50;
        $day = !empty($_GET['day']) ? $_GET['day'] : null;
        
        $query_day = null;

        
        if (empty($order_id)) {
            // if (empty($limit) ) {
            //     return [
            //         "Error" => "The route needs order_id or limit parameter",
            //     ];
            // }

            date_default_timezone_set('Asia/Dhaka');

            if($day !== null){
                if(intval($day) === 1){
                    $query_day = date("Y-m-d");
                }else if(intval($day) === 2){
                    $query_day = date("Y-m-d", strtotime("-1 day"));
                }else if(intval($day) > 2){
                    $query_day = date("Y-m-d", strtotime("-$day days"));
                }
            }
        

            $limit_count = is_numeric($limit) ? intval($limit) : 50;
            return $this->get_invoice($query_day, $limit_count);
        }

        $order = $this->db->select('*')
                        ->where('order_id', $order_id)
                        ->where('order_state_id', 13)
                        ->get('orders')
                        ->row();
        $total = $this->db
                        ->where('order_state_id', 13)
                        ->count_all_results('orders');

                        
        if (empty($order)) {
            return [
                "Error" => "Order not found",
            ];
        }

        $order_details = $this->db->select('*')
                            ->where('order_id', $order_id)
                            ->get('order_details')
                            ->result();

        $refarence_user = $this->db
                        ->select('*')
                        ->where('userid', $order->order_created_by)
                        ->get('users')
                        ->row();
        $areaInfo =  $this->db->select('*')
                                  ->where('areaid', $order->delivery_area_id)
                                  ->get('areas')
                                  ->row();
        $pickupInfo =  $this->db->select('*')
                                  ->where('areaid', $order->pickup_area_id)
                                  ->get('areas')
                                  ->row();
        $current_user_first_name = $this->session->userdata('first_name');
        $current_user_last_name = $this->session->userdata('last_name');

        return [
            "order" => $order,
            "total" => $total,
            "order_details" => $order_details,
            "refarence_user" => $refarence_user,
            "area_info" => $areaInfo,
            "pickup_info" => $pickupInfo,
            "printed_by" => [
                "first_name" => $current_user_first_name,
                "last_name" => $current_user_last_name
            ]
        ];
    }

    private function get_invoice($day , $limit) {
   
        
        $data = [];

        // if ( empty($limit)) {
        //     return [
        //         "Error" => "The route needs limit parameter",
        //     ];
        // }
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

         $offset   = ($page - 1) * $limit;

        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_state_id', 13);

        if (!empty($day) && intval($day) > 0) {
            $this->db->like('created_at', $day);
        }
        $counter = $this->db->count_all_results('', false);
        if (!empty($limit) && intval($limit) > 0) {
            $this->db->limit($limit , $offset);
        }


        
        $orders = $this->db->order_by('order_id', 'DESC')
                    ->get()
                    ->result_array();
        $total = $counter;

        $current_user_first_name = $this->session->userdata('first_name');
        $current_user_last_name = $this->session->userdata('last_name');
        
        foreach($orders as $order){
            $order_id = $order['order_id'];
            $rf = $order['order_created_by'];
            $order_details = $this->db->select('*')
                        ->where('order_id', $order_id)
                        ->get('order_details')
                        ->result();


            $refarence_user = $this->db
                            ->select('*')
                            ->where('userid', $rf)
                            ->get('users')
                            ->row();
            $statusInfo = $this->db->select('*')
                                    ->where('orderstateid', $order['order_state_id'])
                                    ->get('order_state')
                                    ->row();
             $areaInfo = $this->db->select('*')
                                  ->where('areaid', $order['delivery_area_id'])
                                  ->get('areas')
                                  ->row();
            $pickupInfo = $this->db->select('*')
                                  ->where('areaid', $order['pickup_area_id'])
                                  ->get('areas')
                                  ->row();
            
            $data[] = [
                "order" => $order ,
                
                "order_details" => $order_details , 
                "refarence_user" => $refarence_user , 
                "order_state_info" => $statusInfo,
                "area_info" => $areaInfo,
                "pickup_info" => $pickupInfo,
                "printed_by" => [
                    "first_name" => $current_user_first_name ,
                    "last_name" => $current_user_last_name
                ]
            ];
        }

        $data = [
            "total" => $total,
            "data" => $data,
            "order" => $orders
        ];

        return $data;
    }

   public function getOrder() {
    $limit = isset($_GET['search']) ? intval($_GET['search']) : 20;
    $per_page = $_GET['per_page'] ?? 20;
    $page     = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $offset   = ($page - 1) * $per_page;
    $new_order_state_id = 13;

    if ($this->session->userdata('menu_permission')) {

        $this->db->from('orders');
        $this->db->where('order_state_id', $new_order_state_id);
        $filtered_total = $this->db->count_all_results();
        $total = $limit === 0 ? $filtered_total : min($limit, $filtered_total);
        $total_pages = $per_page !== "0" ? ceil($total / $per_page) : $filtered_total;

        // Paginated data
        $this->db->from('orders');
        $this->db->where('order_state_id', $new_order_state_id);
        $data = $this->db->order_by('order_id', 'DESC')->limit($per_page, $offset)->get()->result_array();

        $split_data_rewrite = [];
        foreach ($data as $row) {
            $order_state_id   = $row['order_state_id'];
            $delivery_area_id = $row['delivery_area_id'];

            $statusInfo = $this->db->select('*')
                                    ->where('orderstateid', $order_state_id)
                                    ->get('order_state')
                                    ->row();

            $areaInfo = $this->db->select('*')
                                  ->where('areaid', $delivery_area_id)
                                  ->get('areas')
                                  ->row();

            $row['order_state_info'] = $statusInfo;
            $row['area_info']        = $areaInfo;

            $split_data_rewrite[] = $row;
        }

        return ["totalpage" => $total_pages, "data" => $split_data_rewrite];

    } else {
        return ["message" => "Permission denied!"];
    }
}
}