<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UsermController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string'));
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('master/UsermModel', 'userm');
		$this->load->database();
	}
	public function manage_user()
	{
		$arr['siteTitle'] = 'Manage User';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['userdata'] = $this->userm->getAllUsers();
		$this->load->view("master/master-user-manage", $arr);
	}
	public function view_user($stureg_id)
	{
		$arr['siteTitle'] = 'View User';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['userdata'] = $this->userm->getPerUser($stureg_id);
		$arr['discountdata'] = $this->userm->getPerUserDiscountCoupon($stureg_id);
		$this->load->view("master/master-user-view", $arr);
	}
	public function view_coupon($stureg_id, $stuco_id)
	{
		$arr['siteTitle'] = 'View Coupon';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['userdata'] = $this->userm->getPerUser($stureg_id);
		$arr['disrow'] = $this->userm->getPerUserPerDisCoupon($stureg_id, $stuco_id);
		$this->load->view("master/master-user-coupon-view", $arr);
	}
}
