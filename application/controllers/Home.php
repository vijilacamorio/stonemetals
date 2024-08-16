<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
	}
    public function index(){
        $header_data['menus'] = $this->home_model->getPages();
        $header_data['submenus'] = $this->home_model->getSubPages();
        $header_data['settings'] = $this->home_model->settingData();
        $this->load->view('layout/header',$header_data);
        $this->load->view('home');
        $this->load->view('layout/footer');
    }
}