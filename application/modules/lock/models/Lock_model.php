<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lock_model extends CI_Model
{
  public function get_role()
  {

    $this->db->select('`bank_kategori`.*');
    $this->db->from('bank_kategori');
    $this->db->order_by('bank_kategori.kategori', 'asc');
    return $this->db->get()->result_array();
  }
  //end
}