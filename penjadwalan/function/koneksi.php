<?php
$host = 'localhost';
$username = 'root';
$password = '';
$databasename = 'penjadwalan';
try {
    $conn = mysqli_connect($host, $username, $password, $databasename);
} catch (Exception $e) {
    die($e->getMessage());
}
