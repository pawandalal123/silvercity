<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_CONTROLLER {
    public function __construct() {
        parent::__construct();
        //$this->load->model('Content_model','content' );
            $this->load->model('Category_model','category' );
            $this->load->model('Tag_model','tag' );
       
        $this->load->model('Blog_model','blog');
        $this->load->model('Contact_model','contact' );
        $this->load->library('form_validation');
        $this->load->library('email');
       // if($this->session->LOGIN_TYPE != 1) redirect(base_url('login'));
    }
    

    public function index(){

$data['newsletters'] = $newsletters =  $this->tag->get_newsletters_list(false, $page=false,'NID','DESC',array('STATUS'=>'1'));

        $data['images'] = $images =  $this->category->get_subcategory_list(false, $page=false,false,'ASC',$cond=false);
    $data['blog'] = $blog =  $this->blog->get_blog_list(false,false,'ID','DESC',array('POST_STATUS'=>'1'));

        $this->load->view('contactus',$data);
    }

    public function enquiry(){
        $data['images'] = $images =  $this->category->get_subcategory_list(false, $page=false,false,'ASC',$cond=false);
    $data['blog'] = $blog =  $this->blog->get_blog_list(false,false,'ID','DESC',array('POST_STATUS'=>'1'));

        $this->load->view('enquiry',$data);
    }
    
    
    public function careers(){
        $data['images'] = $images =  $this->category->get_subcategory_list(false, $page=false,false,'ASC',$cond=false);
    $data['blog'] = $blog =  $this->blog->get_blog_list(false,false,'ID','DESC',array('POST_STATUS'=>'1'));

        $this->load->view('careers',$data);
    }
    
    
     public function apply_online(){

        $data['newsletters'] = $newsletters =  $this->tag->get_newsletters_list(false, $page=false,'NID','DESC',array('STATUS'=>'1'));
        
        $data['images'] = $images =  $this->category->get_subcategory_list(false, $page=false,false,'ASC',$cond=false);
    $data['blog'] = $blog =  $this->blog->get_blog_list(false,false,'ID','DESC',array('POST_STATUS'=>'1'));

        $this->load->view('apply_online',$data);
    }




    public function addcontact(){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        $this->form_validation->set_rules('FIRST_NAME','First Name ','required');
        $this->form_validation->set_rules('EMAIL','Email','required');
        $this->form_validation->set_rules('PHONE','Phone ','required');
        

        if($this->form_validation->run()==false){
            echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'warning']);
        }
        else {



            if($insertID = $this->contact->add_contact()):
                $from = 'support@zimyo.com';
                $subject = 'Smarten School';
               
                $data['input'] = $input =  $this->input->post();
                $message = $this->load->view('mailar',$data,TRUE);
             
                $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'support@zimyo.com',
                        'smtp_pass' => 'Live@123',
                        'mailtype'  => 'html', 
                        'charset'   => 'iso-8859-1'
                    );                        
                $this->load->library('email'); 
                $this->email->initialize($config); 
                $this->email->set_newline("\r\n"); 
                $this->email->from($from, 'Smarten School'); 
                $this->email->to($this->input->post('EMAIL'));
                $this->email->subject($subject); 
                $this->email->message($message);
                $this->email->send();           
                echo json_encode(['success' => true, 'msg' =>'Your request has been submitted.','type'=>'info']);
            else:
                $messge = array('message' => 'Something went wrongs..','class' => 'alert alert-danger fade in');
                $this->session->set_flashdata('item',$messge);
                redirect('contactus');
            endif;
        }



           
        }

    public function emailid($emailid){
       if($this->db->update('contactus',array('EMAIL'=>$emailid))){
           redirect('home');
       }
    }

 public function contact_list(){
        $data['contact'] = $contact =  $this->contact->get_contact_list(false, $page=false,'ID','DESC',$cond=false);
        //print_r($data); die();
        $this->load->view('admin/contact_list',$data);
    }
    
    
     public function delete_contact($tid){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        if($this->db->delete('contactus',array('ID'=>$tid))){
            echo json_encode(['contactus' => true, 'msg' => 'Deleted Successfully...']);           
        } else {
            //echo $this->db->last_query(); die();
            echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
        }
    }




    /*=======================================News Tag=============================================*/




 public function newstag(){

      
        $data['tag'] = $tag =  $this->tag->get_newstag_list(false, $page=false,'TID','DESC',$cond=false);
/*print_r($tag); die();*/
     

        $this->load->view('admin/newstag',$data);
    }

    

    public function add_newstag(){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        $this->form_validation->set_rules('TAG_NAME','Tag Name ','required');
        
        if($this->form_validation->run()==FALSE){
            echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
        } 
        else if(count_data('news_tags',array('TAG_NAME'=>$this->input->post('TAG_NAME')))==1){
            echo json_encode(['success' => false, 'msg' => 'This Category Name all ready exists..']);
        }
        else {
            if($this->tag->add_newstag()){
                //echo $this->db->last_query(); die();
            echo json_encode(['success' => true, 'msg' => 'News Tag added successfully']);
            } else {
                echo 'Technical ESUES';
            }
        }
    }

    public function update_newstag(){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        $this->form_validation->set_rules('TAG_NAME','Tag Name','required');
        
        if($this->form_validation->run()==FALSE){
            echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
        }       
        else {

            if($this->tag->add_newstag()){

             
                echo json_encode(['success' => true, 'msg' => 'News Tag update successfully...']);
            } else {
                echo 'Technical ESUES';
            }
        }
    }

    public function delete_newstag($tid){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        if($this->db->delete('news_tags',array('NTID'=>$tid))){
            echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);           
        } else {
            //echo $this->db->last_query(); die();
            echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
        }
    }

    public function change_newstags_status($tid){
        $tag_details = userdata('news_tags',array('NTID'=>$tid));
        
        if($tag_details->TAG_STATUS==1):
            $is_active = array('TAG_STATUS'=>0);
            $message = "Inactive successfully..";
        else :
            $is_active = array('TAG_STATUS'=>1);
            $message = "Verified successfully..";
        endif;

        if($this->db->update('news_tags',$is_active,array('NTID'=>$tid))){
                $msg  = ''.$tag_details->TAG_NAME.' has been  '.$message.'...';
            echo json_encode(['success' => true, 'msg' => $msg]);
            }
        else {
            $msg = 'Technical ESUES';
            echo json_encode(['success' => false, 'msg' => $msg]);      
        }
    }


    /*===================================================Newsletters=========================*/


     public function newsletters(){

      
        $data['tag'] = $tag =  $this->tag->get_newstag_list(false, $page=false,'TID','DESC',$cond=false);
        $data['newsletters'] = $newsletters =  $this->tag->get_newsletters_list(false, $page=false,'NID','DESC',$cond=false);
/*print_r($tag); die();*/
     

        $this->load->view('admin/newsletters',$data);
    }

    

    public function add_newsletters(){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
       // $this->form_validation->set_rules('NAME',' Name ','required');
       $this->form_validation->set_rules('NTID','Tag Name ','required');
        
        if($this->form_validation->run()==FALSE){
            echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
        } 

         elseif($this->check_file_exten()==false){
            
        }
       


      
        else {
            if($this->tag->add_newsletters()){
                //echo $this->db->last_query(); die();
            echo json_encode(['success' => true, 'msg' => 'News Tag added successfully']);
            } else {
                 echo $this->db->last_query(); die();
                echo 'Technical ESUES';
            }
        }
    }


    public function check_file_exten(){
        $input = $this->input->post();

        if(!empty($_FILES['FILE']['name'])):
            $exten = explode('.',$_FILES['FILE']['name']);
            if(end($exten)=='pdf'):
                return true;
            else:
                echo json_encode(['success' => false, 'msg' => 'Please uploads only pdf file...','type'=>'danger']);
                return false;
            endif;
        else:
            echo json_encode(['success' => false, 'msg' => 'Please uploads file...','type'=>'danger']);
            return false;
        endif;
    }   


  /*  public function update_newstag(){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        $this->form_validation->set_rules('TAG_NAME','Tag Name','required');
        
        if($this->form_validation->run()==FALSE){
            echo json_encode(['success' => false, 'msg' => validation_errors(),'type'=>'danger']);
        } 

         elseif($this->check_file_exten()==false){
            
        }

        else {

            if($this->tag->add_tag()){

             
                echo json_encode(['success' => true, 'msg' => 'News Tag update successfully...']);
            } else {
                echo 'Technical ESUES';
            }
        }
    }*/

    public function delete_newsletters($nid){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        if($this->db->delete('news_letters',array('NID'=>$nid))){
            echo json_encode(['success' => true, 'msg' => 'Delete Successfully...']);           
        } else {
            echo json_encode(['success' => false, 'msg' => 'Technical Error...']);
        }
    }

    public function change_newsletters_status($nid){
        $tag_details = userdata('news_letters',array('NID'=>$nid));
        
        if($tag_details->STATUS==1):
            $is_active = array('STATUS'=>0);
            $message = "Inactive successfully..";
        else :
            $is_active = array('STATUS'=>1);
            $message = "Verified successfully..";
        endif;

        if($this->db->update('news_letters',$is_active,array('NID'=>$nid))){
                $msg  = ''.$tag_details->FILE.' has been  '.$message.'...';
            echo json_encode(['success' => true, 'msg' => $msg]);
            }
        else {
            $msg = 'Technical ESUES';
            echo json_encode(['success' => false, 'msg' => $msg]);      
        }
    }

    public function download($path){
        if(!empty($path)){
            $this->load->helper('download');
            $path = './uploads/image/'.$path;
            force_download($path, NULL);
        }
    }   

}