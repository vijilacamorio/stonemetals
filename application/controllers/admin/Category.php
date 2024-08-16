<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/category_model');
	}
     
    public function category_index()
	{   
        $categorydata = $this->category_model->getcategory_data();
        $data = array(
            'page_title' => 'Pages',
            'categorydata'   => $categorydata
        );
 		$this->load->view('admin/category/index', $data);
	}
      
	public function add_category()
	{   
        $data = array('page_title' => 'Add Page');
		$this->load->view('admin/category/add', $data);
	}

    public function create_category()
	{
 	   $this->form_validation->set_rules('category_name', 'Page Name', 'required|trim');
	   $this->form_validation->set_rules('is_active', 'Page Status', 'required');
	   $this->form_validation->set_error_delimiters('', '<br/>');
		$response = array();
	    if ($this->form_validation->run() == FALSE) {
			$response['status'] = 'failure';
			$response['msg']	= validation_errors();
	    } else {
	       $name = $this->input->post('category_name');
			$existing_category = $this->category_model->getcategory_data($name);
			if ($existing_category) {
	            
	            $response['status'] = 'failure';
				$response['msg']	= '<p>Page name already exists.</p>';
	        } else {
				$slug = url_title($name, 'dash', TRUE);
				$isactive = $this->input->post('is_active');
	            $data = array(
	                'category_name' => $name,
	                'category_slug' => $slug,
	                'is_active' => $isactive,
	            );

	            $result = $this->category_model->category_data_insert('categories', $data);

	            if ($result) {
					$response['status'] = 'success';
					$response['msg'] 	= 'Page has been added successfully';
	            } else {
					$response['status'] = 'failure';
					$response['msg']	= '<p>Something happened</p>';
	            }
	        }
	   }
	   echo json_encode($response);
	}


     
    
    public function category_data_edit( )
	{   
        $category_id = $this->input->get('id');
        $categorydata = $this->category_model->category_get_edit($category_id);
        $data = array(
            'page_title' => 'Edit Page',
            'getCategory'   => $categorydata
        );
		$this->load->view('admin/category/edit', $data);
	}


 
     
    public function category_data_update()
    {
         $this->form_validation->set_rules('category_name', 'Page Name', 'required|trim');
         $this->form_validation->set_rules('is_active', 'Page Status', 'required');
         $this->form_validation->set_error_delimiters('', '<br/>');
         $response = array();
         if ($this->form_validation->run() == FALSE) {
            $response['status'] = 'failure';
            $response['msg'] = validation_errors();
         } else {
            $name = $this->input->post('category_name');
            $category_id = $this->input->post('id');
            $isactive = $this->input->post('is_active');
            $existing_category = $this->category_model->getcategory_data($name, $category_id);
            if ($existing_category) {
                $response['status'] = 'failure';
                $response['msg'] = '<p>Page name already exists.</p>';
            } else {
                $slug = url_title($name, 'dash', TRUE);
                $data = array(
                    'category_name' => $name,
                    'category_slug' => $slug,
                    'is_active' => $isactive,
                );
                $result = $this->category_model->category_data_update('categories', $category_id, $data);

                if ($result) {
                    $response['status'] = 'success';
                    $response['msg'] = 'Page has been updated successfully';
                } else {
                    $response['status'] = 'failure';
                    $response['msg'] = '<p>Something went wrong.</p>';
                }
            }
        }
            echo json_encode($response);
    }



    
  
    public function deleteCategories()
	{
	   $category_id = $this->input->post('id');
       $data = array('is_deleted' => 1);
	   $result = $this->category_model->category_data_update('categories', $category_id, $data);
	   if ($result) {
	      $response = array(
	         'success' => true,
	         'message' => 'Page deleted successfully.'
	      );
	   } else {
	      $response = array(
	         'success' => false,
	         'message' => 'Failed Page as deleted.'
	      );
	   }

	   echo json_encode($response);
	}


 
}
