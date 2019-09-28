<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesiswaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function transfersiswa()
    {
        $data['title'] = 'Transfer Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['psbsetting'] = $this->db->get_where('psb_setting', ['id' =>
       '1'])->row_array();
        $tahunpsb = $data['psbsetting']['tahunajaranaktif'];
        $this->load->model('kesiswaan_model', 'kesiswaan_model');
        $data['calonsiswa'] = $this->kesiswaan_model->getdatacalon($tahunpsb);
        $data['siswa'] = $this->kesiswaan_model->getdatasiswa($tahunpsb);
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('transfersiswa', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        
    }
    public function transfersiswaok($noformulir)
    {
        $query = $this->db->query('SELECT * FROM psb_siswa where noformulir='.$noformulir);
        $jumlah = $query->num_rows();
if($jumlah<'1'){        
        $this->db->select('`psb_siswa2`.tanggaldaftar,`psb_siswa2`.tahunpsb,`psb_siswa2`.gelombang,`psb_siswa2`.noformulir,`psb_siswa2`.namasiswa,`psb_siswa2`.alamatsiswa,`psb_siswa2`.kotasiswa,`psb_siswa2`.hpsiswa,`psb_siswa2`.sekolahasal');
        $this->db->from('psb_siswa2');
        $this->db->where('psb_siswa2.noformulir',$noformulir);
        $query=$this->db->get();
        foreach ($query->result() as $row) {
              $this->db->insert('psb_siswa',$row);
        }
        
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Sukses Transfer !</div>');
    }else{
        
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Data Sudah Ada !</div>');
    }
        redirect('kesiswaan/transfersiswa');    
    }
    //end 
}