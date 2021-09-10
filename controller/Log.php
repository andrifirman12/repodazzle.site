<?php

/**
 *
 */
class Log
{
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function index()
	{

        date_default_timezone_set('Asia/Jakarta');
        $datetime = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime('-2 days'));

        $query = "SELECT * FROM tb_notifikasi, tb_user
        WHERE tb_notifikasi.`id_user` = tb_user.`id` 
        AND tb_notifikasi.`waktu` BETWEEN '$yesterday' AND '$datetime' 
        ORDER BY tb_notifikasi.`id_notifikasi` DESC" ;
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

    public function index_3d() {

        date_default_timezone_set('Asia/Jakarta');
        $datetime = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime('-3 days'));

        $query = "SELECT * FROM tb_notifikasi, tb_user
        WHERE tb_notifikasi.`id_user` = tb_user.`id` 
        AND tb_notifikasi.`waktu` BETWEEN '$yesterday' AND '$datetime' 
        ORDER BY tb_notifikasi.`id_notifikasi` DESC" ;
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

    public function index_7d() {

        date_default_timezone_set('Asia/Jakarta');
        $datetime = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime('-7 days'));

        $query = "SELECT * FROM tb_notifikasi, tb_user
        WHERE tb_notifikasi.`id_user` = tb_user.`id` 
        AND tb_notifikasi.`waktu` BETWEEN '$yesterday' AND '$datetime' 
        ORDER BY tb_notifikasi.`id_notifikasi` DESC" ;
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

    public function index_dt($data) {

        $dt_x = $data['dt_x'];
        $dt_y = $data['dt_y'];

        $query = "SELECT * FROM tb_notifikasi, tb_user
        WHERE tb_notifikasi.`id_user` = tb_user.`id` 
        AND tb_notifikasi.`waktu` BETWEEN '$dt_x' AND '$dt_y' 
        ORDER BY tb_notifikasi.`id_notifikasi` DESC" ;
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

    public function index_all_log()
	{

        date_default_timezone_set('Asia/Jakarta');
        $datetime = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime('-1 days'));

        $query = "SELECT * FROM tb_notifikasi, tb_user
        WHERE tb_notifikasi.`id_user` = tb_user.`id`
        ORDER BY tb_notifikasi.`id_notifikasi` DESC" ;
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

    public function index_notif_nav($data)
	{

        $last_login = $data['last_login'];
        $id_user = $data['id_user'];
        
        date_default_timezone_set('Asia/Jakarta');
        $datetime = date('Y-m-d H:i:s');

        $query = "SELECT * FROM tb_notifikasi
        WHERE jenis_aksi <> 'Komentar' AND id_user <> '$id_user' AND waktu BETWEEN '$last_login' AND '$datetime'" ;
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

    public function index_komen_nav($data)
	{

        $last_login = $data['last_login'];
        $id_user = $data['id_user'];
        
        date_default_timezone_set('Asia/Jakarta');
        $datetime = date('Y-m-d H:i:s');

        $query = "SELECT * FROM tb_notifikasi
        WHERE jenis_aksi = 'Komentar' AND id_user <> '$id_user' AND waktu BETWEEN '$last_login' AND '$datetime'" ;
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

    public function update_last_login($data)
	{
        $id_user = $data['id_user'];
        date_default_timezone_set('Asia/Jakarta');
        $datetime = date('Y-m-d H:i:s');

        $query = "UPDATE tb_user SET last_login = '$datetime' WHERE id = '$id_user'" ;
        $result = $this->db->query($query);

        $query2 = "SELECT * FROM tb_notifikasi, tb_user
        WHERE tb_notifikasi.`id_user` = tb_user.`id` 
        ORDER BY tb_notifikasi.`id_notifikasi` DESC" ;
        $result2 = $this->db->query($query2);

        $data = array();
        while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
            $data[] = $row;
        }

        $total = count($data);

        echo json_encode([
        'success' => true,
        'data' => $data,
        'total' => $total
        ]);
	}

}