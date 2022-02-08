<?php 
    global $koneksi;
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "laundry";

    $koneksi = mysqli_connect($host,$user,$pass,$db);

    if(!$koneksi){
        echo "Gagal" or die (mysqli_error($mysql));
    }
        