<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Studentcontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string', 'cookie'));
		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
                Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
                Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('StudentModel', 'stumod');
		$this->load->model('CommonModel', 'commod');
		$this->load->database();
	}




	public function get_discount($enc_assoc_id, $acourse_id, $courseName) /* Work on click of apply button */
	{
		$arr['siteTitle'] = 'Student Apply For Discount Code';
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$data = $this->input->post();
		$assoc_id = $this->encryptcode->decrypt($enc_assoc_id, ENC_KEY_PASS);
		$app_associd = $assoc_id;
		$course = $acourse_id;
		$course_name = $this->encryptcode->decrypt($courseName, ENC_KEY_PASS);


		$params = $app_associd . "|" . $course;
		$this->session->set_userdata('associd', $app_associd); //id store
		$this->session->set_userdata('course', $course);
		$this->session->set_userdata('courseName', $course_name);


		$stusesid = $this->session->userdata('stusesid');

		if (empty($stusesid)) {
			$this->session->set_userdata('app_associd', $app_associd);
			$this->session->set_userdata('app_course', $course);
			$this->session->set_flashdata('feedback', "Please register/login to your account to continue");
			$this->session->set_flashdata('feedbackerr', "alert-danger");
			redirect('student/registration');
		}
		$enc_params = $this->encryptcode->encrypt($params, ENC_KEY_PASS);
		redirect("apply/now");
	}



	public function chkdisotp($stuco_otp)
	{
		$enc_stuco_id = $this->input->post('enc_stuco_id');
		$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
		if ($stuco_id != "") {
			$oldPassword = $this->input->post('oldPassword');
			$studisdata = $this->stumod->getPerDisCode($stuco_id);
			$otp = $studisdata->stuco_otp;
			if ($stuco_otp == $otp) {
				return true;
			} else {
				$this->form_validation->set_message('chkdisotp', 'Invalid OTP');
				return false;
			}
		} else {
			return true;
		}
	}




	public function get_discountstatus($enc_stuco_id)
	{
		$arr['siteTitle'] = 'Discount Registration Form';
		$stusesid = $this->session->userdata('stusesid');
		if (empty($stusesid)) {
			redirect('student/login');
		}
		$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
		$arr['studisdata'] = $this->stumod->getPerDisCode($stuco_id);
		$this->load->view('website/student-discountreg-status', $arr);
	}



	public function student_login()
	{
		$arr['siteTitle'] = 'Student Login';
		$stusesid = $this->session->userdata('stusesid');
		if (!empty($stusesid)) {
			redirect('student/login');
		}
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('stureg_username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('stureg_password', 'Password', 'required|trim|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$studata = $this->stumod->stuLoginCheck($data); /* studata consist data of login user */
			$arr['studata'] = $this->stumod->getPerStudent($studata->stureg_id);
			
			if ($studata) {
				$stureg_id = $studata->stureg_id;
				$this->session->set_userdata('stusesid', $stureg_id);
				$redirect_url =$this->session->userdata('return_url');
				if($redirect_url){
				redirect ($redirect_url);

				}
				// $id = $this->session->userdata('stusesid');
				// echo $redirect_url;
				// die;
				redirect("Webpagecontroller/home");
			} else {
				$this->session->set_flashdata('feedback', "Invalid credentials. Please try again");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect('student/login');
			}
		} else {
			$this->load->view('website/student-login', $arr);
		}
	}




	public function student_dashboard()
	{
		$arr['siteTitle'] = 'Student Dashboard';
		$stusesid = $this->session->userdata('stusesid');
		if (empty($stusesid)) {
			redirect('student/login');
		}
		$arr['studata'] = $this->stumod->getPerStudent($stusesid);
		$this->load->view('website/student-dashboard', $arr);
	}




	public function student_logout()
	{
		$arr['siteTitle'] = 'Student Logout';
		$this->session->unset_userdata('stusesid');
		$this->session->unset_userdata('return_url');
		$this->session->sess_destroy();
		redirect('student/login');
	}




	public function student_profile()
	{
		$arr['siteTitle'] = 'Student Profile';
		$stusesid = $this->session->userdata('stusesid');
		if (empty($stusesid)) {
			redirect('student/login');
		}
		$arr['studata'] = $this->stumod->getPerStudent($stusesid);
		$this->load->view('website/student-dashboard', $arr);
	}


	public function student_discountform() /* Discount coupon page on student profile */
	{
		$arr['siteTitle'] = 'Student Discount Form';
		$stusesid = $this->session->userdata('stusesid');
		if (empty($stusesid)) {
			redirect('student/login');
		}
		$arr['studata'] = $this->stumod->getPerStudent($stusesid);
		$arr['discountdata'] = $this->stumod->getPerStudentDiscountData($stusesid);
		// echo "<pre>";print_r($arr);die;
		// if($arr['discountdata'][0]->stuco_otpverstatus == 1){

		$this->load->view('website/student-discountform-manage', $arr);

		// }else{
		// 	$arr['studisdata'] = $arr['discountdata'][0];
		// 	$stuco_id = $arr['studisdata']->stuco_id;
		// 	$arr['enc_stuco_id'] = $this->encryptcode->encrypt($stuco_id, ENC_KEY_PASS);
		// 	$this->session->set_flashdata('feedback', "OTP sent successfully");
		// 	$this->session->set_flashdata('feedbackerr', "alert-success");
		// 	$this->load->view('website/student-discountreg-verification', $arr);
		// 	// redirect("student/get-discount/verify-mobile/$enc_stuco_id");
		// }
	}





	public function view_discountform($enc_stuco_id)
	{
		$arr['siteTitle'] = 'View Discount Form';
		$stusesid = $this->session->userdata('stusesid');
		if (empty($stusesid)) {
			redirect('student/login');
		}

		$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
		$arr['studata'] = $this->stumod->getPerDiscountData($stuco_id);
		$stuco_id = $arr['studata']->stuco_id;
		$stuco_mobile = $arr['studata']->stuco_mobile;
		$statusCode = $arr['studata']->stuco_otpverstatus;
		$this->session->set_userdata('cruntuserid', $stuco_id);
		// echo "<pre>";
		// print_r($arr);die;
		if ($statusCode == 0) {
			$mobile = $stuco_mobile;
			$otp = random_string('nozero', 6);

			$sms_text = "$otp is your verification code. BRAINY";
			$sms_text_final = urlencode($sms_text);
			$url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $mobile . "&message=$sms_text_final&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$response = curl_exec($ch);
			curl_close($ch);
			$enc_stuco_id = $this->encryptcode->encrypt($stuco_id, ENC_KEY_PASS);
			$this->session->set_flashdata('feedback', "OTP sent successfully");
			$this->session->set_flashdata('feedbackerr', "alert-success");
			// update otp hear----------
			$this->stumod->updateOtp($otp, $stuco_id);
			redirect("student/get-discount/verify-mobile/$enc_stuco_id");
		} else {
			$this->load->view('website/student-discountform-view', $arr);
		}
	}

	// RESEND OTP--------------------
	public function resendOTP()
	{
		$cruntuserid = $this->session->userdata('cruntuserid');
		$arr['studata'] = $this->stumod->getPerDiscountData($cruntuserid);
		$stuco_mobile = $arr['studata']->stuco_mobile;
		$mobile = $stuco_mobile;
		$otp = $arr['studata']->stuco_otp;
		$sms_text = "$otp is your verification code. BRAINY";
		$sms_text_final = urlencode($sms_text);
		$url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $mobile . "&message=$sms_text_final&format=json";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($ch);
		curl_close($ch);
		// $enc_stuco_id = $this->encryptcode->encrypt($stuco_id, ENC_KEY_PASS);
		$this->session->set_flashdata('feedback', " resent OTP successfully");
		$this->session->set_flashdata('feedbackerr', "alert-success");
	}


	public function upload_slip($enc_stuco_id)
	{
		$arr['siteTitle'] = 'Upload Slip';
		$stusesid = $this->session->userdata('stusesid');
		if (empty($stusesid)) {
			redirect('student/login');
		}
		$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
		$arr['studata'] = $this->stumod->getPerDiscountData($stuco_id);
		$stuco_redeemstatus = $arr['studata']->stuco_redeemstatus;
		$stuco_cashbackpaid = $arr['studata']->stuco_cashbackpaid;

		if ($stuco_redeemstatus == 1) {
			if ($stuco_cashbackpaid == 0) {
				$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
				$this->form_validation->set_rules('enc_stuco_id', 'Slip', 'trim|required|xss_clean');

				$stuco_redeemslip = "";
				if (isset($_FILES['stuco_redeemslip']['name'])) {
					$stuco_redeemslip = $_FILES['stuco_redeemslip']['name'];
				}
				$config = array(
					'upload_path' => './media/slip/',
					'allowed_types' => 'jpg|jpeg|png|pdf',
					'max_size' => 2048,
					'overwrite' => TRUE,
					'file_name' => time() . '_' . $stuco_redeemslip
				);
				$this->load->library('upload', $config);
				if ($this->form_validation->run() == true  && $this->upload->do_upload('stuco_redeemslip')) {
					$data = $this->input->post();
					unset($data['submit']);
					$slip_ar = $this->upload->data();
					$slip_final = "media/slip/" . $slip_ar['raw_name'] . $slip_ar['file_ext'];
					$uplslip = $this->stumod->upDiscountFormSlip($stuco_id, $slip_final);
					if ($uplslip) {
						/******* Send Message ******/
						$mobile = $arr['studata']->stuco_mobile;
						$sms_text = "Thank you for updating your account details on cash kap. Kindly wait for 24 hours to get your cash back. More updates https://bit.ly/3ENyUF6 BRAINY";
						$sms_text_final = urlencode($sms_text);
						$url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $mobile . "&message=$sms_text_final&format=json";
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
						$response = curl_exec($ch);
						curl_close($ch);

						$this->session->set_flashdata('feedback', "Thank you for updating your account details on cash kap. Kindly wait for 24 hours to get your cash back.");
						$this->session->set_flashdata('feedbackerr', "alert-success");
						redirect("student/discount-coupon/view/$enc_stuco_id");
					} else {
						$this->session->set_flashdata('feedback', "Something wrong please try again.");
						$this->session->set_flashdata('feedbackerr', "alert-danger");
						redirect("student/discount-coupon/upload-slip/$enc_stuco_id");
					}
				} else {
					$arr['error1'] = $this->upload->display_errors();
					$this->load->view('website/student-discountform-upload-slip', $arr);
				}
			} else {
				$this->session->set_flashdata('feedback', "Your Cashback paid now. You cannot upload slip after the cashback");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("student/discount-coupon/view/$enc_stuco_id");
			}
		} else {
			$this->session->set_flashdata('feedback', "Coupon not redeemed yet. Please show the coupon at college/institute/school at time of admission");
			$this->session->set_flashdata('feedbackerr', "alert-danger");
			redirect("student/discount-coupon/view/$enc_stuco_id");
		}
	}




	public function student_forgotpass()
	{
		$arr['siteTitle'] = 'Student Forgot Password';
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('stureg_email', 'Email Id', 'trim|required|valid_email|callback_chkemailforgot|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$email = $data['stureg_email'];
			$emaildata = $this->stumod->getUserByEmail($email);
			$username = $emaildata->stureg_username;
			$stureg_name = $emaildata->stureg_name;
			$stureg_email = $emaildata->stureg_email;
			$stureg_id = $emaildata->stureg_id;
			/**** Set New Random Password *****/

			$new_password = random_string('nozero', 8);
			$uppass = $this->stumod->updateForgotPassword($stureg_id, $new_password);
			if ($uppass) {
				/******** Send Email *****/
				$this->load->library('email');
				$this->email->from('info@cashkap.com', 'Cash Kap');
				$this->email->to($stureg_email);
				$this->email->set_mailtype("html");
				$this->email->subject("Forgot Password");
				$this->email->message("
					<p><strong>Cash Kap Forgot Password Request</strong>,</p>
					<p>We understand you'd like to forgot your password. Following is your login detail:<br/>
					<p>Login Id: $username<br/>
					Password: $new_password</p>
					<p>After login please change your password using change password tab in your acccount for security reason.</p>
					<p>
					<strong>Best Regards,</strong><br/>
					<span style='color:#000'>Cash Kap</span>
					</p>");
				$this->email->send();
				$this->session->set_flashdata('feedback', "Password sent to registered email id succcessfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("student/login");
			}
		} else {
			$this->load->view('website/student-forgotpass', $arr);
		}
	}




	public function chkemailforgot($stureg_email)
	{
		if ($stureg_email != "") {
			$emailcount = $this->stumod->getUserByEmailCount($stureg_email);
			if ($emailcount == 1) {
				return true;
			} else {
				$this->form_validation->set_message('chkdisotp', 'Email id does\'t exist');
				return false;
			}
		} else {
			return true;
		}
	}

	public function student_registration()
	{
		$arr['siteTitle'] = 'Student Registration';
		$arr['statedata'] = $this->commod->getAllState();
		// $arr['studata'] = $this->stumod->getPerStudent($stusesid);
		$arr['dates'] =  $this->stumod->date(); 
		$arr['months'] =  $this->stumod->Month(); 
		$arr['years'] =  $this->stumod->year();
		// echo "<pre>";print_r($arr['years'][0]->id);die;
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('stureg_name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stureg_mobileno', 'Name', 'trim|required|numeric|min_length[10]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('stureg_email', 'Email Id', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('stureg_date', 'Date of Birth Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stureg_month', 'Date of Birth Month', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stureg_year', 'Date of Birth Year', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stureg_address_state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stureg_qualification','Qualification', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stureg_address_city', 'City', 'trim|xss_clean');
		$this->form_validation->set_rules('stureg_course_', 'Course', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stureg_username', 'Username', 'trim|required|min_length[6]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('stureg_password', 'Password', 'trim|required|min_length[6]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('stureg_declaration', 'Acceptance', 'trim|required|xss_clean', array(
			'stureg_declaration' => 'Declaration field is required.'
		));
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();

			$exits_user = $this->stumod->getexitUserData($data['stureg_username']);
			if (!empty($exits_user)) {
				$this->session->set_flashdata('feedback', "User Registered, Please login to your account to continue...");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect('student/login');
			}
			$stureg_dob = $data['stureg_year'].'-'.$data['stureg_month'].'-'.$data['stureg_date'];
			if ($stureg_dob != "") {
				// $data['stureg_dob'] = date('Y-m-d', strtotime($stureg_dob));
				$data['stureg_dob'] = $stureg_dob;
			}
			$insstu_id = $this->stumod->createStudentAccount($data);

			if ($insstu_id) {
				$sudata = $this->stumod->getPerStudent($insstu_id);
				$stureg_name = $sudata->stureg_name;
				$stureg_email = $sudata->stureg_email;
				/* Send Email *****/
				$this->load->library('email');
				$this->email->from('info@cashkap.com', 'CASHKAP');
				$this->email->to($stureg_email);
				$this->email->bcc('bidhi.saklani@gmail.com');
				$this->email->subject('CASHKAP | Account Creation');
				$this->email->set_mailtype("html");
				$this->email->message("<p><strong>Congratulations,</strong> <br/><strong>YOU HAVE SUCESSFULLY SIGNING UP ON CASHKAP.COM</strong></p><p>Hi <strong>$stureg_name</strong>,</p><p>WELCOME TO BRAINY TALKS PVT. LTD.<br/>YOU HAVE SUCESSFULLY SIGN UP ON CASHKAP.COM<br/>Thanks for signing up with Brainy Talks Pvt. Ltd.</p><p>We hope you will have a great experience to working with us. Hope you find a good coaching center, college and university. </p><p><a href='https://www.cashkap.com/contact-us' target='_blank'>Contact us</a> for further details.</p>"); 
				$this->email->send();
					
				$this->session->set_userdata('stusesid', $insstu_id);
				$redirect_url = $this->session->userdata('return_url');
				if($redirect_url){
				redirect ($redirect_url);

				}
				//redirect("student/profile");
				echo "<script language=\"javascript\">fbq('track', 'CompleteRegistration');</script>";
				redirect("Webpagecontroller/home");
			} else {
				$this->load->view('website/student-registration', $arr);
			}
		} else {
			$this->load->view('website/student-registration', $arr);
		}
	}

	public function date()  
      { 
         $query =  $this->stumod->date(); 
		//  echo"pre";
        echo json_decode($query);
      }

	// apply now-----------------------------------


	public function student_Applynow()
	{
		// echo "hello"; die;
		$insstu_id = $this->session->userdata('stusesid');
		$course = $this->session->userdata('course');
		$associd = $this->session->userdata('associd');
		$courseName = $this->session->userdata('courseName');

		$arr['assocdata'] = $this->stumod->getPerAssociate_($associd);


		/* insstu_id has stureg_id */
		if ($insstu_id) {
			$sudata = $this->stumod->getPerStudent($insstu_id); /*sudata has all data of a student from tb_studentreg table*/
			$stureg_name = $sudata->stureg_name;
			$stureg_email = $sudata->stureg_email;
			$mobNumber = $sudata->stureg_mobileno;
			// $this->session->unset_userdata('assocsesid');
			if ($associd != "") {
				$params = $associd . "|" . $course;
				$enc_params = $this->encryptcode->encrypt($params, ENC_KEY_PASS);
				$this->session->set_flashdata('feedback', "Thank you for signup at Petty Bucks. Please fill up Discount Generation form to get Discount Coupon");
				$this->session->set_flashdata('feedbackerr', "alert-success");
			}

			// echo $stureg_email;
			// print_r($sudata,"hello");
			// echo "<pre>";
			// print_r($sudata) ; die;

			$data2['stuco_name'] = $stureg_name;
			$data2['stuco_email'] = $stureg_email;
			$data2['stuco_mobile'] = $mobNumber;
			$data2['stuco_course'] = $course;
			$data2['stuco_course_name'] = $courseName;
			// unset($data['subdis']);
			$data2['stuco_associd'] = $associd;
			$codedate = date('ydm');
			$codeno = random_string('nozero', 3);
			$otp = random_string('nozero', 6);
			$codechar = strtoupper(random_string('alpha', 4));
			$coupon = $codechar . "" . $codeno . $codedate;
			$assoc_discount = $arr['assocdata']->assoc_discount;
			$data2['stuco_coupon'] = $coupon;
			if ($assoc_discount > 0) {
				$data2['stuco_couponval'] = $assoc_discount;
			} else {
				$data2['stuco_couponval'] = 0;
			}
			$data2['stuco_otp'] = $otp;
			/*stuco_id has stuco_id of a student from tb_studisform table*/
			// echo "<pre>";
			//  print_r($data2) ; die;

			$stuco_id = $this->stumod->regStudentDisForm($data2, $insstu_id);

			if ($stuco_id) {
				/*studisdata has all data of a student */
				$studisdata = $this->stumod->getPerDisCode($stuco_id);
				$mobile = $studisdata->stuco_mobile;
				$otp = $studisdata->stuco_otp;
				$sms_text = "$otp is your verification code. BRAINY";
				$sms_text_final = urlencode($sms_text);
				$url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $mobile . "&message=$sms_text_final&format=json";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				$response = curl_exec($ch);
				curl_close($ch);
				$enc_stuco_id = $this->encryptcode->encrypt($stuco_id, ENC_KEY_PASS);
				$this->session->set_flashdata('feedback', "OTP sent successfully");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("student/get-discount/verify-mobile/$enc_stuco_id");
			}
		}
	}



	public function get_discountcode()
	{
		$arr['siteTitle'] = 'Student Apply For Discount Code';
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('app_associd', 'Associate', 'trim|required|xss_clean', array(
			'required' => 'Associate field is required'
		));
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$app_associd = $data['app_associd'];
			$course = "";
			$params = $app_associd . "|" . $course;
			$stusesid = $this->session->userdata('stusesid');
			if (empty($stusesid)) {
				redirect('student/registration');
			}
			$arr['studata'] = $this->stumod->getPerStudent($stusesid);
			if (empty($arr['studata'])) {
				$this->session->set_userdata('app_associd', $app_associd);
				$this->session->set_userdata('app_course', $course);
				$this->session->set_flashdata('feedback', "Please register/login to your account to continue");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect('student/registration');
			}
			$enc_params = $this->encryptcode->encrypt($params, ENC_KEY_PASS);
			redirect("student/get-discount/verify-mobile/$enc_params");
		}
	}



	public function verify_dismobile($enc_stuco_id)
	{
		$arr['siteTitle'] = 'Mobile Verification';
		$stusesid = $this->session->userdata('stusesid');
		if (empty($stusesid)) {
			redirect('student/login');
		}
		$arr['studata'] = $this->stumod->getPerStudent($stusesid);
		$stuco_id = $this->encryptcode->decrypt($enc_stuco_id, ENC_KEY_PASS);
		$arr['studisdata'] = $this->stumod->getPerDisCode($stuco_id);
		if (empty($arr['studisdata'])) {
			$arr['studisdata'] = $studata;
		}

		$assoc_email = $arr['studisdata']->assoc_email;
		$adrow = $this->stumod->getAdminEmail();
		$ad_email = $adrow->ad_email;

		if (isset($_POST['resendotp'])) {
			echo "yes";
			$mobile = $arr['studisdata']->stuco_mobile;
			$coupon_code = $arr['studisdata']->stuco_coupon;
			$coupon_val = $arr['studisdata']->stuco_couponval;
			$coupondiscount = $coupon_val . "%";

			$sms_text = "$coupon_code OTP you have successfully generated your $coupondiscount cash back discount code. You can get admission by seeing this to college. BRAINY";
			$sms_text_final = urlencode($sms_text);
			$url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $mobile . "&message=$sms_text_final&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$response = curl_exec($ch);
			curl_close($ch);
			$this->session->set_flashdata('feedback', "OTP sent to your mobile number successfully!");
			$this->session->set_flashdata('feedbackerr', "alert-success");
			redirect("student/get-discount/verify-mobile/$enc_stuco_id");
		}
		if (isset($_POST['subdis'])) {
			$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
			$this->form_validation->set_rules('stuco_otp', 'OTP', 'trim|required|callback_chkdisotp|xss_clean', array(
				'required' => 'Please enter OTP.'
			));
			if ($this->form_validation->run() == true) {
				$data = $this->input->post();
				$upverstatus = $this->stumod->upPerDisCodeVerification($stuco_id);
				if ($upverstatus) {
					/***** Send Message of Coupon ***/
					$mobile = $arr['studisdata']->stuco_mobile;
					$coupon_code = $arr['studisdata']->stuco_coupon;
					$coupon_val = $arr['studisdata']->stuco_couponval;
					$coupondiscount = $coupon_val . "%";
					$sms_text = "$coupon_code OTP you have successfully generated your $coupondiscount cash back discount code. You can get admission by seeing this to college. BRAINY";
					$sms_text_final = urlencode($sms_text);
					$url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $mobile . "&message=$sms_text_final&format=json";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					$response = curl_exec($ch);
					curl_close($ch);
					/****** Associate Email & Admin CC *******/
					$qname = $arr['studisdata']->stuco_name;
					$qmobile = $arr['studisdata']->stuco_mobile;
					$qemail = $arr['studisdata']->stuco_email;
					$qcourse = $arr['studisdata']->course_name;
					$stuco_coupon = $arr['studisdata']->stuco_coupon;
					$assoc_instconame = $arr['studisdata']->assoc_instconame;
					$assoc_contactno = $arr['studisdata']->assoc_contactno;
					$assoc_email = $arr['studisdata']->assoc_email;

					$assoc_address_line1 = $arr['studisdata']->assoc_address_line1;
					$assoc_address_line2 = $arr['studisdata']->assoc_address_line2;
					$assoc_address_city = $arr['studisdata']->assoc_address_city;
					$assoc_address_state = $arr['studisdata']->assoc_address_state;
					$assoc_address_country = $arr['studisdata']->assoc_address_country;
					$assoc_address_pin = $arr['studisdata']->assoc_address_pin;
					$inst_address = "";
					$inst_address = $assoc_address_line1;

					if ($assoc_address_line2 != "") {
						$inst_address = $inst_address . ", " . $assoc_address_line2;
					}
					if ($assoc_address_city != "") {
						$inst_address = $inst_address . ", " . $assoc_address_city;
					}
					if ($assoc_address_state != "") {
						$inst_address = $inst_address . ", " . $assoc_address_state;
					}
					if ($assoc_address_country != "") {
						$inst_address = $inst_address . ", " . $assoc_address_country;
					}
					if ($assoc_address_pin != "") {
						$inst_address = $inst_address . ", " . $assoc_address_pin;
					}




					if ($qemail != "") {
						$this->load->library('email');
						$this->email->from('info@cashkap.com', 'Cash Kap');
						$this->email->to($qemail);
						$this->email->bcc("bidhi.saklani@gmail.com");
						$this->email->set_mailtype("html");
						$this->email->subject("CashKap Admission");
						$this->email->message("
	<table border='0' width='100%' cellspacing='0' cellpadding='2'>
		<tr><td  style='border-bottom:1px solid #ccc;'>Institute Name: </td><td style='border-bottom:1px solid #ccc;'>$assoc_instconame</td></tr>
		<tr><td  style='border-bottom:1px solid #ccc;'>Institute Mobile: </td><td style='border-bottom:1px solid #ccc;'>$assoc_contactno</td></tr>
		<tr><td  style='border-bottom:1px solid #ccc;'>Institute Email: </td><td style='border-bottom:1px solid #ccc;'>$assoc_email</td></tr>
		<tr><td style='border-bottom:1px solid #ccc;'>Course Name: </td><td style='border-bottom:1px solid #ccc;'>$qcourse</td></tr>
		<tr><td style='border-bottom:1px solid #ccc;'>Admission Code: </td><td style='border-bottom:1px solid #ccc;'>$stuco_coupon</td></tr>
		<tr><td style='border-bottom:1px solid #ccc;'>Institute Address: </td><td style='border-bottom:1px solid #ccc;'>$inst_address</td></tr>
	</table><p><strong>Thank you,</strong><br/>
	<strong>Best Regards,</strong><br/>
	<span style='color:#000'>Cashkap.com</span></p>");
						$this->email->send();
					}


					if ($assoc_email != "") {
						$this->load->library('email');
						$this->email->from('info@cashkap.com', 'Cash Kap');
						$this->email->to($assoc_email);
						$this->email->bcc("bidhi.saklani@gmail.com");
						$this->email->set_mailtype("html");
						$this->email->subject("Query Reminder");
						$this->email->message("
	<table border='0' width='100%' cellspacing='0' cellpadding='2'>
		<tr><td  style='border-bottom:1px solid #ccc;'>Student Name: </td><td style='border-bottom:1px solid #ccc;'>$qname</td></tr>
		<tr><td style='border-bottom:1px solid #ccc;'>Mobile: </td><td style='border-bottom:1px solid #ccc;'>$qmobile</td></tr>
		<tr><td style='border-bottom:1px solid #ccc;'>Email: </td><td style='border-bottom:1px solid #ccc;'>$qemail</td></tr>
		<tr><td style='border-bottom:1px solid #ccc;'>Course: </td><td style='border-bottom:1px solid #ccc;'>$qcourse</td></tr>
		<tr><td style='border-bottom:1px solid #ccc;'>Admission Code: </td><td style='border-bottom:1px solid #ccc;'>$stuco_coupon</td></tr>
		<tr><td style='border-bottom:1px solid #ccc;'>Institute Name: </td><td style='border-bottom:1px solid #ccc;'>$assoc_instconame</td></tr>
	</table><p><strong>Thank you,</strong><br/>
	<strong>Best Regards,</strong><br/>
	<span style='color:#000'>Cashkap.com</span></p>");
						$this->email->send();
					}


					if ($ad_email != "") {
						$this->load->library('email');
						$this->email->from('info@cashkap.com', 'Cash Kap');
						$this->email->to($ad_email);
						$this->email->bcc("bidhi.saklani@gmail.com");
						$this->email->set_mailtype("html");
						$this->email->subject("Admission Code Generated by: $qname");
						$this->email->message("
		
		<table border='0' width='100%' cellspacing='0' cellpadding='2'>
			<tr><td  style='border-bottom:1px solid #ccc;'>Student Name: </td><td style='border-bottom:1px solid #ccc;'>$qname</td></tr>
			<tr><td style='border-bottom:1px solid #ccc;'>Mobile: </td><td style='border-bottom:1px solid #ccc;'>$qmobile</td></tr>
			<tr><td style='border-bottom:1px solid #ccc;'>Email: </td><td style='border-bottom:1px solid #ccc;'>$qemail</td></tr>
			<tr><td style='border-bottom:1px solid #ccc;'>Course: </td><td style='border-bottom:1px solid #ccc;'>$qcourse</td></tr>
			<tr><td style='border-bottom:1px solid #ccc;'>Admission Code: </td><td style='border-bottom:1px solid #ccc;'>$stuco_coupon</td></tr>
			<tr><td style='border-bottom:1px solid #ccc;'>Institute Name: </td><td style='border-bottom:1px solid #ccc;'>$assoc_instconame</td></tr>
			<tr><td style='border-bottom:1px solid #ccc;'>Address: </td><td style='border-bottom:1px solid #ccc;'>$inst_address</td></tr>
		</table><p><strong>Thank you,</strong><br/>
	<strong>Best Regards,</strong><br/>
	<span style='color:#000'>Cashkap.com</span></p>");
						$this->email->send();
					}
					redirect("student/get-discount/regform-status/$enc_stuco_id");
				}
			}
		}
		// redirect('student/registration');
		$this->load->view('website/student-discountreg-verification', $arr);
	}



	// public function discount_regform($enc_parms)
	// {
	// 	$arr['siteTitle'] = 'Discount Registration Form';
	// 	$stusesid = $this->session->userdata('stusesid');
	// 	if (empty($stusesid)) {
	// 		redirect('student/login');
	// 	}
	// 	$arr['studata'] = $this->stumod->getPerStudent($stusesid);
	// 	$parms = $this->encryptcode->decrypt($enc_parms, ENC_KEY_PASS);
	// 	$parmsar = explode("|", $parms);
	// 	$assoc_id = $parmsar[0];
	// 	$course_id = $parmsar[1];
	// 	$this->load->model('AssociateModel', 'assocmod');
	// 	$this->load->model('CategoryModel', 'catmod');
	// 	$arr['assocdata'] = $this->assocmod->getPerAssociate($assoc_id);
	// 	$arr['coursesdata'] = $this->catmod->getPerAssocCourses($assoc_id);
	// 	$assoc_discount = $arr['assocdata']->assoc_discount;
	// 	//print_r($arr['coursesdata']);
	// 	$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
	// 	$this->form_validation->set_rules('stuco_name', 'Name', 'trim|required|xss_clean', array(
	// 		'required' => 'Name field is required'
	// 	));
	// 	$this->form_validation->set_rules('stuco_mobile', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]|xss_clean', array(
	// 		'required' => 'Mobile Number field is required'
	// 	));
	// 	$this->form_validation->set_rules('stuco_email', 'Email Id', 'trim|required|valid_email|xss_clean', array(
	// 		'required' => 'Email Id field is required'
	// 	));
	// 	$this->form_validation->set_rules('stuco_course', 'Course', 'trim|required|xss_clean', array(
	// 		'required' => 'Course field is required'
	// 	));
	// 	if ($this->form_validation->run() == true) {
	// 		$data = $this->input->post();
	// 		unset($data['subdis']);
	// 		$data['stuco_associd'] = $assoc_id;
	// 		$codedate = date('ydm');
	// 		$codeno = random_string('nozero', 3);
	// 		$otp = random_string('nozero', 6);
	// 		$codechar = strtoupper(random_string('alpha', 4));
	// 		$coupon = $codechar . "" . $codeno . $codedate;
	// 		$data['stuco_coupon'] = $coupon;
	// 		if ($assoc_discount > 0) {
	// 			$data['stuco_couponval'] = $assoc_discount;
	// 		} else {
	// 			$data['stuco_couponval'] = 0;
	// 		}
	// 		$data['stuco_otp'] = $otp;
	// 		$stuco_id = $this->stumod->regStudentDisForm($data, $stusesid);
	// 		echo $stuco_id;die;
	// 		if ($stuco_id) {
	// 			$studisdata = $this->stumod->getPerDisCode($stuco_id);
	// 			$mobile = $studisdata->stuco_mobile;
	// 			$otp = $studisdata->stuco_otp;
	// 			$sms_text = "$otp is your verification code. BRAINY";
	// 			$sms_text_final = urlencode($sms_text);
	// 			$url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $mobile . "&message=$sms_text_final&format=json";
	// 			$ch = curl_init();
	// 			curl_setopt($ch, CURLOPT_URL, $url);
	// 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	// 			$response = curl_exec($ch);
	// 			curl_close($ch);
	// 			$enc_stuco_id = $this->encryptcode->encrypt($stuco_id, ENC_KEY_PASS);

	// 			$this->session->set_flashdata('feedback', "OTP sent successfully");
	// 			$this->session->set_flashdata('feedbackerr', "alert-success");
	// 			redirect("student/get-discount/verify-mobile/$enc_stuco_id");
	// 		}
	// 	} else {
	// 		$this->load->view('website/student-discountreg-form', $arr);
	// 	}
	// }
}
