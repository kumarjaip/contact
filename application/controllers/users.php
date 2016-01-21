<?php
/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class users extends CI_Controller{

	public function __construct()
  	{
    	parent::__construct();

    	if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/login/show_login');
    	}
  	}


  /**
   * This is the controller method that drives the application.
   * After a user logs in, show_main() is called and the main
   * application screen is set up.
   */
  function manage() {
    $this->load->model('user_m');

    // Get some data from the user's session
    $user_id 	= $this->session->userdata('id');

    // Load all of the logged-in user's posts
    $manageuser = $this->user_m->get_all_users( $user_id, 10 );

    // If posts were fetched from the database, assign them to $data
    // so they can be passed into the view.
    if ($manageuser) {
      $data['manageuser'] = $manageuser;
    }

	$data['max_users'] = $manageuser ? count($manageuser) : 0;
	//$data['contacts_count'] = $this->dashboard_m->get_contact_count_for_user( $user_id );
	$data['name'] = $this->session->userdata('name');

    $this->load->view('manageuser',$data);
  }


}

?>