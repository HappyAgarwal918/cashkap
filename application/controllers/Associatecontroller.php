<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Associatecontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string', 'cookie'));
		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
                Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
                Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('AssociateModel', 'assocmod');
		$this->load->model('CommonModel', 'commod');
		$this->load->database();
	}
	public function associate_regstep1()
	{
		$arr['siteTitle'] = 'Associate Registration Step - 1';
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assoc_category', 'Category', 'trim|required|xss_clean', array(
			'required' => 'Category field is required'
		));
		$arr['catdata'] = $this->commod->getAllAssocCategory();
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['subreg']);
			$assoc_category = $data['assoc_category'];
			$enc_assoc_category = $this->encryptcode->encrypt($assoc_category, ENC_KEY_PASS);
			redirect("associate/registration-form/$enc_assoc_category");
		} else {
			$this->load->view('website/associate-registration-step1', $arr);
		}
	}
	public function associate_dashboard()
	{
		$arr['siteTitle'] = 'Associate Dashboard';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['stupend'] = $this->assocmod->getAllStudentPend($assocsesid);
		$arr['stuapproved'] = $this->assocmod->getAllStudentApproved($assocsesid);
		// echo "<pre>";
		// print_r($arr['stuapproved']);
		// die;
		$this->load->view('website/associate-dashboard', $arr);
	}
	public function associate_editprofile()
	{
		$arr['siteTitle'] = 'Edit Associate Profile';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assocsesid);
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
			$this->form_validation->set_rules('assoc_lastses_nostudent', 'Student Strength last session', 'trim|required|numeric|xss_clean');

			$this->form_validation->set_rules('assoc_noteacher', 'Total Staff', 'trim|required|numeric|xss_clean');

			$this->form_validation->set_rules('assoc_lastsesresult', 'Last Session Result %', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_lastses_placement', 'Last Session Placement %', 'trim|required|numeric|xss_clean');
		} elseif ($assoc_category == 3) {
			$this->form_validation->set_rules('assoc_subcat', 'Sub Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('assoc_totalarea', 'Total Area', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_boarding_type', 'Boarding School', 'trim|required|xss_clean');
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
		$this->form_validation->set_rules('assoc_address_state', 'State', 'trim|xss_clean');
		$this->form_validation->set_rules('assoc_address_country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_address_pin', 'Pincode', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_contactno', 'Contact Number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_email', 'Email Id', 'trim|required|valid_email|callback_chkassocemail|xss_clean');
		$this->form_validation->set_rules('assoc_contactname', 'Contact Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_designation', 'Designation', 'trim|required|xss_clean');

		$this->form_validation->set_rules('assoc_map_location', 'Location', 'trim|valid_url|xss_clean');
		$this->form_validation->set_rules('assoc_social_facebook', 'Facebook', 'trim|valid_url|xss_clean');
		$this->form_validation->set_rules('assoc_social_instagram', 'Instagram', 'trim|valid_url|xss_clean');
		$this->form_validation->set_rules('assoc_social_twitter', 'Twitter', 'trim|valid_url|xss_clean');
		$this->form_validation->set_rules('assoc_social_website', 'Website', 'trim|valid_url|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$data['assoc_category'] = $assoc_category;
			unset($data['subreg']);


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
			$assocup = $this->assocmod->upAssociateData($data, $assoc_category, $assocsesid);
			if ($assocup) {
				$this->session->set_flashdata('feedback', "Associate profile updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("associate/profile");
			}
		} else {
			$this->load->view('website/associate-edit-profile', $arr);
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
	public function associate_profile()
	{
		$arr['siteTitle'] = 'Associate Profile';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assocsesid);
		$assoc_subcat = $arr['assocdata']->assoc_subcat;
		$arr['subcatrow'] = $this->commod->getPerCategory($assoc_subcat);
		$this->load->view('website/associate-profile', $arr);
	}
	public function associate_courses()
	{
		$arr['siteTitle'] = 'Associate Courses';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['coursedata'] = $this->assocmod->getPerAssocCourses($assocsesid);
		$this->load->view('website/associate-courses', $arr);
	}
	public function photo_gallery()
	{
		$arr['siteTitle'] = 'Photo Gallery';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['coursedata'] = $this->assocmod->getPerAssocCourses($assocsesid);
		$arr['photogaldata'] = $this->assocmod->getPerAssocPhotos($assocsesid);
		$this->load->view('website/associate-photo-gallery', $arr);
	}


	public function edit_photo($assocph_id)
	{
		$arr['siteTitle'] = 'Edit Photo';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['photodata'] = $this->assocmod->getPerAssocPerPhoto($assocsesid, $assocph_id);
		$old_assocph_photo = $arr['photodata']->assocph_photo;
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
				$upphoto = $this->assocmod->upAssocGalleryPhoto($data, $assocsesid, $assocph_id, $photo_final);
				if ($upphoto) {
					if ($old_assocph_photo != "") {
						unlink($old_assocph_photo);
					}
					$this->session->set_flashdata('feedback', "Photo updated successfully.");
					$this->session->set_flashdata('feedbackerr', "alert-success");
					redirect("associate/photo-gallery");
				}
			} else {
				$arr['error1'] = $this->upload->display_errors();
			}
		} else {
			if ($this->form_validation->run() == true) {
				$data = $this->input->post();
				unset($data['submit_gal']);
				$photo_final = $old_assocph_photo;
				$upphoto = $this->assocmod->upAssocGalleryPhoto($data, $assocsesid, $assocph_id, $photo_final);
				if ($upphoto) {
					$this->session->set_flashdata('feedback', "Photo updated successfully.");
					$this->session->set_flashdata('feedbackerr', "alert-success");
					redirect("associate/photo-gallery");
				}
			}
		}
		$this->load->view('website/associate-photo-edit', $arr);
	}
	public function add_photo()
	{
		$arr['siteTitle'] = 'Add Photo';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['coursedata'] = $this->assocmod->getPerAssocCourses($assocsesid);
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
			$insphoto = $this->assocmod->addAssocGalleryPhoto($data, $assocsesid, $photo_final);
			if ($insphoto) {
				/*if($assocph_featured==1){
						$this->assocmod->setOtherNonFeatured($insphoto,$assocsesid);
					}*/
				$this->session->set_flashdata('feedback', "Photo added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("associate/photo-gallery");
			}
		} else {
			$arr['error1'] = $this->upload->display_errors();
			$this->load->view('website/associate-photo-add', $arr);
		}
	}
	public function associate_logout()
	{
		$this->session->unset_userdata('assocsesid');
		$this->session->sess_destroy();
		redirect('associate/login');
	}
	public function associate_forgotpass()
	{
		$arr['siteTitle'] = 'Associate Forgot Password';
		$assocsesid = $this->session->userdata('assocsesid');
		if (!empty($assocsesid)) {
			redirect('associate/dashboard');
		}
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assoc_email', 'Email Id', 'trim|required|valid_email|callback_chkemailforgot|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$email = $data['assoc_email'];
			$emaildata = $this->assocmod->getAssociateByEmail($email);
			$assoc_username = $emaildata->assoc_username;
			$assoc_instconame = $emaildata->assoc_instconame;
			$assoc_email = $emaildata->assoc_email;
			$assoc_id = $emaildata->assoc_id;
			/**** Set New Random Password *****/

			$new_password = random_string('nozero', 8);
			$uppass = $this->assocmod->updateForgotPassword($assoc_id, $new_password);
			if ($uppass) {
				/******** Send Email *****/
				$this->load->library('email');
				$this->email->from('info@cashkap.com', 'Cash Kap');
				$this->email->to($assoc_email);
				$this->email->set_mailtype("html");
				$this->email->subject("Associate Forgot Password");
				$this->email->message("
<p><strong>Cash Kap Associate Password Request</strong>,</p>
<p>We understand you'd like to forgot your password. Following is your login detail:<br/>
<p>Login Id: $assoc_username<br/>
Password: $new_password</p>
<p>After login please change your password using change password tab in your acccount for security reason.</p>
<p>
<strong>Best Regards,</strong><br/>
<span style='color:#000'>Cash Kap</span>
</p>");
				$this->email->send();
				$this->session->set_flashdata('feedback', "Password sent to registered email id succcessfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("associate/login");
			}
		} else {
			$this->load->view('website/associate-forgotpass', $arr);
		}
	}
	public function chkemailforgot($assoc_email)
	{
		if ($assoc_email != "") {
			$emailcount = $this->assocmod->getAssocByEmailCount($assoc_email);
			if ($emailcount == 1) {
				return true;
			} else {
				$this->form_validation->set_message('chkemailforgot', 'Email id does\'t exist');
				return false;
			}
		} else {
			return true;
		}
	}

	public function associate_login()
	{
		$arr['siteTitle'] = 'Associate Login';
		$assocsesid = $this->session->userdata('assocsesid');
		if (!empty($assocsesid)) {
			redirect('associate/dashboard');
		}
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assoc_username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('assoc_password', 'Password', 'required|trim|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$assocdata = $this->assocmod->assocLoginCheck($data);
			// print_r($assocdata);
			// echo $assocdata;
			// die; 
			if ($assocdata) {
				$assoc_id = $assocdata->assoc_id;
				$this->session->unset_userdata('stusesid');
				$this->session->set_userdata('assocsesid', $assoc_id);
				redirect("associate/dashboard");
			} else {
				$this->session->set_flashdata('feedback', "Invalid credentials. Please try again");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect('associate/login');
			}
		} else {
			$this->load->view('website/associate-login', $arr);
		}
	}
	public function associate_regstep2($enc_assoc_category)
	{
		$arr['siteTitle'] = 'Associate Registration Step - 2';
		$assoc_category = $this->encryptcode->decrypt($enc_assoc_category, ENC_KEY_PASS);
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
			$this->form_validation->set_rules('assoc_lastses_nostudent', 'Student Strength last session', 'trim|required|numeric|xss_clean');

			$this->form_validation->set_rules('assoc_noteacher', 'Total Staff', 'trim|required|numeric|xss_clean');

			$this->form_validation->set_rules('assoc_lastsesresult', 'Last Session Result %', 'trim|required|numeric|xss_clean');


			$this->form_validation->set_rules('assoc_lastses_placement', 'Last Session Placement %', 'trim|required|numeric|xss_clean');
		} elseif ($assoc_category == 3) {
			$this->form_validation->set_rules('assoc_subcat', 'Sub Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('assoc_totalarea', 'Total Area', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('assoc_boarding_type', 'Boarding School', 'trim|required|xss_clean');
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
		$this->form_validation->set_rules('assoc_address_state', 'State', 'trim|xss_clean');
		$this->form_validation->set_rules('assoc_address_country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_address_pin', 'Pincode', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_contactno', 'Contact Number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_email', 'Email Id', 'trim|required|valid_email|is_unique[tb_associate.assoc_email]|xss_clean');
		$this->form_validation->set_rules('assoc_contactname', 'Contact Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_designation', 'Designation', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoc_username', 'Username', 'trim|required|min_length[6]|max_length[20]|is_unique[tb_associate.assoc_username]|xss_clean');
		$this->form_validation->set_rules('assoc_password', 'Password', 'trim|required|min_length[6]|max_length[20]|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$data['assoc_category'] = $assoc_category;
			unset($data['subreg']);
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
			$assoc_id = $this->assocmod->insAssociate($data, $assoc_category);
			if ($assoc_id) {
				$assocdata = $this->assocmod->getPerAssociate($assoc_id);
				$assoc_contactname = $assocdata->assoc_contactname;
				$assoc_email = $assocdata->assoc_email;
				$this->load->library('email');
				$this->email->from('info@cashkap.com', 'CASHKAP');
				$this->email->to($assoc_email);
				$this->email->bcc('bidhi.saklani@gmail.com');
				$this->email->set_mailtype("html");
				$this->email->subject("CASHKAP | Account Creation");
				$this->email->message("<p><strong>Congratulations,<br/>YOU HAVE SUCESSFULLY SIGNING UP ON CASHKAP.COM</strong></p>
<p>Hi $assoc_contactname<br/></p><p>WELCOME TO BRAINY TALKS PVT. LTD.<br/>YOU HAVE SUCESSFULLY SIGN UP ON CASHKAP.COM</p><p>Thanks for signing up with Brainy Talks Pvt. Ltd.</p><p>Hope you will have a great experience to working with us. Hope we work together for a long time as an associate partner.</p><p><a href='https://www.cashkap.com/contact-us' target='_blank'>Contact us</a> for further details.<br/>BDE- Priya Yadav</p>");
				$this->email->send();




				$this->session->set_userdata('assocsesid', $assoc_id);
				redirect("associate/dashboard");
			}
		} else {
			$this->load->view('website/associate-registration-step2', $arr);
		}
	}
	public function add_associate_course()
	{
		$arr['siteTitle'] = 'Add Course';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assocsesid);
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
			$insco = $this->assocmod->insAssociateCourse($data, $assocsesid);
			if ($insco) {
				$this->session->set_flashdata('feedback', "Course added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("associate/courses");
			}
		} else {
			$this->load->view('website/associate-course-add', $arr);
		}
	}
	public function associate_about()
	{
		$arr['siteTitle'] = 'Associate About';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assocsesid);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('associate_about', 'About', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addAbout']);
			$insabt = $this->assocmod->upAssociateAbout($data, $assocsesid);
			if ($insabt) {
				$this->session->set_flashdata('feedback', "About text updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("associate/about");
			}
		} else {
			$this->load->view('website/associate-about', $arr);
		}
	}
	public function associate_featuredimg()
	{
		$arr['siteTitle'] = 'Associate Featured Image';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['assocdata'] = $this->assocmod->getPerAssociate($assocsesid);
		$old_pic = $arr['assocdata']->assoc_featuredimg;
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
			$insphoto = $this->assocmod->upAssocFeaturedImg($assocsesid, $photo_final);
			if ($insphoto) {
				if ($old_pic != "") {
					unlink($old_pic);
				}
				$this->session->set_flashdata('feedback', "Photo added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("associate/featured-image");
			}
		} else {
			$arr['error1'] = $this->upload->display_errors();
			$this->load->view('website/associate-featured-image', $arr);
		}
	}
	/**************** Student List ***********/
	public function student_redeemed()
	{
		$arr['siteTitle'] = 'Student - Redeemed';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['studata'] = $this->assocmod->getAllStudentApproved($assocsesid);
		$this->load->view('website/associate-student-redeemed-list', $arr);
	}
	public function student_pending()
	{
		$arr['siteTitle'] = 'Student - Pending';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$arr['studata'] = $this->assocmod->getAllStudentPend($assocsesid);
		$this->load->view('website/associate-student-pending-list', $arr);
	}
	public function view_student($enc_stuco_id)
	{
		$arr['siteTitle'] = 'View Student';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
		$arr['studata'] = $this->assocmod->getPerStudent($stuco_id);
		$this->load->view('website/associate-student-view', $arr);
	}
	public function view_studentredeem($enc_stuco_id)
	{
		$arr['siteTitle'] = 'View Student';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
		$arr['studata'] = $this->assocmod->getPerStudent($stuco_id);
		$this->load->view('website/associate-student-redeem-view', $arr);
	}
	public function redeem_coupon($enc_stuco_id)
	{
		$arr['siteTitle'] = 'Redeem Coupon';
		$assocsesid = $this->session->userdata('assocsesid');
		if (empty($assocsesid)) {
			redirect('associate/login');
		}
		$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
		$arr['studata'] = $this->assocmod->getPerStudent($stuco_id);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('stuco_coupon', 'Coupon Code', 'trim|required|callback_chkcoupon|xss_clean');
		$this->form_validation->set_rules('stuco_redeemamount', 'Amount', 'trim|required|numeric|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['redeem']);
			$upcoupon = $this->assocmod->upRedeemCouponStatus($data, $stuco_id);
			if ($upcoupon) {
				/******** Send Message *****/
				$mobile = $arr['studata']->stuco_mobile;
				$stuco_couponval = $arr['studata']->stuco_couponval;
				$discount = $stuco_couponval . "%";
				$sms_text = "Congratulations, you have successfully got admissions through cash kap. You scan and send your fees slip through your login account on cash kap and get $discount cashback on your fees. BRAINY";
				$sms_text_final = urlencode($sms_text);
				$url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $mobile . "&message=$sms_text_final&format=json";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				$response = curl_exec($ch);
				curl_close($ch);
				redirect('associate/student-redeemed/manage');
			}
		} else {
			$this->load->view('website/associate-redeem-coupon', $arr);
		}
	}
	public function chkcoupon($stuco_coupon)
	{
		$enc_stuco_id = $this->input->post('stuco_id');
		if ($enc_stuco_id != "" && $stuco_coupon != "") {
			$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
			$studata = $this->assocmod->getPerStudent($stuco_id);
			$coupon = $studata->stuco_coupon;
			if ($stuco_coupon == $coupon) {
				return true;
			} else {
				$this->form_validation->set_message('chkcoupon', 'Invalid Coupon Code');
				return false;
			}
		} else {
			return true;
		}
	}
}
