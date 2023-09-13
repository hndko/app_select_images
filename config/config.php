<?php
$base_url = "http://localhost/app_select_images/";

// default connection database
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_select_image";

$koneksi = mysqli_connect($server, $user, $password, $nama_database);

if (!$koneksi) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

session_start();
