<?php
include 'config/koneksi.php';

$query = "
    SELECT 
        p.id, 
        p.nama_penginapan, 
        p.alamat, 
        p.harga, 
        p.fasilitas, 
        p.kontak, 
        p.gambar, 
        w.nama AS nama_wisata
    FROM penginapan p
    JOIN wisata w ON p.wisata_id = w.id
";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penginapan - Wisata Maluku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background: #f1f4f9;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
        }
        .card-title {
            font-weight: 600;
            color: #2c3e50;
        }
        .card-footer {
            background: #fff;
            border-top: none;
        }
        .btn-custom {
            border-radius: 10px;
            font-weight: 500;
        }
        /* Navbar */
        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #eee;
        }
        .navbar-brand {
            font-weight: bold;
            color: #ff7b00;
            font-size: 1.4rem;
        }
        .navbar-nav .nav-link {
            color: #333;
            font-weight: 500;
            margin-right: 15px;
        }
        .navbar-nav .nav-link:hover {
            color: #ff7b00;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <i class="bi bi-geo-alt-fill"></i> Ambon.go
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item ms-2">
          <a class="btn btn-light border rounded px-3" href="daftar_destinasi.php"> 
          </i> Kembali </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-5">
    <h1 class="text-center mb-4 fw-bold">🏨 Daftar Penginapan</h1>
    <div class="row g-4">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="uploads/<?= $row['gambar']; ?>" 
                         class="card-img-top" 
                         alt="<?= $row['nama_penginapan']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_penginapan']; ?></h5>
                        <p class="card-text mb-2 text-muted"><i class="bi bi-geo-alt"></i> <?= $row['alamat']; ?></p>
                        <p class="card-text mb-2"><strong>Wisata Terdekat:</strong> <?= $row['nama_wisata']; ?></p>
                        <p class="card-text mb-2"><strong>Harga:</strong> <span class="text-success">Rp<?= number_format($row['harga'],0,',','.'); ?></span></p>
                        <p class="card-text"><strong>Fasilitas:</strong> <?= $row['fasilitas']; ?></p>
                    </div>
                    <div class="card-footer d-flex gap-2">
                        <!-- Tombol WhatsApp -->
                        <a href="https://wa.me/<?= $row['kontak']; ?>" 
                           target="_blank" 
                           class="btn btn-success btn-custom flex-fill">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>
                        <!-- Tombol Google Maps -->
                        <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($row['alamat']); ?>" 
                           target="_blank" 
                           class="btn btn-primary btn-custom flex-fill">
                            <i class="bi bi-geo"></i> Lokasi
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
