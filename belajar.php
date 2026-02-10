<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Kos Delta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .hero-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 500px;
            width: 90%;
            transition: transform 0.3s ease;
        }

        .hero-card:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            background: #0d6efd;
            color: white;
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2.5rem;
            box-shadow: 0 10px 20px rgba(13, 110, 253, 0.3);
        }

        .btn-primary {
            padding: 12px 35px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            box-shadow: 0 8px 15px rgba(13, 110, 253, 0.4);
        }

        .text-muted-custom {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <div class="hero-card p-5 text-center">
        <div class="icon-box">
            <i class="bi bi-house-heart-fill"></i>
        </div>
        
        <h6 class="text-uppercase text-primary fw-bold mb-2" style="letter-spacing: 2px; font-size: 0.8rem;">
            Selamat Datang
        </h6>
        
        <h1 class="fw-700 mb-3" style="color: #2d3436;">Kos Delta</h1>
        
        <p class="text-muted-custom mb-4">
            Menyediakan hunian yang <strong>nyaman</strong>, <strong>aman</strong>, dan <strong>strategis</strong> khusus untuk mahasiswa dan pegawai profesional.
        </p>
        
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="tabel.php"  class="btn btn-primary btn-lg px-5">
               Get Started
            </a>
        </div>
        
        <div class="mt-4 pt-3 border-top">
            <small class="text-muted">Mulai dari Rp 800rb / bulan</small>
        </div>
    </div>

</body>
</html>