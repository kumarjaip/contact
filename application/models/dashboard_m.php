<?php

class dashboard_m extends CI_Model {

  function save_contact( $body ) {

    $data['body'] = $body;
    $data['userId'] = $this->session->userdata('id');
    $data['datecreated'] = date('Y-m-d H:i:s',time());

    if ( $this->db->insert('contactus_list',$data) ) {
      return $data;
    } else {
      return false;
    }
  }

  function get_contacts_for_user( $user_id, $num_posts = 10 ) {

    $this->db->from('contactus_list');
    $this->db->where( array('userId'=>$user_id) );
    $this->db->limit( $num_posts );
    $this->db->order_by('dateupdate','desc');

    $contacts = $this->db->get()->result_array();

    if( is_array($contacts) && count($contacts) > 0 ) {
      return $contacts;
    }

    return false;
  }

  function get_all_contacts( $user_id, $num_posts = 10 ) {
    // start building a query
    $this->db->from('contactus_list');
    $this->db->join('users','contactus_list.userId=users.id');

    // restrict to teammates if not an admin
    $this->db->where('contactus_list.is_valid','1');

    $this->db->where_not_in('userId', array($user_id));
    $this->db->limit( $num_posts );
    $this->db->order_by('dateupdate','desc');

    $contacts = $this->db->get()->result_array();

    if( is_array($contacts) && count($contacts) > 0 ) {
      return $contacts;
    }

    return false;
  }

  function get_contact_count_for_user( $user_id ) {

    $this->db->from('contactus_list');
    $this->db->where( array('userId'=>$user_id) );

    return $this->db->count_all_results();
  }
}
