<?php
class Video_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAllVideo()
	{
		$this->db->from('tb_videogallery');
		$this->db->order_by('video_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function insertVideo($data)
	{
		$dataInsert = array('video_title' => $data['video_title'], 'video_code' => $data['video_code'], 'video_status' => $data['video_status'], 'video_disorder' => $data['video_disorder']);
		return $this->db->insert('tb_videogallery', $dataInsert);
	}

	public function delPerVideo($video_id)
	{
		$this->db->where('video_id', $video_id);
		$query = $this->db->delete('tb_videogallery');
		return $query;
	}
	public function getPerVideo($video_id)
	{
		$this->db->from('tb_videogallery');
		$this->db->where('video_id', $video_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function updateVideo($data, $video_id)
	{
		$dataUpdate = array('video_title' => $data['video_title'], 'video_code' => $data['video_code'], 'video_status' => $data['video_status'], 'video_disorder' => $data['video_disorder']);
		$this->db->where('video_id', $video_id);
		return $this->db->update('tb_videogallery', $dataUpdate);
	}
}
