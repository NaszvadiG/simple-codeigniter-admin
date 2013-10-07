<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	 
	function generatestate($country,$for=NULL)
	{
		$states = $this->commonmodel->getAllStatesByCountry($country);
		$option = '';
		$selected = '';
		$selected_state = '';
		
		switch($for)
		{
			case 'user':
				$selected_state = $this->commonmodel->getSingleValueById(USERS,'usr_email',$this->session->userdata['userLoginDetails']['usr_email'],'usr_state');
			break;
		}
		
		$option .= '<option value="">Select State</option>';
		foreach($states as $key=>$val)
		{
			if($val->state==$selected_state){$selected = 'selected="selected"';}elseif(isset($selected)){$selected='';}
			
			$option .= '<option value="'.$val->state.'" '.$selected.'>'.$val->title.'</option>';
		}
		echo $option;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
