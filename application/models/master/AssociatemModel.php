<?php
class AssociatemModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAllAssociatePend()
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_status', 0);
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->order_by('assoc_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllAssociate()
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_status', 1);
		$this->db->or_where('assoc_status', 1);
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->order_by('assoc_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerAssociate($assoc_id)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_id', $assoc_id);
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->order_by('assoc_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function upAssocApStatus($data, $assoc_id)
	{
		$slug = strtolower($data['assoc_slug']);
		$dataUpdate = array('assoc_slug' => $slug, 'assoc_status' => $data['assoc_status'], 'assoc_discount' => $data['assoc_discount'], 'assoc_featured' => $data['assoc_featured']);
		$this->db->where('assoc_id', $assoc_id);
		$query = $this->db->update('tb_associate', $dataUpdate);
		return $query;
	}
	public function chkAssocSlug($assoc_slug)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_slug', $assoc_slug);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getPerAssocPhotos($assocph_associd)
	{
		$this->db->from('tb_assocgallery');
		$this->db->where('assocph_associd', $assocph_associd);
		$query = $this->db->get();
		return $query->result();
	}
	public function delAssocPerPhoto($assocph_id)
	{
		$this->db->where('assocph_id', $assocph_id);
		$query = $this->db->delete('tb_assocgallery');
		return $query;
	}
	public function delAssocCourses($acourse_associd)
	{
		$this->db->where('acourse_associd', $acourse_associd);
		$query = $this->db->delete('tb_assoccourses');
		return $query;
	}
	public function delPerAssoc($assoc_id)
	{
		$this->db->where('assoc_id', $assoc_id);
		$query = $this->db->delete('tb_associate');
		return $query;
	}
	public function getPerAssocStudents($stuco_associd)
	{
		$this->db->from('tb_studisform');
		$this->db->where('stuco_associd', $stuco_associd);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_studisform.stuco_course', 'left');
		$this->db->join('tb_studentreg', 'tb_studentreg.stureg_id=tb_studisform.stuco_regid', 'left');
		$this->db->order_by('stuco_date', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerAssocCourses($acourse_associd)
	{
		$this->db->from('tb_assoccourses');
		$this->db->where('acourse_associd', $acourse_associd);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_assoccourses.acourse_courseid', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function insAssociateCourse($data, $assocsesid)
	{
		$acourse_lastdate = date("Y-m-d");
		$dataInsert = array('acourse_associd' => $assocsesid, 'acourse_courseid' => $data['acourse_courseid'], 'acourse_duration' => $data['acourse_duration'], 'acourse_totalseats' => $data['acourse_totalseats'], 'acourse_coursefee' => $data['acourse_coursefee'], 'acourse_lastdate' => $data['acourse_lastdate']);
		return $this->db->insert('tb_assoccourses', $dataInsert);
	}
	public function getAssocPerCourse($acourse_id)
	{
		$this->db->from('tb_assoccourses');
		$this->db->where('acourse_id', $acourse_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function upAssociateCourse($data, $acourse_id)
	{
		$dataUpdate = array('acourse_duration' => $data['acourse_duration'], 'acourse_totalseats' => $data['acourse_totalseats'], 'acourse_coursefee' => $data['acourse_coursefee'], 'acourse_lastdate' => $data['acourse_lastdate']);
		$this->db->where('acourse_id', $acourse_id);
		$query = $this->db->update('tb_assoccourses', $dataUpdate);
		return $query;
	}
	public function delAssocPerCourse($assoc_id, $acourse_id)
	{
		$this->db->where('acourse_associd', $assoc_id);
		$this->db->where('acourse_id', $acourse_id);
		$query = $this->db->delete('tb_assoccourses');
		return $query;
	}
	public function upAssociateData($data, $assoc_category, $assoc_id)
	{
		$assoc_regdate = date("y-m-d");
		if ($assoc_category == 1 || $assoc_category == 2) {
			$dataUpdate = array('assoc_subcat' => $data['assoc_subcat'], 'assoc_instconame' => $data['assoc_instconame'], 'assoc_totalarea' => $data['assoc_totalarea'], 'assoc_consarea' => $data['assoc_consarea'], 'assoc_affibody' => $data['assoc_affibody'], 'assoc_edurank' => $data['assoc_edurank'], 'assoc_noteacher_graduate' => $data['assoc_noteacher_graduate'], 'assoc_noteacher_masters' => $data['assoc_noteacher_masters'], 'assoc_noteacher_phd' => $data['assoc_noteacher_phd'], 'assoc_lastses_nostudent' => $data['assoc_lastses_nostudent'], 'assoc_lastses_placement' => $data['assoc_lastses_placement'], 'assoc_placement_loc' => $data['assoc_placement_loc'], 'assoc_achievements' => $data['assoc_achievements'], 'assoc_cocuriactivity' => $data['assoc_cocuriactivity'], 'assoc_amenities' => $data['assoc_amenities'], 'assoc_facility' => $data['assoc_facility'], 'assoc_address_line1' => $data['assoc_address_line1'], 'assoc_address_line2' => $data['assoc_address_line2'], 'assoc_address_city' => $data['assoc_address_city'], 'assoc_address_state' => $data['assoc_address_state'], 'assoc_address_country' => $data['assoc_address_country'], 'assoc_address_pin' => $data['assoc_address_pin'], 'assoc_address_landmark' => $data['assoc_address_landmark'], 'assoc_contactno' => $data['assoc_contactno'], 'assoc_email' => $data['assoc_email'], 'assoc_contactname' => $data['assoc_contactname'], 'assoc_designation' => $data['assoc_designation'], 'assoc_username' => $data['assoc_username'], 'assoc_password' => md5($data['assoc_password']), 'associate_about' => $data['associate_about'], 'assoc_social_facebook' => $data['assoc_social_facebook'], 'assoc_social_instagram' => $data['assoc_social_instagram'], 'assoc_social_twitter' => $data['assoc_social_twitter'], 'assoc_social_website' => $data['assoc_social_website'], 'assoc_lastsesresult' => $data['assoc_lastsesresult'], 'assoc_noteacher' => $data['assoc_noteacher']);
		} elseif ($assoc_category == 3) {
			$dataUpdate = array('assoc_subcat' => $data['assoc_subcat'], 'assoc_instconame' => $data['assoc_instconame'], 'assoc_consarea' => $data['assoc_consarea'], 'assoc_affibody' => $data['assoc_affibody'], 'assoc_edurank' => $data['assoc_edurank'], 'assoc_noteacher' => $data['assoc_noteacher'], 'assoc_lastsesresult' => $data['assoc_lastsesresult'], 'assoc_lastsesnostudent' => $data['assoc_lastsesnostudent'], 'assoc_achievements' => $data['assoc_achievements'], 'assoc_cocuriactivity' => $data['assoc_cocuriactivity'], 'assoc_facility' => $data['assoc_facility'], 'assoc_address_line1' => $data['assoc_address_line1'], 'assoc_address_line2' => $data['assoc_address_line2'], 'assoc_address_city' => $data['assoc_address_city'], 'assoc_address_state' => $data['assoc_address_state'], 'assoc_address_country' => $data['assoc_address_country'], 'assoc_address_pin' => $data['assoc_address_pin'], 'assoc_address_landmark' => $data['assoc_address_landmark'], 'assoc_contactno' => $data['assoc_contactno'], 'assoc_email' => $data['assoc_email'], 'assoc_contactname' => $data['assoc_contactname'], 'assoc_designation' => $data['assoc_designation'], 'assoc_username' => $data['assoc_username'], 'assoc_password' => md5($data['assoc_password']), 'associate_about' => $data['associate_about'], 'assoc_social_facebook' => $data['assoc_social_facebook'], 'assoc_social_instagram' => $data['assoc_social_instagram'], 'assoc_social_twitter' => $data['assoc_social_twitter'], 'assoc_social_website' => $data['assoc_social_website']);
		} elseif ($assoc_category == 4) {
			if ($data['assoc_subcat'] != 8) {
				$dataUpdate = array('assoc_subcat' => $data['assoc_subcat'], 'assoc_establishyear' => $data['assoc_establishyear'], 'assoc_instconame' => $data['assoc_instconame'], 'assoc_consarea' => $data['assoc_consarea'], 'assoc_noteacher' => $data['assoc_noteacher'], 'assoc_lastsesresult' => $data['assoc_lastsesresult'], 'assoc_facility' => $data['assoc_facility'], 'assoc_address_line1' => $data['assoc_address_line1'], 'assoc_address_line2' => $data['assoc_address_line2'], 'assoc_address_city' => $data['assoc_address_city'], 'assoc_address_state' => $data['assoc_address_state'], 'assoc_address_country' => $data['assoc_address_country'], 'assoc_address_pin' => $data['assoc_address_pin'], 'assoc_address_landmark' => $data['assoc_address_landmark'], 'assoc_contactno' => $data['assoc_contactno'], 'assoc_email' => $data['assoc_email'], 'assoc_contactname' => $data['assoc_contactname'], 'assoc_designation' => $data['assoc_designation'], 'assoc_username' => $data['assoc_username'], 'assoc_password' => md5($data['assoc_password']), 'assoc_regdate' => $assoc_regdate, 'assoc_classmode' => $data['assoc_classmode'], 'assoc_stustrength' => $data['assoc_stustrength'], 'assoc_googlerate' => $data['assoc_googlerate'], 'associate_about' => $data['associate_about'], 'assoc_social_facebook' => $data['assoc_social_facebook'], 'assoc_social_instagram' => $data['assoc_social_instagram'], 'assoc_social_twitter' => $data['assoc_social_twitter'], 'assoc_social_website' => $data['assoc_social_website']);
			} else {
				$dataUpdate = array('assoc_subcat' => $data['assoc_subcat'], 'assoc_establishyear' => $data['assoc_establishyear'], 'assoc_instconame' => $data['assoc_instconame'], 'assoc_consarea' => $data['assoc_consarea'], 'assoc_noteacher' => $data['assoc_noteacher'], 'assoc_lastsesresult' => $data['assoc_lastsesresult'], 'assoc_facility' => $data['assoc_facility'], 'assoc_address_line1' => $data['assoc_address_line1'], 'assoc_address_line2' => $data['assoc_address_line2'], 'assoc_address_city' => $data['assoc_address_city'], 'assoc_address_state' => $data['assoc_address_state'], 'assoc_address_country' => $data['assoc_address_country'], 'assoc_address_pin' => $data['assoc_address_pin'], 'assoc_address_landmark' => $data['assoc_address_landmark'], 'assoc_contactno' => $data['assoc_contactno'], 'assoc_email' => $data['assoc_email'], 'assoc_contactname' => $data['assoc_contactname'], 'assoc_designation' => $data['assoc_designation'], 'assoc_username' => $data['assoc_username'], 'assoc_password' => md5($data['assoc_password']), 'assoc_classmode' => $data['assoc_classmode'], 'assoc_stustrength' => $data['assoc_stustrength'], 'assoc_classmode' => $data['assoc_classmode'], 'assoc_stustrength' => $data['assoc_stustrength'], 'assoc_googlerate' => $data['assoc_googlerate'], 'assoc_bestscorelastses' => $data['assoc_bestscorelastses'], 'assoc_staffscore56' => $data['assoc_staffscore56'], 'assoc_staffscore67' => $data['assoc_staffscore67'], 'assoc_staffscore78' => $data['assoc_staffscore78'], 'assoc_staffquali_twe' => $data['assoc_staffquali_twe'], 'assoc_staffquali_diploma' => $data['assoc_staffquali_diploma'], 'assoc_noteacher_graduate' => $data['assoc_staffquali_graduation'], 'assoc_noteacher_masters' => $data['assoc_staffquali_masters'], 'assoc_noteacher_phd' => $data['assoc_staffquali_phd'], 'associate_about' => $data['associate_about'], 'assoc_social_facebook' => $data['assoc_social_facebook'], 'assoc_social_instagram' => $data['assoc_social_instagram'], 'assoc_social_twitter' => $data['assoc_social_twitter'], 'assoc_social_website' => $data['assoc_social_website']);
			}
		} elseif ($assoc_category == 5) {
			$dataUpdate = array('assoc_subcat' => $data['assoc_subcat'], 'assoc_instconame' => $data['assoc_instconame'], 'assoc_noteacher' => $data['assoc_noteacher'], 'assoc_facility' => $data['assoc_facility'], 'assoc_address_line1' => $data['assoc_address_line1'], 'assoc_address_line2' => $data['assoc_address_line2'], 'assoc_address_city' => $data['assoc_address_city'], 'assoc_address_state' => $data['assoc_address_state'], 'assoc_address_country' => $data['assoc_address_country'], 'assoc_address_pin' => $data['assoc_address_pin'], 'assoc_address_landmark' => $data['assoc_address_landmark'], 'assoc_contactno' => $data['assoc_contactno'], 'assoc_email' => $data['assoc_email'], 'assoc_contactname' => $data['assoc_contactname'], 'assoc_designation' => $data['assoc_designation'], 'assoc_username' => $data['assoc_username'], 'assoc_password' => md5($data['assoc_password']), 'associate_about' => $data['associate_about'], 'assoc_social_facebook' => $data['assoc_social_facebook'], 'assoc_social_instagram' => $data['assoc_social_instagram'], 'assoc_social_twitter' => $data['assoc_social_twitter'], 'assoc_social_website' => $data['assoc_social_website']);
		}
		$this->db->where('assoc_id', $assoc_id);
		$query = $this->db->update('tb_associate', $dataUpdate);
		return $query;
	}
	public function getCountAssocusername($assoc_username)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_username', $assoc_username);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getCountAssocEmail($assoc_email)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_email', $assoc_email);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getPerAssocPhotoGallery($assocph_associd)
	{
		$this->db->from('tb_assocgallery');
		$this->db->where('assocph_associd', $assocph_associd);
		$query = $this->db->get();
		return $query->result();
	}
	public function addPerAssocPhotoGallery($data, $assocsesid, $photo_final)
	{
		$assocph_date = date("Y-m-d");
		$dataInsert = array('assocph_associd' => $assocsesid, 'assocph_title' => $data['assocph_title'], 'assocph_photo' => $photo_final, 'assocph_date' => $assocph_date);
		return $this->db->insert('tb_assocgallery', $dataInsert);
	}
	public function delAssocPerPhotoGallery($assoc_id, $assocph_id)
	{
		$this->db->where('assocph_id', $assocph_id);
		$this->db->where('assocph_associd', $assoc_id);
		$query = $this->db->delete('tb_assocgallery');
		return $query;
	}
	public function getAssocPerPhotoGallery($assoc_id, $assocph_id)
	{
		$this->db->from('tb_assocgallery');
		$this->db->where('assocph_id', $assocph_id);
		$this->db->where('assocph_associd', $assoc_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function upPerAssocPhotoGallery($data, $assocph_id, $photo_final)
	{
		$dataUpdate = array('assocph_title' => $data['assocph_title'], 'assocph_photo' => $photo_final);
		$this->db->where('assocph_id', $assocph_id);
		$query = $this->db->update('tb_assocgallery', $dataUpdate);
		return $query;
	}
	public function upPerAssocFeaturedImg($data, $assoc_id, $photo_final)
	{
		$dataUpdate = array('assoc_featuredimg' => $photo_final);
		$this->db->where('assoc_id', $assoc_id);
		$query = $this->db->update('tb_associate', $dataUpdate);
		return $query;
	}
	public function getPerAssocVideoGallery($assocvg_associd)
	{
		$this->db->from('tb_assocvideogallery');
		$this->db->where('assocvg_associd', $assocvg_associd);
		$query = $this->db->get();
		return $query->result();
	}
	public function addPerAssocVideoGallery($data, $assocvg_associd)
	{
		$assocvg_date = date("Y-m-d");
		$dataInsert = array('assocvg_title' => $data['assocvg_title'], 'assocvg_videolink' => $data['assocvg_videolink'], 'assocvg_date' => $assocvg_date, 'assocvg_associd' => $assocvg_associd);
		return $this->db->insert('tb_assocvideogallery', $dataInsert);
	}
	public function delAssocPerVideoGallery($assocvg_associd, $assocvg_id)
	{
		$this->db->where('assocvg_id', $assocvg_id);
		$this->db->where('assocvg_associd', $assocvg_associd);
		$query = $this->db->delete('tb_assocvideogallery');
		return $query;
	}
	public function getPerAssocPerVideo($assocvg_associd, $assocvg_id)
	{
		$this->db->from('tb_assocvideogallery');
		$this->db->where('assocvg_associd', $assocvg_associd);
		$this->db->where('assocvg_id', $assocvg_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function upPerAssocVideoGallery($data, $assocvg_associd, $assocvg_id)
	{
		$dataUpdate = array('assocvg_title' => $data['assocvg_title'], 'assocvg_videolink' => $data['assocvg_videolink']);
		$this->db->where('assocvg_associd', $assocvg_associd);
		$this->db->where('assocvg_id', $assocvg_id);
		$query = $this->db->update('tb_assocvideogallery', $dataUpdate);
		return $query;
	}
}
