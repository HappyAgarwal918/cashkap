<?php
class StudyAbroadModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // start---------------------

    // country list----------
    public function getCountry()
    {
        $this->db->from('tb_cntryeligibility');
        // $this->db->limit(1);
        $query = $this->db->get(); // get all country
        return $query->result();
    }
    // provinces list----------------
    public function getProvinces($countryCode)
    {
        // echo $countryCode;
        $this->db->from('tb_allstates');
        $this->db->where('country_code', $countryCode);
        $query = $this->db->get();
        $output = '<option value="">Select Provinces</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->state_name . '">' . $row->state_name . '</option>';
        }
        return $output;
    }
    // university list----------
    public function getcollegeuniversity($countryCode)
    {
        $this->db->from('tb_abroad_college');
        $this->db->where('clg_cuntry', $countryCode);
        $query = $this->db->get();
        return $query->result_array();
    }

    // popup data ----------------------------

    public function getBYCountryName($CountryName)
    { //first  popup data
        $this->db->from('tb_cntryeligibility');
        $this->db->where('cntry_code', $CountryName);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBYCountryCode($Countrycode)
    { 
        $this->db->from('tb_cntryeligibility');
        $this->db->where('cntry_code', $Countrycode);
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllByCountryNameAndProvinces($CountryName, $Provinces)
    {
        $this->db->from('tb_cntry_provin_eligibility'); //II  popup data
        $this->db->where('country_code', $CountryName);
        $this->db->where('provinces', $Provinces);
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllByCountryNameAndProvincesAndCollegeName($CountryName, $Provinces, $CollegeName)
    {
        $prp = "Chandigarh";
        $clg = "Hitbullseye";
        $this->db->from('tb_associate'); // final data ---------------
        // $this->db->where('assoc_address_country',$CountryName);
        $this->db->where('assoc_address_state', $prp);
        $this->db->where('assoc_instconame', $clg);
        $this->db->join('tb_assoccourses', 'tb_assoccourses.acourse_associd = tb_associate.assoc_id', 'right');
        $this->db->join('tb_courses', 'tb_courses.course_id = tb_assoccourses.acourse_courseid', 'right');
        $this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id = tb_associate.assoc_category', 'right');
        $query = $this->db->get();
        return $query->result_array();
    }
    // ABROAD REGISTRATION ------------------
    public function createUser($data)
    {
        $stureg_date = date("y-m-d");
        $datInsert = array('name' => $data['name'], 'dob' => $data['dob'], 'email' => $data['email'], 'phone' => $data['phone'], 'passportNo' => $data['passportNo'], 'city' => $data['city'], 'state' => $data['state'], 'work_exp' => $data['work_exp'], 'terms' => $data['terms'], 'ielts' => $data['ielts'], 'password' => md5($data['password']), 'desiredCountry' => $data['desiredCountry'], 'stureg_date' => $stureg_date,);
        $this->db->insert('tb_abroad_stua_reg', $datInsert);
        return  $this->db->insert_id();
    }

    public function newUserIeltsInfo($data)
    {
        $this->db->insert('tb_abroad_ieltsinfo',$data);
        return 200;
    }
    public function newuserEducationInfo($data)
    {
        $this->db->insert('tb_abroad_educationinfo',$data);
        return 200;
    }
    public function newuserWorkExp($data)
    {
        $this->db->insert('tb_abroad_workexp',$data);
        return 200;
    }
    public function validateUserEmail($email)
    {
        $this->db->from('tb_abroad_stua_reg');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 409;
        } else if ($query->num_rows() <= 0) {
            return 200;
        } else {
            return 404;
        }
    }
    // ABROAD REGISTRATION END ------------------
    public function userLogin($data)
    {
        $studEmail = $data['studEmail'];
        $studPassword = md5($data['studPassword']);
        $this->db->from('tb_abroad_stua_reg');
        $this->db->where('email', $studEmail);
        $this->db->where('password', $studPassword);
        $query = $this->db->get();
        // return $query->row();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getAbrodStudentAllData($id)
    {
        // $this->db->select('*');
        $id = 1;
        $this->db->from('tb_abroad_stua_reg');
        $this->db->where('tb_abroad_stua_reg.id', $id);
        $this->db->join('tb_abroad_ieltsinfo', 'tb_abroad_ieltsinfo.studentid = tb_abroad_stua_reg.id');
        $this->db->join('tb_abroad_educationinfo', 'tb_abroad_educationinfo.studentid = tb_abroad_stua_reg.id');
        $this->db->join('tb_abroad_workexp', 'tb_abroad_workexp.studentid = tb_abroad_stua_reg.id');
        $this->db->join('tb_abroad_stua_disform', 'tb_abroad_stua_disform.student_reg_id = tb_abroad_stua_reg.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function findUserById($userId)
    {
        $this->db->from('tb_abroad_stua_reg');
        $this->db->where('tb_abroad_stua_reg.id', $userId);
        $query = $this->db->get();
        return $query->row();
    }
    // ********************** SAVE DISCOUNT FORM ***********************
    public function newDisForm($data)
    {  
        $stureg_date = date("y-m-d");
        $dataInsert = array( 'student_reg_id' => $data['student_reg_id'],'clg_id' => $data['clg_id'],'clg_coursh_id' => $data['clg_coursh_id'],'stureg_course_name' => $data['stureg_course_name'],
        'student_name' => $data['student_name'],'student_email' => $data['student_email'],'student_phone' => $data['student_phone'],'apply_date' => $stureg_date,'coupon_code' => $data['coupon_code'],'coupon_value' => $data['coupon_value'],'otp' => $data['otp']);
        $this->db->insert('tb_abroad_stua_disform', $dataInsert);
        return  $this->db->insert_id();
    }
    public function newCntryForm($data){
        $Apply_date = date("y-m-d");
        $dataInsert = array('student_reg_id'=> $data['student_reg_id'],'student_name'=> $data['student_name'],'student_phone'=> $data['student_phone'],'student_email'=> $data['student_email'],'Apply_date'=> $Apply_date,'cntry_applyFor'=> $data['cntry_applyFor'],'coupon_code'=> $data['coupon_code'],'coupon_value'=> $data['coupon_value'],'otp'=> $data['otp'],);
        $this->db->insert('tb_abroad_offerltr',$dataInsert);
        return  $this->db->insert_id();
    }
    public function getUserformByID($form_stu_id)
    {
        $this->db->from('tb_abroad_stua_disform');
        $this->db->where('form_stu_id', $form_stu_id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getBycntryformId($cntry_form_id)
    {
        $this->db->from('tb_abroad_offerltr');
        $this->db->where('id', $cntry_form_id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getUserAllformByID($stuid)
    {
        $this->db->from('tb_abroad_stua_disform');
        $this->db->where('student_reg_id', $stuid);
        $query = $this->db->get();
        return $query->result();
    }
    public function getUserOfferLtrByID($stuid)
    {
        $this->db->from('tb_abroad_offerltr');
        $this->db->where('student_reg_id', $stuid);
        $query = $this->db->get();
        return $query->result();
    }
    public function getUserIELTSByID($id)
    {
        $this->db->from('tb_abroad_ieltsinfo');
        $this->db->where('studentid',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getUserEducationByID($idstu)
    {
        $this->db->from('tb_abroad_educationinfo');
        $this->db->where('studentid',$idstu);
        $query = $this->db->get();
        return $query->result();
    }
    public function getUserWorkByID($id)
    {
        $this->db->from('tb_abroad_workexp');
        $this->db->where('studentid',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function updateotpstatus($form_stu_id)
    {
        $status = array('otp_status' => 1);
        $this->db->where('form_stu_id', $form_stu_id);
        $this->db->update('tb_abroad_stua_disform', $status);
        return 200;
    }
    public function UpdateStuNo($id ,$NewMob)
    {
        $newno = array('phone' => $NewMob);
        $this->db->where('id', $id);
        $this->db->update('tb_abroad_stua_reg', $newno);
        return 200;
    }
    public function updatecntryotpstatus($cntry_form_id)
    {
        $status = array('otp_status' => 1);
        $this->db->where('id', $cntry_form_id);
        $this->db->update('tb_abroad_offerltr', $status);
        return 200;
    }
    public function updateOtp($otp, $stdyAbrodSutID, $form_stu_id){
        $this->db->from('tb_abroad_stua_disform');
        $this->db->where('student_reg_id', $stdyAbrodSutID);
        $this->db->where('form_stu_id', $form_stu_id);
        $this->db->update('otp', $otp);
        return 200;
    }
    function uploadDocsDB($image,$clgid){
        $data = array(
                'clg_img' => $image
            ); 
        $this->db->where('id', $clgid);
        $this->db->update('tb_abroad_college',$data);
        return 200;
    }
     function getabroadclg(){
        $this->db->from('tb_abroad_college');
        // $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
     }
     function getabroadclgByCntryCode($cntry){
        $this->db->from('tb_abroad_college');
        $this->db->where('clg_cuntry', $cntry);
        $query = $this->db->get();
        return $query->result();
     }
     function getabroadclgCousrh($id){
        $this->db->from('tb_abroada_coursh');
        $this->db->where('clgid', $id);
        // $this->db->limit(3);
        $query = $this->db->get();
        return $query->result_array();
     }
     function getBycoursh($id){
        $this->db->from('tb_abroada_coursh');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
     }
     function getALLcoursh($id){
        $this->db->from('tb_abroada_coursh');
        $this->db->where('clgid', $id);
        $query = $this->db->get();
        return $query->result();
     }
     function getallregStu(){
        $this->db->from('tb_abroad_stua_reg');
        $query = $this->db->get();
        return $query->result();
        
     }
     function addcntry($data){
        $dataInsert = array( 'cntry_name' => $data['cntry_name'],'cntry_code' => $data['cntry_code'],'ielts_requ' => $data['ielts_requ'],'twelth_per' => $data['twelth_per'],'twelth_gap_acceptable' => $data['twelth_gap_acceptable'],'twelth_Ielts_requirment' => $data['twelth_Ielts_requirment'],'twelth_funds' => $data['twelth_funds'],'graduation_per' => $data['graduation_per'],'graduation_gap_acceptable' => $data['graduation_gap_acceptable'],'graduation_Ielts_requirment' => $data['graduation_Ielts_requirment'],'graduation_funds' => $data['graduation_funds'],'masters_percentage' => $data['masters_percentage'],'masters_gap_acceptable' => $data['masters_gap_acceptable'],'masters_Ielts_requirment' => $data['masters_Ielts_requirment'],'masters_funds' => $data['masters_funds'],'spouse_qualification' => $data['spouse_qualification'],'spouse_percentage' => $data['spouse_percentage'],'spouse_gap_acceptable' => $data['spouse_gap_acceptable'],'spouse_age' => $data['spouse_age'],'spouse_marrige_time_period' => $data['spouse_marrige_time_period'],'spouse_Ielts_requirment' => $data['spouse_Ielts_requirment'],'spouse_funds' => $data['spouse_funds'],'spouse_intakes' => $data['spouse_intakes'],);
        $this->db->insert('tb_cntryeligibility', $dataInsert);
        return  200;
    }
     function AddNewAbroadCollege($data){
        $dataInsert = array( 'clg_name' => $data['clg_name'],'clg_addresh' => $data['clg_addresh'],'clg_cuntry' => $data['clg_cuntry'],);
        $this->db->insert('tb_abroad_college', $dataInsert);
        return 200;
    }
     function AddNewAbroadCoursh($data){
        $dataInsert = array( 'clgid' => $data['clgid'],'coursh' => $data['coursh'],'tutionfee' => $data['tutionfee'],'applicationfee' => $data['applicationfee'],);
        $this->db->insert('tb_abroada_coursh', $dataInsert);
        return 200;
    }
    public function getALLCountry()
    {
        $this->db->from('tb_countriesname');
        $query = $this->db->get(); // get all country
        return $query->result();
    }
    public function getCountryeligibl()
    { //first  popup data
        $this->db->from('tb_cntryeligibility');
        $query = $this->db->get();
        return $query->result();
    }
    public function delcntryeligiblity($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('tb_cntryeligibility');
		return $query;
	}
    public function delclg($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('tb_abroad_college');
		return $query;
	}
    public function delclgcoursh($id)
	{
		$this->db->where('clgid', $id);
		$query = $this->db->delete('tb_abroada_coursh');
		return $query;
	}
    public function getclgforfooter(){
        $this->db->from('tb_abroad_college');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }
}
