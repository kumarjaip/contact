<?php
/*
 * Created on Jan 22, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class emailtemplate extends CI_Controller{

	private $rec_per_page = 15;

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
        //$this->load->view('addcms',$data);
    }

  /**
   * This is the controller method that drives the CMS.
   * To Create new cms page, create() is called and the new cms page
   * screen is set up.
   */

    function create() {
    	$this->load->model('emailtemp_m');

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

    function manage($page = '') {

    	$this->load->model('emailtemp_m');
	$this->load->library('pagination');

    	// Get some data from the user's session
    	$user_id = $this->session->userdata('id');
        $retresult  = $this->emailtemp_m->get_count_for_temp();

        $data['total_count'] = $retresult;
        $data['name'] = $this->session->userdata('name');

        $config['base_url'] 	= site_url('emailtemp/manage/');
        $config['total_rows'] 	= $retresult;
        $config['per_page'] 	= $this->rec_per_page;

        $choice = $config["total_rows"] / $config["per_page"];
        $config["uri_segment"] = 3;
        $config["num_links"] = round($choice);

        $config['full_tag_open'] = '<div class="floatR pagination marginT15"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';

        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="" class="pageActive">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['use_page_numbers'] = true;

        $this->pagination->initialize($config);

        $page = ($page!='')? $page : 0;

        $config["cur_page"] = $page;

    	// Load all of the cms pages
    	$managecms = $this->emailtemp_m->get_all_pages( $config['per_page'], $page );

    	// If posts were fetched from the database, assign them to $data
    	// so they can be passed into the view.
    	if ($managecms) {
            $data['managecms'] = $managecms;
    	}

        $data['max_cmspage'] = $managecms ? count($managecms) : 0;
        $data['tot_cmspage'] = $config['total_rows'];
        $data['cur_cmspage'] = $config["cur_page"];

        $this->load->view('email_template',$data);
    }

    function deletepage($postID = null, $redirect = true)
    {
        $this->load->model('emailtemp_m');

        if($postID == null){
            $postID =  $this->input->post('postID');
            $redirect = false;
        }
	
        // Delete the cms pages
    	$this->emailtemp_m->delete_page( $postID );

    	if($redirect) {
            redirect(base_url().'emailtemp/manage');
        }
    }
}

?>