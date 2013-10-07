<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
		$this->data['linknavigation'] = $this->commonmodel->linknavigation();
		
		if(!isset($this->session->userdata['userLoginDetails']))
		{
			redirect(ROOT_FOLDER.'login');
		}
		
		$this->data['title'] = $this->commonmodel->pagetitle();
		$this->data['ads'] = $this->commonmodel->getAllAds();
	}
	
	function index()
	{
		redirect(ROOT_FOLDER.'user/myprofile');
	}

	function myprofile()
	{
		$this->data['title'] = 'Welcome '.$this->session->userdata['userLoginDetails']['usr_fname'].' - My Profile';
		$this->data['linknavigate'] = 'My Profile';
		$this->data['status'] = $this->session->flashdata('status');
		$this->data['userdetails'] = $this->usermodel->getSessionUserDetails();
		$this->data['menuselected'] = 'myprofile';
		$this->data['pagecontent'] = 'myprofile';

		$this->data['sex'] = $this->usermodel->getAllGenders();
		$this->data['countries'] = $this->commonmodel->getAllRecords(COUNTRIES,'title','value');
		$this->data['middlecontent'] = 'userlayout';
		$this->load->view('layout/home_layout',$this->data);
	}
	
	function updateprofile()
	{
		$this->form_validation->set_rules('usr_fname', 'First name', 'required');
		$this->form_validation->set_rules('usr_lname', 'Last name', 'required');
		$this->form_validation->set_rules('usr_mobile', 'Mobile number', 'required');
		$this->form_validation->set_rules('usr_password', 'Password', 'required|matches[usr_confi_password]');
		$this->form_validation->set_rules('usr_confi_password', 'Confirm password', 'required');
		$this->form_validation->set_rules('usr_gender', 'Gender', 'required');
		$this->form_validation->set_rules('usr_country', 'Country', 'required');
		$this->form_validation->set_rules('usr_state', 'State', 'required');
		$this->form_validation->set_rules('usr_city', 'City', 'required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$status['result'] = 'failiure';
			$status['message'] = 'Error. Please fill the fieds with correct data.';
			$this->session->set_flashdata('status',$status);
			
			redirect(ROOT_FOLDER.'user/myprofile');
		}
		else
		{
			$res = $this->usermodel->updateUser();
			
			if($res)
			{
				$status['result'] = 'success';
				$status['message'] = 'User updated successfully.';
			}
			else
			{
				$status['result'] = 'failiure';
				$status['message'] = 'User updation failed.';
			}
			$this->session->set_flashdata('status', $status);
			redirect(ROOT_FOLDER.'user/myprofile');
		}
	}
	
	function contactus()
	{
		$this->data['title'] = 'Contact Us';
		if($this->input->post())
		{
			$this->form_validation->set_rules('fb_type', 'Feedback Type', 'required');
			$this->form_validation->set_rules('fb_subject', 'Subject', 'required');
			$this->form_validation->set_rules('fb_message', 'Message', 'required');
			
			if($this->form_validation->run() == FALSE)
			{
				$status['result'] = 'failiure';
				$status['message'] = 'Error. Please fill the fieds with correct data.';
			}
			else
			{
				$result = $this->usermodel->contactus();
				if($result)
				{
					$status['result'] = 'success';
					$status['message'] = 'Feedback sent successfully.';
				}
				else
				{
					$status['result'] = 'failiure';
					$status['message'] = 'Sorry. But your feedback failed to send.';
				}
			}
			$this->session->set_flashdata('status',$status);

			$this->data['status'] = $status;
		}
		
		$this->data['types'] = $this->commonmodel->getAllRecords(FEEDBACK_TYPES);
		$this->data['pagecontent'] = 'contactus';
		$this->data['middlecontent'] = 'userlayout';
		$this->load->view('layout/home_layout',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */