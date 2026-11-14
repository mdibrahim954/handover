<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Home
 *
 * This controller used to be for home page information
 */
class Forgot_password extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        if ($this->session->userdata('user_id')){
//            redirect(base_url());            
//        }
        $this->load->model('mailer_model');
//        $this->load->library('encrypt');
        $this->load->library('form_validation');
    }

    public function index() {
        $data = array();
        $data['menu_title'] = '';
        $this->load->model('mailer_model');
        $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
        $this->load->view('frontend/recovery/forgot-password-view', $data);
    }

    public function passwordRecoveryEmail() {

        if ($this->input->post('email')):
            $user_email = $this->input->post('email', true);

            $query = $this->mailer_model->checkUserExistingEmail($user_email);
//            $query = $this->db
//                        ->select('*')
//                        ->where('email', $user_email)
//                        ->get('users')
//                        ->row();

            if (!empty($query->result())) {
                foreach ($query->result() as $row) {
                    $id = $row->userid;
                    $first_name = $row->first_name;
                    $last_name = $row->last_name;
                    $email = $row->email;
                    $mobile_number = $row->mobile;
                    $user_status = $row->isactive;
                    $password = $row->password;
                }
            } else {
                $sess['exception'] = 'Please Type Valid Email Address';
                $this->session->set_userdata($sess);
                redirect('forgot_password');
                exit();
            }

//            echo '<pre>';
//            print_r($query->result());
//            echo '</pre>';
//            exit();


            if (isset($id)) {

//                $user_id = base64_encode($id); //encoded ID
                $user_id = $id;

                $mailData = array();
                $mailData['from_address'] = "From: User <team@handoverexpressbd.com>";
                $mailData['admin_full_name'] = "Handover Express";
                $mailData['to_address'] = $user_email;
                $mailData['subject'] = "Reset your Handover Express password";
                $mailData['first_name'] = $first_name;
                $mailData['last_name'] = $last_name;
                $mailData['user_id'] = $user_id;
                $this->mailer_model->sendeEmail($mailData, 'password_recovery_email_view');
                //--- Email End
                // temp
//                $data['first_name'] = $query->first_name;
//                $data['last_name'] = $query->last_name;
//                $data['user_id'] = $query->id;
//                $this->load->view('mailScripts/password_recovery_local_test', $data);
                $sess['success'] = 'Password reset link has been sent to your email';
                $this->session->set_userdata($sess);
                redirect('signin');
            } else {
                $sess['exception'] = 'Please Type Valid Email Address';
                $this->session->set_userdata($sess);
                redirect('forgot_password');
//                echo 'false';
            }
        else:
            $sess['exception'] = 'Please Type Valid Email Address';
            $this->session->set_userdata($sess);
            redirect('forgot_password');
        endif;
    }

    public function reset_passwod() {
        $data = [];
        $data['menu_title'] = '';
        $id = $this->uri->segment(3);

        $id_array = explode("-", $id);
        $id2 = $id_array[2];



        $userInfo = $this->db
                ->select('*')
                ->where('userid', $id2)
                ->get('users')
                ->row();

//        echo '<pre>';
//        print_r($userInfo);
//        echo '</pre>';

        if (!empty($userInfo)) {

            $data['user_id'] = $id2;
            $data['email'] = $userInfo->email;
            $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
            $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
            $this->load->view('frontend/recovery/change-password-view', $data);
        } else {
            $sess['exception'] = 'Please Type Valid Email Address';
            $this->session->set_userdata($sess);
            redirect('forgot_password');
        }
    }

    public function reset_passwod_success() {
        $data = [];
        $user_id = $this->input->post('user_id');
        $email = $this->input->post('email');
        $data['user_id'] = $this->input->post('user_id');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Confirmed Password', 'required|min_length[5]|matches[password]');


        if (false == $this->form_validation->run()) {
            $form_validation['message'] = 'Password change failed due to bellow reason.';
            $form_validation['reason'] = 'form_validation';
            $form_validation['field'] = $this->form_validation->error_array();
            $form_validation = json_encode($form_validation);

//            $data['menu_title'] = '';
//            $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
//            $data['body'] = $this->load->view('frontend/recovery/reset-password', $form_validation, TRUE);
//            $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
//            $this->load->view('frontend/register-master-page', $data);
            $data['form_validation'] = $form_validation;
            $data['user_id'] = $user_id;
            $data['email'] = $email;
            $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
            $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
            $this->load->view('frontend/recovery/change-password-view', $data);
        } else {


            $password = $this->form_validation->set_value('password');
            $options = [
                'cost' => 12,
            ];
            $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);


            $this->load->model('user_model');
            $response = $this->user_model->reset_password($password_hash, $user_id);

            $user_info = $this->user_model->login_for_cookie($user_id);
//            $user_info = $this->db
//                    ->select('*')
//                    ->where('id',$user_id)
//                    ->get('user_info')
//                    ->row();
//            print_r($user_info);
            $id = $user_info->id;
            $first_name = $user_info->first_name;
            $last_name = $user_info->last_name;


            $sess['user_id'] = $id;

            $sess['first_name'] = $first_name;
            $sess['last_name'] = $last_name;
            $this->session->set_userdata($sess);

            //--- Email Start
            $this->load->model('mailer_model');
            $mailData = array();
            $mailData['from_address'] = "From: User <team@handoverexpressbd.com";
            $mailData['admin_full_name'] = "Handover Express.";
            $mailData['to_address'] = $user_info->email;
            $mailData['subject'] = "Yor password has been reset successfully.";
            $mailData['full_name'] = $first_name . ' ' . $last_name;
            $this->mailer_model->sendeEmailPasswordRecoverySuccess($mailData, 'send-mail-password-recovery-success');
            //--- Email End            

            redirect(base_url('home'));
        }
    }

}
