<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/faq_model');
		
		if (!$this->session->userdata('admin_id')) {
			redirect('admin');
		}
	}
     
    public function index()
	{   
        
        $gdata = $this->faq_model->getAllFaq();

        $data = array(
            'page_title' => 'Faq',
            'faqdata'   => $gdata

         );
 		$this->load->view('admin/faq/index', $data);
	}




	public function add()
	{   
        $data = array('page_title' => 'Add Faq');
		$this->load->view('admin/faq/add', $data);
	}
    
    


	public function createFaq()
	{
	    // Set validation rules
	    $this->form_validation->set_rules('faq_title', 'Title', 'required|trim');
	    $this->form_validation->set_rules('faq_answer', 'Content', 'required|trim');
	    $this->form_validation->set_rules('is_active', 'Status', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg']    = validation_errors();
	    } else {
	        $title = $this->input->post('faq_title');
	        $faq_answer = $this->input->post('faq_answer');
	        $is_active = $this->input->post('is_active');
            $data = array(
	            'faq_title' 		=> $title,
	            'faq_answer' 	    => $faq_answer,
	            'is_active' 		=> $is_active,
                'created_date'      => date('Y-m-d H:i:s'),
				'created_by' 		=> $this->session->userdata('admin_id')
	        );
            $result = $this->faq_model->insertFaq($data);
            if ($result) {
                $response['status'] = 'success';
                $response['msg']    = 'Faq has been added successfully';
            } else {
                $response['status'] = 'failure';
                $response['msg']    = 'Failed to add faq. Please try again.';
            }

	    }

	    echo json_encode($response);
	}



 	public function editFaq($id=null)
	{
 
      $id = $_GET['id'];
      $get_faq = $this->faq_model->getFaq($id);
      $data = array(
         'page_title' => 'Edit Faq',
         'faqedit' => $get_faq
    	);
		$this->load->view('admin/faq/edit', $data);
	}





public function updateFaq()
	{
 	    $this->form_validation->set_rules('faq_title', 'Title', 'required|trim');
	    $this->form_validation->set_rules('faq_answer', 'Answer', 'required|trim');
	    $this->form_validation->set_rules('is_active', 'Status', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg']    = validation_errors();
	    } else {
	    	$gallery_id = $this->input->post('gallery_id');
	        $title = $this->input->post('faq_title');
	        $faq_answer = $this->input->post('faq_answer');
	        $is_active = $this->input->post('is_active');
			$data = array(
	            'faq_title' 		=> $title,
	            'faq_answer' 	=> $faq_answer,
	            'is_active' 		=> $is_active,
				'modified_by' 		=> $this->session->userdata('admin_id')
	        );
			

	        

	        $result = $this->faq_model->updateFaq($gallery_id, $data);

	        if ($result) {
	            $response['status'] = 'success';
	            $response['msg']    = 'Faq has been updated successfully';
	        } else {
	            $response['status'] = 'failure';
	            $response['msg']    = 'Failed to add Faq. Please try again.';
	        }
	    }

	    echo json_encode($response);
	}




   

	public function deleteFaq()
	{
	  $id = $this->input->post('id');
      $data = array('is_deleted' => 1);
	   $result = $this->faq_model->updateFaq($id, $data);
	   if ($result) {
	      $response = array(
	         'success' => true,
	         'message' => 'Faq has been deleted successfully.'
	      );
	   } else {
	      $response = array(
	         'success' => false,
	         'message' => 'Failed to delete the faq'
	      );
	   }

	   echo json_encode($response);
	}






}