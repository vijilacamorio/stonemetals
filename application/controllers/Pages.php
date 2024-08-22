<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('pages_model');
	}
    public function index(){ 
        $seg1       = $this->uri->segment(1);
        $seg2       = $this->uri->segment(2);
        $menus = $this->home_model->getPages();
        $submenus = $this->home_model->getSubPages();
        $pagecont = $this->pages_model->getPageContent($seg1);
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
        $data = array(
            'page_title' => 'About',
            'page_details'=> $pagecont
        );
        $this->load->view('layout/header',$header_data);
  		$this->load->view('about', $data);
        $this->load->view('layout/footer',$footer_data);
    }
    public function applications(){ //this is for applications
        $seg1       = $this->uri->segment(1);
        $seg2       = $this->uri->segment(2);
        $menus = $this->home_model->getPages();
        $submenus = $this->home_model->getSubPages();
        $pagecont = $this->pages_model->getPageContent($seg1);
        // print_r($pagecont); exit;
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
        $data = array(
            'page_title' => 'Application',
            'page_details'=> $pagecont
        );
        $this->load->view('layout/header',$header_data);
  		$this->load->view('applications', $data);
        $this->load->view('layout/footer',$footer_data);
    }
    public function wallart() {
        $wallart = $this->home_model->wallart();
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
        $data = array(
            'page_title' => 'Wall Art',
            'data' =>  $wallart
        );
         $this->load->view('layout/header',$header_data);
  		$this->load->view('wallart', $data);
        $this->load->view('layout/footer',$footer_data);
    }
        public function metalscreens_jalis() {
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
        $data = array(
            'page_title' => 'Metal Screens Jalis',
        );
        $this->load->view('layout/header',$header_data);
        $this->load->view('metalscreensjalis', $data);
        $this->load->view('layout/footer',$footer_data);
    }
    public function stoneinlays() {
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
    $data = array(
        'page_title' => 'Stone Inlays/Medallions/Stone Borders',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('stoneinlays', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function stonewaterfeatures() {
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
    $data = array(
        'page_title' => 'Stone Inlays/Medallions/Stone Borders',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('stonewaterfeatures', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function metalrailings_gates() {
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
    $data = array(
        'page_title' => 'Metal Railings & Gates',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('metalrailingsgates', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function metalstone_furniture() {
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
    $data = array(
        'page_title' => 'Metal & Stone  Furniture',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('metalstonefurniture', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function stoneribbing_marbleflute() {
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
    $data = array(
        'page_title' => 'Stone Ribbing / Marble Flute',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('stoneribbingmarbleflute', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function powdercoating() {
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
    $data = array(
        'page_title' => 'Powder Coating',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('powdercoating', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function fabrication() {
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
    $data = array(
        'page_title' => 'Fabrication',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('fabrication', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function installation() {
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
    $data = array(
        'page_title' => 'Installation',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('installation', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function gallery() {
        $menus = $this->home_model->getPages();
        $submenus = $this->home_model->getSubPages();

        $gallery = $this->pages_model->get_galleries();
 
        
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
    $data = array(
        'page_title'   => 'Gallery',
        'gallery_data' =>  $gallery

    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('gallery', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function patterns() {
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
    $data = array(
        'page_title' => 'Patterns',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('patterns', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function materials() {
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
    $data = array(
        'page_title' => 'Materials',
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('materials', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function blog() {
        $menus = $this->home_model->getPages();
        $submenus = $this->home_model->getSubPages();
        // $blog = $this->home_model->blog();
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
    $data = array(
        'page_title' => 'Blog',
         'blog' => $blog
    );
    $this->load->view('layout/header',$header_data);
    $this->load->view('blog', $data);
    $this->load->view('layout/footer',$footer_data);
    }
    public function faq() {
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
        $data = array(
            'page_title' => 'FAQ',
         );
        $this->load->view('layout/header',$header_data);
        $this->load->view('faq', $data);
        $this->load->view('layout/footer',$footer_data);
        }
        public function contact_us() {
            $menus = $this->home_model->getPages();
            $submenus = $this->home_model->getSubPages();
            $contactus = $this->pages_model->contactus();
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
            $data = array(
                'page_title' => 'Contact Us',
                 'data' => $contactus
             );
            $this->load->view('layout/header',$header_data);
            $this->load->view('contact_us', $data);
            $this->load->view('layout/footer',$footer_data);
            }
          
            public function getdata_insert() {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'Name', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
                $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
                // $this->form_validation->set_rules('message', 'Message', 'required|trim');
                 if ($this->form_validation->run() === FALSE) {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('contact-us');  
                }
                $data = array(
                    'name' => $this->input->post('name', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'phone' => $this->input->post('phone', TRUE),
                    'message' => $this->input->post('message', TRUE)
                );
                    if ($this->db->insert('contactus', $data)) {
                    $this->session->set_flashdata('success', 'Data inserted successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Data insertion failed.');
                }
                redirect('contact-us');  
            }



            public function insertContact(){
                
  
               
                $response = array();
         
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'message' => $this->input->post('message'),
                );
               
                $result = $this->pages_model->insertcontacts($data);
        
                if ($result) {
                    $this->sendEmail($data);
                    $response['status'] = 'success';
                    $response['msg']     = 'Thank you for submitting. We will be in touch soon.';
                } else {
                    $response['status'] = 'failure';
                    $response['msg']     = 'Something happened';
                }
        
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        




 
            private function sendEmail($data)
            {   
                $name = htmlspecialchars(strip_tags($data['name']));
                $email_address = htmlspecialchars(strip_tags($data['email']));
                $phone = htmlspecialchars(strip_tags($data['phone']));
                $message_content = nl2br(htmlspecialchars($data['message']));
        
                $name = str_replace(array('=', '?'), '', $name);
                $email_address = str_replace(array('=', '?'), '', $email_address);
                $phone = str_replace(array('=', '?'), '', $phone);
                $message_content = str_replace(array('=', '?'), '', $message_content);
        
                $message =
                    "<table style='width:50%'>
                      <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{$name}</td>
                      </tr>
                      <tr>
                        <td>Email Address</td>
                        <td>:</td>
                        <td>{$email_address}</td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td>:</td>
                        <td>{$phone}</td>
                      </tr>
                       <tr>
                        <td>Message</td>
                        <td>:</td>
                        <td>{$message_content}</td>
                      </tr>
                    </table>";
        
                $this->load->library('email');
                
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.amoriotech.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'sales@amoriotech.com',
                    'smtp_pass' => 'Amorio@2022',
                    'smtp_crypto' => 'ssl',
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    // 'newline' => "\r\n"
                );
        
                $this->email->initialize($config);
                $this->email->from('ajith@amoriotech.com', $name);
                $this->email->to('ajith@amoriotech.com');
                // $this->email->cc('jayashree@amoriotech.com, madhu@amoriotech.com');
                $this->email->subject('Stone & Metals Contact Us ..');
                $this->email->message($message);
        
                if ($this->email->send()) {
                    return true;
                } else {
                    return false; 
                }
            }







}