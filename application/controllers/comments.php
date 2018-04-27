<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Googlereg extends CI_Controller {

	public function __construct(){
		parent::__construct();
		include_once  APPPATH.'third_party/src/Google_Client.php';
		include_once  APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
	 	$this->load->model('comments');
		$this->load->helper('url');
		$this->load->library('facebook');
	}

    public function google_login()
	{
		$clientId = '845681883757-6f6gurpicmebjqs7ac8pjtibtsk63pba.apps.googleusercontent.com'; //Google client ID
		$clientSecret = 'hFil4SHHNJ1EnUMTVnccjFUu'; //Google client secret
		$redirectURL =base_url() . 'Googlereg/google_login';
		
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
            // Preparing data for database insertion
            $userData['jenis_auth'] = 'google';
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
            $userData['picture_url'] = $userProfile['picture'];
           

            $where = array(
			'jenis_auth'=>$userData['jenis_auth'],
			'email'=>$userData['email']);

            $cek= $this->comments->cek_visitor($where)->num_rows();
            if($cek>0){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else
            {
            	
            	$data= array(
            		'jenis_auth'=>$userData['jenis_auth'],
            		'firstname'=>$userData['first_name'],
            		'lastname'=>$userData['last_name'],
            		'email'=>$userData['email'],
            		'picture'=>$userData['picture_url']);
            	$this->comments->regvisitor($data);
            } 
        }
		else 
		{
			 
           $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
         $this->load->view('home',$userData);
	}
		
    
    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        $this->facebook->destroy_session();
        $this->session->unset_userdata('userData');
        redirect('/Googlereg');
    }

    public function login_facebook()
    {
    	
		//$userData = array();

		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

						// Preparing data for database insertion
						$userData['jenis_auth'] = 'facebook';
						$userData['first_name'] = $userProfile['first_name'];
						$userData['last_name'] = $userProfile['last_name'];
						$userData['email'] = $userProfile['email'];
						$userData['picture_url'] = $userProfile['picture']['data']['url'];
						

			$where = array(
			'jenis_auth'=>$userData['jenis_auth'],
			'email'=>$userData['email']);

            $cek= $this->comments->cek_visitor($where)->num_rows();
            if($cek>0){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else
            {
            	
            	$data= array(
            		'jenis_auth'=>$userData['jenis_auth'],
            		'firstname'=>$userData['first_name'],
            		'lastname'=>$userData['last_name'],
            		'email'=>$userData['email'],
            		'picture'=>$userData['picture_url']);
            	$this->dataauth->regvisitor($data);
            } 
		}else{
		
			$url =$this->facebook->login_url();
		    header("Location: $url");
            exit;
				
				}

		// Load login & profile view

				$this->load->view('home',$userData);
    }
	

}



