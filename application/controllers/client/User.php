<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && !$this->session->userdata('user_type_id') == 1) {
            redirect(base_url());
        }
//        $this->load->model('user_model');
    }

    public function bank_info() {
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
        $data['bankinfo'] = $this->db
                ->select('*')
                ->where('userid', $data['userinfo']->userid)
                ->get('bank_info')
                ->row();
//        echo '<pre>';
//        print_r($data['bankinfo']);
//        echo '</pre>';
//        exit();


        $data['header'] = $this->load->view('dashboard-client/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-client/common/footer', $data, TRUE);
        $this->load->view('dashboard-client/bank/bank-info-edit', $data);
    }

    public function update_bankInfo() {



        //insert bank account information-------------------------------------------------------------
        $userid = $this->session->userdata('user_id');
        echo $bank_AccountType = $this->input->post('my_account_type');


        $data['bankinfo'] = $this->db
                ->select('*')
                ->where('userid', $userid)
                ->get('bank_info')
                ->row();

//        echo '<pre>';
//        print_r($_POST);
//        print_r($data['bankinfo']);
//        echo '</pre>';
//        exit();

        $bankInfo = array();
        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        if (empty($data['bankinfo'])) {
            if ($bank_AccountType == 'bank') {
                $bankInfo['userid'] = $userid;
                $bankInfo['bank_name'] = $this->input->post('bank_name');
                $bankInfo['bank_account_name'] = $this->input->post('bank_account_name');
                $bankInfo['bank_account_number'] = $this->input->post('bank_account_number');
                $bankInfo['bank_routing_no'] = $this->input->post('bank_routing_no');
                $bankInfo['bank_branch_name'] = $this->input->post('bank_branch_name');
                $bankInfo['created_at'] = $cenvertedCurrentTime;
            }
            if ($bank_AccountType == 'mobile_bank') {
                $bankInfo['userid'] = $userid;
                $bankInfo['wallet_type'] = $this->input->post('wallet_type');
                $bankInfo['wallet_number'] = $this->input->post('wallet_number');
                $bankInfo['payment_info'] = $this->input->post('payment_info');
                $bankInfo['created_at'] = $cenvertedCurrentTime;
            }
            $bankResponse = $this->db->insert('bank_info', $bankInfo);
        } elseif (!empty($data['bankinfo'])) {

            if ($bank_AccountType == 'bank') {
                $bankInfo['bank_name'] = $this->input->post('bank_name');
                $bankInfo['bank_account_name'] = $this->input->post('bank_account_name');
                $bankInfo['bank_account_number'] = $this->input->post('bank_account_number');
                $bankInfo['bank_routing_no'] = $this->input->post('bank_routing_no');
                $bankInfo['bank_branch_name'] = $this->input->post('bank_branch_name');
                $bankInfo['wallet_type'] = '';
                $bankInfo['wallet_number'] = '';
                $bankInfo['payment_info'] = '';
                $bankInfo['updated_at'] = $cenvertedCurrentTime;
            }
            if ($bank_AccountType == 'mobile_bank') {
                $bankInfo['bank_name'] = '';
                $bankInfo['bank_account_name'] = '';
                $bankInfo['bank_account_number'] = '';
                $bankInfo['bank_routing_no'] = '';
                $bankInfo['bank_branch_name'] = '';
                $bankInfo['wallet_type'] = $this->input->post('wallet_type');
                $bankInfo['wallet_number'] = $this->input->post('wallet_number');
                $bankInfo['payment_info'] = $this->input->post('payment_info');
                $bankInfo['updated_at'] = $cenvertedCurrentTime;
            }

            $bankResponse = $this->db
                    ->where('userid', $userid)
                    ->update('bank_info', $bankInfo);
        }
        if (!empty($data['bankinfo'] && $bank_AccountType == 'cash')) {
            $bankInfo['bank_name'] = '';
            $bankInfo['bank_account_name'] = '';
            $bankInfo['bank_account_number'] = '';
            $bankInfo['bank_routing_no'] = '';
            $bankInfo['bank_branch_name'] = '';
            $bankInfo['wallet_type'] = '';
            $bankInfo['wallet_number'] = '';
            $bankInfo['payment_info'] = '';
            $bankInfo['updated_at'] = $cenvertedCurrentTime;

            $bankResponse = $this->db
                    ->where('userid', $userid)
                    ->update('bank_info', $bankInfo);
        }

        $this->db
                ->where('userid', $userid)
                ->set('my_account_type', $bank_AccountType)
                ->update('users');

        if ($bankResponse == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('client/user/bank_info');
        } else {
            $sess['exception'] = 'Fail! Something went to wrong. Try agian';
            $this->session->set_userdata($sess);
            redirect('client/user/bank_info');
        }
    }

    public function client_edit() {
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


        $data['header'] = $this->load->view('dashboard-client/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-client/common/footer', $data, TRUE);
        $this->load->view('dashboard-client/user/merchant-profile-view', $data);
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
        $data['steadfast_api_key'] = $address = $this->input->post('steadfast_api_key');
        $data['steadfast_api_secret'] = $address = $this->input->post('steadfast_api_secret');


        $response = $this->db
                ->where('userid', $userid)
                ->update('users', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('client/user/client_edit');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('client/user/client_edit');
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

        $data['header'] = $this->load->view('dashboard-client/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-client/common/footer', $data, TRUE);
        $this->load->view('dashboard-client/user/change-password', $data);
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
                $this->load->view('dashboard-client/user/change-password-two', $form_validation);
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
                    redirect('client/user/change_passowrd');
                }
            }
        } else {

            $sess['exception'] = 'Your old password did not match!.';
            $this->session->set_userdata($sess);
            redirect('client/user/change_passowrd');
        }
    }

}
