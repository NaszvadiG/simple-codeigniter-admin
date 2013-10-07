<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('newslettermodel');
		if(!isset($this->session->userdata['adminLoginDetails']))
		{
			redirect(ROOT_FOLDER.'adminlogin/');
		}
		
		$this->data['title'] = $this->commonmodel->pagetitle();
		
		$this->load->model('adminmodel');
		$this->load->helper('url');
	}
	
	function listnewsletter()
	{
		$this->data['mainmenu'] = 'newsletter';
		$this->data['submenu'] = 'listnewsletter';
		$this->data['title'] = 'List of Newsletters';
		
		if(isset($_SESSION['status']))
		{
			$this->data['status'] = $_SESSION['status'];
			unset($_SESSION['status']);
		}
		$tdata = array('table'=>NEWSLETTERS_TABLE);
		$this->data['newsletters'] = $this->newslettermodel->getAllNewsletters($tdata);
		
		$this->data['loadpage'] = 'admin/listnewsletters';
		$this->load->view('admin/admin_layout',$this->data);
	}
	
	function addnewsletter()
	{	
		$this->data['mainmenu'] = 'newsletter';
		$this->data['submenu'] = 'addnewsletter';
		$this->data['title'] = 'Add Newsletter';
		$this->data['newslettercategories'] = $this->newslettermodel->getAllNewslettercategories();
		
		if($_POST)
		{
			$this->form_validation->set_rules('nl_category', 'Newsletter category', 'required');
			$this->form_validation->set_rules('nl_title', 'Newsletter Title', 'required');
			$this->form_validation->set_rules('nl_content', 'Newsletter Content', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->data['validation_errors'] = 1;
				
				$this->data['loadpage'] = 'admin/add_edit_cms';
				$this->load->view('admin/admin_layout',$this->data);
			}
			else
			{
				$status = $this->newslettermodel->addNewsletter();
				
				if($status)
				{
					$_SESSION['status']['result'] = '1';
					$_SESSION['status']['message'] = 'Newsletter added successfully.';
				}
				else
				{
					$_SESSION['status']['result'] = '0';
					$_SESSION['status']['message'] = 'Newsletter failed to add. Please try again.';
				}
				redirect(base_url().'newsletter/listnewsletter');
			}
		}
		else
		{
			$this->data['loadpage'] = 'admin/add_edit_newsletter';
			$this->load->view('admin/admin_layout',$this->data);
		}
	}
	
	function editnewsletter($nl_id)
	{
		$this->data['title'] = 'Edit Newsletter';
		$this->data['mainmenu'] = 'newsletter';
		$this->data['page'] = 'edit';
		$this->data['newslettercategories'] = $this->newslettermodel->getAllNewslettercategories();
		
		if($_POST)
		{
			$this->form_validation->set_rules('nl_category', 'Newsletter category', 'required');
			$this->form_validation->set_rules('nl_title', 'Newsletter Title', 'required');
			$this->form_validation->set_rules('nl_content', 'Newsletter Content', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->data['validation_errors'] = 1;
				$this->data['values'] = $_POST;
				
				$this->data['loadpage'] = 'admin/add_edit_newsletter';
				$this->load->view('admin/admin_layout',$this->data);
			}
			else
			{
				$status = $this->newslettermodel->editNewsletter($nl_id);
				
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
				redirect(base_url().'newsletter/listnewsletter');
			}
		}
		else
		{
			$tdata = array('table'=>NEWSLETTERS_TABLE,'wfld'=>'nl_id','wval'=>$nl_id);
			$this->data['nl_form_details'] = $this->adminmodel->getRecordById($tdata);
			
			$this->data['loadpage'] = 'admin/add_edit_newsletter';
			$this->load->view('admin/admin_layout',$this->data);
		}
	}

	function changenewsletterstatus($nl_id)
	{
		$tdata = array('table'=>NEWSLETTERS_TABLE,'sfld'=>'nl_status','wfld'=>'nl_id','wval'=>$nl_id);
		$status = $this->adminmodel->changeRecordStatus($tdata);
		
		if($status)
		{
			$_SESSION['status']['result'] = '1';
		}
		else
		{
			$_SESSION['status']['result'] = '0';
		}
		
		$_SESSION['status']['message'] = 'Newsletter status changed successfully.';
		redirect(base_url().'newsletter/listnewsletter');
	}
	
	function deleteNewsletter($nl_id)
	{
		$tdata = array('table'=>NEWSLETTERS_TABLE,'wfld'=>'nl_id','wval'=>$nl_id);
		$status = $this->adminmodel->deleteRecordById($tdata);
		
		if($status)
		{
			$_SESSION['status']['result'] = '1';
			$_SESSION['status']['message'] = 'Newsletter deleted successfully.';
		}
		else
		{
			$_SESSION['status']['result'] = '0';
			$_SESSION['status']['message'] = 'Newsletter failed to delete. Please try later.';
		}
		
		redirect(base_url().'newsletter/listnewsletter');
	}
	
	function sendnewsletter($nl_id)
	{
		$this->data['mainmenu'] = 'newsletter';
		$this->data['submenu'] = 'sendnewsletter';
		$this->data['title'] = 'Send Newsletter';
		$this->data['nl_id'] = $nl_id;
		
		if(isset($_SESSION['status']))
		{
			$this->data['status'] = $_SESSION['status'];
			unset($_SESSION['status']);
		}
		$this->data['newsletters'] = $this->newslettermodel->getNewsletterDetailsById($nl_id);
		
		$this->data['loadpage'] = 'admin/send_newsletter';
		$this->load->view('admin/admin_layout',$this->data);
	}

	function sendnewsletternow($nl_id)
	{
		$this->load->library('email');
		
		$newsletter_subscribers = $this->newslettermodel->getAllActiveSubscribers($nl_id);
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('newsletter@darrr.com', 'Learn and score easy');
		
		$this->data['newsletters'] = $this->newslettermodel->getNewsletterDetailsById($nl_id);
		$sentstatus = array();
		
		if(count($newsletter_subscribers))
		{
			foreach($newsletter_subscribers as $val)
			{
				$this->data['newsletters']->nls_name = $val->nls_name;
				$this->data['newsletters']->nls_id = $val->nls_id;
				$this->email->subject(stripslashes($this->data['newsletters']->nl_title));
				$this->email->message($this->load->view('admin/newsletters/t1', $this->data, TRUE));
				$this->email->to($val->nls_email, $val->nls_name);
				$sentstatus[] = $this->email->send();
			}
		}
		
		if(in_array(FALSE,$sentstatus))
		{
			$_SESSION['status']['result'] = '1';
			$_SESSION['status']['message'] = 'Newsletter sent successfully.';
			redirect(base_url().'newsletter/listnewsletter');
		}
		else
		{
			$_SESSION['status']['result'] = '0';
			$_SESSION['status']['message'] = 'Newsletter failed to sent. Please try again.';
			redirect(base_url().'newsletter/sendnewsletter/'.$nl_id);
		}
   }
   
   function unsubscribe($nls_id)
   {
	   $unsubscribe = $this->newslettermodel->unsubscribenewsletter($nls_id);
	   if(isset($unsubscribe)&&$unsubscribe==TRUE)
	   {
			$status['result'] = 'success';
			$status['message'] = "We know you're busy. Take a breather! We won't come back till you tell us to. Bye.";
	   }
	   else
	   {
			$status['result'] = 'failiure';
			$status['message'] = "Sorry. But have you never been subscribed or already unsubscribed with us. I promise.";
	   }
		$this->data['status'] = $status;
		$this->data['ads'] = $this->commonmodel->getAllAds();
		$this->data['title'] = 'Anna University old question papers download';
		$this->data['middlecontent'] = 'home';
		$this->load->view('layout/home_layout',$this->data);
   }
}

/* End of file administrator.php */
/* Location: ./system/application/controllers/administrator.php */