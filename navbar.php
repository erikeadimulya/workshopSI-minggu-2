<?php 
$halaman_sekarang = basename($_SERVER['PHP_SELF']); 
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
