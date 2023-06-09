<?php
defined('BASEPATH') or die('No direct script access allowed!');

class M_Auth extends CI_Model
{
    function get_user_login()
    {
        $value = $this->db->get('tbl_user_login')->result();
        return $value;
    }


    function get_sidebarmenu($user_id)
    {
        $query = $this->db->query(
            "SELECT *
            FROM tbl_user_access
            WHERE user_id = '$user_id' AND is_active = '1'
            ORDER BY no_urut_sec ASC, no_urut_sub ASC"
        )->result();
        return $query;
    }


    function get_user()
    {
        $value = $this->db->get('tbl_user')->result();
        return $value;
    }

    function get_auth($username)
    {
        $query = $this->db->query(
            "SELECT lg.`token_login`, lg.`exp_date`, lg.`login_id`, lg.`user_id`,lg.`role_id`, lg.`token_login`, us.`name`, us.`nip`, us.`position` , lg.sandi
            FROM tbl_user_login AS lg
            JOIN tbl_user AS us
            ON lg.`user_id` = us.`user_id`
            WHERE lg.`username`= '$username' LIMIT 1"
        )->result();
        return $query;
    }

    function get_userLogin_byUserId($id)
    {
        $this->db->where('user_id', $id);
        $value = $this->db->get('tbl_user_login')->result();
        return $value;
    }

    public function insert_data_login($data)
    {
        $this->db->insert("tbl_user_login", $data);
        return $this->db->insert_id();
    }

    public function insert_data_user($data)
    {
        $this->db->insert("tbl_user", $data);
        return $this->db->insert_id();
    }

    public function update_data_user($id, $data)
    {
        $this->db->where('user_id', $id);
        $result = $this->db->update('tbl_user', $data);
        return $result;
    }

    public function update_data_login($id, $data)
    {
        $this->db->where('login_id', $id);
        $result = $this->db->update('tbl_user_login', $data);
        return $result;
    }

    function delete_user($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    function Custom_Query()
    {
        $value = $this->db->query("SELECT * from `table` where 1")->result();
        return $value;
    }
}
