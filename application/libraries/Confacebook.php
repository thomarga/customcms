<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Confacebook {
	public function Confacebook(){
    require_once('facebookphpsdk/Exceptions/FacebookResponsException');
    require_once('facebookphpsdk/Exceptions/FacebookSDKException');

		$appId      ='1818707595097118';
    $appSecret  ='834d343aafe1a435e1db2e0bd388cda2';
    $redirectURL='http://localhost/customcms/';
    $fbPermissions=array('email');

    $fb = new Facebook(array(
      'app_id'=>$appId,
      'app_secret'=>$appSecret,
      'default_graph_version' => 'v2.2',));

      $helper = $fb->getRedirecLoginHelper();

      try {
        if(isset($_SESSION['facebook_access_token'])){
          $accessToken = $_SESSION['facebook_access_token'];
        }else{
          $accessToken=$helper->getAccessToken();
        }
      }catch(FacebookResponsException $e)
        {
          echo 'Graph returned an error:'.$e->getMessage();
          exit;
        }catch(FacebookSDKException $e)
        {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
	}
}
