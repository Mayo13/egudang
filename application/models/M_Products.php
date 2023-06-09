<?php
defined('BASEPATH') or die('No direct script access allowed!');

class M_Products extends CI_Model
{

    // Fetch records Dashboard
    public function get_all_Products($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->join('tbl_products_satuan', 'tbl_products.satuan_id = tbl_products_satuan.satuan_id');
        $this->db->where('is_active', 1);
        $this->db->where('is_visible', 1);
        $this->db->where('is_thumbnails', 1);

        if ($search != '') {
            $this->db->like('name', $search);
            $this->db->or_like('desc', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    // Select total records Dashboard
    public function get_all_ProductsCount($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->join('tbl_products_satuan', 'tbl_products.satuan_id = tbl_products_satuan.satuan_id');
        $this->db->where('is_active', 1);
        $this->db->where('is_visible', 1);
        $this->db->where('is_thumbnails', 1);

        if ($search != '') {
            $this->db->like('name', $search);
            $this->db->or_like('desc', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function get_single_products_byId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id');
        $this->db->join('tbl_products_satuan', 'tbl_products.satuan_id = tbl_products_satuan.satuan_id');
        $this->db->join('tbl_products_merk', 'tbl_products.merk_id = tbl_products_merk.merk_id');
        $this->db->join('tbl_products_category', 'tbl_products.category_id = tbl_products_category.category_id');
        $this->db->where('tbl_products.is_active', 1);
        $this->db->where('tbl_products.products_id', $id);
        $this->db->where('tbl_products_image.is_thumbnails', 1);


        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_single_productsSliderImg_byId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id');
        $this->db->where('tbl_products.is_active', 1);
        $this->db->where('tbl_products.products_id', $id);
        $this->db->where('tbl_products_image.is_slider', 1);


        $query = $this->db->get();

        return $query->result_array();
    }


    // Fetch records Merk
    public function get_all_ProductsbyMerk($rowno, $rowperpage, $search = "", $merkId)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->join('tbl_products_satuan', 'tbl_products.satuan_id = tbl_products_satuan.satuan_id');
        $this->db->where('is_active', 1);
        $this->db->where('is_visible', 1);
        $this->db->where('is_thumbnails', 1);
        $this->db->where('tbl_products.merk_id', $merkId);


        if ($search != '') {
            $this->db->like('name', $search);
            $this->db->or_like('desc', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    // Select total records Merk
    public function get_all_ProductsCountbyMerk($search = '', $merkId)
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->join('tbl_products_satuan', 'tbl_products.satuan_id = tbl_products_satuan.satuan_id');
        $this->db->where('is_active', 1);
        $this->db->where('is_visible', 1);
        $this->db->where('is_thumbnails', 1);
        $this->db->where('tbl_products.merk_id', $merkId);

        if ($search != '') {
            $this->db->like('name', $search);
            $this->db->or_like('desc', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }


    public function get_all_ProductsbyCategory($rowno, $rowperpage, $search = "", $category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->join('tbl_products_satuan', 'tbl_products.satuan_id = tbl_products_satuan.satuan_id');
        $this->db->where('is_active', 1);
        $this->db->where('is_visible', 1);
        $this->db->where('is_thumbnails', 1);
        $this->db->where('tbl_products.category_id', $category_id);


        if ($search != '') {
            $this->db->like('name', $search);
            $this->db->or_like('desc', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    // Select total records Category
    public function get_all_ProductsCountbyCategory($search = '', $category_id)
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->join('tbl_products_satuan', 'tbl_products.satuan_id = tbl_products_satuan.satuan_id');
        $this->db->where('is_active', 1);
        $this->db->where('is_visible', 1);
        $this->db->where('is_thumbnails', 1);
        $this->db->where('tbl_products.category_id', $category_id);

        if ($search != '') {
            $this->db->like('name', $search);
            $this->db->or_like('desc', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }
}
