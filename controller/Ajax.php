<?php 

include '../db/koneksi.php';
include 'User.php';
include 'Konten.php';
include 'Komentar.php';
include 'Desain.php';
include 'Log.php';

if (isset($_FILES['image'])) {
 $image = $_FILES['image'];
} else {
 $image = null;
}

if (isset($_GET['form'])) {
    $form = $_GET['form'];
} elseif (isset($_POST['form'])) {
    $form = $_POST['form'];
}

$user = new User($db);
if ($form == 'get_user') {
 $user->index();
}
if ($form == 'auth_user') {
 $user->auth($_POST);
}
if ($form == 'get_desainer') {
 $user->desainer();
}
elseif ($form == 'add_user') {
 $user->store($_POST, $image);
}
elseif ($form == 'get_user_by_id') {
 $user->edit($_GET);
}
elseif ($form == 'get_user_active') {
 $user->edit($_GET);
}
elseif ($form == 'edit_user') {
 $user->update($_POST, $image);
}
elseif ($form == 'delete_user') {
 $user->delete($_POST);
}
elseif ($form == 'search_user') {
 $user->search($_GET);
}

$komentar = new Komentar($db);
if ($form == 'get_komentar') {
	$komentar->index();
}
elseif ($form == 'add_komentar') {
	$komentar->store($_POST);
}
elseif ($form == 'get_komentar_by_id') {
	$komentar->get_komentar($_GET);
}
elseif ($form == 'edit_komentar') {
	$komentar->update($_POST);
}
elseif ($form == 'delete_komentar') {
	$komentar->delete($_POST);
}
elseif ($form == 'search_komentar') {
	$komentar->search($_GET);
}

$konten = new Konten($db);
if ($form == 'get_konten') {
	$konten->index();
}
if ($form == 'get_jadwal_konten') {
	$konten->get_jadwal_konten();
}
if ($form == 'upload_desain') {
	$konten->upload_desain($_POST);
}
if ($form == 'get_konten_gambar') {
	$konten->index_gambar($_GET);
}
if ($form == 'upload_done') {
	$konten->index_gambar($_GET);
}
elseif ($form == 'add_konten') {
	$konten->store($_POST);
}
elseif ($form == 'get_konten_by_id') {
	$konten->edit($_GET);
}
elseif ($form == 'get_konten_by_tgl') {
	$konten->data_range($_GET);
}
elseif ($form == 'edit_konten') {
	$konten->update($_POST);
}
elseif ($form == 'delete_konten') {
	$konten->delete($_POST);
}
elseif ($form == 'delete_gambar') {
	$konten->delete_gambar($_POST);
}
elseif ($form == 'get_ig_info') {
	$konten->get_ig();
}
elseif ($form == 'add_ig') {
	$konten->store_ig($_POST);
}
elseif ($form == 'get_ig_by_id') {
	$konten->edit_ig($_GET);
}
elseif ($form == 'edit_ig') {
	$konten->update_ig($_POST);
}
elseif ($form == 'delete_ig') {
	$konten->delete_ig($_POST);
}
elseif ($form == 'get_active_ig') {
	$konten->get_active_ig();
}
if ($form == 'get_konten_done') {
 $konten->index_konten_done();
}
if ($form == 'get_data_dashboard') {
 $konten->index_dashboard();
}


$log = new log($db);
if ($form == 'get_log') {
 $log->index();
}
elseif ($form == 'get_log_3d') {
 $log->index_3d();
}
elseif ($form == 'get_log_7d') {
 $log->index_7d();
}
elseif ($form == 'get_log_dt') {
 $log->index_dt($_GET);
}
elseif ($form == 'get_log_all') {
 $log->index_all_log();
}
elseif ($form == 'get_log_notif_nav') {
	$log->index_notif_nav($_POST);
}
elseif ($form == 'get_log_komen_nav') {
	$log->index_komen_nav($_POST);
}
elseif ($form == 'update_last_login') {
 $log->update_last_login($_POST);
}
?>