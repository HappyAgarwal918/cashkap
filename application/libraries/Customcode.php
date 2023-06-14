<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customcode
{

	public function __construct($params = array())
	{

		$this->CI = &get_instance();

		$this->CI->load->helper('url');

		$this->CI->config->item('base_url');

		$this->CI->load->database();

		$this->CI->load->model('CommonModel', 'commod');
		$this->CI->load->model('StudyAbroadModel', 'stuAmod');

	}

	public function getAllCoursePerCategory($edulevel_id)
	{

		$this->CI->load->database();

		$cocatcodata = $this->CI->commod->getAllCoursePerCategory($edulevel_id);

		return $cocatcodata;
	}

	public function getCatMenu()
	{

		$this->CI->load->database();

		$catmenudata = $this->CI->commod->getCatMenu();

		return $catmenudata;
	}

	public function getSubCategory($assoccat_parent)
	{

		$this->CI->load->database();

		$subcatmenu = $this->CI->commod->getAllSubcat($assoccat_parent);

		return $subcatmenu;
	}
	public function getSearchPerAssocCat($cat)
	{

		$this->CI->load->database();

		$cdata = $this->CI->commod->getSearchPerAssocCat($cat);

		return $cdata;
	}

	public function getAllStateSearch()
	{

		$this->CI->load->database();

		$ssdata = $this->CI->commod->getAllStateSearch();

		return $ssdata;
	}
	public function getAbrodclg(){
		$this->CI->load->database();
		$clgdata = $this->CI->stuAmod->getclgforfooter();
		return $clgdata;
	}
	public function getAbrodcntry(){
		$this->CI->load->database();
		$cntrydata = $this->CI->stuAmod->getCountryeligibl();
		return $cntrydata;
	}
}
