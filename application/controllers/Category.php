<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('posts');
	}

	public function index()
	{
		$data['title']="Daftar Kategori";
		$data['categories'] = $this->posts->getallcategories('categories');
		$data['file']="categories/allcategory";
		$data['status'] = 'baru';
		$data['idcategory'] = '';
		$data['category_name'] = '';
		$this->load->view('table_template',$data);
	}

	public function view($id='')
	{
		$tampung = $this->posts->getcategorybyid('categories',$id);
		$data = array(
			'title' => 'Kategori',
			'category_name' => $tampung[0]['category_name'],
			'posts' => $this->posts->postscategories($id),
			'counts' => $this->posts->countposts($id),
			'file' => 'categories/category'
		);
		$this->load->view('table_template',$data);
	}

	public function edit($id = 0)
	{
		$tampung = $this->posts->getcategorybyid('categories',$id);
		$data = array(
			'title' => "Daftar Kategori",
			'status' => 'lama',
			'file' => 'categories/allcategory',
			'category_name' => $tampung[0]['category_name'],
			'idcategory' => $tampung[0]['idcategory'],
			'categories' => $this->posts->getallcategories('categories')
		);
		$this->load->view('table_template',$data);
	}

	public function save()
	{
		if ($_POST) {
			$status = $this->input->post('status');
			if ($status == 'baru') {
				$data['category_name'] = $this->input->post('category_name');
				$result = $this->posts->savecategory('categories',$data);
				if ($result == 1) {
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Tambah Kategori</strong></div>");
					header('location:'.base_url().'category');
				}
			}else{
				$id = $this->input->post('idcategory');
				$data = array('category_name' => $this->input->post('category_name'));
				$result = $this->posts->updatecategory('categories', $data, $id);
				if ($result) {
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Update Kategori</strong></div>");
					header('location:'.base_url().'category');
				}
			}
		}
	}

	public function delete($id = '')
	{
		$this->posts->deletecategory('categories_detail',$id);
		$this->posts->deletecategory('categories',$id);
		
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Hapus Kategori</strong></div>");
		header('location:'.base_url().'category');
		
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */