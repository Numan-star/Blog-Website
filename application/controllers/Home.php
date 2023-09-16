<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('Blog_model');
        $this->load->helper('text');

        $data = array();
        $allBlogs = $this->Blog_model->getAllBlogs();
        $featuredBlogs = $this->Blog_model->getFeaturedBlogs();
        $promoBlog = $this->Blog_model->getPromotionalBlogs();
        $data['allBlogs'] = $allBlogs;
        $data['featuredBlogs'] = $featuredBlogs;
        $data['promoBlog'] = $promoBlog;

        $this->load->view('home', $data);
    }
}
