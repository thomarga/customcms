<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dataauth extends CI_Model{

  public function __construct()
  {
    $this->load->database();
  }

  public function regvisitor($data)
  {
    return $this->db->insert('users',$data);
  }
   public function cek_visitor($where)
  {
    return $this->db->get_where('users',$where);
  }
}
?>
