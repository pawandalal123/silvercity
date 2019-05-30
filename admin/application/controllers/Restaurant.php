<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends CI_CONTROLLER {

	public function __construct() {
		parent::__construct();

		$this->load->model('Restaurant_model','restaurant');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		//	echo $this->session->LOGIN_TYPE;die;
		if($this->session->LOGIN_TYPE != 1) redirect(base_url('login'));
               
	}

	public function index()
	{
        	$data['venu'] = $venu =  $this->restaurant->get_venue_list(false,false,'ID','DESC',$cond=false);
        		
        	
		     $this->load->view('admin/venu',$data);
	}

	

    public function add(){
    	
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		$this->form_validation->set_rules('NAME',' Name ','trim|required');
		$this->form_validation->set_rules('TITLE',' Title ','trim|required');
		$this->form_validation->set_rules('ADDRESS',' Address ','trim|required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		}
		else {
			if($this->restaurant->add_vanue()){
			echo json_encode(['success' => true, 'msg' => 'Our Restaurant Vanue added successfully...']);
		//echo $this->db->last_query(); die();
			} else {
				//echo $this->db->last_query(); die();
				echo 'Technical ESUES';
			}
		}
    }



    public function amenities(){


    	$data['amenities'] = $amenities =  $this->restaurant->get_amenities_list(false,false,'ID','DESC',$cond=false);
        		
        	
		     $this->load->view('admin/amenities',$data);

    }


     public function add_amenities(){
    	
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		
		$this->form_validation->set_rules('TITLE',' Title ','trim|required');
		
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		}
		else {
			if($this->restaurant->add_amenities()){
			echo json_encode(['success' => true, 'msg' => 'Our Restaurant Amenities added successfully...']);
		//echo $this->db->last_query(); die();
			} else {
				//echo $this->db->last_query(); die();
				echo 'Technical ESUES';
			}
		}
    }

    public function delete_amenities($id){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('our_restaurant_amenities',array('ID'=>$id))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    


     public function chefs(){


    	$data['chefs'] = $chefs =  $this->restaurant->get_chefs_list(false,false,'ID','DESC',$cond=false);
        		
        	
		     $this->load->view('admin/chefs',$data);

    }


     public function add_chefs(){
    	
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		
		$this->form_validation->set_rules('NAME',' Name ','trim|required');
		
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		}
		else {
			if($this->restaurant->add_chefs()){
			echo json_encode(['success' => true, 'msg' => 'Our Restaurant Chefs added successfully...']);
		//echo $this->db->last_query(); die();
			} else {
				//echo $this->db->last_query(); die();
				echo 'Technical ESUES';
			}
		}
    }

    public function delete_chefs($id){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('our_restaurant_chefs',array('ID'=>$id))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

   

   


}