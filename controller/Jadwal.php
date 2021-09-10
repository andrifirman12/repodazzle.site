<?php

include_once '../db/koneksi.php';

$query = "SELECT * , DATE_FORMAT(tgl_upload, '%d/%m/%Y') AS 'format_tgl' FROM  tb_konten WHERE status <> '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>' ";

$result = mysqli_query($db, $query);

$data = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if ($row['kategori'] == 'Promo') {
        $data[] = array(
            'title' => $row['id'] . ' | ' . $row['judul'],
            'start' => $row['tgl_upload'],
            'backgroundColor' => '#f39c12', //yellow
            'borderColor' => '#f39c12', //yellow
        );
        $id = $row['id'];
    } else {
        $data[] = array(
            'title' => $row['id'] . ' | ' . $row['judul'],
            'start' => $row['tgl_upload'],
            'backgroundColor' => '#f56954', //red
            'borderColor' => '#f56954', //red
        );
    }
}

echo json_encode($data);
