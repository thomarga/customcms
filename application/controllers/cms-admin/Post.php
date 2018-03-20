<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']="Semua Pos";
		$data['file']="posts/allpost";
		$data['posts'] = $this->dataload->getposts(); 
		$this->load->view('table_template',$data);
	}

	public function view($id = '')
	{
		$data['post'] = $this->dataload->getpostbyid('posts',$id);
		$data['categories'] = $this->dataload->categories_post($id);
		$data['tags'] = $this->dataload->tags_post($id);
		// print_r($data); die();
		$data['file']="posts/show";
		$this->load->view('form_template',$data);
	}

	public function add()
	{
		$data['title']="Tambah Pos";
		$data['file']="posts/addpost";
		$data['categories'] = $this->dataload->getallcategories('categories');
		$this->load->view('form_template',$data);
	}


	public function save()
	{
		$slug = url_title($this->input->post('title'));

		$tags = explode(",",$this->input->post('tag'));
		$categories = $this->input->post('category');

		$datetime = date('Y-m-d H:i:s');

		$idpost = uniqid();

		$action = $this->input->get_post("actionbtn");
		switch ($action) {
			case 'terbit':
				$data = array(
					'idpost' => $idpost,
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'featured_image' => 'image.jpg',
					'date_published' => $datetime,
					'slug' => $slug,
					'post_status' => '1',
					'iduser' => 3
				);
				$this->dataload->savepost('posts',$data);

				foreach ($tags as $tag) {
					$idtag = uniqid();
					$data = array(
						'idtag' => $idtag,
						'tag' => $tag
					);
					$this->dataload->savepost('tags',$data);
					
					$data = array(
						'idpost' => $idpost,
						'idtag' => $idtag
					);
					$this->dataload->savepost('posts_tags', $data);

				}

				foreach ($categories as $category) {
					
					$data = array(
						'idpost' => $idpost,
						'idcategory' => $category
					);
					$this->dataload->savepost('categories_detail', $data);

				}
				
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Pos Telah Terbit</strong></div>");
				redirect('cms-admin/posts-all');
				
				
				break;

			case 'konsep':
				$data = array(
					'idpost' => $idpost,
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'featured_image' => 'image.jpg',
					'date_published' => $datetime,
					'slug' => $slug,
					'post_status' => '2',
					'iduser' => 3
				);
				$this->dataload->savepost('posts',$data);

				foreach ($tags as $tag) {
					$idtag = uniqid();
					$data = array(
						'idtag' => $idtag,
						'tag' => $tag
					);
					$this->dataload->savepost('tags',$data);
					
					$data = array(
						'idpost' => $idpost,
						'idtag' => $idtag
					);
					$this->dataload->savepost('posts_tags', $data);

				}

				foreach ($categories as $category) {
					
					$data = array(
						'idpost' => $idpost,
						'idcategory' => $category
					);
					$this->dataload->savepost('categories_detail', $data);

				}

				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Post Disimpan Di Konsep</strong></div>");
				redirect('cms-admin/posts-all');
			break;
			default:
		}

	}

	public function gettags()
	{
		$this->db->select('tag');
		$query = $this->db->get('tags')->result_array();
		
		print_r($query);
	}

	public function delete($id= '')
	{
		$this->dataload->deletepost('posts_tags',$id);
		$this->dataload->deletepost('categories_detail',$id);
		$this->dataload->deletepost('posts',$id);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Post Berhasil Dihapus</strong></div>");
		redirect('cms-admin/posts-all');
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */