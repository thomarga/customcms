<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dataauth extends CI_Model{

  public function __construct()
  {
    $this->load->database();
  }

  public function register($data)
  {
    return $this->db->insert('users',$data);
  }

  public function cek_login($where)
  {
    return $this->db->get_where('users',$where);
  }

  public function smsreg()
  {
    $hasil=$this->db->query("SELECT * from users");
    return $hasil;
  }
}
?>
