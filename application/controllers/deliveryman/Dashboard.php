<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_type_id') != 2) {
            redirect(base_url());
        }
        $this->load->model('user_dashboard_model');
        $this->load->model('deliveryman_model');
    }

    public function index() {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['today_taskList'] = $this->deliveryman_model->todays_tasklist($user_id);

        $data['area_list'] = $this->db
                ->select('*')
//                ->where('status', 1)
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();
        $data['order_state'] = $this->db
                ->select('*')
//                    ->where('status',1)
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

//            echo '<pre>';
//            print_r($data['today_taskList']);
//            echo '</pre>';
//            exit();

        $data['header'] = $this->load->view('dashboard-deliveryman/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-deliveryman/common/footer', $data, TRUE);
        $this->load->view('dashboard-deliveryman/deliveryman-home-page', $data);
    }

    public function update_task_status() {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
        
        $data=array();     
        
        $data['track_number']=$track_number=$this->input->post('track_number');
        $data['order_id']=$order_id=$this->input->post('order_id');
        $data['task_type_id']=$task_type_id=$this->input->post('task_type_id');
        $data['user_id']=$user_id=$this->input->post('user_id');
        
        $data['header'] = $this->load->view('dashboard-deliveryman/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-deliveryman/common/footer', $data, TRUE);
        $this->load->view('dashboard-deliveryman/update-task-status', $data);
    }
    
    public function task_status_save() {



        $data = array();
        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $track_number = $this->input->post('track_number');

        $data['order_id'] = $order_id = $this->input->post('order_id');
        $data['task_state_id'] = $orderstateid = $this->input->post('orderstateid');
        $data['task_type_id'] = $task_type_id = $this->input->post('task_type_id');
        $data['user_id'] = $user_id = $this->input->post('user_id');
        $data['remarks'] = $remarks = $this->input->post('remarks');
        $data['created_at'] = $cenvertedCurrentTime;
        $data['updated_at'] = $cenvertedCurrentTime;
        
        $response=$this->db->insert('order_tasks',$data);
        if($response==1){
            
            $this->db
                    ->where('order_id',$order_id)
                    ->set('order_state_id',$orderstateid)
                    ->set('deliveryman_note',$remarks)
                    ->update('orders');
        }
        
        $sess['success'] = 'Success!';
        $this->session->set_userdata($sess);
        redirect('deliveryman/dashboard');

//        echo '<pre>';
//        print_r($data);
////        print_r($_POST);
//        echo '</pre>';
    }

}
