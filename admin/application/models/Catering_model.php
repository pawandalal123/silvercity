<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catering_model extends CI_Model {

	
/*------------------------------------MENU CATEGORY-------------------------------------------------*/



public function get_catering_category_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
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
			$query = $this->db->get('catering_details');
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
			return $this->db->update('catering_details',$insertRec,array('CATID'=>$this->input->post('CATID')));

		else:
			return $this->db->insert('catering_details',$insertRec);
		endif;
	}


	/*--------------------------------------Sub Category-----------------------------------------------*/



public function get_catering_subcategory_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
				if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}	
			 $this->db->order_by('rand()');
			 
			$this->db->select('scat.*,cat.CATEGORY_NAME');
			$this->db->from('catering_subcategory as scat');
			$this->db->join('catering_details as cat','scat.CATID=cat.CATID','LEFT');	
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

	public function add_catering_subcategory(){

			$input = $this->input->post();
		if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('SUBID'))):
					$IMAGE = $this->db->get_where('catering_subcategory',array('SUBID'=>$this->input->post('SUBID')))->row()->IMAGE;
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
			return $this->db->update('catering_subcategory',$insertRec,array('SUBID'=>$this->input->post('SUBID')));

		else:
			return $this->db->insert('catering_subcategory',$insertRec);
		endif;
	}


/*====================================Party Images==============================================*/

	public function add_catering_party_images(){


		$input = $this->input->post();
		if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$IMAGE = $this->db->get_where('catering_party_images',array('ID'=>$this->input->post('ID')))->row()->IMAGE;
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
							'CAT_ID'=> $this->input->post('CAT_ID'),
							'IMAGE'=> $IMAGE,
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'STATUS' =>'1'
						);
		//print_r($insertRec); die;
		if(!empty($this->input->post('ID'))):			
			return $this->db->update('catering_party_images',$insertRec,array('ID'=>$this->input->post('ID')));

		else:
			return $this->db->insert('catering_party_images',$insertRec);
		endif;

	}
	





public function get_party_images($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
				if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}	
			 $this->db->order_by('rand()');
			 
			$this->db->select('scat.*,cat.CATEGORY_NAME');
			$this->db->from('catering_party_images as scat');
			$this->db->join('catering_details as cat','scat.CAT_ID=cat.CATID','LEFT');	
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


/*=====≠≠≠=======================================================================*/

/*====================================Party Packages Images==============================================*/

	public function add_catering_party_packages_images(){


		$input = $this->input->post();
		if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$IMAGE = $this->db->get_where('catering_party_packages_images',array('ID'=>$this->input->post('ID')))->row()->IMAGE;
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
							'CAT_ID'=> $this->input->post('CAT_ID'),
							'IMAGE_LABEL'=>$this->input->post('image_label'),
							'IMAGE'=> $IMAGE,
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'STATUS' =>'1'
						);
		//print_r($insertRec); die;
		if(!empty($this->input->post('ID'))):			
			return $this->db->update('catering_party_packages_images',$insertRec,array('ID'=>$this->input->post('ID')));

		else:
			return $this->db->insert('catering_party_packages_images',$insertRec);
		endif;

	}
	





public function get_party_packages_images($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
				if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}	
			 $this->db->order_by('rand()');
			 
			$this->db->select('scat.*,cat.CATEGORY_NAME');
			$this->db->from('catering_party_packages_images as scat');
			$this->db->join('catering_details as cat','scat.CAT_ID=cat.CATID','LEFT');	
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


/*=====≠≠≠=======================================================================*/



	

}