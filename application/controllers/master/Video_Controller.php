<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Video_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->library('session');
		$this->load->model('master/Video_model', 'videomod');
		$this->load->database();
	}
	public function manage_video()
	{
		$arr['siteTitle'] = 'Manage Video Gallery';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['videogaldata'] = $this->videomod->getAllVideo();
		$this->load->view("master/master-video-manage", $arr);
	}

	public function edit_video($video_id)
	{
		$arr['siteTitle'] = 'Edit Video';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['videodata'] = $this->videomod->getPerVideo($video_id);
		$this->form_validation->set_error_delimiters('<span class="error-form">', '</span>');
		$this->form_validation->set_rules('video_title', 'Video Title', 'trim|required');
		$this->form_validation->set_rules('video_code', 'Video Youtube Code', 'trim|required');
		$this->form_validation->set_rules('video_status', 'Display Status', 'trim|required');
		$this->form_validation->set_rules('video_disorder', 'Display Order', 'trim|required');

		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			if ($this->videomod->updateVideo($data, $video_id)) {
				$this->session->set_flashdata('feedback', "Video  added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/video-gallery/manage");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/video-gallery/manage");
			}
		} else {
			$this->load->view('master/master-video-edit', $arr);
		}
	}
	public function add_video()
	{
		$arr['siteTitle'] = 'Add Video';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$this->form_validation->set_error_delimiters('<span class="error-form">', '</span>');
		$this->form_validation->set_rules('video_title', 'Video Title', 'trim|required');
		$this->form_validation->set_rules('video_code', 'Video Youtube Code', 'trim|required');
		$this->form_validation->set_rules('video_status', 'Display Status', 'trim|required');
		$this->form_validation->set_rules('video_disorder', 'Display Order', 'trim|required');
		if ($this->form_validation->run() == true) {
			$data = $this->input->post();
			if ($this->videomod->insertVideo($data)) {
				$this->session->set_flashdata('feedback', "Video  added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/video-gallery/manage");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/video-gallery/manage");
			}
		} else {
			$this->load->view('master/master-video-add', $arr);
		}
	}

	public function del_video($video_id)
	{
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}


		$arr['videodata'] = $this->videomod->getPerVideo($video_id);
		$video_thumb = $arr['videodata']->video_thumb;
		if ($this->videomod->delPerVideo($video_id)) {
			if ($video_thumb != "") {
				unlink($video_thumb);
			}
			$this->session->set_flashdata('feedback', "Video  deleted successfully.");
			$this->session->set_flashdata('feedbackerr', "alert-success");
			redirect("master/video-gallery/manage");
		} else {
			$this->session->set_flashdata('feedback', "Something wrong please try again.");
			$this->session->set_flashdata('feedbackerr', "alert-danger");
			redirect("master/video-gallery/manage");
		}
	}
}
