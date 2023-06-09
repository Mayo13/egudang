<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CTR_Products extends CI_Controller
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
		$this->load->model('M_Category', 'M_Category');
		$this->load->model('M_Merk', 'M_Merk');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('file');
		$this->load->helper('auth_helper');
		$this->load->helper('string');
		$this->load->library('pagination');
		checkSessionUser();
	}

	public function singleItemDetail($id)
	{
		$dataProducts = $this->M_Products->get_single_products_byId($id);

		$slider = $this->M_Products->get_single_productsSliderImg_byId($id);

		// Sidebar
		$getCategory = $this->M_Category->get_allCategory();
		$getMerk = $this->M_Merk->get_allMerk();


		$data['dataProducts'] = $dataProducts;
		$data['slider'] = $slider;
		$sidebar['category'] = $getCategory;
		$sidebar['merk'] = $getMerk;
		// var_dump($dataProducts);
		$this->load->view('user/template/1_header');
		$this->load->view('user/template/2_navbar');
		// $this->load->view('user/template/3_sidebar', $sidebar);
		$this->load->view('user/products/v_products', $data);
	}
}
