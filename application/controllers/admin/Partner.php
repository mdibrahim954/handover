<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
//        $this->load->model('user_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'web';
        $user_id = $this->session->userdata('user_id');

        $data['partner'] = $this->db
                ->select('*')
                ->get('partners')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/partner/all-partner', $data);
    }

    public function new_partner() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'web';
        $user_id = $this->session->userdata('user_id');


        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/partner/create-partner', $data);
    }

    public function partner_save() {
        $data = array();

        $data['name'] = $name = $this->input->post('name');

        $imagename = '';
        //User image------------------------------------------------------
        if (!empty($_FILES)) {
            if ($_FILES['partner_image']['name'] != '') {
                $config['upload_path'] = './resources/partner/';
                $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

                $config['max_size'] = 20048;
                $config['max_width'] = 8048;
                $config['max_height'] = 8048;
                $config['overwrite'] = false;

                $this->upload->initialize($config);
                $this->upload->do_upload('partner_image');
                $image_des = $this->upload->data();
                $file_name = $image_des['file_name'];
                $imagename = $file_name;
            }
        }
        $data['partner_image'] = $imagename;

        $response = $this->db->insert('partners', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/partner');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/partner/new_partner');
        }
    }

    public function edit_partner($id) {
        $data = array();
        $data['result'] = $this->db
                ->select('*')
                ->where('partner_id', $id)
                ->get('partners')
                ->row();
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/partner/edit-partner', $data);
    }

    public function update_partner() {
        $data = array();
        $id = $this->input->post('id');

        $data['name'] = $name = $this->input->post('name');

        //User image------------------------------------------------------
        if (!empty($_FILES)) {
            if ($_FILES['partner_image']['name'] != '') {
                $config['upload_path'] = './resources/partner/';
                $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

                $config['max_size'] = 20048;
                $config['max_width'] = 8048;
                $config['max_height'] = 8048;
                $config['overwrite'] = false;

                $this->upload->initialize($config);
                $this->upload->do_upload('partner_image');
                $image_des = $this->upload->data();
                $file_name = $image_des['file_name'];
                $imagename = $file_name;
                $data['partner_image'] = $imagename;
            }
        }

//        echo '<pre>';
//        print_r($data);
//        print_r($_FILES);
//        echo '</pre>';
//        exit();


        $response = $this->db
                ->where('partner_id', $id)
                ->update('partners', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/partner');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/partner');
        }
    }

    public function delete_partner($id) {
        $response = $this->db
                ->where('partner_id', $id)
                ->delete('partners');

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/partner');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/partner');
        }
    }

}
