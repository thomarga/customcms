<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Googlereg extends CI_Controller {

	public function __construct(){
		parent::__construct();
		include_once  APPPATH.'third_party/src/Google_Client.php';
		include_once  APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
	 	$this->load->model('dataauth');
		$this->load->helper('url');
		$this->load->library('facebook');
	}

	public function index()
	{
		$data['title']="Login User"; //Title bar dan Judul
		$data['file']="login";
		$this->load->view('login_template',$data);

	}

	public function register()
	{
		$data['title']="Register User"; //Title bar dan Judul
		$data['file']="register";
		$this->load->view('login_template',$data);
	}

	public function registerdata()
	{
		$kode =$this->random(4);
		$status='0';
			$data = array(
				'name' =>$this->input->post('name'),
				'email' =>$this->input->post('email'),
				'password' =>md5($this->input->post('pass')),
				'username'=>$this->input->post('username'),
				'role'=>$this->input->post('role'),
				'kodereg'=>$kode,
				'status'=>$status
			);
			$this->dataauth->register($data);
			redirect('auth/register');
		}

		public function random($panjang)
			{
   			$karakter = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
   			$string = '';
   			for($i = 0; $i < $panjang; $i++)
				{
   				$pos = rand(0, strlen($karakter)-1);
   				$string .= $karakter{$pos};
   			}
    		return $string;
			}
	
			

	public function ceklogin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email'=>$email,
			'password'=>md5($password));
			$cek = $this->dataauth->cek_login($where)->num_rows();
			if($cek>0)
			{
				$data_session=array(
					'nama'=>$username,
					'status'=>"login"
				);
				$this->session->set_userdata($data_session);
				redirect('Dashboard/allpost');
			}else
			{
				echo "<script type='text/javascript'>alert('maaf Username dan Password anda salah !');
      </script>";
		}
	}
  
    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        $this->facebook->destroy_session();
        $this->session->unset_userdata('userData');
        redirect('/Googlereg');
    }
}



