<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

	public function get_contact_list($limit=false,$start,$order_by=false,$order,$cond=false,$group_by=false){
				if($limit!=false){
				$this->db->limit($limit, $start);
			}
			if($cond!=false){
				$this->db->where($cond);
			}			
			if($order_by!=false){
				$this->db->order_by($order_by,$order);
			}		
			if($group_by!=false){
				$this->db->group_by($group_by);
			}		
			$query = $this->db->get('contactus');
			if($query->num_rows() > 0) {
					foreach($query->result() as $row){
						$data[] = $row;
					}
				return $data;
				}
			return false;
	}

	public function add_contact(){

		$insertRec  = array(
							'FIRST_NAME'=> $this->input->post('FIRST_NAME'),
							'LAST_NAME'=> $this->input->post('LAST_NAME'),
							'EMAIL'=> $this->input->post('EMAIL'),
							'PHONE	'=> $this->input->post('PHONE'),
							'PLOT_AREA' => $this->input->post('PLOT_AREA'),
							'COVERED_AREA' => $this->input->post('COVERED_AREA'),
							'ADDRESS_LINE' => $this->input->post('ADDRESS_LINE'),
							'ADDRESS_SEC' => $this->input->post('ADDRESS_SEC'),
							'CITY' => $this->input->post('CITY'),
							'PINCODE' => $this->input->post('PINCODE'),
							'STATE' => $this->input->post('STATE'),
							'COUNTRY' => $this->input->post('COUNTRY'),
							'MESSAGE' => $this->input->post('MESSAGE'),
							'ABOUT_US' => $this->input->post('ABOUT_US'),
							'CREATED_ON' => date('Y-m-d h:i:s')
						);
	/*	echo '<pre>';
		print_r($insertRec);
		echo '</pre>'; die();*/
		
			return $this->db->insert('contactus',$insertRec);
			//echo $this->db->last_query(); die();
        	}

}