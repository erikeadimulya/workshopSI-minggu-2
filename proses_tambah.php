<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    // Mengambil data dari form berdasarkan atribut 'name'
    $nama   = $_POST['nama'];
    $kamar  = $_POST['kamar'];
    $asal   = $_POST['asal'];
    $email  = $_POST['email'];
    $status = $_POST['status_pembayaran'];

    // Query untuk memasukkan data ke tabel penghuni
    $query = "INSERT INTO penghuni (nama, kamar, asal, email, status_pembayaran) 
              VALUES ('$nama', '$kamar', '$asal', '$email', '$status')";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, langsung pindah ke halaman tabel
        header("Location: tabel.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>