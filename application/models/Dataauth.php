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

/*  public function checkUser($data = array()){
		$this->db->select($this->'iduser');
		$this->db->from($this->'users');
		$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();

		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			$data['modified'] = date("Y-m-d H:i:s");
			$update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
			$userID = $prevResult['id'];
		}else{
			$data['created'] = date("Y-m-d H:i:s");
			$data['modified'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert($this->tableName,$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:FALSE;
  }*/
}
?>
