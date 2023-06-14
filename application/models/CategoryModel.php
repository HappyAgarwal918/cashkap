<?php class CategoryModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getPerCategoryBySlug($assoccat_slug)
	{
		$this->db->from('tb_assoccategory');
		$this->db->where('assoccat_slug', $assoccat_slug);
		$query = $this->db->get();
		return $query->row();
	}

	public function getPerCategoryListing($assoc_category)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_category', $assoc_category);
		$this->db->where('assoc_status', 1);
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPerAssociateBySlug($assoc_slug)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_slug', $assoc_slug);
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$query = $this->db->get();
		return $query->row();
	}

	public function getPerAssocCourses($assoc_id)
	{
		$this->db->from('tb_assoccourses');
		$this->db->where('acourse_associd', $assoc_id);
		$this->db->join('tb_courses', 'tb_courses.course_id=tb_assoccourses.acourse_courseid', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPerAssocVideoGallery($assocvg_associd)
	{
		$this->db->from('tb_assocvideogallery');
		$this->db->where('assocvg_associd', $assocvg_associd);
		$query = $this->db->get();
		return $query->result();
	}

	public function getPerAssocGallery($assocph_associd)
	{
		$this->db->from('tb_assocgallery');
		$this->db->where('assocph_associd', $assocph_associd);
		$query = $this->db->get();
		return $query->result();
	}

	public function getOtherRelAssoc($assoc_id, $assoc_category)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_category', $assoc_category);
		$this->db->where('assoc_status', 1);
		$this->db->where('assoc_id !=', $assoc_id);
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$this->db->join('tb_assoccategory', 'tb_assoccategory.assoccat_id=tb_associate.assoc_category', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function getSubCategoryListing($cat_id, $subcat_id)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_category', $cat_id);
		$this->db->where('assoc_subcat', $subcat_id);
		$this->db->where('assoc_status', 1);
		$this->db->join('tb_country', 'tb_country.country_id=tb_associate.assoc_address_country', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	/*public function getPerCategoryListingSchools($assoc_category,$assoc_schooltype)
	{
		$this->db->from('tb_associate');
		$this->db->where('assoc_category',$assoc_category);
		$this->db->where('assoc_schooltype',$assoc_schooltype);
		$this->db->where('assoc_status',1);
		$this->db->join('tb_country','tb_country.country_id=tb_associate.assoc_address_country','left');
		$query=$this->db->get();
		return $query->result();	
	}*/
}
