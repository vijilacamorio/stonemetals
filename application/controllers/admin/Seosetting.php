<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Seosetting extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/seosetting_model');
        $this->load->model('admin/subcategory_model');

	}
     
    
    public function seosetting_index()
	{   

        $get_data = $this->seosetting_model->getseosetting_data();
        $data = array(
            'page_title' => 'Seo Setting',
            'seo'        => $get_data 
         );
  		$this->load->view('admin/seosetting/index', $data);
	}
 


   public function add_seosetting(){   

        $categorydata = $this->seosetting_model->getcategory_data();
        $data = array(
            'page_title' => 'Add Seo Setting',
            'categoryname'   => $categorydata
        );
         $this->load->view('admin/seosetting/add', $data);
    }
      




    public function create_seosetting()
    {
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');
        $response = array();
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = 'failure';
            $response['msg'] = validation_errors();
        } else {
            $category_name = $this->input->post('category_name');
            $meta_title = $this->input->post('meta_title');
            $meta_description = $this->input->post('meta_description');
            $meta_keywords = $this->input->post('meta_keywords');
            $is_active = $this->input->post('is_active');
            $data = array(
                'category_name' => $category_name,
                'meta_title' => $meta_title,
                'meta_description' => $meta_description,
                'meta_keywords' => $meta_keywords,
                'is_active' => $is_active,
            );
            $result = $this->seosetting_model->seosetting_data_insert('seosetting', $data);
            if ($result) {
                $response['status'] = 'success';
                $response['msg'] = 'SEO setting has been added successfully';
            } else {
                $response['status'] = 'failure';
                $response['msg'] = '<p>Something went wrong. Please try again.</p>';
            }
        }
        echo json_encode($response);
    }
    



     

    public function seosetting_data_edit(){   

        $id = $_GET['id'];
        $seosetting = $this->seosetting_model->get_dataforedit($id);
        $subcategoryname    = $this->subcategory_model->getcategory_name();


        $data = array(
            'page_title' => 'Edit Seo Setting',
            'data_seosetting'   => $seosetting,
            'categoryname'   => $subcategoryname

        );
         $this->load->view('admin/seosetting/edit', $data);
    }


    



    public function edit_seosetting()
    {
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');
        $response = array();
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = 'failure';
            $response['msg'] = validation_errors();
        } else {

            $seoid = $this->input->post('id');
            $category_name = $this->input->post('category_name');
            $meta_title = $this->input->post('meta_title');
            $meta_description = $this->input->post('meta_description');
            $meta_keywords = $this->input->post('meta_keywords');
            $is_active = $this->input->post('is_active');
            $data = array(
                'category_name' => $category_name,
                'meta_title' => $meta_title,
                'meta_description' => $meta_description,
                'meta_keywords' => $meta_keywords,
                'is_active' => $is_active,
            ); 
            $result = $this->seosetting_model->seosetting_data_update('seosetting',$seoid, $data);
            if ($result) {
                $response['status'] = 'success';
                $response['msg'] = 'SEO setting has been Updated successfully';
            } else {
                $response['status'] = 'failure';
                $response['msg'] = '<p>Something went wrong. Please try again.</p>';
            }
        }
        echo json_encode($response);
    }
    


    
 

    public function deleteSeosetting()
	{
	   $seosetting_id = $this->input->post('id');
       $data = array('is_deleted' => 1);
	   $result = $this->seosetting_model->seosetting_data_delete('seosetting', $seosetting_id, $data);
	   if ($result) {
	      $response = array(
	         'success' => true,
	         'message' => 'Seosetting deleted successfully.'
	      );
	   } else {
	      $response = array(
	         'success' => false,
	         'message' => 'Failed Seosetting as deleted.'
	      );
	   }
	   echo json_encode($response);
	}


}