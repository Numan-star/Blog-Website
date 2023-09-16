<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comments_model extends CI_model
{
    function create($formArray)
    {
        $this->db->insert('comments', $formArray);
    }

    function getAllComment()
    {
        // $this->db->order_by('created_at', 'DESC');
        // $this->db->where('blog_id', $id);
        // $this->db->where('status', 'Active');
        $comments = $this->db->get('comments')->result_array();
        return $comments;
    }

    function getAllComments($id)
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('blog_id', $id);
        $this->db->where('status', 'Active');
        $comments = $this->db->get('comments')->result_array();
        return $comments;
    }

    function getOnecomment($id)
    {
        $this->db->where('comment_id', $id);
        $comment = $this->db->get('comments')->row_array();
        return $comment;
    }

    function updatecomment($id, $formArray)
    {
        $this->db->where('comment_id', $id);
        $this->db->update('comments', $formArray);
    }


    function deletecomment($id)
    {
        $this->db->where('comment_id', $id);
        $this->db->delete('comments');
    }

    // function getFeaturedcomments()
    // {
    //     $this->db->order_by('comment_id', 'DESC');
    //     $this->db->where('special', 'featured');
    //     $featuredcomments = $this->db->get('comments')->result_array();
    //     return $featuredcomments;
    // }

    // function getPromotionalcomments()
    // {
    //     $this->db->where('special', 'promo');
    //     $this->db->limit(1);
    //     $promocomment = $this->db->get('comments')->row_array();
    //     return $promocomment;
    // }
}
