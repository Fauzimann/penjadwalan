<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "DELETE FROM `jenis_kegiatan` WHERE `id_kegiatan` = '$id'");
    // mysqli_query($koneksi, "UPDATE `karyawan` SET `status_karyawan`= 0 WHERE id_karyawan = '$id'");
}
