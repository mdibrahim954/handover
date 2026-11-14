<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Logout (For user signout)
 * Developer: Moshahed Alam
 * Date: 01-Apr-2018
 * Time: 7:25 PM
 */
class Logout extends CI_Controller {

    public function user_logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('first_name');
        $this->session->unset_userdata('first_name');
        $this->session->unset_userdata('menu_permission');
        $this->session->unset_userdata('redirect_url');
        session_destroy();

        if (isset($_COOKIE['remember_me'])) {
            unset($_COOKIE['first_name']);
            unset($_COOKIE['last_name']);
            unset($_COOKIE['user_id']);
            unset($_COOKIE['remember_me']);

            setcookie('first_name', null, -1, '/');
            setcookie('last_name', null, -1, '/');
            setcookie('user_id', null, -1, '/');
            setcookie('remember_me', null, -1, '/');
        }

//        $sess['success'] = 'You are successfully logged out.';
//        $this->session->set_userdata($sess);
        redirect('/');
    }

}
