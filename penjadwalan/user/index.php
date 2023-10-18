<?php require('user/template/header.php') ?>

        <div class="heading2">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">
                    <img src="user/assets/img/fix.png" alt="Gambar tidak ditemukan" width="75px" height="75px" class="">
                    <span class="judul-inka" style="padding-top: 100px;">Informasi Jadwal Kegiatan DISKOMINFO Jabar</span>
                  </a>
                </div>
            </nav>
        </div>
        <!-- <div class="heading2">
            <div class="bar2 d-flex justify-content-between">
                <div class="nav2 text-black">
                    <i class="fa-solid fa-calendar-days logo-calendar" style="color: #000;"></i>
                    <?php 
                   $tgl_hari_ini = date('d-m-Y');
              
                   $sql = mysqli_query($conn, "SELECT * FROM (
                       SELECT jadwal.judul_kegiatan, DATE_FORMAT(mulai, '%d-%m-%Y') AS tanggal_terformat FROM jadwal
                   ) AS subquery
                   WHERE subquery.tanggal_terformat = '$tgl_hari_ini';");
                   
                  $getsql = mysqli_fetch_assoc($sql);
                    ?>
                    <?php if(mysqli_num_rows($sql) > 0) : ?>
                    <m class="judul-calendar" style="color: #000;" >Kegiatan Hari Ini : <?= $getsql['judul_kegiatan'] ?> </m>
                    <?php else : ?>
                    <m class="judul-calendar" style="color: #000;">Kegiatan Hari Ini : Tidak Ada Kegiatan</m>
                    <?php endif?>
                </div>
           
        </div>
    </div> -->
        <?php if(!isset($_SESSION['id'])) : ?>
         <div class="heading3">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="margin: 20px;">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="assets/img/im1.jpg" style="width: 80px; height: 500px;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block ">
                      <h5 class="caption"></h5>
                      <p></p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/im2.jpg" style="width: 80px; height: 500px;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="caption"></h5>
                      <p></p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/im3.jpg" style="width: 80px; height: 500px;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="caption"></h5>
                      <p></p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
            <?php else : ?>
        <div class="heading2" style="background-color: #efefef;">
      
            <div class="col-12 mx-auto">

   
                <div class="row">
            <div class="col-md-6 align-content-center justify-content-center">
              <div class="container p-3">
                <div id="calendar"></div>
                </div>
            </div>
            <div class="col-md-6 align-content-center justify-content-center mt-3">
            
                <div class="card rounded-0">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Agenda</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                        <?php 
                   $tgl_hari_ini = date('d-m-Y');
              
                   $sql = mysqli_query($conn, "SELECT * FROM (
                       SELECT jadwal.judul_kegiatan, DATE_FORMAT(mulai, '%d-%m-%Y') AS tanggal_terformat FROM jadwal
                   ) AS subquery
                   WHERE subquery.tanggal_terformat = '$tgl_hari_ini';");
                   
                  $getsql = mysqli_fetch_assoc($sql);
                    ?>
                    <?php if(mysqli_num_rows($sql) > 0) : ?>
                    <m class="judul-calendar" style="color: #000;" >Kegiatan Hari Ini : <?= $getsql['judul_kegiatan'] ?> </m>
                    <?php else : ?>
                    <m class="judul-calendar" style="color: #000;">Kegiatan Hari Ini : Tidak Ada Kegiatan</m>
                    <?php endif?>
                    <br>
                    <?php 
                   $tgl_hari_ini = date('d-m-Y');
              
                   $sql = mysqli_query($conn, "SELECT * FROM jadwal order by id DESC limit 1");
                   
                  $getsql = mysqli_fetch_assoc($sql);
                    ?>

                    <m class="judul-calendar" style="color: #000;" > Jadwal Kegiatan <?= $getsql['judul_kegiatan'] ?> </m>
                        </div>
                    </div>
                   
                </div>
            </div>
             
         
        </div>
                        <?php endif ?>
        
     
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
                    
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div> 
                            </form>
                            
                </div>
                
               
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
<!-- Card -->

<div class="heading3">
  <div class="container">
  <h1 class="judul1" style="text-align:center;"><b>Jadwal Kegiatan</b></h1>
    <div class="row justify-content-between">
        <?php 
        $query = mysqli_query($conn,"SELECT * FROM jadwal");
        $getquery = mysqli_fetch_assoc($query);
        ?>
        <?php foreach($query as $q) :?>
                <div class="col">
                    <div class="card" onmouseover="hover_card(this)" onmouseout="out_card(this)" style="min-height:300px">
                        <img src="user/assets/gambar/<?= $q['photo']?>" class="card-img-top">
                        <div class="card-body">
                        <div class="card-title subjudul1"><b><?php
                        $phpdate = strtotime( $q['mulai'] );
                        $phpdateselesai = strtotime( $q['selesai'] );
                        $mysqldate = date( 'd-M-Y', $phpdate );
                        $mysqldateselesai = date( 'd-M-Y', $phpdateselesai );
                        echo $mysqldate .' - '. $mysqldateselesai;
                        ?> </b></div>
                        <p class="card-text deskripsi1"><?= $q['deskripsi'] ?></p>
                        </div>
                    </div>
                </div>
              <?php endforeach?>  
            </div>
            </div>
    </div>


<div class="heading3">
  <div class="container">
  <h1 class="judul1" style="text-align:center;"><b>Kegiatan Terlaksana</b></h1>
    <div class="row justify-content-between">
                <div class="col">
                    <div class="card" onmouseover="hover_card(this)" onmouseout="out_card(this)" style="min-height:300px">
                        <img src="assets/img/1t.png" class="card-img-top">
                        <div class="card-body">
                        <div class="card-title subjudul1"><b>26 - 27 Juni 2023</b></div>
                        <p class="card-text deskripsi1">Fasilitasi Pelaksanaan Seleksi Calon Anggota  Badan Pengawas Pemilu (BAWASLU)
Dengan Metode Computer Assisted Test (CAT) BKN  di Kantor Regional III BKN Bandung</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" onmouseover="hover_card(this)" onmouseout="out_card(this)" style="min-height:300px">
                        <img src="assets/img/2d.png" class="card-img-top" alt="Sorry, Picture Not Found">
                        <div class="card-body" >
                        <div class="card-title subjudul1"><b>05 Juli 2023</b></div>
                        <p class="card-text deskripsi1">Fasilitasi Pelaksanaan Ujian Dinas dan Ujian Penyesuaian Kenaikan Pangkat TA 2023 Dengan Metode Computer Assisted Test (CAT) BKN bagi PNS di Lingkungan Pemerintah Kabupaten Cianjur
</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" onmouseover="hover_card(this)" onmouseout="out_card(this)" style="min-height:300px">
                        <img src="assets/img/3f.jpg" class="card-img-top" alt="Sorry, Picture Not Found">
                        <div class="card-body">
                        <div class="card-title subjudul1"><b>15 Agustus 2023</b></div>
                        <p class="card-text deskripsi1">Fasilitasi Pelaksanaan Ujian Dinas CAT Ujian Dinas Tingkat I dan II serta Ujian Penyesuaian Kenaikan Pangkat
di Lingkungan Pemkab Majalengka Dengan CAT BKN di Kantor Regional III BKN</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" onmouseover="hover_card(this)" onmouseout="out_card(this)" style="min-height:300px">
                        <img src="assets/img/7h.jpg" class="card-img-top" alt="Sorry, Picture Not Found">
                        <div class="card-body">
                        <div class="card-title subjudul1"><b>26  Juli 2023</b></div>
                        <p class="card-text deskripsi1">Fasilitasi Pelaksanaan	Ujian Dinas TK. I dan Tk. II  serta Ujian Penyesuaian Kenaikan Pangkat  Pemerintah Kab. Bandung Barat
Dengan Metode CAT BKN di Kantor Regional III BKN Bandung
</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>

    <?php 
$schedules = $conn->query("SELECT * FROM `jadwal`");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['mulai']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['selesai']));
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

        </div>
        <?php require('user/template/footer.php') ?> 