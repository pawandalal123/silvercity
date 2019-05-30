<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_CONTROLLER {

	public function __construct() {
		parent::__construct();

		$this->load->model('Tag_model','tag');
		$this->load->model('category_model','category');
		$this->load->model('Blog_model','blog');
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
        	$data['blog'] = $blog =  $this->blog->get_blog_list(false,false,'ID','DESC',$cond=false);
        	//echo $this->db->last_query(); die();
			/*echo '<pre>';
			 print_r($data); die();*/
	
		     $this->load->view('admin/blog',$data);
	}

	public function add_blog(){
		 $this->ckfinder->SetupCKEditor($this->ckeditor,'../assets/ckfinder/');
		$data['category'] = $category =  $this->category->get_category($limit=false,$start=false,$order_by=false,$order=false,$cond=false);

        	$data['tag'] = $tag =  $this->tag->get_tag_list($limit=false,$start=false,$order_by=false,$order=false,$cond=false);

			/*echo '<pre>';
		print_r($category); die();*/
		$this->load->view('admin/add_blog',$data);
    }


	
    public function edit($bid){
    	 $this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/');
    	$data['blog'] = $blog =  $this->db->get_where('blogs',array('ID'=>$bid))->row();

//echo $this->db->last_query(); die();
    	$data['category'] = $category =  $this->category->get_category($limit=false,$start=false,$order_by=false,$order=false,$cond=false);

        	
        /*echo '<pre>'; 
    	print_r($data); 
    	echo '<pre>'; die;
    */
		$this->load->view('admin/add_blog',$data);
    }

    public function add(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		//$this->form_validation->set_rules('CATEGORY_ID','Category Name ','trim|required');
		$this->form_validation->set_rules('POST_TITLE',' POST Title Name ','trim|required');
		$this->form_validation->set_rules('POST_NAME',' POST Name ','trim|required');
		//$this->form_validation->set_rules('TAG_ID',' Tag Name ','trim|required');
	    //$this->form_validation->set_rules('POST_IMAGE','Post Image File','required');
		//$this->form_validation->set_rules('POST_CONTENT	','Post Content ','required');
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		}
		else {
			if($this->blog->add_blog()){
			echo json_encode(['success' => true, 'msg' => 'Content added successfully...']);
			//echo $this->db->last_query(); die();
			} else {
				echo 'Technical ESUES';
			}
		}
    }

   

    public function delete_blog($bid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('blogs',array('ID'=>$bid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_blog_status($bid){
    	$blog_details = userdata('blogs',array('ID'=>$bid));
    	//print_r($content_details); die();
    	
		if($blog_details->POST_STATUS==1):
			$is_active = array('POST_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('POST_STATUS'=>1);
			$message = "Active successfully..";
		endif;

		if($this->db->update('blogs',$is_active,array('ID'=>$bid))){
			$msg  = ''.$blog_details->POST_TITLE.' has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);		;
			}
		else {
			$msg = 'Technical esuse';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }

    /*----------------------------------------Category--------------------------------------*/

    public function category(){

      
		$data['category'] = $category =  $this->category->get_category(false, $page=false,'CATEGORY_ID','DESC',$cond=false);

		$data['links'] = $this->pagination->create_links();

		$this->load->view('admin/blog_category',$data);
	}

	

	public function add_category(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('CATEGORY_NAME','Category Name ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		else if(count_data('blog_category',array('CATEGORY_NAME'=>$this->input->post('CATEGORY_NAME')))==1){
			echo json_encode(['success' => false, 'msg' => 'This Category Name all ready exists..']);
		}
		else {
			if($this->category->add_category()){
			echo json_encode(['success' => true, 'msg' => 'Category added successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function update_category(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('CATEGORY_NAME','Category Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->category->add_category()){

             
				echo json_encode(['success' => true, 'msg' => 'Category update successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function delete_category($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('blog_category',array('CATEGORY_ID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_category_status($lid){
    	$category_details = userdata('blog_category',array('CATEGORY_ID'=>$lid));
    	
		if($category_details->CATEGORY_STATUS==1):
			$is_active = array('CATEGORY_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('CATEGORY_STATUS'=>1);
			$message = "Verified successfully..";
		endif;

		if($this->db->update('blog_category',$is_active,array('CATEGORY_ID'=>$lid))){
			//echo $this->db->last_query();die;
			$msg  = ''.$category_details->CATEGORY_NAME.' has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }

    /*-----------------------------------------Tag-------------------------------------------------*/

 public function tag(){

      
		$data['tag'] = $tag =  $this->tag->get_tag_list(false, $page=false,'TAG_ID','DESC',$cond=false);
/*print_r($tag); die();*/
		$data['links'] = $this->pagination->create_links();

		$this->load->view('admin/tag_list',$data);
	}

	

	public function add_tag(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_NAME','Tag Name ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		else if(count_data('blog_master_tags',array('TAG_NAME'=>$this->input->post('TAG_NAME')))==1){
			echo json_encode(['success' => false, 'msg' => 'This Category Name all ready exists..']);
		}
		else {
			if($this->tag->add_tag()){
				//echo $this->db->last_query(); die();
			echo json_encode(['success' => true, 'msg' => 'Category added successfully']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function update_tag(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_NAME','Tag Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->tag->add_tag()){

             
				echo json_encode(['success' => true, 'msg' => 'Category update successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function delete_tag($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('blog_master_tags',array('TAG_ID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_tag_status($lid){
    	$tag_details = userdata('blog_master_tags',array('TAG_ID'=>$lid));
    	
		if($tag_details->TAG_STATUS==1):
			$is_active = array('TAG_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('TAG_STATUS'=>1);
			$message = "Verified successfully..";
		endif;

		if($this->db->update('blog_master_tags',$is_active,array('TAG_ID'=>$lid))){
				$msg  = ''.$tag_details->TAG_NAME.' has been  '.$message.'...';
			echo json_encode(['success' => true, 'msg' => $msg]);
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }

/*===========================================================Blog Tags=============================================*/

 public function blog_tag(){

      
		$data['blogtag'] = $blogtag =  $this->tag->get_blog_tag_list(false, $page=false,'ID','DESC',$cond=false);
/*print_r($tag); die();*/
		$data['links'] = $this->pagination->create_links();

		$this->load->view('admin/blog_tags',$data);
	}

	

	public function add_blog_tag(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_ID','Tag Name ','required');
		$this->form_validation->set_rules('post_ID','Post Name ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		else if(count_data('blog_tags',array('TAG_ID'=>$this->input->post('TAG_ID')))==1){
			echo json_encode(['success' => false, 'msg' => 'This Category Name all ready exists..']);
		}
		else {
			if($this->tag->add_blog_tag()){
				//echo $this->db->last_query(); die();
			echo json_encode(['success' => true, 'msg' => 'Category added successfully..']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function update_blog_tag(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_ID','Tag Name','required');
		$this->form_validation->set_rules('post_ID','Post Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->tag->add_blog_tag()){

             
				echo json_encode(['success' => true, 'msg' => 'Category update successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    public function delete_blog_tag($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('blog_tags',array('ID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    /*public function change_tag_status($lid){
    	$tag_details = userdata('blog_tags',array('ID'=>$lid));
    	
		if($tag_details->TAG_STATUS==1):
			$is_active = array('TAG_STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('TAG_STATUS'=>1);
			$message = "Verified successfully..";
		endif;

		if($this->db->update('blog_master_tags',$is_active,array('TAG_ID'=>$lid))){
				$msg  = '<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>'.$tag_details->TAG_NAME.' has been  '.$message.'...</div>';
			echo json_encode(['success' => true, 'msg' => $msg]);
			}
		else {
			$msg = '<div class="alert alert-error col-md-12"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>Technical ESUES</div>';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }*/
    
     /*===========================================================Testimonials=============================================*/

 public function testimonial(){

      
		$data['testimonial'] = $testimonial =  $this->blog->get_testimonial_list(false, $page=false,'ID','DESC',$cond=false);
/*print_r($tag); die();*/
		$data['links'] = $this->pagination->create_links();

		$this->load->view('admin/testimonial_details',$data);
	}

	

	public function add_testimonial(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('NAME',' Name ','required');
		//$this->form_validation->set_rules('IMAGE',' Image ','required');
		$this->form_validation->set_rules('CONTENT','Testimonial Contant ','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 
		
		else {
			if($this->blog->add_testimonial()){
				//echo $this->db->last_query(); die();
			echo json_encode(['success' => true, 'msg' => 'Testimonial added successfully..']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }

    /*public function update_testimonial(){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('TAG_ID','Tag Name','required');
		$this->form_validation->set_rules('post_ID','Post Name','required');
		
		if($this->form_validation->run()==FALSE){
			echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
		} 		
		else {

			if($this->tag->add_blog_tag()){

             
				echo json_encode(['success' => true, 'msg' => 'Category update successfully...']);
			} else {
				echo 'Technical ESUES';
			}
		}
    }*/

    public function delete_testimonial($lid){
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		if($this->db->delete('testimonial',array('ID'=>$lid))){
			echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);			
		} else {
			echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
		}
    }

    public function change_testimonial($lid){
    	$tag_details = userdata('testimonial',array('ID'=>$lid));
    	
		if($tag_details->STATUS==1):
			$is_active = array('STATUS'=>0);
			$message = "Inactive successfully..";
		else :
			$is_active = array('STATUS'=>1);
			$message = "Active successfully..";
		endif;

		if($this->db->update('testimonial',$is_active,array('ID'=>$lid))){
				$msg  = $tag_details->NAME.' has been  '.$message;
			echo json_encode(['success' => true, 'msg' => $msg]);
			}
		else {
			$msg = 'Technical ESUES';
			echo json_encode(['success' => false, 'msg' => $msg]);		
		}
    }
    
}