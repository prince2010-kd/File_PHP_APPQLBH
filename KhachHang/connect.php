<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "qlbhapp";


    $scon = mysqli_connect($host, $user, $pass, $database);
    mysqli_set_charset($scon, "utf8");

    if (!$scon) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

?>