<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Page_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }
    


    public function getcategory_data(){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function getsubcategory_data(){
        $this->db->select('*');
        $this->db->from('subcategories');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    
   
    public function insertpages($table_name, $data) 
    {
        return $this->db->insert($table_name, $data);
    }

    
    public function getpages_data(){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    

    public function update_page($pageid, $data, $table_name) {
        $this->db->where('id', $pageid);
        return  $this->db->update($table_name, $data);
     }
}