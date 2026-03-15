<?php
$host = "localhost";
$user = "root";
$pass = "root"; // <--- Ganti di sini dari "" menjadi "root"
$db   = "kos_delta";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>