<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

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

        $data['testimonial'] = $this->db
                ->select('*')
                ->get('testimonial')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/testimonial/all-testimonial', $data);
    }

    public function new_testimonial() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'web';
        $user_id = $this->session->userdata('user_id');


        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/testimonial/create-testimonial', $data);
    }

    public function testimonial_save() {
        $data = array();

        $data['name'] = $name = $this->input->post('name');
        $data['description'] = $description = $this->input->post('description');

        $imagename = '';
        //User image------------------------------------------------------
        if (!empty($_FILES)) {
            if ($_FILES['image']['name'] != '') {
                $config['upload_path'] = './resources/testimonial/';
                $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

                $config['max_size'] = 20048;
                $config['max_width'] = 8048;
                $config['max_height'] = 8048;
                $config['overwrite'] = false;

                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $image_des = $this->upload->data();
                $file_name = $image_des['file_name'];
                $imagename = $file_name;
            }
        }
        $data['image'] = $imagename;

        $response = $this->db->insert('testimonial', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/testimonial');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/testimonial/new_testimonial');
        }
    }

    public function edit_testimonial($id) {
        $data = array();
        $data['result'] = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('testimonial')
                ->row();
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/testimonial/edit-testimonial', $data);
    }

    public function update_testimonial() {
        $data = array();
        $id = $this->input->post('id');

        $data['name'] = $name = $this->input->post('name');
        $data['description'] = $description = $this->input->post('description');

        //User image------------------------------------------------------
        if (!empty($_FILES)) {
            if ($_FILES['image']['name'] != '') {
                $config['upload_path'] = './resources/testimonial/';
                $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

                $config['max_size'] = 20048;
                $config['max_width'] = 8048;
                $config['max_height'] = 8048;
                $config['overwrite'] = false;

                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $image_des = $this->upload->data();
                $file_name = $image_des['file_name'];
                $imagename = $file_name;
                $data['image'] = $imagename;
            }
        }


        $response = $this->db
                ->where('id', $id)
                ->update('testimonial', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/testimonial');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/testimonial');
        }
    }

    public function delete_testimonial($id) {
        $response = $this->db
                ->where('id', $id)
                ->delete('testimonial');

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/testimonial');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/testimonial');
        }
    }

}
