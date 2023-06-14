<?php class WebpageModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAllFeaturedVideos()
	{
		$this->db->from('tb_videogallery');
		$this->db->where('video_status', 1);
		$this->db->order_by("video_disorder", "asc");
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllFeaturedImages()
	{
		$this->db->from('tb_featuredgallery');
		$this->db->order_by("feagal_disorder", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllFeaturedCollege()
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_category', 1);
		$this->db->where('assoc_status', 1);
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllFeaturedUniversities()
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_category', 2);
		$this->db->where('assoc_status', 1);
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllFeaturedSchools()
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_category', 3);
		$this->db->where('assoc_status', 1);
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllFeaturedInstitutes()
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_category', 4);
		$this->db->where('assoc_status', 1);
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function getSearchData($data)
	{
		$state = $data['state'];
		$city = $data['city'];
		$course = $data['course'];
		$this->db->from('tb_assoccourses as t1');
		if ($course != "") {
			$this->db->where('acourse_courseid', $course);
		}
		$this->db->join('tb_associate as t2', 't2.assoc_id=t1.acourse_associd');
		if ($state != "" && $state != "All") {
			$this->db->where('t2.assoc_address_state', $state);
		} else {
			$this->db->where('t2.assoc_address_state !=', "");
		}
		if ($city != "") {
			$this->db->like('t2.assoc_address_city', $city);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function get_course_data($id){
		$this->db->from('tb_courses');
		$this->db->where('course_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
}
