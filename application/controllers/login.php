<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	 
	function __construct()
	{
		if(isset($this->session->userdata['userLoginDetails']))
		{
			redirect(ROOT_FOLDER.'user/myprofile');
		}
		
		parent::__construct();
		$this->load->model('loginmodel');
		$this->load->model('usermodel');
		$this->data['ads'] = $this->commonmodel->getAllAds();
	}
	 
	function index()
	{
		if(isset($this->session->userdata['userLoginDetails']))
		{
			redirect(ROOT_FOLDER.'user/myprofile');
		}
		
		$status = $this->session->flashdata('status');
		if(isset($status)){$this->data['status'] = $status;}
		$this->data['title'] = 'Anna University old question papers download';
		$this->data['middlecontent'] = 'home';
		$this->load->view('layout/home_layout',$this->data);
	}
	 
	function register()
	{
		if(isset($_POST))
		{
			$this->form_validation->set_rules('usr_fname', 'First name', 'required');
			$this->form_validation->set_rules('usr_lname', 'Last name', 'required');
			$this->form_validation->set_rules('usr_password', 'Password', 'required|matches[usr_confi_password]');
			$this->form_validation->set_rules('usr_confi_password', 'Confirm password', 'required');
			$this->form_validation->set_rules('usr_email', 'Email', 'required|valid_email|callback_username_check');
			$this->form_validation->set_rules('usr_confi_email', 'Confirm Email', 'required');		

			if($this->form_validation->run() == FALSE)
			{
				$status['result'] = 'failiure';
				$status['message'] = validation_errors('<div class="error">', '</div>');
			}
			else
			{
				$result = $this->usermodel->addUser();
				if(isset($result))
				{
					$status['result'] = 'success';
					$status['message'] = 'Registration completed. Please Login';
				}
				else
				{
					$status['result'] = 'failiure';
					$status['message'] = 'Error in form. Please try again.';
				}
			}
			if(isset($status)){$this->data['status'] = $status;}
		}
		$this->data['title'] = 'Anna University old question papers download';
		$this->data['middlecontent'] = 'home';
		$this->load->view('layout/home_layout',$this->data);
	}

	function validatelogin()
	{		
		
		$login = $this->loginmodel->validate();
		
		if($login) // if the user's credentials validated...
		{
			$data['userLoginDetails'] = array(
				'usr_id' => $login->usr_id,
				'usr_fname' => $login->usr_fname,
				'usr_email' => $login->usr_email,
				'usr_gender' => $login->usr_gender,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect(ROOT_FOLDER.'user/myprofile');
		}
		else // incorrect username or password
		{
			$status['result'] = 'failiure';
			$status['message'] = 'Invalid credentials. Please try again.';
			
			$this->session->set_flashdata('status', $status);
			redirect(ROOT_FOLDER);
		}
	}	
	
	function username_check($email)
	{
		$check = $this->usermodel->username_check($email);
		if ($check)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('username_check', 'The email "'.$email.'" already exists.');
			return FALSE;
		}
	}
	
	function forgetpassword()
	{
		$password = $this->usermodel->forgetpassword($this->input->post('forget_password_email'));
		if(isset($password)&&$password!='')
		{
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('administrator@darrr.com', 'Administrator - darrr.com.');
			
			$this->data['randstring'] = $this->usermodel->randforgetpassstring($this->input->post('forget_password_email'));
			$this->data['email'] = $this->input->post('forget_password_email');
			$this->data['fname'] = $password->usr_fname;
			$this->email->subject('Your darrr.com password');
			$this->email->message($this->load->view('admin/newsletters/t1_forgetpass', $this->data, TRUE));
			$this->email->to($this->data['email'], $this->data['fname']);
			$sentstatus = $this->email->send();
			
			$status['result'] = 'success';
			$status['message'] = 'Please check your mail to initiate the password reset process.';
		}
		else
		{
			$status['result'] = 'failiure';
			$status['message'] = 'Password retrival failed. Invalid credentials.';
		}
		if(isset($status)){$this->data['status'] = $status;}
		$this->data['title'] = 'Anna University old question papers download';
		$this->data['middlecontent'] = 'home';
		$this->load->view('layout/home_layout',$this->data);
	}
	
	function validateresetemail($email,$randstring)
	{
		$check = $this->usermodel->checksameemail(urldecode($email),$randstring);
		
		if(isset($check))
		{
			$this->session->set_userdata(array('resetemail'=>urldecode($email)));
			$this->resetpassword(urldecode($email),$randstring);
		}
	}
	
	function resetpassword($email=NULL,$randstring=NULL)
	{
		if($_POST)
		{
			$this->form_validation->set_rules('new_password', 'Password', 'required|matches[confi_new_password]');
			$this->form_validation->set_rules('confi_new_password', 'Confirm new password', 'required');
			if($this->form_validation->run() == FALSE)
			{
				$status['result'] = 'failiure';
				$status['message'] = validation_errors('<div class="error">', '</div>');
			}
			else
			{
				$this->usermodel->updatepassword($email);
				$status['result'] = 'success';
				$status['message'] = "Password has been changed successfully";
				$this->session->set_flashdata($status);
				redirect(ROOT_FOLDER);
			}
		}
		else
		{
			$this->data['title'] = 'Anna University old question papers download';
			$this->data['middlecontent'] = 'home';
			$this->data['resetpassword'] = '1';
			$this->load->view('layout/home_layout',$this->data);
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