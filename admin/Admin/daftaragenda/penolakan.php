<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // print_r($_POST);
    // die;
    $id = $_GET['id'];
//  print_r($id);
//     die;
    // 2 Diterima
    // 3 Ditolak
    if($_GET['request'] == "terima"){
        $sql = mysqli_query($conn, "UPDATE `penolakan` SET `status_tolak`=2 WHERE id = '$id'");
    }else if($_GET['request'] == "tolak"){
        $sql = mysqli_query($conn, "UPDATE `penolakan` SET `status_tolak`=3 WHERE id = '$id'");
    }
   
  

    if ($sql) {
        $_SESSION['message'] = 'Berhasil';
        $_SESSION['title'] = 'Data Agenda';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Gagal';
        $_SESSION['title'] = 'Data Agenda';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=daftaragenda';</script>";
}
?>