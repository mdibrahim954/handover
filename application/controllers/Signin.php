<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_id')) {
            redirect('home');
        }
        $this->load->model('user_model');
        $this->load->helper('cookie');
    }

    public function index() {


        if (isset($_COOKIE['username']) && isset($_COOKIE['id'])) {
            $user_id = $_COOKIE['id'];
            $query = $this->user_model->login_for_cookie($user_id);
            $sess['first_name'] = $query->first_name;
            $sess['last_name'] = $query->last_name;
            $sess['id'] = $query->id;
            $this->session->set_userdata($sess);
            redirect(base_url('home'));
        } else {
            $data = array();
            $data['menu_title'] = '';
            $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
            $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
            $this->load->view('frontend/signin-view', $data);
        }
    }


    public function signin_ajax() {
        
        
            

//        if (!$this->input->is_ajax_request()) {
//            header('HTTP/1.1 404 Not Found', true, 404);
//            exit();
//        }

        $login_info = [
            'username' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'logged' => $this->input->post('logged'),
        ];

//                echo '<pre>';
//        print_r($_POST);
//        print_r($login_info);
//        echo '</pre>';
//        exit();

        $query = $this->user_model->login($login_info);
        foreach ($query->result() as $row) {
            $id = $row->userid;
            $first_name = $row->first_name;
            $last_name = $row->last_name;
            $email = $row->email;
            $mobile_number = $row->mobile;
            $user_status = $row->isactive;
            $password = $row->password;
        }



        if (isset($id)) {
            $user_info = $this->user_model->userinfo_data($id);
            $hash = $password;
            
            //
            if (password_verify($login_info['password'], $hash)) {

                  //SET COOKIE (if keep me logged in selected)-----------------------------------
                  if (isset($login_info['logged'])) {
                  setcookie('first_name', $first_name, time() + (86400 * 7), "/"); // 86400 = 1 day
                  setcookie('last_name', $last_name, time() + (86400 * 7), "/"); // 86400 = 1 day
                  setcookie('user_id', $id, time() + (86400 * 7), "/");  // 86400 = 1 day
                  setcookie('remember_me', $login_info['logged'], time() + (86400 * 7), "/");  // 86400 = 1 day
                  } else {
                  if (isset($_COOKIE['remember_me'])) {
                  unset($_COOKIE['first_name']);
                  unset($_COOKIE['last_name']);
                  unset($_COOKIE['user_id']);
                  unset($_COOKIE['remember_me']);
                  }
                  }

                if ($user_status == 0) {
//                    $sess['exception'] = 'Please check email to verify your account!';
                    $sess['exception'] = 'Your password or email is wrong or contact with admin!';
                    $this->session->set_userdata($sess);
                    redirect(base_url('signin'));
                } elseif (!empty($query) && $user_status == 1) {

//                    $this->user_model->updateLoginStatus($id);
//                    echo 'Loggedin Success';
//                    exit();

                    $sess['user_id'] = $id;
                    $sess['first_name'] = $first_name;
                    $sess['last_name'] = $last_name;
                    $sess['user_type_id'] = $user_info->user_type_id;
                    $sess['menu_permission'] = $user_info->menu_permission; // 
                    $this->session->set_userdata($sess);


                    //if session have redirect url-------------------
                    if ($this->session->userdata('redirect_url')) {
                        $redirect_url = $this->session->userdata('redirect_url');
                        redirect($redirect_url);
                    } else {

//                        echo '<pre>';
//                        print_r($user_info);
//                        echo '</pre>';
//                        exit();
                        if ($user_info->user_type_id == 3 || $user_info->user_type_id == 5) { // client                             
                            redirect(base_url('client/dashboard'));
                        } elseif ($user_info->user_type_id == 2) { //delivery man
                            redirect(base_url('deliveryman/dashboard'));
                        } elseif ($user_info->user_type_id == 1) { //admin
                            redirect(base_url('admin/dashboard'));
                        }
                    }
                } else {
                    $sess['exception'] = 'Your username or password is invalid!';
                    $this->session->set_userdata($sess);
                    redirect(base_url('signin'));
                }
            } else {
                $sess['exception'] = 'Your username or password is invalid!';
                $this->session->set_userdata($sess);
                redirect(base_url('signin'));
            }
        } else {
            $sess['exception'] = 'Your username or password is invalid!';
            $this->session->set_userdata($sess);
            redirect(base_url('signin'));
        }
    }

}
