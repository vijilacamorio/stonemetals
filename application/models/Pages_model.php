<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pages_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function getPageContent($menu,$submenu=""){
        $this->db->select('pages.*');
        $this->db->from('categories');
        $this->db->join('pages','pages.category_name=categories.id');
        $this->db->where('category_slug',$menu);
        if($submenu!=""){
            $this->db->where('subcategory_name',$submenu);
        }
        $this->db->where('categories.is_active',1);
        $this->db->where('categories.is_deleted',0);
        $this->db->where('pages.is_active',1);
        $this->db->where('pages.is_deleted',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    public function contactus(){
        $this->db->select('email_address,mobile_number,location,facebook_url,instagram_url,linkedin_url');
        $this->db->from('settings');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_active', 1); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function insertcontacts($data)
    { 
      return $this->db->insert('contactus', $data);
    }
    
    public function get_galleries(){
        $this->db->select('gallery_name,gallery_content,gallery_image');
        $this->db->from('galleries');
         $this->db->where('is_active',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }



    public function get_faq(){
        $this->db->select('faq_answer, faq_title');
        $this->db->from('faq');
        $this->db->where('is_active', 1);
        $this->db->order_by('faq_title', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }  
    }
    


}