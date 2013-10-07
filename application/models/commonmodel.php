<?php

class Commonmodel extends CI_Model {

	function __construct()
	{
		$admincontrollers = array('administrator','adminlogin');
		if(!isset($this->session->userdata['adminLoginDetails'])&&!in_array($this->router->class,$admincontrollers))
		{
			$this->whoisonline();
		}
	}

	function getAllRecords($tablename,$orderby=NULL)
	{
		$sql = "SELECT * FROM `".$tablename."`";
		if(isset($orderby))
		{
			$sql .= " ORDER BY `".$orderby."`";
		}
		
		$query = $this->db->query($sql);
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	
	function getAllAds($tablename=ADSENSE)
	{
		$sql = "SELECT * FROM `".$tablename."`";
		
		$query = $this->db->query($sql);
		
		if($query->num_rows()>0)
		{
			$result = $query->result();

			foreach($result as $key=>$val)
			{
				if($val->ad_status=='1')
					$nresult[$val->ad_title] = $val->ad_code;
				else
					$nresult[$val->ad_title] = $val->ad_dummy;
			}
		}
		
		if($query->num_rows>0)
		return $nresult;
	}
	
	function getAllStatesByCountry($country)
	{
		$Qry = "SELECT * FROM `".STATES."` WHERE `country`='".$country."'";
		$res = $this->db->query($Qry);
		
		if($res->num_rows()>0)
		{
			return $res->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	function getSingleValueById($table,$wfld,$wval,$getfld)
	{
		$Qry = "SELECT `".$getfld."` FROM `".$table."`";
		if(isset($wfld)&&isset($wval))
		{
			$Qry .= " WHERE `".$wfld."`='".$wval."'";
		}

		$res = $this->db->query($Qry);
		
		if($res->num_rows()>0)
		{
			return $res->row()->$getfld;
		}
	}
	
	function pagetitle()
	{
		return $this->router->method;
	}
	
	function linknavigation()
	{
		$url = explode('/',uri_string());
		return $url;
	}
	
	function getIpAddress()
	{
		return (empty($_SERVER['HTTP_CLIENT_IP'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])?
		$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['HTTP_CLIENT_IP']);
	}
	
	/*function genRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$string = '';    
	
		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters))];
		}
	
		return $string;
	}*/
	
	function genRandomString($length)
	{
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
		$chars_length = (strlen($chars) - 1);
		$string = $chars{rand(0, $chars_length)};
		for ($i = 1; $i < $length; $i = strlen($string))
		{
			$r = $chars{rand(0, $chars_length)};
			if ($r != $string{$i - 1}) $string .=  $r;
		}
		return $string;
	}	
	
	function whoisonline()//Check whether record exists on the db
	{
		//Check whether record exists on the db
		if(isset($this->session->userdata['userLoginDetails']))
		{
			$res = $this->db->query("SELECT * FROM `".WHOISONLINE_TABLE."` where `wio_id`='".$this->session->userdata['userOnline']."'");
			if($res->num_rows()==0)
			{
				unset($this->session->userdata['userLoginDetails']);
			}
		}
		
		$http_referrer = isset($_SERVER['HTTP_REFERER'])?$this->getBaseAddress($_SERVER['HTTP_REFERER']):'Direct Access';
		
		//Check whether user is already online or new user
		if(!isset($this->session->userdata['userLoginDetails']))
		{
			if(isset($this->session->userdata['userLoginDetails']))
			{
				$this->db->query("INSERT INTO `".WHOISONLINE_TABLE."` SET `wio_ipaddress`='".$this->getIpAddress()."',`wio_lasturl`='".$_SERVER["REQUEST_URI"]."',`wio_referrer`='".$http_referrer."',`usr_id`='".$this->session->userdata['userLoginDetails']['usr_id']."'");
			}
			else
			{
				$this->db->query("INSERT INTO `".WHOISONLINE_TABLE."` SET `wio_ipaddress`='".$this->getIpAddress()."',`wio_lasturl`='".$_SERVER["REQUEST_URI"]."',`wio_referrer`='".$http_referrer."'");
			}
			$this->session->userdata['userOnline'] = $this->db->insert_id();
		}
		else
		{
			$this->db->query("UPDATE `".WHOISONLINE_TABLE."` SET `wio_ipaddress`='".$this->getIpAddress()."',`wio_lasturl`='".$_SERVER["REQUEST_URI"]."' where `wio_id`='".$this->session->userdata['userOnline']."'");
		}
	}
	
	function getBaseAddress()
	{
		$pos = "";
		$url = $_SERVER['HTTP_REFERER'];
		$chars = preg_split('//', $url, -1, PREG_SPLIT_NO_EMPTY);
		$slash = 3; // 3rd slash
		$i = 0;
		foreach($chars as $key => $char)
		{
			if($char == '/')
			{
			   $j = $i++;
			}
			if($i == 3)
			{
			   $pos = $key; break;
			}
		}
		$main_base = substr($url, 0, $pos);
		return $main_base;
	}
	
}