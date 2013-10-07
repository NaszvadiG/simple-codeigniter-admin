<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Downloads extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		if(!isset($this->session->userdata['userLoginDetails']))
		{
			//redirect(ROOT_FOLDER.'login');
			$this->data['middlecontent'] = 'qpdownloadlayout';
		}
		else
		{
			$this->data['middlecontent'] = 'userlayout';
		}
		
		$this->load->model('downloadmodel');
		$this->data['linknavigation'] = $this->commonmodel->linknavigation();

		
		$this->data['menuselected'] = 'downloads';
		$this->data['title'] = 	'Downloads';
		$this->data['ads'] = $this->commonmodel->getAllAds();
	}
	
	function index()
	{
		$this->data['resourcestypes'] = $this->downloadmodel->getResourceCategories();

		$this->data['pagecontent'] = 'downloadresources';
		$this->load->view('layout/home_layout',$this->data);
	}
	
	function subjects($startswith='A')
	{
		$this->data['title'] = 	'Subjects starts with '.$startswith;
		$this->data['allSubjects'] =  $this->downloadmodel->getAllSubjects($startswith);
		
		$this->data['startswith'] = $startswith;
		$this->data['pagecontent'] = 'subjects';
		$this->load->view('layout/home_layout',$this->data);
	}
	
	function questionpapers($subjectname=NULL)
	{
		$this->data['title'] = 	urldecode($subjectname);
		if(!isset($subjectname))redirect(ROOT_FOLDER.'downloads/subjects');
		$this->data['qpapers'] =  $this->downloadmodel->getAllQPapers($subjectname);

		$this->data['subjectname'] = $subjectname;
		$this->data['pagecontent'] = 'questionpapers';
		$this->load->view('layout/home_layout',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */