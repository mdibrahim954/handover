<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {
        public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
        $this->load->model('user_model');
    }

    public function index() {
        $data = array();
        $data['menu'] = '';
        $user_id = $this->session->userdata('user_id');
        $data['area'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->order_by('area_name', 'ASC')
                ->get('areas')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/area/area-view', $data);
    }

    public function area_create() {
        $data = array();
        $data['menu'] = '';

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/area/create-area', $data);
    }
//
    public function area_save() {
        $data['area_name'] = $this->input->post('area_name');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
//        $data['status'] = 1;

        $this->db->insert('areas', $data);

        $sess['success'] = 'Created Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/area');
    }

    public function edit_area($id) {
        $data = array();
        $data['menu'] = '';
        $data['result'] = $this->db
                ->select('*')
                ->where('areaid', $id)
                ->get('areas')
                ->row();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/area/area-edit', $data);
    }
//
    public function area_update() {

        $areaid = $this->input->post('areaid');
        $area_name = $this->input->post('area_name');

        $this->db
                ->where('areaid', $areaid)
                ->set('area_name', $area_name)
                ->update('areas');

        $sess['success'] = 'Updated Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/area');
    }
//
    public function delete_area($id) {

        $this->db
                ->where('areaid', $id)
                ->set('status', 0)
                ->update('areas');

        $sess['success'] = 'Deleted Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/area');
    }

    
}
