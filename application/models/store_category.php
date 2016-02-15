<?php

class store_category extends CI_Model {

    protected $_table_name = 'contactus_stores_category';
    var $details;

    function set_session() {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        $this->session->set_userdata(array(
            'id' => $this->details->id,
            'name' => $this->details->firstName . ' ' . $this->details->lastName,
            'email' => $this->details->email,
            'status' => $this->details->status,
            'isLoggedIn' => true
                )
        );
    }

    // udpate the category status as active and deavtive
    public function update_status($cat_id, $status) {
        $data = array('isActive' => $status);
        $result = $this->db->update('contactus_stores_category', $data, array('category_id' => $cat_id));
        return $result;
    }

    // delete the category from database table
    public function delete_category($cat_id) {
        $result = $this->db->delete($this->_table_name, array('category_id' => $cat_id));
        return $result;
    }

    public function get_all_category($num_posts = 10) {

        // start building a query
        $this->db->from($this->_table_name);
        $this->db->limit($num_posts);
        $this->db->order_by('category_id', 'desc');

        $catsArr = $this->db->get()->result_array();
        if (is_array($catsArr) && count($catsArr) > 0) {
            return $catsArr;
        }

        return false;
    }

    // get only main category
    public function get_main_category($num_posts = 10) {

        // start building a query
        $this->db->from($this->_table_name);
        $this->db->where('main_category', 0);
        $this->db->limit($num_posts);
        $this->db->order_by('category_name', 'asc');

        $catsArr = $this->db->get()->result_array();

        if (is_array($catsArr) && count($catsArr) > 0) {
            return $catsArr;
        }
        return false;
    }

    private function getCatImage() {

        $catImage_names = array();

        foreach (glob('assets/img/category/*.png') as $catimage_filename) {
            $catImage_names = str_replace("assets/img/category/", "", $catimage_filename);
            array_push($catImage_names, str_replace(".png", "", $catimage_filename));
        }

        return $catImage_names[array_rand($catImage_names)];
    }

    public function getCategoryById($categoryId) {

        $this->db->select('category_name');
        $this->db->from('contactus_stores_category');
        $this->db->where('category_id', $categoryId);

        $catInfo = $this->db->get()->row_array();
        //var_dump($catInfo);
        if (is_array($catInfo) && count($catInfo) > 0) {
            return $catInfo;
        }
        return false;
    }

    public function CategoryById($categoryId) {

        $this->db->from($this->_table_name);
        $this->db->where('category_id', $categoryId);

        $catInfo = $this->db->get()->result();

        if (is_array($catInfo) && count($catInfo) > 0) {
            return $catInfo;
        }
        return false;
    }

    public function get_count_category() {

        $this->db->from($this->_table_name);

        //echo $this->db->last_query();

        return $this->db->count_all_results();
    }

    function create_new_category($userData) {

        $data['category_name'] = $userData['cat_name'];
        $data['category_description'] = $userData['cat_desc'];
        $data['category_image'] = $userData['cat_image'];
        $data['main_category'] = $userData['parent_cat'];

        $data['isActive'] = "1";
        $data['updateDate'] = date('Y-m-d H:i:s', time());

        return $this->db->insert($this->_table_name, $data);
    }

}
