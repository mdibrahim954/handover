<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $user_id = $this->session->userdata('user_id');

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/new-user-view', $data);
    }

    public function admin_profile_edit() {
        $this->load->library('form_validation');
        $data = array();
        $userid = $this->session->userdata('user_id');



        $data['userinfo'] = $this->db
                ->select('*')
                ->where('userid', $userid)
//                ->where('user_type_id', 3) // only rider
                ->where('isactive', '1')
                ->get('users')
                ->row();
//        echo '<pre>';
//        print_r($data['userinfo']);
//        echo '</pre>';
//        exit();

        $data['area'] = $this->db
                ->select('*')
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();
        $data['user_area'] = $this->db
                ->select('*')
                ->where('areaid', $data['userinfo']->area_id)
                ->get('areas')
                ->row();


        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/admin-profile-edit', $data);
    }

    public function update_admin_profile() {
        $data = array();
        $userid = $this->input->post('userid');
        $data['first_name'] = $first_name = $this->input->post('first_name');
        $data['last_name'] = $last_name = $this->input->post('last_name');
        $data['email'] = $email = $this->input->post('email');
        $data['mobile'] = $mobile = $this->input->post('mobile');
        $data['address'] = $address = $this->input->post('address');
        $data['area_id'] = $address = $this->input->post('areaid');
        $data['steadfast_api_key'] = $address = $this->input->post('steadfast_api_key');
        $data['steadfast_api_secret'] = $address = $this->input->post('steadfast_api_secret');


        $response = $this->db
                ->where('userid', $userid)
                ->update('users', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/user/admin_profile_edit');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/admin_profile_edit');
        }
    }

    public function approval() {

        $data = array();
        $user_id = $this->session->userdata('user_id');

        $data['userlist'] = $this->db
                ->select('*')
                ->where('isactive', 0)
                ->order_by('userid', 'desc')
                ->get('users')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/user-approval-list', $data);
    }

    public function approved_user($userid) {
        $response = $this->db
                ->where('userid', $userid)
                ->set('isactive', 1)
                ->update('users');

        if ($response == 1) {
            $sess['success'] = 'Successfully Approved!';
            $this->session->set_userdata($sess);
            redirect('admin/user/approval');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/approval');
        }
    }

    public function delete_user($userid) {
        $response = $this->db
                ->where('userid', $userid)
                ->set('isactive', 0)
                ->update('users');

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/user/user_list');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/user_list');
        }
    }

    public function delete_client($userid) {
        $response = $this->db
                ->where('userid', $userid)
                ->set('isactive', 0)
                ->update('users');

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/user/client_list');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/client_list');
        }
    }

    public function client_edit($userid) {
        $this->load->library('form_validation');
        $data = array();

        $data['userinfo'] = $this->db
                ->select('*')
                ->where('userid', $userid)
                ->where('isactive', '1')
                ->get('users')
                ->row();
//        echo '<pre>';
//        print_r($data['userinfo']);
//        echo '</pre>';
//        exit();

        if (empty($data['userinfo'])) {
            redirect('admin/user/client_list');
            die();
        }

        $data['area'] = $this->db
                ->select('*')
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();

        $data['user_area'] = $this->db
                ->select('*')
                ->where('areaid', $data['userinfo']->area_id)
                ->get('areas')
                ->row();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/client-edit', $data);
    }

    public function update_client() {
        $data = array();
        $userid = $this->input->post('userid');
        $data['first_name'] = $first_name = $this->input->post('first_name');
        $data['last_name'] = $last_name = $this->input->post('last_name');
        $data['email'] = $email = $this->input->post('email');
        $data['mobile'] = $mobile = $this->input->post('mobile');
        $data['address'] = $address = $this->input->post('address');
        $data['area_id'] = $address = $this->input->post('areaid');


        $response = $this->db
                ->where('userid', $userid)
                ->update('users', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/user/client_list');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/client_list');
        }
    }

    public function user_edit($userid) {
        $this->load->library('form_validation');
        $data = array();

        $data['userinfo'] = $this->db
                ->select('*')
                ->where('userid', $userid)
                ->where('isactive', '1')
                ->get('users')
                ->row();
//        echo '<pre>';
//        print_r($data['userinfo']);
//        echo '</pre>';
//        exit();


        if (empty($data['userinfo'])) {
            redirect('admin/user/rider_list');
            die();
        }

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/user-edit', $data);
    }

    public function update_user() {
        $data = array();
        $userid = $this->input->post('userid');
        $dob = $this->input->post('dob');
        $data['dob'] = date("Y-m-d", strtotime($dob));
        $data['first_name'] = $first_name = $this->input->post('first_name');
        $data['last_name'] = $last_name = $this->input->post('last_name');
        $data['father_name'] = $father_name = $this->input->post('father_name');
        $data['mother_name'] = $mother_name = $this->input->post('mother_name');
        $data['gender'] = $gender = $this->input->post('gender');
        $data['marital_status'] = $marital_status = $this->input->post('marital_status');
        $data['email'] = $email = $this->input->post('email');
        $data['mobile'] = $mobile = $this->input->post('mobile');
        $data['region'] = $region = $this->input->post('region');
        $data['nationality'] = $nationality = $this->input->post('nationality');
        $data['nid_number'] = $nid_number = $this->input->post('nid_number');
        $data['blood_group'] = $blood_group = $this->input->post('blood_group');
        $data['address'] = $address = $this->input->post('address');
        $data['permanent_address'] = $permanent_address = $this->input->post('permanent_address');


//        echo '<pre>';
//        print_r($data);
//        print_r($_POST);
//        echo '</pre>';
//        exit();

        $response = $this->db
                ->where('userid', $userid)
                ->update('users', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/user/user_edit/' . $userid);
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/user_edit/' . $userid);
        }
    }

    public function user_list() {
        $data = array();
        $user_id = $this->session->userdata('user_id');

        $data['userlist'] = $this->db
                ->select('*')
                ->where('user_type_id', '1')
                ->or_where('user_type_id', '2')
                ->where('isactive', '1')
                ->order_by('userid', 'desc')
                ->get('users')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/user-list', $data);
    }

    public function delete_rider($userid) {
        $response = $this->db
                ->where('userid', $userid)
                ->set('isactive', 0)
                ->update('users');

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/user/rider_list');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/rider_list');
        }
    }

    public function rider_edit($userid) {
        $this->load->library('form_validation');
        $data = array();

        $data['userinfo'] = $this->db
                ->select('*')
                ->where('userid', $userid)
                ->where('user_type_id', '2') // only rider
                ->where('isactive', '1')
                ->get('users')
                ->row();
//        echo '<pre>';
//        print_r($data['userinfo']);
//        echo '</pre>';
//        exit();


        if (empty($data['userinfo'])) {
            redirect('admin/user/rider_list');
            die();
        }

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/rider-edit', $data);
    }

    public function update_rider() {
        $data = array();
        $userid = $this->input->post('userid');
        $dob = $this->input->post('dob');
        $data['dob'] = date("Y-m-d", strtotime($dob));
        $data['first_name'] = $first_name = $this->input->post('first_name');
        $data['last_name'] = $last_name = $this->input->post('last_name');
        $data['father_name'] = $father_name = $this->input->post('father_name');
        $data['mother_name'] = $mother_name = $this->input->post('mother_name');
        $data['gender'] = $gender = $this->input->post('gender');
        $data['marital_status'] = $marital_status = $this->input->post('marital_status');
        $data['email'] = $email = $this->input->post('email');
        $data['mobile'] = $mobile = $this->input->post('mobile');
        $data['region'] = $region = $this->input->post('region');
        $data['nationality'] = $nationality = $this->input->post('nationality');
        $data['nid_number'] = $nid_number = $this->input->post('nid_number');
        $data['blood_group'] = $blood_group = $this->input->post('blood_group');
        $data['address'] = $address = $this->input->post('address');
        $data['permanent_address'] = $permanent_address = $this->input->post('permanent_address');

//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();

        $response = $this->db
                ->where('userid', $userid)
                ->update('users', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/user/rider_edit/' . $userid);
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/rider_edit/' . $userid);
        }
    }

    public function rider_list() {
        $data = array();
        $user_id = $this->session->userdata('user_id');

        $data['userlist'] = $this->db
                ->select('*')
                ->or_where('user_type_id', '2') // only rider
                ->where('isactive', '1')
                ->order_by('userid', 'desc')
                ->get('users')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/rider-list', $data);
    }

    public function client_list() {
        $data = array();
        $user_id = $this->session->userdata('user_id');

        $data['clientlist'] = $this->db
                ->select('*')
                ->where('user_type_id', '3')
                ->or_where('user_type_id', '5')
                ->where('isactive', '1')
                ->order_by('userid', 'desc')
                ->get('users')
                ->result();

//        echo '<pre>';
//        print_r($data['clientlist']);
//        echo '</pre>';

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/client-list', $data);
    }

    public function client_details($userid) {
        $data = array();
        $this->load->library('form_validation');

        $data['userinfo'] = $this->db
                ->select('*')
                ->where('userid', $userid)
                ->get('users')
                ->row();

//        echo '<pre>';
//        print_r($data['clientlist']);
//        echo '</pre>';

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/client-details-view', $data);
    }

    public function user_type_create() {
        $data = array();
        $data['menu'] = '';

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/create-user-type', $data);
    }

    public function user_type_save() {
        $data['user_type_name'] = $this->input->post('user_type_name');
        $data['status'] = 1;

        $this->db->insert('user_type', $data);

        $sess['success'] = 'Created Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/user/user_type');
    }

    public function user_type() {
        $data = array();
        $data['menu'] = '';
        $user_id = $this->session->userdata('user_id');
        $data['user_type'] = $this->db
                ->select('*')
//                ->where('status', 1)
                ->order_by('user_type_name', 'ASC')
                ->get('user_type')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/user-type', $data);
    }

    public function edit_user_type($id) {
        $data = array();
        $data['menu'] = '';
        $data['user_type'] = $this->db
                ->select('*')
                ->where('user_type_id', $id)
                ->get('user_type')
                ->row();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/user-type-edit', $data);
    }

    public function user_type_update() {

        $user_type_id = $this->input->post('user_type_id');
        $user_type_name = $this->input->post('user_type_name');

        $this->db
                ->where('user_type_id', $user_type_id)
                ->set('user_type_name', $user_type_name)
                ->update('user_type');

        $sess['success'] = 'Updated Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/user/user_type');
    }

    public function delete_user_type($id) {

        $this->db
                ->where('user_type_id', $id)
                ->set('status', 0)
                ->update('user_type');

        $sess['success'] = 'Deleted Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/user/user_type');
    }

    public function new_user() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = '';
        $user_id = $this->session->userdata('user_id');
//        $data['area_list']=$this->db
//                ->select('*')
//                ->order_by('area_name','ASC')
//                ->get('areas')
//                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/new-user-view', $data);
    }

    public function user_save() {

//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();

        $data = array();
        array_walk_recursive($_POST, function(&$value, $key) {
            $value = htmlentities(trim($value), ENT_QUOTES);
        });

        $form_validation = array(
            'success' => false,
            'message' => 'Registration failed.',
            'reason' => 'unknown',
            'field' => null
        );

        $this->load->library('form_validation');

        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique' => 'This email already exists.'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirmed Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('areaid', 'Area', 'trim|required');

        if (false == $this->form_validation->run()) {
            $form_validation['message'] = 'Registration failed due to bellow reason.';
            $form_validation['reason'] = 'form_validation';
            $form_validation['field'] = $this->form_validation->error_array();
            $form_validation = json_encode($form_validation);

            $this->load->view('dashboard-admin/user/new-user-view2', $form_validation);


//        $data['menu']='';
//        $user_id = $this->session->userdata('user_id');
//
//
//        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
//        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
//        $this->load->view('dashboard-admin/user/new-user-view', $data);
        } else {
            $password = $this->form_validation->set_value('password');
            //http://php.net/manual/en/function.password-hash.php
            $options = [
                'cost' => 12,
            ];
            $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);


                       
            $startTime = date("Y-m-d H:i:s");
            $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));
            
            
            $user_info = array(
                'first_name' => $this->form_validation->set_value('firstname'),
                'last_name' => $this->form_validation->set_value('lastname'),
                'father_name' => '',
                'mother_name' => '',
                'dob' => '',
                'gender' => '',
                'marital_status' => '',
                'email' => $this->form_validation->set_value('email'),
                'mobile' => $this->form_validation->set_value('mobile'),
                'password' => $password_hash,
                'imagename' => '',
                'your_cv' => '',
                'user_type_id' => $this->input->post('usertypeid'), //rider
                'area_id' => $this->form_validation->set_value('areaid'),
                'company_id' => '',
                'region' => '',
                'nationality' => '',
                'nid_number' => '',
                'blood_group' => '',
                'address' => $this->form_validation->set_value('address'),
                'permanent_address' => '',
//                'signing' => $this->form_validation->set_value('signing'),
                'created_at' => $cenvertedCurrentTime,
                'isactive' => 1,
            );

//        echo '<pre>';
//        print_r($user_info);
//        echo '</pre>';
//        exit();

            $this->load->model('user_model');
//            echo $response=$this->user_model->register($user_info);
            $response = $this->db->insert('users', $user_info);

            if ($response == 1) {
                $data['success'] = true;
//                $sess['success'] = 'Success! Please check your email to verify your account.';
                $sess['success'] = 'User Creted Successfully!';
                $this->session->set_userdata($sess);



                redirect('admin/user/new_user');
            }
        }
    }

    public function change_passowrd() {

        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = '';
        $user_id = $this->session->userdata('user_id');
//        $data['area_list']=$this->db
//                ->select('*')
//                ->order_by('area_name','ASC')
//                ->get('areas')
//                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/change-password', $data);
    }

    public function password_update() {
        $user_id = $this->session->userdata('user_id');
        $old_password = trim($this->input->post('currentPassword'));
        $data['password'] = $password = trim($this->input->post('newPassword'));
        $data['confirm_password'] = $confirm_password = trim($this->input->post('retypePassword'));

        $user_info = $this->db
                ->select('*')
                ->where('userid', $user_id)
                ->get('users')
                ->row();

        $hash = $user_info->password;
//http://php.net/manual/en/function.password-hash.php--------------------------------------------------
//http://php.net/manual/fr/function.password-verify.php-------------------------------------------------

        if (password_verify($old_password, $hash)) {
            $this->load->library('form_validation');

            if ($old_password !== '') {
                $this->form_validation->set_rules('newPassword', 'New Password', 'required|min_length[6]');
                $this->form_validation->set_rules('retypePassword', 'Retype Password', 'required|min_length[6]|matches[newPassword]');
            }

            if (false == $this->form_validation->run()) {
                $form_validation['message'] = 'Registration failed due to bellow reason.';
                $form_validation['reason'] = 'form_validation';
                $form_validation['field'] = $this->form_validation->error_array();
                $form_validation = json_encode($form_validation);

                $data['user_info'] = $user_info;
                $this->load->view('dashboard-admin/user/change-password-two', $form_validation);
            } else {
                $password = $this->form_validation->set_value('newPassword');
                //http://php.net/manual/en/function.password-hash.php

                $options = [
                    'cost' => 12,
                ];
                $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);

                $user_info = array(
                    'password' => $password_hash,
                );

                $this->load->model('user_model');
                if ($this->user_model->update_user_info($user_info, $user_id)) {

//                    setcookie('username', $user_info['username'], time() + (86400 * 7), "/"); // 86400 = 1 day
//                     $sess['username']=$this->session->userdata('username');
                    $sess['success'] = 'Password Changed Successfully!.';
                    $this->session->set_userdata($sess);
                    redirect('admin/user/change_passowrd');
                }
            }
        } else {

            $sess['exception'] = 'Your old password did not match!.';
            $this->session->set_userdata($sess);
            redirect('admin/user/change_passowrd');
        }
    }

    public function update_client_passowrd() {

        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = '';
        $user_id = $this->session->userdata('user_id');
        $data['all_user'] = $this->db
                ->select('*')
                ->get('users')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/client-password/client-password', $data);
    }

    public function client_password_save() {
        $user_id = $this->input->post('userid');
        $data['password'] = $password = trim($this->input->post('newPassword'));
        $data['confirm_password'] = $confirm_password = trim($this->input->post('retypePassword'));

        $user_info = $this->db
                ->select('*')
                ->where('userid', $user_id)
                ->get('users')
                ->row();


        $this->load->library('form_validation');

        $this->form_validation->set_rules('newPassword', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('retypePassword', 'Retype Password', 'required|min_length[6]|matches[newPassword]');

        if (false == $this->form_validation->run()) {
            $form_validation['message'] = 'Registration failed due to bellow reason.';
            $form_validation['reason'] = 'form_validation';
            $form_validation['field'] = $this->form_validation->error_array();
            $form_validation = json_encode($form_validation);

            $data['user_info'] = $user_info;
            $this->load->view('dashboard-admin/user/client-password/client-password-two', $form_validation);
        } else {
            $password = $this->form_validation->set_value('newPassword');
            //http://php.net/manual/en/function.password-hash.php

            $options = [
                'cost' => 12,
            ];
            $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);

            $passwordArray = array(
                'password' => $password_hash,
                'updated_at' => date('Y-m-d H:i:s'),
            );


            $this->load->model('user_model');
            if ($this->user_model->update_user_info($passwordArray, $user_id)) {
//                    setcookie('username', $user_info['username'], time() + (86400 * 7), "/"); // 86400 = 1 day
//                     $sess['username']=$this->session->userdata('username');
                $sess['success'] = 'Password Changed Successfully!.';
                $this->session->set_userdata($sess);
                redirect('admin/user/update_client_passowrd');
            }
        }
    }
    
    public function deactivated_user(){
        
        $data = array();
        $user_id = $this->session->userdata('user_id');

        $data['clientlist'] = $this->db
                ->select('*')
//                ->where('user_type_id', '3')
//                ->or_where('user_type_id', '5')
                ->where('isactive', '0')
                ->order_by('userid', 'desc')
                ->get('users')
                ->result();

//        echo '<pre>';
//        print_r($data['clientlist']);
//        echo '</pre>';
//        exit();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/user/deactivate-user-list', $data);
        
    }
    
     public function activate_again($userid) {
        $response = $this->db
                ->where('userid', $userid)
                ->set('isactive', 1)
                ->update('users');

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/user/deactivated_user');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/user/deactivated_user');
        }
    }
    

}
