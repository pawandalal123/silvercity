<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function get_category($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
				if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
			$this->db->select('blgcat.*,usr.NAME');
			$this->db->from('blog_category as blgcat');
			$this->db->join('users as usr','usr.USERID=blgcat.CREATED_BY','LEFT');	
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

	public function add_category(){

		$insertRec  = array(
							'CATEGORY_NAME'=> $this->input->post('CATEGORY_NAME'),
							'CREATED_BY'=> $this->session->userdata('USERID'),
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'CATEGORY_STATUS' =>'1'
						);
		if(!empty($this->input->post('CATEGORY_ID'))):			
			return $this->db->update('blog_category',$insertRec,array('CATEGORY_ID'=>$this->input->post('CATEGORY_ID')));

		else:
			return $this->db->insert('blog_category',$insertRec);
		endif;
	}


/*------------------------------------MENU CATEGORY-------------------------------------------------*/



public function get_category_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
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
			$query = $this->db->get('ourstory_details');
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}

	public function add(){
		$insertRec  = array(
							'CATEGORY_NAME'=> $this->input->post('CATEGORY_NAME'),
							'ORDER_BY'=> $this->input->post('ORDER_BY'),
							'TAGID'=> $this->input->post('TAGID'),
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'MODIFIED_ON' => date('Y-m-d h:i:s'),
							'CATEGORY_STATUS' =>'1'
						);
		if(!empty($this->input->post('CATID'))):			
			return $this->db->update('ourstory_details',$insertRec,array('CATID'=>$this->input->post('CATID')));

		else:
			return $this->db->insert('ourstory_details',$insertRec);
		endif;
	}


	/*--------------------------------------Sub Category-----------------------------------------------*/



public function get_subcategory_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
				if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}	
			 $this->db->order_by('rand()');
			 
			$this->db->select('scat.*,cat.CATEGORY_NAME');
			$this->db->from('ourstory_subcategory as scat');
			$this->db->join('ourstory_details as cat','scat.CATID=cat.CATID','LEFT');	
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

	public function add_subcategory(){

			$input = $this->input->post();
		if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('SUBID'))):
					$IMAGE = $this->db->get_where('ourstory_subcategory',array('SUBID'=>$this->input->post('SUBID')))->row()->IMAGE;
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
							'CATID'=> $this->input->post('CATID'),
							'SUB_NAME'=> $this->input->post('SUB_NAME'),
							'IMAGE'=> $IMAGE,
							'CONTENTS'=> $this->input->post('CONTENTS'),
							//'CREATED_BY'=> $this->session->userdata('USERID'),
							'CRETAED_ON' => date('Y-m-d h:i:s'),
							'MODIFIED_ON' => date('Y-m-d h:i:s'),
							'SUB_STATUS' =>'1'
						);
		if(!empty($this->input->post('SUBID'))):			
			return $this->db->update('ourstory_subcategory',$insertRec,array('SUBID'=>$this->input->post('SUBID')));

		else:
			return $this->db->insert('ourstory_subcategory',$insertRec);
		endif;
	}




	/*--------------------------------------Gallery Category-------------------------------------*/





public function get_gallery_category_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
					
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
			$query = $this->db->get('gallary_category');
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}

	public function add_gallery_category(){

		$insertRec  = array(
							'CATEGORY_NAME'=> $this->input->post('CATEGORY_NAME'),
							//'CREATED_BY'=> $this->session->userdata('USERID'),
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'MODIFIED_ON' => date('Y-m-d h:i:s'),
							'CATEGORY_STATUS' =>'1'
						);
		if(!empty($this->input->post('GCID'))):			
			return $this->db->update('gallary_category',$insertRec,array('GCID'=>$this->input->post('GCID')));

		else:
			return $this->db->insert('gallary_category',$insertRec);
		endif;
	}


	
	

}