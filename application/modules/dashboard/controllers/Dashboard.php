<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
       // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bulansekarang']=date('m');
        $data['bulansekarangshort']=date('n');
        $data['row']='0';
        $query = $this->db->query("select * from user where role_id='2'");
        $jumlahguru = $query->num_rows();
        $data['jumlahguru']=$jumlahguru;
        $query = $this->db->query("select * from user where role_id='3'");
        $jumlahsiswa = $query->num_rows();
        $data['jumlahsiswa']=$jumlahsiswa;
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('themes/backend/footer');
    }
}
