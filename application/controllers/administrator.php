<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!isset($this->session->userdata['adminLoginDetails']))
		{
			redirect(ROOT_FOLDER.'adminlogin/');
		}
		$config['permitted_uri_chars'] = '';
		
		$this->data['title'] = $this->commonmodel->pagetitle();
		
		$this->load->model('adminmodel');
		$this->load->helper('url');
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
				'adm_fname' => $login->adm_fname,
				'adm_email' => $login->adm_email,
				'adm_gender' => $login->adm_gender,
				'is_admin_logged_in' => true
			);


			$this->session->set_userdata($data);
			redirect(ROOT_FOLDER.'administrator/home');
		}
		else // incorrect username or password
		{
			$status['result'] = 'failiure';
			$status['message'] = 'Invalid credentials. Please try again.';
			
			$this->session->set_flashdata('status', $status);
			redirect(ROOT_FOLDER);
		}
	}	
	
	function home()
	{
		$this->data['mainmenu'] = 'home';
		
		$this->data['title'] = 'Home Page';
		$this->data['loadpage'] = 'admin/adminhome';
		$this->load->view('admin/admin_layout',$this->data);
	}

	function addUsers()
	{
		$this->data['title'] = 'Add Users';
		$this->data['mainmenu'] = 'users';
		$this->data['submenu'] = 'addusers';
		
		$this->data['countries'] = $this->commonmodel->getAllRecords(COUNTRIES);
		$this->load->model('usermodel');
		$this->data['sex'] = $this->usermodel->getAllGenders();

		if($_POST)
		{
			$this->form_validation->set_rules('usr_fname', 'First name', 'required');
			$this->form_validation->set_rules('usr_lname', 'Last name', 'required');
			$this->form_validation->set_rules('usr_email', 'Email', 'required|valid_email|callback_username_check');
			$this->form_validation->set_rules('usr_password', 'Password', 'required|matches[usr_pass_confi]');
			$this->form_validation->set_rules('usr_pass_confi', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('usr_gender', 'Gender', 'required');
			$this->form_validation->set_rules('usr_mobile', 'Mobile Number', 'required');
			$this->form_validation->set_rules('usr_country', 'Country', 'required');
			$this->form_validation->set_rules('usr_state', 'State', 'required');
			$this->form_validation->set_rules('usr_city', 'City', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->data['validation_errors'] = 1;
				$this->data['values'] = $_POST;
				
				$this->data['loadpage'] = 'admin/add_user';
				$this->load->view('admin/admin_layout',$this->data);
			}
			else
			{
				$status = $this->adminmodel->addUser();
				
				if($status)
				{
					$_SESSION['status']['result'] = '1';
					$_SESSION['status']['message'] = 'User added successfully.';
				}
				else
				{
					$_SESSION['status']['result'] = '0';
					$_SESSION['status']['message'] = 'User details failed to add. Please try again.';
				}
				redirect(base_url().'administrator/listusers');
			}
		}
		else
		{
			$this->data['loadpage'] = 'admin/add_user';
			$this->load->view('admin/admin_layout',$this->data);
		}
	}
	
	function edituser($usr_id)
	{
		$this->data['mainmenu'] = 'users';
		
		$this->data['countries'] = $this->commonmodel->getAllRecords(COUNTRIES);

		if($_POST)
		{
			$this->form_validation->set_rules('usr_fname', 'First name', 'required');
			$this->form_validation->set_rules('usr_lname', 'Last name', 'required');
			$this->form_validation->set_rules('usr_email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('usr_password', 'Password', 'required|matches[usr_pass_confi]');
			$this->form_validation->set_rules('usr_pass_confi', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('usr_gender', 'Gender', 'required');
			$this->form_validation->set_rules('usr_mobile', 'Mobile Number', 'required');
			$this->form_validation->set_rules('usr_country', 'Country', 'required');
			$this->form_validation->set_rules('usr_state', 'State', 'required');
			$this->form_validation->set_rules('usr_city', 'City', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->data['validation_errors'] = 1;
				$this->data['values'] = $_POST;
				
				$this->data['loadpage'] = 'admin/edit_user';
				$this->load->view('admin/admin_layout',$this->data);
			}
			else
			{
				$status = $this->adminmodel->editUser($usr_id);
				
				if($status)
				{
					$_SESSION['status']['result'] = '1';
					$_SESSION['status']['message'] = 'User details updated successfully.';
				}
				else
				{
					$_SESSION['status']['result'] = '0';
					$_SESSION['status']['message'] = 'User details failed to update. Please try again.';
				}
				redirect(base_url().'administrator/listusers');
			}
		}
		else
		{
			$this->load->model('usermodel');
			
			$tdata = array('table'=>USERS,'wfld'=>'usr_id','wval'=>$usr_id);
			$this->data['user_form_details'] = $this->adminmodel->getRecordById($tdata);
			$this->data['sex'] = $this->usermodel->getAllGenders();
			
			$this->load->view('admin/header',$this->data);
			$this->load->view('admin/edit_user',$this->data);
			$this->load->view('admin/footer');
		}
	}
	
	function listusers()
	{
		$this->data['mainmenu'] = 'users';
		$this->data['submenu'] = 'listusers';
		$this->data['title'] = 'List of Registered Users';
		
		if(isset($_SESSION['status']))
		{
			$this->data['status'] = $_SESSION['status'];
			unset($_SESSION['status']);
		}
		$tdata = array('table'=>USERS,'obyfld'=>'DESC');
		$this->data['users'] = $this->adminmodel->getAllRecords($tdata);
		
		$this->data['loadpage'] = 'admin/listusers';
		$this->load->view('admin/admin_layout',$this->data);
	}
	
	function changeAdStatus($ad_id)
	{
		$tdata = array('table'=>ADSENSE,'sfld'=>'ad_status','wfld'=>'ad_id','wval'=>$ad_id);
		$status = $this->adminmodel->changeRecordStatus($tdata);
		
		if($status)
		{
			$_SESSION['status']['result'] = '1';
		}
		else
		{
			$_SESSION['status']['result'] = '0';
		}
		
		$_SESSION['status']['message'] = 'Ad status changed successfully.';
		redirect(base_url().'administrator/adsense');
	}

	function addwebpage()
	{
		$this->data['title'] = 'Add Page';
		$this->data['mainmenu'] = 'webpage';
		$this->data['submenu'] = 'addpage';
		
		if($_POST)
		{
			$this->form_validation->set_rules('cms_page_name', 'Page Name', 'required');
			$this->form_validation->set_rules('cms_browser_title', 'Browser Title', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->data['validation_errors'] = 1;
				
				$this->data['loadpage'] = 'admin/add_edit_cms';
				$this->load->view('admin/admin_layout',$this->data);
			}
			else
			{
				$status = $this->adminmodel->addCMSPage();
				
				if($status)
				{
					$_SESSION['status']['result'] = '1';
					$_SESSION['status']['message'] = 'CMS page added successfully.';
				}
				else
				{
					$_SESSION['status']['result'] = '0';
					$_SESSION['status']['message'] = 'CMS page failed to add. Please try again.';
				}
				redirect(base_url().'administrator/cmslisting');
			}
		}
		else
		{
			$this->data['loadpage'] = 'admin/add_edit_cms';
			$this->load->view('admin/admin_layout',$this->data);
		}
	}
	
	function editwebpage($page_id)
	{
		$this->data['title'] = 'Edit Page';
		$this->data['mainmenu'] = 'webpage';
		$this->data['page'] = 'edit';
		
		if($_POST)
		{
			$this->form_validation->set_rules('cms_page_name', 'Page Name', 'required');
			$this->form_validation->set_rules('cms_browser_title', 'Browser Title', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->data['validation_errors'] = 1;
				$this->data['values'] = $_POST;
				
				$this->data['loadpage'] = 'admin/add_edit_cms';
				$this->load->view('admin/admin_layout',$this->data);
			}
			else
			{
				$status = $this->adminmodel->editCMSPage($page_id);
				
				if($status)
				{
					$_SESSION['status']['result'] = '1';
					$_SESSION['status']['message'] = 'Web page updated successfully.';
				}
				else
				{
					$_SESSION['status']['result'] = '0';
					$_SESSION['status']['message'] = 'Web page failed to update. Please try again.';
				}
				redirect(base_url().'administrator/cmslisting');
			}
		}
		else
		{
			$tdata = array('table'=>CMS_TABLE,'wfld'=>'cms_id','wval'=>$page_id);
			$this->data['user_form_details'] = $this->adminmodel->getRecordById($tdata);
			
			$this->data['loadpage'] = 'admin/add_edit_cms';
			$this->load->view('admin/admin_layout',$this->data);
		}
	}
	
	function cmslisting()
	{
		$this->data['title'] = 'List of Pages';
		$this->data['mainmenu'] = 'webpage';
		$this->data['submenu'] = 'listpage';
		
		if(isset($_SESSION['status']))
		{
			$this->data['status'] = $_SESSION['status'];
			unset($_SESSION['status']);
		}
		$tdata = array('table'=>CMS_TABLE);
		$this->data['pages'] = $this->adminmodel->getAllRecords($tdata);
		
		$this->data['loadpage'] = 'admin/list_cms';
		$this->load->view('admin/admin_layout',$this->data);
	}

	function failedlogins()
	{
		$this->data['mainmenu'] = 'logs';
		$this->data['submenu'] = 'failedlogins';
		$this->data['title'] = 'Failed Logins';
		
		$this->data['login_attempts'] = $this->adminmodel->failed_login_attempts();
		
		$this->data['loadpage'] = 'admin/failed_logins';
		$this->load->view('admin/admin_layout',$this->data);
	}
	
	function username_check($email)
	{
		$check = $this->commonmodel->username_check($email);
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
	
	function changeuserstatus($usr_id)
	{
		$tdata = array('table'=>USERS,'sfld'=>'usr_status','wfld'=>'usr_id','wval'=>$usr_id);
		$status = $this->adminmodel->changeRecordStatus($tdata);
		
		if($status)
		{
			$_SESSION['status']['result'] = '1';
		}
		else
		{
			$_SESSION['status']['result'] = '0';
		}
		
		$_SESSION['status']['message'] = 'User status changed successfully.';
		redirect(base_url().'administrator/listusers');
	}
	
	function deleteuser($usr_id)
	{
		$tdata = array('table'=>USERS,'wfld'=>'usr_id','wval'=>$usr_id);
		$status = $this->adminmodel->deleteRecordById($tdata);
		
		if($status)
		{
			$_SESSION['status']['result'] = '1';
			$_SESSION['status']['message'] = 'User deleted successfully.';
		}
		else
		{
			$_SESSION['status']['result'] = '0';
			$_SESSION['status']['message'] = 'User failed to delete. Please try later.';
		}
		
		redirect(base_url().'administrator/listusers');
	}
	
	function changecmsstatus($page_id)
	{
		$tdata = array('table'=>CMS_TABLE,'sfld'=>'cms_status','wfld'=>'cms_id','wval'=>$page_id);
		$status = $this->adminmodel->changeRecordStatus($tdata);
		
		if($status)
		{
			$_SESSION['status']['result'] = '1';
		}
		else
		{
			$_SESSION['status']['result'] = '0';
		}
		
		$_SESSION['status']['message'] = 'Page status changed successfully.';
		redirect(base_url().'administrator/cmslisting');
	}
	
	function deletepage($page_id)
	{
		$tdata = array('table'=>CMS_TABLE,'wfld'=>'cms_id','wval'=>$page_id);
		$status = $this->adminmodel->deleteRecordById($tdata);
		
		if($status)
		{
			$_SESSION['status']['result'] = '1';
			$_SESSION['status']['message'] = 'Page deleted successfully.';
		}
		else
		{
			$_SESSION['status']['result'] = '0';
			$_SESSION['status']['message'] = 'Page failed to delete. Please try later.';
		}
		
		redirect(base_url().'administrator/cmslisting');
	}
	
	function deletemail($mail_id)
	{
		$tdata = array('table'=>MAILS_TABLE,'wfld'=>'cm_id','wval'=>$mail_id);
		$status = $this->adminmodel->deleteRecordById($tdata);
		
		if($status)
		{
			$_SESSION['status']['result'] = '1';
			$_SESSION['status']['message'] = 'Mail deleted successfully.';
		}
		else
		{
			$_SESSION['status']['result'] = '0';
			$_SESSION['status']['message'] = 'Mail failed to delete. Please try later.';
		}
		
		redirect(base_url().'administrator/list_mails');
	}
	
	function mails()
	{
		$this->data['mainmenu'] = 'mails';
		$this->data['title'] = 'User Mails';
		
		if(isset($_SESSION['status']))
		{
			$this->data['status'] = $_SESSION['status'];
			unset($_SESSION['status']);
		}
		
		$tdata = array('table'=>MAILS_TABLE,'obyfld'=>'cm_id','ord'=>'DESC');
		$this->data['mails'] = $this->adminmodel->getAllRecords($tdata);
		
		$this->data['loadpage'] = 'admin/list_mails';
		$this->load->view('admin/admin_layout',$this->data);
	}
	
	function readmail($mail_id)
	{
		$tdata = array('table'=>MAILS_TABLE,'wfld'=>'cm_id','wval'=>$mail_id);
		$this->data['mail'] = $this->adminmodel->getRecordById($tdata);
		
		$this->data['title'] = 'View Mail';
		
		$this->load->view('admin/header');
		$this->load->view('admin/read_mail',$this->data);
		$this->load->view('admin/footer');
	}

	function myaccount()
	{
		$this->data['title'] = 'My Account';
		if($_POST)
		{
			$this->form_validation->set_rules('adm_name', 'Name', 'required');
			$this->form_validation->set_rules('adm_email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('adm_pwd', 'Password', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{
				$this->data['validation_errors'] = 1;
				$this->data['values'] = $_POST;
				
				$this->data['loadpage'] = 'admin/my_account';
				$this->load->view('admin/admin_layout',$this->data);
			}
			else
			{
				$status = $this->adminmodel->updatemyaccount();
				
				if($status)
				{
					$_SESSION['status']['result'] = '1';
					$_SESSION['status']['message'] = 'Admin details updated successfully.';
				}
				else
				{
					$_SESSION['status']['result'] = '0';
					$_SESSION['status']['message'] = 'Admin details failed to update. Please try again.';
				}
				redirect(base_url().'administrator/myaccount');
			}
		}
		else
		{
			if(isset($_SESSION['status']))
			{
				$this->data['status'] = $_SESSION['status'];
				unset($_SESSION['status']);
			}

			$tdata = array('table'=>ADMIN_TABLE,'wfld'=>'adm_email','wval'=>$this->session->userdata['adminLoginDetails']['adm_email']);
			$this->data['myaccount'] = $this->adminmodel->getRecordById($tdata);
			
			$this->data['loadpage'] = 'admin/my_account';
			$this->load->view('admin/admin_layout',$this->data);
		}
	}
	
	
	/*function addads()
	{
		$this->data['title'] = 'Add Advertisement';
		$this->data['mainmenu'] = 'adsense';
		$this->data['submenu'] = 'addads';
		
		if($_POST)
		{
			$this->form_validation->set_rules('ad_position', '	
Position of ad', 'required');
			$this->form_validation->set_rules('ad_code', 'Paste ad code', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->data['validation_errors'] = 1;
				
				$this->data['loadpage'] = 'admin/add_edit_adsense';
				$this->load->view('admin/admin_layout',$this->data);
			}
			else
			{
				$status = $this->adminmodel->addAdcode();
				
				if($status)
				{
					$_SESSION['status']['result'] = '1';
					$_SESSION['status']['message'] = 'CMS page added successfully.';
				}
				else
				{
					$_SESSION['status']['result'] = '0';
					$_SESSION['status']['message'] = 'CMS page failed to add. Please try again.';
				}
				redirect(base_url().'administrator/listads');
			}
		}
		else
		{
			$this->data['loadpage'] = 'admin/add_edit_adsense';
			$this->load->view('admin/admin_layout',$this->data);
		}
	}*/
	
	function adsense()
	{
		$this->data['mainmenu'] = 'adsense';
		//$this->data['submenu'] = 'list-adsense';
		$this->data['title'] = 'Adsense Settings';
		
		$tdata = array('table'=>ADSENSE);
		$this->data['ads'] = $this->adminmodel->getAllRecords($tdata);
		
		$this->data['loadpage'] = 'admin/list_adsense';
		$this->load->view('admin/admin_layout',$this->data);
	}

	function whoisonline()
	{
		$this->data['mainmenu'] = 'wio';
		$this->data['title'] = 'Who is online';
		
		$tdata = array('table'=>WHOISONLINE_TABLE,'obyfld'=>'wio_id','obyval'=>'DESC');
		$this->data['wio'] = $this->adminmodel->getAllRecords($tdata);
		
		$this->data['loadpage'] = 'admin/list_whoisonline';
		$this->load->view('admin/admin_layout',$this->data);
	}

	function logout()
	{
		if(isset($this->session->userdata['adminLoginDetails']))
		{
			$this->session->sess_destroy();
			$this->index();
		}
	}
}

/* End of file administrator.php */
/* Location: ./system/application/controllers/administrator.php */
