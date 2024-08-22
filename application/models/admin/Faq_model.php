<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }
    public function insertFaq($data)
    { 
        return $this->db->insert('faq', $data);
    }
 
     

    public function getAllFaq() 
    {
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('is_deleted',0);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function getFaq($id) {
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    public function updateFaq($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('faq', $data);
    }
}