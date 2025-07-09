<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "salesorder";

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Koneksi belum tersedia!");
}
