<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Subcategory_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }
    
 
    public function getcategory_name(){
        $this->db->select('category_name');
        $this->db->from('categories');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    
 
   // Insert SubCategory
   public function subcategory_data_insert($table_name, $data) 
   {
       return $this->db->insert($table_name, $data);
   }


   

   public function subcategory_get_edit($subcategory_id) 
   {
       $this->db->select('*');
       $this->db->from('subcategories');
       $this->db->where('id', $subcategory_id);
       $query = $this->db->get();
       return $query->result_array();
   }


   

    // Update subCategory
    public function subcategory_data_update($table_name, $subcategory_id, $data){
        if (empty($subcategory_id)) {
            return FALSE; 
        }
        $this->db->where('id', $subcategory_id);
        $this->db->update($table_name, $data);
        return $subcategory_id;

    }

 
    public function subcategory_data_delete($table_name, $subcategory_id, $data){
        if (empty($subcategory_id)) {
            return FALSE; 
        }
        $this->db->where('id', $subcategory_id);
        $this->db->update($table_name, $data);
        return $subcategory_id;
    }

     
 

 // Get All Categories
 public function getsubcategory_data($subname='', $subcategory_id=''){
    $this->db->select('*');
    $this->db->from('subcategories');
    if ($subname != '') {
        $this->db->where('subcategory_name', $subname);
    }
    if($subcategory_id !=""){
        $this->db->where('id !=', $subcategory_id);
    }
    $this->db->where('is_deleted', 0);
    $this->db->where('is_active', 1); 
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}

 
}