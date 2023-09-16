<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function index()
    {
        $this->load->model('Blog_model');
        $blogs = array();
        $blogs = $this->Blog_model->getAllBlogs();
        $data['blogs'] = $blogs;
        $this->load->view('admin/header');
        $this->load->view('admin/blog/list', $data);
        $this->load->view('admin/footer');
    }

    public function commentsView()
    {
        $this->load->model('Comments_model');
        // $comments = array();
        $comments = $this->Comments_model->getAllComment();
        $data['comments'] = $comments;
        $this->load->view('admin/header');
        $this->load->view('admin/comment/list', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $this->load->model('Blog_model');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        // $this->form_validation->set_rules('special', 'Special', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/blog/add');
            $this->load->view('admin/footer');
        } else {
            $form_array = array();
            $form_array['title'] = $this->input->post('title');
            $form_array['description'] = $this->input->post('desc');
            $form_array['author'] = $this->input->post('author');
            $form_array['special'] = $this->input->post('special');
            $form_array['created_at'] = date('y-m-d');

            $user = $this->Blog_model->create($form_array);
            $this->session->set_flashdata('Success', 'Blog created successfully!');
            redirect(base_url() . 'blog');
        }
    }

    public function edit($blog_id)
    {
        $this->load->model('Blog_model');
        $blog = array();
        $blog = $this->Blog_model->getOneBlog($blog_id);
        if (empty($blog)) {
            $this->session->set_flashdata('Success', 'No Blog Found!');
            redirect(base_url() . 'blog');
        }
        $data['blog'] = $blog;

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        // $this->form_validation->set_rules('special', 'Special', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/blog/edit', $data);
            $this->load->view('admin/footer');
        } else {
            $form_array = array();
            $form_array['title'] = $this->input->post('title');
            $form_array['description'] = $this->input->post('desc');
            $form_array['author'] = $this->input->post('author');
            $form_array['special'] = $this->input->post('special');
            $form_array['created_at'] = date('y-m-d');

            $this->Blog_model->updateBlog($blog_id, $form_array);
            $this->session->set_flashdata('Success', 'Blog updated successfully!');
            redirect(base_url() . 'blog');
        }
    }

    public function editComment($comment_id)
    {
        $this->load->model('Comments_model');
        $comment = array();
        $comment = $this->Comments_model->getOnecomment($comment_id);
        if (empty($comment)) {
            $this->session->set_flashdata('Success', 'No Blog Found!');
            redirect(base_url() . 'blog/commentsView');
        }
        $data['comment'] = $comment;

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        $this->form_validation->set_rules('status', 'Author', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/comment/edit', $data);
            $this->load->view('admin/footer');
        } else {
            $form_array = array();
            $form_array['name'] = $this->input->post('name');
            $form_array['comment'] = $this->input->post('comment');
            $form_array['status'] = $this->input->post('status');

            $this->Comments_model->updatecomment($comment_id, $form_array);
            $this->session->set_flashdata('Success', 'Blog updated successfully!');
            redirect(base_url() . 'blog/commentsView');
        }
    }

    public function delete($blog_id)
    {
        $this->load->model('Blog_model');
        $blog = array();
        $blog = $this->Blog_model->getOneBlog($blog_id);
        if (empty($blog)) {
            $this->session->set_flashdata('Success', 'No Blog Found!');
            redirect(base_url() . 'blog');
        }
        $this->load->model('Blog_model');
        $this->Blog_model->deleteBlog($blog_id);
        $this->session->set_flashdata('Success', 'Blog deleted successfully!');
        redirect('blog');
    }

    public function deleteComment($comment_id)
    {
        $this->load->model('Comments_model');
        $comment = array();
        $comment = $this->Comments_model->getOneComment($comment_id);
        if (empty($comment)) {
            $this->session->set_flashdata('Success', 'No Blog Found!');
            redirect(base_url() . 'blog/commentView');
        }
        $this->Comments_model->deletecomment($comment_id);
        $this->session->set_flashdata('Success', 'Comment deleted successfully!');
        redirect('blog/commentsView');
    }

    public function detail($id)
    {
        $this->load->model('Blog_model');
        $this->load->model('Comments_model');
        $blog = array();
        $blog = $this->Blog_model->getOneBlog($id);
        if (empty($blog)) {
            redirect(base_url());
        }
        $comments = $this->Comments_model->getAllComments($id);

        $data['comments'] = $comments;
        $data['blog'] = $blog;

        $this->load->model('Comments_model');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('detail', $data);
        } else {
            $form_array = array();
            $form_array['blog_id'] = $id;
            $form_array['name'] = $this->input->post('name');
            $form_array['comment'] = $this->input->post('comment');

            $user = $this->Comments_model->create($form_array);
            // $this->session->set_flashdata('Success', 'Blog created successfully!');
            redirect(base_url() . 'blog/detail/' . $id);
        }
    }
}
