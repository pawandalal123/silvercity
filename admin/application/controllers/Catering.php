
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catering extends CI_CONTROLLER {
	public function __construct() {
		parent::__construct();

		$this->load->model('Catering_model','category');
		$this->load->library('form_validation');
		$this->load->model('Tag_model','tag');
		$this->load->library('pagination');
		$this->load->library('CKEditor');
		$this->load->library('CKFinder');
		$this->ckeditor->basePath = base_url().'/assets/ckeditor/';
			$this->ckeditor->config['language'] = 'en';
			$this->ckeditor->config['width'] = '730px';
			$this->ckeditor->config['height'] = '200px'; 
		if($this->session->LOGIN_TYPE != 1) redirect(base_url('login'));
	}




	 public function index(){
		$data['category'] = $category =  $this->category->get_catering_category_list(false, $page=false,'CATID','DESC',$cond=false);
		$data['tag'] = $tag =  $this->tag->get_catering_tag(false, $page=false,'GTAGID','DESC',$cond=false);
		$this->load->view('admin/catering/category',$data);
	}



    public function update_category(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('CATEGORY_NAME','Menu Name','required');
		// $this->form_validation->set_rules('TAGID',' Tag Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->category->add()){

             
				echo json_encode(['success' => true, 'msg' => 'Menu update successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

     public function delete_category($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('catering_details',array('CATID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_category_status($lid){
    	$category_details = userdata('catering_details',array('CATID'=>$lid));
    	
		if($category_details->CATEGORY_STATUS==1):
			$is_active = array('CATEGORY_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('CATEGORY_STATUS'=>1);
			$message = "Verified successfully..";
		endif;

		if($this->db->update('catering_details',$is_active,array('CATID'=>$lid))){
			//echo $this->db->last_query();die;
			$msg  = ''.$category_details->CATEGORY_NAME.' has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }

    	public function catering_content(){
		$data['subcategory'] = $subcategory =  $this->category->get_catering_subcategory_list(false, $page=false,'SUBID','DESC',$cond=false,false);
		$data['category_details'] = $category_details = $this->category->get_catering_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);

		$this->load->view('admin/catering/sub_category',$data);
	}



  /*--------------------------------------------------------------------------------*/

    /*--------------------------------------------------Tag------------------------------------------*/



 public function tag(){

      
		$data['tag'] = $tag =  $this->tag->get_catering_tag(false, $page=false,'GTAGID','DESC',$cond=false);
/*print_r($tag); die();*/
		$data['links'] = $this->pagination->create_links();

		$this->load->view('admin/catering/tag',$data);
	}

	

	public function add_catering_tag(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_NAME','Tag Name ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		else if(count_data('gallary_tag',array('TAG_NAME'=>$this->input->post('TAG_NAME')))==1){
			echo json_encode(['success' => false, 'msg' => 'This Menu Tag Name all ready exists..']);
		}
		else {
			if($this->tag->add_our_story_tag()){
				//echo $this->db->last_query(); die();
			echo json_encode(['success' => true, 'msg' => 'Menu Tag added successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function update_catering_tag(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_NAME','Tag Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->tag->add_our_story_tag()){

             
				echo json_encode(['success' => true, 'msg' => 'Menu Tag update successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function delete_catering_tag($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('gallary_tag',array('GTAGID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_catering_tag_status($lid){
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


/*==========================================================================================================*/


/*------------------------------------ADD Content--------------------------------------------------*/

public function addsub(){
	 $this->ckfinder->SetupCKEditor($this->ckeditor,'../assets/ckfinder/');
		$data['subcategory'] = $subcategory =  $this->category->get_catering_subcategory_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
		$data['category_details'] = $category_details = $this->category->get_catering_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
		$this->load->view('admin/catering/add_subcategory',$data);
    }
	
    public function edit($sid){
    	 $this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/');
    	$data['category_details'] = $category_details = $this->category->get_catering_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
    	$data['subcategory'] = $subcategory =  $this->db->get_where('catering_subcategory',array('SUBID'=>$sid))->row();

    	/*print_r($subcategory); die();*/

		$this->load->view('admin/catering/add_subcategory',$data);
    }


    
	

	public function add_subcategory(){
    	
	/*	$this->form_validation->set_rules('CATID','Category Name ','required');
		$this->form_validation->set_rules('SUB_NAME','Sub Category Name ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		
		else {*/
			if($this->category->add_catering_subcategory()){
			    	redirect('catering/catering_content');
			echo json_encode(['success' => true, 'msg' => 'Menu added successfully...']);
		//	echo $this->db->last_query(); die();
			} else {
				echo 'Technical ESUES';
			}
		
	
		
    }


    public function delete_subcategory($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('catering_subcategory',array('SUBID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_subcategory_status($lid){
    	$sub_details = userdata('catering_subcategory',array('SUBID'=>$lid));
    	
		if($sub_details->SUB_STATUS==1):
			$is_active = array('SUB_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('SUB_STATUS'=>1);
			$message = "Verified successfully..";
		endif;

		if($this->db->update('catering_subcategory',$is_active,array('SUBID'=>$lid))){
			$msg  = 'Status has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);		;
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }

    /*========================================Party images=========================*/


    public function party(){

    	$data['party'] = $party = $this->category->get_party_images($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
    	$data['category_details']  = $this->category->get_catering_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
    	//print_r($category_details); die;
    	$this->load->view('admin/catering/party_image',$data);
    }


     public function add_party_images(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('CAT_ID','Menu Name','required');
		// $this->form_validation->set_rules('TAGID',' Tag Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->category->add_catering_party_images()){

				echo json_encode(['success' => true, 'msg' => 'Menu Party Images updated successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }


    /*============================================================================*/



      /*========================================Party Packeges images=========================*/


    public function party_packages(){

    	$data['party'] = $party = $this->category->get_party_packages_images($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
    	$data['category_details'] = $category_details = $this->category->get_catering_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
    	//print_r($category_details); die;
    	$this->load->view('admin/catering/party_packages_image',$data);
    }


     public function add_party_packages_images(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('CAT_ID','Menu Name','required');
		$this->form_validation->set_rules('image_label','Image Label','required');
		// $this->form_validation->set_rules('TAGID',' Tag Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->category->add_catering_party_packages_images()){

             
				echo json_encode(['success' => true, 'msg' => 'Menu Party Images updated successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }


    /*============================================================================*/

	

}