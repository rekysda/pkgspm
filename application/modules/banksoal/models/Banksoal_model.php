<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banksoal_model extends CI_Model
{
  public function get_kategori()
  {

    $this->db->select('`bank_kategori`.*');
    $this->db->from('bank_kategori');
    $this->db->order_by('id', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_kategori_byId($id)
  {

    $this->db->select('`bank_kategori`.*');
    $this->db->from('bank_kategori');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_soal()
  {

    $this->db->select('`bank_soal`.*,bank_kategori.kategori');
    $this->db->from('bank_soal');
    $this->db->join('bank_kategori', 'bank_kategori.id = bank_soal.kategori_id');
    $this->db->order_by('bank_soal.id', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_soal_byId($id)
  {

    $this->db->select('`bank_soal`.*');
    $this->db->from('bank_soal');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  public function get_jawab()
  {

    $this->db->select('`bank_jawab`.*');
    $this->db->from('bank_jawab');
    $this->db->order_by('bank_jawab.skor', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_jawab_byId($id)
  {

    $this->db->select('`bank_jawab`.*');
    $this->db->from('bank_jawab');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
  }
  //end
}