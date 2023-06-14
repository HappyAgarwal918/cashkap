<?php defined('BASEPATH') or exit('No direct script access allowed');

class Categorycontroller extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
		Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
		Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

		$this->load->helper(array('form', 'url', 'security'));


		$this->load->library(array('form_validation', 'session', 'user_agent'));

		$this->load->model('CategoryModel', 'catmod');

		$this->load->model('CommonModel', 'commod');

		$this->load->database();
	}

	public function category_listing($cat_slug)
	{

		if ($cat_slug == 'universities') {
			$arr['siteTitle'] = 'Best University in Chandigarh | Best University in Punjab | Cashkap';
			$arr['keywords'] = 'Apply Online for Admission, Cashback on University Admission, 10% discount on Admission';
			$arr['description'] = 'Enroll now the most affordable and innovative universities in Punjab, Delhi, Haryana and Chandigarh. Apply Anytime and get discount coupon of 10%.';
		} elseif ($cat_slug == 'colleges') {
			$arr['siteTitle'] = 'Best College in Chandigarh | Best College in Punjab | Cashkap';
			$arr['keywords'] = 'Online Admission In College, Discount on Admission, Colleges in Punjab';
			$arr['description'] = 'By taking advantage of our online admission system you can save time and money. Find online colleges and apply for admission in your area via cashkap and get a 5-10% discount online.';
		}

		$arr['catmdata'] = $this->catmod->getPerCategoryBySlug($cat_slug);

		$cat_id = $arr['catmdata']->assoccat_id;

		$arr['catlistdata'] = $this->catmod->getPerCategoryListing($cat_id);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('state', 'State', 'trim|required', array(
			'state' => 'State required'
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
			$this->load->view('website/category-listing', $arr);
		}
	}

	public function category_sublisting($cat_slug, $subcat_slug)
	{
		$this->session->set_userdata('back_button', current_url());
		$arr['catmdata'] = $this->catmod->getPerCategoryBySlug($cat_slug);

		if ($subcat_slug == 'ielts') {
			$arr['siteTitle'] = "IELTS Coaching Centre in Delhi | IELTS Coaching Centre in Punjab | Cashkap";
			$arr['keywords'] = 'ielts coaching centre in mohali, ielts coaching centre in haryana, ielts coaching centre in chandigarh, ielts coaching centre in patiala, Best ielts coaching institute';
			$arr['meta'] = "For those students who are looking for the best IELTS institute, we have    brought the best IELTS institute so that every student gets a chance to learn better. We provide the admission coupon for discount.";
		} elseif ($subcat_slug == 'banking-ssc') {
			$arr['siteTitle'] = "Best Coaching centre in Chandigarh | Apply online for coaching | Cashkap";
			$arr['keywords'] = 'best coaching institute in chandigarh,Banking Institute in Mohali,Banking Institute in Chandigarh,SSC Coaching institute';
			$arr['meta'] = '"We have presented the efficient Banking/SCC Coaching centre for those students who are looking for the best institute so that every student can study properly. We give a discount entrance coupon."';
		} elseif ($subcat_slug == 'ias-ips-pcs-has-hcs-coaching-institute') {
			$arr['siteTitle'] = "IPS coaching institute in Punjab | IAS Coaching Center Chandigarh | Cashkap";
			$arr['keywords'] = 'ias training centre,  ips coaching institute in Haryana,  hcs coaching institute,  upsc coaching in chandigarh,';
			$arr['meta'] = '"Cashkap provides the finest IAS/IPS/PCS/HAS/HCS Coaching Centre for students who want to study at the best institutes, and looking for a coaching centre. Feel free to contact us We are attempting to locate the top centre and obtain admission through us, after which we will pay cashback to such students."';
		} elseif ($subcat_slug == 'nda-cds-afcat-coaching-institute') {
			$arr['siteTitle'] = "NDA Coaching in Chandigarh | CDS coaching in chandigarh | Cashkap";
			$arr['keywords'] = 'NDA Coaching,CDS coaching,Afcat coaching';
			$arr['meta'] = '"Searching for the top NDA Coaching Institutes in Chandigarh might be a difficult task. Cashkap is your greatest option for finding a Coaching Institute. For those students who will be admitted through us, we additionally provide a coupon.."';
		} elseif ($subcat_slug == 'law-coaching-coaching-institute') {
			$arr['siteTitle'] = "Law Coaching Institute in Chandigarh | LLB in Chandigarh | Cashkap";
			$arr['keywords'] = '';
			$arr['meta'] = '"Enroll now the most affordable and innovative law-coaching institute in Punjab, Delhi, Haryana and Chandigarh. Apply Anytime and get discount coupon of 10%."';
		} elseif ($subcat_slug == 'ugc-net-coaching-institute') {
			$arr['siteTitle'] = "UGC Net Coaching Institute in Chandigarh | Coaching Institute in Chandigarh | Cashkap";
			$arr['keywords'] = '';
			$arr['meta'] = '"Enroll now the most affordable and innovative UGC Net Coaching Institute in Punjab, Delhi, Haryana and Chandigarh. Apply Anytime and get discount coupon of 10%."';
		} elseif ($subcat_slug == 'ca-cpt-coaching-institute') {
			$arr['siteTitle'] = "CA Coaching Institute in Chandigarh | CPT Institute in Chandigarh | Cashkap";
			$arr['keywords'] = '';
			$arr['meta'] = '"Enroll now the most affordable and innovative ca cpt coaching-institute in Punjab, Delhi, Haryana and Chandigarh. Apply Anytime and get discount coupon of 10%."';
		} elseif ($subcat_slug == 'beauty-and-makeup-academy') {
			$arr['siteTitle'] = "Beauty Academy in Punjab | Makeup Academy in Punjab | Cashkap";
			$arr['keywords'] = '';
			$arr['meta'] = '"Enroll now the most affordable and innovative makeup and beauty academy in Punjab, Delhi, Haryana and Chandigarh. Apply Anytime and get discount coupon of 10%."';
		} elseif ($subcat_slug == 'computer-courses') {
			$arr['siteTitle'] = "Online Computer Course in Punjab | Basic Computer in Haryana | Cashkap";
			$arr['keywords'] = '';
			$arr['meta'] = '"Enroll now the most affordable and innovative computer course in Punjab, Delhi, Haryana and Chandigarh. Apply Anytime and get discount coupon of 10%."';
		} elseif ($subcat_slug == 'website-development') {
			$arr['siteTitle'] = "Web Development Institute in Delhi | Digital Marketing Company in Haryana | Cashkap";
			$arr['keywords'] = 'Web Development Company in Mohali, Web Designing in Chandigarh, Digital Marketing,Web Designing';
			$arr['meta'] = '"Apply via cashkap and get Web Development Training with Real work experience. Enhance your skills in JavaScript, MERN, Java, Rest API, Spring Boot and other platforms. Feel free to apply today at cashkap.com"';
		} elseif ($subcat_slug == 'Health-courses') {
			$arr['siteTitle'] = "Medical Health Course Online | Online Nursing College | Cashkap";
			$arr['keywords'] = '';
			$arr['meta'] = '"Enroll now the most affordable and innovative Medical Health Course in Punjab, Delhi, Haryana and Chandigarh. Apply Anytime and get discount coupon of 10%."';
		} elseif ($subcat_slug == 'other') {
			$arr['siteTitle'] = "Others | Cashkap";
			$arr['keywords'] = '';
			$arr['meta'] = '';
		} elseif ($subcat_slug == 'private') {
			$arr['siteTitle'] = "Affordable Private Schools in Punjab | Best Schools in Punjab | Cashkap ";
			$arr['keywords'] = 'Private Schools in Punjab, Schools in Chandigarh, Admission in School';
			$arr['meta'] = 'Enroll now the most affordable and innovative Schools in Punjab, Delhi, Haryana and Chandigarh. Apply Anytime and get discount coupon of 10%.';
		}
		$cat_id = $arr['catmdata']->assoccat_id;

		$arr['subcatmdata'] = $this->catmod->getPerCategoryBySlug($subcat_slug);

		$subcat_id = $arr['subcatmdata']->assoccat_id;

		$arr['catlistdata'] = $this->catmod->getSubCategoryListing($cat_id, $subcat_id);

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('state', 'State', 'trim|required', array(
			'state' => 'State required'
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
			$this->load->view('website/category-sublisting', $arr);
		}
	}


	public function category_listing_detail($cat_slug, $assoc_slug)
	{

		$id = $this->session->userdata('stusesid');

		if (empty($id)) {
			$this->session->set_userdata('return_url', current_url());
			redirect('student/registration');
		} else {

			$arr['siteTitle'] = "Collleges/Universities";

			$arr['catmdata'] = $this->catmod->getPerCategoryBySlug($cat_slug);

			$cat_id = $arr['catmdata']->assoccat_id;


			$arr['assocdata'] = $this->catmod->getPerAssociateBySlug($assoc_slug);

			$assoc_id = $arr['assocdata']->assoc_id;

			$assoc_category = $arr['assocdata']->assoc_category;

			$arr['coursesdata'] = $this->catmod->getPerAssocCourses($assoc_id);

			$this->session->set_userdata('app_associd', $arr['coursesdata'][0]->acourse_associd);
			$arr['gallerydata'] = $this->catmod->getPerAssocGallery($assoc_id);
			$arr['videodata'] = $this->catmod->getPerAssocVideoGallery($assoc_id);


			/**** Get Related List ****/

			$arr['relassocdata'] = $this->catmod->getOtherRelAssoc($assoc_id, $assoc_category);
			// $this->session->unset_userdata('return_url');
			//  echo "<pre>";
			//  print_r($arr);die;

			$this->load->view('website/listing-detailpage', $arr);
		}
	}
}
