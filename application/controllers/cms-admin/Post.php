<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
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

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */