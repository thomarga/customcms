<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']="Daftar Kategori";
		$data['categories'] = $this->dataload->getallcategories('categories');
		$data['file']="allcategory";
		$data['status'] = 'baru';
		$data['idcategory'] = '';
		$data['category_name'] = '';
		$this->load->view('table_template',$data);
	}

	public function edit($id = 0)
	{
		$tampung = $this->dataload->getcategorybyid('categories',$id);
		$data = array(
			'title' => "Daftar Kategori",
			'status' => 'lama',
			'file' => 'allcategory',
			'category_name' => $tampung[0]['category_name'],
			'idcategory' => $tampung[0]['idcategory'],
			'categories' => $this->dataload->getallcategories('categories')
		);
		$this->load->view('table_template',$data);
	}

	public function save()
	{
		if ($_POST) {
			$status = $this->input->post('status');
			if ($status == 'baru') {
				$data['category_name'] = $this->input->post('category_name');
				$result = $this->dataload->savecategory('categories',$data);
				if ($result == 1) {
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Tambah Kategori</strong></div>");
					header('location:'.base_url().'cms-admin/category');
				}
			}else{
				$id = $this->input->post('idcategory');
				$data = array('category_name' => $this->input->post('category_name'));
				$result = $this->dataload->updatecategory('categories', $data, $id);
				if ($result) {
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Update Kategori</strong></div>");
					header('location:'.base_url().'cms-admin/category');
				}
			}
		}
	}

	public function delete($id = 0)
	{
		$result = $this->dataload->deletecategory('categories',$id);
		if ($result) {
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Berhasil Hapus Kategori</strong></div>");
			header('location:'.base_url().'cms-admin/category');
		}
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */