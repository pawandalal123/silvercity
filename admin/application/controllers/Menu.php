
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_CONTROLLER {
	public function __construct() {
		parent::__construct();

		$this->load->model('Menu_model','category');
		$this->load->library('form_validation');
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
		$data['category'] = $category =  $this->category->get_menu_category_list(false, $page=false,'CATID','DESC',$cond=false);
		
		$this->load->view('admin/menu/category',$data);
	}



    public function update_category(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('CATEGORY_NAME','Menu Name','required');
		
		
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
		if($this->db->delete('menu_details',array('CATID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_category_status($lid){
    	$category_details = userdata('menu_details',array('CATID'=>$lid));
    	
		if($category_details->CATEGORY_STATUS==1):
			$is_active = array('CATEGORY_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('CATEGORY_STATUS'=>1);
			$message = "Verified successfully..";
		endif;

		if($this->db->update('menu_details',$is_active,array('CATID'=>$lid))){
			//echo $this->db->last_query();die;
			$msg  = ''.$category_details->CATEGORY_NAME.' has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }

    	public function menu_content(){
		$data['subcategory'] = $subcategory =  $this->category->get_menu_subcategory_list(false, $page=false,'SUBID','DESC',$cond=false,false);
		$data['category_details'] = $category_details = $this->category->get_menu_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);

		$this->load->view('admin/menu/sub_category',$data);
	}



  /*--------------------------------------------------------------------------------*/


/*------------------------------------ADD Content--------------------------------------------------*/

public function addsub(){
	 $this->ckfinder->SetupCKEditor($this->ckeditor,'../assets/ckfinder/');
		$data['subcategory'] = $subcategory =  $this->category->get_menu_subcategory_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
		$data['category_details'] = $category_details = $this->category->get_menu_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
		$this->load->view('admin/menu/add_subcategory',$data);
    }
	
    public function edit($sid){
    	 $this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/');
    	$data['category_details'] = $category_details = $this->category->get_menu_category_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);
    	$data['subcategory'] = $subcategory =  $this->db->get_where('menu_subcategory',array('SUBID'=>$sid))->row();

    	/*print_r($subcategory); die();*/

		$this->load->view('admin/menu/add_subcategory',$data);
    }


    
	

	public function add_subcategory(){
    	
	/*	$this->form_validation->set_rules('CATID','Category Name ','required');
		$this->form_validation->set_rules('SUB_NAME','Sub Category Name ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		
		else {*/
			if($this->category->add_menu_subcategory()){
			    	redirect('menu/menu_content');
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
		if($this->db->delete('menu_subcategory',array('SUBID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_subcategory_status($lid){
    	$sub_details = userdata('menu_subcategory',array('SUBID'=>$lid));
    	
		if($sub_details->SUB_STATUS==1):
			$is_active = array('SUB_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('SUB_STATUS'=>1);
			$message = "Verified successfully..";
		endif;

		if($this->db->update('menu_subcategory',$is_active,array('SUBID'=>$lid))){
			$msg  = 'Status has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);		;
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }

	

}