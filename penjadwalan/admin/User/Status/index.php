<?php

$id_user =  $_SESSION['id'];
$query = mysqli_query($conn, "SELECT penolakan.id AS id_penolakan, user.id AS id_user, jadwal.id AS id_jadwal, penolakan.status_tolak,penolakan.alasan,user.nama,jadwal.judul_kegiatan,jadwal.mulai,jadwal.selesai FROM `penolakan` JOIN user ON user.id=penolakan.id_user JOIN jadwal ON jadwal.id=penolakan.id_jadwal WHERE id_user = '$id_user' GROUP BY id_jadwal");

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
        <div class="card-header"><strong>Status Konfirmasi</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="request">
                    <thead>
                    <tr>
          <th scope="col">No</th>
          
          <th scope="col">Judul Kegiatan</th>
        
          <th scope="col">Status Penolakan</th>
         

        
         
        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        while ($data = mysqli_fetch_assoc($query)) : ?>
        
                        <tr id="<?= $data['id_penolakan'] ?>">
                        <td><?= $i++ ?></td>
                         
                          
                            <td><?= $data['judul_kegiatan'] ?></td>
                           
                        
                        <?php if($data['status_tolak'] == 2) :?>
                            <td><span class="badge bg-success">Diterima</span></td>
                            <?php elseif($data['status_tolak'] == 3) :?>
                                <td><span class="badge bg-danger">Ditolak</span></td>
                                <?php else : ?>
                                <td> <span class="badge bg-warning">Menunggu Admin</span> </td>
<?php endif ?>
                                
                        </tr>

                        
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

