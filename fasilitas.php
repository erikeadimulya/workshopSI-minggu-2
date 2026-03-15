<?php 
include 'koneksi.php';
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
if ($limit == 'all') {
    $limit = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM penghuni"));
} else {
    $limit = (int)$limit;
}
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$offset = ($halaman > 1) ? ($halaman * $limit) - $limit : 0;

$total_data_query = mysqli_query($conn, "SELECT id FROM penghuni");
$total_data = mysqli_num_rows($total_data_query);
$total_halaman = ceil($total_data / $limit);

$query_penghuni = mysqli_query($conn, "SELECT * FROM penghuni ORDER BY id DESC LIMIT $offset, $limit");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penghuni | Kos Delta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root { --primary-color: #0d6efd; --bg-color: #f8f9fa; }
        body { font-family: 'Poppins', sans-serif; background-color: var(--bg-color); display: flex; flex-direction: column; min-height: 100vh; }
        .navbar { background: white !important; box-shadow: 0 2px 15px rgba(0,0,0,0.05); padding: 15px 0; }
        .navbar-brand { font-weight: 700; color: var(--primary-color) !important; font-size: 1.5rem; }
        .nav-link { font-weight: 500; color: #495057 !important; margin: 0 10px; }
        .main-content { flex: 1; padding: 40px 0; }
        .table-container { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 30px; border: none; }
        
        /* Pagination Styling */
        .pagination .page-link { width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: #6c757d; background-color: white; transition: all 0.3s ease; border-radius: 8px !important; }
        .pagination .page-item.active .page-link { background-color: var(--primary-color); color: white; font-weight: 600; }
        .page-link:focus { box-shadow: none; }

        .custom-footer { background-color: #ffffff; padding: 40px 0; border-top: 1px solid #eeeeee; margin-top: auto; }
        .footer-text { font-size: 0.95rem; color: #555555; }
        .footer-icons a { color: #333333; font-size: 1.2rem; margin: 0 10px; }
    </style>
</head>
<body>

<?php
// Mendapatkan nama file yang aktif agar warna bisa berubah otomatis
$halaman_sekarang = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="bi bi-house-door-fill me-2"></i>Kos Delta</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($halaman_sekarang == 'belajar.php') ? 'active text-primary fw-bold' : ''; ?>" href="belajar.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($halaman_sekarang == 'tabel.php' || $halaman_sekarang == 'edit.php') ? 'active text-primary fw-bold' : ''; ?>" href="tabel.php">Daftar Penghuni</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php echo ($halaman_sekarang == 'fasilitas.php') ? 'active text-primary fw-bold' : ''; ?>" href="fasilitas.php">Fasilitas</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-primary rounded-pill px-4" href="#">Admin Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="mb-5">
        <h2 class="fw-bold">Fasilitas Kos Delta</h2>
        <p class="text-muted">Manajemen penghuni Kos Delta Aktif</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4">
                <div class="card-body">
                    <i class="bi bi-wifi text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Wi-Fi Cepat</h5>
                    <p class="text-muted small">Akses internet 24 jam untuk penghuni.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4">
                <div class="card-body">
                    <i class="bi bi-droplet-fill text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Air Bersih</h5>
                    <p class="text-muted small">Fasilitas air lancar dan bersih setiap hari.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4">
                <div class="card-body">
                    <i class="bi bi-shield-lock-fill text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Keamanan 24 Jam</h5>
                    <p class="text-muted small">Lingkungan aman dengan pengawasan CCTV.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4">
                <div class="card-body">
                    <i class="bi bi-egg-fried text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Dapur Bersama</h5>
                    <p class="text-muted small">Area masak lengkap dengan peralatan modern.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4">
                <div class="card-body">
                    <i class="bi bi-p-square-fill text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Parkir Luas</h5>
                    <p class="text-muted small">Area parkir motor dan mobil yang luas dan aman.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4">
                <div class="card-body">
                    <i class="bi bi-snow text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Kulkas Bersama</h5>
                    <p class="text-muted small">Penyimpanan makanan dingin untuk semua penghuni.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4">
                <div class="card-body">
                    <i class="bi bi-stars text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Kebersihan Terjamin</h5>
                    <p class="text-muted small">Pembersihan area umum secara rutin setiap hari.</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer class="custom-footer text-center">
        <div class="container">
            <p class="footer-text">&copy; 2026 <strong>Kos Delta</strong>. Semua Hak Dilindungi.</p>
            <div class="footer-icons">
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-whatsapp"></i></a>
                <a href="#"><i class="bi bi-geo-alt"></i></a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>