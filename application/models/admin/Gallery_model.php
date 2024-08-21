<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Gallery_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }

 
    public function insertGallery($data)
    { 
        return $this->db->insert('galleries', $data);
    }
 
     

    public function getAllGallery() 
    {
        $this->db->select('*');
        $this->db->from('galleries');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_banner($id) {
        $this->db->select('*');
        $this->db->from('galleries');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    public function updateGallery($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('galleries', $data);
    }




}