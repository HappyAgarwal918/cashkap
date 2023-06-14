<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');
class StudyAbroadController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'security', 'string', 'cookie'));
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
        $this->load->library(array('form_validation', 'session', 'user_agent', 'upload'));
        $this->load->model('StudyAbroadModel', 'stuAmod');
        $this->load->model('CommonModel', 'commod');
        $this->load->model('StudentModel', 'stumod');
        $this->load->model('WebpageModel', 'webmob');
        $this->load->database();
    }

    public function studyAbroadMain()
    {
        $result['siteTitle'] = "study/abroad";
        $result['CountryData'] = $this->stuAmod->getCountry();
        $result['instdata'] = $this->stuAmod->getabroadclg();
        // echo "<pre>";
        // print_r( $result['instdata']); die;
        // $this->session->set_userdata('stdyAbrodSutID', 5); // test   

        $this->load->view('website/study-abroad', $result);
    }
    public function AbrodStudentLogin()
    {
        $result['siteTitle'] = "abrod-student-login";
        $this->load->view('website/abrod-student-login', $result);
    }

    // ******************** AbrodStudentRegistration---------start *******************

    public function AbrodStudentRegistration()
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if ($stdyAbrodSutID) {
            redirect('study/abroad');
        }
        $result['dates'] =  $this->stumod->date(); 
		$result['months'] =  $this->stumod->Month(); 
		$result['years'] =  $this->stumod->year();
        $result['siteTitle'] = "abroad-student-registration";
        $result['statedata'] = $this->commod->getAllState();
        $result['CountryData'] = $this->stuAmod->getCountry();
        $this->load->view('website/abrod-student-registration', $result);
    }

    public function abrodSubmitNewUserRegistration()
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if ($stdyAbrodSutID) {
            redirect('study/abroad');
        }
        $ielts = $this->input->post('ielts');
        $workexe = $this->input->post('workexe');
        $email = $this->input->post('email');
        $stureg_date = $this->input->post('stureg_date');
        $stureg_month = $this->input->post('stureg_month');
        $stureg_year = $this->input->post('stureg_year');
        $emailStatus = $this->stuAmod->validateUserEmail($email);

        if ($emailStatus == 409) {
            echo 409;
            return false;
        } else if ($emailStatus == 200) {
            $userinfo = array(
                'name' => $this->input->post('fullname'),
                'dob' => $stureg_date."-".$stureg_month."-".$stureg_year,
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'passportNo' => $this->input->post('passport'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'password' => $this->input->post('password'),
                'desiredCountry' => $this->input->post('desiredCountry'),
                'ielts' => $this->input->post('ielts'),
                'work_exp' => $this->input->post('workexe'),
                'terms' => $this->input->post('terms'),

            );
            $id = $this->stuAmod->createUser($userinfo);
            $this->session->set_userdata('stdyAbrodSutID', $id);
            if (!empty($id)) {
                if ($ielts == 'YES') {
                    $test = $this->input->post('test');
                    $testDate = $this->input->post('test-date');
                    $listening = $this->input->post('listening');
                    $writing = $this->input->post('writing');
                    $reading = $this->input->post('reading');
                    $speking = $this->input->post('speking');
                    $totalScore = $this->input->post('total-score');

                    foreach ($test as $key => $value) {

                        $userIeltsInfo['studentid'] = $id;
                        $userIeltsInfo['test'] = $value;
                        $userIeltsInfo['testDate'] = $testDate[$key];
                        $userIeltsInfo['listening'] = $listening[$key];
                        $userIeltsInfo['writing'] = $writing[$key];
                        $userIeltsInfo['reading'] = $reading[$key];
                        $userIeltsInfo['speking'] = $speking[$key];
                        $userIeltsInfo['totalScore'] = $totalScore[$key];
                        $this->stuAmod->newUserIeltsInfo($userIeltsInfo);
                    }
                }
                $class = $this->input->post('level');
                $yearOfPassing = $this->input->post('yearOfPassing');
                $stream = $this->input->post('stream');
                $bord = $this->input->post('bord');
                $english = $this->input->post('english');
                $maths = $this->input->post('maths');
                foreach ($class as $key => $value) {
                    $userEducationInfo['studentid'] = $id;
                    $userEducationInfo['class'] = $value;
                    $userEducationInfo['yearOfPassing'] = $yearOfPassing[$key];
                    $userEducationInfo['bord'] = $bord[$key];
                    $userEducationInfo['english'] = $english[$key];
                    $userEducationInfo['maths'] = $maths[$key];
                    $userEducationInfo['stream'] = $stream[$key];
                    // $userEducationInfo['totalScore'] = $totalScore[$key];
                    $this->stuAmod->newuserEducationInfo($userEducationInfo);
                }
                // $userWorkExp
                if ($workexe == 'YES') {
                    $companyName = $this->input->post('companyName');
                    $designation = $this->input->post('designation');
                    $timePeriod = $this->input->post('time-period');
                    $salary = $this->input->post('salary');
                    $jobDescription = $this->input->post('job-description');

                    foreach ($companyName as $key => $value) {
                        $userWorkExp['studentid'] = $id;
                        $userWorkExp['companyName'] = $value;
                        $userWorkExp['designation'] = $designation[$key];
                        $userWorkExp['timePeriod'] = $timePeriod[$key];
                        $userWorkExp['salary'] = $salary[$key];
                        $userWorkExp['jobDescription'] = $jobDescription[$key];
                        $this->stuAmod->newuserWorkExp($userWorkExp);
                    }
                }
            }
            echo 200;
        }
    }

    // ******************** AbrodStudentRegistration--------end*******************
    public function abrodSubmitNewUserLogin()
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if ($stdyAbrodSutID) {
            redirect('study/abroad');
        }
        $data['studEmail'] = $this->input->post('studEmail');
        $data['studPassword'] = $this->input->post('studPassword');

        $res = $this->stuAmod->userLogin($data);
        if ($res->id) {
            $id = $res->id;
            $this->session->set_userdata('stdyAbrodSutID', $id);
            echo 200;
        }
    }
    public function getAbrodStudentData()
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if (!empty($stdyAbrodSutID)) {
            $data = $this->stuAmod->getAbrodStudentAllData($stdyAbrodSutID);
            print_r($data);
        } else {
            redirect('abroad-student-registration');
        }
    }

    public function studyAbroadMainProvincesList()
    {
        $countryCode = $this->input->post('country_code');
        echo $this->stuAmod->getProvinces($countryCode);
    }
    //************************ ABROAD DASHBORD ******************
    public function abradStudentDashbord()
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if ($stdyAbrodSutID) {
            $result['studentinfo'] = $this->stuAmod->findUserById($stdyAbrodSutID);
            $result['studentform'] = $this->stuAmod->getUserAllformByID($stdyAbrodSutID);
            $result['studentILTS'] = $this->stuAmod->getUserIELTSByID($stdyAbrodSutID);
            $result['studenteducation'] = $this->stuAmod->getUserEducationByID($stdyAbrodSutID);
            $result['studentexp'] = $this->stuAmod->getUserWorkByID($stdyAbrodSutID);
            $result['offerLtr'] = $this->stuAmod->getUserOfferLtrByID($stdyAbrodSutID);
            $this->load->view('website/abroad-student-dashbord', $result);
        } else {
            redirect('abroad-student-registration');
        }
    }

    public function studyAbroadMainClgUniList()
    {
        $countryCode = $this->input->post('country_code');
        $clgData = $this->stuAmod->getcollegeuniversity($countryCode);
        echo json_encode($clgData);
    }
    public function Countrychecklist()
    {
        $countryCode = $this->input->post('country_code');
        $data = $this->stuAmod->getBYCountryName($countryCode);
        echo json_encode($data);
    }
    public function eligibility($cnty)
    {   
        $result['cantrydata'] = $this->stuAmod->getBYCountryCode($cnty);
        // print_r($data) ; die;
			$this->load->view('website/country-eligiblity',$result);
    }
    public function AbroadclgPage($cnty)
    {  
        //  echo $cnty; die;
        
        if($cnty == 1){
            $result['AbroadClg'] = $this->stuAmod->getabroadclg();

        }else{
            $result['AbroadClg'] = $this->stuAmod->getabroadclgByCntryCode($cnty);

        }

			$this->load->view('website/abroad-collage-listing',$result);
    }
    public function CountryProvinceschecklist()
    {
        $countryCode = $this->input->post('country_code');
        $Provinces = $this->input->post('Provincesname');
        $data = $this->stuAmod->getAllByCountryNameAndProvinces($countryCode, $Provinces);
        $i = 1;
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row->ielts_requirement . "</td>";
            echo "<td>" . $row->bands_requirement . "</td>";
            echo "<td>" . $row->after_degrree_bands_requ . "</td>";
            echo "<td>" . $row->twelfth_score . "</td>";
            echo "<td>" . $row->degree_score . "</td>";
            echo "<td>" . $row->gap_eligiblity . "</td>";
            echo "<td>" . $row->intakes . "</td>";
            echo "</tr>";
            $i++;
        }
    }
    public function searchData()
    {
        $countryCode = $this->input->post('country_code');
        $Provinces = $this->input->post('Provincesname');
        $college = $this->input->post('college_name');
        $data = $this->stuAmod->getAllByCountryNameAndProvincesAndCollegeName($countryCode, $Provinces, $college);

        $result = array();
        $result['Information'] = array(
            "assoccat_title" => $data[0]['assoccat_title'],
            "assoc_instconame" => $data[0]['assoc_instconame'],
            "assoc_establishyear" => $data[0]['assoc_establishyear'],
            "assoc_consarea" => $data[0]['assoc_consarea'],
            "assoc_classmode" => $data[0]['assoc_classmode'],
            "assoc_googlerate" => $data[0]['assoc_googlerate'],
            "assoc_stustrength" => $data[0]['assoc_stustrength'],
            "assoc_address_line1" => $data[0]['assoc_address_line1'],
            "assoc_address_line2" => $data[0]['assoc_address_line2'],
            "assoc_address_landmark" => $data[0]['assoc_address_landmark'],
            "assoc_email" => $data[0]['assoc_email'],
            "assoc_address_landmark" => $data[0]['assoc_address_landmark'],
            "assoc_facility" => $data[0]['assoc_facility'],
        );
        $result['aboutUs'] = array(
            "associate_about" => $data[0]['associate_about'],
        );
        $result['gallery'] = array(
            "assoc_featuredimg" => base_url() . $data[0]['assoc_featuredimg'],
        );
        foreach ($data as $row) {
            $result['course'][] = array(
                "course_name" => $row['course_name'],
                'acourse_duration' => $row['acourse_duration'],
                'acourse_totalseats' => $row['acourse_totalseats'],
                'acourse_coursefee' => $row['acourse_coursefee'],
                'url' => base_url() . 'abroad-apply/' . $this->encryptcode->encrypt($row['assoc_id'], ENC_KEY_PASS) . '/' . $row['acourse_id'] . '/' . $this->encryptcode->encrypt($row['course_name'], ENC_KEY_PASS),
            );
        }

        echo json_encode($result);
    }
    public function updateUserMob(){
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        $NewMob = $this->input->post('NewMob');
        if(empty($stdyAbrodSutID)){
            redirect('abroad-student-registration');
        } else{
            $data = $this->stuAmod->UpdateStuNo($stdyAbrodSutID, $NewMob);
        echo json_encode($data);
        }        
    }
    public function AbroadAboutus(){
        $arr['siteTitle'] = "About us | Cashkap";
		$arr['description'] = 'Cashkap is a platform where students can find the best and reputed schools, colleges, Universities, and coaching institutes according to their city. Apply online to any educational institute and save money by getting 5-10% cashback on fees.';
		$arr['statedata'] = $this->commod->getAllStateSearch();
		$arr['citydata'] = $this->commod->getAllCitySearch();
		$arr['collegedata'] = $this->webmob->getAllFeaturedCollege();
		$arr['univdata'] = $this->webmob->getAllFeaturedUniversities();
		$arr['schooldata'] = $this->webmob->getAllFeaturedSchools();
		$arr['instdata'] = $this->webmob->getAllFeaturedInstitutes();

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('state', 'State', 'trim|required', array(
			'required' => 'State required'
		));
		$this->form_validation->set_rules('city', 'City', 'trim|required', array(
			'required' => 'City required'
		));
		$this->form_validation->set_rules('course_id', 'Course', 'trim|required', array(
			'required' => 'Choose course from list only'
		));
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			$state = $data['state'];
			$city = $data['city'];
			$course_id = $data['course_id'];
			$search_term = $state . "|" . $city . "|" . $course_id;
			$enc_searchterm = $this->encryptcode->encrypt($search_term, ENC_KEY_PASS);
			redirect("search/$enc_searchterm");
		} else {

			$this->load->view('website/abroad-about', $arr);
		}
    }
    public function AbroadContactus(){
        $this->load->view('website/abroad-contact');
    }
    //  ********************* abrod aply for cntry ***************
    public function Applyforcntry($cntry)
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if (empty($stdyAbrodSutID)) {
            redirect('abroad-student-registration');
        }
        $data = $this->stuAmod->findUserById($stdyAbrodSutID);
        $data2['student_reg_id'] = $stdyAbrodSutID;
        $data2['student_name'] = $data->name;
        $data2['student_phone'] = $data->phone;
        $data2['student_email'] = $data->email;
        $data2['cntry_applyFor'] = $cntry;
        $codedate = date('ydm');
        $codeno = random_string('nozero', 3);
        $codechar = strtoupper(random_string('alpha', 4));
        $coupon = $codechar . "" . $codeno . $codedate;
        $data2['coupon_code'] = $coupon;
        $data2['coupon_value'] = 20;
        $otp = random_string('nozero', 6);
        $data2['otp'] = $otp;
        $cntry_form_id = $this->stuAmod->newCntryForm($data2);
        $this->session->set_userdata('cntry_form_id', $cntry_form_id);
        $this->session->set_userdata('AAA', 2);
        redirect("study-abroad-sendOTP");
    }
    // ***************************** ABROAD AFTER APPLY ******************************
    public function abroadApllyNow($courId)
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if (empty($stdyAbrodSutID)) {
            redirect('abroad-student-registration');
        }
        $courshData = $this->stuAmod->getBycoursh($courId);
        $data = $this->stuAmod->findUserById($stdyAbrodSutID);
        $data2['clg_id'] = $courshData->clgid;
        $data2['clg_coursh_id'] = $courshData->id;
        $data2['stureg_course_name'] = $courshData->coursh;
        $data2['student_reg_id'] = $stdyAbrodSutID;
        $data2['student_name'] = $data->name;
        $data2['student_phone'] = $data->phone;
        $data2['student_email'] = $data->email;
        $codedate = date('ydm');
        $codeno = random_string('nozero', 3);
        $codechar = strtoupper(random_string('alpha', 4));
        $coupon = $codechar . "" . $codeno . $codedate;
        $data2['coupon_code'] = $coupon;
        $data2['coupon_value'] = 20;
        $stuphoneNum = $data->phone;
        // $otp = random_string('nozero', 6);
        $data2['otp'] = random_string('nozero', 6);;
        // **************** DATA SAVE *****************
        $form_stu_id = $this->stuAmod->newDisForm($data2);
        $this->session->set_userdata('stu_courshID', $form_stu_id);
        $this->session->set_userdata('AAA', 1);
        redirect("study-abroad-sendOTP");
    }

    public function sendOTP()
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if (empty($stdyAbrodSutID)) {
            redirect('abroad-student-registration');
        }
        $data = $this->stuAmod->findUserById($stdyAbrodSutID);
        $phoneNo =  $data->phone;
        $AAA = $this->session->userdata('AAA');
        if ($AAA == 1 || $AAA == "1") {
            $form_stu_id = $this->session->userdata('stu_courshID');
            $newUserFormData = $this->stuAmod->getUserformByID($form_stu_id);
            $otp = $newUserFormData->otp;
        } else if ($AAA == 2 || $AAA == "2") {
            $cntry_form_id = $this->session->userdata('cntry_form_id');
            $cntryFormData = $this->stuAmod->getBycntryformId($cntry_form_id);
            $otp = $cntryFormData->otp;
        } else {
            redirect('abroad-student-registration');
        }
        $sms_text = "$otp is your verification code. BRAINY";
        $sms_text_final = urlencode($sms_text);
        $url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $phoneNo . "&message=$sms_text_final&format=json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $result['phoneNo'] = $phoneNo;
        $this->load->view('website/study-abroad-otpverification', $result);
    }
    public function verifyOTP()
    {
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');

        if (empty($stdyAbrodSutID)) {
            redirect('abroad-student-registration');
        }

        $AAA = $this->session->userdata('AAA');
        $enterOTP = $this->input->post('otp');
        if ($AAA == 1 || $AAA == "1") {
            $form_stu_id = $this->session->userdata('stu_courshID');
            if ($form_stu_id) {
                $newUserFormData = $this->stuAmod->getUserformByID($form_stu_id);
                if ($newUserFormData->otp == $enterOTP) {
                    $rec = $this->stuAmod->updateotpstatus($form_stu_id);
                    if ($rec == 200) {
                        echo 200;
                    }
                } else {
                    echo 404;
                }
            }
        } else if ($AAA == 2 || $AAA == "2") {
            $cntry_form_id = $this->session->userdata('cntry_form_id');

            $cntryFormData = $this->stuAmod->getBycntryformId($cntry_form_id);

            if ($cntryFormData->otp == $enterOTP) {
                $rec = $this->stuAmod->updatecntryotpstatus($cntry_form_id);
                if ($rec == 200) {
                    echo 200;
                }
            } else {
                echo 404;
            }
        } else {
            redirect('abroad-student-registration');
        }


        // echo $enterOTP;
    }
    public function AbroadReSendOTP()
    {
        $form_stu_id = $this->session->userdata('stu_courshID');
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if (empty($stdyAbrodSutID)) {
            redirect('abroad-student-registration');
        }
        $data = $this->stuAmod->getRegisteruserFormData($stdyAbrodSutID, $form_stu_id);
        $stuphone = $data->student_phone;
        $otp = random_string('nozero', 6);
        $sms_text = "$otp is your verification code. BRAINY";
        $sms_text_final = urlencode($sms_text);
        $url = "http://world.masssms.tk/V2/http-api.php?apikey=" . SMS_APIKEY . "&senderid=" . SMS_SENDER_ID . "&number=" . $stuphone . "&message=$sms_text_final&format=json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $this->stuAmod->updateOtp($otp, $stdyAbrodSutID, $form_stu_id);
    }
    public function Abroadstudent_logout()
    {
        $arr['siteTitle'] = 'Student Logout';
        $this->session->sess_destroy();
        redirect('abrod-student-login');
    }
    public function submitOfferLettar()
    {
        $form_stu_id = $this->session->userdata('stu_courshID');
        $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
        if (empty($stdyAbrodSutID)) {
            redirect('abroad-student-registration');
        }
        $result['UserData'] = $this->stuAmod->findUserById($stdyAbrodSutID);
        $result['newUserFormData'] = $this->stuAmod->getUserformByID($form_stu_id);
        $this->load->view('website/submit-offer-letter', $result);
    }
   
    public function getCourshData()
    {
        $dataID = $this->input->post('dataid');
        $courshData = $this->stuAmod->getabroadclgCousrh($dataID);
        $result['coursh'] = $courshData;
        echo json_encode($result);
    }
    // *******************admin******************
    public function getAllNewApplication()
    {
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $result['allSudent'] = $this->stuAmod->getallregStu();
        $this->load->view('master/applyed-users', $result);
    }
    public function addNewcountry()
    {
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $cntrform = array(
            'cntry_name' => $this->input->post('cntry_name'),
            'cntry_code' => $this->input->post('cntry_code'),
            'ielts_requ' => $this->input->post('ielts_requ'),
            'twelth_per' => $this->input->post('twelth_per'),
            'twelth_gap_acceptable' => $this->input->post('twelth_gap_acceptable'),
            'twelth_Ielts_requirment' => $this->input->post('twelth_Ielts_requirment'),
            'twelth_funds' => $this->input->post('twelth_funds'),
            'graduation_per' => $this->input->post('graduation_per'),
            'graduation_gap_acceptable' => $this->input->post('graduation_gap_acceptable'),
            'graduation_Ielts_requirment' => $this->input->post('graduation_Ielts_requirment'),
            'graduation_funds' => $this->input->post('graduation_funds'),
            'masters_percentage' => $this->input->post('masters_percentage'),
            'masters_gap_acceptable' => $this->input->post('masters_gap_acceptable'),
            'masters_Ielts_requirment' => $this->input->post('masters_Ielts_requirment'),
            'masters_funds' => $this->input->post('masters_funds'),
            'spouse_qualification' => $this->input->post('spouse_qualification'),
            'spouse_percentage' => $this->input->post('spouse_percentage'),
            'spouse_gap_acceptable' => $this->input->post('spouse_gap_acceptable'),
            'spouse_age' => $this->input->post('spouse_age'),
            'spouse_marrige_time_period' => $this->input->post('spouse_marrige_time_period'),
            'spouse_Ielts_requirment' => $this->input->post('spouse_Ielts_requirment'),
            'spouse_funds' => $this->input->post('spouse_funds'),
            'spouse_intakes	' => $this->input->post('spouse_intakes'),

        );
        $result = $this->stuAmod->addcntry($cntrform);
        echo json_encode($result);
    }
    public function viewUser($id)
    {
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        // $id = 5;
        if ($id) {
            $result['studentinfo'] = $this->stuAmod->findUserById($id);
            $result['studentform'] = $this->stuAmod->getUserAllformByID($id);
            $result['studentILTS'] = $this->stuAmod->getUserIELTSByID($id);
            $result['studenteducation'] = $this->stuAmod->getUserEducationByID($id);
            $result['studentexp'] = $this->stuAmod->getUserWorkByID($id);
            $result['offerLtr'] = $this->stuAmod->getUserOfferLtrByID($id);
            $this->load->view('master/view-user', $result);
        }
    }
    public function getaalclg(){
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $result['clginfo'] = $this->stuAmod->getabroadclg();
        $this->load->view('master/collage-data', $result);

    }
    public function PageAddNewCollege(){
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $result['CountryData'] = $this->stuAmod->getALLCountry();

        $this->load->view('master/add-new-collage',$result);

    }
    public function AddNewCollege(){
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $collegData = array(
            'clg_name' => $this->input->post('clg_name'),
            'clg_addresh' => $this->input->post('clg_addresh'),
            'clg_cuntry' => $this->input->post('clg_cuntry'),
        );
        
        $result = $this->stuAmod->AddNewAbroadCollege($collegData);
        echo $result;

    }
    public function AddNewCoursh(){
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $collegData = array(
            'coursh' => $this->input->post('coursh'),
            'tutionfee' => $this->input->post('tutionfee'),
            'applicationfee' => $this->input->post('applicationfee'),
            'clgid' => $this->input->post('cllgid'),
        );
        
        $result = $this->stuAmod->AddNewAbroadCoursh($collegData);
        echo $result;

    }
    public function collegesCourshDetails($id){
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $result['clgcourshinfo'] = $this->stuAmod->getALLcoursh($id);
        $result['clgid'] = $id;
        $this->load->view('master/collage-coursh-data',$result);

    }
    public function imgUploadpage($collegeid){
        $result['collegeid'] =$collegeid;
        $this->load->view('master/change-collage-photo',$result);
    }
    public function uploadDocs()
    {
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $this->load->helper('file');
        // echo var_dump(is_dir('./assets/website/images/studentDocs'));
        $clg_id =
        $config['upload_path'] = './assets/website/images/clgImg';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2000;
        $config['file_name'] = time() . '_'.date("y-m-d");
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
             $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data']['file_name'];
            $id = $this->input->post('clgid');
            $result = $this->stuAmod->uploadDocsDB($image, $id);
             echo $result;
        }
    }
    public function cntyeligiblty(){
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
        $result['eligiblity'] = $this->stuAmod->getCountryeligibl();
        $result['CountryData'] = $this->stuAmod->getALLCountry();
        $this->load->view('master/country-eligiblity-page',$result);

    }
    public function deletecntryeligiblity($id){
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
         $this->stuAmod->delcntryeligiblity($id);
        redirect('master/abroad/country/eligiblity');
    }
    public function deletecollege($id){
        $masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
         $this->stuAmod->delclg($id);
         $this->stuAmod->delclgcoursh($id);
        redirect('master/abroad/all/colleges');
    }

    public function test($id)
    {
        // $id = 1;
        // if ($id) {
        //     $result['studentinfo'] = $this->stuAmod->findUserById($id);
        //     $result['studentform'] = $this->stuAmod->getUserAllformByID($id);
        //     $result['studentILTS'] = $this->stuAmod->getUserIELTSByID($id);
        //     $result['studenteducation'] = $this->stuAmod->getUserEducationByID($id);
        //     $result['studentexp'] = $this->stuAmod->getUserWorkByID($id);
        //     $result['offerLtr'] = $this->stuAmod->getUserOfferLtrByID($id);
        //     $this->load->view('master/view-user', $result);
        // }
    }
}
