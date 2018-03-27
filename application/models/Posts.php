<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Model {


	// posts model

	public function getposts()
	{

		$this->db->select('posts.idpost, posts.title, posts.slug, posts.content, posts.date_published, posts.post_status, users.iduser, users.name');
		$this->db->from('posts');
		$this->db->join('users', 'users.iduser = posts.iduser', 'inner');
		$this->db->where('users.iduser', 3);
		return $this->db->get()->result();
	}

	public function getpostbyid($table,$id)
	{
		$this->db->where('idpost', $id);
		return $this->db->get($table)->row_array();
	}

	public function categories_post($id)
	{
		$this->db->select('categories.idcategory, categories.category_name');
		$this->db->from('categories');
		$this->db->join('categories_detail', 'categories_detail.idcategory = categories.idcategory', 'inner');
		$this->db->join('posts', 'posts.idpost = categories_detail.idpost', 'inner');
		$this->db->where('posts.idpost', $id);
		return $this->db->get()->result_array();
	}

	public function tags_post($id)
	{
		$this->db->select('tags.idtag, tags.tag');
		$this->db->from('tags');
		$this->db->join('posts_tags', 'posts_tags.idtag = tags.idtag', 'inner');
		$this->db->join('posts', 'posts.idpost = posts_tags.idpost', 'inner');
		$this->db->where('posts.idpost', $id);
		return $this->db->get()->result_array();
	}

	public function savepost($table,$data)
	{
		return $this->db->insert($table, $data);
	}

	public function deletepost($table,$id)
	{
		$this->db->where('idpost', $id);
		return $this->db->delete($table);
	}

	public function postscategories($id)
	{
		$this->db->select('posts.*, users.*');
		$this->db->from('posts');
		$this->db->join('categories_detail', 'categories_detail.idpost = posts.idpost', 'inner');
		$this->db->join('users', 'users.iduser = posts.iduser', 'inner');
		$this->db->join('categories', 'categories.idcategory = categories_detail.idcategory', 'inner');
		$this->db->where('categories.idcategory', $id);
		return $this->db->get()->result();
	}

	public function countposts($id)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->join('categories_detail', 'categories_detail.idpost = posts.idpost', 'inner');
		$this->db->join('categories', 'categories.idcategory = categories_detail.idcategory', 'inner');
		$this->db->where('categories.idcategory', $id);
		return $this->db->get()->num_rows();
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

	public function getalltags($table)
	{
		

	}

	
}
