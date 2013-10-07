<?php

class Downloadmodel extends CI_Model {

	function getResourceCategories($status=1)
	{
		$query = $this->db->query("SELECT * FROM `".DOWNLOADRESOURCES."` WHERE `dr_status`='".$status."'");
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	
	function getAllSubjects($startswith)
	{
		$query = $this->db->query("SELECT * FROM `".QP_SUBJECTS."` WHERE `sub_name` LIKE '".$startswith."%'");
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	
	function getAllQPapers($subjectname)
	{
		$query = $this->db->query("SELECT `qp`.* FROM `".QUESTIONPAPERS."` as `qp` JOIN `".QP_SUBJECTS."` as `qps` WHERE `qp`.`sub_id`=`qps`.`sub_id` AND `qps`.`sub_name`='".urldecode($subjectname)."'");
		
		if($query->num_rows()>0)
		{
			$result = $query->result();
			$this->pageViewed($result[0]->qp_id);
			return $result;
		}
	}
	
	function pageViewed($qid)
	{
		$this->db->query("UPDATE `".QUESTIONPAPERS."` SET `qp_views`=qp_views+1 WHERE `qp_id`='".$qid."'");
	}
}