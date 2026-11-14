<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
        $data = array();
        $data['about'] = $this->db
                ->select('*')
                ->where('id',1)
                ->get('about_us')
                ->row();
        
         $data['header'] = $this->load->view('frontend/home/header', $data, TRUE);
        $data['footer'] = $this->load->view('frontend/home/footer', $data, TRUE);
        $this->load->view('frontend/about-view', $data);
    }

}
