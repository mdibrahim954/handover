<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

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
//    public function index() {
//        $data = array();
//        $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
//        $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
//        $this->load->view('frontend/contact-us-view', $data);
//    }
    public function index() {
        $data = array();
         $data['header'] = $this->load->view('frontend/home/header', $data, TRUE);
        $data['footer'] = $this->load->view('frontend/home/footer', $data, TRUE);
        $this->load->view('frontend/contact-us-view', $data);
    }

    public function contact_email() {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
        $data = array();
        $data['name'] = $name = $this->input->post('name');
        $data['subject'] = $subject = $this->input->post('subject');
        $data['email'] = $email = $this->input->post('email');
        $data['message'] = $message = $this->input->post('message');

        //                //--- Email Start
        $this->load->model('mailer_model');
        $mailData = array();
        $mailData['from_address'] = $email;
        $mailData['admin_full_name'] = $name;
        $mailData['to_address'] = 'mehedi.hasan.bappi01@gmail.com';
        $mailData['subject'] = $subject;
        $mailData['name'] = $name;
        $mailData['email'] = $email;
        $mailData['message'] = $message;
        $this->mailer_model->contactUsEmail($mailData, 'contact-us-email-view');
        //                //--- Email End

        $meg['success'] = 'Email Sent!';
        $this->session->set_userdata($meg);
        redirect("contact_us");
    }

}
