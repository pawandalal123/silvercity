<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant_model extends CI_Model {


public function get_venue_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
				$this->db->select('wht.*');
			$this->db->from('our_restaurant_vanue as wht');
			//$this->db->join('users as usr','cls.USERID=usr.USERID','LEFT');
			
			if($group_by!=false){
				$this->db->group_by($group_by);
			}	
			$query = $this->db->get();
			//echo $this->db->last_query(); die();
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


public function add_vanue(){

	$input = $this->input->post();

			if (empty($_FILES['VANUE_IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$VANUE_IMAGE = $this->db->get_where('our_restaurant_vanue',array('ID'=>$this->input->post('ID')))->row()->VANUE_IMAGE;
				else:	
					$VANUE_IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('VANUE_IMAGE'))
					{
						echo $this->upload->display_errors();
					}				
					$file = $this->upload->data();
					$VANUE_IMAGE  = $file['file_name'];
				}


				if (empty($_FILES['OFFER_IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$OFFER_IMAGE = $this->db->get_where('our_restaurant_vanue',array('ID'=>$this->input->post('ID')))->row()->OFFER_IMAGE;
				else:	
					$OFFER_IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('OFFER_IMAGE'))
					{
						echo $this->upload->display_errors();
					}				
					$file = $this->upload->data();
					$OFFER_IMAGE  = $file['file_name'];
				}


		$insertRec  = array(
							
							
							'NAME'=> $input['NAME'],
							'TITLE'=> $input['TITLE'],
							'ADDRESS'=> $input['ADDRESS'],
							'VANUE_IMAGE'=> $VANUE_IMAGE,
							'OFFER_IMAGE'=> $OFFER_IMAGE
						);
		//print_r($insertRec); die;
		if(!empty($this->input->post('ID'))):			
			return $this->db->update('our_restaurant_vanue',$insertRec,array('ID'=>$this->input->post('ID')));

		else:
			return $this->db->insert('our_restaurant_vanue',$insertRec);
		endif;
	}





public function get_amenities_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
				
			if($group_by!=false){
				$this->db->group_by($group_by);
			}	
			$query = $this->db->get('our_restaurant_amenities');
			//echo $this->db->last_query(); die();
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


public function add_amenities(){

	$input = $this->input->post();

			if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$IMAGE = $this->db->get_where('our_restaurant_amenities',array('ID'=>$this->input->post('ID')))->row()->IMAGE;
				else:	
					$IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('IMAGE'))
					{
						echo $this->upload->display_errors();
					}				
					$file = $this->upload->data();
					$IMAGE  = $file['file_name'];
				}


				


		$insertRec  = array(
							'TITLE'=> $input['TITLE'],
							'IMAGE'=> $IMAGE,
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'STATUS' =>'1'
						);
		//print_r($insertRec); die;
		if(!empty($this->input->post('ID'))):			
			return $this->db->update('our_restaurant_amenities',$insertRec,array('ID'=>$this->input->post('ID')));

		else:
			return $this->db->insert('our_restaurant_amenities',$insertRec);
		endif;
	}




public function add_chefs(){

	$input = $this->input->post();

			if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$IMAGE = $this->db->get_where('our_restaurant_chefs',array('ID'=>$this->input->post('ID')))->row()->IMAGE;
				else:	
					$IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('IMAGE'))
					{
						echo $this->upload->display_errors();
					}				
					$file = $this->upload->data();
					$IMAGE  = $file['file_name'];
				}


				


		$insertRec  = array(
							'NAME'=> $input['NAME'],
							'DESCRIPTION'=> $input['DESCRIPTION'],
							'IMAGE'=> $IMAGE,
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'STATUS' =>'1'
						);
		//print_r($insertRec); die;
		if(!empty($this->input->post('ID'))):			
			return $this->db->update('our_restaurant_chefs',$insertRec,array('ID'=>$this->input->post('ID')));

		else:
			return $this->db->insert('our_restaurant_chefs',$insertRec);
		endif;
	}



public function get_chefs_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
				
			if($group_by!=false){
				$this->db->group_by($group_by);
			}	
			$query = $this->db->get('our_restaurant_chefs');
			//echo $this->db->last_query(); die();
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}



}