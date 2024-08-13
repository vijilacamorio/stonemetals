<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/blog_model');
	}
     
    public function blog_index()
	{   
         $data = array(
            'page_title' => 'Blog',
         );
 		$this->load->view('admin/blog/index', $data);
	}


	public function add_blog()
	{   
        $data = array('page_title' => 'Blog');
		$this->load->view('admin/blog/add', $data);
	}



 
    // public function create_blog() {
    //      $this->form_validation->set_rules('title', 'Title', 'required|trim');
    //     $this->form_validation->set_rules('content', 'Content', 'required|trim');
    //     $this->form_validation->set_rules('is_active', 'Blog Status', 'required');
    //     $this->form_validation->set_error_delimiters('', '<br/>');
    //     $response = array();
    //     if ($this->form_validation->run() == FALSE) {
    //         $response['status'] = 'failure';
    //         $response['msg']    = validation_errors();
    //     } else {
    //         $title = $this->input->post('title');
    //         $slug = url_title($title, 'dash', TRUE);
    //         $content = $this->input->post('content');
    //         $meta_title = $this->input->post('meta_title');
    //         $meta_description = $this->input->post('meta_description');
    //         $meta_keywords = $this->input->post('meta_keywords');
    //         $isactive = $this->input->post('is_active');
    //         $image_upload = blogImageUpload('featured_image', BLOG_IMG_PATH, BLOG_IMG_WIDTH, BLOG_IMG_HEIGHT);       
    //                 if ($image_upload['error']) {
    //                     $response['status'] = 'failure';
    //                     $response['msg']    = $image_upload['error'];
    //                 } else {
    //                     $uploaded_image_path = BLOG_IMG_WIDTH . $image_upload['image_metadata']['file_name'];
    //                     list($width, $height) = getimagesize($uploaded_image_path);
    //                     if ($width != 1200 || $height != 700) {
    //                         unlink($uploaded_image_path);
    //                         $response['status'] = 'failure';
    //                         $response['msg']    = 'The image width and height should be '.BLOG_IMG_WIDTH.'*'.BLOG_IMG_HEIGHT;
    //                     } else {
    //                 $data = array(
    //                     'title' => $title,
    //                     'slug' => $slug,
    //                     'content' => $content,
    //                     'featured_image' => $image_upload['image_metadata']['file_name'],
    //                     'meta_title' => $meta_title,
    //                     'meta_description' => $meta_description,
    //                     'meta_keywords' => $meta_keywords,
    //                     'is_active' => $isactive
    //                 );
    //                 $result = $this->blog_model->insertBlogs($data);
    //                 if ($result) {
    //                     $response['status'] = 'success';
    //                     $response['msg']    = 'Blog has been added successfully';
    //                 } else {
    //                     $response['status'] = 'failure';
    //                     $response['msg']    = 'Failed to add blog. Please try again.';
    //                 }
    //             }
    //         }
    //     }
    //     echo json_encode($response);
    // }

    

    public function create_blog() {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('content', 'Content', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Blog Status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');
    
        $response = array();
        
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = 'failure';
            $response['msg']    = validation_errors();
        } else {
            $title = $this->input->post('title');
            $slug = url_title($title, 'dash', TRUE);
            $content = $this->input->post('content');
            $meta_title = $this->input->post('meta_title');
            $meta_description = $this->input->post('meta_description');
            $meta_keywords = $this->input->post('meta_keywords');
            $is_active = $this->input->post('is_active');
    
            // Image upload
            $image_upload = blogImageUpload('featured_image', BLOG_IMG_PATH, BLOG_IMG_WIDTH, BLOG_IMG_HEIGHT);
    
            if ($image_upload['error']) {
                $response['status'] = 'failure';
                $response['msg']    = $image_upload['error'];
            } else {
                $uploaded_image_path = BLOG_IMG_PATH . $image_upload['image_metadata']['file_name']; // Corrected path
                list($width, $height) = getimagesize($uploaded_image_path);
    
                if ($width != BLOG_IMG_WIDTH || $height != BLOG_IMG_HEIGHT) {
                    unlink($uploaded_image_path);
                    $response['status'] = 'failure';
                    $response['msg']    = 'The image dimensions should be ' . BLOG_IMG_WIDTH . 'x' . BLOG_IMG_HEIGHT . ' pixels.';
                } else {
                    // Prepare data for insertion
                    $data = array(
                        'title' => $title,
                        'slug' => $slug,
                        'content' => $content,
                        'featured_image' => $image_upload['image_metadata']['file_name'],
                        'meta_title' => $meta_title,
                        'meta_description' => $meta_description,
                        'meta_keywords' => $meta_keywords,
                        'is_active' => $is_active
                    );
    
                    // Insert blog data
                    $result = $this->blog_model->insertBlogs($data);
                    if ($result) {
                        $response['status'] = 'success';
                        $response['msg']    = 'Blog has been added successfully';
                    } else {
                        $response['status'] = 'failure';
                        $response['msg']    = 'Failed to add blog. Please try again.';
                    }
                }
            }
        }
    
        echo json_encode($response);
    }
    



}
      