<?php
defined('BASEPATH') or die('No direct script access allowed!');

class M_Reason extends CI_Model
{

    public function get_reason()
    {
        $value = $this->db->get('tbl_transaction_reason')->result_array();
        return $value;
    }
}