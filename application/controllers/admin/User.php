<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function dashboard()
	{   
        $data = array('page_title' => 'Dashboard');
		$this->load->view('admin/dashboard', $data);
	}
    

}
