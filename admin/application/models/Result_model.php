<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result_model extends CI_Model {


	public function add_result(){
			$input = $this->input->post();


		if (empty($_FILES['FILE']['name'])) {
				if(!empty($this->input->post('RID'))):
					$FILE = $this->db->get_where('result',array('RID'=>$this->input->post('RID')))->row()->FILE;
				else:	
					$FILE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'pdf';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('FILE'))
					{
						echo $this->upload->display_errors();
					}					
					$file = $this->upload->data();
					$FILE  = $file['file_name'];
				}

                $userID = ($this->session->userdata('USERID')!='1') ? json_encode(array($this->session->userdata('USERID'))) : json_encode($input['USERID']);
		$insertblog = array(

					'SUBID' => $input['SUBID'],
					'USERID' => $userID,
					'CLID' => json_encode($input['CLID']),
					'FILE' => $FILE,
					'CREATED_BY' => $this->session->userdata('USERID'),
					'CREATED_ON' => date('Y-m-d h:i:s'),
		);

		
	return $this->db->insert('result',$insertblog);
		//echo $this->db->last_query(); die();
    }


    public function get_result($limit=false,$start,$order_by=false,$order,$cond=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
			$this->db->where($cond);
			}
			$this->db->select('res.*,usr.NAME,sub.SUBJECT_NAME,cls.CLASS_NAME');
			$this->db->from('result as res');
			$this->db->join('subject as sub','sub.SUBID=res.SUBID','LEFT');
			$this->db->join('users as usr','usr.USERID=res.USERID','LEFT');
			$this->db->join('class as cls','cls.CLID=res.CLID','LEFT');
			if($order_by!=false){
				$this->db->order_by($order_by,$order);
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

	/*=================================== Teachers ====================================================*/


	public function add_teachers($user_id){
		$input = $this->input->post();


		if(!empty($input['PASSWORD'])){
			$PASSWORD  = md5($this->input->post('PASSWORD'));
			
		} else {
			$user_details = $this->get_teachers_list($limit=false,$start=false,$order_by=false,$order=false,array('usr.USERID'=>$input['USERID']));
			$PASSWORD = $user_details[0]->PASSWORD;
		}


			
		if (empty($_FILES['IMAGES']['name'])) {
				if(!empty($this->input->post('USERID'))):
					$IMAGES = $this->db->get_where('users',array('USERID'=>$this->input->post('USERID')))->row()->IMAGES;
				else:	
					$IMAGES = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('IMAGES'))
					{
						echo $this->upload->display_errors();
					}					
					$file = $this->upload->data();
					$IMAGES  = $file['file_name'];
				}

        
		$inserttech = array(
					'NAME' => $input['NAME'],
					'EMAIL' => $input['EMAIL'],
					'USERNAME' => $input['USERNAME'],
					'IMAGES' => $IMAGES,
					'DESIGNATION' => $input['DESIGNATION'],
					'COURSES' => $input['COURSES'],
					'CLASS' => $input['CLASS'],
					//'CLID' => json_encode($input['CLID']),
					'SUBID' => json_encode($input['SUBID']),
					'DISCRIPTION' => $input['DISCRIPTION'],
                    'QUALIFICATION' => $input['QUALIFICATION'],
					'FACEBOOK' => $input['FACEBOOK'],
					'FACEBOOK_STATUS' => '1',
					'TWITTER' => $input['TWITTER'],
					'TWITTER_STATUS' => '1',
					'GOOGLE' => $input['GOOGLE'],
					'GOOGLE_STATUS' => '1',
					'PASSWORD' => $PASSWORD,
					'CREATED_ON' => date('Y-m-d h:i:s'),
					'STATUS' => '1',
					'LOGIN_TYPE' => '1'
					
		        );
		


	   if(!empty($this->input->post('USERID'))):			
			return $this->db->update('users',$inserttech,array('USERID'=>$this->input->post('USERID')));
			//echo $this->db->last_query();die;
		else:
			return $this->db->insert('users',$inserttech);
		//echo $this->db->last_query(); die();
		endif;
}


public function get_teachers_list($limit=false,$start,$order_by=false,$order,$cond=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}
			$this->db->select('usr.*,sub.SUBJECT_NAME');
			$this->db->from('users as usr');
		//	$this->db->join('class as cls','cls.CLID=usr.CLID','LEFT');
			$this->db->join('subject as sub','sub.SUBID=usr.SUBID','LEFT');
		
			if($order_by!=false){
				$this->db->order_by($order_by,$order);
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


/*=================================== Subject ====================================================*/


	public function add_subject(){
		$input = $this->input->post();
		$inserttech = array(
					'USERID' => $input['USERID'],
					'CLID' => json_encode($input['CLID']),
					'SUBJECT_NAME' => $input['SUBJECT_NAME'],
					'CREATED_ON' => date('Y-m-d h:i:s'),
					'STATUS' => '1'
		        );
	   if(!empty($this->input->post('SUBID'))):			
			return $this->db->update('subject',$inserttech,array('SUBID'=>$this->input->post('SUBID')));
		else:
			return $this->db->insert('subject',$inserttech);
		//echo $this->db->last_query(); die();
		endif;
}


     public function get_subject_list($limit=false,$start,$order_by=false,$order,$cond=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}
			$this->db->select('sub.*,usr.NAME,cls.CLASS_NAME');
			$this->db->from('subject as sub');
			$this->db->join('users as usr','usr.USERID=sub.USERID','LEFT');
			$this->db->join('class as cls','cls.CLID=sub.CLID','LEFT');
			if($order_by!=false){
				$this->db->order_by($order_by,$order);
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
	/*===============================================Exams============================================*/

		public function add_exam(){
		$input = $this->input->post();

		if (empty($_FILES['EXAM_FILE']['name'])) {
				if(!empty($this->input->post('EXID'))):
					$EXAM_FILE = $this->db->get_where('exam',array('EXID'=>$this->input->post('EXID')))->row()->EXAM_FILE;
				else:	
					$EXAM_FILE = 'logo.png';
				endif;	
			   } else {
					$config['upload_path']   = './uploads/image/';
					$config['allowed_types'] = 'pdf';
					//$config['max_size']      = 50000;
					$config['encrypt_name']	= false;		
					$this->load->library('upload', $config);					
					if ( ! $this->upload->do_upload('EXAM_FILE'))
					{
						echo $this->upload->display_errors();
					}					
					$file = $this->upload->data();
					$EXAM_FILE  = $file['file_name'];
				}

		$inserttech = array(
					'SUBID' => $input['SUBID'],
					'EXAM_FILE' => $EXAM_FILE,
					'CLID' => $input['CLID'],
					'CLASSES' => $input['CLASSES'],
					'CATEGORY_NAME' => $input['CATEGORY_NAME'],
					/*'DATE_OF_EXAM' => $input['DATE_OF_EXAM'],*/
					'CREATED_ON' => date('Y-m-d h:i:s'),
					'STATUS' => '1'

		        );
	   if(!empty($this->input->post('EXID'))):			
			return $this->db->update('exam',$inserttech,array('EXID'=>$this->input->post('EXID')));
		else:
			return $this->db->insert('exam',$inserttech);
		//echo $this->db->last_query(); die();
		endif;
}


   public function get_exam_list($limit=false,$start,$order_by=false,$order,$cond=false){
			if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}
				$this->db->select('exm.*,sub.SUBJECT_NAME,cls.CLASS_NAME');
			$this->db->from('exam as exm');
			$this->db->join('subject as sub','sub.SUBID=exm.SUBID','LEFT');
			$this->db->join('class as cls','cls.CLID=exm.CLID','LEFT');
			if($order_by!=false){
				$this->db->order_by($order_by,$order);
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

	public function update_password($user_id){
		$input = $this->input->post();


		if(!empty($input['PASSWORD'])){
			$PASSWORD  = md5($this->input->post('PASSWORD'));
			
		} else {
			$user_details = $this->get_teachers_list($limit=false,$start=false,$order_by=false,$order=false,array('usr.USERID'=>$input['USERID']));
			$PASSWORD = $user_details[0]->PASSWORD;
		}
		$insert = array(
			'PASSWORD' => $PASSWORD
			);

		if(!empty($this->input->post('USERID'))):			
			return $this->db->update('users',$inserttech,array('USERID'=>$this->input->post('USERID')));
			//echo $this->db->last_query();die;
		else:
			return $this->db->insert('users',$inserttech);
		//echo $this->db->last_query(); die();
		endif;
}

}