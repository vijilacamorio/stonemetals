<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }
 
    
    public function getContacts($recent='')
    { 
      $this->db->select('*');
      $this->db->from('contactus');
      $this->db->order_by('created_date', 'DESC');
      if($recent !=""){
        $this->db->limit('5');
      }
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          return $query->result_array();
      }
    }
}