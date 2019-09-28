<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Kesiswaan_model extends CI_Model
{

        public function getdatacalon($tahunpsb)
        {
            $this->db->select('`psb_siswa2`.*');
            $this->db->from('psb_siswa2');
            $this->db->where('psb_siswa2.tahunpsb',$tahunpsb);
            return $this->db->get()->result_array();

        }
        public function getdatasiswa($tahunpsb)
        {
            $this->db->select('`psb_siswa`.*');
            $this->db->from('psb_siswa');
            $this->db->where('psb_siswa.tahunpsb',$tahunpsb);
            return $this->db->get()->result_array();

        }
//end
}