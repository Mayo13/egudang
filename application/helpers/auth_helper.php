<?php

// function gen_token()
// {
//     $token = bin2hex(random_bytes(16));

//     return $token;
// }

function checkSessionUser()
{
    $ci = &get_instance();
    $ci->load->library('pagination');
    $ci->load->library('session');
    $ci->load->model('M_Auth', 'M_Auth');
    $ci->load->model('M_Products', 'M_Products');
    $ci->load->helper(array('form', 'url'));
    $ci->load->helper('file');
    $ci->load->helper('string');
    $ci->load->helper('url');

    date_default_timezone_set('Asia/Jakarta');

    $login = $ci->session->userdata('user_id');
    $data = $ci->M_Auth->get_userLogin_byUserId($login);

    $xpDate = 0;
    $s = $data[0]->exp_date;
    $dt = new DateTime($s);

    $datex = $dt->format('Y-m-d');
    $timex = $dt->format('H:i:s');

    //Now
    $daten = date('Y-m-d', time());
    $timen = date('H:i:s', time());


    if ($datex == $daten) {
        if ($timex > $timen) {
            $xpDate = 1;
        } else {
            $xpDate = 2;
        }
    } else {
        $xpDate = 2;
    }

    // $token = gen_token();

    // 	date_default_timezone_set("asia/jakarta");
    // $minutes_to_add = 60;

    // $dx = date('Y-m-d H:i:s', time());
    // $time = new DateTime($dx);
    // $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

    // $exp = $time->format('Y-m-d H:i:s');

    // $update = array(
    //     'token_login'   => $token,
    //     'exp_date' =>   $exp,
    //     'last_date' =>   $dx,
    // );

    // $ci->M_Auth->update_data_login($data->login_id, $update);

    if (!empty($data[0]->token_login) && $xpDate == 1) {
        if ($ci->session->userdata('is_on') != TRUE) {
            $url = base_url('dashboard');
            redirect($url);
        }
    } else {
        $url = base_url('auth');
        redirect($url);
    }
}