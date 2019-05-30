<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_CONTROLLER {
	public function __construct() {
		parent::__construct();

		$this->load->model('tag_model','tag');
		$this->load->model('Gallery_model','gallery');
		$this->load->model('Category_model','category');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		if($this->session->LOGIN_TYPE != 1) redirect(base_url('login'));
	}

	public function index(){

      
		$data['category'] = $category =  $this->category->get_gallery_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);

		$data['tag'] = $tag =  $this->tag->get_gallery_tag_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
		$data['gallery'] = $gallery = $this->gallery->get_gallery_list(false, $page=false,'GID','DESC',$cond=false);

		$this->load->view('admin/gallery',$data);
	}
	

	public function view_gallery($gid){
	
		$data['event_gallery'] = $event_gallery = $this->db->get_where('gallery_images',array('GID'=>$gid))->result_array();
		$this->load->view('admin/event_gallery',$data);
	}



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
      //  print_r($insertRec);die;

		if(!empty($this->input->post('GID'))):			
			 $this->db->update('gallary',$insertRec,array('GID'=>$this->input->post('GID')));
			 $insertID = $input['GID'];
		else:
			 $this->db->insert('gallary',$insertRec);
			 $insertID = $this->db->insert_id();
		endif;
		// Image Upload
	
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
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                      $filename = $fileData['file_name'];
                          $source_path =   './uploads/image/'.$filename;
                          $target_path =   './uploads/image/thumb/'.$filename;
                          $config1['image_library'] = 'GD2';
                          $config1['source_image'] = $source_path;
                            $config1['new_image'] = $target_path;
                            $config1['create_thumb'] = TRUE;
                            $config1['maintain_ratio'] = TRUE;
                            $config1['width']     = 500;
                            $config1['height']   = 500;
                            $config1['thumb_marker'] = '';
            
                          
                          $this->load->library('image_lib');
                          $this->image_lib->initialize($config1);
                          $this->image_lib->resize();
                          $this->image_lib->clear();
                     $insertImage = array(
							'GID'=> $insertID,
							'ORIGINAL_IMAGE' => './uploads/image/'.$fileData['file_name'],
							'CREATED_ON' => date('Y-m-d h:i:s')
					);
					$this->db->insert('gallery_images',$insertImage);
                }
			endfor;    
	

       redirect('gallery');
    }

    public function update_gallery(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
			//$this->form_validation->set_rules('GCID','Category Name ','required');
		$this->form_validation->set_rules('GTAGID','Tag Name ','required');
		$this->form_validation->set_rules('HEADER','Header Name ','required');
		$this->form_validation->set_rules('TITLE','Title Name ','required');
		//$this->form_validation->set_rules('THUMB_IMAGE','Thumb Image ','required');
		//$this->form_validation->set_rules('ORIGINAL_IMAGE','Orignal Image ','required');
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->gallery->add_gallery()){
				
             
				//echo json_encode(['success' => true, 'msg' => 'Events update successfully...']);
				 redirect('gallery');
				//echo $this->db->last_query(); die();
			} else {
				echo 'Technical ESUES';
			}
		}
    }
    
    
     public function createthumb(){
       $getData = $this->db->get('tbl_gallery_images')->result_array();
       
       
        $this->load->library('image_lib');
        $i=0;
        foreach($getData as $thmbkey=>$thmbval):
           if(file_exists($thmbval['ORIGINAL_IMAGE'])):
               
                
              $explode = explode('/',$thmbval['ORIGINAL_IMAGE']);
              $source_path = $thmbval['ORIGINAL_IMAGE'];
              $target_path = './uploads/image/thumb/'.end($explode);
             
               
                $config['image_library'] = 'GD2';
                $config['source_image'] = $source_path;
                $config['new_image'] = $target_path;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']     = 500;
                $config['height']   = 500;
                $config['thumb_marker'] = '';

              
              $this->load->library('image_lib');
                          $this->image_lib->initialize($config);
              $this->image_lib->resize();
              $this->image_lib->clear();
              
           endif;
           $i++;
        endforeach;
        
        echo '<pre>';
        print_r($image);die;
        
    }
    

    public function delete_gallery($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('gallary',array('GID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...</div>']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...</div>']);
		}
    }





public function gallery_delete($gid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('gallery_images',array('GIMID'=>$gid))){
			echo json_encode(['success' => true, 'msg' => 'Deleted Successfully.</div>']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error.</div>']);
		}
    }
    
public function gallery_deleteALL(){
    if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
	$input = $this->input->post();	
    foreach($input['val'] as $key=>$val):
     if(is_numeric($val)):
         $this->db->delete('gallery_images',array('GIMID'=>$val));
         //echo $this->db->last_query();die;
     endif;     
    endforeach;    
    echo json_encode(['success' => true, 'msg' => 'Deleted Successfully.']);
}     
    

    /*--------------------------------------------------Gallery Tag------------------------------------------*/



 public function tag(){

      
		$data['tag'] = $tag =  $this->tag->get_gallery_tag_list(false, $page=false,'GTAGID','DESC',$cond=false);
/*print_r($tag); die();*/
		$data['links'] = $this->pagination->create_links();

		$this->load->view('admin/gallery_tag',$data);
	}

	

	public function add_gallery_tag(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_NAME','Tag Name ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		else if(count_data('gallary_tag',array('TAG_NAME'=>$this->input->post('TAG_NAME')))==1){
			echo json_encode(['success' => false, 'msg' => 'This Category Name all ready exists..']);
		}
		else {
			if($this->tag->add_gallery_tag()){
				//echo $this->db->last_query(); die();
			echo json_encode(['success' => true, 'msg' => 'Category added successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function update_gallery_tag(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_NAME','Tag Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->tag->add_gallery_tag()){

             
				echo json_encode(['success' => true, 'msg' => 'Category update successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function delete_gallery_tag($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('gallary_tag',array('GTAGID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_gallery_tag_status($lid){
    	$tag_details = userdata('gallary_tag',array('GTAGID'=>$lid));
    	
		if($tag_details->TAG_STATUS==1):
			$is_active = array('TAG_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('TAG_STATUS'=>1);
			$message = "Verified successfully..";
		endif;

		if($this->db->update('gallary_tag',$is_active,array('GTAGID'=>$lid))){
				$msg  = ''.$tag_details->TAG_NAME.' has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }


    /*========================================Banner Upload=============================*/



 public function banner_upload(){

      
		$data['banner'] = $banner = $this->gallery->get_banner_list(false, $page=false,'GID','DESC',$cond=false);
/*print_r($tag); die();*/
		
		$this->load->view('admin/banner',$data);
	}

	

	public function add_banner(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('BANNER_NAME','Banner Name ','required');
		$this->form_validation->set_rules('BANNER_PAGE','Banner Page ','required');

		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		elseif($this->input->post('BANNER_PAGE')!=0){
			if(count_data('banner',array('BANNER_PAGE'=>$this->input->post('BANNER_PAGE')))>0){
				echo json_encode(['success' => false, 'msg' => 'This Banner Page Image already exists..','type'=>'danger']);
			}
		}
		
		else {
			if($this->gallery->add_banner()){
				//echo $this->db->last_query(); die();
			echo json_encode(['success' => true, 'msg' => 'Banner added successfully...']);
			} else {
				//echo $this->db->last_query(); die();
				echo 'Technical ESUES';
			}
		}
    }

    public function update_banner(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('BANNER_NAME','Banner Name','required');
		$this->form_validation->set_rules('BANNER_PAGE','Banner Page ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 	

		/*elseif($this->input->post('BANNER_PAGE')!=0){
			if(count_data('banner',array('BANNER_PAGE'=>$this->input->post('BANNER_PAGE')))>0){
				echo json_encode(['success' => false, 'msg' => 'This Banner Page Image already exists..','type'=>'danger']);
			}	
		}
*/
		else {

			if($this->gallery->add_banner()){

             
				echo json_encode(['success' => true, 'msg' => 'Banner update successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function delete_banner($bid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('banner',array('BID'=>$bid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }


    public function images(){

    	$data['images'] = $images = $this->gallery->get_index_images_list(false, $page=false,'ID','DESC',$cond=false);

		$this->load->view('admin/images',$data);


    }


     public function add_banner_images(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('SECTION_ID','Select Section','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 	

		
		else {

			if($this->gallery->add_index_images()){

             
				echo json_encode(['success' => true, 'msg' => 'Images update successfully...']);
			} else {
				//echo $this->db->last_query(); die;
				echo 'Technical ESUES';
			}
		}
    }


    public function delete_images($bid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('index_images',array('ID'=>$bid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

}
