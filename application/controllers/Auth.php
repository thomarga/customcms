<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index() //login
	{	
		$data['title'] = "Login User"; //Title bar dan Judul
		$data['file']="login";
		$this->load->view('auth_template',$data);
	}

	public function register()
	{	
		$data['title'] = "Register User"; //Title bar dan Judul
		$data['file']="register";
		$this->load->view('auth_template',$data);
	}
	
}
