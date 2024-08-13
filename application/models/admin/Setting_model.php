<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Setting_model extends CI_Model {

    public function __construct() {

        parent::__construct();
  
    }


    public function setting_get_index() 
    {
        $this->db->select('*');
        $this->db->from('settings');
        $query = $this->db->get();
        return $query->result_array();
    }

    
    public function editSettingsdata($id) 
    {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('setting_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function update_settings($setting_id, $data, $table_name) {
        $this->db->where('setting_id', $setting_id);
        return$this->db->update($table_name, $data);
 
    }

    

} ?>