<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WhatWeDo extends CI_CONTROLLER {

	public function __construct() {
		parent::__construct();

		$this->load->model('WhatWeDo_model','WhatWeDo');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('CKEditor');
		$this->load->library('CKFinder');
		$this->ckeditor->basePath = base_url().'/assets/ckeditor/';
			$this->ckeditor->config['language'] = 'en';
			$this->ckeditor->config['width'] = '730px';
			$this->ckeditor->config['height'] = '200px'; 
		//	echo $this->session->LOGIN_TYPE;die;
		if($this->session->LOGIN_TYPE != 1) redirect(base_url('login'));
               
	}

	public function index()
	{
        	$data['WhatWeDo'] = $WhatWeDo =  $this->WhatWeDo->get_whatwedo_list(false,false,'ID','DESC',$cond=false);
        		
        	
		     $this->load->view('admin/whatwedo',$data);
	}

	public function add_whatwedo(){
		 $this->ckfinder->SetupCKEditor($this->ckeditor,'../assets/ckfinder/');
		//$data['class'] = $class =  $this->class->get_class_list(false,false,'CLID','DESC',$cond=false);
        		
		$this->load->view('admin/add_WhatWeDo',$data);
    }


	
    public function edit($cid){
    	 $this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/');
    	$data['whatwedo'] = $whatwedo =  $this->WhatWeDo->get_whatwedo_list(false,false,'ID','DESC',array('wht.ID'=>$cid));

//echo $this->db->last_query(); die();
    
		$this->load->view('admin/add_WhatWeDo',$data);
    }

    public function add(){
    	 $this->ckfinder->SetupCKEditor($this->ckeditor,'../assets/ckfinder/');
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		$this->form_validation->set_rules('TITLE',' Title ','trim|required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		}
		else {
			if($this->WhatWeDo->add_WhatWeDo()){
			echo json_encode(['success' => true, 'msg' => 'WhatWeDo added successfully...']);
		//echo $this->db->last_query(); die();
			} else {
				//echo $this->db->last_query(); die();
				echo 'Technical ESUES';
			}
		}
    }

   

    public function delete_whatwedo($id){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('WhatWeDo',array('ID'=>$id))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

   


     public function change_WhatWeDo_status($lid){
    	$category_details = userdata('WhatWeDo',array('ID'=>$lid));
    	
		if($category_details->STATUS==1):
			$is_active = array('STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('STATUS'=>1);
			$message = "Active successfully..";
		endif;

		if($this->db->update('WhatWeDo',$is_active,array('ID'=>$lid))){
			//echo $this->db->last_query();die;
			$msg  = ''.$category_details->TITLE.' has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }


   


}