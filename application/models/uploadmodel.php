<?php

class Uploadmodel extends CI_Model {

	function uploadresources()
	{
		$subject = $_POST['subject'];
		$file = $_FILES['file'];
		
		$extarray = array('pdf','xls','doc','ppt','pps','ps','txt','rtf','odt','odp','ods','odf','odg','sxw','sxi','sxc','sxd','tif','tiff','docx','pptx','ppsx','xlsx','zip','rar');

		for($i=0;$i<count($_FILES['file']['name']);$i++)	
		{
			$filetype = explode('.',$_FILES['file']['name'][$i]);
			$filetype = $filetype[count($filetype)-1];			

			if(($_FILES['file']['error'][$i]==0)&&(in_array($filetype,$extarray)))
			{
				$randfilename = $this->commonmodel->genRandomString('25').'.'.$filetype;

				$dest = UPLOAD_RESOURCES. $randfilename;
				if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$dest))
				{
					$query = $this->db->query("INSERT INTO `".USERCONTRIBUTIONS."` SET `uc_subject_name`='".$subject[$i]."',`uc_filename`='".addslashes($_FILES['file']['name'][$i])."',`uc_randomname`='".$randfilename."',`usr_id`='".$this->session->userdata['userLoginDetails']['usr_id']."'");
					
					if(!isset($query))
					{
						$errors[] = $subject[$i];
					}
				}
			}
			else
			{
				return FALSE;
			}
		}
		
		if(isset($errors))
		{
			return $errors;
		}
		else
		{
			return TRUE;
		}
	}

	function topDownloads()
	{
		$query = $this->db->query("SELECT `qp`.*,`qps`.`sub_name` FROM `".QUESTIONPAPERS."` `qp`,`".QP_SUBJECTS."` `qps` WHERE `qp`.`qp_views`>50 AND `qps`.`sub_id`=`qp`.`sub_id` ORDER BY `qp_views` DESC");

		if($query->num_rows()>0)
		{
			$result = $query->result();
			return $result;
		}
	}

	function myContributions()
	{
		$query = $this->db->query("SELECT * FROM `".USERCONTRIBUTIONS."` WHERE `usr_id`='".$this->session->userdata['userLoginDetails']['usr_id']."'");

		if($query->num_rows()>0)
		{
			$result = $query->result();
			return $result;
		}		
	}
}