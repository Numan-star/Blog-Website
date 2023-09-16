<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_model
{
    function create($formArray)
    {
        $this->db->insert('blogs', $formArray);
    }

    function getAllBlogs()
    {
        $this->db->order_by('blog_id', 'DESC');
        $blogs = $this->db->get('blogs')->result_array();
        return $blogs;
    }

    function getOneBlog($id)
    {
        $this->db->where('blog_id', $id);
        $blog = $this->db->get('blogs')->row_array();
        return $blog;
    }

    function updateBlog($id, $formArray)
    {
        $this->db->where('blog_id', $id);
        $this->db->update('blogs', $formArray);
    }


    function deleteBlog($id)
    {
        $this->db->where('blog_id', $id);
        $this->db->delete('blogs');
    }

    function getFeaturedBlogs()
    {
        $this->db->order_by('blog_id', 'DESC');
        $this->db->where('special', 'featured');
        $featuredblogs = $this->db->get('blogs')->result_array();
        return $featuredblogs;
    }

    function getPromotionalBlogs()
    {
        $this->db->where('special', 'promo');
        $this->db->limit(1);
        $promoblog = $this->db->get('blogs')->row_array();
        return $promoblog;
    }
}
