<?php

class User_model extends CI_Model {

    /**
     * To check an user is exist or not by providing $email or $username or $mobile
     *
     * @param $email
     * @param null $username
     * @param null $mobile
     *
     * @return boolean
     */
    public function has_this_user($email, $username = null, $mobile = null) {
        
    }
    
    public function rider_team(){
        $result=$this->db
                ->select('*')
                ->where('user_type_id', 2)//delivery man
                ->where('isactive', 1)
                ->order_by('userid', 'desc')
                ->get('users')
                ->result();
        
        return $result;
    }
    public function testimonial(){
        $result=$this->db
                ->select('*')
                ->order_by('id', 'desc')
                ->get('testimonial')
                ->result();
        
        return $result;
    }
    public function partner(){
        $result=$this->db
                ->select('*')
                ->order_by('partner_id', 'desc')
                ->get('partners')
                ->result();
        
        return $result;
    }
    public function delivery_charge(){
        $result=$this->db
                ->select('*')
                ->where('id',1)
                ->get('delivery_charge')
                ->row();
        
        return $result;
    }



    public function userInfoByUserId($id) {
        return $this->db
                        ->select('*')
                        ->where('userid', $id)
                        ->get('users')
                        ->row();
    }

    public function updateProfileImage($data, $id) {
        $this->db
                ->set('imagename', $data['imagename'])
                ->where('userid', $id)
                ->update('users');
    }


    /**
     * Register an user
     *
     * @param $user_info
     */
    public function register($user_info) {
        
       return $this->db->insert('users', $user_info);

    }


    public function login($login_info) {

       $username = $login_info['username'];
        return $query = $this->db->query("SELECT * FROM users WHERE mobile='$username' OR email='$username'");
    }

    //Update Login Status for User after loggedin user
    public function updateLoginStatus($id) {
        $this->db
                ->set('islogin', '1')
                ->where('userid', $id)
                ->update('users');
    }

    //Update Login Status for User after loggedout user
    public function updateLoginStatusZero($id) {
        $this->db
                ->set('islogin', '0')
                ->where('userid', $id)
                ->update('users');
    }

    //Reset Password for user
    public function update_user_info($data, $user_id) {

        return $query = $this->db
                ->where('userid', $user_id)
                ->update('users', $data);
    }

    //search user id for SET Cookie
    public function login_for_cookie($user_id) {
        return $query = $this->db
                ->select('*')
                ->where('userid', $user_id)
                ->get('users')
                ->row();
    }

    //Reset Password for user
    public function reset_password($user_password, $user_id) {
        $data['password'] = $user_password;
        $data['updated_at'] = date('Y-m-d H:i:s'); //current server time
        return $query = $this->db
                ->where('userid', $user_id)
                ->update('users', $data);
    }

    // Get user inforamtion by ID
    public function userinfo_data($user_id) {

        return $result = $this->db
                ->select('*')
                ->where('userid', $user_id)
                ->get('users')
                ->row();
    }

    public function userinfo_check_password($old_password, $user_id) {
        return $result = $this->db
                ->select('*')
                ->where('id', $user_id)
                ->where('password', $old_password)
                ->get('users')
                ->row();
    }

    public function userActivation($id) {
        return $query = $this->db
                ->set('user_status', '1')
                ->where('userid', $id)
                ->update('users');
    }

}
