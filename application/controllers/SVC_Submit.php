<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'libraries\PHPExcel-1.8\Classes\PHPExcel.php');
$objReader = PHPExcel_IOFactory::createReader('Excel2007');

class SVC_Submit extends CI_Controller
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
        $this->load->model('M_Transactions', 'M_Transactions');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('file');
        $this->load->helper('auth_helper');
        $this->load->helper('string');
        $this->load->library('pagination');
    }

    public function submit_to_cart()
    {
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('prod_id', 'prod_id', 'required');

        $qty = $this->input->post('qty');
        $prod_id = $this->input->post('prod_id');
        $login_user = $this->session->userdata('login_id');

        if ($this->form_validation->run() != false) {
            $data = array(
                'login_id' => $login_user,
                'products_id' => $prod_id,
                'reason_id' => 4,
                'quantity' => $qty,
                'created_date' => date("Y-m-d")
            );

            // $search = $this->M_Transactions->find_item_onCart($login_user, $prod_id);


            // if (!empty($search)) {
            //     $totalqty = $search[0]['quantity'] + $qty;

            //     $data = array(
            //         'quantity' => $totalqty,
            //         'modified_date' => date("Y-m-d")
            //     );

            //     $this->M_Transactions->User_updateCart($search[0]['cart_id'], $data);
            // } else {
            //     $this->M_Transactions->User_add_toCart($data);
            // }

            $array = array(
                'success' => true,
                'pesanError' => "sukses menambahkan data",
            );
        } else {
            $array = array(
                'error' => true,
                'pesanError' => "error pada validasi data"
            );
        }
        echo json_encode($array);
    }

    public function delete_item_cart()
    {
        $id = $this->input->post('kode');

        $status = $this->M_Transactions->delete_itemCart($id);

        if ($status == true) {
            $array = array(
                'success' => true,
                'pesan' => "berhasil delete"
            );
        } else {
            $array = array(
                'error' => true,
                'pesanError' => "error pada validasi data " . $id
            );
        }


        echo json_encode($array);
    }

    public function submit_allcart()
    {

        $this->form_validation->set_rules('no', 'no', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');

        $login_user = $this->session->userdata('login_id');
        $getCart = $this->M_Transactions->get_cart_user($login_user);

        $no_surat = $this->input->post('no');
        $tgl_surat = $this->input->post('tgl');

        $errorM = '';

        if ($this->form_validation->run() != false) {
            $totalqty = 10;

            // Status
            // 1 = permintaan user
            // 2 = aproval operator
            // 3 = aproval pak okin
            // 4 = sudah bisa diambil

            $dataHeader = array(
                'user_id'   => $login_user,
                'total_quantity' => $totalqty,
                'no_surat'  => $no_surat,
                'tgl_surat' => $tgl_surat,
                'keterangan' => '',
                'status' => 1,
                'created_date' => date("Y-m-d")
            );

            $idh = $this->M_Transactions->Submit_transactionHeader($dataHeader);


            foreach ($getCart as $data) {
                $dataDetail = array(
                    'th_id'   => $idh,
                    'products_id'   => $data['products_id'],
                    'quantity'      => $data['quantity'],
                    'reason_id'       => $data['reason_id'],
                    'reason_desc'    => $data['keterangan'],
                    'created_date'    => date("Y-m-d")
                );
                $this->M_Transactions->Submit_transactionDetail($dataDetail);
            }

            $array = array(
                'success' => true,
                'kode' => '200',
                'pesan' => 'Success Input'
            );
        } else {
            $array = array(
                'error' => true,
                'pesan' => "Error on Input at " . $errorM
            );
        }

        echo json_encode($array);
    }
}