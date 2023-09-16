<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
    function dologin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        $user = $query->row_array();
        return $user;
    }
}
