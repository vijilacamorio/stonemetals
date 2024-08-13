<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Banner_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }

 
    public function insertBanners($data)
    { 
        return $this->db->insert('banner_images', $data);
    }
 
     

    public function getbanner_data() 
    {
        $this->db->select('*');
        $this->db->from('banner_images');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_banner($id) {
        $this->db->select('*');
        $this->db->from('banner_images');
        $this->db->where('banner_id', $id);
        $this->db->where('is_deleted', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    public function update_homebanners($bannerid, $data, $table_name) {
        $this->db->where('banner_id', $bannerid);
        return $this->db->update($table_name, $data);
    }




}