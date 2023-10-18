<?php
$query = mysqli_query($conn, "SELECT request.id as id_request, request.judul_kegiatan, request.mulai,request.selesai, user.nama, user.id as id_user FROM `request` JOIN user ON user.id=request.id_user ORDER BY request.id DESC");

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-10 mx-auto">
    <a href="<?= BASE_URL . 'admin/?page=request&action=tambahdata' ?>" class="btn btn-primary mt-3 mb-3">
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
        <div class="card-header"><strong>Data Request</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="request">
                    <thead>
                    <tr>
          <th scope="col">No</th>
          <th scope="col">Judul Kegiatan</th>
          <th scope="col">Mulai</th>
          <th scope="col">Selesai</th>

          <th scope="col">Action</th>
         
        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr id="<?= $data['id_request'] ?>">
                        <td><?= $i++ ?></td>
                         
                            <td><?= $data['judul_kegiatan'] ?></td>
                            <td><?= $data['mulai'] ?></td>
                            <td><?= $data['selesai'] ?></td>
                           
                            <td>
                                <a href="<?= BASE_URL . 'admin/?page=request&action=editdata&id=' . $data['id_request'] ?>"
                                    class="btn btn-sm btn-primary mt-1">Ubah</a>
                                <button type="button" data-id="<?= $data['id_request'] ?>"
                                    data-nama="<?= $data['judul_kegiatan'] ?>"
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