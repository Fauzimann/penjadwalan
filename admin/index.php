<?php

require('../function/helper.php');
require('../function/koneksi.php');

cek_login();
$level = $_SESSION['level'];
$page = isset($_GET['page']) ? $_GET['page'] : 'beranda';
$action = isset($_GET['action']) ? $_GET['action'] : false;

?>
<?php require('template/header.php') ?>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->

        <?php require('template/navbar.php') ?>
        <!-- /.navbar -->

        <?php
                $sidebar = $level . '/sidebar.php';
                if (file_exists($sidebar)) {
                    require($level . '/sidebar.php');
                }
            ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: white;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <?php if ($action): ?>
                                <li class="breadcrumb-item">
                                    <?= $level ?>
                                </li>
                                <li class="breadcrumb-item">
                                    <?= ucfirst($page) ?>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ucfirst($action) ?>
                                </li>
                                <?php else: ?>
                                <li class="breadcrumb-item">
                                    <?= ucfirst($level) ?>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ucfirst($page) ?>
                                </li>
                                <?php endif ?>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                            if ($action) {
                                $file = $level . '/' . $page . '/' . $action . '.php';
                                if (file_exists($file)) {
                                    require($file);
                                } else {
                                    echo 'File tidak di temukan';
                                }
                            } else {
                                $file = $level . '/' . $page . '/index.php';
                                if (file_exists($file)) {
                                    require($file);
                                } else {
                                    echo 'File tidak di temukan';
                                }
                            }
                            ?>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- load footer from template -->
        <?php require('template/footer.php') ?>