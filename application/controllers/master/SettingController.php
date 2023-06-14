<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SettingController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string'));
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('master/SettingModel', 'setmod');
		$this->load->model('CommonModel', 'commod');
		$this->load->database();
	}
	public function manage_state()
	{
		$arr['siteTitle'] = 'Manage States';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['statedata'] = $this->setmod->getAllState();
		$this->load->view("master/master-state-manage", $arr);
	}
	public function edit_state($state_id)
	{
		$arr['siteTitle'] = 'Edit State';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['statedata'] = $this->setmod->getPerState($state_id);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('state_status', 'Status', 'trim|required|xss_clean');
		$this->form_validation->set_rules('state_search', 'Search Listing', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['upState']);
			$upstate = $this->setmod->upState($data, $state_id);
			if ($upstate) {
				$this->session->set_flashdata('feedback', "State updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/setting/manage-state");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/setting/manage-state");
			}
		} else {
			$this->load->view('master/master-state-edit', $arr);
		}
	}
	public function manage_cities($city_stateid)
	{
		$arr['siteTitle'] = 'Manage Cities';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['statedata'] = $this->setmod->getPerState($city_stateid);

		$arr['citydata'] = $this->setmod->getAllCities($city_stateid);
		$this->load->view("master/master-city-manage", $arr);
	}
	public function add_city($city_stateid)
	{
		$arr['siteTitle'] = 'Add City';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['statedata'] = $this->setmod->getPerState($city_stateid);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('city_name', 'City Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('city_status', 'Status', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addCity']);
			$upcity = $this->setmod->addCity($data, $city_stateid);
			if ($upcity) {
				$this->session->set_flashdata('feedback', "City added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/setting/manage-city/$city_stateid");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/setting/manage-city/$city_stateid");
			}
		} else {
			$this->load->view('master/master-city-add', $arr);
		}
	}
	public function edit_city($city_stateid, $city_id)
	{
		$arr['siteTitle'] = 'Edit City';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['statedata'] = $this->setmod->getPerState($city_stateid);
		$arr['citydata'] = $this->setmod->getPerCity($city_id);
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('city_name', 'City Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('city_status', 'Status', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addCity']);
			$upcity = $this->setmod->upCity($data, $city_stateid, $city_id);
			if ($upcity) {
				$this->session->set_flashdata('feedback', "City added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/setting/manage-city/$city_stateid");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/setting/manage-city/$city_stateid");
			}
		} else {
			$this->load->view('master/master-city-edit', $arr);
		}
	}
	/******** Manage Institutes Subcategory *********/
	public function manage_institutes()
	{
		$arr['siteTitle'] = 'Manage Institutes';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['instdata'] = $this->setmod->getAllSubCatInstitutes();
		$this->load->view("master/master-setting-institutesubcat-manage", $arr);
	}
	public function add_institute()
	{
		$arr['siteTitle'] = 'Add Institute';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assoccat_title', 'Category Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoccat_slug', 'Slug', 'trim|required|is_unique[tb_assoccategory.assoccat_slug]|xss_clean');
		$this->form_validation->set_rules('assoccat_disorder', 'Display Order', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('assoccat_status', 'Status', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addInst']);
			$addinst = $this->setmod->addInstituteSubCat($data);
			if ($addinst) {
				$this->session->set_flashdata('feedback', "Institute category added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/setting/manage-institutes");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/setting/manage-institutes");
			}
		} else {
			$this->load->view('master/master-setting-institutesubcat-add', $arr);
		}
	}
	public function edit_institute($assoccat_id)
	{
		$arr['siteTitle'] = 'Edit Institute';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['catdata'] = $this->setmod->getPerSubCat($assoccat_id);

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('assoccat_title', 'Category Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('assoccat_slug', 'Slug', 'trim|required|callback_chkslug|xss_clean');
		$this->form_validation->set_rules('assoccat_disorder', 'Display Order', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('assoccat_status', 'Status', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			unset($data['addInst']);
			$upinst = $this->setmod->upInstituteSubCat($data, $assoccat_id);
			if ($upinst) {
				$this->session->set_flashdata('feedback', "Institute category updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/setting/manage-institutes");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/setting/manage-institutes");
			}
		} else {
			$this->load->view('master/master-setting-institutesubcat-edit', $arr);
		}
	}
	public function chkslug($assoccat_slug)
	{
		$old_assoccat_slug = $this->input->post('old_assoccat_slug');
		if ($assoccat_slug != $old_assoccat_slug) {
			$slug_count = $this->setmod->chkSlugCount($assoccat_slug);
			if ($slug_count == 0) {
				return true;
			} else {
				$this->form_validation->set_message('chkslug', 'Slug already exist');
				return false;
			}
		} else {
			return true;
		}
	}
}
