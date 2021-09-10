<?php 

 if(!empty($_FILES)){ 
  // Include the database configuration file 
  require '../db/koneksi.php'; 
  
  // File path configuration 
  $time = date('Y-m-d H:i:s');
  $ekstensi_diperbolehkan = ['png','jpg', 'jpeg'];
  $nama = $_FILES['file']['name'];
  $id_konten = $_POST['id_k'];
  $x    = explode('.', $nama);
  $ekstensi   = strtolower(end($x));
  $ukuran     = $_FILES['file']['size'];
  $file_tmp   = $_FILES['file']['tmp_name'];
  $newName    = 'img/desain/' . substr($nama, 0, -4) . rand(1111,9999) . '.' . $ekstensi;
  if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
    move_uploaded_file($file_tmp, '../' . $newName);
    $sql = "INSERT INTO tb_gambar (id_konten, gambar, waktu) VALUES ('$id_konten', '$newName', '$time')"; 
    $insert = $db->query($sql);

  } else {
    return false;
  }


} 

?>
