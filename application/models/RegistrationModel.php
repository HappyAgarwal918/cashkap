<?php
class RegistrationModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insOnlineStudent($data, $reg_appphoto)
	{
		$reg_date = date("Y-m-d");
		$dataInsert = array('reg_session' => $data['reg_session'], 'reg_class' => $data['reg_class'], 'reg_category' => $data['reg_category'], 'reg_firstname' => $data['reg_firstname'], 'reg_middlename' => $data['reg_middlename'], 'reg_lastname' => $data['reg_lastname'], 'reg_gender' => $data['reg_gender'], 'reg_dob' => $data['reg_dob'], 'reg_nationality' => $data['reg_nationality'], 'reg_presentschool' => $data['reg_presentschool'], 'reg_place' => $data['reg_place'], 'reg_presentclass' => $data['reg_presentclass'], 'reg_appphoto' => $reg_appphoto, 'reg_mothername' => $data['reg_mothername'], 'reg_motherquali' => $data['reg_motherquali'], 'reg_motherpro' => $data['reg_motherpro'], 'reg_mothercompname' => $data['reg_mothercompname'], 'reg_mothercompaddress' => $data['reg_mothercompaddress'], 'reg_mothercontactno' => $data['reg_mothercontactno'], 'reg_fathername' => $data['reg_fathername'], 'reg_fatherquali' => $data['reg_fatherquali'], 'reg_fatherpro' => $data['reg_fatherpro'], 'reg_fathercompname' => $data['reg_fathercompname'], 'reg_fathercompaddress' => $data['reg_fathercompaddress'], 'reg_fathercontactno' => $data['reg_fathercontactno'], 'reg_emailaddress' => $data['reg_emailaddress'], 'reg_resiaddress' => $data['reg_resiaddress'], 'reg_schooltransport' => $data['reg_schooltransport'], 'reg_amount' => $data['reg_amount'], 'reg_date' => $reg_date);
		$this->db->insert('tb_studentreg', $dataInsert);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	public function getPerRegistration($reg_id)
	{
		$this->db->from('tb_studentreg');
		$this->db->where('reg_id', $reg_id);
		$this->db->join('tb_classes', 'tb_classes.class_id=tb_studentreg.reg_class', 'left');
		$this->db->join('tb_category', 'tb_category.cat_id=tb_studentreg.reg_category', 'left');
		$query = $this->db->get();
		return $query->row();
	}
	public function insRegpaymentTxn($data)
	{
		$pay_date = date("Y-m-d");
		$dataInsert = array('pay_regid' => $data['pay_regid'], 'pay_session' => $data['pay_session'], 'pay_class' => $data['pay_class'], 'pay_category' => $data['pay_category'], 'pay_name' => $data['pay_name'], 'pay_email' => $data['pay_email'], 'pay_mobile' => $data['pay_mobile'], 'pay_amount' => $data['pay_amount'], 'pay_txnid' => $data['pay_txnid'], 'pay_date' => $pay_date);
		$this->db->insert('tb_payment', $dataInsert);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	public function getPerPayment($pay_id)
	{
		$this->db->from('tb_payment');
		$this->db->where('pay_id', $pay_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function updatePerPayment($data, $pay_id, $order_id)
	{
		$dataUpdate = array('pay_trackingid' => $data['pay_trackingid'], 'pay_paymode' => $data['pay_paymode'], 'pay_bankrefno' => $data['pay_bankrefno'], 'pay_errormessage' => $data['pay_errormessage'], 'pay_paystatus' => $data['pay_paystatus'], 'pay_paystatus' => $data['pay_paystatus'], 'pay_payupstatus' => $data['pay_payupstatus']);
		$this->db->where('pay_id', $pay_id);
		$this->db->where('pay_txnid', $order_id);
		return $this->db->update('tb_payment', $dataUpdate);
	}
	public function updateMainReg($pay_regid, $pay_id)
	{
		$dataUpdate = array('reg_payid' => $pay_id, 'reg_paystatus' => 1);
		$this->db->where('reg_id', $pay_regid);
		return $this->db->update('tb_studentreg', $dataUpdate);
	}



	/*public function userLoginCheck($data){
		$stu_admno=$data['stu_admno'];
		$stu_password=$data['stu_password'];
		$this->db->where('stu_admno',$stu_admno);
		$this->db->where('stu_password',$stu_password);
		$this->db->where('stu_status',1);
		$query=$this->db->get('tb_students');
		if($query->num_rows()>0){
			$row=$query->row();
			return $query->row();
		}else{
			return false;	
		}
	}
	public function getPerStudent($stu_id){
		$this->db->from('tb_students');
		$this->db->where('stu_id',$stu_id);
		$this->db->join('tb_classes','tb_classes.class_id=tb_students.stu_class','left');
		$query=$this->db->get();
		return $query->row();		
	}
	public function getUserByRollNo($stu_rollno){
		$this->db->from('tb_students');
		$this->db->where('stu_admno',$stu_rollno);
		$this->db->join('tb_classes','tb_classes.class_id=tb_students.stu_class','left');
		$query=$this->db->get();
		return $query->row();		
	}
	public function changeStudentPassword($passnew,$stu_id){
		$dataUpdate=array('stu_password'=>$passnew);
		$this->db->where('stu_id',$stu_id);
		$query=$this->db->update('tb_students',$dataUpdate); 
		return $query;	
	}
	public function getPerStudentReportCard($rec_rollno){
		$this->db->from('tb_reportcard');
		$this->db->where('rec_rollno',$rec_rollno);
		$this->db->order_by('rec_id','desc');
		$this->db->join('tb_classes','tb_classes.class_id=tb_reportcard.rec_class','left');
		$query=$this->db->get();
		return $query->result();		
	}
	public function getAllTransaction($pay_studid){
		$this->db->from('tb_payment');
		$this->db->where('pay_studid',$pay_studid);
		$this->db->order_by('pay_id	','desc');
		$this->db->join('tb_classes','tb_classes.class_id=tb_payment.pay_class','left');
		$this->db->join('tb_session','tb_session.ses_id=tb_payment.pay_session','left');
		$query=$this->db->get();
		return $query->result();		
	}
	public function getPerTransaction($pay_id){
		$this->db->from('tb_payment');
		$this->db->where('pay_id',$pay_id);
		$this->db->join('tb_classes','tb_classes.class_id=tb_payment.pay_class','left');
		$this->db->join('tb_session','tb_session.ses_id=tb_payment.pay_session','left');
		$this->db->join('tb_students','tb_students.stu_id=tb_payment.pay_studid','left');
		$query=$this->db->get();
		return $query->row();		
	}
	public function getPerTxnReport($pay_id){
		$this->db->from('tb_payreport');
		$this->db->where('payre_orderid',$pay_id);
		$query=$this->db->get();
		return $query->result();		
	}*/
}
