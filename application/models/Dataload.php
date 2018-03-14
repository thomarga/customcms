<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Dataload extends CI_Model{
	
	public function __construct()
        {
            $this->load->database();
            $this->load->helper();
        }
	
    public static function tgl_indonesia($date)
    {
		$BulanIndo = array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
					
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl = substr($date, 8, 2);
									
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
	}

	public static function footer()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tahun = date("Y");
		$tulisanfooter = "Copyright &copy; ".$tahun." <a href=''#'>PT. Jogja Media Teknologi</a>. All rights reserved.";
		return($tulisanfooter);
	}

	// category model
	public function getallcategories($table)
	{
		$query = $this->db->get($table);
		return $query->result();
	}

	public function getcategorybyid($table,$id)
	{
		$data = $this->db->get_where($table, array('idcategory' => $id));
		return $data->result_array();
	}

	public function savecategory($table,$data)
	{
		return $this->db->insert($table, $data);
	}

	public function updatecategory($table,$data,$id)
	{
		$this->db->where('idcategory', $id);
		return $this->db->update($table, $data);
	}

	public function deletecategory($table,$id)
	{
		$this->db->where('idcategory', $id);
		return $this->db->delete($table);
	}
}
?>
