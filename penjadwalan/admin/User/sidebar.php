<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="background-color: #71A5DE;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
         <img src="<?= BASE_URL ?>assets/img/brand/logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="text-black" style="color:black"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="?page=beranda" class="nav-link <?= $page == "beranda" ? "active" : "" ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                
              <li class="nav-item">
                <a href="?page=agenda" class="nav-link <?php if ($page == 'agenda') echo 'active' ?>">
                  <i class="far fa-calendar nav-icon"></i>
                  <p>Agenda/Jadwal</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="?page=status" class="nav-link <?php if ($page == 'status') echo 'active' ?>">
                  <i class="far fa-calendar nav-icon"></i>
                  <p>Status Konfirmasi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="?page=request" class="nav-link <?php if ($page == 'request') echo 'active' ?>">
                  <i class="far fa-calendar nav-icon"></i>
                  <p>Request Jadwal</p>
                </a>
              </li>
            
         

            


                <li class="nav-header">Option</li>
                <li class="nav-item">
                    <a href="<?= BASE_URL . 'login/proses_logout.php' ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>