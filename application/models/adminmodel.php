<?php

class Adminmodel extends CI_Model {

	function validateadminlogin()
	{
		$query = $this->db->query("SELECT `adm_name`, `adm_email`, `adm_gender` FROM `".ADMIN_TABLE."` WHERE `adm_email`='".$this->input->post('email')."' AND `adm_pwd`='".sha1($this->input->post('pwd'))."'");
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}
	}
	
	function addUser()
	{
		$Qry = "INSERT INTO `".USERS."` SET `usr_fname`='".$this->input->post('usr_fname')."',
												  `usr_lname`='".$this->input->post('usr_lname')."',
												  `usr_email`='".$this->input->post('usr_email')."',
												  `usr_pwd`='".sha1($this->input->post('usr_password'))."',
												  `usr_gender`='".$this->input->post('usr_gender')."',
												  `usr_mobile`='".$this->input->post('usr_mobile')."',
												  `usr_website`='".$this->input->post('usr_website')."',
												  `usr_country`='".$this->input->post('usr_country')."',
												  `usr_state`='".$this->input->post('usr_state')."',
												  `usr_city`='".$this->input->post('usr_city')."',
												  `usr_dob`='".date('Y-m-d',strtotime($this->input->post('usr_dob')))."',
												  `usr_college`='".$this->input->post('usr_college')."',
												  `usr_profile_picture`='".$this->input->post('usr_profile_picture')."',
												  `usr_email_status`='".$this->input->post('usr_email_status')."',
												  `usr_mobile_status`='".$this->input->post('usr_mobile_status')."',
												  `usr_group`='".$this->input->post('usr_group')."'";
		$status = $this->db->query($Qry);
		
		if($status)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function editUser($usr_id)
	{
		$Qry = "UPDATE `".USERS."` SET `usr_fname`='".$this->input->post('usr_fname')."',
												  `usr_lname`='".$this->input->post('usr_lname')."',
												  `usr_email`='".$this->input->post('usr_email')."',
												  `usr_pwd`='".sha1($this->input->post('usr_password'))."',
												  `usr_gender`='".$this->input->post('usr_gender')."',
												  `usr_mobile`='".$this->input->post('usr_mobile')."',
												  `usr_website`='".$this->input->post('usr_website')."',
												  `usr_country`='".$this->input->post('usr_country')."',
												  `usr_state`='".$this->input->post('usr_state')."',
												  `usr_city`='".$this->input->post('usr_city')."',
												  `usr_dob`='".$this->input->post('usr_dob')."',
												  `usr_profile_picture`='".$this->input->post('usr_profile_picture')."',
												  `usr_email_status`='".$this->input->post('usr_email_status')."',
												  `usr_mobile_status`='".$this->input->post('usr_mobile_status')."',
												  `usr_group`='".$this->input->post('usr_type')."' WHERE `usr_id`='".$usr_id."'";
		$status = $this->db->query($Qry);
		
		if($status)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function addCMSPage()
	{
		$Qry = "INSERT INTO `".CMS_TABLE."` SET `cms_page_name`='".$this->input->post('cms_page_name')."',
												  `cms_browser_title`='".$this->input->post('cms_browser_title')."',
												  `cms_content`='".$this->input->post('cms_content')."'";
		$status = $this->db->query($Qry);
		
		if($status)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function editCMSPage($page_id)
	{
		$Qry = "UPDATE `".CMS_TABLE."` SET `cms_page_name`='".$this->input->post('cms_page_name')."',
												  `cms_browser_title`='".$this->input->post('cms_browser_title')."',
												  `cms_content`='".$this->input->post('cms_content')."' where `cms_id`='".$page_id."'";
		$status = $this->db->query($Qry);
		
		if($status)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function failed_login_attempts()
	{
		$Qry = "SELECT * FROM `".LOGIN_FAILED_TABLE."` ORDER BY `lfa_id` DESC";
		$res = $this->db->query($Qry);
		
		if($res->num_rows()>0)
		{
			return $res->result();
		}
		else
		{
			return NULL;
		}
	}
	
	function updatemyaccount()
	{
		$Qry = "UPDATE `".ADMIN_TABLE."` SET `adm_email`='".$this->input->post('adm_email')."',`adm_pwd`='".sha1($this->input->post('adm_pwd'))."',`adm_name`='".$this->input->post('adm_name')."' WHERE `adm_id`='".$_SESSION['administrator']->adm_id."'";
		$res = $this->db->query($Qry);
		
		if($res)
		{
			return TRUE;
		}
		else
		{
			return NULL;
		}
	}
	
	function getAllRecords($tdata)
	{
		$Qry = "SELECT * FROM `".$tdata['table']."`";
		if(isset($tdata['wfld'])&&isset($tdata['wval']))
		{
			$Qry .= "WHERE `".$tdata['wfld']."`='".$tdata['wval']."'";
		}

		if(isset($tdata['obyfld'])&&isset($tdata['obyval']))
		{
			$Qry .= "ORDER BY `".$tdata['obyfld']."` ".$tdata['obyval'];
		}

		$res = $this->db->query($Qry);
		
		if($res->num_rows()>0)
		{
			return $res->result();
		}
		else
		{
			return array();
		}
	}
	
	function getRecordById($tdata)
	{
		$Qry = "SELECT * FROM `".$tdata['table']."`";
		if(isset($tdata['wfld'])&&isset($tdata['wval']))
		{
			$Qry .= "WHERE `".$tdata['wfld']."`='".$tdata['wval']."'";
		}

		$res = $this->db->query($Qry);
		
		if($res->num_rows()>0)
		{
			return $res->row();
		}
		else
		{
			return NULL;
		}
	}
	
	function changeRecordStatus($tdata)//To update binary status value
	{
		$cstatus = $this->db->query("SELECT * FROM `".$tdata['table']."` WHERE `".$tdata['wfld']."`='".$tdata['wval']."'")->row()->$tdata['sfld'];
		if($cstatus=='1')
		{
			$Qry = "UPDATE `".$tdata['table']."` SET `".$tdata['sfld']."`='0' WHERE `".$tdata['wfld']."`='".$tdata['wval']."'";
		}
		elseif($cstatus=='0')
		{
			$Qry = "UPDATE `".$tdata['table']."` SET `".$tdata['sfld']."`='1' WHERE `".$tdata['wfld']."`='".$tdata['wval']."'";
		}
		$status = $this->db->query($Qry);
		
		if($status)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function deleteRecordById($tdata)
	{
		$status = $this->db->query("DELETE FROM `".$tdata['table']."` WHERE `".$tdata['wfld']."`='".$tdata['wval']."'");
		
		if($status)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function addAdcode()
	{
		$Qry = "INSERT INTO `adsense` SET `ad_notes`='".$this->input->post('ad_notes')."',`ad_size`='".$this->input->post('ad_size')."',`ad_code`='".addslashes($this->input->post('ad_code'))."'";
		$status = $this->db->query($Qry);
		
		if($status)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}