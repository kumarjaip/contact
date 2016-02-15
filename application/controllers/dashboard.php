<?php

/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/login/show_login');
        }
    }

    /**
     * This is the controller method that drives the application.
     * After a user logs in, show_main() is called and the main
     * application screen is set up.
     */
    public function show_main() {
        $this->load->model('dashboard_m');

        // Get some data from the user's session
        $user_id = $this->session->userdata('id');
        //$is_admin 	= $this->session->userdata('isAdmin');
        //$team_id 	= $this->session->userdata('teamId');
        // Load all of the logged-in user's posts
        $contacts = $this->dashboard_m->get_contacts_for_user($user_id, 10);

        // If posts were fetched from the database, assign them to $data
        // so they can be passed into the view.
        if ($contacts) {
            $data['contacts'] = $contacts;
        }

        $data['max_contacts'] = $contacts ? count($contacts) : 0;
        $data['contacts_count'] = $this->dashboard_m->get_contact_count_for_user($user_id);

        $data['email'] = $this->session->userdata('email');
        $data['name'] = $this->session->userdata('name');
        $data['status'] = $this->session->userdata('status');

        $this->load->view('dashboard', $data);
    }
    
    // This is for global setting. 
    // Here you can define the global variables i.e. website name, keyword, description, email etc
    public function settings()
    {
        $this->load->model('dashboard_m');
        $this->load->helper('form');
        
        $data['error'] = array('error' => "");
        $data['name']  = $this->session->userdata('name');
        
        $this->load->view('setting', $data);
    }
    
    public function setting_processor()
    {
        $this->load->model('dashboard_m');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('changepwd', 'changepwd', 'required|trim|xss_clean');
        $this->form_validation->set_rules('confrmpwd','confrmpwd','required|trim|xss_clean');
    
        if($this->form_validation->run() == false){
            $data['error'] = array('error' => validation_errors());
            $data['name']  = $this->session->userdata('name');

            $this->load->view('setting', $data);            
        } else {
            
            $data['error'] = array('error' => "Successfully updated!");
            $data['name']  = $this->session->userdata('name');

            $this->load->view('setting', $data);                
        }
    }
}

?>