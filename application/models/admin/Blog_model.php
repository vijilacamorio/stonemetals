<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }
 

    public function insertBlogs($data)
    { 
      return $this->db->insert('blog', $data);

    }

    
    public function get_dataforindex()
    { 
      $this->db->select('*');
      $this->db->from('blog');
      $this->db->where('is_deleted', 0);
      $this->db->where('is_active', 1); 
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          return $query->result_array();
      }
    }

     
    
    public function blog_get_edit($blog_id)
    { 
      $this->db->select('*');
      $this->db->from('blog');
      $this->db->where('id', $blog_id); 
      $this->db->where('is_deleted', 0);
      $this->db->where('is_active', 1); 
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          return $query->result_array();
      }
    }

    public function update_blogs($blogid, $data, $table_name) {
      $this->db->where('id', $blogid);
      return  $this->db->update($table_name, $data);
   }


   
} 