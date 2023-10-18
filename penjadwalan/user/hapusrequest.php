<?php
require('../function/helper.php');
require('../function/koneksi.php');

?>

<?php



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
   
    $sql = mysqli_query($conn, "DELETE FROM JADWAL WHERE id = '$id'");
    

    if ($sql) {
        $_SESSION['message'] = 'Hapus Data Berhasil';
        $_SESSION['title'] = 'Data Request';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Hapus Data Gagal';
        $_SESSION['title'] = 'Data Request';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '../user/request.php';</script>";
}
?>