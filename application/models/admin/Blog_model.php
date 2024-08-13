<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Blog_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }
 

    public function insertBlogs($data)
    { 
      // return
       $this->db->insert('blog', $data);
    
       echo $this->db->last_query(); die();

    }

 


} ?>