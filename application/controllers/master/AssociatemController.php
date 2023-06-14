<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AssociatemController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string'));
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('master/AssociatemModel', 'assocmod');
		$this->load->database();
	}
	public function manage_associate_pend()
	{
		$arr['siteTitle'] = 'Manage Associates';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getAllAssociatePend();
		$this->load->view("master/master-associate-manage-pending", $arr);
	}
	public function manage_associate()
	{
		$arr['siteTitle'] = 'Manage Associates';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getAllAssociate();
		$this->load->view("master/master-associate-manage", $arr);
	}
	public function remove_associate($assoc_id)
	{
		$arr['siteTitle'] = 'Remove Associate';
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$assoc_featuredimg = $arr['assocdata']->assoc_featuredimg;
		$assoc_status = $arr['assocdata']->assoc_status;
		$galdata = $this->assocmod->getPerAssocPhotos($assoc_id);
		if ($assoc_featuredimg != "") {
			unlink($assoc_featuredimg);
		}
		/****** Delete Gallery Pic ***/
		foreach ($galdata as $galrow) {
			$assocph_photo = $galrow->assocph_photo;
			$assocph_id = $galrow->assocph_id;
			$this->assocmod->delAssocPerPhoto($assocph_id);
			if ($assocph_photo != "") {
				unlink($assocph_photo);
			}
		}
		/**** Delete Courses *************/
		$this->assocmod->delAssocCourses($assoc_id);
		$assocdel = $this->assocmod->delPerAssoc($assoc_id);
		if ($assocdel) {
			if ($assoc_status == 0) {
				$this->session->set_flashdata('feedback', "Associate deleted successfully");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/manage-pending");
			} elseif ($assoc_status == 1) {
				$this->session->set_flashdata('feedback', "Associate deleted successfully");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/manage");
			}
		}
	}
	public function view_associate($assoc_id)
	{
		$arr['siteTitle'] = 'View Associate';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$assoc_subcat = $arr['assocdata']->assoc_subcat;
		$arr['subcatrow'] = $this->commod->getPerCategory($assoc_subcat);
		$this->load->view('master/master-associate-view', $arr);
	}
	public function associate_changeapstatus($assoc_id)
	{
		$arr['siteTitle'] = 'Change Associate Approval Status';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assoc_slug', 'Slug', 'trim|required|alpha_dash|callback_chkassocslug|xss_clean');
		$this->form_validation->set_rules('assoc_status', 'Status', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_discount', 'Discount', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('assoc_featured', 'Featured Status', 'trim|required|numeric|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['assocbtn']);
			if ($this->assocmod->upAssocApStatus($data, $assoc_id)) {
				$this->session->set_flashdata('feedback', "Associate approval status updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/view/$assoc_id");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/associate/view/$assoc_id");
			}
		} else {
			$this->load->view('master/master-associate-change-status', $arr);
		}
	}
	public function chkassocslug($assoc_slug)
	{
		$old_assoc_slug = $this->input->post('old_assoc_slug');
		if ($old_assoc_slug != $assoc_slug) {
			$count_slug = $this->assocmod->chkAssocSlug($assoc_slug);
			if ($count_slug == 0) {
				return true;
			} else {
				$this->form_validation->set_message('chkassocslug', 'Slug already exist.');
				return false;
			}
		} else {
			return true;
		}
	}
	/********** Student Enrolled *******/
	public function student_enrolled($assoc_id)
	{
		$arr['siteTitle'] = 'Student Enrolled';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$arr['studata'] = $this->assocmod->getPerAssocStudents($assoc_id);
		$this->load->view('master/master-associate-student-manage', $arr);
	}
	/********** Manage and Add Courses **********/
	public function manage_courses($assoc_id)
	{
		$arr['siteTitle'] = 'Manage Associate Courses';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$arr['coursedata'] = $this->assocmod->getPerAssocCourses($assoc_id);
		$this->load->view('master/master-associate-course-manage', $arr);
	}
	public function photo_gallery($assoc_id)
	{
		$arr['siteTitle'] = 'Manage Photo Gallery';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$arr['photogaldata'] = $this->assocmod->getPerAssocPhotoGallery($assoc_id);
		$this->load->view('master/master-associate-photogallery-manage', $arr);
	}



	public function add_course($assoc_id)
	{
		$arr['siteTitle'] = 'Add Course';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$arr['cocatdata'] = $this->commod->getAllCourseCategory();
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('acourse_courseid', 'Course', 'trim|required|xss_clean');
		$this->form_validation->set_rules('acourse_duration', 'Duration', 'trim|required|xss_clean');
		$this->form_validation->set_rules('acourse_totalseats', 'Total Seats', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('acourse_coursefee', 'Course Fee', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('acourse_coursefee', 'Course Fee', 'trim|required|xss_clean');
		$this->form_validation->set_rules('acourse_lastdate', 'Last Date', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addCourse']);
			$acourse_lastdate = $data['acourse_lastdate'];
			if ($acourse_lastdate != "") {
				$data['acourse_lastdate'] = date('Y-m-d', strtotime($acourse_lastdate));
			} else {
				$data['acourse_lastdate'] = NULL;
			}
			$insco = $this->assocmod->insAssociateCourse($data, $assoc_id);
			if ($insco) {
				$this->session->set_flashdata('feedback', "Course added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/manage-courses/$assoc_id");
			}
		} else {
			$this->load->view('master/master-associate-course-add', $arr);
		}
	}
	public function edit_course($assoc_id, $acourse_id)
	{
		$arr['siteTitle'] = 'Edit Course Detail';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['cocatdata'] = $this->commod->getAllCourseCategory();
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$arr['coursemdata'] = $this->assocmod->getAssocPerCourse($acourse_id);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('acourse_duration', 'Duration', 'trim|required|xss_clean');
		$this->form_validation->set_rules('acourse_totalseats', 'Total Seats', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('acourse_coursefee', 'Course Fee', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('acourse_coursefee', 'Course Fee', 'trim|required|xss_clean');
		$this->form_validation->set_rules('acourse_lastdate', 'Last Date', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addCourse']);
			$acourse_lastdate = $data['acourse_lastdate'];
			if ($acourse_lastdate != "") {
				$data['acourse_lastdate'] = date('Y-m-d', strtotime($acourse_lastdate));
			} else {
				$data['acourse_lastdate'] = NULL;
			}
			$insco = $this->assocmod->upAssociateCourse($data, $acourse_id);
			if ($insco) {
				$this->session->set_flashdata('feedback', "Course updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/manage-courses/$assoc_id");
			}
		} else {
			$this->load->view('master/master-associate-course-edit', $arr);
		}
	}
	public function del_course($assoc_id, $acourse_id)
	{
		$arr['siteTitle'] = 'Delete Course';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$delcourse = $this->assocmod->delAssocPerCourse($assoc_id, $acourse_id);
		if ($delcourse) {
			$this->session->set_flashdata('feedback', "Course removed successfully.");
			$this->session->set_flashdata('feedbackerr', "alert-success");
			redirect("master/associate/manage-courses/$assoc_id");
		}
	}
	public function edit_associate($assoc_id)
	{
		$arr['siteTitle'] = 'Edit Associate';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$assoc_category = $arr['assocdata']->assoc_category;
		$arr['assoc_category'] = $assoc_category;
		$arr['catdata'] = $this->commod->getAllAssocCategory();
		$arr['statedata'] = $this->commod->getAllState();
		$arr['subcatdata'] = $this->commod->getAllSubcat($assoc_category);
		$arr['maincatdata'] = $this->commod->getPerCategory($assoc_category);
		$arr['facilitydata'] = $this->commod->getAllFacility();
		$arr['countrydata'] = $this->commod->getAllCountry();
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assoc_instconame', 'Instittue/College/School Name', 'trim|required|xss_clean');
		if ($assoc_category == 1 || $assoc_category == 2) {
			$this->form_validation->set_rules('assoc_totalarea', 'Total Area', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_consarea', 'Construction Area', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_affibody', 'Affiliated To', 'trim|required|xss_clean');
			$this->form_validation->set_rules('assoc_edurank', 'Rank', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_noteacher_graduate', 'Teaching Staff (Graduate)', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_noteacher_masters', 'Teaching Staff (Masters)', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_noteacher_phd', 'Teaching Staff (PhD)', 'trim|required|numeric|xss_clean');


			$this->form_validation->set_rules('assoc_noteacher', 'Total Staff', 'trim|required|numeric|xss_clean');

			$this->form_validation->set_rules('assoc_lastsesresult', 'Last Session Result %', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_lastses_nostudent', 'Student Strength last session', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_lastses_placement', 'Last Session Placement %', 'trim|required|numeric|xss_clean');
		} elseif ($assoc_category == 3) {
			$this->form_validation->set_rules('assoc_subcat', 'Sub Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('assoc_totalarea', 'Total Area', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_consarea', 'Construction Area', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_noteacher', 'Total Teaching Staff', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_affibody', 'Affiliated Body', 'trim|required|xss_clean');
			$this->form_validation->set_rules('assoc_edurank', 'Education Rank', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_lastsesresult', 'Last Session Result', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_lastsesnostudent', 'Last Session Topper Students', 'trim|required|numeric|xss_clean');
		} elseif ($assoc_category == 4) {
			$this->form_validation->set_rules('assoc_subcat', 'Sub Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('assoc_consarea', 'Construction Area', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_noteacher', 'No. Teacher', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_classmode', 'Class Mode', 'trim|required|xss_clean');
			$this->form_validation->set_rules('assoc_stustrength', 'Student Strength', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_lastsesresult', 'Average Result', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_googlerate', 'Google Rating', 'trim|required|numeric|xss_clean');
			if ($this->input->post('assoc_subcat') == 8) {
				$this->form_validation->set_rules('assoc_bestscorelastses', 'Best score last session', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('assoc_staffscore56', 'Staff Score 5-6 ', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('assoc_staffscore67', 'Staff Score 6-7', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('assoc_staffscore78', 'Staff Score 7-8', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('assoc_staffquali_twe', 'Staff Qualification 12th', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('assoc_staffquali_diploma', 'Staff Qualification Diploma', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('assoc_staffquali_graduation', 'Staff Qualification Graduation', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('assoc_staffquali_masters', 'Staff Qualification Masters', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('assoc_staffquali_phd', 'Staff Qualification PhD', 'trim|required|numeric|xss_clean');
			}
		} elseif ($assoc_category == 5) {
			$this->form_validation->set_rules('assoc_noteacher', 'Total Staff', 'trim|required|numeric|xss_clean');
		}
		$this->form_validation->set_rules('assoc_address_line1', 'Address Line 1', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_address_city', 'City', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_address_state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_address_country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_address_pin', 'Pincode', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_contactno', 'Contact Number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_email', 'Email Id', 'trim|required|valid_email|callback_chkassocemail|xss_clean');
		$this->form_validation->set_rules('assoc_contactname', 'Contact Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_designation', 'Designation', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_username', 'Username', 'trim|required|min_length[6]|max_length[20]|callback_chkusername|xss_clean');
		$this->form_validation->set_rules('assoc_password', 'Password', 'trim|min_length[6]|max_length[20]|xss_clean');

		$this->form_validation->set_rules('assoc_social_facebook', 'Facebook', 'trim|valid_url|xss_clean');
		$this->form_validation->set_rules('assoc_social_instagram', 'Instagram', 'trim|valid_url|xss_clean');
		$this->form_validation->set_rules('assoc_social_twitter', 'Twitter', 'trim|valid_url|xss_clean');
		$this->form_validation->set_rules('assoc_social_website', 'Website', 'trim|valid_url|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$data['assoc_category'] = $assoc_category;
			unset($data['subreg']);
			$assoc_password = $data['assoc_password'];
			if ($assoc_password != "") {
				$assoc_password = md5($assoc_password);
			} else {
				$assoc_password = $arr['assocdata']->assoc_password;
			}

			if ($assoc_category == 3 || $assoc_category == 4) {
				$data['assoc_subcat'] = $data['assoc_subcat'];
			} else {
				$data['assoc_subcat'] = NULL;
			}


			$assoc_facility = $this->input->post('assoc_facility');
			$facility_final = "";
			if ($assoc_facility != "") {
				$count_facility = count($assoc_facility);
				if ($count_facility > 0) {
					$sr = 1;
					foreach ($assoc_facility as $facility_name) {
						if ($sr != $count_facility) {
							$facility_final .= $facility_name . ", ";
						} else {
							$facility_final .= $facility_name;
						}
						$sr++;
					}
				}
			}
			$data['assoc_facility'] = $facility_final;
			$assocup = $this->assocmod->upAssociateData($data, $assoc_category, $assoc_id);
			if ($assocup) {
				$this->session->set_flashdata('feedback', "Associate profile updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/view/$assoc_id");
			}
		} else {
			$this->load->view('master/master-associate-edit', $arr);
		}
	}
	public function chkusername($assoc_username)
	{
		$old_assoc_username = $this->input->post('old_assoc_username');
		if ($old_assoc_username != $assoc_username) {
			$count_username = $this->assocmod->getCountAssocusername($assoc_username);
			if ($count_username == 0) {
				return true;
			} else {
				$this->form_validation->set_message('chkusername', 'Username already exist');
				return false;
			}
		} else {
			return true;
		}
	}


	public function chkassocemail($assoc_email)
	{
		$old_assoc_email = $this->input->post('old_assoc_email');
		if ($old_assoc_email != $assoc_email) {
			$email_count = $this->assocmod->getCountAssocEmail($assoc_email);
			if ($email_count == 0) {
				return true;
			} else {
				$this->form_validation->set_message('chkassocemail', 'Email Id already exist');
				return false;
			}
		} else {
			return true;
		}
	}
	/******* Associate Photo Gallery *******/
	public function add_photogallery($assoc_id)
	{
		$arr['siteTitle'] = 'Add Photo';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assocph_title', 'Title', 'trim|required|xss_clean');
		$assocph_photo = "";
		if (isset($_FILES['assocph_photo']['name'])) {
			$assocph_photo = $_FILES['assocph_photo']['name'];
		}
		$config = array(
			'upload_path' => 'media/photo_gallery/',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => 2048,
			'overwrite' => TRUE,
			'file_name' => time() . '_' . $assocph_photo,
			'detect_mime' => true
		);
		$this->load->library('upload', $config);
		if ($this->form_validation->run() == true &&  $this->upload->do_upload('assocph_photo')) {
			$data = $this->input->post();
			unset($data['submit_gal']);
			$uploadedImage = $this->upload->data();
			$photo_final = "media/photo_gallery/" . $uploadedImage['raw_name'] . $uploadedImage['file_ext'];
			$insphoto = $this->assocmod->addPerAssocPhotoGallery($data, $assoc_id, $photo_final);
			if ($insphoto) {
				$this->session->set_flashdata('feedback', "Photo added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/photo-gallery/$assoc_id");
			}
		} else {
			$arr['error1'] = $this->upload->display_errors();
			$this->load->view('master/master-associate-photogallery-add', $arr);
		}
	}
	public function remove_photogallery($assoc_id, $assocph_id)
	{
		$arr['siteTitle'] = 'Delete Course';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$phgaldata = $this->assocmod->getAssocPerPhotoGallery($assoc_id, $assocph_id);
		$assocph_photo = $phgaldata->assocph_photo;
		$delgal = $this->assocmod->delAssocPerPhotoGallery($assoc_id, $assocph_id);
		if ($delgal) {
			if ($assocph_photo != "") {
				unlink($assocph_photo);
			}
			$this->session->set_flashdata('feedback', "Photo removed successfully.");
			$this->session->set_flashdata('feedbackerr', "alert-success");
			redirect("master/associate/photo-gallery/$assoc_id");
		}
	}
	public function edit_photogallery($assoc_id, $assocph_id)
	{
		$arr['siteTitle'] = 'Edit Photo';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$arr['phgaldata'] = $this->assocmod->getAssocPerPhotoGallery($assoc_id, $assocph_id);
		$old_assocph_photo = $arr['phgaldata']->assocph_photo;

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assocph_title', 'Title', 'trim|required|xss_clean');
		$assocph_photo = "";
		if (isset($_FILES['assocph_photo']['name'])) {
			$assocph_photo = $_FILES['assocph_photo']['name'];
		}
		if ($assocph_photo != "") {
			$config = array(
				'upload_path' => 'media/photo_gallery/',
				'allowed_types' => 'jpeg|jpg|png',
				'max_size' => 2048,
				'overwrite' => TRUE,
				'file_name' => time() . '_' . $assocph_photo,
				'detect_mime' => true
			);
			$this->load->library('upload', $config);
			if ($this->form_validation->run() == true &&  $this->upload->do_upload('assocph_photo')) {
				$data = $this->input->post();
				unset($data['submit_gal']);
				$uploadedImage = $this->upload->data();
				$photo_final = "media/photo_gallery/" . $uploadedImage['raw_name'] . $uploadedImage['file_ext'];
				$upphoto = $this->assocmod->upPerAssocPhotoGallery($data, $assocph_id, $photo_final);
				if ($upphoto) {
					if ($old_assocph_photo != "") {
						unlink($old_assocph_photo);
					}
					$this->session->set_flashdata('feedback', "Photo updated successfully.");
					$this->session->set_flashdata('feedbackerr', "alert-success");
					redirect("master/associate/photo-gallery/$assoc_id");
				}
			} else {
				$arr['error1'] = $this->upload->display_errors();
			}
		} else {
			if ($this->form_validation->run() == true) {
				$data = $this->input->post();
				unset($data['submit_gal']);
				$photo_final = $old_assocph_photo;
				$upphoto = $this->assocmod->upPerAssocPhotoGallery($data, $assocph_id, $photo_final);
				if ($upphoto) {
					$this->session->set_flashdata('feedback', "Photo updated successfully.");
					$this->session->set_flashdata('feedbackerr', "alert-success");
					redirect("master/associate/photo-gallery/$assoc_id");
				}
			}
		}

		$this->load->view('master/master-associate-photogallery-edit', $arr);
	}
	public function edit_featuredimg($assoc_id)
	{
		$arr['siteTitle'] = 'Edit Photo';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$old_assoc_featuredimg = $arr['assocdata']->assoc_featuredimg;

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assoc_id', 'Associate', 'trim|required|xss_clean');
		$assoc_featuredimg = "";
		if (isset($_FILES['assoc_featuredimg']['name'])) {
			$assoc_featuredimg = $_FILES['assoc_featuredimg']['name'];
		}
		$config = array(
			'upload_path' => 'media/photo_gallery/',
			'allowed_types' => 'jpeg|jpg|png',
			'max_size' => 2048,
			'overwrite' => TRUE,
			'file_name' => time() . '_' . $assoc_featuredimg,
			'detect_mime' => true
		);
		$this->load->library('upload', $config);
		if ($this->form_validation->run() == true &&  $this->upload->do_upload('assoc_featuredimg')) {
			$data = $this->input->post();
			unset($data['submit_gal']);
			$uploadedImage = $this->upload->data();
			$photo_final = "media/photo_gallery/" . $uploadedImage['raw_name'] . $uploadedImage['file_ext'];
			$upphoto = $this->assocmod->upPerAssocFeaturedImg($data, $assoc_id, $photo_final);
			if ($upphoto) {
				if ($old_assoc_featuredimg != "") {
					unlink($old_assoc_featuredimg);
				}
				$this->session->set_flashdata('feedback', "Featured image updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/featured-image/$assoc_id");
			}
		} else {
			$arr['error1'] = $this->upload->display_errors();
			$this->load->view('master/master-associate-featuredimg-edit', $arr);
		}
	}
	public function video_gallery($assoc_id)
	{
		$arr['siteTitle'] = 'Manage Video Gallery';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$arr['videogaldata'] = $this->assocmod->getPerAssocVideoGallery($assoc_id);
		$this->load->view('master/master-associate-videogallery-manage', $arr);
	}
	public function add_video($assoc_id)
	{
		$arr['siteTitle'] = 'Add Video';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assocvg_title', 'Video Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assocvg_videolink', 'Video Link', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['submit_video']);
			$insphoto = $this->assocmod->addPerAssocVideoGallery($data, $assoc_id);
			if ($insphoto) {
				$this->session->set_flashdata('feedback', "Video added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/video-gallery/$assoc_id");
			}
		} else {
			$this->load->view('master/master-associate-videogallery-add', $arr);
		}
	}
	public function remove_video($assocvg_associd, $assocvg_id)
	{
		$arr['siteTitle'] = 'Delete Video';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$delv = $this->assocmod->delAssocPerVideoGallery($assocvg_associd, $assocvg_id);
		if ($delv) {

			$this->session->set_flashdata('feedback', "Video removed successfully.");
			$this->session->set_flashdata('feedbackerr', "alert-success");
			redirect("master/associate/video-gallery/$assocvg_associd");
		}
	}
	public function edit_video($assocvg_associd, $assocvg_id)
	{
		$arr['siteTitle'] = 'Edit Video';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assocvg_associd);
		$arr['videodata'] = $this->assocmod->getPerAssocPerVideo($assocvg_associd, $assocvg_id);

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assocvg_title', 'Video Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assocvg_videolink', 'Video Link', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['submit_video']);
			$upvideo = $this->assocmod->upPerAssocVideoGallery($data, $assocvg_associd, $assocvg_id);
			if ($upvideo) {
				$this->session->set_flashdata('feedback', "Video updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/associate/video-gallery/$assocvg_associd");
			}
		} else {
			$this->load->view('master/master-associate-videogallery-edit', $arr);
		}
	}
}
