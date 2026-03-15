<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Cari data penghuni berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM penghuni WHERE id = '$id'");
$data = mysqli_fetch_array($query);

if (mysqli_num_rows($query) < 1) {
    header('Location: tabel.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penghuni | Kos Delta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e9ecef; /* Warna latar sedikit abu agar card menonjol */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background: white;
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .form-header {
            background: #0d6efd; /* Warna biru sesuai desain tambah data */
            padding: 30px;
            text-align: center;
            color: white;
        }

        .form-header h2 {
            font-weight: 600;
            margin: 0;
            font-size: 1.5rem;
        }

        .form-header p {
            margin: 10px 0 0;
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .form-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        .btn-primary {
            padding: 12px;
            font-weight: 600;
            border-radius: 12px;
        }

        .btn-light {
            padding: 12px;
            border-radius: 12px;
            background: #f8f9fa;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <div class="form-header">
            <h2>Edit Data Penghuni</h2>
        </div>

        <div class="form-body">
            <form action="proses_edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor Kamar</label>
                        <input type="text" name="kamar" class="form-control" value="<?php echo $data['kamar']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Asal Daerah (Kota)</label>
                        <input type="text" name="asal" class="form-control" value="<?php echo $data['asal']; ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                </div>

                <div class="mb-4">
                    <label class="form-label">Status Pembayaran</label>
                    <select name="status_pembayaran" class="form-select">
                        <option value="Lunas" <?php if($data['status_pembayaran'] == 'Lunas') echo 'selected'; ?>>Lunas</option>
                        <option value="Tunggakan" <?php if($data['status_pembayaran'] == 'Tunggakan') echo 'selected'; ?>>Tunggakan</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary shadow-sm">
                        <i class="bi bi-save me-2"></i>Simpan Perubahan
                    </button>
                    <a href="tabel.php" class="btn btn-light">Batal</a>
                </div>
            </form>
            
            <div class="text-center mt-4">
                <a href="tabel.php" class="text-muted text-decoration-none small">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Tabel
                </a>
            </div>
        </div>
    </div>

</body>
</html>