<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->library('form_validation');
        $data = array();
        $data['area']=$this->db
                ->select('*')
                ->order_by('area_name','asc')
                ->get('areas')
                ->result();
        
        $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
        $this->load->view('frontend/signup-view', $data);
    }

    public function rider() {
        $this->load->library('form_validation');
        $data = array();
        $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
        $this->load->view('frontend/signup-rider-view', $data);
    }

    public function register_rider() {

//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();

        $data = [];
        $data['menu_title'] = '';
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

//        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required');
        $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('marital_status', 'Marital Status', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique' => 'This email already exists.'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('confirm_password', 'Confirmed Password', 'required|min_length[4]|matches[password]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim');
        $this->form_validation->set_rules('region', 'Region Name', 'trim');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim');
        $this->form_validation->set_rules('nid_number', 'NID Number', 'trim');
        $this->form_validation->set_rules('blood_group', 'Blood Group', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required');
//        $this->form_validation->set_rules('signing', 'Accept Agreement', 'trim|required');

        if (false == $this->form_validation->run()) {
            $form_validation['message'] = 'Registration failed due to bellow reason.';
            $form_validation['reason'] = 'form_validation';
            $form_validation['field'] = $this->form_validation->error_array();
            $form_validation = json_encode($form_validation);

            $data['form_validation'] = $form_validation;
            $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
            $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
            $this->load->view('frontend/signup-rider-view', $data);
        } else {

            $imagename = '';
            $your_cv = '';

            //User image------------------------------------------------------
            if (!empty($_FILES)) {
                if ($_FILES['user_image']['name'] != '') {
                    $config['upload_path'] = './resources/user-image/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

                    $config['max_size'] = 20048;
                    $config['max_width'] = 8048;
                    $config['max_height'] = 8048;
                    $config['overwrite'] = false;

                    $this->upload->initialize($config);
                    $this->upload->do_upload('user_image');
                    $image_des = $this->upload->data();
                    $file_name = $image_des['file_name'];
                    $imagename = $file_name;
                }
            }
            //CV------------------------------------------------------
            if (!empty($_FILES)) {
                if ($_FILES['your_cv']['name'] != '') {
                    $config['upload_path'] = './resources/cv/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG|doc|docx|xls|xlsx|zip|pdf';

                    $config['max_size'] = 20048;
                    $config['max_width'] = 8048;
                    $config['max_height'] = 8048;
                    $config['overwrite'] = false;

                    $this->upload->initialize($config);
                    $this->upload->do_upload('your_cv');
                    $image_des = $this->upload->data();
                    $file_name = $image_des['file_name'];
                    $your_cv = $file_name;
                }
            }



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
                'father_name' => $this->form_validation->set_value('father_name'),
                'mother_name' => $this->form_validation->set_value('mother_name'),
                'dob' => $this->form_validation->set_value('dob'),
                'gender' => $this->form_validation->set_value('gender'),
                'marital_status' => $this->form_validation->set_value('marital_status'),
                'email' => $this->form_validation->set_value('email'),
                'mobile' => $this->form_validation->set_value('mobile'),
                'password' => $password_hash,
                'imagename' => $imagename,
                'your_cv' => $your_cv,
                'user_type_id' => '2', //rider
                'area_id' => '',
                'company_id' => '',
                'region' => $this->form_validation->set_value('region'),
                'nationality' => $this->form_validation->set_value('nationality'),
                'nid_number' => $this->form_validation->set_value('nid_number'),
                'blood_group' => $this->form_validation->set_value('blood_group'),
                'address' => $this->form_validation->set_value('address'),
                'permanent_address' => $this->form_validation->set_value('permanent_address'),
//                'signing' => $this->form_validation->set_value('signing'),
                'created_at' => $cenvertedCurrentTime,
                'isactive' => 0,
            );

            $data2 = array();
            $data2['company_name'] = $companyname = $this->form_validation->set_value('companyname');
            $data2['company_address'] = $address = $this->form_validation->set_value('address');
            $data2['created_at'] = $cenvertedCurrentTime;

            //registered new users-----------------------------------------
            $response = $this->db->insert('users', $user_info);
            $last_insert_id = $this->db->insert_id();


            if ($response == 1) {
                $data['success'] = true;
                $sess['success'] = 'Success! To login your account you need to approval by admin';
                $this->session->set_userdata($sess);


                /*
                  //--- Email Start
                  $this->load->model('mailer_model');
                  $mailData = array();
                  //                $mailData['from_address'] = "team@handoverexpressbd.com";
                  $mailData['from_address'] = "From: User <team@handoverexpressbd.com>";
                  $mailData['admin_full_name'] = "Handover Express";
                  $mailData['to_address'] = $user_info['email'];
                  $mailData['subject'] = "Welcome to Handover Express";
                  $mailData['first_name'] = $user_info['first_name'];
                  $mailData['last_name'] = $user_info['last_name'];
                  $mailData['user_full_name'] = $user_info['user_full_name'];
                  $mailData['username'] = $user_info['username'];
                  $mailData['id'] = $last_user_id;
                  $this->mailer_model->sendeEmailWelcome($mailData, 'send-mail-welcome-view');
                  //--- Email End
                 * 
                 */


                redirect('signin');
            }
        }
    }

    /**
     * Request to register
     */
    public function register_ajax() {

//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();

        $data = [];
        $data['menu_title'] = '';
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

//        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique' => 'This email already exists.'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('confirm_password', 'Confirmed Password', 'required|min_length[4]|matches[password]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim');
        $this->form_validation->set_rules('companyname', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('areaid', 'Area', 'trim|required');
//        $this->form_validation->set_rules('signing', 'Accept Agreement', 'trim|required');

        if (false == $this->form_validation->run()) {
            $form_validation['message'] = 'Registration failed due to bellow reason.';
            $form_validation['reason'] = 'form_validation';
            $form_validation['field'] = $this->form_validation->error_array();
            $form_validation = json_encode($form_validation);

            $data['form_validation'] = $form_validation;
            $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
            $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
            $this->load->view('frontend/signup-view', $data);
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
                'email' => $this->form_validation->set_value('email'),
                'mobile' => $this->form_validation->set_value('mobile'),
                'password' => $password_hash,
                'imagename' => '',
                'user_type_id' => '3',
                'area_id' => $this->form_validation->set_value('areaid'),
                'address' => $this->form_validation->set_value('address'),
//                'signing' => $this->form_validation->set_value('signing'),
                'created_at' => $cenvertedCurrentTime,
                'isactive' => 0,
                'my_account_type' => $this->input->post('my_account_type'), //bank account type
            );

            $data2 = array();
            $data2['company_name'] = $companyname = $this->form_validation->set_value('companyname');
            $data2['company_address'] = $address = $this->form_validation->set_value('address');
            $data2['created_at'] = $cenvertedCurrentTime;

            //registered new users-----------------------------------------
            $response = $this->db->insert('users', $user_info);
            $last_insert_id = $this->db->insert_id();
            
            //insert bank account information-------------------------------------------------------------
            $bank_AccountType=$this->input->post('my_account_type');
            if($bank_AccountType !='cash'){
               $bankInfo=array();
                if($bank_AccountType =='bank'){
                   $bankInfo['userid']=$last_insert_id;
                   $bankInfo['bank_name']=$this->input->post('bank_name');
                   $bankInfo['bank_account_name']=$this->input->post('bank_account_name');
                   $bankInfo['bank_account_number']=$this->input->post('bank_account_number');
                   $bankInfo['bank_routing_no']=$this->input->post('bank_routing_no');
                   $bankInfo['bank_branch_name']=$this->input->post('bank_branch_name');
                   $bankInfo['created_at']=$cenvertedCurrentTime;
                }
                if($bank_AccountType =='mobile_bank'){
                   $bankInfo['userid']=$last_insert_id;
                   $bankInfo['wallet_type']=$this->input->post('wallet_type');
                   $bankInfo['wallet_number']=$this->input->post('wallet_number');
                   $bankInfo['payment_info']=$this->input->post('payment_info');
                   $bankInfo['created_at']=$cenvertedCurrentTime;
                }
                $bankResponse = $this->db->insert('bank_info', $bankInfo);
            }
            

            $this->db->insert('client_companies', $data2);
            $last_insert_company_id = $this->db->insert_id();

            //update company id-----------------------------------------
            $this->db
                    ->where('userid', $last_insert_id)
                    ->set('company_id', $last_insert_company_id)
                    ->update('users');

            if ($response == 1) {
                $data['success'] = true;
                $sess['success'] = 'Success! To login your account you need to approval by admin';
                $this->session->set_userdata($sess);


                /*
                  //--- Email Start
                  $this->load->model('mailer_model');
                  $mailData = array();
                  //                $mailData['from_address'] = "team@handoverexpressbd.com";
                  $mailData['from_address'] = "From: User <team@handoverexpressbd.com>";
                  $mailData['admin_full_name'] = "Handover Express";
                  $mailData['to_address'] = $user_info['email'];
                  $mailData['subject'] = "Welcome to Handover Express";
                  $mailData['first_name'] = $user_info['first_name'];
                  $mailData['last_name'] = $user_info['last_name'];
                  $mailData['user_full_name'] = $user_info['user_full_name'];
                  $mailData['username'] = $user_info['username'];
                  $mailData['id'] = $last_user_id;
                  $this->mailer_model->sendeEmailWelcome($mailData, 'send-mail-welcome-view');
                  //--- Email End
                 * 
                 */


                redirect('signin');
            }
        }
    }

    /*
     * User Activation
     */

    public function user_activation($id) {
        if (!$id) {
            redirect('login');
        }
        $userinfo = $this->user_model->userinfo_data($id);
        $regi_time = $userinfo->registration_date;
        $user_status = $userinfo->user_status;
        $time_now = date('Y-m-d H:i:s', time());

        $date_now = date('Y-m-d H:i:s');
        $date_now = strtotime($date_now);

        $date_from = date("Y-m-d H:i:s", strtotime('-30 minutes', $date_now));

        if ($regi_time > $date_from && $regi_time < $date_now) { //account activation before 30 min after registration
            $this->user_model->userActivation($id);

            //--- Email Start
            $this->load->model('mailer_model');
            $mailData = array();
            $mailData['from_address'] = "From: User <info@abc.com>";
            $mailData['admin_full_name'] = "Handover Express";
            $mailData['to_address'] = $userinfo->email;
            $mailData['subject'] = "Your account activated successfully.";
            $mailData['user_full_name'] = $userinfo->user_full_name;
            $this->mailer_model->sendeEmailActivationSuccess($mailData, 'send-mail-activation-success');
            //--- Email End

            $sess['success'] = 'Your account activated successfully.';
            $this->session->set_userdata($sess);
            redirect('login');
        } elseif ($user_status == '1') {
            $sess['success'] = 'Your account already activated.';
            $this->session->set_userdata($sess);
            redirect('login');
        } else {
            $sess['exception'] = 'Sorry, your account activation time has expired!.';
            $this->session->set_userdata($sess);
            redirect('login');
        }
    }

}
