<?php
class DiscouponModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAllDiscountCoupon()
	{
		$this->db->from('tb_studisform');
		$this->db->where('stuco_redeemstatus', 1);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studisform.stuco_associd', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllDiscountCouponPend()
	{
		$this->db->from('tb_studisform');
		$this->db->where('stuco_redeemstatus', 0);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studisform.stuco_associd', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPerDiscountCoupon($stuco_id)
	{
		$this->db->from('tb_studisform');
		$this->db->where('stuco_id', $stuco_id);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studisform.stuco_associd', 'left');
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
	public function upCashbackSlip($data, $stuco_id, $slip_final)
	{
		$dataUpdate = array('stuco_cashbackamt' => $data['stuco_cashbackamt'], 'stuco_cashbackremarks' => $data['stuco_cashbackremarks'], 'stuco_cashbackslip' => $slip_final, 'stuco_cashbackpaid' => 1);
		$this->db->where('stuco_id', $stuco_id);
		return $this->db->update('tb_studisform', $dataUpdate);
	}
}
