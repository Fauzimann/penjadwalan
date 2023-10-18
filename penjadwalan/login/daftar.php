<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box" style="width: 560px;">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">Admin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Pendaftaran akun baru</p>

      <form action="proses_daftar.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">NIP</label>
                    <input type="text" name="nip" class="form-control" id="exampleInputPassword1" placeholder="NIP">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Kelamin</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="jk" checked value="L">
                          <label class="form-check-label">Laki Laki</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="jk" value="P">
                          <label class="form-check-label">Perempuan</label>
                        </div>
                        
                      </div>

                  <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Masukan Alamat" name="alamat"></textarea>
                      </div>

                      <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="text" class="form-control" name="telp" id="exampleInputEmail1" placeholder="Masukan No Telepon">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Masukan Email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="pass" placeholder="Masukan Password">
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="daftar">Submit</button>
                </div>
              </form>

    

      Sudah punya akun ?  <a href="index.php" class="text-center">Masuk</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
