<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="background-color: #71A5DE;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= BASE_URL ?>assets/img/logo1.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text" style="color: black;"></span>
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

                <li class="nav-item <?php if ($page == 'agenda' || $page == 'hariini')  echo 'menu-open' ?>">
            <a href="#" class="nav-link <?php if ($page == 'agenda' || $page == 'hariini')  echo 'active' ?>" href="?page=agenda">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=agenda" class="nav-link <?php if ($page == 'agenda') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Agenda/Jadwal</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="?page=daftaragenda" class="nav-link <?php if ($page == 'daftaragenda') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Agenda/Jadwal</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="?page=hariini" class="nav-link <?php if ($page == 'hariini') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Hari Ini</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="?page=jeniskegiatan" class="nav-link <?php if ($page == 'jeniskegiatan') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Kegiatan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="?page=request" class="nav-link <?php if ($page == 'request') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Jadwal</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="?page=daftaragenda" class="nav-link <?php if ($page == 'daftaragenda') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Agenda</p>
                </a>
              </li> -->
            </ul>
          </li>

            
          <li class="nav-header">Laporan</li>
                <li class="nav-item">
                <a href="?page=laporan" class="nav-link">
                  <i class="fas fa-book"></i>
                  <p>Laporan Bulanan</p>
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