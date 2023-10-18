<?php
$query = mysqli_query($conn, "SELECT penolakan.id AS id_penolakan, penolakan.status_tolak,penolakan.alasan,jadwal.id AS id_jadwal, jadwal.judul_kegiatan,jadwal.mulai,jadwal.selesai,user.id AS id_user, user.nama from penolakan JOIN user ON user.id=penolakan.id_user JOIN jadwal ON jadwal.id=penolakan.id_jadwal");

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
        <div class="card-header"><strong>Daftar Agenda</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="request">
                    <thead>
                    <tr>
          <th scope="col">No</th>
          <th scope="col">User</th>
          <th scope="col">Judul Kegiatan</th>
          <th scope="col">Mulai</th>
          <th scope="col">Selesai</th>
          <th scope="col">Status</th>
          <th scope="col">Alasan</th>
          <th scope="col">Action</th>

        
         
        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr id="<?= $data['id_penolakan'] ?>">
                        <td><?= $i++ ?></td>
                         
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['judul_kegiatan'] ?></td>
                            <td><?= $data['mulai'] ?></td>
                            <td><?= $data['selesai'] ?></td>
                            <?php if($data['status_tolak'] == 1) :?>
                                <td><span class="badge bg-danger">Tidak Hadir</span></td>
                             <?php elseif($data['status_tolak'] == 0) : ?>
                                <td><span class="badge bg-success"> Hadir</span></td>
                                <?php else : ?>
                                <td>-</td>
                                <?php endif ?>
                            <td><?= $data['alasan'] ?></td>
                           <?php if($data['status_tolak'] == 1) :?>
                            <td>
                                <a href="<?= BASE_URL . 'admin/?page=daftaragenda&action=penolakan&request=terima&id=' . $data['id_penolakan'] ?>"
                                    class="btn btn-sm btn-success mt-1">Terima</a>
                                
                                    <a href="<?= BASE_URL . 'admin/?page=daftaragenda&action=penolakan&request=tolak&id=' . $data['id_penolakan'] ?>"
                                    class="btn btn-sm btn-danger mt-1">Tolak</a>

                            </td>
                            <?php else :?>
                                <td> - </td>
                                <?php endif ?>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>