<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function index()
    {
        $this->load->model('User_model');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/login");
        } else {
            // $this->load->view('formsuccess');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->dologin($username, $password);
            if (!empty($user)) {
                $this->session->set_userdata('user', $user);
                redirect(base_url() . 'adminDashboard');
            } else {
                $this->session->set_flashdata('errorMsg', 'Either Username/Password is incorrect');
                redirect(base_url() . 'login');
            }
        }
    }
}
