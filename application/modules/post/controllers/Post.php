<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Post';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parent'] = $this->db->get_where('posts_categories', ['parent_id' => 0])->result_array();
        $data['post_cat'] = $this->db->get('posts_categories')->result_array();

        $this->load->model('Post_model', 'post_model');
        $data['posts'] = $this->post_model->getposts();

        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('posts', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg';
                $config['max_size'] = '100';
                $config['upload_path'] = './assets/images/post/original/';
                $config['file_name'] = round(microtime(true) * 1000);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['post']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/post/original/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo  $this->upload->display_errors();
                }
            }

            $this->load->model('Post_model', 'post_model');
            $slug = slug($this->input->post('title'));
            $data = [
                'user_id' => $this->input->post('user_id'),
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'slug' => $this->post_model->unique_slug($slug),
                'image' => $new_image,
                'is_publish' => $this->input->post('is_publish')
            ];
            $this->db->insert('posts', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Post added !</div>');
            redirect('post');
        }
    }

    public function add_post()
    {
        $data['title'] = 'Post';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parent'] = $this->db->get_where('posts_categories', ['parent_id' => 0])->result_array();
        $data['post_cat'] = $this->db->get('posts_categories')->result_array();

        $this->load->model('Post_model', 'post_model');
        $data['posts'] = $this->post_model->getposts();

        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('post_add', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg';
                $config['max_size'] = '100';
                $config['upload_path'] = './assets/images/post/original/';
                $config['file_name'] = round(microtime(true) * 1000);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo  $this->upload->display_errors();
                }
            } else {
                $new_image = 'default.jpg';
            }

            $this->load->model('Post_model', 'post_model');
            $slug = slug($this->input->post('title'));
            $data = [
                'user_id' => $this->input->post('user_id'),
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'slug' => $this->post_model->unique_slug($slug),
                'image' => $new_image,
                'is_publish' => $this->input->post('is_publish')
            ];
            $this->db->insert('posts', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Post added !</div>');
            redirect('post');
        }
    }

    public function editPost($id)
    {
        $data['title'] = 'Post';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parent'] = $this->db->get_where('posts_categories', ['parent_id' => 0])->result_array();
        $data['post_cat'] = $this->db->get('posts_categories')->result_array();

        $this->load->model('Post_model', 'post_model');
        $data['posts'] = $this->post_model->getposts();
        $data['getpost'] = $this->post_model->getPostById($id);

        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('post_edit', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg';
                $config['max_size'] = '100';
                $config['upload_path'] = './assets/images/post/original/';
                $config['file_name'] = round(microtime(true) * 1000);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['getpost']['image'];
                    if ($old_image != 'default.jpg') {
                        if (file_exists('assets/images/post/original/' . $old_image)) {
                            unlink(FCPATH . 'assets/images/post/original/' . $old_image);
                        }
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo  $this->upload->display_errors();
                }
            }

            $this->load->model('Post_model', 'post_model');
            $slug = slug($this->input->post('title'));
            $data = [
                'user_id' => $this->input->post('user_id'),
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'slug' => $this->post_model->unique_slug($slug),
                'is_publish' => $this->input->post('is_publish')
            ];
            $this->db->where('id', $id);
            $this->db->update('posts', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Post added !</div>');
            redirect('post');
        }
    }

    public function hapusPost($id)
    {
        $this->load->model('Post_model', 'postmodel');
        $data['getpost'] = $this->postmodel->getPostById($id);
        $old_image = $data['getpost']['image'];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . './assets/images/post/original/' . $old_image);
        }
        $this->postmodel->hapusDataPost($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Post deleted !</div>');
        redirect('post');
    }

    public function postcategories()
    {
        $data['title'] = 'Post Categories';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parent'] = $this->db->get_where('posts_categories', ['parent_id' => 0])->result_array();
        $data['post_cat'] = $this->db->get('posts_categories')->result_array();

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('post_cat', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $slug = slug($this->input->post('name'));
            $this->load->model('Post_model', 'post_model');
            $data = [
                'parent_id' => $this->input->post('parent_id'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'slug' => $this->post_model->unique_slug($slug)
            ];
            $this->db->insert('posts_categories', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Post categories added !</div>');
            redirect('post/postcategories');
        }
    }
    public function editPostCat($id)
    {
        $data['title'] = 'Post Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parent'] = $this->db->get_where('posts_categories', ['parent_id' => 0])->result_array();
        $data['post_cat'] = $this->db->get('posts_categories')->result_array();

        $this->load->model('Post_model', 'post_model');
        $data['getpostcat'] = $this->post_model->getPostCatById($id);
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('edit_post_cat', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $slug = slug($this->input->post('name'));
            $data = [
                'parent_id' => $this->input->post('parent_id'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'slug' => $slug
            ];
            $this->db->where('id', $id);
            $this->db->update('posts_categories', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Post categories edited !</div>');
            redirect('post/postcategories');
        }
    }
    public function hapusPostCat($id)
    {
        $this->load->model('Post_model', 'page');
        $this->page->hapusPostCat($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Posts Categories deleted !</div>');
        redirect('post/postcategories');
    }
}
