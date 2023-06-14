<?php defined('BASEPATH') or exit('No direct script access allowed');
class Webpagecontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security'));
		$this->load->library(array('form_validation', 'session', 'user_agent', 'email'));
		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
		Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
		Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

		$this->load->model('WebpageModel', 'webmob');
		$this->load->model('CommonModel', 'commod');
		$this->load->database();
	}
	public function home()
	{
		$arr['siteTitle'] = "CashKap";
		$arr['statedata'] = $this->commod->getAllStateSearch();
		$arr['citydata'] = $this->commod->getAllCitySearch();
		$arr['collegedata'] = $this->webmob->getAllFeaturedCollege();
		$arr['univdata'] = $this->webmob->getAllFeaturedUniversities();
		$arr['schooldata'] = $this->webmob->getAllFeaturedSchools();
		$arr['instdata'] = $this->webmob->getAllFeaturedInstitutes();
		$arr['videodata'] = $this->webmob->getAllFeaturedVideos();
		$arr['galdata'] = $this->webmob->getAllFeaturedImages();
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('state', 'State', 'trim|required', array(
			'required' => 'State required'
		));
		$this->form_validation->set_rules('city', 'City', 'trim|required', array(
			'required' => 'City required'
		));
		$this->form_validation->set_rules('course_id', 'Course', 'trim|required', array(
			'required' => 'Choose course from list only'
		));
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$state = $data['state'];
			$city = $data['city'];
			$course_id = $data['course_id'];
			$search_term = $state . "|" . $city . "|" . $course_id;
			$enc_searchterm = $this->encryptcode->encrypt($search_term, ENC_KEY_PASS);
			redirect("search/$enc_searchterm");
		} else {
			$this->load->view('website/homepage', $arr);
		}
	}
	public function introduction()
	{
		$arr['siteTitle'] = "About us | Cashkap";
		$arr['description'] = 'Cashkap is a platform where students can find the best and reputed schools, colleges, Universities, and coaching institutes according to their city. Apply online to any educational institute and save money by getting 5-10% cashback on fees.';
		$arr['statedata'] = $this->commod->getAllStateSearch();
		$arr['citydata'] = $this->commod->getAllCitySearch();
		$arr['collegedata'] = $this->webmob->getAllFeaturedCollege();
		$arr['univdata'] = $this->webmob->getAllFeaturedUniversities();
		$arr['schooldata'] = $this->webmob->getAllFeaturedSchools();
		$arr['instdata'] = $this->webmob->getAllFeaturedInstitutes();

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('state', 'State', 'trim|required', array(
			'required' => 'State required'
		));
		$this->form_validation->set_rules('city', 'City', 'trim|required', array(
			'required' => 'City required'
		));
		$this->form_validation->set_rules('course_id', 'Course', 'trim|required', array(
			'required' => 'Choose course from list only'
		));
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$state = $data['state'];
			$city = $data['city'];
			$course_id = $data['course_id'];
			$search_term = $state . "|" . $city . "|" . $course_id;
			$enc_searchterm = $this->encryptcode->encrypt($search_term, ENC_KEY_PASS);
			redirect("search/$enc_searchterm");
		} else {

			$this->load->view('website/introduction', $arr);
		}
	}
	public function company_overseas()
	{
		$arr['siteTitle'] = "Company Overseas";
		$this->load->view('website/company-overseas', $arr);
	}
	public function vision_mission()
	{
		$arr['siteTitle'] = "Vision Mission";
		$this->load->view('website/vision-mission', $arr);
	}
	public function benefits()
	{
		$arr['siteTitle'] = "Benefits";
		$this->load->view('website/benefits', $arr);
	}
	public function terms_conditions()
	{
		$arr['siteTitle'] = "Terms & Conditions";
		$this->load->view('website/terms-conditions', $arr);
	}
	public function contact_us()
	{
		$arr['siteTitle'] = "Contact us | Cashkap ";
		$arr['meta'] = '"Cashkap is one of the top IELTS Institutes providers in Mohali, providing individuals with tutoring to help them pass their IELTS exam with a decent Band score. Get 10% off on the first time apply."';
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('contact_number', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]', array(
			'required' => 'Please enter 10 digit mobile number',
			'numeric' => 'Please enter 10 digit mobile number',
			'min_length' => 'Please enter 10 digit mobile number',
			'max_length' => 'Please enter 10 digit mobile number',
		));
		$this->form_validation->set_rules('email', 'Email Id', 'trim|valid_email|required', array(
			'valid_email' => 'Please enter valid email id',
		));
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$name = $this->input->post('name');
			$email_id = $this->input->post('email');
			$phone_number = $this->input->post('contact_number');
			$mess = $this->input->post('message');
			$subject = $this->input->post('subject');
			/* Send Email to Admin Email */
			$this->email->from('info@cashkap.com', 'Cash Kap');
			$this->email->to('info@cashkap.com');
			$this->email->reply_to($email_id, 'Cash Kap');
			$this->email->set_mailtype("html");
			$this->email->subject("Contact us form submitted by: $name");
			$this->email->message("
			    	Name: $name
				    Email Id: $email_id
			    	Contact Number: $phone_number
			    	Subject: $subject
				    Message: $mess
				");
			$this->email->send();
			$this->session->set_flashdata('feedback', "Thank You. Your query submitted successfully. Our representative will  revert you soon.");
			$this->session->set_flashdata('feedbackerr', " alert-success alert-custom-success");
			redirect("contact-us?sent=1");
		} else {
			$this->load->view('website/contact-us', $arr);
		}
	}
	public function career()
	{
		$arr['siteTitle'] = "Career";
		$this->load->view('website/career', $arr);
	}
	public function testimonials()
	{
		$arr['siteTitle'] = "Testimonials";
		$this->load->view('website/testimonials', $arr);
	}
	public function search_listing($enc_searchterm)
	{
		$this->session->set_userdata('back_button', current_url());
		$arr['siteTitle'] = "Search";
		if (empty($enc_searchterm)) {
			redirect("/");
		}
		$search_term = $this->encryptcode->decrypt($enc_searchterm, ENC_KEY_PASS);
		$searchterm_ar = explode("|", $search_term);
		//print_r($searchterm_ar);
		$dtsearch = array();
		$dtsearch['state'] = $searchterm_ar[0];
		$dtsearch['city'] = $searchterm_ar[1];
		$dtsearch['course'] = $searchterm_ar[2];
		$arr['catlistdata'] = $this->webmob->getSearchData($dtsearch);

		$arr['state'] = $searchterm_ar[0];
		$arr['city'] = $searchterm_ar[1];
		$arr['course'] = $searchterm_ar[2];
		$course_data = $this->webmob->get_course_data($arr['course']);
		$arr['coursename'] = $course_data[0]->course_name;

		$this->load->view('website/search-listing', $arr);
	}
}
