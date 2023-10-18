<?php
$query = mysqli_query($conn, "SELECT * FROM `jenis_kegiatan` ORDER BY id_kegiatan DESC");

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-10 mx-auto">
    <a href="<?= BASE_URL . 'admin/?page=jeniskegiatan&action=tambahdata' ?>" class="btn btn-primary mt-3 mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a>

    <!-- show sweet alert -->
    <?php if (isset($_SESSION['message'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>"
        data-type="<?= $_SESSION['type'] ?>"></div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['title']);
        unset($_SESSION['type']);
    endif;
    ?>

    <div class="card card-accent-primary">
        <div class="card-header"><strong>Data Jenis Kegiatan</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="jeniskegiatan">
                    <thead>
                    <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Kegiatan</th>

          <th scope="col">Action</th>
         
        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr id="<?= $data['id_kegiatan'] ?>">
                        <td><?= $i++ ?></td>
                            <td><?= $data['nama_kegiatan'] ?></td>
                           
                            <td>
                                <a href="<?= BASE_URL . 'admin/?page=jeniskegiatan&action=editdata&id=' . $data['id_kegiatan'] ?>"
                                    class="btn btn-sm btn-primary mt-1">Ubah</a>
                                <button type="button" data-id="<?= $data['id_kegiatan'] ?>"
                                    data-nama="<?= $data['nama_kegiatan'] ?>"
                                    class="btn btn-sm btn-danger remove mt-1">Hapus</button>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>