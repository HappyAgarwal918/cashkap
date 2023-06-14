<?php
class UsermModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAllUsers()
	{
		$this->db->from('tb_studentreg');
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studentreg.stureg_course', 'left');
		$this->db->join('tb_qualification', 'tb_qualification.qualification_id=tb_studentreg.stureg_qualification', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studentreg.stureg_assoc', 'left');

		$this->db->order_by('stureg_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerUser($stureg_id)
	{
		$this->db->from('tb_studentreg');
		$this->db->where('stureg_id', $stureg_id);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studentreg.stureg_course', 'left');
		$this->db->join('tb_qualification', 'tb_qualification.qualification_id=tb_studentreg.stureg_qualification', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studentreg.stureg_assoc', 'left');
		$query = $this->db->get();
		return $query->row();
	}
	public function getPerUserDiscountCoupon($stuco_regid)
	{
		$this->db->from('tb_studisform');
		$this->db->where('stuco_regid', $stuco_regid);
		$this->db->where('stuco_otpverstatus', 1);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studisform.stuco_associd', 'left');
		$this->db->order_by('stuco_date', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerUserPerDisCoupon($stureg_id, $stuco_id)
	{
		$this->db->from('tb_studisform');
		$this->db->where('stuco_regid', $stureg_id);
		$this->db->where('stuco_id', $stuco_id);
		$this->db->where('stuco_otpverstatus', 1);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studisform.stuco_associd', 'left');
		$query = $this->db->get();
		return $query->row();
	}
}
