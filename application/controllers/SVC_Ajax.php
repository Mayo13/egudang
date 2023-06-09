<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'libraries\PHPExcel-1.8\Classes\PHPExcel.php');
$objReader = PHPExcel_IOFactory::createReader('Excel2007');

class SVC_Ajax extends CI_Controller
{
    // https://auroraepc.com/contact-aurora
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('zip');
        $this->load->library('encryption');
        $this->load->model('M_Auth', 'M_Auth');
        $this->load->model('M_Products', 'Mpr');
        $this->load->model('M_Category', 'MCt');
        $this->load->model('M_Transactions', 'MTr');
        $this->load->model('M_Merk', 'M_Merk');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('file');
        $this->load->helper('auth_helper');
        $this->load->helper('string');
        $this->load->library('pagination');
    }

    public function setShowItem()
    {
        $rowLimit = $this->input->post('showItem');

        $this->session->set_userdata('showItem', $rowLimit);

        $status = "200";
        echo json_encode($status);
    }

    public function upQtyCart()
    {
        $qty = $this->input->post('qty');
        $idi = $this->input->post('idi');

        $data = array(
            'quantity' => $qty,
            'modified_date' => date("Y-m-d")
        );

        $status = $this->MTr->update_cart($idi, $data);
        if ($status == false) {
            $aray = array(
                'error' => true,
                'pesan' => "data not affected"
            );
        } else {
            $aray = array(
                'success' => true,
                'pesan' => "data affected"
            );
        }
        echo json_encode($aray);
    }

    public function upReasonCart()
    {
        $reson = $this->input->post('reason');
        $idi = $this->input->post('idi');
        $data = array(
            'reason_id' => $reson,
            'modified_date' => date("Y-m-d")
        );
        $status = $this->MTr->update_cart($idi, $data);

        echo json_encode($status);
    }

    public function upKeteranganCart()
    {
        $desc = $this->input->post('desc');
        $idi = $this->input->post('idi');
        $data = array(
            'keterangan' => $desc,
            'modified_date' => date("Y-m-d")
        );
        $status = $this->MTr->update_cart($idi, $data);
        echo json_encode($status);
    }

    public function getSummaryCart()
    {
        $login = $this->session->userdata('login_id');

        $datacart = $this->MTr->get_cart_user($login);

        echo json_encode($datacart);
    }
}
