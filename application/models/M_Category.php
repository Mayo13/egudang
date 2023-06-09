<?php
defined('BASEPATH') or die('No direct script access allowed!');

class M_Category extends CI_Model
{

    public function get_allCategory()
    {
        $value = $this->db->get('tbl_products_category')->result_array();
        return $value;
    }
}
