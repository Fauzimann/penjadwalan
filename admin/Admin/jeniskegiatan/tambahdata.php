<?php

// $queryjabatan = mysqli_query($koneksi, "SELECT * FROM jabatan");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // print_r($_POST);
    // die;

    $nama_kegiatan = ucwords($_POST['nama_kegiatan']);
  

    $sql = mysqli_query($conn, "INSERT INTO `jenis_kegiatan`(`nama_kegiatan`) VALUES ('$nama_kegiatan')");

    if ($sql) {
        $_SESSION['message'] = 'Tambah Data Berhasil';
        $_SESSION['title'] = 'Data Jenis Kegiatan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Tambah Data Gagal';
        $_SESSION['title'] = 'Data Jenis Kegiatan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=jeniskegiatan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-10 mx-auto">
    <div class="card card-accent-primary">
        <div class="card-header"><strong>Tambah Data Jenis Kegiatan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_kegiatan">Nama Jenis Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama_kegiatan"
                        data-required-error="Data tidak boleh kosong" placeholder="Nama" required>
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