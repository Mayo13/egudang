<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */

// -----------------VIEWS---------------------- //
$route['default_controller'] = 'CTR_Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
$route['auth'] = 'CTR_Auth';
//dashboard
$route['dashboard'] = 'CTR_Dashboard/loadRecord/';
$route['dashboard/(:num)'] = 'CTR_Dashboard/loadRecord/$1';
// sort by Merk
$route['merk'] = 'CTR_Dashboard/loadbyMerk/';
$route['merk/(:num)/(:num)'] = 'CTR_Dashboard/loadbyMerk/$1/$s1';
// sort by category
$route['category'] = 'CTR_Dashboard/loadbyCategory/';
$route['category/(:num)/(:num)'] = 'CTR_Dashboard/loadbyCategory/$1/$s1';
//singleitem
$route['products_detail'] = 'CTR_Products/singleItemDetail/';
$route['products_detail/(:num)'] = 'CTR_Products/singleItemDetail/$1';

$route['cart'] = 'CTR_Transactions/cart/';
// $route['products_detail/(:num)'] = 'CTR_Products/singleItemDetail/$1';



// // -----------------AJAX---------------------- //

$route['set_showItem'] = 'SVC_Ajax/setShowItem';
$route['update_QtyCart'] = 'SVC_Ajax/upQtyCart';
$route['update_DescCart'] = 'SVC_Ajax/upKeteranganCart';
$route['update_ReasonCart'] = 'SVC_Ajax/upReasonCart';
$route['get_summarycart'] = 'SVC_Ajax/getSummaryCart';

// $route['ajax_thumbnail'] = 'SVC_Ajax/get_Thumbnail';
// $route['ajax_kode-barang'] = 'SVC_Ajax/get_kodeBarang';
// $route['ajax_devices-detail'] = 'SVC_Ajax/get_devicesDetail';
// $route['ajax_kd-barang'] = 'SVC_Ajax/select_kdBarang';
// $route['ajax_merk'] = 'SVC_Ajax/select_merk';
// $route['ajax_transaction'] = 'SVC_Ajax/get_Transaction';
// $route['ajax_p1'] = 'SVC_Ajax/get_pemberi';
// $route['ajax_p2'] = 'SVC_Ajax/get_penerima';
// $route['nodin'] = 'SVC_Ajax/decode_nodin';
// $route['ajax_addPerangkat'] = 'SVC_Ajax/get_inputPerangkat';
// $route['ajax_addNup'] = 'SVC_Ajax/get_inputPerangkatNup';
// $route['download_excel'] = 'SVC_Ajax/exportExcel';
// $route['ajax_kdBarang'] = 'SVC_Ajax/get_KdBarangbyId';
// $route['ajax_headerUpdate'] = 'SVC_Ajax/get_ajaxHeader';
// $route['ajax_transaction_devices'] = 'SVC_Ajax/get_transactionDevices';




// // -----------------Submit---------------------- //
$route['add_to_cart'] = 'SVC_Submit/submit_to_cart';
$route['del_item_cart'] = 'SVC_Submit/delete_item_cart';
$route['sub_cart'] = 'SVC_Submit/submit_allcart';
// $route['Up_perangkatBaru'] = 'SVC_Update/update_perangkatBaru';
// $route['Smt_stokPerangkat'] = 'SVC_Submit/submit_perangkatStok';
// $route['Smt_kobar'] = 'SVC_Submit/submit_kodeBarang';
// $route['Up_kobar'] = 'SVC_Update/update_kodeBarang';
// $route['Smt_stokTrans'] = 'SVC_Submit/submit_Transaksi';
// $route['del_item'] = 'SVC_Submit/del_item';