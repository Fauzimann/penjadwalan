<?php
require('../function/koneksi.php');
require('../function/helper.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['daftar'])){
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);

        $querynik = mysqli_query($conn,"SELECT * FROM user where nip='$nip'");
        if (mysqli_num_rows($querynik) > 0) {
            $_SESSION['message'] = 'NIK sudah terdaftar';
            $_SESSION['title'] = 'Daftar';
            $_SESSION['type'] = 'error';
            header('location: index.php');
        }
        
        $sql = mysqli_query($conn,"INSERT INTO user (`nama`,`nip`,`jk`,`alamat`,`telp`,`email`,`pass`,`level`) VALUES ('$nama','$nip','$jk','$alamat','$telp','$email','$password','User')");
        
        if($sql){
            $_SESSION['message'] = 'Pendaftaran berhasil';
            $_SESSION['title'] = 'Daftar';
            $_SESSION['type'] = 'success';
            header('location: index.php');
        } else {
            $_SESSION['message'] = 'Pendaftaran Gagal';
            $_SESSION['title'] = 'Daftar';
            $_SESSION['type'] = 'error';
            header('location: daftar.php');
        }
        
    }else{
        $_SESSION['message'] = 'Daftar Error!';
        $_SESSION['title'] = 'Daftar';
        $_SESSION['type'] = 'error';
        header('location: index.php');
    }

}else{
    header('location: index.php');
}

?>