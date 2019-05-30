<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_CONTROLLER {

	public function __construct() {
		parent::__construct();

		$this->load->model('Work_model','work');
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
        	$data['work'] = $work =  $this->work->get_work_list(false,false,'ID','DESC',$cond=false);
        		
        	
		     $this->load->view('admin/work',$data);
	}

	public function add_work(){
		 $this->ckfinder->SetupCKEditor($this->ckeditor,'../assets/ckfinder/');
		//$data['class'] = $class =  $this->class->get_class_list(false,false,'CLID','DESC',$cond=false);
        		
		$this->load->view('admin/add_work',$data);
    }


	
    public function edit($cid){
    	 $this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/');
    	$data['work'] = $work =  $this->work->get_work_list(false,false,'ID','DESC',array('wht.ID'=>$cid));

//echo $this->db->last_query(); die();
    
		$this->load->view('admin/add_work',$data);
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
			if($this->work->add_work()){
			echo json_encode(['success' => true, 'msg' => 'Work Process added successfully...']);
		//echo $this->db->last_query(); die();
			} else {
				//echo $this->db->last_query(); die();
				echo 'Technical ESUES';
			}
		}
    }

   

    public function delete_work($id){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('work_process',array('ID'=>$id))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

   


     public function change_work_status($lid){
    	$category_details = userdata('work_process',array('ID'=>$lid));
    	
		if($category_details->STATUS==1):
			$is_active = array('STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('STATUS'=>1);
			$message = "Active successfully..";
		endif;

		if($this->db->update('work_process',$is_active,array('ID'=>$lid))){
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