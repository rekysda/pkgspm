<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner_model extends CI_Model
{
  public function get_listuser($iduserasal)
  {
    $this->db->select('user.*');
    $this->db->from('user');
    $this->db->join('user_access_user', 'user_access_user.tujuan_id = user.id');
    $this->db->where('user_access_user.asal_id',$iduserasal);
    return $this->db->get()->result_array();
  }
  
  public function get_listkategori($role_id)
  {
    $this->db->select('bank_kategori.*');
    $this->db->from('bank_kategori');
    $this->db->join('user_access_kategori', 'user_access_kategori.kategori_id = bank_kategori.id');
    $this->db->where('user_access_kategori.role_id',$role_id);
    $this->db->order_by('bank_kategori.id','asc');
    return $this->db->get()->result_array();
  }

  public function get_listquestion($role_id)
  {
    $this->db->select('bank_soal.*');
    $this->db->from('bank_soal');
    $this->db->join('user_access_kategori', 'user_access_kategori.kategori_id = bank_soal.kategori_id');
    $this->db->where('user_access_kategori.role_id',$role_id);
    $this->db->order_by('bank_soal.id','asc');
    return $this->db->get()->result_array();
  }

  public function get_listkategoriuser($user_tujuan)
  {
    $this->db->select('bank_kategori.*,bank_penilaian.user_tujuan,bank_penilaian.kategori_id');
    $this->db->from('bank_kategori');
    $this->db->join('bank_penilaian', 'bank_penilaian.kategori_id = bank_kategori.id');
    $this->db->where('bank_penilaian.user_tujuan',$user_tujuan);
    $this->db->group_by('bank_kategori.id','asc');
    return $this->db->get()->result_array();
  }
<<<<<<< HEAD
  public function get_listrole()
  {
    $this->db->select('user_role.*');
    $this->db->from('user_role');
    $this->db->group_by('user_role.id','asc');
=======
  public function get_listuserpenilai($id)
  {
    $this->db->select('user.name,bank_penilaian.user_asal,bank_penilaian.user_tujuan');
    $this->db->from('user');
    $this->db->join('bank_penilaian', 'bank_penilaian.user_asal = user.id');
    $this->db->where('bank_penilaian.user_tujuan',$id);
    $this->db->group_by('bank_penilaian.user_asal');
>>>>>>> d553814ce57e92ad61c85ccd67ea48d0b67c088b
    return $this->db->get()->result_array();
  }
  //end
}