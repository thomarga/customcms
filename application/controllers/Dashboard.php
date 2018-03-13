<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	/** 
	catatan :

	VIEWS:
	form_template = template yang berhubungan dengan input data <form>
	table_template = template yang berhubungan dengan daftar data <table>
	biasanya desain <form> dan </table> beda css dan js.

	CONTROLLER:
	list = daftar post
	insert = input post
	*/

	public function Index()
	{
		echo "dashboard";
	}

	
}
