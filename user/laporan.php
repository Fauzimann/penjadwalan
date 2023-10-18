<?php
require('../function/helper.php');
require('../function/koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="../user/assets/css/bkn.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugin/fontawesome/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</head>
<body>
<div class="container-fluid">
            <!-- show sweet alert -->
        
        </div>

        <div class="heading1">
            <div class="bar2 d-flex justify-content-between">
                <div class="nav2 text-light">
                 
                </div>
                <div class="nav2 text-right " class="dropdown-center">
                <button class="btn btn-secondary 
                    dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </button>
         
   
                <ul class="dropdown-menu" style="">
                <li><a class="dropdown-item" href="../index.php" class="judul-calendar text-black m-2" style="text-decoration: none;">Beranda</a></li>
                <li><a class="dropdown-item" href="../user/request.php" class="judul-calendar text-black" style="text-decoration: none;">Request Jadwal</a></li>
                <li><a class="dropdown-item" href="../user/agenda.php" class="judul-calendar text-black" style="text-decoration: none;">Agenda/Jadwal</a></li>
                <li><a class="dropdown-item" href="../user/status.php" class="judul-calendar text-black" style="text-decoration: none;">Status Konfirmasi</a></li>
                 
                 </ul>
                 
                <?php
                if(isset($_SESSION['login'])) : ?>
                 <a href="proses_logout.php" class="btn btn-warning fw-bold btn-login text-dark"> Logout </a>
                 <?php else :?>
                    <a href="login/index.php" class="btn btn-warning fw-bold btn-login text-dark"> Login </a>
                <?php endif ?>
                
                
               
                </a>
            </div>
        </div>
    </div>
    <div class="heading2">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">
                    <img src="../user/assets/img/logo_diskom-min.png" alt="Gambar tidak ditemukan" width="250px" height="75px" class="">
                    <span class="judul-inka" style="padding-top: 100px;">Informasi Jadwal Kegiatan DISKOMINFO Jabar</span>
                  </a>
                </div>
            </nav>
        </div>
        <div class="heading3" style="margin: 80px;">
            <div class="container">
            <div class="col-10 mx-auto">
  <?php
  if (isset($_POST['cari'])) {
    $date1 = $_POST['bln'];
    $date2 = $_POST['thn'];
    $q = mysqli_query($conn, "select jadwal.*, jenis_kegiatan.id_kegiatan, jenis_kegiatan.nama_kegiatan
    from jadwal left join jenis_kegiatan on jadwal.id_kegiatan = jenis_kegiatan.id_kegiatan
    WHERE month(mulai) = '$date1' and year(mulai) = '$date2';");
} else {
    // perintah tampil semua data
    $q = mysqli_query($conn, "select jadwal.*, jenis_kegiatan.id_kegiatan, jenis_kegiatan.nama_kegiatan
        from jadwal inner join jenis_kegiatan on jadwal.id_kegiatan = jenis_kegiatan.id_kegiatan");
}

?>
<?php
$bulan_tes = array(
    '01' => "Januari",
    '02' => "Februari",
    '03' => "Maret",
    '04' => "April",
    '05' => "Mei",
    '06' => "Juni",
    '07' => "Juli",
    '08' => "Agustus",
    '09' => "September",
    '10' => "Oktober",
    '11' => "November",
    '12' => "Desember"
);
?>
 <h3>
 					<!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
								<button class="btn btn-danger">RESET</button>
							</a>-->
 					<?php if (!empty($_GET['cari'])) { ?>
 						Data Laporan Agenda <?= $bulan_tes[$_POST['bln']]; ?> <?= $_POST['thn']; ?>
 					<?php } elseif (!empty($_GET['hari'])) { ?>
 						Data Laporan Agenda <?= $_POST['hari']; ?>
 					<?php } else { ?>
 						Data Laporan Agenda <?= $bulan_tes[date('m')]; ?> <?= date('Y'); ?>
 					<?php } ?>
 				</h3>

                 <br />
 				<h4>Cari Laporan Per Bulan</h4>
 				<form method="post" action="laporan.php?cari=ok">
                 <table class="table table-striped table-bordered text-center" style="width:100%" id="request">

 						<tr>
 							<td>
 								<select name="bln" class="form-control">
 									<option selected="selected">Bulan</option>
 									<?php
										$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
										$jlh_bln = count($bulan);
										$bln1 = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
										$no = 1;
										for ($c = 0; $c < $jlh_bln; $c += 1) {
											echo "<option value='$bln1[$c]'> $bulan[$c] </option>";
											$no++;
										}
										?>
 								</select>
 							</td>
 							<td>
 								<?php
									$now = date('Y');
									echo "<select name='thn' class='form-control'>";
									echo '
									<option selected="selected">Tahun</option>';
									for ($a = 2017; $a <= $now; $a++) {
										echo "<option value='$a'>$a</option>";
									}
									echo "</select>";
									?>
 							</td>
 							<td>
 								<input type="hidden" name="periode" value="ya">
 								<button class="btn btn-primary" name="cari">
 									<i class="fa fa-search"></i> Cari
 								</button>

 								<?php if (!empty($_GET['cari'])) { ?>
 									<a href="pdf.php?cari=yes&bln=<?= $_POST['bln']; ?>&thn=<?= $_POST['thn']; ?>" class="btn btn-info" target="_blank"><i class="fa fa-download"></i>
 										Download PDF</a>
 								<?php } else { ?>
 									<a href="pdf.php" target="_blank" class="btn btn-info"><i class="fa fa-download"></i>
 										Download PDF</a>
 								<?php } ?>
 							</td>
 						</tr>
 					</table>
 				</form>
                 <div class="card card-accent-primary">
        <div class="card-header"><strong>Daftar Agenda</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="request">
                <thead>
 								<tr style="background:#DFF0D8;color:#333;">
 									<th>No.</th>
 									<th>Mulai</th>
 									<th>Selesai</th>
 									
 									<th>Jenis Kegiatan</th>
 									<th>Nama Agenda/Kegiatan</th>
 									<th>Lokasi</th>
 									<th>Deskrispi</th>
 									<th>Instansi Permohonan/Pengundang</th>
 									<th>Jenis Permohonan</th>
 									<th>Status</th>
 									<th>PIC</th>
 								</tr>
 							</thead>
 							<tbody>

 								<?php
									$no = 1;
									while ($isi = $q->fetch_assoc()) {
									?>
 									<tr>
 										<td><?= $no++ ?></td>
 										<td><?= $isi['mulai']; ?></td>
 										<td><?= $isi['selesai']; ?></td>
 								
 										<td><?= $isi['nama_kegiatan']; ?></td>
 										<td><?= $isi['judul_kegiatan']; ?></td>
 										<td><?= $isi['lokasi']; ?></td>
 										<td><?= $isi['deskripsi']; ?></td>
 										<td><?= $isi['instansi']; ?></td>
 										<td><?= $isi['jenis_permohonan']; ?></td>
 										<td><?= $isi['stat']; ?></td>
 										<td><?= $isi['pic']; ?></td>

 									<?php $no++;
									} ?>
 							</tbody>
                </table>
            </div>
        </div>
    </div>

            </div>
            </div>
        </div>

        <div class="footer1">
        <div class="footer1-judul">KANTOR REGIONAL III</div>
        <div class="footer1-judul">BADAN KEPEGAWAIAN NEGARA</div>
        <div class="footer-alamat">Jl. Surapati No.10, Cihaur Geulis, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40122</div>
        <div class="sosmed">
            <a href="https://www.instagram.com/regional3bkn/"><i class="fa-brands fa-instagram" style="color:rgb(255, 0, 115); font-size: 30px; margin-right: 15px;"></i></a>
            <a href="https://www.facebook.com/regional3bkn"><i class="fa-brands fa-facebook" style="color: #0e648f; font-size: 30px; margin-right: 15px;"></i></a>
            <a href="https://www.youtube.com/@inkabandung6471"><i class="fa-brands fa-youtube" style="color: #ff0000; font-size: 30px; margin-left: 1px;"></i></a>
        </div>
    </div>
    <footer>
        <div class="showcase2">
            <div class="spekta2">
                <p class="elimination2">2023 © All rights reserved by <b>Acuen</b></p>
            </div>
        </div>
    </footer>
   <!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="assets/plugins/toastr/toastr.min.js"></script>
<!-- jquery-validation -->
<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="assets/php-email-form/validate.js"></script>
<script src="https://kit.fontawesome.com/7e01dd3eec.js" crossorigin="anonymous"></script>
<script src="<?= BASE_URL . 'assets/vendors/jquery/js/jquery.min.js' ?>"></script>
        <script src="<?= BASE_URL . 'assets/vendors/bootstrap/js/bootstrap.min.js' ?>"></script>
        <script src="<?= BASE_URL . 'assets/vendors/pace-progress/js/pace.min.js' ?>"></script>
        <!-- form validation -->
        <script src="<?php echo BASE_URL . 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>">
        </script>
        <!-- fontawesome -->
        <script src="<?= BASE_URL . 'assets/js/all.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
        <!-- sweetaler 2 -->
        <script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
        <script>
            $(document).ready(function () {

                // sweetalert
                const flashdata = $('.flash-data').data('flashdata');
                const title = $('.flash-data').data('title');
                const type = $('.flash-data').data('type');

                if (flashdata) {
                    Swal.fire({
                        title: title,
                        text: flashdata,
                        icon: type
                    })
                }

                const signUpButton = document.getElementById('signUp');
                const signInButton = document.getElementById('signIn');
                const container = document.getElementById('container');

                signUpButton.addEventListener('click', () => {
                    container.classList.add("right-panel-active");
                });

                signInButton.addEventListener('click', () => {
                    container.classList.remove("right-panel-active");
                });

                // setTimeout(function() {
                //     $(".btn-register").click();
                // }, 1000);
            })
        </script>

</body>
</html>