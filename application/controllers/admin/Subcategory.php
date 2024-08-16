<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/subcategory_model');
	}
     

    public function subcategory_index()
	{   
         
        $getsubcategory_data    = $this->subcategory_model->getsubcategory_data();

        $data = array(
            'page_title' => 'Sub Pages',
            'getsubcategory_data'   => $getsubcategory_data

        );
 		$this->load->view('admin/subcategory/index', $data);
	}
      

    
    public function add_subcategory()
	{   
        $subcategoryname    = $this->subcategory_model->getcategory_name();
        $data = array(
            'page_title' => 'Add Sub Pages',
             'categoryname'   => $subcategoryname
        );
 		$this->load->view('admin/subcategory/add', $data);
	}


    

    public function create_subcategory()
    {
        $this->form_validation->set_rules('category_name', 'Page Name', 'required|trim');
        $this->form_validation->set_rules('subcategory_name', 'Sub Pages Name', 'required|trim');
        $this->form_validation->set_rules('is_active', 'SSub Pages Status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');
        $response = array();
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = 'failure';
            $response['msg'] = validation_errors();
        } else {
            $catname = $this->input->post('category_name');
            $subname = $this->input->post('subcategory_name');
            $existing_category = $this->subcategory_model->getsubcategory_data($subname);
            if ($existing_category) {
                $response['status'] = 'failure';
                $response['msg'] = '<p>Sub Pages name already exists.</p>';
            } else {
                $slug = url_title($subname, 'dash', TRUE);
                $isactive = $this->input->post('is_active');
                $data = array(
                    'category_id' => $catname,
                    'subcategory_name' => $subname,
                    'subcategory_slug' => $slug,
                    'is_active' => $isactive,
                );
                $result = $this->subcategory_model->subcategory_data_insert('subcategories', $data);
                if ($result) {
                    $response['status'] = 'success';
                    $response['msg'] = 'Sub Pages has been added successfully';
                } else {
                    $response['status'] = 'failure';
                    $response['msg'] = '<p>Something happened</p>';
                }
            }
        }
        echo json_encode($response);
    }
    
    public function subcategory_data_edit( )
	{   
        $subcategory_id = $this->input->get('id');
        $subcategorydata = $this->subcategory_model->subcategory_get_edit($subcategory_id);
        $subcategoryname    = $this->subcategory_model->getcategory_name();

        $data = array(
            'page_title' => 'Edit Sub Pages',
            'getsubcategory'   => $subcategorydata,
            'categoryname'   => $subcategoryname

        );
		$this->load->view('admin/subcategory/edit', $data);
	}

    
 
    public function deletesubCategories()
	{
	   $subcategory_id = $this->input->post('id');
       $data = array('is_deleted' => 1);
	   $result = $this->subcategory_model->subcategory_data_delete('subcategories', $subcategory_id, $data);
	   if ($result) {
	      $response = array(
	         'success' => true,
	         'message' => 'Sub Pages deleted successfully.'
	      );
	   } else {
	      $response = array(
	         'success' => false,
	         'message' => 'Failed Sub Pages as deleted.'
	      );
	   }
	   echo json_encode($response);
	}







    public function subcategory_data_update()
    {
        $this->form_validation->set_rules('category_name', 'Page Name', 'required|trim');
        $this->form_validation->set_rules('subcategory_name', 'Sub Pages Name', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Sub Pages Status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');
        $response = array();
    
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = 'failure';
            $response['msg'] = validation_errors();
        } else {
            $catname = $this->input->post('category_name');
            $subname = $this->input->post('subcategory_name');
            $subcategory_id = $this->input->post('id');
            $isactive = $this->input->post('is_active');
    
            $existing_category = $this->subcategory_model->getsubcategory_data($subname, $subcategory_id);
            if ($existing_category) {
                $response['status'] = 'failure';
                $response['msg'] = '<p>Sub Pages name already exists.</p>';
            } else {
                $slug = url_title($subname, 'dash', TRUE);
                $data = array(
                    'category_id' => $catname,
                    'subcategory_name' => $subname,
                    'subcategory_slug' => $slug,
                    'is_active' => $isactive,
                );
    
                $result = $this->subcategory_model->subcategory_data_update('subcategories', $subcategory_id, $data);
    
                if ($result) {
                    $response['status'] = 'success';
                    $response['msg'] = 'Sub Pages has been updated successfully';
                } else {
                    $db_error = $this->db->error(); // Log the error
                    $response['status'] = 'failure';
                    $response['msg'] = '<p>Something went wrong: ' . $db_error['message'] . '</p>';
                }
            }
        }
        echo json_encode($response);
    }
    



}  