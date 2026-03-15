<?php
include 'koneksi.php';

// 1. Ambil data yang dikirim dari form edit.php
$id = $_POST['id'];
$nama = $_POST['nama'];
$kamar = $_POST['kamar'];
$asal = $_POST['asal'];
$email = $_POST['email'];
$status = $_POST['status_pembayaran'];

// 2. Perintah SQL untuk mengupdate data berdasarkan ID
$query = "UPDATE penghuni SET 
          nama = '$nama', 
          kamar = '$kamar', 
          asal = '$asal', 
          email = '$email', 
          status_pembayaran = '$status' 
          WHERE id = '$id'";

$update = mysqli_query($conn, $query);

// 3. Cek apakah berhasil
if ($update) {
    // Jika berhasil, balikkan ke halaman tabel
    header("Location: tabel.php");
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal mengupdate data: " . mysqli_error($conn);
}
?>