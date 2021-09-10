<?php

/**
 *
 */
class User
{
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function index()
	{
        $query = "SELECT * FROM tb_user";
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

    public function desainer()
	{
        $query = "SELECT * FROM tb_user WHERE role = 'desainer'";
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

    private function upload($image)
    {
        $ekstensi_diperbolehkan = ['png','jpg', 'jpeg'];
        $nama                   = $image['name'];
        $x                      = explode('.', $nama);
        $ekstensi               = strtolower(end($x));
        $ukuran                 = $image['size'];
        $file_tmp               = $image['tmp_name'];
        $newName                = 'img/avatar/' . date('dHis') . '.' . $ekstensi;
        if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
                move_uploaded_file($file_tmp, '../' . $newName);

                return $newName;
        } else {
            return false;
        }
    }

	public function store($data, $image)
	{
        
        $huruf_pertama = strtoupper(substr($data['nama'], 0,3));
        $id = $huruf_pertama . date('is');

        $admin = $data['admin'];
        $waktu = $data['time'];
        $nama = $data['nama'];
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];
        

        $newName   = $this->upload($image);

        if (!$newName) {
            die();
        }
        
        $query = "SELECT * FROM tb_user WHERE email = '$email'";
        $result = $this->db->query($query);

        if ($result === false) {
            
        try {
            $query = "INSERT INTO tb_user VALUES ('$id', '$newName', '$nama', '$email', '$password', '$role', '')";
            $result = $this->db->query($query);

            $query2 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('$admin', 'Menambah User', '`$role` Baru Ditambahkan', '$waktu')";
            $result2 = $this->db->query($query2);

            echo json_encode([
            'success' => true,
            'message' => 'User Berhasil Dibuat!'
            ]);
        } catch (\Throwable $th) {
            print_r($th);
            die;
        }
            
        } else {
            

        }       

		
	}

	public function edit($data)
	{
		$id = $data['id'];
		$query = "SELECT * FROM tb_user WHERE id = '$id'";
		$result = $this->db->query($query);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo json_encode([
				'success' => true,
				'data' => $row
			]);
        }
	}
    

	public function update($data, $image)
	{
        $admin = $data['admin'];
        $waktu = $data['time'];
        $id = $data['id'];
        $nama = $data['nama'];
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];
        $image_old = $data['image_old'];
        
        $query = "SELECT * FROM tb_user WHERE email = '$email'";
        $result = $this->db->query($query);
        
        if ($result === false) {

        try {
            if ($image) {
                $avatar = $this->upload($image);

                if (!$avatar) {
                    die();
                }

                unlink('../' . $image_old);
            } else {
                $avatar = $image_old;
            }
            $query = "UPDATE tb_user SET nama='$nama', email='$email', password='$password', role='$role', avatar='$avatar' WHERE id='$id'";
            $result = $this->db->query($query);

            $query2 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('$admin', 'Mengubah User', 'User `$id` Telah Diubah', '$waktu')";
            $result2 = $this->db->query($query2);

            echo json_encode([
                'success' => true,
                'message' => 'User Berhasil di Update!'
            ]);
            
        } catch (\Throwable $th) {
            print_r($th);
            die;
        }
		
        } else {
        
            
        }
	}

	public function delete($data)
	{
        $id     = $data['id'];
        $avatar = $data['avatar'];
        $admin = $data['admin'];
        $waktu = $data['time'];
        $role = $data['role'];

		try {
            $query = "DELETE FROM tb_user WHERE id='$id'";
            $result = $this->db->query($query);

            unlink('../' . $avatar);

            $query2 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('$admin', 'Menghapus User', 'Seorang `$role` Telah Dihapus ', '$waktu')";
            $result2 = $this->db->query($query2);

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

        $query = "SELECT * FROM tb_user WHERE nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR role LIKE '%$keyword%' OR id LIKE '%$keyword%'";
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

    public function auth($data) {

        $email = $data['email'];
        $password = $data['password'];
        $datetime = $data['dt'];

        $query = "SELECT * FROM tb_user WHERE email = '$email' AND password = '$password'";
        $result = $this->db->query($query);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($row != 0) {
            $query2 = "UPDATE tb_user SET last_login = '$datetime' WHERE email = '$email' AND password = '$password'";
            $result2 = $this->db->query($query2);

            echo json_encode([
                'success' => true,
                'data' => $row
            ]);
        } else {
            # code...
        }
        
    }

}