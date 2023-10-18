<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // print_r($_POST);
    // die;
    $id = $_GET['id'];
    // $alasan = $_POST['alasan'];
    // 0 Hadir
    // 1 Ditolak
   
        $sql = mysqli_query($conn, "UPDATE `jadwal` SET `status_req`= 1 WHERE id = '$id'");
   
  

    if ($sql) {
        $_SESSION['message'] = 'Berhasil';
        $_SESSION['title'] = 'Data Hadir';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Gagal';
        $_SESSION['title'] = 'Data Hadir';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=request';</script>";
}
?>