<?php

class Newslettermodel extends CI_Model {
	
	
	function addNewsletter()
	{
		$Qry = "INSERT INTO `".NEWSLETTERS_TABLE."` SET `nl_title`='".$this->input->post('nl_title')."',
												  `nl_category`='".$this->input->post('nl_category')."',
												  `nl_content`='".$this->input->post('nl_content')."'";
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
	
	function editNewsletter($nl_id)
	{
		$Qry = "UPDATE `".NEWSLETTERS_TABLE."` SET `nl_title`='".addslashes($this->input->post('nl_title'))."',
												  `nl_category`='".addslashes($this->input->post('nl_category'))."',
												  `nl_content`='".addslashes($this->input->post('nl_content'))."' where `nl_id`='".$nl_id."'";
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
	
	function getAllNewslettercategories()
	{
		$query = $this->db->query("SELECT * FROM `".NEWSLETTERS_CATEGORY_TABLE."` WHERE `nlc_status`='1'");
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	
	
	function getAllNewsletters($tdata)
	{
		$Qry = "SELECT * FROM `".NEWSLETTERS_TABLE."` as `nl` 
				JOIN `".NEWSLETTERS_CATEGORY_TABLE."` as `nlc` 
				WHERE `nlc`.`nlc_id` = `nl`.`nl_category`";

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
	
	function getNewsletterDetailsById($nl_id)
	{
		$Qry = "SELECT * FROM `".NEWSLETTERS_TABLE."` as `nl` 
				JOIN `".NEWSLETTERS_CATEGORY_TABLE."` as `nlc` 
				WHERE `nlc`.`nlc_id` = `nl`.`nl_category` AND `nl`.`nl_id`='".$nl_id."'";
		$res = $this->db->query($Qry);
		
		if($res->num_rows()>0)
		{
			return $res->row();
		}
		else
		{
			return array();
		}
	}
	
	function getAllActiveSubscribers($nl_id)
	{
		$nl_lastsent = $this->commonmodel->getSingleValueById(NEWSLETTERS_TABLE,'nl_id',$nl_id,'nl_sentupto');
		//$nl_lastsent = '0';

		$query = $this->db->query("SELECT `nls_id`,`nls_name`,`nls_email` FROM `".NEWSLETTER_SUBSCRIBERS."` WHERE `nls_status`='1' LIMIT ".$nl_lastsent.", 290");
		
		$this->db->query("UPDATE `".NEWSLETTERS_TABLE."` SET `nl_sentupto`=nl_sentupto+290 WHERE `nl_id`='".$nl_id."'");
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function unsubscribenewsletter($nls_id)
	{
		$query = $this->db->query("UPDATE `".NEWSLETTER_SUBSCRIBERS."` SET `nls_status`='0' WHERE SHA1(`nls_id`)='".$nls_id."'");

		if($this->db->affected_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}