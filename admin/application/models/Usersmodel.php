<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersmodel extends CI_Model {
	public function login($data) {

		
		$username = $data['USERNAME'];
		$password = md5($data['PASSWORD']);

		$dologin = $this->db->query("select * from tbl_users where (USERNAME = '$username' or EMAIL = '$username') and PASSWORD = '$password' and STATUS = '1'");
		return $dologin;
	}

	public function register($data) {
		$doregister = $this->db->insert('users', $data);
		$user = $this->db->get_where('users', ['USERID' => $this->db->insert_id()]);
		return $user;
	}

	public function getAll() {
		$getAll = $this->db->get('users');
		return $getAll->result();
	}

	public function checkUsername($username) {
		$checkUsername = $this->db->get_where('users', ['USERNAME' => $username])->num_rows();
		return $checkUsername;
	}

	public function byId($id) {
		$byId = $this->db->get_where('users', ['USERID' => $id]);
		return $byId->row();
	}

	public function update($data, $id) {
		$this->db->set($data);
		$this->db->where('USERID', $id);
		$update = $this->db->update('users');
		return $update;
	}

	public function delete($id) {
		$this->db->where('USERID', $id);
		$delete = $this->db->delete('users');
		return $delete;
	}
	
	
	
	public function update_password(){
		$input = $this->input->post();
		$password  = md5($this->input->post('new_password'));
	return $this->db->update('users',array('PASSWORD'=>$password),array('USERID'=>$this->session->userdata('USERID')));
//echo $this->db->last_query();

	}
}