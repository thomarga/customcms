<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index()
	{	
		$data['title']="Login User"; //Title bar dan Judul
		$this->load->view('login_template',$data);
	}
	
}
