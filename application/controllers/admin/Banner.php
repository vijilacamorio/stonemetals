<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/banner_model');
		
		if (!$this->session->userdata('admin_id')) {
			// If user is not logged in, redirect to login page
			redirect('admin');
		}
	}
     
    public function index()
	{   
        
        $bannerdata = $this->banner_model->getbanner_data();

        $data = array(
            'page_title' => 'Banner',
            'bannerdata'   => $bannerdata

         );
 		$this->load->view('admin/banner/index', $data);
	}




	public function add()
	{   
        $data = array('page_title' => 'Add Banner');
		$this->load->view('admin/banner/add', $data);
	}
    
    


	public function create_banner()
	{
	    // Set validation rules
	    $this->form_validation->set_rules('banner_title', 'Title', 'required|trim');
	    $this->form_validation->set_rules('sub_title', 'Subtitle', 'required|trim');
	    $this->form_validation->set_rules('banner_content', 'Content', 'required|trim');
	    // $this->form_validation->set_rules('button_url', 'Url', 'required|trim|valid_url');
	    $this->form_validation->set_rules('is_active', 'Banner Status', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg']    = validation_errors();
	    } else {
	        $title = $this->input->post('banner_title');
	        $subtitle = $this->input->post('sub_title');
	        $banner_content = $this->input->post('banner_content');
	        $url = $this->input->post('button_url');
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
	                    'banner_title' => $title,
	                    'sub_title' => $subtitle,
	                    'banner_content' => $banner_content,
	                    'button_url' => $url,
	                    'images' => $image_upload['image_metadata']['file_name'],
	                    'is_active' => $is_active
	                );

	                $result = $this->banner_model->insertBanners($data);

	                if ($result) {
	                    $response['status'] = 'success';
	                    $response['msg']    = 'Banner has been added successfully';
	                } else {
	                    $response['status'] = 'failure';
	                    $response['msg']    = 'Failed to add banner. Please try again.';
	                }
	            }
	        }
	    }

	    echo json_encode($response);
	}



 	public function editBanners($id=null)
	{
 
      $id = $_GET['id'];
      $get_bannerdata = $this->banner_model->get_banner($id);
      $data = array(
         'page_title' => 'Edit Banners',
         'getBanners' => $get_bannerdata
    	);
		$this->load->view('admin/banner/edit', $data);
	}





public function updateBanners()
	{
 	    $this->form_validation->set_rules('banner_title', 'Title', 'required|trim');
	    $this->form_validation->set_rules('sub_title', 'Subtitle', 'required|trim');
	    // $this->form_validation->set_rules('banner_content', 'Content', 'required|trim');
	    $this->form_validation->set_rules('button_url', 'Url', 'required|trim|valid_url');
	    $this->form_validation->set_rules('is_active', 'Banner Status', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg']    = validation_errors();
	    } else {
	    	$bannerid = $this->input->post('bannerId');
	        $title = $this->input->post('banner_title');
	        $subtitle = $this->input->post('sub_title');
	        $banner_content = $this->input->post('banner_content');
	        $url = $this->input->post('button_url');
	        $is_active = $this->input->post('is_active');
	        $image_name = $this->input->post('old_bannerimage'); 
	     
			if (!empty($_FILES['images']['name'])) {
	            $image_upload = bannerImageUpload('images', BANNER_IMG_PATH, BANNER_IMG_WIDTH, BANNER_IMG_HEIGHT);
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
	            'banner_title' => $title,
	            'sub_title' => $subtitle,
	            'banner_content' => $banner_content,
	            'button_url' => $url,
	            'images' => $image_name,
	            'is_active' => $is_active,
	        );

	        $result = $this->banner_model->update_homebanners($bannerid, $data, 'banner_images');

	        if ($result) {
	            $response['status'] = 'success';
	            $response['msg']    = 'Banner has been updated successfully';
	        } else {
	            $response['status'] = 'failure';
	            $response['msg']    = 'Failed to add banner. Please try again.';
	        }
	    }

	    echo json_encode($response);
	}




   

	public function deleteBanner()
	{
	  $bannerid = $this->input->post('id');
      $data = array('is_deleted' => 1);
	   $result = $this->banner_model->update_homebanners($bannerid, $data, 'banner_images');
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