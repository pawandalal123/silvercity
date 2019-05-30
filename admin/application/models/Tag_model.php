<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {


	/*----------------------------------------------Gallery Tag--------------------------------------------------------*/



public function get_gallery_tag_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
			if($order_by!=false){
				$this->db->order_by($order_by,$order);
			}		
			if($group_by!=false){
				$this->db->group_by($group_by);
			}		
			$query = $this->db->get('gallary_tag');
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


public function add_gallery_tag(){

		$insertRec  = array(
							
							'TAG_NAME'=> $this->input->post('TAG_NAME'),
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'MODIFIED_ON' => date('Y-m-d h:i:s'),
							'TAG_STATUS' =>'1'
						);
		if(!empty($this->input->post('GTAGID'))):			
			return $this->db->update('gallary_tag',$insertRec,array('GTAGID'=>$this->input->post('GTAGID')));

		else:
			return $this->db->insert('gallary_tag',$insertRec);
		endif;
	}

	/*-=============================================================Blog Tag=========================================*/



public function get_blog_tag_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
			$this->db->select('blgt.*,blgmt.TAG_NAME,blg.AUTHOR');
			$this->db->from('blog_tags as blgt');
			$this->db->join('blog_master_tags as blgmt','blgmt.TAG_ID=blgt.TAG_ID','LEFT');	
			$this->db->join('blogs as blg','blgt.POST_ID=blg.ID','LEFT');	
			$this->db->join('users as usr','usr.USERID=blgt.USER_ID','LEFT');	
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


public function add_blog_tag(){

		$insertRec  = array(
							$insertId  = $this->db->insert_id(),
							'POST_ID'=> $insertId,
							'TAG_ID'=> $this->input->post('TAG_ID'),
							'IP'=> $this->input->post('IP'),
							'USER_ID'=> $this->input->userdata('USERID'),
							'TAG_AGENT'=> $this->input->post('TAG_AGENT'),
							'CREATED_DATE' => date('Y-m-d h:i:s')
							
						);
		if(!empty($this->input->post('ID'))):			
			return $this->db->update('blog_tags',$insertRec,array('ID'=>$this->input->post('ID')));

		else:
			return $this->db->insert('blog_tags',$insertRec);
		endif;
	}



	/*===================================get_our_story_tag===============================================*/


public function get_our_story_tag($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
			
			if($group_by!=false){
				$this->db->group_by($group_by);
			}	
			$query = $this->db->get('our_story_tags');
			//echo $this->db->last_query(); die();
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


public function add_our_story_tag(){

		$insertRec  = array(
							
							'TAG_NAME'=> $this->input->post('TAG_NAME'),
							/*'SLUG'=> str_replace(' ', '_', $this->input->post('TAG_NAME')),*/
							'CREATED_ON' => date('Y-m-d h:i:s'),
							/*'CREATED_BY'=> $this->session->userdata('USERID'),*/
							'TAG_STATUS' =>'1'
						);
		if(!empty($this->input->post('NTID'))):			
			return $this->db->update('our_story_tags',$insertRec,array('NTID'=>$this->input->post('NTID')));

		else:
			return $this->db->insert('our_story_tags',$insertRec);
		endif;
	}

/*========================================================================================*/





	/*===================================get_cuisine_tag===============================================*/


public function get_cuisine_tag($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
			
			if($group_by!=false){
				$this->db->group_by($group_by);
			}	
			$query = $this->db->get('cuisine_tags');
			//echo $this->db->last_query(); die();
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


public function add_cuisine_tag(){

		$insertRec  = array(
							
							'TAG_NAME'=> $this->input->post('TAG_NAME'),
							/*'SLUG'=> str_replace(' ', '_', $this->input->post('TAG_NAME')),*/
							'CREATED_ON' => date('Y-m-d h:i:s'),
							/*'CREATED_BY'=> $this->session->userdata('USERID'),*/
							'TAG_STATUS' =>'1'
						);
		if(!empty($this->input->post('NTID'))):			
			return $this->db->update('cuisine_tags',$insertRec,array('NTID'=>$this->input->post('NTID')));

		else:
			return $this->db->insert('cuisine_tags',$insertRec);
		endif;
	}

/*========================================================================================*/






	/*===================================get_catering_tag===============================================*/


public function get_catering_tag($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
				
			
			if($group_by!=false){
				$this->db->group_by($group_by);
			}	
			$query = $this->db->get('catering_tags');
			//echo $this->db->last_query(); die();
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


public function add_catering_tag(){

		$insertRec  = array(
							
							'TAG_NAME'=> $this->input->post('TAG_NAME'),
							/*'SLUG'=> str_replace(' ', '_', $this->input->post('TAG_NAME')),*/
							'CREATED_ON' => date('Y-m-d h:i:s'),
							/*'CREATED_BY'=> $this->session->userdata('USERID'),*/
							'TAG_STATUS' =>'1'
						);
		if(!empty($this->input->post('NTID'))):			
			return $this->db->update('catering_tags',$insertRec,array('NTID'=>$this->input->post('NTID')));

		else:
			return $this->db->insert('catering_tags',$insertRec);
		endif;
	}

/*========================================================================================*/



}