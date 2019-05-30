<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_model extends CI_Model {


public function get_work_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
				$this->db->select('wht.*');
			$this->db->from('work_process as wht');
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


public function add_work(){

	$input = $this->input->post();

			if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$IMAGE = $this->db->get_where('work_process',array('ID'=>$this->input->post('ID')))->row()->IMAGE;
				else:	
					$IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/images/';
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

			if (empty($_FILES['HOWER_IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$HOWER_IMAGE = $this->db->get_where('work_process',array('ID'=>$this->input->post('ID')))->row()->HOWER_IMAGE;
				else:	
					$HOWER_IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/images/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('HOWER_IMAGE'))
					{
						echo $this->upload->display_errors();
					}				
					$file = $this->upload->data();
					$HOWER_IMAGE  = $file['file_name'];
				}	



		$insertRec  = array(
							
							
							'TITLE'=> $input['TITLE'],
							'IMAGE'=> $IMAGE,
							'HOWER_IMAGE'=> $HOWER_IMAGE,
							'DESCRIPTION'=> $input['DESCRIPTION'],
							'STATUS' =>'1'
						);
		//print_r($insertRec); die;
		if(!empty($this->input->post('ID'))):			
			return $this->db->update('work_process',$insertRec,array('ID'=>$this->input->post('ID')));

		else:
			return $this->db->insert('work_process',$insertRec);
		endif;
	}



}