<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		require_once APPPATH.'third_party/src/Google_Client.php';
		require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
		$this->load->model('dataauth');
		$this->load->helper('url');
		$this->load->library('facebook');
	}

	public function index()
	{
		$data['title']="Login User"; //Title bar dan Judul
		$data['file']="login";

		$userData = array();

		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

						// Preparing data for database insertion
						$userData['oauth_provider'] = 'facebook';
						$userData['oauth_uid'] = $userProfile['id'];
						$userData['first_name'] = $userProfile['first_name'];
						$userData['last_name'] = $userProfile['last_name'];
						$userData['email'] = $userProfile['email'];
						$userData['gender'] = $userProfile['gender'];
						$userData['locale'] = $userProfile['locale'];
						$userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
						$userData['picture_url'] = $userProfile['picture']['data']['url'];

						// Insert or update user data
				//   $userID = $this->user->checkUser($userData);

			// Check user data insert or update status
				//   if(!empty($userID)){
								$data['userData'] = $userData;
							//  $this->session->set_userdata('userData',$userData);
				//    } else {
						//   $data['userData'] = array();
					//  }

			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
						$fbuser = '';

			// Get login URL
						$data['authUrl'] =  $this->facebook->login_url();
				}

		// Load login & profile view

				$this->load->view('login_template',$data);

	}
public function logout() {
			// Remove local Facebook session
			$this->facebook->destroy_session();
			// Remove user data from session
			$this->session->unset_userdata('userData');
			// Redirect to login page
					redirect('Auth');
			}


	public function register()
	{
		$data['title']="Register User"; //Title bar dan Judul
		$data['file']="register";
		$this->load->view('login_template',$data);
	}
	public function fbregister()
	{
		$data['title']="Register User"; //Title bar dan Judul
		$data['file']="register";
		$this->load->view('facebook/register_template',$data);
	}

	public function registerdata()
	{
		//$pass1=$this->input->post('password');
		//$pass2=$this->input->post('pass');
		//if($pass1==$pass2)
		//{
			$data = array(
				'name' =>$this->input->post('name'),
				'email' =>$this->input->post('email'),
				'password' =>md5($this->input->post('pass')),
				'username'=>$this->input->post('username'),
				'role'=>$this->input->post('role')
			);
			$this->dataauth->register($data);
			redirect('auth/register');
		//}else {
			# code...
			//$this->form_validation->set_message('registerdata',"Password dan Retypepassword harus sama !");

		//}

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

	public function google_login()
	{
		$clientId = '845681883757-6f6gurpicmebjqs7ac8pjtibtsk63pba.apps.googleusercontent.com'; //Google client ID
		$clientSecret = 'Bd_acHzMdg-QoBQwIZVvbVUX'; //Google client secret
		$redirectURL = base_url() . 'Dashboard/allpost';

		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);

		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token']))
		{
			$gClient->setAccessToken($_SESSION['token']);
		}

		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			echo "<pre>";
			print_r($userProfile);
			die;
        }
		else
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}

}
