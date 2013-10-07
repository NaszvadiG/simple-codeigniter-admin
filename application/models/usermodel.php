<?php

class Usermodel extends CI_Model {

	function getSessionUserDetails()
	{
		$query = $this->db->query("SELECT `usr_fname`, `usr_lname`, `usr_email`, `usr_gender`, `usr_mobile`, `usr_school`, `usr_country`, `usr_state`, `usr_city`, `usr_pin` FROM `".USERS."` WHERE `usr_email`='".$this->session->userdata['userLoginDetails']['usr_email']."'");
		
		if($query->num_rows()>0)
		{
			return $query->row();
		}
	}
	
	function getAllGenders()
	{
		$query = $this->db->query("SELECT * FROM `".USER_GENDER."` WHERE `ug_status`='1'");
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	
	function addUser()
	{
		$query = $this->db->query("INSERT INTO `".USERS."` SET 
									`usr_fname`='".$this->input->post('usr_fname')."', 
									`usr_lname`='".$this->input->post('usr_lname')."', 
									`usr_email`='".$this->input->post('usr_email')."', 
									`usr_pwd`='".sha1($this->input->post('usr_password'))."'");
		return $query;
	}
	
	function updateUser()
	{
		$query = $this->db->query("UPDATE `".USERS."` SET 
									`usr_fname`='".$this->input->post('usr_fname')."', 
									`usr_lname`='".$this->input->post('usr_lname')."', 
									`usr_mobile`='".$this->input->post('usr_mobile')."', 
									`usr_gender`='".$this->input->post('usr_gender')."', 
									`usr_school`='".$this->input->post('usr_school')."', 
									`usr_pwd`='".sha1($this->input->post('usr_password'))."', 
									`usr_country`='".$this->input->post('usr_country')."', 
									`usr_state`='".$this->input->post('usr_state')."', 
									`usr_city`='".$this->input->post('usr_city')."', 
									`usr_pin`='".$this->input->post('usr_pin')."' 
									WHERE `usr_email`='".$this->session->userdata['userLoginDetails']['usr_email']."'");
		return $query;
	}
	
	function contactus()
	{
		if(isset($this->session->userdata['userLoginDetails']))
		{
			$usr_id = $this->commonmodel->getSingleValueById(USERS,'usr_email',$this->session->userdata['userLoginDetails']['usr_email'],'usr_id');
			$query = $this->db->query("INSERT INTO `".CONTACT_US."` SET `um_subject`='".$this->input->post('fb_subject')."',
																		`um_message`='".$this->input->post('fb_message')."',
																		`usr_id`='".$usr_id."'");
		}
		if($query)
			return TRUE;
	}
	
	function forgetpassword($email)
	{
		$query = $this->db->query("SELECT `usr_fname` FROM `".USERS."` WHERE `usr_email`='".$email."'");
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}
	
	function randforgetpassstring($email)
	{
		$string = $this->commonmodel->genRandomString(50);
		$query = $this->db->query("UPDATE `".USERS."` SET `usr_rand_string`='".$string."' WHERE `usr_email`='".$email."'");

		if($query)
		{
			return $string;
		}
		else
		{
			return FALSE;
		}
	}
	
	function checksameemail($email,$randstring)
	{
		$query = $this->db->query("SELECT `usr_id` FROM `".USERS."` WHERE `usr_email`='".$email."' AND `usr_rand_string`='".$randstring."'");
		if($query->num_rows()>0)
		{
			$data['resetdetails'] = array('resetemail'=>$email,'resetpassword'=>$randstring);
			return $data;
		}
		else
		{
			return FALSE;
		}
	}
	
	function updatepassword()
	{
		$email = $this->session->userdata('resetemail');
		$query = $this->db->query("UPDATE `".USERS."` SET `usr_pwd`='".sha1($this->input->post('new_password'))."' WHERE `usr_email`='".$email."'");
		
		if($query)
		{
			$this->db->query("UPDATE `".USERS."` SET `usr_rand_string`='' WHERE `usr_email`='".$email."'");
			$this->session->unset_userdata('resetemail');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function username_check($email)
	{
		$query = $this->db->query("SELECT `usr_email` FROM `".USERS."` WHERE `usr_email`='".$email."'");
		if($query->num_rows()==0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}