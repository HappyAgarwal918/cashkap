<?php
class StudentModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function createStudentAccount($data)
	{
		$stureg_date = date("y-m-d");
		$dataInsert = array('stureg_name' => $data['stureg_name'], 'stureg_mobileno' => $data['stureg_mobileno'],'stureg_qualification'=>$data['stureg_qualification'], 'stureg_email' => $data['stureg_email'], 'stureg_dob' => $data['stureg_dob'], 'stureg_address_city' => $data['stureg_address_city'], 'stureg_address_state' => $data['stureg_address_state'], 'stureg_course' => $data['stureg_course_'], 'stureg_username' => $data['stureg_username'], 'stureg_password' => md5($data['stureg_password']), 'stureg_date' => $stureg_date);
		$this->db->insert('tb_studentreg', $dataInsert);
		return  $this->db->insert_id();
	}
	public function updateOtp($otp, $stuco_id)
	{	
		$dataUpdate = array('stuco_otp' => $otp,
							'stuco_date' => date("y-m-d"));
		$this->db->where('stuco_id', $stuco_id);
		$this->db->update('tb_studisform', $dataUpdate);
		return true;
	}

	public function stuLoginCheck($data)
	{
		$stureg_username = $data['stureg_username'];
		$stureg_password = md5($data['stureg_password']);
		$this->db->where('stureg_username', $stureg_username);
		$this->db->where('stureg_password', $stureg_password);
		$this->db->where('stureg_regstatus', 1);
		$query = $this->db->get('tb_studentreg');
		if ($query->num_rows() > 0) {
			
			$row = $query->row();
			return $query->row();
		} else {
			return false;
		}
	}

	public function getPerStudent($stureg_id)
	{
		$this->db->from('tb_studentreg');
		$this->db->where('stureg_id', $stureg_id);
		$this->db->join('tb_studisform', 'tb_studisform.stuco_regid=tb_studentreg.stureg_id', 'left');
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studentreg.stureg_course', 'left');
		$this->db->join('tb_qualification', 'tb_qualification.qualification_id=tb_studentreg.stureg_qualification', 'left');
		$query = $this->db->get();
		return $query->row();
	}

	public function regStudentDisForm($data2, $insstu_id)
	{
		// echo "<pre>";
		// print_r($data2);die;
		$stuco_date = date("y-m-d");
		$dataInsert = array('stuco_regid' => $insstu_id, 'stuco_associd' => $data2['stuco_associd'], 'stuco_name' => $data2['stuco_name'], 'stuco_mobile' => $data2['stuco_mobile'], 'stuco_email' => $data2['stuco_email'], 'stuco_course' => $data2['stuco_course'], 'stuco_date' => $stuco_date, 'stuco_coupon' => $data2['stuco_coupon'], 'stuco_couponval' => $data2['stuco_couponval'], 'stuco_otp' => $data2['stuco_otp'],'stuco_course_name' => $data2['stuco_course_name']);
		$this->db->insert('tb_studisform', $dataInsert);
		return  $this->db->insert_id();
	}

	public function getAdminEmail()
	{
		$this->db->from('tb_masterusers');
		$query = $this->db->get();
		return $query->row();
	}

	public function getPerDisCode($stuco_id)
	{
		$this->db->from('tb_studisform');
		$this->db->where('stuco_id', $stuco_id);
		$this->db->join('tb_studentreg', 'tb_studentreg.stureg_id=tb_studisform.stuco_regid', 'left');
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studisform.stuco_associd', 'left');
		$query = $this->db->get();
		return $query->row();
	}

	public function getPerStudentDiscountData($stuco_regid)
	{
		$status = 1;
		$this->db->from('tb_studisform');
		$this->db->where('stuco_regid', $stuco_regid);
		// $this->db->where('stuco_otpverstatus', $status321);

		$this->db->join('tb_studentreg', 'tb_studentreg.stureg_id=tb_studisform.stuco_regid', 'left');
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studisform.stuco_associd', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function upPerDisCodeVerification($stuco_id)
	{
		$dataUpdate = array('stuco_otpverstatus' => 1);
		$this->db->where('stuco_id', $stuco_id);
		$query = $this->db->update('tb_studisform', $dataUpdate);
		return $query;
	}

	public function getPerDiscountData($stuco_id)
	{
		$this->db->from('tb_studisform');
		$this->db->where('stuco_id', $stuco_id);
		$this->db->join('tb_studentreg', 'tb_studentreg.stureg_id=tb_studisform.stuco_regid', 'left');
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_associate', 'tb_associate.assoc_id=tb_studisform.stuco_associd', 'left');
		$query = $this->db->get();
		return $query->row();
	}

	public function getUserByEmailCount($stureg_email)
	{
		$this->db->from('tb_studentreg');
		$this->db->where('stureg_email', $stureg_email);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getUserByEmail($stureg_email)
	{
		$this->db->from('tb_studentreg');
		$this->db->where('stureg_email', $stureg_email);
		$query = $this->db->get();
		return $query->row();
	}

	public function upDiscountFormSlip($stuco_id, $slip_final)
	{
		$stuco_redeemslipdatetime = date("Y-m-d H:i:s");
		$dataUpdate = array('stuco_redeemslip' => $slip_final, 'stuco_redeemslipdatetime' => $stuco_redeemslipdatetime);
		$this->db->where('stuco_id', $stuco_id);
		$query = $this->db->update('tb_studisform', $dataUpdate);
		return $query;
	}

	public function updateForgotPassword($stureg_id, $new_password)
	{
		$stuco_redeemslipdatetime = date("Y-m-d H:i:s");
		$dataUpdate = array('stureg_password' => md5($new_password));
		$this->db->where('stureg_id', $stureg_id);
		$query = $this->db->update('tb_studentreg', $dataUpdate);
		return $query;
	}

	public function getPerAssociate_($assoc_id)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_id', $assoc_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getexitUserData($email){
		$this->db->from('tb_studentreg');
		$this->db->where('stureg_username', "$email");
		$query = $this->db->get();
		return $query->row();
		

	}
	public function date()  
      { 
         $queryDate = $this->db->get('tb_date');  
		 return $queryDate->result();
      }


	  public function Month()  {
		$queryMonth = $this->db->get('tb_month');
		return $queryMonth->result() ;
	  }
	  public function year()  {
		$queryYEAR = $this->db->get('tb_year');
		return $queryYEAR->result() ;
	  }
	
	// get email----------------
	public function checkEmail($email){
		$this->db->from ('tb_studentreg');
		$this->db->where('stuco_mobile',"$email");
		$query=$this->db->get();
		return $query->row();
	}
public	function verifyemail($email)
{
$this->db->select("*");
$this->db->from("tb_studentreg");
$this->db->where("stuco_mobile",$email);
$query = $this->db->get();
if($query->num_rows() == 1)
{ 
return true;
}
else{
return false;
}
}
}
