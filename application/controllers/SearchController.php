<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SearchController extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
                Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
                Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
		$this->load->helper(array('form', 'url', 'string', 'security'));

		$this->load->library(array('form_validation', 'session', 'user_agent'));

		$this->load->database();

		$this->load->model('SearchModel', 'searchmod');
	}

	public function search_course()
	{
		$search_term = $_GET['term'];
		$searchdata = $this->searchmod->getSearchCourse($search_term);
		$smData = array();
		if (count($searchdata) > 0) {

			foreach ($searchdata as $searchrow) {
				$data['id'] = $searchrow->course_id;
				$data['value'] = $searchrow->course_name;
				array_push($smData, $data);
			}
			echo json_encode($smData);
		}
	}

	public function get_course()
	{
		$search_term = $_GET['term'];
		$searchdata = $this->searchmod->getSearchCourse($search_term);
		$smData = array();
		if (empty($_POST['course_name'])){
			$html .= '<option value="">Select Course</option>';
		}
		if (count($searchdata) > 0) {
			foreach ($searchdata as $key => $searchrow) {
				// $data['id'] = $searchrow->course_id;
				// $data['value'] = $searchrow->course_name;
				// array_push($smData, $data);
				if($_POST['course_name'] == $searchrow->course_id){
						unset($searchdata[$key]);
					}else{
						$html .= '<option value="' . $searchrow->course_id . '">' . $searchrow->course_name . '</option>';
					}
			}
			echo $html;
		}
	}

	public function search_city()
	{
		$state_name = $_POST['state_name'];
		$staterow = $this->searchmod->getStateByName($state_name);
		// echo "<pre>";print_r($_POST['city_name']);die;
		if ($staterow) {
			$state_id = $staterow->state_id;
			$citydata = $this->searchmod->getSearchCityByState($state_id);
			if (empty($_POST['city_name'])){
				$html .= '<option value="">Select City</option>';
			}
			if (count($citydata) > 0) {
				foreach ($citydata as $key => $cityrow) {
					if($_POST['city_name'] == $cityrow->city_name){
						unset($citydata[$key]);
					}else{
							$html .= '<option value="' . $cityrow->city_name . '">' . $cityrow->city_name . '</option>';
					}
				}
				echo $html;
			} else {
				echo '<option value="All">All</option>';
			}
		}
	}
}
