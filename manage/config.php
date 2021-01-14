<?php 

// Lokal
$dbname = "dadinqua";
$username = "root";
$password = "";

// Live
// $dbname = "ditpolairud";
// $username = "ditpolairud";
// $password = "Ditpolairud@2020";

$conn = mysqli_connect('localhost',$username,$password,$dbname);

date_default_timezone_set('Asia/Jakarta');

$base_href_backend = "https://$_SERVER[HTTP_HOST]/dadinqua/manage/admin/";

$arr_status_berita = [
	0 => "Draft",
	1 => "Publish",
	2 => "Un-Publish"
];

$arr_status_galeri = [
	1 => "Aktif",
	0 => "Tidak Aktif"
];

$arr_level = [
	2 => "Staff Web",
	1 => "Super Admin"
];

$arr_tipe_menu = [
	0 => 'Main Menu',
	1 => 'Sub Menu'
];

$arr_tipe_link = [
	'custom_link' => 'Custom Link',
	'halaman' => 'Halaman'
];


 ?>