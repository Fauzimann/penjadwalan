<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // print_r($_POST);
    // die;
    $id = $_GET['id_jadwal'];
    $id_user = $_SESSION['id'];
    // $alasan = $_POST['alasan'];
    // 0 Hadir
    // 1 Ditolak
   
        $sql = mysqli_query($conn, "INSERT INTO `penolakan` (`id_user`,`id_jadwal`,`status_tolak`) values ('$id_user','$id',0)");
   
  

    if ($sql) {
        $_SESSION['message'] = 'Berhasil';
        $_SESSION['title'] = 'Data Hadir';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Gagal';
        $_SESSION['title'] = 'Data Hadir';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=agenda';</script>";
}
?>