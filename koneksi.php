<?php
$host = "db"; // nama service database di docker-compose
$user = "swarajatim";
$pass = "swarajatim123";
$db   = "swarajatim_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fix karakter aneh (�)
mysqli_set_charset($koneksi, "utf8mb4");
?>
