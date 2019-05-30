<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	


	public function get_blog_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
			$this->db->select('blg.*,cat.CATEGORY_NAME');
			$this->db->from('blogs as blg');
			$this->db->join('blog_category as cat','cat.CATEGORY_ID=blg.CATEGORY_ID','LEFT');	
			//$this->db->join('blog_master_tags as bmst','bmst.TAG_ID=blg.TAG_ID','LEFT');	
			if($group_by!=false){
				$this->db->group_by($group_by);
			}	
			$query = $this->db->get();
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


public function add_blog(){
		$input = $this->input->post();
		if (empty($_FILES['POST_IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$POST_IMAGE = $this->db->get_where('blogs',array('ID'=>$this->input->post('ID')))->row()->POST_IMAGE;
				else:	
					$POST_IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('POST_IMAGE'))
					{
						echo $this->upload->display_errors();
					}					
					$file = $this->upload->data();
					$POST_IMAGE  = $file['file_name'];
				}

				$insert  = array( 
					'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
					//'TAG_ID'=> json_encode($input['TAG_ID']),
					'POST_IMAGE'=> $POST_IMAGE,
					'POST_NAME'=> $this->input->post('POST_NAME'),
					'POST_TITLE'=> $this->input->post('POST_TITLE'),
					'POST_CONTENT'=> $this->input->post('POST_CONTENT'),
					'POST_DATE' => date('Y-m-d h:i:s'),
					'POST_STATUS' =>'1',
				);
		if(!empty($this->input->post('ID'))):
			return $this->db->update('blogs',$insert,array('ID'=>$this->input->post('ID')));
		else:
			return $this->db->insert('blogs',$insert);

		endif;
	}

/*==============================================Testimonial===================================*/


		public function get_testimonial_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
			//$this->db->join('users as usr','cls.USERID=usr.USERID','LEFT');
			
			if($group_by!=false){
				$this->db->group_by($group_by);
			}	
			$query = $this->db->get('testimonial');
			//echo $this->db->last_query(); die();
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


public function add_testimonial(){
		$input = $this->input->post();
		if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$IMAGE = $this->db->get_where('testimonial',array('ID'=>$this->input->post('ID')))->row()->IMAGE;
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

				$insert  = array( 
					
					'IMAGE'=> $IMAGE,
					'NAME'=> $this->input->post('NAME'),
					'ABOUT'=> $this->input->post('ABOUT'),
					'CONTENT'=> $this->input->post('CONTENT'),
					'CREATED_ON' => date('Y-m-d h:i:s'),
					'STATUS' =>'1',
				);
		if(!empty($this->input->post('ID'))):
			return $this->db->update('testimonial',$insert,array('ID'=>$this->input->post('ID')));
		else:
			return $this->db->insert('testimonial',$insert);

		endif;
	}
	
	
}