<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Banksoal extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // kategori
 public function kategori()
 { 
   $data['title'] = 'Kategori';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Banksoal_model', 'Banksoal_model');
   $data['kategori'] = $this->Banksoal_model->get_kategori();
   $this->form_validation->set_rules('kategori', 'kategori', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('kategori', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kategori' => $this->input->post('kategori')
          ];
          $this->db->insert('bank_kategori', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('banksoal/kategori');
   }
 }
 public function edit_kategori($id)
  {
    $data['title'] = 'Kategori';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Banksoal_model', 'Banksoal_model');
    $data['kategori'] = $this->Banksoal_model->get_kategori();
    $data['get_kategori'] = $this->Banksoal_model->get_kategori_byId($id);
    $this->form_validation->set_rules('kategori', 'kategori', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_kategori', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      // Jika Ada Gambar
      $upload_image = $_FILES['image']['name'];
      $old_image = $this->input->post('old_image');
      
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '10240';
        $config['upload_path'] = 'assets/images/banksoal/';
        $config['file_name'] = date('ymdhis');
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/images/banksoal/' . $old_image);
            }
            $new_image = $this->upload->data('file_name');
            
            $this->db->set('image', $new_image);
            $this->db->where('id', $id);
            $this->db->update('bank_kategori');
            //Compress Image
             $config['image_library']='gd2';
             $config['source_image']='./assets/images/banksoal/'.$new_image;
             $config['create_thumb']= FALSE;
             $config['maintain_ratio']= FALSE;
             $config['quality']= '100%';
             $config['width']= 100;
             $config['height']= 100;
             $config['new_image']= './assets/images/banksoal/'.$new_image;
             $this->load->library('image_lib', $config);
             $this->image_lib->resize();     

    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">
    Upload Image!</div>');
        } else {
            echo  $this->upload->display_errors();
        }
    }


      $data = [
        'kategori' => $this->input->post('kategori')
         ];
          $this->db->where('id', $id);
          $this->db->update('bank_kategori', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('banksoal/kategori');
    }
  }
  public function hapus_kategori($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('bank_kategori');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('banksoal/kategori');
  }
  //soal
  public function soal()
 {
   $data['title'] = 'Soal';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Banksoal_model', 'Banksoal_model');
   $data['kategori'] = $this->Banksoal_model->get_kategori();
   $data['soal'] = $this->Banksoal_model->get_soal();
   $this->form_validation->set_rules('kategori_id', 'kategori_id', 'required');
   $this->form_validation->set_rules('soal', 'soal', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('soal', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kategori_id' => $this->input->post('kategori_id'),
         'soal' => $this->input->post('soal')
          ];
          $this->db->insert('bank_soal', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('banksoal/soal');
   }
 }
 public function edit_soal($id)
 {
   $data['title'] = 'Soal';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Banksoal_model', 'Banksoal_model');
   $data['kategori'] = $this->Banksoal_model->get_kategori();
   $data['soal'] = $this->Banksoal_model->get_soal();
   $data['get_soal'] = $this->Banksoal_model->get_soal_byId($id);
   $this->form_validation->set_rules('kategori_id', 'kategori_id', 'required');
   $this->form_validation->set_rules('soal', 'soal', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('edit_soal', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kategori_id' => $this->input->post('kategori_id'),
         'soal' => $this->input->post('soal')
          ];
          $this->db->where('id', $id);
          $this->db->update('bank_soal', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('banksoal/soal');
   }
 }
 public function hapus_soal($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('bank_soal');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('banksoal/soal');
  }
  //jawab
  public function jawab()
  {
    $data['title'] = 'Jawab';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Banksoal_model', 'Banksoal_model');
    $data['jawab'] = $this->Banksoal_model->get_jawab();
    $this->form_validation->set_rules('jawab', 'jawab', 'required');
    $this->form_validation->set_rules('skor', 'skor', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('jawab', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
        $data = [
          'jawab' => $this->input->post('jawab'),
          'skor' => $this->input->post('skor')
           ];
           $this->db->insert('bank_jawab', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('banksoal/jawab');
    }
  }
  public function edit_jawab($id)
   {
     $data['title'] = 'Jawab';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('Banksoal_model', 'Banksoal_model');
     $data['jawab'] = $this->Banksoal_model->get_jawab();
     $data['get_jawab'] = $this->Banksoal_model->get_jawab_byId($id);
     $this->form_validation->set_rules('jawab', 'jawab', 'required');
     $this->form_validation->set_rules('skor', 'skor', 'required');
     if ($this->form_validation->run() == false) {
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('edit_jawab', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
     }else{
       $data = [
         'jawab' => $this->input->post('jawab'),
         'skor' => $this->input->post('skor')
          ];
           $this->db->where('id', $id);
           $this->db->update('bank_jawab', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('banksoal/jawab');
     }
   }
   public function hapus_jawab($id)
   {
     $this->db->where('id', $id);
     $this->db->delete('bank_jawab');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
     redirect('banksoal/jawab');
   }
  //end
}