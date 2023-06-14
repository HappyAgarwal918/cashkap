<?php class CommonModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getSearchPerAssocCat($assoccat_id)
	{
		$this->db->from('tb_assoccategory');
		$this->db->where('assoccat_id', $assoccat_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getAllState()
	{
		$this->db->from('tb_states');
		$this->db->where('state_status', 1);
		$this->db->order_by('state_name', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllStateSearch()
	{
		$this->db->from('tb_states');
		$this->db->where('state_status', 1);
		$this->db->where('state_search', 1);
		$this->db->order_by('state_name', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllCitySearch()
	{
		$this->db->from('tb_cities');
		$this->db->where('city_status', 1);
		$this->db->order_by('city_name', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllQualifiation()
	{
		$this->db->from('tb_qualification');
		$this->db->where('qualification_status', 1);
		$this->db->order_by('qualification_order', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllAssocCategory()
	{
		$this->db->from('tb_assoccategory');
		$this->db->where('assoccat_status', 1);
		$this->db->where('assoccat_parent', 0);
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllSubcat($assoccat_parent)
	{
		$this->db->from('tb_assoccategory');
		$this->db->where('assoccat_parent', $assoccat_parent);
		$this->db->where('assoccat_status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerCategory($assoccat_id)
	{
		$this->db->from('tb_assoccategory');
		$this->db->where('assoccat_id', $assoccat_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getAllCourseCategory()
	{
		$this->db->from('tb_courses');
		$this->db->where('course_eduparent', 0);
		$this->db->order_by('course_disorder', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerCourseBySlug($course_slug)
	{
		$this->db->from('tb_courses');
		$this->db->where('course_slug', $course_slug);
		$query = $this->db->get();
		return $query->row();
	}
	public function getAllCoursePerCategory($course_id)
	{
		$this->db->from('tb_courses');
		$this->db->where('course_eduparent', $course_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllFacility()
	{
		$this->db->from('tb_facilities');
		$this->db->where('facilitity_status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllCountry()
	{
		$this->db->from('tb_country');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllCountryFront()
	{
		$this->db->from('tb_country');
		$query = $this->db->get();
		return $query->result();
	}
	public function getCatMenu()
	{
		$this->db->from('tb_assoccategory');
		$this->db->where('assoccat_menushow', 1);
		$this->db->where('assoccat_status', 1);
		$this->db->order_by('assoccat_disorder', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getCourseCategories()
	{
		$this->db->where('course_eduparent', 0);
		$query = $this->db->get('tb_courses');
		$return = array();
		foreach ($query->result() as $category) {
			$return[$category->course_id] = $category;
			$return[$category->course_id]->subs = $this->getCourseSubCategories($category->course_id); // Get the categories sub categories
		}
		return $return;
	}
	public function getCourseSubCategories($course_eduparent)
	{
		$this->db->where('course_eduparent', $course_eduparent);
		$query = $this->db->get('tb_courses');
		return $query->result();
	}
}
