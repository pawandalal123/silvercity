<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	

public function get_gallery_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
					
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
			$this->db->select('galr.*,gcat.CATEGORY_NAME,gtag.TAG_NAME');
			$this->db->from('gallary as galr');	
			$this->db->join('gallary_category as gcat','gcat.GCID = galr.GCID','left');
			$this->db->join('gallary_tag as gtag','gtag.GTAGID = galr.GTAGID','left');
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

	/*public function add_gallery(){

		$input = $this->input->post();
		if (empty($_FILES['THUMB_IMAGE']['name'])) {
				if(!empty($this->input->post('GID'))):
					$THUMB_IMAGE = $this->db->get_where('gallary',array('GID'=>$this->input->post('GID')))->row()->THUMB_IMAGE;
				else:	
					$THUMB_IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$config_manip = array(
					        'image_library' => 'gd2',
					        'source_image' => $source_path,
					        'new_image' => $target_path,
					        'maintain_ratio' => TRUE,
					        'create_thumb' => TRUE,
					        'thumb_marker' => '_thumb',
					        'width' => 150,
					        'height' => 150
					    );
					    $this->image_lib->resize();			
					$file = $this->upload->data();
					$THUMB_IMAGE  = $file['file_name'];
				}




				if (empty($_FILES['ORIGINAL_IMAGE']['name'])) {
				if(!empty($this->input->post('GID'))):
					$ORIGINAL_IMAGE = $this->db->get_where('gallary',array('GID'=>$this->input->post('GID')))->row()->ORIGINAL_IMAGE;
				else:	
					$ORIGINAL_IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('ORIGINAL_IMAGE'))
					{
						echo $this->upload->display_errors();
					}					
					$file = $this->upload->data();
					$ORIGINAL_IMAGE  = $file['file_name'];
				}

		$insertRec  = array(
							'GCID'=> $this->input->post('GCID'),
							'GTAGID'=> $this->input->post('GTAGID'),
							'HEADER'=> $this->input->post('HEADER'),
							'TITLE'=> $this->input->post('TITLE'),
							'THUMB_IMAGE'=> $THUMB_IMAGE,
							'ORIGINAL_IMAGE'=> $ORIGINAL_IMAGE,
							//'CREATED_BY'=> $this->session->userdata('USERID'),
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'MODIFIED_ON' => date('Y-m-d h:i:s'),
							
						);
		if(!empty($this->input->post('GID'))):			
			return $this->db->update('gallary',$insertRec,array('GID'=>$this->input->post('GID')));
		else:
			return $this->db->insert('gallary',$insertRec);
		endif;
	}

*/


public function get_gallery_image($GID,$limit=false){
	 //   $award_id = $this->db->get_where('award_images',array('AID'=>$AID))->result_array();
	    $this->db->select("*");
        $this->db->where_in('GID',$GID);
        if($limit!=false):
        $this->db->limit($limit);
        endif;
        $this->db->order_by('rand()');
        $query = $this->db->get('gallery_images');
       // echo $this->db->last_query();die;
        return $query->result_array();
	}



	/*public function add_gallery(){
	    
		$input = $this->input->post();

		$insertRec  = array(
							'GCID'=> $this->input->post('GCID'),
							'GTAGID'=> $this->input->post('GTAGID'),
							'HEADER'=> $this->input->post('HEADER'),
							'TITLE'=> $this->input->post('TITLE'),
							//'THUMB_IMAGE'=> $THUMB_IMAGE,
							//'ORIGINAL_IMAGE'=> $ORIGINAL_IMAGE,
							//'CREATED_BY'=> $this->session->userdata('USERID'),
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'MODIFIED_ON' => date('Y-m-d h:i:s'),
						);


		if(!empty($this->input->post('GID'))):			
			 $this->db->update('gallary',$insertRec,array('GID'=>$this->input->post('GID')));
			 $insertID = $input['GID'];
		else:
			 $this->db->insert('gallary',$insertRec);
			 $insertID = $this->db->insert_id();
		endif;
		
		$filesCount = count($_FILES['ORIGINAL_IMAGE']['name']);
		for($i = 0; $i < $filesCount; $i++):
                $_FILES['userFile']['name'] = $_FILES['ORIGINAL_IMAGE']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['ORIGINAL_IMAGE']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['ORIGINAL_IMAGE']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['ORIGINAL_IMAGE']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['ORIGINAL_IMAGE']['size'][$i];

                $uploadPath = './uploads/image/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                     $insertImage = array(
							'GID'=> $insertID,
							'ORIGINAL_IMAGE' => $fileData['file_name'],
							'CREATED_ON' => date('Y-m-d h:i:s')
					);
					$this->db->insert('gallery_images',$insertImage);
                }
        endfor;
		return $insertID;


	
	}
	*/
	
	
	
	public function add_gallery(){
	    
		$input = $this->input->post();
		
		$insertRec  = array(
							'GCID'=> $this->input->post('GCID'),
							'GTAGID'=> $this->input->post('GTAGID'),
							'HEADER'=> $this->input->post('HEADER'),
							'TITLE'=> $this->input->post('TITLE'),
							'CREATED_ON' => date('Y-m-d h:i:s'),
							'MODIFIED_ON' => date('Y-m-d h:i:s'),
						);


		if(!empty($this->input->post('GID'))):			
			 $this->db->update('gallary',$insertRec,array('GID'=>$this->input->post('GID')));
			 $insertID = $input['GID'];
		else:
			 $this->db->insert('gallary',$insertRec);
			 $insertID = $this->db->insert_id();
		endif;
		
		$filesCount = count($_FILES['ORIGINAL_IMAGE']['name']);
		for($i = 0; $i < $filesCount; $i++):
                $_FILES['userFile']['name'] = $_FILES['ORIGINAL_IMAGE']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['ORIGINAL_IMAGE']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['ORIGINAL_IMAGE']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['ORIGINAL_IMAGE']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['ORIGINAL_IMAGE']['size'][$i];

                $uploadPath = './uploads/image/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|zip';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $zip = new ZipArchive;
                chmod($res,0777);
				$res = $zip->open($_FILES['ORIGINAL_IMAGE']['tmp_name'][$i]);
				
				if ($res === TRUE) {
				$zip->extractTo($uploadPath);
				$zip->close();
				} else {
					if($this->upload->do_upload('userFile')){
                        $fileData = $this->upload->data();
                         $insertImage = array(
    							'GID'=> $insertID,
    							'ORIGINAL_IMAGE' => './uploads/image/'.$fileData['file_name'],
    							'CREATED_ON' => date('Y-m-d h:i:s')
    					);
    					$this->db->insert('gallery_images',$insertImage);
                    }
				}



            /*    if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $folderPath = basename($fileData['file_name'],".zip");
                    $files = glob("./uploads/image/".$folderPath."/*.*");
                    if(!empty($files)):
                        for ($i=0; $i<count($files); $i++)
                          {
                            $image = $files[$i];
                            $supported_file = array(
                                    'gif',
                                    'jpg',
                                    'jpeg',
                                    'png'
                             );
            
                            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                            if (in_array($ext, $supported_file)) {
                            $insertImage = array(
        											'GID'=> $insertID,
        											'ORIGINAL_IMAGE' => $image,
        											'CREATED_ON' => date('Y-m-d h:i:s')
        									       );
        
        					$this->db->insert('gallery_images',$insertImage);
                            } 
                          } 
                    endif;      
                }*/

        endfor;
        print_r($insertImage);die;
		return $insertID;


	
	}


/*=====================================BANNER UPLOAD=====================*/





public function get_banner_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
					
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
			
			if($group_by!=false){
				$this->db->group_by($group_by);
			}		
			$query = $this->db->get('banner');
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}

	public function add_banner(){

		$input = $this->input->post();

				if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('BID'))):
					$IMAGE = $this->db->get_where('banner',array('BID'=>$this->input->post('BID')))->row()->IMAGE;
				else:	
					$IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['width']   = '1960';
                    $config['height']  = '700';
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
							'BANNER_NAME'=> $this->input->post('BANNER_NAME'),
							'BANNER_PAGE'=> $this->input->post('BANNER_PAGE'),
							'HEADER'=> $this->input->post('HEADER'),
							'ABOUT'=> $this->input->post('ABOUT'),
							'IMAGE'=> $IMAGE,
							'CREATED_ON' => date('Y-m-d h:i:s'),
							
						);
		if(!empty($this->input->post('BID'))):			
			return $this->db->update('banner',$insertRec,array('BID'=>$this->input->post('BID')));
		else:
			return $this->db->insert('banner',$insertRec);
		endif;
	}



public function get_index_images_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
					
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
			
			if($group_by!=false){
				$this->db->group_by($group_by);
			}		
			$query = $this->db->get('index_images');
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}


	public function add_index_images(){

		$input = $this->input->post();
		//print_r($input); die;

				if (empty($_FILES['IMAGE']['name'])) {
				if(!empty($this->input->post('ID'))):
					$IMAGE = $this->db->get_where('index_images',array('ID'=>$this->input->post('ID')))->row()->IMAGE;
				else:	
					$IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/images/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['width']   = '1960';
                    $config['height']  = '700';
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
					$HOWER_IMAGE = $this->db->get_where('index_images',array('ID'=>$this->input->post('ID')))->row()->HOWER_IMAGE;
				else:	
					$HOWER_IMAGE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/images/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['width']   = '1960';
                    $config['height']  = '700';
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
							'SECTION_ID'=> $this->input->post('SECTION_ID'),
							'HEADER'=> $this->input->post('HEADER'),
							'ABOUT'=> $this->input->post('ABOUT'),
							'IMAGE'=> $IMAGE,
							'HOWER_IMAGE'=> $HOWER_IMAGE,
							'CREATED_ON' => date('Y-m-d h:i:s')
							
						);
		if(!empty($this->input->post('ID'))):			
			return $this->db->update('index_images',$insertRec,array('ID'=>$this->input->post('ID')));
		else:
			return $this->db->insert('index_images',$insertRec);
		endif;
	}

}


