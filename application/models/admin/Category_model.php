<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Category_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }
    
    // Get All Categories
    public function getcategory_data($name='', $category_id=''){
        $this->db->select('*');
        $this->db->from('categories');
        if ($name != '') {
            $this->db->where('category_name', $name);
        }
        if($category_id !=""){
            $this->db->where('id !=', $category_id);
        }
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    // Insert Category
    public function category_data_insert($table_name, $data) 
    {
        return $this->db->insert($table_name, $data);
    }


    // Update Category
     public function category_data_update($table_name, $category_id, $data){
        if (empty($category_id)) {
            return FALSE; 
        }
        $this->db->where('id', $category_id);
        $this->db->update($table_name, $data);
        return $category_id;
    }

     

    
    public function category_get_edit($category_id) 
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id', $category_id);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function category_data_delete($id)
    {
        if (empty($id) || !is_numeric($id)) {
            return FALSE;
        }
        $data = array(
            'is_deleted' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
        return $this->db->affected_rows() > 0;
    }
    



}