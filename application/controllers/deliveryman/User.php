<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && !$this->session->userdata('user_type_id') == 2) { //delivery man
            redirect(base_url());
        }
//        $this->load->model('user_model');
    }



    public function profile() {

        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = '';
        $userid = $this->session->userdata('user_id');


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

        $data['header'] = $this->load->view('dashboard-deliveryman/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-deliveryman/common/footer', $data, TRUE);
        $this->load->view('dashboard-deliveryman/user/rider-profile-view', $data);
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
            redirect('deliveryman/user/profile');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('deliveryman/user/profile');
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

        $data['header'] = $this->load->view('dashboard-deliveryman/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-deliveryman/common/footer', $data, TRUE);
        $this->load->view('dashboard-deliveryman/user/change-password', $data);
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
                $this->load->view('dashboard-deliveryman/user/change-password-two', $form_validation);
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
                    redirect('deliveryman/user/change_passowrd');
                }
            }
        } else {

            $sess['exception'] = 'Your old password did not match!.';
            $this->session->set_userdata($sess);
            redirect('deliveryman/user/change_passowrd');
        }
    }

}
