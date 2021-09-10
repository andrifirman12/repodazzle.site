<?php
require '../db/koneksi.php';
$id = $_GET['id_konten'];

$query = "SELECT * FROM tb_komentar, tb_konten, tb_user
        WHERE tb_komentar.`id_konten` = tb_konten.`id`
        AND tb_komentar.`id_user` = tb_user.`id`
        AND tb_komentar.`id_konten` = '$id'
        ORDER BY tb_komentar.`id` DESC";

$result = $db->query($query);

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if (!empty($row)) {
      echo '<div class="card-comment" style="display: block;">

      <img class="img-circle img-sm" src="' . $row["avatar"] . '" alt="User Image">

      <div class="comment-text">
        <span class="username">
          <div>' . $row["nama"] . '</div>
          <span class="text-muted float-right">' . $row["waktu"] . '</span>
        </span>
        <div>' . $row["komentar"] . '</div>
      </div>

    </div>';

    } else {


    }

}

