<?php
include 'config/koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM wisata");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Destinasi Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', sans-serif;
            color: #333;
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

        /* Section title */
        .section-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 50px;
            font-size: 2rem;
            color: #222;
        }

        /* Card styling */
        .card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            background: #fff;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #222;
        }
        .card-text {
            font-size: 0.95rem;
            color: #666;
        }

        /* Tombol */
        .btn-detail {
            background: linear-gradient(135deg, #ff7b00, #ffae00);
            color: #fff;
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }
        .btn-detail:hover {
            background: linear-gradient(135deg, #e56700, #ff9100);
            color: #fff;
        }

        /* Footer */
        footer {
            background: #111;
            color: #aaa;
            padding: 30px 0;
            margin-top: 50px;
            text-align: center;
        }
        footer p {
            margin: 0;
            font-size: 0.9rem;
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
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-house-fill"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Cuaca -->
<div class="container mt-5 text-center">
  <h2 class="fw-bold mb-3"><i class="bi bi-brightness-high-fill"></i> Cuaca Ambon Hari Ini</h2>
  <div class="card shadow-lg border-0 rounded-4 mx-auto" 
       style="max-width: 420px; background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%); color: white;">
    <div class="card-body text-center" id="cuaca">
      <span>⛅ Memuat cuaca...</span>
    </div>
  </div>
</div>

<!-- Daftar Wisata -->
<div class="container py-5" id="rincian">
    <h2 class="section-title">Daftar Destinasi Wisata</h2>
    <div class="row g-4">
        <?php while($data = mysqli_fetch_assoc($query)) { ?>
            <div class="col-md-4 col-lg-3 animate__animated animate__fadeInUp">
                <div class="card h-100">
                    <img src="uploads/<?php echo $data['gambar']; ?>" class="card-img-top" alt="gambar destinasi">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $data['nama']; ?></h5>
                        <p class="card-text"><?php echo substr($data['deskripsi'], 0, 80); ?>...</p>
                        <a href="detail_destinasi.php?id=<?php echo $data['id']; ?>" class="btn btn-detail mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Footer -->
<footer>
  <p>&copy; <?php echo date('Y'); ?> Ambon.go | Semua Hak Dilindungi</p>
</footer>

<script>
    const kota = "Ambon"; 
    const apiKey = "d7da6bd9ff9409c5726db12931b3d591";

    function getTanggalSekarang() {
        const hariList = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
        const bulanList = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        const today = new Date();
        return `${hariList[today.getDay()]}, ${today.getDate()} ${bulanList[today.getMonth()]} ${today.getFullYear()}`;
    }

    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${kota}&units=metric&lang=id&appid=${apiKey}`)
        .then(res => res.json())
        .then(data => {
            const suhu = data.main.temp.toFixed(1);
            const kondisi = data.weather[0].description;
            const ikon = data.weather[0].icon;
            const tanggal = getTanggalSekarang();

            document.getElementById('cuaca').innerHTML = `
                <div class="d-flex flex-column align-items-center animate__animated animate__fadeIn">
                    <p class="mb-1"><i class="bi bi-calendar-event"></i> ${tanggal}</p>
                    <img src="https://openweathermap.org/img/wn/${ikon}@4x.png" alt="cuaca" class="mb-2" style="width:100px;">
                    <h3 class="fw-bold mb-0">${suhu}°C</h3>
                    <p class="mb-1 fs-5" style="text-transform: capitalize;">${kondisi}</p>
                    <small><i class="bi bi-geo-alt-fill"></i> ${kota}</small>
                </div>
            `;
        })
        .catch(() => {
            document.getElementById('cuaca').innerHTML = "<span>⚠️ Cuaca tidak tersedia</span>";
        });
</script>

</body>
</html>
