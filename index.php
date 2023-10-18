<?php
// require('function/helper.php');

// $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
// $base_url .= "://" . $_SERVER['HTTP_HOST'];
// $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

// $_SESSION['base_url'] = $base_url;
// define("BASE_URL", $base_url);

// redirect("admin");
require('function/koneksi.php');
require('function/helper.php');

$page = isset($_GET['page']) ? $_GET['page'] : false;
if ($page) {
    if(file_exists('user/' . $page . '.php')){
        require('user/' . $page . '.php');
    }else{
        require('template/404.php');
    }
} else {
    require('user/index.php');
}


?>
