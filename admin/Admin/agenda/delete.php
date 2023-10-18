<?php 
require_once('../function/koneksi.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `jadwal` where id = '{$_GET['id']}'");
if($delete){
    $_SESSION['message'] = 'Jadwal Berhasil Dihapus';
    $_SESSION['title'] = 'Data Jadwal';
    $_SESSION['type'] = 'success';
}else{
    $_SESSION['message'] = 'Jadwal Gagal Dihapus';
    $_SESSION['title'] = 'Data Jadwal';
    $_SESSION['type'] = 'error';
}
echo "<script>window.location.href = '?page=agenda';</script>";
$conn->close();

?>