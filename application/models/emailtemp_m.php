<?php
class emailtemp_m extends CI_Model {

    protected $_table_name = 'contactus_email_template';
    var $details;

    function  create_new_page( $userData ) {

        $data['title'] 	= $userData['title'];
        $data['slug'] 	= $userData['slug'];
        $data['order'] 	= $userData['order'];
        $data['body'] 	= $userData['body'];

        $data['parent_id']= $userData['parent_id'];
        $data['template'] = $userData['template'];
        $data['isActive'] = "1";

        $data['dateCreated'] = date('Y-m-d H:i:s',time());

        return $this->db->insert($this->_table_name, $data);
    }

    public function update_status( $pageId, $status ) {
      $data = array('isActive'=>$status);
      $result = $this->db->update($this->_table_name, $data, array('id'=>$pageId));
      return $result;
    }

    public function get_all_pages( $num_posts = 10, $start ) {
        // start building a query
        $this->db->from($this->_table_name);

        $this->db->limit( $num_posts, $start );
        $this->db->order_by('tempId','desc');

        $templates = $this->db->get()->result_array();

        if( is_array($templates) && count($templates) > 0 ) {
            return $templates;
        }
        return false;
    }

    public function delete_page( $tempId ) {
      $result = $this->db->delete($this->_table_name, array('tempId'=>$tempId));
      return $result;
    }

    public function get_count_for_temp() {
        $this->db->from($this->_table_name);
        return $this->db->count_all_results();
    }
}
