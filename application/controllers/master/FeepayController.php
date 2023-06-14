<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FeepayController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'security', 'string'));
		$this->load->library(array('form_validation', 'session', 'user_agent'));
		$this->load->model('master/FeepayModel', 'feepmod');
		$this->load->database();
	}
	public function manage_payment()
	{
		$arr['siteTitle'] = 'Manage Payment';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['paydata'] = $this->feepmod->getAllPayment();
		$this->load->view("master/master-manage-payment", $arr);
	}
	public function view_payment($pay_id)
	{
		$arr['siteTitle'] = 'View Payment';
		$masterId = $this->session->userdata('masterId');
		if (empty($masterId)) {
			redirect('master/login');
		}
		$arr['paydata'] = $this->feepmod->getPerPayment($pay_id);

		$this->load->view("master/master-manage-payment-view", $arr);
	}
}
