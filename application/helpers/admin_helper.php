<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if (!function_exists('blogImageUpload')) {
    function blogImageUpload($imagename, $path, $width="", $height=""){
        $new_name = 'blog_'.time();
        $config['file_name'] = $new_name;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 2048;
        $config['max_width'] = $width;
        $config['max_height'] = $height;
        $CI =& get_instance();
        $CI->load->library('upload', $config);

        if (!$CI->upload->do_upload($imagename)) {
            $error = array('error' => $CI->upload->display_errors());
            return $error;
        } else {
            $data = array('image_metadata' => $CI->upload->data());
            return $data;
        }
    }
}


if (!function_exists('bannerImageUpload')) {
    function bannerImageUpload($imagename, $path, $width="", $height=""){
        $new_name = 'banner_'.time();
        $config['file_name'] = $new_name;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 2048;
        $config['max_width'] = $width;
        $config['max_height'] = $height;
        $CI =& get_instance();
        $CI->load->library('upload', $config);

        if (!$CI->upload->do_upload($imagename)) {
            $error = array('error' => $CI->upload->display_errors());
            return $error;
        } else {
            $data = array('image_metadata' => $CI->upload->data());
            return $data;
        }
    }
}

 