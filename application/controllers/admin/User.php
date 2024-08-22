<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();


        
		$current_method = $this->router->fetch_method();
        $excluded_methods = ['login','authLogin','logout']; // Add the method(s) to be excluded
        if (!in_array($current_method, $excluded_methods) && !$this->session->userdata('admin_id')) {
            redirect('admin/user/login');
        }
    }

	
	public function dashboard()
	{   
		$this->load->model('admin/contact_model');
        $data = array('page_title' => 'Dashboard');
		$data['contacts']		= $this->contact_model->getContacts('yes');
		$this->load->view('admin/dashboard', $data);
	}
    
	public function login()
	{  
	    $data = array(
	      'page_title' => 'Login Page'
		);

		$this->load->view('admin/login', $data);
	}

	 


	public function authLogin()
	{  
	    $this->form_validation->set_rules('emailaddress', 'Email Address', 'required|valid_email');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_error_delimiters('', '<br/>');

	    $response = array();
	    if ($this->form_validation->run() == FALSE) {
	        $response['status'] = 'failure';
	        $response['msg'] = validation_errors();
	    } else {
	        $admin_email = $this->input->post('emailaddress');
	        $admin_password = $this->input->post('password');

	        $user = $this->db->get_where('admin', ['email_admin' => $admin_email])->row();
	        if ($user && $user->admin_password === md5($admin_password)) {
	            $this->session->set_userdata('admin_id', $user->admin_id);
	            $this->session->set_userdata('email_admin', $user->email_admin);
	            $response['status'] = 'success';
	            $response['msg'] = 'Logged in successfully';
	        } else {
	            $response['status'] = 'failure';
	            $response['msg'] = 'Invalid email address or password.';
	        }
	    }

	    echo json_encode($response);
	}



	public function logout()
	{
	  $this->session->sess_destroy();
	  redirect('admin');
	}


}
