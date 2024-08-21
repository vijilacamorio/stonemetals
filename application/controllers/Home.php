<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
	}
    public function index(){
        $menus = $this->home_model->getPages();
        $submenus = $this->home_model->getSubPages();
        $menu_array = array();
        if($menus!=""){
            foreach($menus as $mdata){
            $menu_array[$mdata['id']] =  array('name'=>$mdata['category_name'],'slug'=>$mdata['category_slug']);
            }
        }
        if($submenus !=""){
            foreach($submenus as $smdata){
            if(array_key_exists($smdata['category_id'],$menu_array)){
                $menu_array[$smdata['category_id']]['submenu'][]= array('name'=>$smdata['subcategory_name'],'slug'=>$smdata['subcategory_slug']);
            }
            }
        } 
        $header_data['menu_array'] = $menu_array;
        $header_data['settings'] = $this->home_model->settingData();
        $footer_data['menu_array'] = $menu_array;
        $footer_data['settings'] = $this->home_model->settingData();
        $this->load->view('layout/header',$header_data);
        $this->load->view('home');
        $this->load->view('layout/footer',$footer_data);
    }
    

}