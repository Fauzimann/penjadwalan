<?php
require('../function/helper.php');
require('../function/koneksi.php');

?>

<?php

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM jadwal WHERE id = '$id'");
$getdata = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_user = $_SESSION['id'];
    $judul_kegiatan = ucwords($_POST['judul_kegiatan']);
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $deskripsi = $_POST['deskripsi'];

   
        $sql = mysqli_query($conn, "UPDATE `jadwal` SET `judul_kegiatan`='$judul_kegiatan', `deskripsi`='$deskripsi',`mulai`='$mulai',`selesai`='$selesai',`id_user`='$id_user' WHERE id = '$id'");
    

    if ($sql) {
        $_SESSION['message'] = 'Ubah Data Berhasil';
        $_SESSION['title'] = 'Data Request';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Ubah Data Gagal';
        $_SESSION['title'] = 'Data Request';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '../user/request.php';</script>";
}
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
    <link rel="stylesheet" href="assets/plugin/fontawesome/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
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
            <div class="nav2 text-right ">
         
   
    
                <a href="" class="judul-calendar text-black m-2" style="text-decoration: none;">Beranda</a>
                <a href="../user/request.php" class="judul-calendar text-black" style="text-decoration: none;">Request Jadwal</a>
                 
                <?php
                if(isset($_SESSION['login'])) : ?>
                 <a href="user/proses_logout.php" class="btn btn-warning fw-bold btn-login text-dark"> Logout </a>
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
        <div class="heading3" style="margin: 60px;">
            <div class="container">
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
                    <label for="deskripsi">Keterangan</label>
                    <input type="text" class="form-control" id="nama" name="deskripsi" value="<?= $getdata['deskripsi']?>"
                        data-required-error="Data tidak boleh kosong" placeholder="Deskripsi" required>
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