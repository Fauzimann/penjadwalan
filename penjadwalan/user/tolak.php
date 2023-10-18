<?php
require('../function/helper.php');
require('../function/koneksi.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // print_r($_POST);
    // die;
    $id_jadwal = $_POST['id_jadwal'];
    $id_user = $_SESSION['id'];
    $alasan = $_POST['alasan'];
    // 0 Hadir
    // 1 Ditolak
   
        $sql = mysqli_query($conn, "INSERT INTO `penolakan` (`id_user`,`id_jadwal`,`status_tolak`,`alasan`) values ('$id_user','$id_jadwal',1,'$alasan')");
  
   
  

    if ($sql) {
        $_SESSION['message'] = 'Berhasil';
        $_SESSION['title'] = 'Data Tolak';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Gagal';
        $_SESSION['title'] = 'Data Tolak';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '../user/agenda.php';</script>";
}
?>