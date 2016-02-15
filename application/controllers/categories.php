<?php
/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class categories extends CI_Controller {

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
    function manage() {
        $this->load->model('store_category');

        // Load all of the logged-in user's posts
        $managecat = $this->store_category->get_all_category(20);

        // If posts were fetched from the database, assign them to $data
        // so they can be passed into the view.
        if ($managecat) {
            $data['managecat'] = $managecat;
        }

        $data['max_cats'] = $managecat ? count($managecat) : 0;
        $data['cat_count'] = $this->store_category->get_count_category();
        $data['name'] = $this->session->userdata('name');

        $this->load->view('categories', $data);
    }

    function create() {

        $this->load->model('store_category');
        $mcatArrs = $this->store_category->get_main_category(100);

        $data['error'] = array('error' => "");

        $data['mcat'] = $mcatArrs;
        $data['name'] = $this->session->userdata('name');

        $this->load->view('create_category', $data);
    }

    // udpate the status based on user action
    function status($catId = null, $status = null) {
        $this->load->model('store_category');

        if ($catId === null) {
            $catId = $this->input->post('catId');
        }

        if ($status === null) {
            $status = $this->input->post('status');
        }

        $this->store_category->update_status($catId, $status);

        redirect('/categories/manage', 'refresh');
    }

    // delet the category from database table
    function deletecat($catID = null, $redirect = true) {
        $this->load->model('store_category');

        if ($catID == null) {
            $catID = $this->input->post('catID');
            $redirect = false;
        }

        // call the model to delete the category
        $delete = $this->store_category->delete_category($catID);

        if ($redirect)
            redirect('/categories/manage', 'refresh');
    }

    //update the category info
    function update($catid) {

        $this->load->model('store_category');

        $catId = $this->input->get('id', TRUE);
        $mcatArrs = $this->store_category->get_main_category(100);
        $catsInfo = $this->store_category->CategoryById($catid);

        $data['error'] = array('error' => "");
        $data['mcat'] = $mcatArrs;
        $data['icat'] = $catsInfo;
        $data['name'] = $this->session->userdata('name');

        $this->load->view('update_category', $data);
    }

    // create or add new category into database table
    function do_upload() {
        // Grab the user data from the form POST
        $userData['cat_name'] = $this->input->post('cat_name');
        $userData['cat_desc'] = $this->input->post('cat_desc');
        $userData['parent_cat'] = $this->input->post('parent_cat');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        $this->load->model('store_category');

        $data['name'] = $this->session->userdata('name');
        $field_name = "cat_image";

        //var_dump($userData);
        //var_dump($_FILES);
        //die;
        if (!$this->upload->do_upload($field_name)) {
            $mcatArrs = $this->store_category->get_main_category(100);

            $data['error'] = array('error' => $this->upload->display_errors());
            $data['mcat'] = $mcatArrs;

            $this->load->view('create_category', $data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            print_r($data);
            $offerArray = array();
            foreach ($this->upload->data() as $item => $value):
                $offerArray['file_name'] = $value;
                break;
            endforeach;

            $userData['cat_image'] = $offerArray['file_name'];

            // Load all of the categories
            $managecat = $this->store_category->get_all_category(20);

            if ($managecat) {
                $data['managecat'] = $managecat;
            }

            $data['max_cats'] = $managecat ? count($managecat) : 0;
            $data['cat_count'] = $this->store_category->get_count_category();
            $data['name'] = $this->session->userdata('name');

            if ($userData['cat_name'] && $this->store_category->create_new_category($userData)) {
                redirect('/categories/manage', 'refresh');
            }
        }
    }

}
?>