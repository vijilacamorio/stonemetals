<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/gallery_model');
		
		if (!$this->session->userdata('admin_id')) {
			// If user is not logged in, redirect to login page
			redirect('admin');
		}
	}
     
    public function index()
	{   
        
        $gdata = $this->gallery_model->getAllGallery();

        $data = array(
            'page_title' => 'Gallery',
            'gallerydata'   => $gdata

         );
 		$this->load->view('admin/gallery/index', $data);
	}




	public function add()
	{   
        $data = array('page_title' => 'Add Gallery');
		$this->load->view('admin/gallery/add', $data);
	}
    
    


	public function createGallery()
	{
	    // Set validation rules
	    $this->form_validation->set_rules('gallery_name', 'Title', 'required|trim');
	    $this->form_validation->set_rules('gallery_content', 'Content', 'required|trim');
	    $this->form_validation->set_rules('is_active', 'Banner Status', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg']    = validation_errors();
	    } else {
	        $title = $this->input->post('gallery_name');
	        $gallery_content = $this->input->post('gallery_content');
	        $is_active = $this->input->post('is_active');

	        // Upload the image with specified width and height
	        $image_upload = bannerImageUpload('gallery_image', GALLERY_IMG_PATH, GALLERY_IMG_WIDTH, GALLERY_IMG_HEIGHT);

	        if ($image_upload['error']) {
	            $response['status'] = 'failure';
	            $response['msg']    = $image_upload['error'];
	        } else {
	            $uploaded_image_path = GALLERY_IMG_PATH . $image_upload['image_metadata']['file_name'];
	            list($width, $height) = getimagesize($uploaded_image_path);

	            if ($width > GALLERY_IMG_WIDTH || $height > GALLERY_IMG_HEIGHT) {
	                unlink($uploaded_image_path);
	                $response['status'] = 'failure';
	                $response['msg']    = 'The image width and height should be '.GALLERY_IMG_WIDTH.'*'.GALLERY_IMG_HEIGHT;
	            } else {
	                $data = array(
	                    'gallery_name' => $title,
	                    'gallery_content' => $gallery_content,
	                    'gallery_image' => $image_upload['image_metadata']['file_name'],
						'created_date'	=> date('Y-m-d H:i:s'),
	                    'is_active' => $is_active
	                );

	                $result = $this->gallery_model->insertGallery($data);

	                if ($result) {
	                    $response['status'] = 'success';
	                    $response['msg']    = 'Gallery has been added successfully';
	                } else {
	                    $response['status'] = 'failure';
	                    $response['msg']    = 'Failed to add gallery. Please try again.';
	                }
	            }
	        }
	    }

	    echo json_encode($response);
	}



 	public function editGallery($id=null)
	{
 
      $id = $_GET['id'];
      $get_bannerdata = $this->gallery_model->get_banner($id);
      $data = array(
         'page_title' => 'Edit Gallery',
         'getBanners' => $get_bannerdata
    	);
		$this->load->view('admin/gallery/edit', $data);
	}





public function updateGallery()
	{
 	    $this->form_validation->set_rules('gallery_name', 'Title', 'required|trim');
	    $this->form_validation->set_rules('gallery_content', 'Content', 'required|trim');
	    $this->form_validation->set_rules('is_active', 'Banner Status', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg']    = validation_errors();
	    } else {
	    	$gallery_id = $this->input->post('gallery_id');
	        $title = $this->input->post('gallery_name');
	        $gallery_content = $this->input->post('gallery_content');
	        $is_active = $this->input->post('is_active');
			$data = array(
	            'gallery_name' 		=> $title,
	            'gallery_content' 	=> $gallery_content,
	            'is_active' 		=> $is_active,
				'modified_by' 		=> $this->session->userdata('admin_id')
	        );
			if (!empty($_FILES['gallery_image']['name'])) {
	            $image_upload = bannerImageUpload('gallery_image', GALLERY_IMG_PATH, GALLERY_IMG_WIDTH, GALLERY_IMG_HEIGHT);
	            if ($image_upload['error']) {
	                $response['status'] = 'failure';
	                $response['msg']    = $image_upload['error'];
	                echo json_encode($response);
	                return;
	            }
	            $uploaded_image_path = GALLERY_IMG_PATH . $image_upload['image_metadata']['file_name'];
	            list($width, $height) = getimagesize($uploaded_image_path);
	            if ($width > GALLERY_IMG_WIDTH || $height > GALLERY_IMG_HEIGHT) {
	                unlink($uploaded_image_path);
	                $response['status'] = 'failure';
	                $response['msg']    = 'The image width and height should be ' . GALLERY_IMG_WIDTH . '*' . GALLERY_IMG_HEIGHT;
	                echo json_encode($response);
	                return;
	            }else{
					unlink(base_url().GALLERY_IMG_PATH.$this->input->post('old_bannerimage'));
				}
	            $image_name = $image_upload['image_metadata']['file_name'];
				$data['gallery_image'] = $image_name;
	        }

	        

	        $result = $this->gallery_model->updateGallery($gallery_id, $data);

	        if ($result) {
	            $response['status'] = 'success';
	            $response['msg']    = 'Gallery has been updated successfully';
	        } else {
	            $response['status'] = 'failure';
	            $response['msg']    = 'Failed to add gallery. Please try again.';
	        }
	    }

	    echo json_encode($response);
	}




   

	public function deleteBanner()
	{
	  $bannerid = $this->input->post('id');
      $data = array('is_deleted' => 1);
	   $result = $this->gallery_model->update_homebanners($bannerid, $data, 'banner_images');
	   if ($result) {
	      $response = array(
	         'success' => true,
	         'message' => 'Banner deleted successfully.'
	      );
	   } else {
	      $response = array(
	         'success' => false,
	         'message' => 'Failed banner as deleted.'
	      );
	   }

	   echo json_encode($response);
	}






}