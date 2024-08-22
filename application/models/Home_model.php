<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }
    public function getPages(){
        $this->db->select('id,category_name,category_slug');
        $this->db->from('categories');
        $this->db->where('is_active',1);
        $this->db->where('is_deleted',0);
        $this->db->order_by('order_val','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    public function getSubPages(){
        $this->db->select('id,category_id,subcategory_name,subcategory_slug');
        $this->db->from('subcategories');
        $this->db->where('is_active',1);
        $this->db->where('is_deleted',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    public function settingData(){
        $this->db->select('*');
        $this->db->from('settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


   public function wallart(){
        $this->db->select('content');
        $this->db->from('pages');
        $this->db->where('is_active',1);
         $this->db->where('category_name',12);
        $this->db->where('subcategory_name',13);
        $this->db->where('is_deleted',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

 


}