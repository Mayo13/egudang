<?php
defined('BASEPATH') or die('No direct script access allowed!');

class M_Transactions extends CI_Model
{
    // Fetch records cart user
    public function get_cart_user($login_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaction_cart');
        $this->db->join('tbl_products', 'tbl_products.products_id = tbl_transaction_cart.products_id');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->join('tbl_transaction_reason', 'tbl_transaction_reason.reason_id = tbl_transaction_cart.reason_id', 'left');
        $this->db->where('login_id', $login_id);
        $this->db->where('is_thumbnails', 1);

        $query = $this->db->get();

        return $query->result_array();
    }

    // Fetch records order user
    public function get_transaction_user($login_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaction_cart');
        $this->db->join('tbl_products', 'tbl_products.products_id = tbl_transaction_cart.products_id');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->join('tbl_transaction_reason', 'tbl_transaction_reason.reason_id = tbl_transaction_cart.reason_id', 'left');
        $this->db->where('login_id', $login_id);
        $this->db->where('is_thumbnails', 1);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_cart_userCount($login_id)
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_transaction_cart');
        $this->db->join('tbl_products', 'tbl_products.products_id = tbl_transaction_cart.products_id');
        $this->db->join('tbl_products_image', 'tbl_products.products_id = tbl_products_image.products_id', 'left');
        $this->db->where('login_id', $login_id);
        $this->db->where('is_thumbnails', 1);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function find_item_onCart($login_id, $prod_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaction_cart');
        $this->db->where('login_id', $login_id);
        $this->db->where('tbl_transaction_cart.products_id', $prod_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function User_add_toCart($data)
    {
        $this->db->insert("tbl_transaction_cart", $data);
        return $this->db->insert_id();
    }

    public function Submit_transactionHeader($data)
    {
        $this->db->insert("tbl_transaction_header", $data);
        return $this->db->insert_id();
    }

    public function Submit_transactionDetail($data)
    {
        $this->db->insert("tbl_transaction_detail", $data);
        return $this->db->insert_id();
    }


    public function User_updateCart($id, $data)
    {
        $this->db->where('cart_id', $id);
        $result = $this->db->update('tbl_transaction_cart', $data);

        if (!empty($result)) {
            return 200;
        } else {
            return 404;
        }
    }

    function delete_itemCart($id)
    {
        $this->db->where('cart_id', $id);
        $this->db->delete('tbl_transaction_cart');

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    function update_cart($id, $data)
    {

        $this->db->where('cart_id', $id);
        $this->db->update('tbl_transaction_cart', $data);

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}