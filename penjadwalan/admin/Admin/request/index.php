<?php
// 0 = user
// 1 = admin
$query = mysqli_query($conn, "SELECT * from jadwal where id_user!=1 and status_req=0");

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-10 mx-auto">


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
          <th scope="col">Photo</th>
          <th scope="col">Aksi</th>

        
         
        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr id="<?= $data['id'] ?>">
                        <td><?= $i++ ?></td>
                         
        
                            <td><?= $data['judul_kegiatan'] ?></td>
                            <td><?= $data['mulai'] ?></td>
                            <td><?= $data['selesai'] ?></td>
                            <td><img src="../user/assets/gambar/<?php echo $data['photo'] ?>" width="235" height="240"></td>
                            <td>
                                <a href="<?= BASE_URL . 'admin/?page=request&action=validasi&id=' . $data['id'] ?>"
                                    class="btn btn-sm btn-primary mt-1">Validasi</a>
                              
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>