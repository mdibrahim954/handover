<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by Netbeans.
 * User: Moshahed
 * Date: 10/30/16
 * Time: 4:14 PM
 */
class Mailer_model extends CI_Model {

    /**
     * sends mail
     * @author Md. Moshahed Alam

     */
    function sendeEmail($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.handoverexpressbd.com',
            'smtp_port' => 25,
            'smtp_user' => 'team@handoverexpressbd.com',
            'smtp_pass' => '{z&mDL!iedjv',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);

        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], 'Handover Express');
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//        echo $body;
//        exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function sendeEmailWelcome($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.handoverexpressbd.com',
            'smtp_port' => 25,
            'smtp_user' => 'team@handoverexpressbd.com',
            'smtp_pass' => '{z&mDL!iedjv',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);

        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//		echo $body; 
//                exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function sendeEmailActivationSuccess($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.handoverexpressbd.com',
            'smtp_port' => 25,
            'smtp_user' => 'team@handoverexpressbd.com',
            'smtp_pass' => '{z&mDL!iedjv',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);

        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//		echo $body; 
//                exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function sendeEmailPasswordRecoverySuccess($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.handoverexpressbd.com',
            'smtp_port' => 25,
            'smtp_user' => 'team@handoverexpressbd.com',
            'smtp_pass' => '{z&mDL!iedjv',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);

        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//		echo $body; 
//                exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

//    public function checkUserExistingEmail($user_email) {
//
//        return $query = $this->db
//                ->select('*')
//                ->where('email',$user_email)
//                ->get('users')
//                ->row();
//    }
    public function checkUserExistingEmail($user_email) {

        return $query = $this->db->query("SELECT * FROM users WHERE email='$user_email'");
    }

    function sendActivatedEmail($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.handoverexpressbd.com',
            'smtp_port' => 25,
            'smtp_user' => 'team@handoverexpressbd.com',
            'smtp_pass' => '{z&mDL!iedjv',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);

        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function contactUsEmail($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.handoverexpressbd.com',
            'smtp_port' => 25,
            'smtp_user' => 'team@handoverexpressbd.com',
            'smtp_pass' => '{z&mDL!iedjv',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);

        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//        echo $body;
//        exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

}
