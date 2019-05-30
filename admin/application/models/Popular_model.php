<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popular_model extends CI_Model {


public function get_class_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
				$this->db->select('cls.*');
			$this->db->from('popular as cls');
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


public function add_class(){

	$input = $this->input->post();

			if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('CLID'))):
					$IMAGE = $this->db->get_where('popular',array('CLID'=>$this->input->post('CLID')))->row()->IMAGE;
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
							'DESCRIPTION'=> $input['DESCRIPTION'],
							'STATUS' =>'1'
						);
		if(!empty($this->input->post('CLID'))):			
			return $this->db->update('popular',$insertRec,array('CLID'=>$this->input->post('CLID')));

		else:
			return $this->db->insert('popular',$insertRec);
		endif;
	}



}