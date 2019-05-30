<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_CONTROLLER {
	public function __construct() {
		parent::__construct();
		$this->load->model('usersmodel');
		if($this->session->login !== true) redirect(base_url('login'));
	}

	public function index() {
		$data = ['users' => $this->usersmodel->getAll()];
		$this->load->view('users', $data);
	}

	public function edit($id) {
		$data = ['user' => $this->usersmodel->byId($id)];
		$this->load->view('users_edit', $data);
	}

	public function doedit($id) {
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email')
		];

		$password = $this->input->post('password');
		if($password){
			$data['password'] = md5($password);
		}

		if($password && ($password !== $this->input->post('password_confirm'))) {
			echo json_encode(['success' => false, 'data' => 'Password not match']);
			exit();
		}

		$doedit = $this->usersmodel->update($data, $id);
		if($doedit) {
			echo json_encode(['success' => true]);
		}else{
			echo json_encode(['success' => false, 'data' => 'User updated failed']);
		}
	}

	public function create() {
		$this->load->view('users_create');
	}

	public function delete($id) {
		$this->usersmodel->delete($id);
		$this->session->set_flashdata('msg', 'User deleted successfully.');
		redirect(base_url('users'));
	}
}