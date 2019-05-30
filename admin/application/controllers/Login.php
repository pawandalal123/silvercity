<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		header('Access-Control-Allow-Origin: *'); 
		$this->load->model('usersmodel');
		$this->load->library('form_validation');
	}

	public function index() {
		if($this->session->userdata('login') == true) {
			
			redirect(base_url('ourstory'));
		}
		$this->load->view('admin/login');
	}

	public function dologin() {
		$username = $this->input->post('USERNAME');
		$password = $this->input->post('PASSWORD');

		$data = [
			'USERNAME' => $username,
			'PASSWORD' => $password
		];
		$dologin = $this->usersmodel->login($data);
		//echo $this->db->last_query();die;
		$logged_in = $dologin->row();
		if($dologin->num_rows() > 0) {
			$data_session = [
				'USERNAME' => $username,
				'NAME' => $logged_in->NAME,
				'USERID' => $logged_in->USERID,
				'LOGIN_TYPE' => true,
				'USER_TYPE' => $logged_in->LOGIN_TYPE
				
			];
			$this->session->set_userdata($data_session);
      if($this->input->post('remember_me')) {
          $this->load->helper('cookie');
          $cookie = $this->input->cookie('ci_session');
          $this->input->set_cookie('ci_session', $cookie, '31557600');
      }
			echo json_encode(['success' => true]);

		}else{
			echo json_encode(['success' => false]);
			//echo $this->db->last_query(); die();
		}
	}
	
	
	
	public function updatepass(){

		//print_r($this->input->post()); die;

		//$this->form_validation->set_rules('old_password','Old Password','required');

		$this->form_validation->set_rules('new_password','New Password','required');

		$this->form_validation->set_rules('confirm_password','Confirm Password','required');

		if($this->form_validation->run()==false){

			echo json_encode(['success'=>false,'msg'=> validation_errors(),'type'=>'danger']);

		}

		else if($this->input->post('new_password')!=$this->input->post('confirm_password')){

			echo json_encode(['success'=>false,'msg'=>'New password and confirm password does not match.','type'=>'danger']);

		} else {
			//echo "1"; die;

			if($this->usersmodel->update_password()){

				echo json_encode(['success'=>true,'msg'=>'Update Successfully.']);

			} else {

				echo json_encode(['success'=>false,'msg'=>'Technical ESUES']);

			}

		}

	}
	

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}