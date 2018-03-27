<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('datamedia');
		$this->load->helper('url');
	}

	public function allmedia()
	{	
		$data['data'] = $this->datamedia->list_image();
		
		$data['title']="All Media";

		$data['file']="media/allmedia";
		$this->load->view('table_template',$data);
	}
	
	public function addmedia()
	{
		$data['title']="Upload Media";
		
		$data['file']="media/addmedia";
		$this->load->view('form_template',$data);
	}
	
	public function create()
	{	
		// memanggil private function untuk upload gambar
		$get_files = $this->upload_media();

			// mendapatkan nama file foto
		$filename = $get_files['file_name'];
		$name = date('ymdHis').'-'.$filename;

			// setup nama thumbnail foto --> hasil foto lebih kecil
		$thumb_foto = $get_files['raw_name'].'_thumb'.$get_files['file_ext'];

		$data = array(
			'idmedia' => $this->input->post('idmedia'),
			'media_name' => $filename,
			'media_caption' => $this->input->post('media_caption'),
			'media_url' => base_url().'uploads/'.$filename
		);
		
		$this->datamedia->insert_media($data);
		redirect('media/allmedia');
	}	
	
	public function edit($idmedia)
	{
		$data['title']="Edit Media";
		
		$where = array(
			'idmedia' => $idmedia
		);
		$data['data'] = $this->datamedia->edit_media($where,'media')->result();
		
		$data['file']="media/editmedia";
		$this->load->view('form_template',$data);
	}
	
	public function update() {

		$idmedia = $this->input->post('idmedia');
		
		$data = array(
			'media_caption' => $this->input->post('media_caption')
		);
		
		$where = array(
			'idmedia' => $idmedia
		);
		
		$this->datamedia->update_media($where,$data,'media');
		redirect('media/allmedia');
	}
	
	public function delete($idmedia) {
		
		$where = array(
			'idmedia' => $idmedia
		);
		
		$this->datamedia->delete_media($where,'media');
		redirect('media/allmedia');
	}

	private function upload_media() {

 		// Setup folder upload path
		$config['upload_path']		= './uploads/';

 		// Setup file yang di izinkan
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|doc|docx';

 		// Encrpt nama foto agar tidak sama
		$config['encrypt_name']		= FALSE;

 		// Memanggil library upload disertai dengan paramter $config array
		$this->load->library('upload', $config);

 		// jika upload gagal, return false
		if( $this->upload->do_upload( 'media_name' ) == false) {
			return false;
 			#return $this->upload->display_errors();
		} 
		
 		// jika upload berhasil, return nama file dan membuat thumbnail foto
		else 
		{
 			// Mengambil data yang berhasil di upload
			$uploaded_data = $this->upload->data();

 			// Mendapatkan nama file
			$file_name = $uploaded_data['file_name'];

 			// Memanggil library GD 2
			$config['image_library'] = 'gd2';

			// Memanggil nama file images
			$config['source_image'] = './uploads/'.$file_name;

			// Membuat thumbnail
			$config['create_thumb'] = FALSE;

			// Mempertahankan foto berdasarkan ratio, hal ini digunakan agar foto tidak gepeng
			$config['maintain_ratio'] = TRUE;

			// Setting lebar dan tinggi
			//$config['width']         = 100;
			//$config['height']       = 100;

			// Memanggil library image_lib untuk memproses images resize disertai dengan parameter $config
			$this->load->library('image_lib', $config);

			// Melakukan resize
			$this->image_lib->resize();

			// Return data
			return $uploaded_data;
		}
	}
}
