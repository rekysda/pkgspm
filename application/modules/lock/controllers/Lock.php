<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Lock extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // lock
 public function role()
 {
   $data['title'] = 'Role';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $data['role'] = $this->db->get('user_role')->result_array();

   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('role', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   
 }
 public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $menuaccess = $this->uri->segment(3);
        if ($menuaccess == '1') {
            $this->db->where('id>', 0);
        } else {
            $this->db->where('id!=', 1);
        }
        $data['kategori'] = $this->db->get('bank_kategori')->result_array();

        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('role-access', $data);
        $this->load->view('themes/backend/footer');
        $this->load->view('themes/backend/footerajax');
    }
    public function changeaccesskategori()
    {
        $kategori_id = $this->input->post('kategoriId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'kategori_id' => $kategori_id
        ];
        $result = $this->db->get_where('user_access_kategori', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_kategori', $data);
        } else {
            $this->db->delete('user_access_kategori', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Access Changed!</div>');
    }
    // user
 public function user()
 {
   $data['title'] = 'User';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $data['listuser'] = $this->db->get('user')->result_array();

   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('user', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   
 }
  //end
}