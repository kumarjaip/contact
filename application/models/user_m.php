<?php

class user_m extends CI_Model {

    protected $_table_name = 'contactus_admin';
    var $details;

    function validate_user($username, $password) {
        // Build a query to retrieve the user's details
        // based on the received username and password
        $this->db->from($this->_table_name);
        $this->db->where('email', $username);
        $this->db->where('admin_password', md5($password));
        $login = $this->db->get()->result();

        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if (is_array($login) && count($login) == 1) {
            // Set the users details into the $details property of this class
            $this->details = $login[0];
            // Call set_session to set the user's session vars via CodeIgniter
            $this->set_session();
            return true;
        }

        return false;
    }

    function set_session() {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        $this->session->set_userdata(array(
            'id' => $this->details->adminid,
            'name' => $this->details->fullName,
            'email' => $this->details->email,
            'status' => $this->details->isActive,
            'isLoggedIn' => true
                )
        );
    }

    function create_new_user($userData) {
        $data['first_name'] = $userData['firstName'];
        $data['last_name']  = $userData['lastName'];
        $data['email']      = $userData['email'];
        $data['isActive']   = "1";
        $data['password']   = md5($userData['password']);

        return $this->db->insert($this->_table_name, $data);
    }

    public function update_status($user_id, $status) {
        $data = array('isActive' => $status);
        $result = $this->db->update($this->_table_name, $data, array('adminid' => $user_id));
        return $result;
    }

    public function get_all_users($user_id, $num_posts = 10) {

        // start building a query
        $this->db->from($this->_table_name);

        // restrict to teammates if not an admin
        $this->db->where('contactus_admin.isActive', '1');

        $this->db->where_not_in('adminid', array($user_id));
        $this->db->limit($num_posts);
        $this->db->order_by('adminid', 'desc');

        $users = $this->db->get()->result_array();

        if (is_array($users) && count($users) > 0) {
            return $users;
        }

        return false;
    }

    private function getAvatar() {
        $avatar_names = array();

        foreach (glob('assets/img/avatars/*.png') as $avatar_filename) {
            $avatar_filename = str_replace("assets/img/avatars/", "", $avatar_filename);
            array_push($avatar_names, str_replace(".png", "", $avatar_filename));
        }

        return $avatar_names[array_rand($avatar_names)];
    }

}
