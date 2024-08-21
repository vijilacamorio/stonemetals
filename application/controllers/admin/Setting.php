<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/setting_model');
		if (!$this->session->userdata('admin_id')) {
			// If user is not logged in, redirect to login page
			redirect('admin');
		}
	}
     
     
    public function setting_index()
	{   
        $settingdata = $this->setting_model->setting_get_index();
        $data = array(
            'page_title' => 'Setting',
            'settingdata'   => $settingdata
        );
 		$this->load->view('admin/setting/index', $data);
	}
      

    // editSettings
    public function editSettings($id=null)
	{ 
      $fetchdata = $this->setting_model->editSettingsdata($id);
	    $data = array(
	      'page_title' => 'Edit Settings',
	      'settings' => $fetchdata
		);
 		$this->load->view('admin/setting/edit', $data);
	}


	public function updateSettings() 
	{  
		// print_r($_FILES); die;
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|trim');
		$this->form_validation->set_rules('location', 'Location', 'required|trim');
		$this->form_validation->set_rules('is_active', 'Setting Status', 'required');
		$this->form_validation->set_error_delimiters('', '<br/>');
		
		$response = array();
		
		if ($this->form_validation->run() == FALSE) {
			$response['status'] = 'failure';
			$response['msg']    = validation_errors();
		} else {
			$setting_id = $this->input->post('settingid');
			$email_address = $this->input->post('email_address');
			$mobile_number = $this->input->post('mobile_number');
			$location = $this->input->post('location');
			$facebook_url = $this->input->post('facebook_url');
			$instagram_url = $this->input->post('instagram_url');
			$linkedin_url = $this->input->post('linkedin_url');
			$is_active = $this->input->post('is_active');
			$image_name = $this->input->post('old_image');

			if (!empty($_FILES['logo']['name'])) {
	            $image_upload = logoImageUpload('logo', LOGO_IMG_PATH, LOGO_IMG_WIDTH, LOGO_IMG_HEIGHT);
	            if ($image_upload['error']) {
	                $response['status'] = 'failure';
	                $response['msg']    = $image_upload['error'];
	                echo json_encode($response);
	                return;
	            }
	            $uploaded_image_path = LOGO_IMG_PATH . $image_upload['image_metadata']['file_name'];
	            list($width, $height) = getimagesize($uploaded_image_path);
	            if ($width != LOGO_IMG_WIDTH || $height != LOGO_IMG_HEIGHT) {
	                unlink($uploaded_image_path);
	                $response['status'] = 'failure';
	                $response['msg']    = 'The image width and height should be ' . LOGO_IMG_WIDTH . '*' . LOGO_IMG_HEIGHT;
	                echo json_encode($response);
	                return;
	            }
	            $image_name = $image_upload['image_metadata']['file_name'];
	        }
	
			$data = array(
				'logo' => $image_name,
				'email_address' => $email_address,
				'mobile_number' => $mobile_number,
				'location' => $location,
				'facebook_url' => $facebook_url,
				'instagram_url' => $instagram_url,
				'linkedin_url' => $linkedin_url,
				'is_active' => $is_active,
			);
			
			$result = $this->setting_model->update_settings($setting_id, $data, 'settings');
			
			if ($result) {
				$response['status'] = 'success';
				$response['msg']    = 'Settings were updated successfully';
			} else {
				$response['status'] = 'failure';
				$response['msg']    = '<p>Something went wrong. Please try again.</p>';
			}
		}
		
		echo json_encode($response);
	}
	


    // public function updateSettings() 
	// {  
	//     $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
	//     $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|trim');
	//     $this->form_validation->set_rules('location', 'Location', 'required|trim');
	//     $this->form_validation->set_rules('is_active', 'Setting Status', 'required');
	//     $this->form_validation->set_error_delimiters('', '<br/>');
	    
	//     $response = array();
	    
	//     if ($this->form_validation->run() == FALSE) {
	//         $response['status'] = 'failure';
	//         $response['msg']    = validation_errors();
	//     } else {
	//         $setting_id = $this->input->post('settingid');
    //         $logo = $this->input->post('logo');
	//         $email_address = $this->input->post('email_address');
	//         $mobile_number = $this->input->post('mobile_number');
	//         $location = $this->input->post('location');
	//         $facebook_url = $this->input->post('facebook_url');
	//         $instagram_url = $this->input->post('instagram_url');
	//         $linkedin_url = $this->input->post('linkedin_url');
	//         $is_active = $this->input->post('is_active');
	       
 

	// 		if (!empty($_FILES['images']['name'])) {
	//             $image_upload = logoImageUpload('images', LOGO_IMG_PATH, LOGO_IMG_WIDTH, LOGO_IMG_HEIGHT);
	//             if ($image_upload['error']) {
	//                 $response['status'] = 'failure';
	//                 $response['msg']    = $image_upload['error'];
	//                 echo json_encode($response);
	//                 return;
	//             }
	//             $uploaded_image_path = LOGO_IMG_PATH . $image_upload['image_metadata']['file_name'];
	//             list($width, $height) = getimagesize($uploaded_image_path);
	//             if ($width != LOGO_IMG_WIDTH || $height != LOGO_IMG_HEIGHT) {
	//                 unlink($uploaded_image_path);
	//                 $response['status'] = 'failure';
	//                 $response['msg']    = 'The image width and height should be ' . LOGO_IMG_WIDTH . '*' . LOGO_IMG_HEIGHT;
	//                 echo json_encode($response);
	//                 return;
	//             }
	//             $image_name = $image_upload['image_metadata']['file_name'];
	//         }


	//         $data = array(
                
    //             'logo' => $image_name,
	//             'email_address' => $email_address,
	//             'mobile_number' => $mobile_number,
	//             'location' => $location,
	//             'facebook_url' => $facebook_url,
	//             'instagram_url' => $instagram_url,
	//             'linkedin_url' => $linkedin_url,
	//             'is_active' => $is_active,
	//         );
	        
	//         $result = $this->setting_model->update_settings($setting_id, $data, 'settings');
	        
	//         if ($result) {
	//             $response['status'] = 'success';
	//             $response['msg']    = 'Settings were updated successfully';
	//         } else {
	//             $response['status'] = 'failure';
	//             $response['msg']    = '<p>Something went wrong. Please try again.</p>';
	//         }
	//     }
	    
	//     echo json_encode($response);
	// }

	// public function updateSettings() 
	// {  
	// 	$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
	// 	$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|trim');
	// 	$this->form_validation->set_rules('location', 'Location', 'required|trim');
	// 	$this->form_validation->set_rules('is_active', 'Setting Status', 'required');
	// 	$this->form_validation->set_error_delimiters('', '<br/>');
		
	// 	$response = array();
		
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$response['status'] = 'failure';
	// 		$response['msg']    = validation_errors();
	// 	} else {
	// 		$setting_id = $this->input->post('settingid');
	// 		$email_address = $this->input->post('email_address');
	// 		$mobile_number = $this->input->post('mobile_number');
	// 		$location = $this->input->post('location');
	// 		$facebook_url = $this->input->post('facebook_url');
	// 		$instagram_url = $this->input->post('instagram_url');
	// 		$linkedin_url = $this->input->post('linkedin_url');
	// 		$is_active = $this->input->post('is_active');
	
	// 		// File upload configuration
	// 		$config['upload_path']   = './uploads/logos/';
	// 		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
	// 		$config['max_size']      = 2048; // 2MB
	// 		$config['encrypt_name']  = TRUE;
	
	// 		$this->load->library('upload', $config);
	
	// 		if ($this->upload->do_upload('logo')) {
	// 			$upload_data = $this->upload->data();
	// 			$logo = $upload_data['file_name'];
	// 		} else {
	// 			// Get the existing logo from the databaseget_setting_by_id
	// 			$current_setting = $this->setting_model->get_setting_by_id($setting_id);
	// 			$logo = $current_setting->logo; // Assuming your model returns the current setting data with a 'logo' field
	// 		}
	
	// 		$data = array(
	// 			'logo' => $logo,
	// 			'email_address' => $email_address,
	// 			'mobile_number' => $mobile_number,
	// 			'location' => $location,
	// 			'facebook_url' => $facebook_url,
	// 			'instagram_url' => $instagram_url,
	// 			'linkedin_url' => $linkedin_url,
	// 			'is_active' => $is_active,
	// 		);
			
	// 		$result = $this->setting_model->update_settings($setting_id, $data, 'settings');
			
	// 		if ($result) {
	// 			$response['status'] = 'success';
	// 			$response['msg']    = 'Settings were updated successfully';
	// 		} else {
	// 			$response['status'] = 'failure';
	// 			$response['msg']    = '<p>Something went wrong. Please try again.</p>';
	// 		}
	// 	}
		
	// 	echo json_encode($response);
	// }
	
} 