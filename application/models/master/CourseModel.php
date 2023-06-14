<?php
class CourseModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAllCourses()
	{
		$this->db->from('tb_courses');
		$this->db->where('course_eduparent !=', 0);
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_courses.course_catsubmenu', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerCourse($course_id)
	{
		$this->db->from('tb_courses');
		$this->db->where('course_id', $course_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function insCourse($data)
	{
		$dataInsert = array('course_eduparent' => $data['course_eduparent'], 'course_name' => $data['course_name'], 'course_status' => $data['course_status'], 'course_slug' => $data['course_slug'], 'course_disorder' => $data['course_disorder'], 'course_catsubmenu' => $data['course_catsubmenu']);
		return $this->db->insert('tb_courses', $dataInsert);
	}
	public function upCourse($data, $course_id)
	{
		$dataUpdate = array('course_eduparent' => $data['course_eduparent'], 'course_name' => $data['course_name'], 'course_status' => $data['course_status'], 'course_slug' => $data['course_slug'], 'course_disorder' => $data['course_disorder'], 'course_catsubmenu' => $data['course_catsubmenu']);
		$this->db->where('course_id', $course_id);
		return $this->db->update('tb_courses', $dataUpdate);
	}
}
