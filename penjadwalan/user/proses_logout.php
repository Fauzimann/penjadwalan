<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['email']);
unset($_SESSION['nip']);
unset($_SESSION['level']);
unset($_SESSION['nama']);
unset($_SESSION['id']);

$_SESSION['message'] = 'Anda Telah Logout.';
$_SESSION['title'] = 'Logout';
$_SESSION['type'] = 'success';
echo "<script>window.location.href = '../index.php';</script>";
