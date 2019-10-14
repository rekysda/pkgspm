<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // Kuisioner
 public function penilaian()
 {
   $data['title'] = 'Penilaian';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $iduserasal = $data['user']['id'];
   $data['listuser'] = $this->Kuisioner_model->get_listuser($iduserasal);

   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('user', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   
 }
 public function add_attempt($tujuan_id)
 {
   $data['title'] = 'Penilaian';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $iduserasal = $data['user']['id'];
   $data['usertujuan'] = $this->db->get_where('user', ['id' =>
   $tujuan_id])->row_array();
   $data['namagurutujuan']=$data['usertujuan']['name'];
   $role_id=$data['user']['role_id'];

   $data['listkategori'] = $this->Kuisioner_model->get_listkategori($role_id);

   $data['listquestion'] = $this->Kuisioner_model->get_listquestion($role_id);

   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('add_attempt', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   
 }
  //end
}