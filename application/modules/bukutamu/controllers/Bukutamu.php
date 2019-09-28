<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Bukutamu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // surat_masuk
 public function index()
 {
   $data['title'] = 'BukuTamu';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('bukutamu_model', 'bukutamu_model');
   $data['tahunskrg']=date('Y');
   $data['tanggalskrg']=date('Y-m-d');
   $tanggalskrg=date('Y-m-d');
   $data['bukutamuskrg'] = $this->bukutamu_model->get_bukutamu_bytgl($tanggalskrg);
   $this->form_validation->set_rules('tahun', 'tahun', 'required');
   $this->form_validation->set_rules('nomor', 'nomor', 'required');
   $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
   $this->form_validation->set_rules('nama', 'nama', 'required');
   $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
   $this->form_validation->set_rules('hp', 'hp', 'required');
   $this->form_validation->set_rules('maksud', 'maksud', 'required');
   $this->form_validation->set_rules('diterima', 'diterima', 'required');
   $this->form_validation->set_rules('catatan', 'catatan', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('bukutamu', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'tahun' => $this->input->post('tahun'),
         'nomor' => $this->input->post('nomor'),
         'tanggal' => $this->input->post('tanggal'),
         'nama' => $this->input->post('nama'),
         'jabatan' => $this->input->post('jabatan'),
         'hp' => $this->input->post('hp'),
         'maksud' => $this->input->post('maksud'),
         'diterima' => $this->input->post('diterima'),
         'catatan' => $this->input->post('catatan')
          ];
          $this->db->insert('bukutamu', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bukutamu');
   }
 }
 public function edit_bukutamu($id)
  {
    $data['title'] = 'BukuTamu';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['tahunskrg']=date('Y');
    $data['tanggalskrg']=date('Y-m-d');
    $tanggalskrg=date('Y-m-d');
    $data['bukutamuskrg'] = $this->bukutamu_model->get_bukutamu_bytgl($tanggalskrg);

    $data['get_bukutamu'] = $this->bukutamu_model->get_bukutamu_byId($id);

    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    $this->form_validation->set_rules('nomor', 'nomor', 'required');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
    $this->form_validation->set_rules('hp', 'hp', 'required');
    $this->form_validation->set_rules('maksud', 'maksud', 'required');
    $this->form_validation->set_rules('diterima', 'diterima', 'required');
    $this->form_validation->set_rules('catatan', 'catatan', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_bukutamu', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'tahun' => $this->input->post('tahun'),
        'nomor' => $this->input->post('nomor'),
        'tanggal' => $this->input->post('tanggal'),
        'nama' => $this->input->post('nama'),
        'jabatan' => $this->input->post('jabatan'),
        'hp' => $this->input->post('hp'),
        'maksud' => $this->input->post('maksud'),
        'diterima' => $this->input->post('diterima'),
        'catatan' => $this->input->post('catatan')
         ];
          $this->db->where('id', $id);
          $this->db->update('bukutamu', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bukutamu');
    }
  }
  public function hapus_bukutamu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('bukutamu');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('bukutamu');
  }

  public function kirimsms($id)
  {
    $this->db->set('status','1');
    $this->db->where('id', $id);
    $this->db->update('bukutamu');
    $hp_kepsek=apisms('hp_kepsek');
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['get_bukutamu'] = $this->bukutamu_model->get_bukutamu_byId($id);
    $tanggal = $data['get_bukutamu']['tanggal'];
    $nama = $data['get_bukutamu']['nama'];
    $jabatan = $data['get_bukutamu']['jabatan'];
    $maksud = $data['get_bukutamu']['maksud'];
    $diterima = $data['get_bukutamu']['diterima'];
    $catatan = $data['get_bukutamu']['catatan'];
    $pesan = "Info Buku Tamu hari ini : $nama, $jabatan, Maksud:$maksud, Diterima:$diterima, Catatan:$catatan";
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">'.$pesan.'</div>');
    redirect('bukutamu');
  }
  //end
  public function laporan_bukutamu()
  {
    $data['title'] = 'Laporan BukuTamu';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->load->model('bukutamu_model', 'bukutamu_model');
    $daritanggal = date('Y-m-01');
    $sampaitanggal = date('Y-m-d');
    if (isset($_POST['submit'])) {
      $daritanggal = $this->input->post('daritanggal');
      $sampaitanggal = $this->input->post('sampaitanggal');
      $data['bukutamu'] = $this->bukutamu_model->bukutamu_darisampai($daritanggal, $sampaitanggal);
    }
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('laporan_bukutamu', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }
  public function laporanbukutamu_print($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan BukuTamu';
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['bukutamu'] = $this->bukutamu_model->bukutamu_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $this->load->view('laporan_bukutamuprint', $data);
  }
  public function laporanbukutamu_pdf($daritanggal, $sampaitanggal)
  {
    $data['title'] = 'Laporan BukuTamu';
    $this->load->model('bukutamu_model', 'bukutamu_model');
    $data['bukutamu'] = $this->bukutamu_model->bukutamu_darisampai($daritanggal, $sampaitanggal);
    $data['daritanggal'] = $daritanggal;
    $data['sampaitanggal'] = $sampaitanggal;
    $html = $this->load->view('laporan_bukutamupdf', $data, true);
    // create pdf using dompdf
    $filename = 'laporan_bukutamupdf' . date('dmY') . '_' . date('His');
    $paper = 'A4';
    $orientation = 'potrait';
    pdf_create($html, $filename, $paper, $orientation);
  }
  //end
}