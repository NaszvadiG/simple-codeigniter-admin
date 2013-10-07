<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Controller {
	 
	function __construct()
	{
		if(isset($this->session->userdata['adminLoginDetails']))
		{
			redirect(ROOT_FOLDER.'administrator/home');
		}
		
		parent::__construct();
		$this->load->model('adminmodel');
	}
	 
	function index()
	{
		if(isset($this->session->userdata['adminLoginDetails']))
		{
			redirect(ROOT_FOLDER.'administrator/home');
		}

		$status = $this->session->flashdata('status');
		if($status){$this->data['status'] = $status;}
		$this->data['title'] = 'Administrator';
		$this->load->view('admin/adminlogin',$this->data);
	}

	function validatelogin()
	{		
		
		$login = $this->adminmodel->validateadminlogin();
		
		if($login) // if the user's credentials validated...
		{
			$data['adminLoginDetails'] = array(
				'adm_name' => $login->adm_name,
				'adm_email' => $login->adm_email,
				'adm_gender' => $login->adm_gender,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect(ROOT_FOLDER.'administrator/home');
		}
		else // incorrect username or password
		{
			$status['result'] = 'failiure';
			$status['message'] = 'Invalid credentials. Please try again.';
			
			$this->session->set_flashdata('status', $status);
			redirect(ADMIN_ROOT_FOLDER);
		}
	}	
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */