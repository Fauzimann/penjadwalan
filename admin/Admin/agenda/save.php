<?php 
require_once('../function/koneksi.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);

$allday = isset($allday);

if(empty($id)){
    $sql = mysqli_query($conn,"INSERT INTO `jadwal` (`mulai`,`selesai`,`id_kegiatan`,`judul_kegiatan`,`lokasi`,`deskripsi`,`instansi`,`jenis_permohonan`,`stat`,`pic`,`id_user`) VALUES ('$mulai','$selesai','$id_kegiatan','$judul_kegiatan','$lokasi','$deskripsi','$instansi','$jenis_permohonan','$stat','$pic',1)");

    // $insertId = mysqli_insert_id($conn);

    // $sql2 = mysqli_query($conn,"INSERT INTO `penolakan` (`id_user`,`id_jadwal`,`status_tolak`,`alasan`) VALUES (NULL,'$insertId',NULL,NULL)");
}else{
    $sql = mysqli_query($conn,"UPDATE `jadwal` set `mulai` = '{$mulai}', `selesai` = '{$selesai}', `id_kegiatan` = '{$id_kegiatan}', `judul_kegiatan` = '{$judul_kegiatan}', `lokasi` = '{$lokasi}', `deskripsi` = '{$deskripsi}', `instansi` = '{$instansi}', `jenis_permohonan` = '{$jenis_permohonan}', `stat` = '{$stat}', `pic` = '{$pic}' where `id` = '{$id}'");
}

if($save){
    $_SESSION['message'] = 'Tambah Jadwal Berhasil';
    $_SESSION['title'] = 'Data Jadwal';
    $_SESSION['type'] = 'success';
}else{
    $_SESSION['message'] = 'Tambah Jadwal Berhasil';
    $_SESSION['title'] = 'Data Jadwal';
    $_SESSION['type'] = 'success';
}

echo "<script>window.location.href = '?page=agenda';</script>";
$conn->close();
?>