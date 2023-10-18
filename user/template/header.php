<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="user/assets/css/bkn.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet"
            href="<?= BASE_URL ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" />
        <!-- custom -->
        <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/custom.css' ?>">
        <!-- gijgo datepicker -->
        <link rel="stylesheet"
            href="<?= BASE_URL . 'assets/node_modules/datepicker/css/bootstrap-datepicker.min.css' ?>">
        <!-- chart js -->
        <script src="<?= BASE_URL . 'assets/vendors/jquery/js/jquery.min.js'; ?>">
        </script>
        <!-- Dropdown -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
          <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet"
            href="<?= BASE_URL ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/dist/css/adminlte.min.css">

        <link rel="stylesheet" href="<?= BASE_URL ?>assets/fullcalendar/lib/main.min.css">
        <!-- select autocomplete -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/css/autoComplete.min.css">
            
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
         
                
                <?php
                if(isset($_SESSION['login'])) : ?> 
              
<div class="d-flex justify-content-end"> <!-- Menggunakan justify-content-end untuk menggeser ke kanan -->
  <div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle bg-transparent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Menu
    </button>   
    <div class="dropdown-menu">
      <a href="" class="dropdown-item" style="text-decoration: none;">Beranda</a>
      <a href="user/request.php" class="dropdown-item" style="text-decoration: none;">Request Jadwal</a>
      <a href="user/agenda.php" class="dropdown-item" style="text-decoration: none;">Agenda/Jadwal</a>
      <a href="user/status.php" class="dropdown-item" style="text-decoration: none;">Status Konfirmasi</a>
    </div>
  </div>
               
                
                <?php else : ?>
                    
                    <?php endif ?>
                    
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

   