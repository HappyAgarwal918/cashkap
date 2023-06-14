<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdminController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('master/AdminModel', 'admod');
	}
	public function forgot_password()
	{
		$arr['siteTitle'] = "Forgot Password";
		$this->form_validation->set_error_delimiters('<span class="error-form">', '</span>');
		$this->form_validation->set_rules('adm_email', 'Email Id', 'trim|required|valid_email|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$adm_email = $data['adm_email'];
			$datalogrow = $this->admod->getUserByEmail($adm_email);
			//$datalogrow=$this->admod->adminLoginCheck($data); 
			if ($datalogrow) {
				$ad_userid = $datalogrow->ad_userid;
				$ad_firstName = $datalogrow->ad_firstName;
				$ad_email = $datalogrow->ad_email;
				$passnew = random_string('alnum', 10);
				$passhash = md5($passnew);
				$uppass = $this->admod->updateAdminPass($passhash, $ad_userid);
				if ($uppass) {
					$this->session->unset_userdata('captchaAdminF');

					$this->load->library('email');
					$this->email->from('info@floralsngifts.com', 'Sanawar Montessori School');
					$this->email->to($ad_email);
					$this->email->set_mailtype("html");
					$this->email->subject("Admin Account: Forgot Password");
					$message = "
	
	<p>Dear <strong>$ad_firstName</strong>,</p>
	
	<p>You are receiving this email because you filled out the forgot password form on sanawarmontessorischool.com admin portal. Your password  is following: </p><p>
	Password: $passnew</p><p><strong>Regards,</strong><br/>Sanawar Montessori School<br/>Admin Team</p>";
					$this->email->message($message);
					$this->email->send();
					$this->session->set_flashdata('feedback', "Password sent to admin email id successfully.");
					$this->session->set_flashdata('feedbackerr', "alert-success");

					redirect("master/login");
				} else {
					$this->session->set_flashdata('feedback', "Invalid Email Id. Please try again");
					$this->session->set_flashdata('feedbackerr', "alert-danger");
					redirect('master/forgot-password');
				}
			} else {
				$this->session->set_flashdata('feedback', "Invalid Email Id. Please try again");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect('master/forgot-password');
			}
		}
		$this->load->view('master/master-admin-forgot-password', $arr);
	}
	public function admin_profile()
	{
		$arr['siteTitle'] = "Dashboard";
		$this->load->database();
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['admdata'] = $this->admod->getAdminProfile($masterId);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim');
		$this->form_validation->set_rules('email', 'Email ID', 'required|valid_email|callback_checkuserEmail');
		$this->form_validation->set_rules('phone', 'Mobile Number', 'trim|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]|max_length[12]');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$user_created = $this->admod->updateAccount($data, $masterId);
			if ($user_created) {
				$this->session->set_flashdata('feedback', "Thank You. Admin account updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/profile");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/profile");
			}
		} else {
			$this->load->view('master/master-profile', $arr);
		}
	}
	public function checkuserEmail($email)
	{
		$oldemail = $this->input->post('oldemail');
		if ($email == $oldemail) {
			return true;
		} else {
			$this->load->database();
			$return = $this->admod->checkuserEmail($email);
			if ($return > 0) {
				$this->form_validation->set_message('checkuserEmail', 'The  {field} already exist');
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}
	public function admin_dashboard()
	{
		$arr['siteTitle'] = "Dashboard";
		$this->load->database();
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$this->load->view('master/master-dashboard', $arr);
	}
	public function master_task_request()
	{
		$arr['siteTitle'] = "Task Request";
		$this->load->database();
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['taskreqdata'] = $this->admod->getAllTaskRequest();
		$this->load->view('master/master-dashboard-task-request', $arr);
	}
	public function master_task_feedback()
	{
		$arr['siteTitle'] = "Task Feedback";
		$this->load->database();
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['taskfeeddata'] = $this->admod->getAllTaskFeedback();
		$this->load->view('master/master-dashboard-task-feedback', $arr);
	}
	public function master_documents()
	{
		$arr['siteTitle'] = "Documents";
		$this->load->database();
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['docdata'] = $this->admod->getAllDocument();
		$this->load->view('master/master-dashboard-documents', $arr);
	}

	public function ad_login()
	{
		$arr['siteTitle'] = "Admin Login";
		if ($this->session->userdata('masterId')) {
			redirect('master/dashboard');
		}
		$this->form_validation->set_error_delimiters('<span class="error-form">', '</span>');
		$this->form_validation->set_rules('loginid', 'Login Id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == TRUE) {
			$this->load->database();
			$data = $this->input->post();
			unset($data['submit_login']);
			$userId = $this->admod->adminLogin($data);
			if ($userId) {
				$this->session->set_userdata('masterId', $userId);
				redirect("master/dashboard");
			} else {
				$arr['error'] = 'Login failed wrong  user credential';
				$this->load->view('master/admin-login', $arr);
			}
		} else {
			$this->load->view('master/admin-login', $arr);
		}
	}
	public function admin_logout()
	{
		$this->session->unset_userdata('masterId');
		redirect('master/login');
	}
}
