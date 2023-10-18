<?php
require('../function/helper.php');
require('../function/koneksi.php');

?>
<?php
$query = mysqli_query($conn, "SELECT * from jadwal WHERE id_user = 1;");

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
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
                <button class="btn btn-warning 
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
                    <img src="../user/assets/img/fix.png" alt="Gambar tidak ditemukan" width="75px" height="75px" class="">
                    <span class="judul-inka" style="padding-top: 100px;">Informasi Jadwal Kegiatan DISKOMINFO Jabar</span>
                  </a>
                </div>
            </nav>
        </div>
        <div class="heading3" style="margin: 80px;">
            <div class="container">
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
      
      <th scope="col">Judul Kegiatan</th>
      <th scope="col">Mulai</th>
      <th scope="col">Selesai</th>
    
      <th scope="col">Status</th>
     

    
     
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
                    
                       
                        <td>
                            <a href="../user/hadir.php?id_jadwal=<?= $data['id']?>"
                                class="btn btn-sm btn-success mt-1">Hadir</a>
                            
                                <button type="button" class="btn btn-danger btn-sm mt-1" data-toggle="modal" data-target="#tolak<?php echo $data['id']; ?>">
                                Tidak Hadir
                                </button>
                                

                        </td>
                       
                    </tr>

                    <div class="modal fade" id="tolak<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Alasan Tidak Hadir</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <form method="POST" action="../user/tolak.php" class="d-inline">
            <div class="row mb-3">
            <input type="hidden" name="id_jadwal" value="<?= $data['id'] ?>">
              <label for="inputText" class="col-sm-5 col-form-label">Alasan</label>
              <div class="col-sm-12">
               <textarea name="alasan" id="" class="form-control"></textarea>
            
              </div>
            </div>

           
          
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
          </form>
  </div>
  

</div>
</div>
</div>

                    <?php endwhile ?>
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