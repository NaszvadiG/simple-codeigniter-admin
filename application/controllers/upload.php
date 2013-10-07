<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!isset($this->session->userdata['userLoginDetails']))
		{
			redirect(ROOT_FOLDER.'login');
		}
		$this->load->model('downloadmodel');
		$this->load->model('uploadmodel');
		$this->data['linknavigation'] = $this->commonmodel->linknavigation();

		$this->data['menuselected'] = 'uploads';
		$this->data['title'] = 	'Upload - Submit your resources';
		//$this->commonmodel->pagetitle();
		$this->data['ads'] = $this->commonmodel->getAllAds();
	}
	
	function index()
	{
		$status = $this->session->flashdata('status');
		if($status){$this->data['status'] = $status;}
		$this->data['uploads'] = $this->downloadmodel->getResourceCategories();

		$this->data['pagecontent'] = 'uploadresources';
		$this->data['middlecontent'] = 'userlayout';
		$this->load->view('layout/home_layout',$this->data);
	}
	
	function uploadfiles()
	{
		$result = "";

		$result = $this->uploadmodel->uploadresources();
		if($result==true)
		{
			$status['result'] = 'success';
			$status['message'] = 'Thanks for upload. Your uploads were sent to administrator for approval.'; 
			
			$this->session->set_flashdata('status', $status);
		}
		else
		{
			$status['result'] = 'failiure';
			$status['message'] = 'One or more files failed to upload.';
			$status['responsedetails'] = $result;
			
			$this->session->set_flashdata('status', $status);
		}

		redirect(UPLOADS);
	}


	function hotds()
	{
		$this->data['menuselected'] = 'hotds';
		$this->data['topDownloads'] = $this->uploadmodel->topDownloads();

		$this->data['pagecontent'] = 'topdownloads';
		$this->data['middlecontent'] = 'userlayout';
		$this->load->view('layout/home_layout',$this->data);
	}

	function my_contributions()
	{
		$this->data['menuselected'] = 'my_contributions';
		$this->data['myContributions'] = $this->uploadmodel->myContributions();

		$this->data['pagecontent'] = 'myContributions';
		$this->data['middlecontent'] = 'userlayout';
		$this->load->view('layout/home_layout',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */