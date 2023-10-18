<?php


?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12 mx-auto">
    <!-- <a href="<?= BASE_URL . 'admin/?page=pengguna&action=tambahdata' ?>" class="btn btn-primary mt-3 mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a> -->

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

   
<div class="row">
            <div class="col-md-12 align-content-center justify-content-center">
              <div class="container p-3">
                <div id="calendar"></div>
                </div>
            </div>
           
        </div>

        
     
</div>

 <!-- Event Details Modal -->
 <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Detail Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                <!-- <form action="?page=agenda&action=tolak&request=hadir" method="post" class="">
                                <input type="hidden" name="id" value="" id="id_hadir">
                        <button type="submit" class="btn btn-success">Konfirmasi Hadir</button>
                            </form> -->
                    <div class="container-fluid">
                        <dl>
                            
                        <dt class="text-muted">ID</dt>
                            <dd id="id" class="fw-bold fs-4"></dd>


                            <dt class="text-muted">Judul Kegiatan</dt>
                            <dd id="judul_kegiatan" class="fw-bold fs-4"></dd>

                            <dt class="text-muted">Jenis Kegiatan</dt>
                            <dd id="namajenis" class=""></dd>
                            <dt class="text-muted">Mulai</dt>
                            <dd id="mulai" class=""></dd>
                            <dt class="text-muted">Selesai</dt>
                            <dd id="selesai" class=""></dd>
                        </dl>

                        
                    </div>
                    
                   
                   

                    <!-- <form action="?page=agenda&action=tolak&request=tolak" method="post">
                                <input type="hidden" name="id" value="" id="id_jadwal">
                                <div class="form-group mb-2">
                                    <label for="deskripsi" class="control-label">Alasan Tolak</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="alasan" id="deskripsi" required></textarea>
                                </div>
                                <div class="modal-footer rounded-0">
                   

                        <button type="submit" class="btn btn-danger" id="tolak">Tolak</button>
                      
                     -->
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div> 
                            </form>
                            
                </div>
                
               
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php 
$schedules = $conn->query("SELECT * FROM `jadwal` JOIN jenis_kegiatan USING (id_kegiatan)");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['mulai']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['selesai']));
    $row['namajenis'] = $row['nama_kegiatan'];
    $sched_res[$row['id']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')

    console.log(scheds);
</script>
