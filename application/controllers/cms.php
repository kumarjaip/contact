<?php
/*
 * Created on Jan 22, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class cms extends CI_Controller{

	public function __construct()
  	{
    	parent::__construct();

    	if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/login/show_login');
    	}
  	}

    function show_create( $show_error = false ) {

		$data['name'] = $this->session->userdata('name');

        $data['error'] = $show_error;

        $this->load->helper('form');
        $this->load->view('addcms',$data);
    }

  /**
   * This is the controller method that drives the CMS.
   * To Create new cms page, create() is called and the new cms page
   * screen is set up.
   */

	function create() {
    	$this->load->model('cms_m');

		$data['name'] = $this->session->userdata('name');

        // Grab the email and password from the form POST
        $userData['title'] = $this->input->post('title');
        $userData['slug']  = preg_replace('/\s+/', '',$this->input->post('title'));
        $userData['order']  = "0";
        $userData['body']  = $this->input->post('body');
        $userData['parent_id']  = "0";
        $userData['template']   = preg_replace('/\s+/', '',$this->input->post('title'));

        if( $userData['title'] && $userData['body'] && $this->cms_m->create_new_page($userData)) {
            // If the page added, redirect to the main view
            redirect('/cms/manage');
        } else {
            // Otherwise show the page form screen with an error message.
            $this->show_create(true);
        }

	}

 	function manage() {
    	$this->load->model('cms_m');

    	// Get some data from the user's session
    	$user_id 	= $this->session->userdata('id');

    	// Load all of the cms pages
    	$managecms = $this->cms_m->get_all_pages( 10 );

    	// If posts were fetched from the database, assign them to $data
    	// so they can be passed into the view.
    	if ($managecms) {
      		$data['managecms'] = $managecms;
    	}

		$data['max_cmspage'] = $managecms ? count($managecms) : 0;


		$data['name'] = $this->session->userdata('name');
		$this->load->view('cms',$data);
 	}
}

?>