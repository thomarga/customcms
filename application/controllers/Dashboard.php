<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	/** 
	catatan :

	VIEWS:
	form_template = template yang berhubungan dengan input data <form>
	table_template = template yang berhubungan dengan daftar data <table>
	biasanya desain <form> dan </table> beda css dan js.

	CONTROLLER:
	list = daftar post
	insert = input post
	*/

	public function allpost() //Daftar
	{
		$data['title']="Daftar Post"; //Title bar dan Judul
		$data['file']="allpost"; //file didalam views/contents
		$this->load->view('table_template',$data);
	}
	public function addpost()
	{
		$data['title']="Input Post";
		$data['file']="addpost";
		$this->load->view('form_template',$data);
	}
}
