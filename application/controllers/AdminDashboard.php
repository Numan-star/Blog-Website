<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminDashboard extends CI_Controller
{
    function index()
    {
        // echo "I amLogged In";
        if (empty($this->session->userdata['user'])) {
            redirect(base_url() . 'login');
        }
        // echo "<a href='" . base_url() . 'adminDashboard/signOut' . "'>Sign Out</a>";
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    function signOut()
    {
        $this->session->unset_userdata('user');
        redirect(base_url() . 'login');
    }
}
