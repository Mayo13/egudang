<?php
defined('BASEPATH') or die('No direct script access allowed!');

class M_Merk extends CI_Model
{

    public function get_allMerk()
    {
        $value = $this->db->get('tbl_products_merk')->result_array();
        return $value;
    }
}
