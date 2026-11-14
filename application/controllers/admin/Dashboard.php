<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
        $this->load->model('user_dashboard_model');
    }

    public function index() {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['delivery_man'] = $this->db
                ->select('*')
                ->where('isactive', 1) // active delivery man
                ->where('user_type_id', 2)// delivery man
                ->get('users')
                ->result();
        $data['states'] = $this->db
                ->select('*')
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $pending = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Started', 'Accepted', 'Picked Up Complete', 'Pending'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
        // sort order by order_id desc---------------------------------
        $data['pending'] = $this->msort($pending, array('order_id'));


        $data['new'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Unassigned')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
        $data['booked'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Booked')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
        $data['completed'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['accepted'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Accepted')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['cancelled'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Cancelled', 'Declined', 'Failed'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['declined'] = $this->db
                ->select('*')
                ->where('showing_status', 0)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';

        $unassaign_total = $this->user_dashboard_model->today_unassign_order();
        if (isset($unassaign_total[0]['order_id'])) {
            $data['unassaign_total'] = count($unassaign_total);
        } else {
            $data['unassaign_total'] = 0;
        }

        $accepted_total = $this->user_dashboard_model->today_accepted_order();
        if (isset($accepted_total[0]['order_id'])) {
            $data['accepted_total'] = count($accepted_total);
        } else {
            $data['accepted_total'] = 0;
        }

        $completed_total = $this->user_dashboard_model->today_completed_order();
        if (isset($completed_total[0]['order_id'])) {
            $data['completed_total'] = count($completed_total);
        } else {
            $data['completed_total'] = 0;
        }

        $paid_total = $this->user_dashboard_model->today_completed_order();
        if (isset($paid_total[0]['order_id'])) {
            $data['paid_total'] = count($paid_total);
        } else {
            $data['paid_total'] = 0;
        }

        $canceled_total = $this->user_dashboard_model->today_cancelled_order();
        if (isset($canceled_total[0]['order_id'])) {
            $data['canceled_total'] = count($canceled_total);
        } else {
            $data['canceled_total'] = 0;
        }

        $deleted_total = $this->user_dashboard_model->today_declined_order();
        if (isset($deleted_total[0]['order_id'])) {
            $data['deleted_total'] = count($deleted_total);
        } else {
            $data['deleted_total'] = 0;
        }
        
        
        $booked_total = $this->user_dashboard_model->today_booked_order();
        if (isset($booked_total[0]['order_id'])) {
            $data['booked_total'] = count($booked_total);
        } else {
            $data['booked_total'] = 0;
        }

        $data['count_pending'] = count($data['pending']);
        $data['count_new'] = count($data['new']);
        $data['count_completed'] = count($data['completed']);
        $data['count_accepted'] = count($data['accepted']);
        $data['count_cancelled'] = count($data['cancelled']);
        $data['count_declined'] = count($data['declined']);
        $data['count_booked'] = count($data['booked']);

        $data['todays_order_status'] = $this->load->view('dashboard-admin/order-status/todays-order-status', $data, TRUE);
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order-status/pending-order', $data);
    }

    public function new_order() {
        $data = array();

        $data['delivery_man'] = $this->db
                ->select('*')
                ->where('isactive', 1) // active delivery man
                ->where('user_type_id', 2)// delivery man
                ->get('users')
                ->result();
        $data['states'] = $this->db
                ->select('*')
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['pending'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Started', 'Accepted', 'Picked Up Complete', 'Pending'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['new'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Unassigned')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['completed'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['accepted'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Accepted')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['cancelled'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Cancelled', 'Declined', 'Failed'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['declined'] = $this->db
                ->select('*')
                ->where('showing_status', 0)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
        
        $data['booked'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Booked')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';

        $unassaign_total = $this->user_dashboard_model->today_unassign_order();
        if (isset($unassaign_total[0]['order_id'])) {
            $data['unassaign_total'] = count($unassaign_total);
        } else {
            $data['unassaign_total'] = 0;
        }

        $accepted_total = $this->user_dashboard_model->today_accepted_order();
        if (isset($accepted_total[0]['order_id'])) {
            $data['accepted_total'] = count($accepted_total);
        } else {
            $data['accepted_total'] = 0;
        }

        $completed_total = $this->user_dashboard_model->today_completed_order();
        if (isset($completed_total[0]['order_id'])) {
            $data['completed_total'] = count($completed_total);
        } else {
            $data['completed_total'] = 0;
        }

        $paid_total = $this->user_dashboard_model->today_completed_order();
        if (isset($paid_total[0]['order_id'])) {
            $data['paid_total'] = count($paid_total);
        } else {
            $data['paid_total'] = 0;
        }

        $canceled_total = $this->user_dashboard_model->today_cancelled_order();
        if (isset($canceled_total[0]['order_id'])) {
            $data['canceled_total'] = count($canceled_total);
        } else {
            $data['canceled_total'] = 0;
        }

        $deleted_total = $this->user_dashboard_model->today_declined_order();
        if (isset($deleted_total[0]['order_id'])) {
            $data['deleted_total'] = count($deleted_total);
        } else {
            $data['deleted_total'] = 0;
        }
        
        $booked_total = $this->user_dashboard_model->today_booked_order();
        if (isset($booked_total[0]['order_id'])) {
            $data['booked_total'] = count($booked_total);
        } else {
            $data['booked_total'] = 0;
        }

        $data['count_pending'] = count($data['pending']);
        $data['count_new'] = count($data['new']);
        $data['count_completed'] = count($data['completed']);
        $data['count_accepted'] = count($data['accepted']);
        $data['count_cancelled'] = count($data['cancelled']);
        $data['count_declined'] = count($data['declined']);
        $data['count_booked'] = count($data['booked']);

        $data['todays_order_status'] = $this->load->view('dashboard-admin/order-status/todays-order-status', $data, TRUE);
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order-status/new-order', $data);
    }

    public function completed_order() {
        $data = array();

        $data['delivery_man'] = $this->db
                ->select('*')
                ->where('isactive', 1) // active delivery man
                ->where('user_type_id', 2)// delivery man
                ->get('users')
                ->result();
        $data['states'] = $this->db
                ->select('*')
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['pending'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Started', 'Accepted', 'Picked Up Complete', 'Pending'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['new'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Unassigned')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['completed'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->limit(400)
                ->get('orderlist')
                ->result();
        $data['completedCount'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['accepted'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Accepted')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['cancelled'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Cancelled', 'Declined', 'Failed'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['declined'] = $this->db
                ->select('*')
                ->where('showing_status', 0)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
        $data['booked'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Booked')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
            // echo '<pre>';
            // print_r($data['order']);
            // echo '</pre>';

        $unassaign_total = $this->user_dashboard_model->today_unassign_order();
        if (isset($unassaign_total[0]['order_id'])) {
            $data['unassaign_total'] = count($unassaign_total);
        } else {
            $data['unassaign_total'] = 0;
        }

        $accepted_total = $this->user_dashboard_model->today_accepted_order();
        if (isset($accepted_total[0]['order_id'])) {
            $data['accepted_total'] = count($accepted_total);
        } else {
            $data['accepted_total'] = 0;
        }

        $completed_total = $this->user_dashboard_model->today_completed_order();
        if (isset($completed_total[0]['order_id'])) {
            $data['completed_total'] = count($completed_total);
        } else {
            $data['completed_total'] = 0;
        }

        $paid_total = $this->user_dashboard_model->today_completed_order();
        if (isset($paid_total[0]['order_id'])) {
            $data['paid_total'] = count($paid_total);
        } else {
            $data['paid_total'] = 0;
        }

        $canceled_total = $this->user_dashboard_model->today_cancelled_order();
        if (isset($canceled_total[0]['order_id'])) {
            $data['canceled_total'] = count($canceled_total);
        } else {
            $data['canceled_total'] = 0;
        }

        $deleted_total = $this->user_dashboard_model->today_declined_order();
        if (isset($deleted_total[0]['order_id'])) {
            $data['deleted_total'] = count($deleted_total);
        } else {
            $data['deleted_total'] = 0;
        }
        
        $booked_total = $this->user_dashboard_model->today_booked_order();
        if (isset($booked_total[0]['order_id'])) {
            $data['booked_total'] = count($booked_total);
        } else {
            $data['booked_total'] = 0;
        }

        $data['count_pending'] = count($data['pending']);
        $data['count_new'] = count($data['new']);
        $data['count_completed'] = count($data['completedCount']);
        $data['count_accepted'] = count($data['accepted']);
        $data['count_cancelled'] = count($data['cancelled']);
        $data['count_declined'] = count($data['declined']);
        $data['count_booked'] = count($data['booked']);
        
        $data['todays_order_status'] = $this->load->view('dashboard-admin/order-status/todays-order-status', $data, TRUE);
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order-status/completed-order', $data);
//        $this->load->view('dashboard-admin/order-status/booked-order', $data);
    }
    public function booked_order() {
        $data = array();

        $data['delivery_man'] = $this->db
                ->select('*')
                ->where('isactive', 1) // active delivery man
                ->where('user_type_id', 2)// delivery man
                ->get('users')
                ->result();
        $data['states'] = $this->db
                ->select('*')
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['pending'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Started', 'Accepted', 'Picked Up Complete', 'Pending'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['new'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Unassigned')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['completed'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->limit(1500)
                ->get('orderlist')
                ->result();
        $data['completedCount'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['accepted'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Accepted')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['cancelled'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Cancelled', 'Declined', 'Failed'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['declined'] = $this->db
                ->select('*')
                ->where('showing_status', 0)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
        $data['booked'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Booked')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';

        $unassaign_total = $this->user_dashboard_model->today_unassign_order();
        if (isset($unassaign_total[0]['order_id'])) {
            $data['unassaign_total'] = count($unassaign_total);
        } else {
            $data['unassaign_total'] = 0;
        }

        $accepted_total = $this->user_dashboard_model->today_accepted_order();
        if (isset($accepted_total[0]['order_id'])) {
            $data['accepted_total'] = count($accepted_total);
        } else {
            $data['accepted_total'] = 0;
        }

        $completed_total = $this->user_dashboard_model->today_completed_order();
        if (isset($completed_total[0]['order_id'])) {
            $data['completed_total'] = count($completed_total);
        } else {
            $data['completed_total'] = 0;
        }

        $paid_total = $this->user_dashboard_model->today_completed_order();
        if (isset($paid_total[0]['order_id'])) {
            $data['paid_total'] = count($paid_total);
        } else {
            $data['paid_total'] = 0;
        }

        $canceled_total = $this->user_dashboard_model->today_cancelled_order();
        if (isset($canceled_total[0]['order_id'])) {
            $data['canceled_total'] = count($canceled_total);
        } else {
            $data['canceled_total'] = 0;
        }

        $deleted_total = $this->user_dashboard_model->today_declined_order();
        if (isset($deleted_total[0]['order_id'])) {
            $data['deleted_total'] = count($deleted_total);
        } else {
            $data['deleted_total'] = 0;
        }
        
        $booked_total = $this->user_dashboard_model->today_booked_order();
        if (isset($booked_total[0]['order_id'])) {
            $data['booked_total'] = count($booked_total);
        } else {
            $data['booked_total'] = 0;
        }

        $data['count_pending'] = count($data['pending']);
        $data['count_new'] = count($data['new']);
        $data['count_completed'] = count($data['completedCount']);
        $data['count_accepted'] = count($data['accepted']);
        $data['count_cancelled'] = count($data['cancelled']);
        $data['count_declined'] = count($data['declined']);
        $data['count_booked'] = count($data['booked']);

        $data['todays_order_status'] = $this->load->view('dashboard-admin/order-status/todays-order-status', $data, TRUE);
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order-status/booked-order', $data);
    }

    public function paid_order() {
        $data = array();

        $data['delivery_man'] = $this->db
                ->select('*')
                ->where('isactive', 1) // active delivery man
                ->where('user_type_id', 2)// delivery man
                ->get('users')
                ->result();
        $data['states'] = $this->db
                ->select('*')
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['pending'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Started', 'Accepted', 'Picked Up Complete', 'Pending'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['new'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Unassigned')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['completed'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['accepted'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Accepted')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['cancelled'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Cancelled', 'Declined', 'Failed'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['declined'] = $this->db
                ->select('*')
                ->where('showing_status', 0)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
        $data['booked'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Booked')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';

        $unassaign_total = $this->user_dashboard_model->today_unassign_order();
        if (isset($unassaign_total[0]['order_id'])) {
            $data['unassaign_total'] = count($unassaign_total);
        } else {
            $data['unassaign_total'] = 0;
        }

        $accepted_total = $this->user_dashboard_model->today_accepted_order();
        if (isset($accepted_total[0]['order_id'])) {
            $data['accepted_total'] = count($accepted_total);
        } else {
            $data['accepted_total'] = 0;
        }

        $completed_total = $this->user_dashboard_model->today_completed_order();
        if (isset($completed_total[0]['order_id'])) {
            $data['completed_total'] = count($completed_total);
        } else {
            $data['completed_total'] = 0;
        }

        $paid_total = $this->user_dashboard_model->today_completed_order();
        if (isset($paid_total[0]['order_id'])) {
            $data['paid_total'] = count($paid_total);
        } else {
            $data['paid_total'] = 0;
        }

        $canceled_total = $this->user_dashboard_model->today_cancelled_order();
        if (isset($canceled_total[0]['order_id'])) {
            $data['canceled_total'] = count($canceled_total);
        } else {
            $data['canceled_total'] = 0;
        }

        $deleted_total = $this->user_dashboard_model->today_declined_order();
        if (isset($deleted_total[0]['order_id'])) {
            $data['deleted_total'] = count($deleted_total);
        } else {
            $data['deleted_total'] = 0;
        }
        
        $booked_total = $this->user_dashboard_model->today_booked_order();
        if (isset($booked_total[0]['order_id'])) {
            $data['booked_total'] = count($booked_total);
        } else {
            $data['booked_total'] = 0;
        }

        $data['count_pending'] = count($data['pending']);
        $data['count_new'] = count($data['new']);
        $data['count_completed'] = count($data['completed']);
        $data['count_accepted'] = count($data['accepted']);
        $data['count_cancelled'] = count($data['cancelled']);
        $data['count_declined'] = count($data['declined']);
        $data['count_booked'] = count($data['booked']);

        $data['todays_order_status'] = $this->load->view('dashboard-admin/order-status/todays-order-status', $data, TRUE);
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order-status/paid-order', $data);
    }

    public function canceled_order() {
        $data = array();

        $data['delivery_man'] = $this->db
                ->select('*')
                ->where('isactive', 1) // active delivery man
                ->where('user_type_id', 2)// delivery man
                ->get('users')
                ->result();
        $data['states'] = $this->db
                ->select('*')
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['pending'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Started', 'Accepted', 'Picked Up Complete', 'Pending'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['new'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Unassigned')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['completed'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['accepted'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Accepted')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['cancelled'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Cancelled', 'Declined', 'Failed'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->limit(400)
                ->get('orderlist')
                ->result();
        $data['cancelledCount'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Cancelled', 'Declined', 'Failed'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['declined'] = $this->db
                ->select('*')
                ->where('showing_status', 0)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
        $data['booked'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Booked')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        
//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';

        $unassaign_total = $this->user_dashboard_model->today_unassign_order();
        if (isset($unassaign_total[0]['order_id'])) {
            $data['unassaign_total'] = count($unassaign_total);
        } else {
            $data['unassaign_total'] = 0;
        }

        $accepted_total = $this->user_dashboard_model->today_accepted_order();
        if (isset($accepted_total[0]['order_id'])) {
            $data['accepted_total'] = count($accepted_total);
        } else {
            $data['accepted_total'] = 0;
        }

        $completed_total = $this->user_dashboard_model->today_completed_order();
        if (isset($completed_total[0]['order_id'])) {
            $data['completed_total'] = count($completed_total);
        } else {
            $data['completed_total'] = 0;
        }

        $paid_total = $this->user_dashboard_model->today_completed_order();
        if (isset($paid_total[0]['order_id'])) {
            $data['paid_total'] = count($paid_total);
        } else {
            $data['paid_total'] = 0;
        }

        $canceled_total = $this->user_dashboard_model->today_cancelled_order();
        if (isset($canceled_total[0]['order_id'])) {
            $data['canceled_total'] = count($canceled_total);
        } else {
            $data['canceled_total'] = 0;
        }

        $deleted_total = $this->user_dashboard_model->today_declined_order();
        if (isset($deleted_total[0]['order_id'])) {
            $data['deleted_total'] = count($deleted_total);
        } else {
            $data['deleted_total'] = 0;
        }
        
        $booked_total = $this->user_dashboard_model->today_booked_order();
        if (isset($booked_total[0]['order_id'])) {
            $data['booked_total'] = count($booked_total);
        } else {
            $data['booked_total'] = 0;
        }

        $data['count_pending'] = count($data['pending']);
        $data['count_new'] = count($data['new']);
        $data['count_completed'] = count($data['completed']);
        $data['count_accepted'] = count($data['accepted']);
        $data['count_cancelled'] = count($data['cancelledCount']);
        $data['count_declined'] = count($data['declined']);
        $data['count_booked'] = count($data['booked']);

        $data['todays_order_status'] = $this->load->view('dashboard-admin/order-status/todays-order-status', $data, TRUE);
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order-status/cancelled-order', $data);
    }

    public function deleted_order() {
        $data = array();

        $data['delivery_man'] = $this->db
                ->select('*')
                ->where('isactive', 1) // active delivery man
                ->where('user_type_id', 2)// delivery man
                ->get('users')
                ->result();
        $data['states'] = $this->db
                ->select('*')
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['pending'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Pending', 'Accepted', 'Picked Up Complete', 'Partial Delivery Complete', 'Started'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['new'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Unassigned')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['completed'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Completed', 'Partial Delivery Complete'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['accepted'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Accepted')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['cancelled'] = $this->db
                ->select('*')
                ->where_in('orderstatename', array('Cancelled', 'Declined', 'Failed'))
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['declined'] = $this->db
                ->select('*')
                ->where('showing_status', 0)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
            
        $data['booked'] = $this->db
                ->select('*')
                ->where('orderstatename', 'Booked')
                ->where('showing_status', 1)
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();

        $unassaign_total = $this->user_dashboard_model->today_unassign_order();
        if (isset($unassaign_total[0]['order_id'])) {
            $data['unassaign_total'] = count($unassaign_total);
        } else {
            $data['unassaign_total'] = 0;
        }

        $accepted_total = $this->user_dashboard_model->today_accepted_order();
        if (isset($accepted_total[0]['order_id'])) {
            $data['accepted_total'] = count($accepted_total);
        } else {
            $data['accepted_total'] = 0;
        }

        $completed_total = $this->user_dashboard_model->today_completed_order();
        if (isset($completed_total[0]['order_id'])) {
            $data['completed_total'] = count($completed_total);
        } else {
            $data['completed_total'] = 0;
        }

        $paid_total = $this->user_dashboard_model->today_completed_order();
        if (isset($paid_total[0]['order_id'])) {
            $data['paid_total'] = count($paid_total);
        } else {
            $data['paid_total'] = 0;
        }

        $canceled_total = $this->user_dashboard_model->today_cancelled_order();
        if (isset($canceled_total[0]['order_id'])) {
            $data['canceled_total'] = count($canceled_total);
        } else {
            $data['canceled_total'] = 0;
        }

        $deleted_total = $this->user_dashboard_model->today_declined_order();
        if (isset($deleted_total[0]['order_id'])) {
            $data['deleted_total'] = count($deleted_total);
        } else {
            $data['deleted_total'] = 0;
        }
        
        $booked_total = $this->user_dashboard_model->today_booked_order();
        if (isset($booked_total[0]['order_id'])) {
            $data['booked_total'] = count($booked_total);
        } else {
            $data['booked_total'] = 0;
        }
        

//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';

        $data['count_pending'] = count($data['pending']);
        $data['count_new'] = count($data['new']);
        $data['count_completed'] = count($data['completed']);
        $data['count_accepted'] = count($data['accepted']);
        $data['count_cancelled'] = count($data['cancelled']);
        $data['count_declined'] = count($data['declined']);
        $data['count_booked'] = count($data['booked']);

        $data['todays_order_status'] = $this->load->view('dashboard-admin/order-status/todays-order-status', $data, TRUE);
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order-status/deleted-order', $data);
    }
    
    public function create_order() {
        $data = array();
        $data['delivery'] = $this->db
                ->select('*')
                ->get('order_type')
                ->result();
        $data['area'] = $this->db
                ->select('*')
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-client/new-order-create', $data);
    }

    public function order_save() {
        $deliverytypeid = $this->input->post('deliverytypeid');
        $sellersname = trim($this->input->post('sellersname'));
        $sellersmobile = trim($this->input->post('sellersmobile'));
        $sellersaddress = trim($this->input->post('sellersaddress'));
        $pickupareaid = $this->input->post('pickupareaid');
        $pickupDate = $this->input->post('pickupDate');
        $pickupDate = date('Y-m-d', strtotime($pickupDate));
        $pickupTime = $this->input->post('pickupTime');
        $pickupTime = date("H:i:s", strtotime($pickupTime)); //convert 12 hr to 24 hours

        $customername = trim($this->input->post('customername'));
        $customermobile = trim($this->input->post('customermobile'));
         $customermobilealt = trim($this->input->post('customermobilealt'));
         //file_put_contents('contactalt.txt',$customermobilealt);
        $customeraddress = trim($this->input->post('customeraddress'));
        $deliveryareaid = $this->input->post('deliveryareaid');
        $deliveryDate = $this->input->post('deliveryDate');
        $deliveryDate = date('Y-m-d', strtotime($deliveryDate));
        $deliveryTime = $this->input->post('deliveryTime');
        $deliveryTime = date("H:i:s", strtotime($deliveryTime)); //convert 12 hr to 24 hours

        $referenceinvoice = trim($this->input->post('referenceinvoice'));
        $packagedescription = trim($this->input->post('packagedescription'));
        $deliverynote = trim($this->input->post('deliverynote'));

        $itemname_delivery = trim($this->input->post('itemname_delivery'));
        $quantity_delivery = $this->input->post('quantity_delivery');
        $unitprice_delivery = $this->input->post('unitprice_delivery');

        if ($quantity_delivery == '') {
            $unitprice_delivery = '';
        }

        $itemname = $this->input->post('itemname'); //array
        $quantity = $this->input->post('quantity'); //array
        $unitprice = $this->input->post('unitprice'); //array

        $final_array = array_map(NULL, $itemname, $quantity, $unitprice);

        //order Track Number---------------------------------------------------------------------------
        $areaInfo = $this->db
                ->select('*')
                ->where('areaid', $deliveryareaid)
                ->get('areas')
                ->row();

        $OrderID = $this->db->select("*")->limit(1)->order_by('order_id', "DESC")->get("orders")->row();
        $lastOrderID = $OrderID->order_id;
        $track_number = strtoupper(substr($areaInfo->area_name, 0, 2)) . sprintf("%06d", $lastOrderID);

        $user_id = $this->session->userdata('user_id');

        $newOrder_Default = $this->db
                ->select('orderstateid')
                ->where('neworder_default', 1)
                ->get('order_state')
                ->row();
        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $input = array(
            'track_number' => $track_number,
            'delivery_charge' => '0',
            'order_type_id' => $deliverytypeid,
            'seller_name' => $sellersname,
            'seller_mobile' => $sellersmobile,
            'seller_address' => $sellersaddress,
            'pickup_area_id' => $pickupareaid,
            'pickup_time' => $pickupDate . ' ' . $pickupTime,
            'customer_name' => $customername,
            'customer_mobile' => $customermobile,
            'customer_mobile_alt' => $customermobilealt,
            'customer_address' => $customeraddress,
            'delivery_area_id' => $deliveryareaid,
            'delivery_time' => $deliveryDate . ' ' . $deliveryTime,
            'reference_invoice' => $referenceinvoice,
            'package_description' => $packagedescription,
            'deliveryman_note' => $deliverynote,
            'is_client_order' => 1,
            'order_state_id' => $newOrder_Default->orderstateid,
            'user_id' => $user_id,
            'created_at' => $cenvertedCurrentTime,
            'updated_at' => $cenvertedCurrentTime,
        );

        $response = $this->db->insert('orders', $input);
        echo '<br>';
        $last_insert_id = $this->db->insert_id();

//        echo '<pre>';
//            print_r($newOrder_Default);
//        print_r($input);
//        print_r($final_array);
//        print_r($_POST);
//        echo '</pre>';
//exit();       
        //insert item delivery charge---------------------------------------------------------
        $orderItemCharge = array(
            'order_id' => $last_insert_id,
            'item_name' => $itemname_delivery,
            'quantity' => $quantity_delivery,
            'unit_price' => $unitprice_delivery,
            'total' => '',
            'created_at' => $cenvertedCurrentTime,
        );
        $response2 = $this->db->insert('order_details', $orderItemCharge);

        //insert item charge---------------------------------------------------------
        if (isset($last_insert_id)) {
            foreach ($final_array as $item) {
                if ($item[0] != '' && $item[1] && $item[2]) {
                    $orderItem = array(
                        'order_id' => $last_insert_id,
                        'item_name' => $item[0],
                        'quantity' => $item[1],
                        'unit_price' => $item[2],
                        'total' => '',
                        'created_at' => $cenvertedCurrentTime,
                    );
                    $response3 = $this->db->insert('order_details', $orderItem);
//                    echo '<pre>';
//                    print_r($orderItem);
//                    echo '</pre>';
                }
            }
        }

        $sess['success'] = 'Created Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/order');
    }

    public function msort($array, $key, $sort_flags = SORT_REGULAR) {
        if (is_array($array) && count($array) > 0) {
            if (!empty($key)) {
                $mapping = array();
                foreach ($array as $k => $v) {
                    $sort_key = '';
                    if (!is_array($key)) {
                        $sort_key = $v[$key];
                    } else {
                        // @TODO This should be fixed, now it will be sorted as string
                        foreach ($key as $key_key) {
                            $sort_key .= $v->$key_key;
                        }
                        $sort_flags = SORT_STRING;
                    }
                    $mapping[$k] = $sort_key;
                }
                arsort($mapping, $sort_flags);
                $sorted = array();
                foreach ($mapping as $k => $v) {
                    $sorted[] = $array[$k];
                }
                return $sorted;
            }
        }
        return $array;
    }

    public function ajax_data() {
        $request_data = $_GET['columns'];
//             echo '<pre>';
//             print_r($request_data);
//             echo '</pre>';
//             exit();
        $stage = $request_data[1]['search']['value']; //columns start from 0, so column 3 STAGE column for accounts
        $priority = $request_data[2]['search']['value']; //columns start from 0, so column 4  PRIORITY column for accounts
        if (isset($request_data[8]['search']['value']) && strlen($request_data[8]['search']['value']) > 0) {
            $adcmd = $request_data[8]['search']['value']; //columns start from 0, so column 8  ADC MD column for accounts		  
        }

        include_once(APPPATH . 'libraries/ssp.class.php');
//        $ssp = new SSP();
        $user_id = $this->session->userdata('user_id');
        $where = "user_id ='$user_id'";
//$result =$ssp->simple($_GET,$sql_details=null, $table, $primaryKey=null, $columns=null);
        $result = SSP::simple($_GET, $where);
//echo '<pre>';
//print_r($result);
//echo '</pre>';
//exit();
        echo json_encode($result);
    }

}
