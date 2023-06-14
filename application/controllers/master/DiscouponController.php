<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DiscouponController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string'));
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('master/DiscouponModel', 'dismod');
		$this->load->model('CommonModel', 'commod');
		$this->load->database();
	}
	public function manage_couponpend()
	{
		$arr['siteTitle'] = 'Manage Coupon Pending';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['disdata'] = $this->dismod->getAllDiscountCouponPend();
		$this->load->view("master/master-coupon-pending-manage", $arr);
	}
	public function manage_coupon()
	{
		$arr['siteTitle'] = 'Manage Coupon';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['disdata'] = $this->dismod->getAllDiscountCoupon();
		$this->load->view("master/master-coupon-manage", $arr);
	}
	public function view_couponpend($stuco_id)
	{
		$arr['siteTitle'] = 'View Coupon';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['studata'] = $this->dismod->getPerDiscountCoupon($stuco_id);
		$this->load->view('master/master-coupon-pending-view', $arr);
	}
	public function view_coupon($stuco_id)
	{
		$arr['siteTitle'] = 'View Coupon';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['studata'] = $this->dismod->getPerDiscountCoupon($stuco_id);
		$this->load->view('master/master-coupon-view', $arr);
	}
	public function add_cashback($stuco_id)
	{
		$arr['siteTitle'] = 'Add Cashback';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['studata'] = $this->dismod->getPerDiscountCoupon($stuco_id);
		$old_stuco_cashbackslip = $arr['studata']->stuco_cashbackslip;
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('stuco_cashbackamt', 'Amount', 'trim|required|numeric|xss_clean');
		$stuco_cashbackslip = "";
		if (isset($_FILES['stuco_cashbackslip']['name'])) {
			$stuco_cashbackslip = $_FILES['stuco_cashbackslip']['name'];
		}
		$config = array(
			'upload_path' => './media/cashback/',
			'allowed_types' => 'jpg|jpeg|png|pdf',
			'max_size' => 2048,
			'overwrite' => TRUE,
			'file_name' => time() . '_' . $stuco_cashbackslip
		);
		if ($stuco_cashbackslip != "") {
			$this->load->library('upload', $config);
			if ($this->form_validation->run() == true  && $this->upload->do_upload('stuco_cashbackslip')) {
				$data = $this->input->post();
				unset($data['submit']);
				$slip_ar = $this->upload->data();
				$slip_final = "media/cashback/" . $slip_ar['raw_name'] . $slip_ar['file_ext'];
				$uplslip = $this->dismod->upCashbackSlip($data, $stuco_id, $slip_final);
				if ($uplslip) {
					if ($old_stuco_cashbackslip != "") {
						unlink($old_stuco_cashbackslip);
					}
					$this->session->set_flashdata('feedback', "Cashback added successfully");
					$this->session->set_flashdata('feedbackerr', "alert-success");
					redirect("master/coupon/view/$stuco_id");
				}
			} else {
				$arr['error1'] = $this->upload->display_errors();
			}
		} else {
			if ($this->form_validation->run() == true) {
				$data = $this->input->post();
				$slip_final = "";
				$uplslip = $this->dismod->upCashbackSlip($data, $stuco_id, $slip_final);
				if ($uplslip) {
					$this->session->set_flashdata('feedback', "Cashback added successfully");
					$this->session->set_flashdata('feedbackerr', "alert-success");
					redirect("master/coupon/view/$stuco_id");
				}
			}
		}
		$this->load->view('master/master-coupon-cashback-add', $arr);
	}
}
