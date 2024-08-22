<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/contact_model');
		
		if (!$this->session->userdata('admin_id')) {
			redirect('admin');
		}
	}
     
    public function index()
	{   
        
        $contactdata = $this->contact_model->getContacts();

        $data = array(
            'page_title' => 'Contacts',
            'condata'   => $contactdata

         );
 		$this->load->view('admin/contacts/index', $data);
	}
}