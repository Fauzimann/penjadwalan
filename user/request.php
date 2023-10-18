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

        <div class="heading1" style="background-color: #2980B9;>
            <div class="bar2 d-flex justify-content-between">
                <div class="nav2 text-light">
                 
                </div>
                <div class="d-flex justify-content-end " class="dropdown-center">
                <button class="btn btn-secondary 
                    dropdown-toggle  bg-transparent" type="button"
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
    <a href="../user/tambahrequest.php" class="btn btn-primary mt-3 mb-3">
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
          <th scope="col">Keterangan</th>
          <th scope="col">Mulai</th>
          <th scope="col">Selesai</th>
          <th scope="col">Gambar</th>

          <th scope="col">Action</th>
         
        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $i = 1;
                        $id = $_SESSION['id'];
                        $query = mysqli_query($conn, "SELECT * FROM jadwal where id_user = '$id'");
                        while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr id="<?= $data['id'] ?>">
                        <td><?= $i++ ?></td>
                         
                            <td><?= $data['judul_kegiatan'] ?></td>
                            <td><?= $data['deskripsi'] ?></td>
                            <td><?= $data['mulai'] ?></td>
                            <td><?= $data['selesai'] ?></td>
                            <td><img src="../user/assets/gambar/<?php echo $data['photo'] ?>" width="235" height="240"></td>
                           
                            <td>
                                <a href="../user/ubahrequest.php?id=<?= $data['id'] ?>"
                                    class="btn btn-sm btn-primary mt-1">Ubah</a>
                               
                                    <a href="../user/hapusrequest.php?id=<?= $data['id'] ?>"
                                    class="btn btn-sm btn-danger remove mt-1">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>

       <div class="footer1" style="background-color: #2980B9;>
      
    </div>
   <footer class="footer bg-info" >
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                       <div class="bg-white" style="width:250px; height: 100px; margin-left: 30px; border: 5px solid var(--bg-primary); border-radius: 30px; text-align: center; padding-top: 15px;">
                            <img class="" src="https://diskominfo.jabarprov.go.id/dev2021/img/logo_diskom.svg" alt="" style="height: 70%;">
                       </div>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <b><h7 class="text-uppercase mb-4">Dinas Komunikasi dan Informatika</h7>
                        <h7 class="text-uppercase mb-4">Provinsi Jawa Barat</h7></b>
                        <p>Jl. Taman Sari No. 55 Bandung 40132 <br/>Telp. 022-2502898 fax. 022-2501151</p>
                        <b><h7>diskominfo@jabarprov.go.id</h7></b>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <ul style="list-style-type: none;">
                            <li><a style='color:white;' href="https://diskominfo.jabarprov.go.id/pages/read/44">Tentang Kami</a></li>
                            <li><a style='color:white;' href="https://diskominfo.jabarprov.go.id/pages/read/48">Program</a></li>
                            <li><a style='color:white;' href="#">Hubungi Kami</a></li>
                            <br/>
                            <h7>Diskominfo Jabar 2021</h7>
                        </ul>
                        
                    </div>
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