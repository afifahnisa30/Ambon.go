<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ambon.go - Wisata Maluku</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Lato:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Rajdhani:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    /* Navbar styling */
    .navbar {
      background: #ffffff;
      transition: all 0.3s ease;
    }
    .navbar-brand {
      font-family: 'Orbitron', sans-serif;
      font-weight: 600;
      font-size: 1.5rem;
      color: #ff7b00 !important;
    }
    .navbar-nav .nav-link {
      position: relative;
      font-weight: 500;
      color: #333 !important;
      margin-left: 20px;
      transition: color 0.3s ease;
    }
    .navbar-nav .nav-link::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      width: 0;
      height: 2px;
      background: #ff7b00;
      transition: width 0.3s ease;
    }
    .navbar-nav .nav-link:hover {
      color: #ff7b00 !important;
    }
    .navbar-nav .nav-link:hover::after {
      width: 100%;
    }
    /* Warna hamburger menu */
    .navbar-toggler {
      border: none;
    }
    .navbar-toggler:focus {
      box-shadow: none;
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%280,0,0,0.7%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Ambon.go</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#tentang-ambon">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="#kuliner">Kuliner</a></li>
        <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="daftar_destinasi.php"><i class="bi bi-geo-alt-fill"></i> Wisata</a></li>
        <li class="nav-item"><a class="nav-link" href="penginapan.php"><i class="bi bi-building"></i> Penginapan</a></li>
      </ul>
    </div>
  </div>
</nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <h1>Jelajahi Pesona Ambon</h1>
            <p>Alam, Budaya, dan Sejarah yang Tak Terlupakan</p>
            <a href="daftar_destinasi.php" class="btn-destinasi">Jelajahi</a>
        </div>
    </header>

 <!-- tentang -->
<section class="tentang-ambon" id="tentang-ambon">
  <div class="container">
    <div class="row">
      <div class="col text">
        <h2>Tentang Ambon</h2>
        <p>
          Ambon, ibu kota Provinsi Maluku, adalah kota yang sarat akan sejarah, budaya, dan keindahan alam. Dijuluki "Ambon Manise", yang berarti Ambon yang manis, kota ini menawarkan suasana yang hangat, ramah, dan penuh pesona. Sebagai kota pelabuhan yang strategis, Kota Ambon memiliki perpaduan menarik antara laut biru jernih, bukit hijau yang menyejukkan, serta warisan budaya dan kuliner yang kaya.
        </p>
        <p>
          Beberapa destinasi terkenal di Ambon antara lain Pantai Liang yang masuk dalam daftar pantai terbaik di dunia, Pantai Natsepa yang memesona, Benteng Amsterdam yang menyimpan sejarah kolonial. Tak hanya itu, Ambon juga dikenal sebagai Kota Musik Dunia oleh UNESCO, menjadikannya pusat kegiatan seni dan budaya yang hidup. Musik tradisional dan modern berpadu harmonis di setiap sudut kota.
        </p>
        <p>
          Jelajahi Ambon, dan rasakan sendiri kehangatan masyarakatnya, keindahan alamnya, serta kekayaan budaya yang tak ternilai.
        </p>
        <a href="#" class="btn-pelajari">Pelajari Lebih Lanjut</a>
      </div>
      <div class="col image">
        <img src="images/gong_perdamaian.png" alt="Gong Perdamaian Ambon" />
      </div>
    </div>
  </div>
</section>

	
 <!-- Kuliner Khas -->
<section class="kuliner-section" id="kuliner">
  <h2>Kuliner Khas</h2>
  <div class="kuliner-grid">
    <div class="kuliner-card" style="background-image: url('images/papeda.jpg')">
      <p>Papeda</p>
    </div>
    <div class="kuliner-card" style="background-image: url('images/ikan.jpg')">
      <p>Ikan Kuah Kuning</p>
    </div>
    <div class="kuliner-card" style="background-image: url('images/kohu_kohu.jpg')">
      <p>Kohu-Kohu</p>
    </div>
    <div class="kuliner-card" style="background-image: url('images/naksun.png')">
      <p>Nasi Kuning</p>
    </div>
    <div class="kuliner-card" style="background-image: url('images/rujak.jpg')">
      <p>Rujak Buah</p>
    </div>
    <div class="kuliner-card" style="background-image: url('images/suami.jpg')">
      <p>Suami</p>
    </div>
    <div class="kuliner-card" style="background-image: url('images/air_guraka.jpg')">
      <p>Air Guraka</p>
    </div>
    <div class="kuliner-card" style="background-image: url('images/halua.jpg')">
      <p>Halua Kenari</p>
    </div>
  </div>
</section>


 <!-- Galeri -->
<div class="galeri" id="galeri">
  <h2>Galeri</h2>
	<div class="galeri-grid">
		<div class="galeri-row galeri-row-2">
			<div class="galeri-card" style="background-image: url('images/liang.jpg');"></div>
			<div class="galeri-card" style="background-image: url('images/jmp.jpg');"></div>
		</div>
		<div class="galeri-row galeri-row-3">
			<div class="galeri-card" style="background-image: url('images/ambon.jpg');"></div>
			<div class="galeri-card" style="background-image: url('images/gong_perdamaian.png');"></div>
			<div class="galeri-card" style="background-image: url('images/lb.jpg');"></div>
		</div>
		<div class="galeri-row galeri-row-2">
			<div class="galeri-card" style="background-image: url('images/benteng.jpg');"></div>
			<div class="galeri-card" style="background-image: url('images/pintu_kota.jpg');"></div>
		</div>
	</div>
</div>

 <footer>
    <div class="container">
      <p>&copy; 2025 Ambon.go | Wisata Maluku</p>
    </div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
