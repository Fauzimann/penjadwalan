<?php
require('../function/koneksi.php');
require('../function/helper.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['login'])){
        $nip = $_POST['nip'];
        $password = md5($_POST['pass']);


        $querycek = mysqli_query($conn, "SELECT * FROM user WHERE nip =  '$nip'");
        $getcek = mysqli_fetch_assoc($querycek);

        if (mysqli_num_rows($querycek) > 0) {
            if ($password == $getcek['pass']) {
                $data = [
                    'login' => true,
                    'nip' => $nip,
                    'nama' => $getcek['nama'],
                    'level' => $getcek['level'],
                    'id' => $getcek['id'],
                ];
              
                //fungsi memasukkan data kedalam session

                    if($getcek['level'] == 'Admin') {
                        session_userdata($data);
                        header('location: ../admin/index.php');;
                    } elseif ($getcek['level'] == 'User') {
                        session_userdata($data);
                        header('location: ../index.php');
                    }
            } else {
                $_SESSION['message'] = 'Periksa NIP dan Password anda salah!';
                $_SESSION['title'] = 'Login';
                $_SESSION['type'] = 'error';
                header('location: index.php');
            }
        } else {
            $_SESSION['message'] = 'Username Tidak Terdaftar!';
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'error';
            header('location: index.php');
        }

        
    }else{
        $_SESSION['message'] = 'Login Error!';
        $_SESSION['title'] = 'Login';
        $_SESSION['type'] = 'error';
        header('location: index.php');
    }

}else{
    header('location: index.php');
}

?>