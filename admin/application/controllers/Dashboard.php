<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if($this->session->login !== true) redirect(base_url('login'));
	}

	public function index($v=1) {
		if($v==2) {
			$this->load->view('dashboard');
		}else{
			$this->load->view('dashboard1');
		}
	}
}