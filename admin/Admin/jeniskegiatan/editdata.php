<?php

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM jenis_kegiatan WHERE id_kegiatan = '$id'");
$getdata = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama_kegiatan = ucwords($_POST['nama_kegiatan']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $level = htmlspecialchars($_POST['level']);
    $no_telp = htmlspecialchars($_POST['no_telp']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = (htmlspecialchars($_POST['password']));

   
    $sql = mysqli_query($conn, "UPDATE `jenis_kegiatan` SET `nama_kegiatan`='$nama_kegiatan'WHERE id_kegiatan = '$id'");
    

    if ($sql) {
        $_SESSION['message'] = 'Ubah Data Berhasil';
        $_SESSION['title'] = 'Data Jadwal';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Ubah Data Gagal';
        $_SESSION['title'] = 'Data Jadwal';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=jeniskegiatan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-10 mx-auto">
    <div class="card card-accent-primary">
        <div class="card-header"><strong>Ubah Data Jenis Kegiatan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_kegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama_kegiatan"
                        data-required-error="Data tidak boleh kosong" placeholder="Nama"
                        value="<?= $getdata['nama_kegiatan'] ?>" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/?page=jeniskegiatan' ?>" class="btn btn-danger"><i
                            class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>