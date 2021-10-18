<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';

// master
$route['kecamatan'] = 'master/kecamatan/';
$route['desa'] = 'master/desa/';
$route['kategori'] = 'master/kategori/';
$route['klasifikasi'] = 'master/klasifikasi/';
$route['tipe-kamar'] = 'master/tipekamar/';
$route['tipe-hiburan'] = 'master/tipehiburan/';
$route['jenis-reklame'] = 'master/jenisreklame/';
$route['jenis'] = 'master/jenis/';
$route['status-kepemilikan'] = 'master/statuskepemilikan/';
$route['status-usaha'] = 'master/statususaha/';
// $route['perusahaan'] = 'master/perusahaan/';
$route['izin-usaha'] = 'Izin_usaha/';
// $route['wpp'] = 'master/wpp/';

$route['pendataan-hotel'] = 'pendataan/hotel/';
$route['pendataan-hotel-detail/([.0-9a-zA-Z-]+)'] = 'pendataan/detail_hotel/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
