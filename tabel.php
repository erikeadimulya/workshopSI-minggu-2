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
 
    <main class="main-content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold m-0">Daftar Penghuni</h2>
                    <p class="text-muted">Manajemen penghuni Kos Delta Aktif</p>
                </div>
                <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="form.php">Tambah Penghuni</a>
            </div>

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr class="text-secondary small">
                                <th>KAMAR</th>
                                <th>NAMA LENGKAP</th>
                                <th>ASAL DAERAH</th>
                                <th>STATUS</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_array($query_penghuni)) { ?>
                            <tr>                  
                                <td><strong><?php echo $data['kamar']; ?></strong></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><span class="badge bg-primary-subtle text-primary px-3 py-2"><?php echo $data['asal']; ?></span></td>
                                <td>
                                    <span class="badge <?php echo ($data['status_pembayaran'] == 'Lunas') ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning'; ?> px-3">
                                        <?php echo $data['status_pembayaran']; ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-light btn-sm rounded-3 border">
                                    <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> 
            </div> 

            <div class="container px-0 mt-3">
                <div class="row align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <span class="text-muted small me-2">Tampilkan</span>
                        <select class="form-select form-select-sm shadow-sm border-0" style="width: 75px;" onchange="location = this.value;">
                            <option value="?limit=5" <?php if($limit == 5) echo 'selected'; ?>>5</option>
                            <option value="?limit=10" <?php if($limit == 10) echo 'selected'; ?>>10</option>
                            <option value="?limit=all" <?php if($limit > 10) echo 'selected'; ?>>All</option>
                        </select>
                        <span class="text-muted small ms-2">data per halaman</span>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end">
                        <nav>
                            <ul class="pagination mb-0 border-0">
                                <li class="page-item <?php if($halaman <= 1) echo 'disabled'; ?>">
                                    <a class="page-link shadow-sm border-0 mx-1" href="?halaman=<?php echo $halaman-1; ?>&limit=<?php echo $limit; ?>"><i class="bi bi-chevron-left"></i></a>
                                </li>
                                <?php
                                $start = ($halaman > 1) ? $halaman - 1 : 1;
                                $end = ($halaman < $total_halaman) ? $halaman + 1 : $total_halaman;
                                for($i = $start; $i <= $end; $i++) {
                                    $active = ($halaman == $i) ? 'active' : '';
                                    echo "<li class='page-item $active'><a class='page-link shadow-sm mx-1 border-0' href='?halaman=$i&limit=$limit'>$i</a></li>";
                                }
                                if ($end < $total_halaman) echo '<li class="page-item disabled"><span class="page-link shadow-sm mx-1 border-0">...</span></li>';
                                ?>
                                <li class="page-item <?php if($halaman >= $total_halaman) echo 'disabled'; ?>">
                                    <a class="page-link shadow-sm border-0 mx-1" href="?halaman=<?php echo $halaman+1; ?>&limit=<?php echo $limit; ?>"><i class="bi bi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>

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