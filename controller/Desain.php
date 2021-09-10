<?php

/**
 *
 */
class Desain
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

    private function upload($image)
    {
        $ekstensi_diperbolehkan = ['png','jpg', 'jpeg'];
        $nama                   = $image['name'];
        $x                      = explode('.', $nama);
        $ekstensi               = strtolower(end($x));
        $ukuran                 = $image['size'];
        $file_tmp               = $image['tmp_name'];
        $newName                = 'img/avatar/' . date('dm') . '.' . $ekstensi;
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

        $nama = $data['nama'];
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];

        $newName   = $this->upload($image);

        if (!$newName) {
            die();
        }

		try {
            $query = "INSERT INTO tb_user VALUES ('$id', '$newName', '$nama', '$email', '$password', '$role')";
            $result = $this->db->query($query);

            echo json_encode([
            'success' => true,
            'message' => 'User Berhasil Dibuat!'
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
        $id = $data['id'];
        $nama = $data['nama'];
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];
        $image_old = $data['image_old'];

		try {
            if ($image) {
                $avatar = $this->upload($image);

                if (!$avatar) {
                    die();
                }

                unlink('../../' . $image_old);
            } else {
                $avatar = $image_old;
            }
            $query = "UPDATE tb_user SET nama='$nama', email='$email', password='$password', role='$role', avatar='$avatar' WHERE id='$id'";
            $result = $this->db->query($query);

            echo json_encode([
             'success' => true,
             'message' => 'User Berhasil di Update!'
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
        $avatar = $data['avatar'];

		try {
            $query = "DELETE FROM tb_user WHERE id='$id'";
            $result = $this->db->query($query);

            unlink('../' . $avatar);

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
}