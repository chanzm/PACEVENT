<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peristiwa extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
  		$this->load->model('model_data','peristiwa');
	}


}