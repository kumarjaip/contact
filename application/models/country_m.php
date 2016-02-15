<?php
class country_m extends CI_Model {

    protected $_table_name = 'contactus_countries';
    var $details;

    function  add_country( $userData ) {
        $data['country_code'] = $userData['country_code'];
        $data['country_name'] = $userData['country_name'];        
        return $this->db->insert($this->_table_name, $data);
    }

    public function get_all_country( $start = 0, $num_posts = 10 ) {
        // start building a query
        $this->db->from($this->_table_name);

        $this->db->limit( $num_posts, $start );
        $this->db->order_by('id','desc');

        $country = $this->db->get()->result_array();

        if( is_array($country) && count($country) > 0 ) {
            return $country;
        }
        return false;
    }

    public function delete_country( $conId ) {
      $result = $this->db->delete($this->_table_name, array('id'=>$conId));
      return $result;
    }

    public function get_count_country() {
        $this->db->from($this->_table_name);
        return $this->db->count_all_results();
    }
}
