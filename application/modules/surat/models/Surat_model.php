<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
  public function get_surat_masuk()
  {

    $this->db->select('`surat_masuk`.*');
    $this->db->from('surat_masuk');
    $this->db->order_by('surat_masuk.nomor', 'desc');
    return $this->db->get()->result_array();
  }
  public function get_surat_masuk_byId($id)
  {

    $this->db->select('`surat_masuk`.*');
    $this->db->from('surat_masuk');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_surat_keluar()
  {

    $this->db->select('`surat_keluar`.*');
    $this->db->from('surat_keluar');
    $this->db->order_by('surat_keluar.nomor', 'desc');
    return $this->db->get()->result_array();
  }
  public function get_surat_keluar_byId($id)
  {

    $this->db->select('`surat_keluar`.*');
    $this->db->from('surat_keluar');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  //end
}