<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // surat_masuk
 public function surat_masuk()
 {
   $data['title'] = 'Surat Masuk';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('surat_model', 'surat_model');
   $data['surat_masuk'] = $this->surat_model->get_surat_masuk();
$data['tahunskrg']=date('Y');
$data['tanggalskrg']=date('Y-m-d');
   $this->form_validation->set_rules('tahun', 'tahun', 'required');
   $this->form_validation->set_rules('nomor', 'nomor', 'required');
   $this->form_validation->set_rules('pengirim', 'pengirim', 'required');
   $this->form_validation->set_rules('alamat_pengirim', 'alamat_pengirim', 'required');
   $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required');
   $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
   $this->form_validation->set_rules('perihal', 'perihal', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('surat_masuk', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'tahun' => $this->input->post('tahun'),
         'nomor' => $this->input->post('nomor'),
         'pengirim' => $this->input->post('pengirim'),
         'alamat_pengirim' => $this->input->post('alamat_pengirim'),
         'tanggal_masuk' => $this->input->post('tanggal_masuk'),
         'nomor_surat' => $this->input->post('nomor_surat'),
         'perihal' => $this->input->post('perihal')
          ];
          $this->db->insert('surat_masuk', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('surat/surat_masuk');
   }
 }
 public function edit_surat_masuk($id)
  {
    $data['title'] = 'Surat Masuk';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('surat_model', 'surat_model');
    $data['get_surat_masuk'] = $this->surat_model->get_surat_masuk_byId($id);


    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    $this->form_validation->set_rules('nomor', 'nomor', 'required');
    $this->form_validation->set_rules('pengirim', 'pengirim', 'required');
    $this->form_validation->set_rules('alamat_pengirim', 'alamat_pengirim', 'required');
    $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required');
    $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
    $this->form_validation->set_rules('perihal', 'perihal', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_surat_masuk', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'tahun' => $this->input->post('tahun'),
        'nomor' => $this->input->post('nomor'),
        'pengirim' => $this->input->post('pengirim'),
        'alamat_pengirim' => $this->input->post('alamat_pengirim'),
        'tanggal_masuk' => $this->input->post('tanggal_masuk'),
        'nomor_surat' => $this->input->post('nomor_surat'),
        'perihal' => $this->input->post('perihal')
         ];
          $this->db->where('id', $id);
          $this->db->update('surat_masuk', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('surat/surat_masuk');
    }
  }
  public function hapus_surat_masuk($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('surat_masuk');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('surat/surat_masuk');
  }
  //end
  // surat_keluar
 public function surat_keluar()
 {
   $data['title'] = 'Surat Keluar';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('surat_model', 'surat_model');
   $data['surat_keluar'] = $this->surat_model->get_surat_keluar();
$data['tahunskrg']=date('Y');
$data['tanggalskrg']=date('Y-m-d');
$data['bulanromawi']=getbulanromawi(date('n'));
$data['surat_kode'] = $this->db->get_where('surat_kode', ['id' =>
    '1'])->row_array();
   $this->form_validation->set_rules('tahun', 'tahun', 'required');
   $this->form_validation->set_rules('nomor', 'nomor', 'required');
   $this->form_validation->set_rules('penerima', 'penerima', 'required');
   $this->form_validation->set_rules('alamat_penerima', 'alamat_penerima', 'required');
   $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required');
   $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
   $this->form_validation->set_rules('perihal', 'perihal', 'required');
   $this->form_validation->set_rules('penanggung_jawab', 'penanggung_jawab', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('surat_keluar', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'tahun' => $this->input->post('tahun'),
         'nomor' => $this->input->post('nomor'),
         'penerima' => $this->input->post('penerima'),
         'alamat_penerima' => $this->input->post('alamat_penerima'),
         'tanggal_keluar' => $this->input->post('tanggal_keluar'),
         'nomor_surat' => $this->input->post('nomor_surat'),
         'perihal' => $this->input->post('perihal'),
         'penanggung_jawab' => $this->input->post('penanggung_jawab')
          ];
          $this->db->insert('surat_keluar', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('surat/surat_keluar');
   }
 }
 public function edit_surat_keluar($id)
  {
    $data['title'] = 'Surat Keluar';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('surat_model', 'surat_model');
    $data['get_surat_keluar'] = $this->surat_model->get_surat_keluar_byId($id);

    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    $this->form_validation->set_rules('nomor', 'nomor', 'required');
    $this->form_validation->set_rules('penerima', 'penerima', 'required');
    $this->form_validation->set_rules('alamat_penerima', 'alamat_penerima', 'required');
    $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required');
    $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
    $this->form_validation->set_rules('perihal', 'perihal', 'required');
    $this->form_validation->set_rules('penanggung_jawab', 'penanggung_jawab', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_surat_keluar', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'tahun' => $this->input->post('tahun'),
        'nomor' => $this->input->post('nomor'),
        'penerima' => $this->input->post('penerima'),
        'alamat_penerima' => $this->input->post('alamat_penerima'),
        'tanggal_keluar' => $this->input->post('tanggal_keluar'),
        'nomor_surat' => $this->input->post('nomor_surat'),
        'perihal' => $this->input->post('perihal'),
        'penanggung_jawab' => $this->input->post('penanggung_jawab')
         ];
          $this->db->where('id', $id);
          $this->db->update('surat_keluar', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('surat/surat_keluar');
    }
  }
  public function hapus_surat_keluar($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('surat_keluar');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('surat/surat_keluar');
  }
  public function surat_kode()
  {
    $data['title'] = 'Surat Kode';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['surat_kode'] = $this->db->get_where('surat_kode', ['id' =>
    '1'])->row_array();


    $this->form_validation->set_rules('kode', 'kode', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('surat_kode', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'kode' => $this->input->post('kode'),
         ];
          $this->db->where('id','1');
          $this->db->update('surat_kode', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('surat/surat_kode');
    }
  }
  //end
}