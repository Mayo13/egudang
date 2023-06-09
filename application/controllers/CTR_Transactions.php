<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CTR_Transactions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('zip');
		$this->load->library('encryption');
		$this->load->model('M_Auth', 'M_Auth');
		$this->load->model('M_Products', 'M_Products');
		$this->load->model('M_Transactions', 'M_Transactions');
		$this->load->model('M_Reason', 'M_Reason');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('file');
		$this->load->helper('string');
		$this->load->library('pagination');
		$this->checkUser();
	}

	public function checkUser()
	{
		$login = $this->session->userdata('user_id');
		$data = $this->M_Auth->get_userLogin_byUserId($login);
		if (!empty($data[0]->token_login)) {
			if ($this->session->userdata('is_on') != TRUE) {
				$url = base_url();
				redirect($url);
			}
		} else {
			$url = base_url();
			redirect($url);
		}
	}

	public function cart()
	{
		$login = $this->session->userdata('login_id');

		$datacart = $this->M_Transactions->get_cart_user($login);
		$listreason = $this->M_Reason->get_reason();
		$count = $this->M_Transactions->get_cart_userCount($login);

		$data['cart'] = $datacart;
		$data['reason'] = $listreason;
		$data['count'] = $count[0]['allcount'];
		// var_dump($count[0]['allcount']);

		$this->load->view('user/template/1_header');
		$this->load->view('user/template/2_navbar');
		$this->load->view('user/transaction/v_cart', $data);
	}
}