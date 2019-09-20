<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $response = array();
    //mendapatkan data
    $user_id = $_POST['user_id'];
    $pesan = $_POST['pesan'];

    require_once('koneksi.php');

    $sql = "INSERT INTO pesan (user_id ,pesan) VALUES('$user_id','$pesan')";
    if (mysqli_query($db, $sql)) {
        $response["value"] = 1;
        $response["message"] = "Sukses mengirim Pesan";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "oops! Coba lagi!";
        echo json_encode($response);
    }

    // tutup database
    mysqli_close($db);
} else {
    $response["value"] = 0;
    $response["message"] = "oops! Coba lagi!";
    echo json_encode($response);
}
