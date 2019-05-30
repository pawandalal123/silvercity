<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_CONTROLLER {
	public function __construct() {
		parent::__construct();
		$this->load->model('usersmodel');
	}

	public function index() {
		if($this->session->login == true) redirect(base_url('dashboard'));
		$this->load->view('register');
	}

	public function doregister() {
		$data = [
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'status' => 'active'
		];
		if(!$data['name'] || !$data['username'] || !$data['email'] || !$this->input->post('password')) {
				echo json_encode(['success' => false, 'data' => 'Please fill all required fields.']);
		}elseif($this->input->post('password') !== $this->input->post('password_confirm')) {
				echo json_encode(['success' => false, 'data' => 'Password not match.']);
		}elseif($this->usersmodel->checkUsername($data['username']) > 0) {
				echo json_encode(['success' => false, 'data' => 'Username already exists.']);
		}else{
			$doregister = $this->usersmodel->register($data);
			$register = $doregister->row();
			if($doregister) {
				if(!$this->input->post('dontlogin')) {
					$data_session = [
						'username' => $data['username'],
						'name' => $register->name,
						'login' => true
					];					
					$this->session->set_userdata($data_session);
				}
				echo json_encode(['success' => true]);
			}else{
				echo json_encode(['success' => false, 'data' => 'Can\'t register, please try again later.']);
			}			
		} 
	}
}