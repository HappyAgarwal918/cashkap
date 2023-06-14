<?php
class Featuredgallery_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAllFeaturedImages()
	{
		$this->db->from('tb_featuredgallery');
		$this->db->order_by('feagal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function insertFeaturedImage($data, $fea_attach_file)
	{
		$feagal_date = date("Y-m-d");
		$dataInsert = array('feagal_title' => $data['feagal_title'], 'feagal_thumb' => $fea_attach_file, 'feagal_date' => $feagal_date, 'feagal_disorder' => $data['feagal_disorder']);
		return $this->db->insert('tb_featuredgallery', $dataInsert);
	}
	public function delPerFeaturedImg($feagal_id)
	{
		$this->db->where('feagal_id', $feagal_id);
		$query = $this->db->delete('tb_featuredgallery');
		return $query;
	}

	public function getPerFeaturedImg($feagal_id)
	{
		$this->db->from('tb_featuredgallery');
		$this->db->where('feagal_id', $feagal_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function updatetFewaturedImg($data, $fea_attach_file, $feagal_id)
	{
		$dataUpdate = array('feagal_title' => $data['feagal_title'], 'feagal_thumb' => $fea_attach_file, 'feagal_disorder' => $data['feagal_disorder']);
		$this->db->where('feagal_id', $feagal_id);
		return $this->db->update('tb_featuredgallery', $dataUpdate);
	}
	public function updateFeaturedOrgPic($fea_attach_file, $feagal_id)
	{
		$dataUpdate = array('feagal_orgpic' => $fea_attach_file);
		$this->db->where('feagal_id', $feagal_id);
		return $this->db->update('tb_featuredgallery', $dataUpdate);
	}
}
