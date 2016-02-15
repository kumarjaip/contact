<?php

/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class country extends CI_Controller {

    private $rec_per_page = 50;

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/login/show_login');
        }
    }

    /**
     * This is the controller method that drives the application.
     * After a user logs in, show_main() is called and the main
     * application screen is set up.
     */
    function manage($page = '') {
        $this->load->model('country_m');
        $this->load->library('pagination');

        // Load all of the logged-in user's posts
        $managecountry = $this->country_m->get_all_country('', $this->rec_per_page);

        // If posts were fetched from the database, assign them to $data
        // so they can be passed into the view.
        if ($managecountry) {
            $data['managecountry'] = $managecountry;
        }

        $data['name'] = $this->session->userdata('name');

        $retresult = $this->country_m->get_count_country();

        $config['base_url'] = site_url('country/manage/');
        $config['total_rows'] = $retresult;
        $config['per_page'] = $this->rec_per_page;

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

        $pageno = ($page != '') ? $page : 0;

        $config["cur_page"] = $pageno;

        $data['max_cont'] = $managecountry ? count($managecountry) : 0;
        $data['con_count'] = $this->country_m->get_count_country();

        $data['cur_conpage'] = $config["cur_page"];

        $this->load->view('country', $data);
    }

    function create() {

        $this->load->model('country_m');

        $data['error'] = array('error' => "");

        $data['name'] = $this->session->userdata('name');

        $this->load->view('country', $data);
    }

    // delet the category from database table
    function delete($conID = null, $redirect = true) {
        $this->load->model('country_m');

        if ($conID == null) {
            $conID = $this->input->post('conID');
            $redirect = false;
        }

        // call the model to delete the category
        $this->country_m->delete_country($conID);

        if ($redirect) {
            redirect('/country/manage', 'refresh');
        }
    }

    //update the category info
    function update() {

        $this->load->model('country_m');

        $conID = $this->input->get('id', TRUE);

        $conInfo = $this->country_m->CountryById($conID);

        $data['error'] = array('error' => "");

        $data['conList'] = $conInfo;
        $data['name'] = $this->session->userdata('name');

        $this->load->view('update_country', $data);
    }

}

?>