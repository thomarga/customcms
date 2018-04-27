<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('dataauth');
		$this->load->helper('url');
		$this->load->library('twilio-php-master/Twilio/autoload.php');

		$sid = 'AC7a3ce58e9918317f3394fa4b39cfc0bd';
		$token = '1c88238c5e54b795c7dad5899a964092';
		$client = new Client($sid, $token);

		$client->messages->create(
    // the number you'd like to send the message to
    '+6282215151992',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+14053516287 ',
        // the body of the text message you'd like to send
        'body' => "Hey Jenny! Good luck on the bar exam!"
    )
);
	}

}
