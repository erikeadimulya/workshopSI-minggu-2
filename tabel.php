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
        :root {
            --primary-color: #0d6efd;
            --bg-color: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- HEADER / NAVBAR --- */
        .navbar {
            background: white !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            padding: 15px 0;
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
        }
        .nav-link {
            font-weight: 500;
            color: #495057 !important;
            margin: 0 10px;
        }
        .nav-link.active {
            color: var(--primary-color) !important;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            flex: 1; /* Mendorong footer ke bawah */
            padding: 40px 0;
        }

        .table-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 30px;
            border: none;
        }

        /* --- FOOTER --- */
       .custom-footer {
        background-color: #ffffff; /* Warna putih bersih */
        padding: 40px 0;
        border-top: 1px solid #eeeeee; /* Garis pembatas tipis di atas */
        margin-top: auto;
    }

    .footer-text {
        font-size: 0.95rem;
        color: #555555;
        margin-bottom: 10px; /* Jarak antara teks dan ikon */
    }

    .footer-text strong {
        color: #333333;
    }

    .footer-icons {
        display: flex;
        justify-content: center;
        gap: 20px; /* Jarak antar ikon */
    }

    .footer-icons a {
        color: #333333; /* Warna ikon gelap sesuai gambar */
        font-size: 1.2rem;
        transition: color 0.3s ease;
    }

    .footer-icons a:hover {
        color: #0d6efd; /* Berubah biru saat di-hover */
    }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-house-door-fill me-2"></i>Kos Delta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="belajar.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Daftar Penghuni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fasilitas</a>
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
                <button class="btn btn-primary rounded-pill px-4 shadow-sm">
                 <a class="btn btn-primary rounded-pill px-4" href="form.php">Tambah Penghuni</a>
                </button>
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
        <?php include 'koneksi.php';
            $query = mysqli_query($conn, "SELECT * FROM penghuni ORDER BY id DESC");
            while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>                  
                <td><strong><?php echo $data['kamar']; ?></strong></td>
                <td><?php echo $data['nama']; ?></td>
                <td>
                    <span class="badge bg-primary-subtle text-primary px-3 py-2">
                    <?php echo $data['asal']; ?>
                    </span>
                </td>
                <td>
                    <span class="badge <?php echo ($data['status_pembayaran'] == 'Lunas') ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning'; ?> px-3">
                    <?php echo $data['status_pembayaran']; ?>
                    </span>
                </td>
                <td class="text-center">
                <button class="btn btn-light btn-sm rounded-3 border"><i class="bi bi-pencil-square"></i></button>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>
</main>

    <footer class="custom-footer">
    <div class="container text-center">
        <p class="footer-text">
            &copy; 2026 <strong>Kos Delta</strong>. Semua Hak Dilindungi.
        </p>
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