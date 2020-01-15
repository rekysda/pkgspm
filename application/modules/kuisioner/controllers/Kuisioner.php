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
   $tahunpenilaian = $this->db->get_where('options', ['name' =>
   'tahunpenilaian'])->row_array();
  $data['tahunpenilaian']=$tahunpenilaian['value'];
   $bulanpenilaian = $this->db->get_where('options', ['name' =>
   'bulanpenilaian'])->row_array();
  $data['bulanpenilaian']=$bulanpenilaian['value'];
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
   $tahunpenilaian = $this->db->get_where('options', ['name' =>
   'tahunpenilaian'])->row_array();
  $data['tahunpenilaian']=$tahunpenilaian['value'];
   $bulanpenilaian = $this->db->get_where('options', ['name' =>
   'bulanpenilaian'])->row_array();
  $data['bulanpenilaian']=$bulanpenilaian['value'];

   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $iduserasal = $data['user']['id'];
   $data['usertujuan'] = $this->db->get_where('user', ['id' =>
   $tujuan_id])->row_array();
   $data['namagurutujuan']=$data['usertujuan']['name'];
   $role_id=$data['user']['role_id'];
   $data['role_id']=$data['user']['role_id'];
   $data['user_asal']= $data['user']['id'];
   $data['user_tujuan']= $data['usertujuan']['id'];
   if($data['user_asal']<>$data['user_tujuan']){
   $data['listkategori'] = $this->Kuisioner_model->get_listkategori($role_id);
   $data['listquestion'] = $this->Kuisioner_model->get_listquestion($role_id);
   }else{
    $data['listkategori'] = $this->Kuisioner_model->get_listkategoriall();  
    $data['listquestion'] = $this->Kuisioner_model->get_listquestionall();
   }
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
      $role_id = $this->input->post('role_id');
      $jawaban = $this->input->post('jawaban');
      $tahunpenilaian = $this->input->post('tahunpenilaian');
      $bulanpenilaian = $this->input->post('bulanpenilaian');
  
      $this->db->where('user_tujuan', $user_tujuan);
      $this->db->where('user_asal', $user_asal);
      $this->db->delete('bank_penilaian');
  
      foreach ($soal_id as $key => $n) {
          $datadetail = [
            'kategori_id'     =>  $kategori_id[$key],
            'soal_id'     =>  $soal_id[$key],
            'user_asal'     =>  $user_asal,
            'user_tujuan'     =>  $user_tujuan,
            'jawaban'     =>  $jawaban[$key],
            'role_id'     =>  $role_id,
            'tahunpenilaian'     =>  $tahunpenilaian,
            'bulanpenilaian'     =>  $bulanpenilaian,
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
   $tahunpenilaian = $this->db->get_where('options', ['name' =>
   'tahunpenilaian'])->row_array();
  $data['tahunpenilaian']=$tahunpenilaian['value'];
   $bulanpenilaian = $this->db->get_where('options', ['name' =>
   'bulanpenilaian'])->row_array();
  $data['bulanpenilaian']=$bulanpenilaian['value'];

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
   $tahunpenilaian = $this->db->get_where('options', ['name' =>
   'tahunpenilaian'])->row_array();
  $data['tahunpenilaian']=$tahunpenilaian['value'];
   $bulanpenilaian = $this->db->get_where('options', ['name' =>
   'bulanpenilaian'])->row_array();
  $data['bulanpenilaian']=$bulanpenilaian['value'];

   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $iduserasal = $data['user']['id'];
   $data['listuser'] = $this->Kuisioner_model->get_listuser($iduserasal);
   $data['user_asal']=$data['user']['id'];
 //  $this->load->view('cetaklaporan', $data);

   $html = $this->load->view('cetaklaporan', $data, true);
    // create pdf using dompdf
    $filename = 'laporanpkg_pdf' . date('dmY') . '_' . date('His');
    $paper = 'F4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
 }
 public function detail($usertujuan_id)
 {
   $data['title'] = 'Laporan';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $tahunpenilaian = $this->db->get_where('options', ['name' =>
   'tahunpenilaian'])->row_array();
  $data['tahunpenilaian']=$tahunpenilaian['value'];
   $bulanpenilaian = $this->db->get_where('options', ['name' =>
   'bulanpenilaian'])->row_array();
  $data['bulanpenilaian']=$bulanpenilaian['value'];

   $data['usertujuan'] = $this->db->get_where('user', ['id' =>
   $usertujuan_id])->row_array();
   $data['user_tujuan']=$data['usertujuan']['id'];
   $data['user_asal']=$data['user']['id'];
   $data['namagurutujuan']=$data['usertujuan']['name'];
   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $data['listkategori'] = $this->Kuisioner_model->get_listkategoriuser($usertujuan_id);
   $data['list_role'] = $this->Kuisioner_model->get_listrole();
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
   $tahunpenilaian = $this->db->get_where('options', ['name' =>
   'tahunpenilaian'])->row_array();
  $data['tahunpenilaian']=$tahunpenilaian['value'];
   $bulanpenilaian = $this->db->get_where('options', ['name' =>
   'bulanpenilaian'])->row_array();
  $data['bulanpenilaian']=$bulanpenilaian['value'];

   $data['usertujuan'] = $this->db->get_where('user', ['id' =>
   $usertujuan_id])->row_array();
   $data['user_tujuan']=$data['usertujuan']['id'];
   $data['user_asal']=$data['user']['id'];
   $data['namagurutujuan']=$data['usertujuan']['name'];
   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $data['listkategori'] = $this->Kuisioner_model->get_listkategoriuser($usertujuan_id);
   $data['list_role'] = $this->Kuisioner_model->get_listrole();
 //  $this->load->view('cetaklaporandetail', $data);
 $html = $this->load->view('cetaklaporandetail', $data, true);
 // create pdf using dompdf
 $filename = 'laporanpkgdetail_pdf' . date('dmY') . '_' . date('His');
 $paper = 'F4';
 $orientation = 'potrait';
 pdf_create($html, $filename, $paper, $orientation);
 }

 public function hapus()
 {
   $data['title'] = 'Hapus Penilaian';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $tahunpenilaian = $this->db->get_where('options', ['name' =>
   'tahunpenilaian'])->row_array();
  $data['tahunpenilaian']=$tahunpenilaian['value'];
   $bulanpenilaian = $this->db->get_where('options', ['name' =>
   'bulanpenilaian'])->row_array();
  $data['bulanpenilaian']=$bulanpenilaian['value'];

   $this->load->model('Kuisioner_model', 'Kuisioner_model');
   $iduserasal = $data['user']['id'];
   $data['listuser'] = $this->Kuisioner_model->get_listuser($iduserasal);
   $data['user_asal']=$data['user']['id'];
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('hapus', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   
 }
 public function hapus_nilai($id)
  {
    $tahunpenilaian = $this->db->get_where('options', ['name' =>
    'tahunpenilaian'])->row_array();
   $tahunpenilaian=$tahunpenilaian['value'];
    $bulanpenilaian = $this->db->get_where('options', ['name' =>
    'bulanpenilaian'])->row_array();
   $bulanpenilaian=$bulanpenilaian['value'];

   $this->db->where('tahunpenilaian', $tahunpenilaian);
   $this->db->where('bulanpenilaian', $bulanpenilaian);
    $this->db->where('user_tujuan', $id);
    $this->db->delete('bank_penilaian');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('kuisioner/hapus');
  }

  public function detailuser_nilai($id)
  {
    $data['title'] = 'Hapus Penilaian';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $tahunpenilaian = $this->db->get_where('options', ['name' =>
    'tahunpenilaian'])->row_array();
   $data['tahunpenilaian']=$tahunpenilaian['value'];
    $bulanpenilaian = $this->db->get_where('options', ['name' =>
    'bulanpenilaian'])->row_array();
   $data['bulanpenilaian']=$bulanpenilaian['value'];

    $this->load->model('Kuisioner_model', 'Kuisioner_model');

    $data['listuserpenilai'] = $this->Kuisioner_model->get_listuserpenilai($id);
    $data['user_asal']=$data['user']['id'];
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('detailuser_nilai', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    
  }

  public function hapus_nilaiuser($id,$user_tujuan)
  {
    $tahunpenilaian = $this->db->get_where('options', ['name' =>
    'tahunpenilaian'])->row_array();
   $tahunpenilaian=$tahunpenilaian['value'];
    $bulanpenilaian = $this->db->get_where('options', ['name' =>
    'bulanpenilaian'])->row_array();
   $bulanpenilaian=$bulanpenilaian['value'];

   $this->db->where('tahunpenilaian', $tahunpenilaian);
   $this->db->where('bulanpenilaian', $bulanpenilaian);
    $this->db->where('user_tujuan', $user_tujuan);
    $this->db->where('user_asal', $id);
    $this->db->delete('bank_penilaian');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('kuisioner/hapus');
  }
  //end
}