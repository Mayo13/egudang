<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CTR_Dashboard extends CI_Controller
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

	public function loadRecord($rowno = 0)
	{
		$search_text = "";
		if ($this->input->post('submit') != NULL) {
			$search_text = $this->input->post('search');
			$this->session->set_userdata(array("search" => $search_text));
		} else {
			if ($this->session->userdata('search') != NULL) {
				$search_text = $this->session->userdata('search');
			}
		}



		// $rowno = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		// Row per page
		$rowperpage = $this->session->userdata('showItem');

		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		// All records count
		$allcount = $this->M_Products->get_all_ProductsCount($search_text);
		// Get  records
		$users_record = $this->M_Products->get_all_Products($rowno, $rowperpage, $search_text);
		// Sidebar
		$getCategory = $this->M_Category->get_allCategory();
		$getMerk = $this->M_Merk->get_allMerk();

		// <li class="page-item"><a class="page-link" href="#">1</a></li>
		$config['full_tag_open'] = '<ul class="pagination pagination-md">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		// $this->pagination->initialize($config);
		// $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		// $data["links"] = $this->pagination->create_links();
		// $data['projects'] = $this->project->get_projects($config["per_page"], $page);
		// $this->load->view('projects', $data);

		// Pagination Configuration
		$config['base_url'] = base_url() . 'dashboard/';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		// Initialize
		$this->pagination->initialize($config);


		$data['pagination'] = $this->pagination->create_links();

		$data['result'] = $users_record;
		$data['row'] = $rowno;
		$data['search'] = $search_text;
		$sidebar['category'] = $getCategory;
		$sidebar['merk'] = $getMerk;
		// var_dump($sidebar);
		// var_dump($users_record);
		// var_dump($users_record1);
		$this->load->view('user/template/1_header');
		$this->load->view('user/template/2_navbar');
		$this->load->view('user/template/3_sidebar', $sidebar);
		$this->load->view('user/dashboard/v_dashboard', $data);
	}

	public function loadbyMerk($id = 0, $rowno = 0)
	{
		// $merk_id = $this->session->userdata('merk_id');	
		$merk_id = $id;
		// Search text
		$search_text = "";
		if ($this->input->post('submit') != NULL) {
			$search_text = $this->input->post('search');
			$this->session->set_userdata(array("search" => $search_text));
		} else {
			if ($this->session->userdata('search') != NULL) {
				$search_text = $this->session->userdata('search');
			}
		}

		// Row per page
		$rowperpage = $this->session->userdata('showItem');

		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		// All records count
		$allcount = $this->M_Products->get_all_ProductsCountbyMerk($search_text, $merk_id);
		// Get  records
		$users_record = $this->M_Products->get_all_ProductsbyMerk($rowno, $rowperpage, $search_text, $merk_id);

		$getCategory = $this->M_Category->get_allCategory();
		$getMerk = $this->M_Merk->get_allMerk();

		$config['full_tag_open'] = '<ul class="pagination pagination-md">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		// Pagination Configuration
		$config['base_url'] = base_url() . 'dashboard/';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		// Initialize
		$this->pagination->initialize($config);


		$data['pagination'] = $this->pagination->create_links();

		$data['result'] = $users_record;
		$data['row'] = $rowno;
		$data['search'] = $search_text;
		$sidebar['category'] = $getCategory;
		$sidebar['merk'] = $getMerk;
		// var_dump($merk_id);
		// var_dump($users_record);

		$this->load->view('user/template/1_header');
		$this->load->view('user/template/2_navbar');
		$this->load->view('user/template/3_sidebar', $sidebar);
		$this->load->view('user/dashboard/v_byMerk', $data);
	}

	public function loadbyCategory($id = 0, $rowno = 0)
	{
		// $merk_id = $this->session->userdata('merk_id');	
		$category = $id;
		// Search text
		$search_text = "";
		if ($this->input->post('submit') != NULL) {
			$search_text = $this->input->post('search');
			$this->session->set_userdata(array("search" => $search_text));
		} else {
			if ($this->session->userdata('search') != NULL) {
				$search_text = $this->session->userdata('search');
			}
		}

		// Row per page
		$rowperpage = $this->session->userdata('showItem');

		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		// All records count
		$allcount = $this->M_Products->get_all_ProductsCountbyCategory($search_text, $category);
		// Get  records
		$users_record = $this->M_Products->get_all_ProductsbyCategory($rowno, $rowperpage, $search_text, $category);

		$getCategory = $this->M_Category->get_allCategory();
		$getMerk = $this->M_Merk->get_allMerk();

		$config['full_tag_open'] = '<ul class="pagination pagination-md">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		// Pagination Configuration
		$config['base_url'] = base_url() . 'dashboard/';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		// Initialize
		$this->pagination->initialize($config);


		$data['pagination'] = $this->pagination->create_links();

		$data['result'] = $users_record;
		$data['row'] = $rowno;
		$data['search'] = $search_text;
		$sidebar['category'] = $getCategory;
		$sidebar['merk'] = $getMerk;
		// var_dump($merk_id);
		// var_dump($users_record);

		$this->load->view('user/template/1_header');
		$this->load->view('user/template/2_navbar');
		$this->load->view('user/template/3_sidebar', $sidebar);
		$this->load->view('user/dashboard/v_byCategory', $data);
	}
}