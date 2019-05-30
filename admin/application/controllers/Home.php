<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_CONTROLLER {
	public function __construct() {
		parent::__construct();

		
		$this->load->library('form_validation');

	}

	public function index() 
	{
		$data=[];
	
    			$this->load->view('index',$data);
    	
    		
	}






}