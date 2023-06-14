<?php
class SearchModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getSearchCourse($term)
	{
		$this->db->from('tb_courses');
		$this->db->where('course_eduparent !=', 0);
		$this->db->order_by("course_name", "asc");
		$this->db->like('course_name', $term);
		$query = $this->db->get();
		return $query->result();
	}

	public function getSearchCityByState($city_stateid)
	{
		$this->db->from('tb_cities');
		$this->db->where('city_stateid', $city_stateid);
		$this->db->where('city_status', 1);
		$this->db->order_by("city_name", "asc");
		$query = $this->db->get();
		return $query->result();
	}
	public function getSearchCity($term)
	{
		$this->db->from('tb_cities');
		$this->db->where('city_status !=', 0);
		$this->db->order_by("city_name", "asc");
		$this->db->like('city_name', $term);
		$query = $this->db->get();
		return $query->result();
	}
	public function getStateByName($state_name)
	{
		$this->db->from('tb_states');
		$this->db->where('state_name', $state_name);
		$query = $this->db->get();
		return $query->row();
	}
	public function getSearchCityFilter($state_id, $search_term)
	{
		$this->db->from('tb_cities');
		$this->db->where('city_stateid', $state_id);
		$this->db->where('city_status !=', 0);
		$this->db->order_by("city_name", "asc");
		$this->db->like('city_name', $search_term);
		$query = $this->db->get();
		return $query->result();
	}
}
