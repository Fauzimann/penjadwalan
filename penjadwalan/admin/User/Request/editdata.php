<?php

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM request WHERE id = '$id'");
$getdata = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_user = $_SESSION['id'];
    $judul_kegiatan = ucwords($_POST['judul_kegiatan']);
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];

   
        $sql = mysqli_query($conn, "UPDATE `request` SET `judul_kegiatan`='$judul_kegiatan',`mulai`='$mulai',`selesai`='$selesai' WHERE id = '$id'");
    

    if ($sql) {
        $_SESSION['message'] = 'Ubah Data Berhasil';
        $_SESSION['title'] = 'Data Request';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Ubah Data Gagal';
        $_SESSION['title'] = 'Data Request';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=request';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-10 mx-auto">
    <div class="card card-accent-primary">
        <div class="card-header"><strong>Ubah Data Jenis Kegiatan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

            <div class="form-group has-feedback">
                    <label for="judul_kegiatan">Judul Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="judul_kegiatan" value="<?= $getdata['judul_kegiatan']?>"
                        data-required-error="Data tidak boleh kosong" placeholder="Nama" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="mulai">Mulai</label>
                    <input type="datetime-local" class="form-control" id="nama" name="mulai" value="<?= $getdata['mulai']?>"
                        data-required-error="Data tidak boleh kosong" placeholder="Nama" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="selesai">Selesai</label>
                    <input type="datetime-local" class="form-control" id="nama" name="selesai" value="<?= $getdata['selesai']?>"
                        data-required-error="Data tidak boleh kosong" placeholder="Nama" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/?page=request' ?>" class="btn btn-danger"><i
                            class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>