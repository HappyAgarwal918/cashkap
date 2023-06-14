<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Featuredgallery_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->library('session');
		$this->load->model('master/Featuredgallery_model', 'feagalmod');
		$this->load->database();
	}
	public function manage_featuredimages()
	{
		$arr['siteTitle'] = 'Manage Featured Images';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['feaimgdata'] = $this->feagalmod->getAllFeaturedImages();
		$this->load->view("master/master-feagal-manage", $arr);
	}
	public function add_featuredimage()
	{
		$arr['siteTitle'] = 'Add Featured Image';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$this->form_validation->set_error_delimiters('<span class="error-form">', '</span>');
		$this->form_validation->set_rules('feagal_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('feagal_disorder', 'Display Order', 'trim|numeric|required');

		$feagal_thumb = "";
		if (!empty($_FILES['feagal_thumb']['name'])) {
			$feagal_thumb = $_FILES['feagal_thumb']['name'];
		}
		$config = array(
			'upload_path'	=> './assets/media/featured_gallery',
			'overwrite' => TRUE,
			'allowed_types' => '*',
			'file_name' => time() . '_' . $feagal_thumb
		);
		$this->load->library('upload', $config);
		if ($this->form_validation->run() == true && $this->upload->do_upload('feagal_thumb')) {
			$data = $this->input->post();
			$fea_attach = $this->upload->data();
			$fea_attach_file = "assets/media/featured_gallery/" . $fea_attach['raw_name'] . $fea_attach['file_ext'];
			if ($this->feagalmod->insertFeaturedImage($data, $fea_attach_file)) {
				$this->session->set_flashdata('feedback', "Media Gallery record  added successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/featured-gallery/manage");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/featured-gallery/manage");
			}
		} else {
			$arr['error'] = $this->upload->display_errors();
		}
		$this->load->view('master/master-feagal-add', $arr);
	}
	public function del_featuredimg($feagal_id)
	{
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['feaimgdata'] = $this->feagalmod->getPerFeaturedImg($feagal_id);
		$feagal_orgpic = $arr['feaimgdata']->feagal_orgpic;
		$feagal_thumb = $arr['feaimgdata']->feagal_thumb;
		if ($this->feagalmod->delPerFeaturedImg($feagal_id)) {
			if ($feagal_orgpic != "") {
				unlink($feagal_orgpic);
			}
			if ($feagal_thumb != "") {
				unlink($feagal_thumb);
			}
			$this->session->set_flashdata('feedback', "Photo   deleted successfully.");
			$this->session->set_flashdata('feedbackerr', "alert-success");
			redirect("master/featured-gallery/manage");
		} else {
			$this->session->set_flashdata('feedback', "Something wrong please try again.");
			$this->session->set_flashdata('feedbackerr', "alert-danger");
			redirect("master/featured-gallery/manage");
		}
	}
	public function edit_featuredimage($feagal_id)
	{
		$arr['siteTitle'] = 'Edit Featured Image';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['feaimgdata'] = $this->feagalmod->getPerFeaturedImg($feagal_id);
		$old_feagal_thumb = $arr['feaimgdata']->feagal_thumb;
		$this->form_validation->set_error_delimiters('<span class="error-form">', '</span>');
		$this->form_validation->set_rules('feagal_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('feagal_disorder', 'Display Order', 'trim|numeric|required');


		$feagal_thumb = "";
		if (!empty($_FILES['feagal_thumb']['name'])) {
			$feagal_thumb = $_FILES['feagal_thumb']['name'];
		}
		if ($feagal_thumb != "") {
			$config = array(
				'upload_path'	=> './assets/media/featured_gallery',
				'overwrite' => TRUE,
				'allowed_types' => '*',
				'file_name' => time() . '_' . $feagal_thumb
			);
			$this->load->library('upload', $config);
			if ($this->form_validation->run() == true && $this->upload->do_upload('feagal_thumb')) {
				$data = $this->input->post();
				$fea_attach = $this->upload->data();
				$fea_attach_file = "assets/media/featured_gallery/" . $fea_attach['raw_name'] . $fea_attach['file_ext'];
				if ($this->feagalmod->updatetFewaturedImg($data, $fea_attach_file, $feagal_id)) {
					if ($old_feagal_thumb != "") {
						unlink($old_feagal_thumb);
					}
					$this->session->set_flashdata('feedback', "In the Galleries   photo updated successfully.");
					$this->session->set_flashdata('feedbackerr', "alert-success");
					redirect("master/featured-gallery/manage");
				} else {
					$this->session->set_flashdata('feedback', "Something wrong please try again.");
					$this->session->set_flashdata('feedbackerr', "alert-danger");
					redirect("master/featured-gallery/manage");
				}
			} else {
				$arr['error'] = $this->upload->display_errors();
			}
		} else {
			if ($this->form_validation->run() == true) {
				$data = $this->input->post();
				$fea_attach_file = $old_feagal_thumb;

				if ($this->feagalmod->updatetFewaturedImg($data, $fea_attach_file, $feagal_id)) {
					$this->session->set_flashdata('feedback', "In the Galleries   photo updated successfully.");
					$this->session->set_flashdata('feedbackerr', "alert-success");
					redirect("master/featured-gallery/manage");
				} else {
					$this->session->set_flashdata('feedback', "Something wrong please try again.");
					$this->session->set_flashdata('feedbackerr', "alert-danger");
					redirect("master/featured-gallery/manage");
				}
			}
		}
		$this->load->view('master/master-feagal-edit', $arr);
	}


	public function up_orgimage($feagal_id)
	{
		$arr['siteTitle'] = 'Add Original Picture';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['feaimgdata'] = $this->feagalmod->getPerFeaturedImg($feagal_id);
		$old_feagal_orgpic = $arr['feaimgdata']->feagal_orgpic;
		$this->form_validation->set_error_delimiters('<span class="error-form">', '</span>');
		$this->form_validation->set_rules('feagal_id', 'Id', 'trim|required');
		$feagal_orgpic = "";
		if (!empty($_FILES['feagal_orgpic']['name'])) {
			$feagal_orgpic = $_FILES['feagal_orgpic']['name'];
		}
		$config = array(
			'upload_path'	=> './assets/media/featured_gallery',
			'overwrite' => TRUE,
			'allowed_types' => '*',
			'file_name' => time() . '_' . $feagal_orgpic
		);
		$this->load->library('upload', $config);
		if ($this->form_validation->run() == true && $this->upload->do_upload('feagal_orgpic')) {
			$data = $this->input->post();
			$media_attach = $this->upload->data();
			$fea_attach_file = "assets/media/featured_gallery/" . $media_attach['raw_name'] . $media_attach['file_ext'];
			if ($this->feagalmod->updateFeaturedOrgPic($fea_attach_file, $feagal_id)) {
				if ($old_feagal_orgpic != "") {
					unlink($old_feagal_orgpic);
				}
				$this->session->set_flashdata('feedback', "Original Picture  updated successfully.");
				$this->session->set_flashdata('feedbackerr', "alert-success");
				redirect("master/featured-gallery/manage");
			} else {
				$this->session->set_flashdata('feedback', "Something wrong please try again.");
				$this->session->set_flashdata('feedbackerr', "alert-danger");
				redirect("master/featured-gallery/manage");
			}
		} else {
			$arr['error'] = $this->upload->display_errors();
		}
		$this->load->view('master/master-feagal-orgadd', $arr);
	}
}
