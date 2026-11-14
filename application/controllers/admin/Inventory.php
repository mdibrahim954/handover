<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
    }
    
    public function index() {
        redirect('admin/inventory/category_all');
    }
    
    
    public function category_all() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'inventory';
        $user_id = $this->session->userdata('user_id');

        $data['category'] = $this->db
                ->select('*')
                ->get('product_category')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/inventory/category/all-category', $data);
    }

    public function new_category() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'inventory';
        $user_id = $this->session->userdata('user_id');

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/inventory/category/create-category', $data);
    }

    public function category_save() {
        $data = array();
        $data['name'] = $name = $this->input->post('name');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $duplicateCheck=$this->db
                ->select('*')
                ->where('name',$name)
                ->get('product_category')
                ->row();
        
        if(empty($duplicateCheck)){
        
        $response = $this->db->insert('product_category', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/inventory/category_all');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/inventory/new_category');
        }
        }else{
            $sess['exception'] = 'Already exist this category name';
            $this->session->set_userdata($sess);
            redirect('admin/inventory/new_category');
        }
    }

    public function edit_category($id) {
        $data = array();
        $data['menu'] = 'inventory';
        $data['result'] = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('product_category')
                ->row();
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/inventory/category/edit-category', $data);
    }

    public function update_category() {
        $data = array();
        $id = $this->input->post('id');

        $data['name'] = $name = $this->input->post('name');
        $data['updated_at'] = date('Y-m-d H:i:s');


        $response = $this->db
                ->where('id', $id)
                ->update('product_category', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/inventory/category_all');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/inventory/category/category_all');
        }
    }

    public function delete_category($id) {
        $response = $this->db
                ->where('id', $id)
                ->set('status', 0)
                ->update('product_category');

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/inventory/category_all');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/inventory/category/category_all');
        }
    }

}
