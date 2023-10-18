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
            <div class="col-md-6">
                <div id="calendar"></div>
            </div>
            <div class="col-md-6">
                <div class="card rounded-0">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Agenda</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="?page=agenda&action=save" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">

                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Mulai</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="mulai" id="mulai" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">Selesai</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="selesai" id="selesai" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Judul Kegiatan</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="judul_kegiatan" id="judul_kegiatan" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="lokasi" class="control-label">Lokasi</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="lokasi" id="lokasi" required></textarea>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="deskripsi" class="control-label">Deskripsi</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="deskripsi" id="deskripsi" required></textarea>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Jenis Kegiatan</label>
                                   <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                                    <?php 
                                    $query = mysqli_query($conn,"SELECT * FROM jenis_kegiatan");
                                    
                                    ?>
                                    <?php  while ($getdata = mysqli_fetch_assoc($query)) : ?>
                    <option value="<?=$getdata['id_kegiatan']?>"><?=$getdata['nama_kegiatan']?></option>
                    <?php endwhile ?>
                                   </select>
                                </div>
                                

                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Instansi</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="instansi" id="instansi" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Jenis Permohonan</label>
                                    <select name="jenis_permohonan" id="jenis_permohonan" class="form-control">
                                        <option value="Internal">Internal</option>
                                        <option value="External">External</option>
                                    </select>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Status</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="stat" id="stat" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">PIC</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="pic" id="pic" required>
                                </div>
                                  <div class="form-group has-feedback">

                                    <!-- ini tabahan -->
                                <label for="selesai">Upload</label>
                                <input type="file" class="form-control" id="photo" name="photo"
                                    data-required-error="Data tidak boleh kosong" placeholder="Upload" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <span class="help-block with-errors"></span>
                            </div>
                
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                    
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
                    <div class="container-fluid">
                        <dl>
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
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php 
$schedules = $conn->query("SELECT * FROM `jadwal` left join jenis_kegiatan ON jenis_kegiatan.id_kegiatan=jadwal.id_kegiatan;");
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
