<?php

class Loginmodel extends CI_Model {

	function validate()
	{
		$query = $this->db->query("SELECT  `usr_fname`,`usr_email`,`usr_gender`,`usr_id` FROM `".USERS."` WHERE `usr_email`='".$this->input->post('username')."' AND `usr_pwd`='".sha1($this->input->post('password'))."'");
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}
	}
	
	function create_member()
	{
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('membership', $new_member_insert_data);
		return $insert;
	}
}