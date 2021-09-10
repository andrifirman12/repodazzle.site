<?php

/**
 *
 */
class Komentar
{
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

    public function get_komentar($data)
	{
        $id = $data['id'];

        $query = "SELECT * FROM tb_komentar, tb_konten, tb_user
        WHERE tb_komentar.`id_konten` = tb_konten.`id`
        AND tb_komentar.`id_user` = tb_user.`id`
        AND tb_komentar.`id_konten` = '$id' 
        ORDER BY tb_komentar.`id` ASC";

        $result = $this->db->query($query);

        $data_komen = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data_komen[] = $row;
        }

        $total = count($data_komen);

        echo json_encode([
        'success' => true,
        'data' => $data_komen,
        'total' => $total
        ]);
	}


	public function store($data)
	{
        $admin = $data['admin'];
        $judul = $data['judul'];
        $nama_admin = $data['nama_admin'];
        $waktu = $data['time'];
        $id_konten = $data['id_konten'];
        $id_user = $data['id_user'];
        $komentar = $data['komentar'];
        $waktu = $data['waktu'];

		try {
            $query = "INSERT INTO tb_komentar (id_konten, id_user, komentar, waktu) VALUES ('$id_konten', '$id_user', '$komentar', '$waktu')";
            $result = $this->db->query($query);

            $query2 = "INSERT INTO tb_notifikasi (id_user, jenis_aksi, aksi, waktu) VALUES ('$admin', 'Komentar', '`$nama_admin` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`$id_konten`)\"><u>$judul</u></span> ', '$waktu')";
            $result2 = $this->db->query($query2);

            echo json_encode([
            'success' => true,
            'message' => 'Komentar Berhasil Dibuat!'
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
            $query = "DELETE FROM tb_komentar WHERE id='$id'";
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

        $query = "SELECT * FROM tb_komentar WHERE nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR role LIKE '%$keyword%' OR id LIKE '%$keyword%'";
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