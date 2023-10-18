<!DOCTYPE html>
<html lang="en">
<?php
require('../function/helper.php');
// cek apakah user sudah login
if (isset($_SESSION['login']))
    redirect('admin');

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
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
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

</head>
<body class="hold-transition login-page">
<div class="row">
  <div class="col-3 mt-5" style="margin-top: 40px;">
  <img src="../assets/img/fix.png" alt="" width="350" style="margin-top:-40px">
  </div>
  <div class="col-3" style="margin-top: 160px;">
  
    <h1 style="font-family: Carter One;
    font-weight: bold;
font-size: 45px;
line-height: 39px;
letter-spacing: 0em;
text-align: left;
margin-left: 50px;
"></h1>
    <p style="font-family: Benne;
font-size: 25;
font-weight: 400;
margin-left: 50px;
">Membantu untuk mengingatkan kegiatan Anda agar lebih terstruktur.</p>
  </div>
  <div class="col-6">
<div class="login-box" style="margin-left: 120px;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
     

            <h2><b>Login</b></h2>
            
    </div>
    
    <div class="container-fluid">
            <!-- show sweet alert -->
            <?php if (isset($_SESSION['message'])): ?>
                <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>"
                    data-type="<?= $_SESSION['type'] ?>"></div>
                <?php
                unset($_SESSION['message']);
                unset($_SESSION['title']);
                unset($_SESSION['type']);
            endif;
            ?>
        </div>
        
    <div class="card-body">
    
      <p class="login-box-msg">Masuk ke akun anda</p>
      
      <form id="quickForm" action="proses_login.php" method="POST">
                <div class="card-body">
                <label for="exampleInputEmail1">NIP</label>
                <div class="form-group input-group mb-3">
                  <input type="nip" class="form-control" placeholder="Masukan NIP" name="nip">
         
                </div>
        <label for="exampleInputEmail1">Password</label>
                  <div class="form-group input-group mb-3">
                    
                  <input type="password" name="pass" class="form-control" id="password" required>
                        <span class="input-group-text bg-transparent border-start-0">
                                        <i class="far fa-eye" id="toggle" onclick="togglePassword()" style="cursor: pointer"></i>
                                    </span>
            </div>
            <div class="row justify-content-center">
                  <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
              </form>
          </div>
          Belum Punya Akun ? <a href="daftar.php" class="text-center justify-content-center">Daftar disini</a>
        </div>
  </div>
  </div>
                </div>
          </div>

                <!-- /.card-body -->
               

           
<!-- /.login-box -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<!-- jquery-validation -->
<script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="../assets/php-email-form/validate.js"></script>
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

 
  <script>
        function togglePassword() {


            const toggle = document.getElementById("toggle");
            const password = document.getElementById("password");

            // toggle.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the eye icon
            toggle.classList.toggle('fa-eye');
            toggle.classList.toggle('fa-eye-slash');
            // });
        }

        $(function () {

  $('#quickForm').validate({
    rules: {
      username: {
        required: true,

      },
      password: {
        required: true,
       
      },
    },
    messages: {
      username: {
        required: "Harap Masukan Username"
      },
      password: {
        required: "Harap Masukan Password"
 
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


</body>
</html>
