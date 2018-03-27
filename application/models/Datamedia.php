<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Datamedia extends CI_Model {
	
	public function __construct()
        {
            $this->load->database();
        }
		
	public function list_image() {
		return $this->db->query("SELECT * FROM media WHERE media_name LIKE '%.jpg' OR media_name LIKE '%.jpeg' OR media_name LIKE '%.png' OR media_name LIKE '%.ico' OR media_name LIKE '%.gif' OR media_name LIKE '%.tiff' OR media_name LIKE '%.svg' OR media_name LIKE '%.bmp' ORDER BY idmedia DESC")->result();
	}
	
	public function insert_media($data) {
		return $this->db->insert('media',$data); 
    }
	
	
	public function edit_media($where,$table) {		
		return $this->db->get_where($table,$where);
	}
	
	public function update_media($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	function delete_media($where,$table) {
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>
