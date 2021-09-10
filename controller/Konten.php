<?php

/**
 *
 */
 
 include '../db/koneksi.php';
 
class Konten
{
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function index()
	{
        $query = "SELECT * , DATE_FORMAT(tgl_upload, '%d/%m/%Y') AS 'format_tgl' FROM  tb_konten ORDER BY format_tgl DESC";
        $result = $this->db->query($query);

        $data = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        $total = count($data);

        echo json_encode([
            'success' => true,
            'data' => $data,
            'total' => $total
        ]);
	}

    public function index_konten_done()
	{
        $query = "SELECT * , DATE_FORMAT(tgl_upload, '%d/%m/%Y') AS 'format_tgl' FROM  tb_konten WHERE status = '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>'";
        $result = $this->db->query($query);

        $data = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        $total = count($data);

        echo json_encode([
            'success' => true,
            'data' => $data,
            'total' => $total
        ]);
	}

    public function data_range($data)
	{

        $x = $data['x'];
        $y = $data['y'];

        $query = "SELECT * , DATE_FORMAT(tgl_upload, '%d/%m/%Y') AS 'format_tgl' FROM  tb_konten 
        WHERE tgl_upload BETWEEN '$x' AND '$y'";
        $result = $this->db->query($query);

        $data = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        $total = count($data);

        echo json_encode([
            'success' => true,
            'data' => $data,
            'total' => $total
        ]);
	}

    // public function get_jadwal_konten()
	// {
    //     $query = "SELECT * , DATE_FORMAT(tgl_upload, '%d/%m/%Y') AS 'format_tgl' FROM  tb_konten
    //             WHERE status <> '<h5><span class=\"right badge badge-success\">Done</span></h5>' ";
    //     $result = $this->db->query($query);

    //     $data = array();
    //     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //         if ($row['kategori'] = 'Promo') {
    //             $data[] = array(
    //                 'title'           => $row['judul'],
    //                 'start'           => $row['tgl_upload'],
    //                 'backgroundColor' => '#f39c12', //yellow
    //                 'borderColor'     => '#f39c12' //yellow
    //             );
    //         }
    //     }

    //     echo json_encode($data);
	// }

    public function index_gambar($data)
	{
        $id = $data['id'];
        $query = "SELECT * FROM  tb_gambar WHERE id_konten = '$id' ORDER BY gambar ASC";
        $result = $this->db->query($query);

        $data = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        $total = count($data);

        echo json_encode([
            'success' => true,
            'data' => $data,
            'total' => $total
        ]);
	}

	public function store($data)
	{
        $huruf_pertama = strtoupper(substr($data['judul'], 0,3));
        $id = $huruf_pertama . date('is');

        $admin = $data['admin'];
        $waktu = $data['time'];

        $judul = $data['judul'];
        $kategori = $data['kategori'];
        $desainer = $data['desainer'];
        $tgl_upload = $data['tgl_upload'];
        $status = $data['status'];
        $konten = $data['konten'];

		try {
            $query = "INSERT INTO tb_konten VALUES ('$id', '$judul', '$kategori', '$desainer', '$tgl_upload', '$status' , '$konten')";
            $result = $this->db->query($query);

            $query3 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('$admin', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`$id`)\"><u>$judul</u></span> Telah Ditambah', '$waktu')";
            $result3 = $this->db->query($query3);

            echo json_encode([
            'success' => true,
            'message' => 'Konten Berhasil Dibuat!'
            ]);
        } catch (\Throwable $th) {
            print_r($th);
            die;
        }
        die();
	}

	public function edit($data)
	{
		$id = $data['id'];
		$query = "SELECT * FROM tb_konten WHERE id = '$id'";
		$result = $this->db->query($query);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo json_encode([
				'success' => true,
				'data' => $row
			]);
        }
	}

	public function update($data)
	{
        $admin = $data['admin'];
        $waktu = $data['time'];
        
        $id = $data['id'];
        $judul = $data['judul'];
        $kategori = $data['kategori'];
        $desainer = $data['desainer'];
        $tgl_upload = $data['tgl_upload'];
        $status = $data['status'];
        $konten = $this->db-> real_escape_string($data['konten']);

		try {
            $query = "UPDATE tb_konten SET judul='$judul', kategori='$kategori', desainer='$desainer', tgl_upload='$tgl_upload', status='$status', konten='$konten' WHERE id='$id'";
            $result = $this->db->query($query);

            $query2 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('$admin', 'Mengubah Konten', 
            'Konten <span class=\"text-primary\" onclick=\"detailKonten(`$id`)\"><u>$judul</u></span> Telah Diubah ', '$waktu')";
            $result2 = $this->db->query($query2);

            echo json_encode([
                'success' => true,
                'message' => 'Konten Berhasil di Update!'
            ]);
        } catch (\Throwable $th) {
            print_r($th);
            die;
        }
        die();
	}

	public function delete($data)
	{
        $id     = $data['id'];
        $judul  = $data['judul'];
        $admin = $data['admin'];
        $waktu = $data['time'];

		try {
            $query = "DELETE FROM tb_konten WHERE id='$id'";
            $result = $this->db->query($query);

            $query2 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('$admin', 'Menghapus Konten', 'Konten `$judul` Telah Dihapus ', '$waktu')";
            $result2 = $this->db->query($query2);

            echo json_encode([
                'success' => true,
                'message' => 'Konten Berhasil Dihapus!'
            ]);
        } catch (\Throwable $th) {
            print_r($th);
            die;
        }
        die();
	}

    public function delete_gambar($data)
	{
        $id     = $data['id'];
        $id_konten     = $data['id_konten'];
        $file = $data['file'];
        $admin = $data['admin'];
        $waktu = $data['time'];
        $judul = $data['judul'];

		try {
            $query = "DELETE FROM tb_gambar WHERE id='$id'";
            $result = $this->db->query($query);

            $query2 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('', '$admin', 'Menghapus Desain', ' `$file` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`$id_konten`)\"><u>$judul</u></span> Telah Dihapus ', '$waktu')";
            $result2 = $this->db->query($query2);

            unlink('../' . $file);

            echo json_encode([
             'success' => true,
             'message' => 'User Berhasil Dihapus!'
            ]);
        } catch (\Throwable $th) {
            print_r($th);
            die;
        }
        die();
	}

    public function search($data)
    {
        $keyword = $data['keyword'];

        $query = "SELECT * , DATE_FORMAT(tgl_upload, '%d/%m/%Y') AS 'format_tgl' FROM  tb_konten WHERE judul LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR desainer LIKE '%$keyword%' OR status LIKE '%$keyword%' OR tgl_upload LIKE '%$keyword%'";
        $result = $this->db->query($query);

        $data = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    }

    public function upload_desain($data)
	{
        $id     = $data['id_k'];
        $admin = $data['id_admin'];
        $waktu = $data['dateTime'];
        $judul = $data['jdl'];

		try {

            $time = date('Y-m-d H:i:s');
            $ekstensi_diperbolehkan = ['png','jpg', 'jpeg'];
            $nama = $_FILES['file']['name'];
            $id_konten = $_POST['id_k'];
            $x    = explode('.', $nama);
            $ekstensi   = strtolower(end($x));
            $ukuran     = $_FILES['file']['size'];
            $file_tmp   = $_FILES['file']['tmp_name'];
            $newName    = 'img/desain/' . substr($nama, 0, -4) . ' [R' . rand(1111,9999) . '].' . $ekstensi;
            if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
                move_uploaded_file($file_tmp, '../' . $newName);
                $sql = "INSERT INTO tb_gambar VALUES ('', '$id_konten', '$newName', '$time')"; 
                $insert = $this->db->query($sql);

            } else {
                return false;
            }
            
            echo json_encode([
                'success' => true,
            ]);

        } catch (\Throwable $th) {
            print_r($th);
            die;
        }

        $query2 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('$admin', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`$id`)\"><u>$judul</u></span> Telah Diupload ', '$waktu')";
        $result2 = $this->db->query($query2);

        die();
	}

    public function get_ig()
	{
        $query = "SELECT * FROM  tb_instagram";
        $result = $this->db->query($query);

        $data = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        $total = count($data);

        echo json_encode([
            'success' => true,
            'data' => $data,
            'total' => $total
        ]);
	}

    public function store_ig($data)
	{

        $ig_username = $data['ig_username'];
        $ig_password = $data['ig_password'];
        $access_token = $data['access_token'];
        $status = $data['status'];

        if ($status == 'Digunakan') {

            $query = "UPDATE tb_instagram set status = 'Tidak Digunakan'";
            $result = $this->db->query($query);

            try {
                $query = "INSERT INTO tb_instagram  (ig_username, ig_password, access_token, status)  VALUES ( '$ig_username', '$ig_password', '$access_token', '$status')";
                $result = $this->db->query($query);
    
                echo json_encode([
                'success' => true,
                'message' => 'Konten Berhasil Dibuat!'
                ]);
            } catch (\Throwable $th) {
                print_r($th);
                die;
            }
            die();

        } else {

            try {
                $query = "INSERT INTO tb_instagram VALUES ('', '$ig_username', '$ig_password', '$access_token', '$status')";
                $result = $this->db->query($query);
    
                echo json_encode([
                'success' => true,
                'message' => 'Konten Berhasil Dibuat!'
                ]);
            } catch (\Throwable $th) {
                print_r($th);
                die;
            }
            die();

        }

	}

    public function edit_ig($data)
	{
		$id = $data['id'];
        
		$query = "SELECT * FROM tb_instagram WHERE id = '$id'";
		$result = $this->db->query($query);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo json_encode([
				'success' => true,
				'data' => $row
			]);
        }
	}

	public function update_ig($data)
	{
        $ig_username = $data['ig_username'];
        $id = $data['id'];
        $ig_password = $data['ig_password'];
        $access_token = $data['access_token'];
        $status = $data['status'];

        if ($status == 'Digunakan') {

            $query = "UPDATE tb_instagram set status = 'Tidak Digunakan'";
            $result = $this->db->query($query);

            try {
                $query = "UPDATE tb_instagram SET ig_username='$ig_username', ig_password='$ig_password', access_token='$access_token', status='$status' WHERE id='$id'";
                $result = $this->db->query($query);
    
                echo json_encode([
                'success' => true,
                'message' => 'Konten Berhasil Dibuat!'
                ]);
            } catch (\Throwable $th) {
                print_r($th);
                die;
            }
            die();

        } else {

            try {
                $query = "UPDATE tb_instagram SET ig_username='$ig_username', ig_password='$ig_password', access_token='$access_token', status='$status' WHERE id='$id'";
                $result = $this->db->query($query);
    
                echo json_encode([
                    'success' => true,
                    
                    'message' => 'Konten Berhasil di Update!'
                ]);
            } catch (\Throwable $th) {
                print_r($th);
                die;
            }
            die();

        }

		
	}

    public function delete_ig($data)
	{
        $id     = $data['id'];

		try {
            $query = "DELETE FROM tb_instagram WHERE id='$id'";
            $result = $this->db->query($query);

            echo json_encode([
                'success' => true,
                'message' => 'Konten Berhasil Dihapus!'
            ]);
        } catch (\Throwable $th) {
            print_r($th);
            die;
        }
        die();
	}

    public function get_active_ig()
	{
        $query = "SELECT * FROM  tb_instagram WHERE status = 'Digunakan'";
        $result = $this->db->query($query);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo json_encode([
				'success' => true,
				'data' => $row
			]);
        }

	}

    public function index_dashboard() {
        $query1 = "SELECT * FROM  tb_konten";
        $result1 = $this->db->query($query1);
        $data1 = array();
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            $data1[] = $row1;
        }
        $total1 = count($data1);

        $query2 = "SELECT * FROM  tb_konten WHERE status = '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>'";
        $result2 = $this->db->query($query2);
        $data2 = array();
        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
            $data2[] = $row2;
        }
        $total2 = count($data2);

        $query3 = "SELECT * FROM  tb_user";
        $result3 = $this->db->query($query3);
        $data3 = array();
        while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
            $data3[] = $row3;
        }
        $total3 = count($data3);

        echo json_encode([
            'success' => true,
            'total_konten' => $total1,
            'total_upld' => $total2,
            'total_user' => $total3
        ]);
	}

}