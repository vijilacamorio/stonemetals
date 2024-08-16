<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Seosetting_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }


    public function getcategory_data( ){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
         if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function seosetting_data_insert($table_name, $data) 
    {
        return $this->db->insert($table_name, $data);
    }
 



    public function seosetting_data_update($table_name, $seoid ,$data) 
    {
        if (empty($seoid)) {
            return FALSE; 
        }
        $this->db->where('id', $seoid);
        return $this->db->update($table_name,$data);
     }


    
    public function getseosetting_data( ){
        $this->db->select('*');
        $this->db->from('seosetting');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
         if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    
    public function get_dataforedit($id){
        $this->db->select('*');
        $this->db->from('seosetting');
        $this->db->where('id', $id);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
          if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }




    

    public function seosetting_data_delete($table_name, $seosetting_id, $data){
        if (empty($seosetting_id)) {
            return FALSE; 
        }
        $this->db->where('id', $seosetting_id);
        $this->db->update($table_name, $data);
        return $seosetting_id;
    }

}