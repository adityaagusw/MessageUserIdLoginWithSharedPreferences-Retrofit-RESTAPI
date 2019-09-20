<?php

require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db->query("SELECT * FROM users WHERE username = '$username' and password = '$password' ");

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_object()) {
            $data = array("kode" => 1, "pesan" => "data ditemukan", "result" =>
            array(
                array("id" => $row->id,  "nama" => $row->nama, "jenis_kelamin" => $row->jk, "username" => $row->username)
            ));

            echo json_encode($data);
        }
    } else {
        echo json_encode(array("kode" => 0, "pesan" => "Data username tidak terdaftar"));
    }
} else {
    echo json_encode(array("kode" => 0, "pesan" => "Request tidak valid"));
}
