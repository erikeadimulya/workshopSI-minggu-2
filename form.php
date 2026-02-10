<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penghuni | Kos Delta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: none;
            width: 100%;
            max-width: 550px;
            overflow: hidden;
        }

        .form-header {
            background: #0d6efd;
            padding: 30px;
            color: white;
            text-align: center;
        }

        .form-body {
            padding: 40px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            background-color: #f8f9fa;
            transition: all 0.3s;
        }

        .form-control:focus {
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
            border-color: #0d6efd;
        }

        .input-group-text {
            background-color: transparent;
            border: none;
            padding-left: 0;
            color: #0d6efd;
        }

        .btn-submit {
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-top: 10px;
        }

        .btn-back {
            text-decoration: none;
            color: #6c757d;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
            transition: color 0.3s;
        }

        .btn-back:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body>

    <div class="form-card">
        <div class="form-header">
            <h4 class="mb-1 fw-bold">Tambah Penghuni Baru</h4>
            <p class="mb-0 opacity-75">Lengkapi data untuk manajemen hunian</p>
        </div>

        <div class="form-body">
            <form action="#" method="POST">
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Contoh: Ahmad Hidayat" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor Kamar</label>
                        <input type="text" class="form-control" placeholder="A-01" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Asal Daerah (Kota)</label>
                        <input type="text" class="form-control" placeholder="Jakarta" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" placeholder="nama@email.com">
                </div>

                <div class="mb-4">
                    <label class="form-label">Status Pembayaran</label>
                    <select class="form-select">
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="lunas">Lunas</option>
                        <option value="tunggakan">Tunggakan</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-submit">
                        <i class="bi bi-save me-2"></i>Simpan Data Penghuni
                    </button>
                    <button type="reset" class="btn btn-light btn-submit text-muted">
                        Reset Form
                    </button>
                </div>

                <div class="text-center">
                    <a href="tabel.php" class="btn-back">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Tabel
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>