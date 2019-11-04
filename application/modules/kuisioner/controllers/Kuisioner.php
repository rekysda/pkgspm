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
   $data['user_asal']=$data['user']['id'];
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
   $data['user_asal']= $data['user']['id'];
   $data['user_tujuan']= $data['usertujuan']['id'];
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('add_attempt', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');

 }
 public function penilaian_addjawaban()
    {
      $kategori_id = $this->input->post('kategori_id');
      $soal_id = $this->input->post('soal_id');
      $user_asal = $this->input->post('user_asal');
      $user_tujuan = $this->input->post('user_tujuan');
      $jawaban = $this->input->post('jawaban');
  
      $this->db->where('user_tujuan', $user_tujuan);
      $this->db->where('user_asal', $user_asal);
      $this->db->delete('bank_penilaian');
  
      foreach ($soal_id as $key => $n) {
          $datadetail = [
            'kategori_id'     =>  $kategori_id[$key],
            'soal_id'     =>  $soal_id[$key],
            'user_asal'     =>  $user_asal,
            'user_tujuan'     =>  $user_tujuan,
            'jawaban'     =>  $jawaban[$key]
          ];
          $this->db->insert('bank_penilaian', $datadetail);
      }
  
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('kuisioner/penilaian');
    } 
     // Kuisioner
 public function laporan()
 {
   $data['title'] = 'Laporan';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $iduserasal = $data['user']['id'];
   $data['listuser'] = $this->Kuisioner_model->get_listuser($iduserasal);
   $data['user_asal']=$data['user']['id'];
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('laporan', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   
 }
 public function cetaklaporan()
 {
   $data['title'] = 'Laporan Penilaian Guru';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $iduserasal = $data['user']['id'];
   $data['listuser'] = $this->Kuisioner_model->get_listuser($iduserasal);
   $data['user_asal']=$data['user']['id'];
   $this->load->view('cetaklaporan', $data);
   
 }
 public function detail($usertujuan_id)
 {
   $data['title'] = 'Laporan';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $data['usertujuan'] = $this->db->get_where('user', ['id' =>
   $usertujuan_id])->row_array();
   $data['namagurutujuan']=$data['usertujuan']['name'];
   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $data['listkategori'] = $this->Kuisioner_model->get_listkategoriuser($usertujuan_id);
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('detail', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');

 }
 public function cetaklaporandetail($usertujuan_id)
 {
   $data['title'] = 'Laporan Penilaian Guru Detail';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $data['usertujuan'] = $this->db->get_where('user', ['id' =>
   $usertujuan_id])->row_array();
   $data['namagurutujuan']=$data['usertujuan']['name'];
   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $data['listkategori'] = $this->Kuisioner_model->get_listkategoriuser($usertujuan_id);
   $this->load->view('cetaklaporandetail', $data);
   
 }
  //end
}