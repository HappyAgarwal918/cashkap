<?php
class SettingModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAllState()
	{
		$this->db->from('tb_states');
		$this->db->order_by("state_name", "asc");
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerState($state_id)
	{
		$this->db->from('tb_states');
		$this->db->where('state_id', $state_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function upState($data, $state_id)
	{
		$dataUpdate = array('state_status' => $data['state_status'], 'state_search' => $data['state_search']);
		$this->db->where('state_id', $state_id);
		return $this->db->update('tb_states', $dataUpdate);
	}
	public function getAllCities($city_stateid)
	{
		$this->db->from('tb_cities');
		$this->db->where('city_stateid', $city_stateid);
		$this->db->order_by("city_name", "asc");
		$query = $this->db->get();
		return $query->result();
	}
	public function addCity($data, $city_stateid)
	{
		$dataInsert = array('city_stateid' => $city_stateid, 'city_name' => $data['city_name'], 'city_status' => $data['city_status']);
		return $this->db->insert('tb_cities', $dataInsert);
	}
	public function getPerCity($city_id)
	{
		$this->db->from('tb_cities');
		$this->db->where('city_id', $city_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function upCity($data, $city_stateid, $city_id)
	{
		$dataUpdate = array('city_name' => $data['city_name'], 'city_status' => $data['city_status']);
		$this->db->where('city_stateid', $city_stateid);
		$this->db->where('city_id', $city_id);
		return $this->db->update('tb_cities', $dataUpdate);
	}
	/*********** Setting Conroller *******/
	public function getAllSubCatInstitutes()
	{
		$this->db->from('tb_assoccategory');
		$this->db->where('assoccat_parent', 4);
		$this->db->order_by("assoccat_disorder", "asc");
		$query = $this->db->get();
		return $query->result();
	}
	public function addInstituteSubCat($data)
	{
		$dataInsert = array('assoccat_parent' => 4, 'assoccat_title' => $data['assoccat_title'], 'assoccat_menutitle' => $data['assoccat_title'], 'assoccat_menushow' => 1, 'assoccat_slug' => $data['assoccat_slug'], 'assoccat_status' => $data['assoccat_status'], 'assoccat_disorder' => $data['assoccat_disorder']);
		return $this->db->insert('tb_assoccategory', $dataInsert);
	}
	public function getPerSubCat($assoccat_id)
	{
		$this->db->from('tb_assoccategory');
		$this->db->where('assoccat_id', $assoccat_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function upInstituteSubCat($data, $assoccat_id)
	{
		$dataUpdate = array('assoccat_title' => $data['assoccat_title'], 'assoccat_menutitle' => $data['assoccat_title'], 'assoccat_slug' => $data['assoccat_slug'], 'assoccat_status' => $data['assoccat_status'], 'assoccat_disorder' => $data['assoccat_disorder']);
		$this->db->where('assoccat_id', $assoccat_id);
		return $this->db->update('tb_assoccategory', $dataUpdate);
	}
}
