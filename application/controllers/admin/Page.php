<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
         $this->load->model('admin/category_model');
         $this->load->model('admin/page_model');

	}
    
    public function page_index()
	{   
         $getpages_data = $this->page_model->getpages_data();
        $data = array(
            'page_title' => 'Page Content',
            'pages_data'   => $getpages_data
        );
 		$this->load->view('admin/page/index', $data);
	}


    public function page_create(){
        $get_category = $this->page_model->getcategory_data();
        $get_subcategory = $this->page_model->getsubcategory_data();
        $data = array(
            'page_title' => "Add Page Content",
            'categoryname' => $get_category,
            'subcategoryname' => $get_subcategory
        );
        $this->load->view('admin/page/add',$data);
    }



    public function create_pages()
	{
	    // Set validation rules
	    $this->form_validation->set_rules('category_name', 'Page', 'required|trim');
	    $this->form_validation->set_rules('subcategory_name', 'Sub Pages', 'required|trim');
	    $this->form_validation->set_rules('content', 'Content', 'required|trim');
	    $this->form_validation->set_rules('title', 'Title', 'required|trim');
	    $this->form_validation->set_rules('is_active', 'Banner Status', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg']    = validation_errors();
	    } else {
	        $category_name = $this->input->post('category_name');
	        $subcategory_name = $this->input->post('subcategory_name');
            $images = $this->input->post('images');
	        $content = $this->input->post('content');
	        $title = $this->input->post('title');
            $description = $this->input->post('description');
	        $keyword = $this->input->post('keyword');
	        $is_active = $this->input->post('is_active');

	        // Upload the image with specified width and height
	        $image_upload = bannerImageUpload('images', BANNER_IMG_PATH, BANNER_IMG_WIDTH, BANNER_IMG_HEIGHT);

	        if ($image_upload['error']) {
	            $response['status'] = 'failure';
	            $response['msg']    = $image_upload['error'];
	        } else {
	            $uploaded_image_path = BANNER_IMG_PATH . $image_upload['image_metadata']['file_name'];
	            list($width, $height) = getimagesize($uploaded_image_path);

	            if ($width != 1980 || $height != 1080) {
	                unlink($uploaded_image_path);
	                $response['status'] = 'failure';
	                $response['msg']    = 'The image width and height should be '.BANNER_IMG_WIDTH.'*'.BANNER_IMG_HEIGHT;
	            } else {
	                $data = array(
	                    'category_name' => $category_name,
	                    'subcategory_name' => $subcategory_name,
	                    'content' => $content,
	                    'meta_title' => $title,
                        'meta_description' => $description,
	                    'meta_keywords' => $keyword,
	                    'logo' => $image_upload['image_metadata']['file_name'],
	                    'is_active' => $is_active
	                );
 
                     $result = $this->page_model->insertpages('pages', $data);

	                if ($result) {
	                    $response['status'] = 'success';
	                    $response['msg']    = 'Pagecontent has been added successfully';
	                } else {
	                    $response['status'] = 'failure';
	                    $response['msg']    = 'Failed to add Pagecontent. Please try again.';
	                }
	            }
	        }
	    }

	    echo json_encode($response);
	}




    

    public function page_data_edit(){
        $getpages_data = $this->page_model->getpages_data();
         $data = array(
            'page_title' => "Edit Page Content",
            'page_data' => $getpages_data
        );
        $this->load->view('admin/page/edit',$data);
    }





    public function page_edit()
	{
	    // Set validation rules
        $this->form_validation->set_rules('category_name', 'Page', 'required|trim');
	    $this->form_validation->set_rules('subcategory_name', 'Sub Pages', 'required|trim');
	    $this->form_validation->set_rules('content', 'Content', 'required|trim');
	    $this->form_validation->set_rules('title', 'Title', 'required|trim');
	    $this->form_validation->set_rules('is_active', 'Banner Status', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg']    = validation_errors();
	    } else {

            $pageid = $this->input->post('pageid');
	    	$category_name = $this->input->post('category_name');
	        $subcategory_name = $this->input->post('subcategory_name');
            $images = $this->input->post('images');
	        $content = $this->input->post('content');
	        $title = $this->input->post('title');
            $description = $this->input->post('description');
	        $keyword = $this->input->post('keyword');
	        $is_active = $this->input->post('is_active');

	        $image_name = $this->input->post('old_image'); 

	        if (!empty($_FILES['images']['name'])) {
	            $image_upload = blogImageUpload('images', BANNER_IMG_PATH, BANNER_IMG_WIDTH, BANNER_IMG_HEIGHT);

	            if ($image_upload['error']) {
	                $response['status'] = 'failure';
	                $response['msg']    = $image_upload['error'];
	                echo json_encode($response);
	                return;
	            }

	            $uploaded_image_path = BANNER_IMG_PATH . $image_upload['image_metadata']['file_name'];
	            list($width, $height) = getimagesize($uploaded_image_path);

	            if ($width != BANNER_IMG_WIDTH || $height != BANNER_IMG_HEIGHT) {
	                unlink($uploaded_image_path);
	                $response['status'] = 'failure';
	                $response['msg']    = 'The image width and height should be ' . BANNER_IMG_WIDTH . '*' . BANNER_IMG_HEIGHT;
	                echo json_encode($response);
	                return;
	            }

	            $image_name = $image_upload['image_metadata']['file_name'];
	        }

	         $data = array(
              'category_name' => $category_name,
              'subcategory_name' => $subcategory_name,
              'content' => $content,
              'meta_title' => $title,
              'meta_description' => $description,
              'meta_keywords' => $keyword,
              'logo' => $image_upload['image_metadata']['file_name'],
              'is_active' => $is_active
            );

	        $result = $this->page_model->update_page($pageid, $data, 'pages');

	        if ($result) {
	            $response['status'] = 'success';
	            $response['msg']    = 'Page Content has been updated successfully';
	        } else {
	            $response['status'] = 'failure';
	            $response['msg']    = 'Failed to add Page Content. Please try again.';
	        }
	    }

	    echo json_encode($response);
	}













    public function deletepage()
	{
	   $pageid = $this->input->post('id');
       $data = array('is_deleted' => 1);
	   $result = $this->page_model->update_page($pageid, $data, 'pages');
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