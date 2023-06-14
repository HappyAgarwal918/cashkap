<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CoursesController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string'));
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('master/CourseModel', 'coursemod');
		$this->load->model('CommonModel', 'commod');

		$this->load->database();
	}
	public function manage_courses()
	{
		$arr['siteTitle'] = 'Manage Courses';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['coursedata'] = $this->coursemod->getAllCourses();
		$this->load->view("master/master-course-manage", $arr);
	}

	public function add_course()
	{
		$arr['siteTitle'] = 'Add Course';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['cocatdata'] = $this->commod->getAllCourseCategory();
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('course_eduparent', 'Education Level', 'trim|required|xss_clean');
		$this->form_validation->set_rules('course_name', 'Course Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('course_status', 'Status', 'trim|required|xss_clean');
		$this->form_validation->set_rules('course_disorder', 'Display Order', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('course_catsubmenu', 'Show in Submenu', 'trim|required|xss_clean');

		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addCourse']);
			$inscourse = $this->coursemod->insCourse($data);
			if ($inscourse) {

				$this->session->set_flashdata('feedback', "Course added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/course/manage");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/course/manage");
			}
		} else {
			$this->load->view('master/master-course-add', $arr);
		}
	}
	public function edit_course($course_id)
	{
		$arr['siteTitle'] = 'Edit Course';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['coursedata'] = $this->coursemod->getPerCourse($course_id);
		$arr['cocatdata'] = $this->commod->getAllCourseCategory();
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('course_eduparent', 'Education Level', 'trim|required|xss_clean');
		$this->form_validation->set_rules('course_name', 'Course Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('course_status', 'Status', 'trim|required|xss_clean');
		$this->form_validation->set_rules('course_disorder', 'Display Order', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('course_catsubmenu', 'Show in Submenu', 'trim|required|xss_clean');

		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addCourse']);
			$upcourse = $this->coursemod->upCourse($data, $course_id);
			if ($upcourse) {
				$this->session->set_flashdata('feedback', "Course updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/course/manage");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/course/manage");
			}
		} else {
			$this->load->view('master/master-course-edit', $arr);
		}
	}
}
