<?php
include 'config/koneksi.php';

// --- Ambil data wisata berdasarkan id (aman) ---
$error = null;
$data = null;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $error = "Destinasi tidak ditemukan. (Parameter id tidak ada)";
} else {
    $id = intval($_GET['id']);
    $res = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id = '$id' LIMIT 1");
    if ($res && mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
    } else {
        $error = "Data wisata tidak ditemukan untuk id yang diberikan.";
    }
}

// Siapkan nilai default agar tidak ada undefined variable
$nama        = $data['nama']        ?? '';
$deskripsi   = $data['deskripsi']   ?? '';
$fasilitas   = $data['fasilitas']   ?? 'Informasi belum tersedia';
$gambar      = $data['gambar']      ?? 'default.jpg'; // sediakan default.jpg di folder uploads
$rawBiaya    = $data['biaya']       ?? '0';

// bersihkan biaya dari format "Rp" / titik sehingga jadi integer
$biayaMasuk = (int) preg_replace('/[^\d]/', '', $rawBiaya);

// Ambil biaya transport khusus untuk wisata ini (kendaraan_wisata join kendaraan)
$kendaraanQuery = false;
if ($data) {
    $kendaraanQuery = mysqli_query($koneksi, "
        SELECT k.id, k.nama, kw.biaya
        FROM kendaraan_wisata kw
        JOIN kendaraan k ON kw.id_kendaraan = k.id
        WHERE kw.id_wisata = '$id'
        ORDER BY k.nama ASC
    ");
}

// Link google maps (fallback pencarian nama)
$maps_url = $nama ? "https://www.google.com/maps/search/?api=1&query=" . urlencode($nama) : '#';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($nama ?: 'Detail Destinasi'); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
          font-family: 'Segoe UI', sans-serif;
          background:#f7f9fc;
        }
        .btn-custom {
          background:black;
          color:#fff; border-radius:8px;
          border:none;
        }
        .destination-img {
          border-radius:12px;
          width:100%;
          height:400px;
          object-fit:cover;
          box-shadow:0 6px 18px rgba(0, 0, 0, 0.08);
        }
        .map-frame {
          border-radius:10px;
          box-shadow:0 6px 18px rgba(0,0,0,0.06);
          border:0; width:100%;
          height:360px;
        }
        .card-info {
          background:#fff;
          border-radius:12px;
          padding:18px; box-shadow:0 6px 18px rgba(0,0,0,0.03);
        }
        .result-total {
          font-size:1.25rem;
          font-weight:700;
          color:#0b5;
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

<div class="container mt-5">

<?php if ($error): ?>
    <div class="alert alert-warning">
        <?php echo htmlspecialchars($error); ?> — <a href="daftar_destinasi.php">Kembali ke daftar destinasi</a>.
    </div>
<?php else: ?>
    <div class="row g-5">
        <div class="col-lg-6">
            <img src="uploads/<?php echo htmlspecialchars($gambar); ?>" alt="<?php echo htmlspecialchars($nama); ?>" class="destination-img">
        </div>

        <div class="col-lg-6">
            <h1 class="fw-bold mb-2"><?php echo htmlspecialchars($nama); ?></h1>
            <p class="text-muted mb-3"><strong>Deskripsi</strong></p>
            <p class="text-secondary"><?php echo nl2br(htmlspecialchars($deskripsi)); ?></p>

            <div class="card-info mt-4">
                <p class="mb-1"><i class="bi bi-building"></i> <strong>Fasilitas:</strong> <?php echo htmlspecialchars($fasilitas); ?></p>
                <p class="mb-1"><i class="bi bi-ticket-perforated"></i> <strong>Biaya Masuk:</strong> Rp <?php echo number_format($biayaMasuk, 0, ',', '.'); ?></p>
            </div>

            <div class="mt-4">
                <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#modalEstimasi">
                    <i class="bi bi-calculator"></i> Hitung Estimasi Biaya
                </button>
            </div>
        </div>
    </div>

    <!-- Map -->
    <div id="peta" class="mt-5">
        <h4 class="fw-bold"><i class="bi bi-map"></i> Peta Lokasi</h4>
        <div class="mt-3">
            <iframe class="map-frame" src="https://www.google.com/maps?q=<?php echo urlencode($nama); ?>&output=embed" allowfullscreen></iframe>
        </div>
        <a class="btn btn-custom mt-3" href="<?php echo $maps_url; ?>" target="_blank"><i class="bi bi-signpost"></i> Lihat Rute di Google Maps</a>
    </div>

    <!-- Modal Estimasi -->
    <div class="modal fade" id="modalEstimasi" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-warning text-white">
            <h5 class="modal-title"><i class="bi bi-cash-stack"></i> Estimasi Biaya Perjalanan</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Jenis Kendaraan</label>
              <select id="kendaraan" class="form-select">
                <option value="0">-- Pilih Kendaraan --</option>
                <?php
                  if ($kendaraanQuery && mysqli_num_rows($kendaraanQuery) > 0) {
                      // reset pointer not necessary here, we haven't consumed it yet
                      mysqli_data_seek($kendaraanQuery, 0);
                      while ($kend = mysqli_fetch_assoc($kendaraanQuery)) {
                          // kw.biaya disisipkan sebagai value numeric
                          $biayaTransport = (int) $kend['biaya'];
                          echo '<option value="'. $biayaTransport .'">'. htmlspecialchars($kend['nama']) .' (Rp '. number_format($biayaTransport,0,',','.') .')</option>';
                      }
                  } else {
                      echo '<option value="0" disabled>Tidak ada opsi transportasi untuk destinasi ini</option>';
                  }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Biaya Masuk</label>
              <input id="biayaMasuk" type="number" class="form-control" readonly value="<?php echo $biayaMasuk; ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">Budget Makanan</label>
              <select id="biayaMakanan" class="form-select">
                <option value="0">Bawa Makanan Sendiri (Rp 0)</option>
                <option value="100000">Rp 100.000</option>
                <option value="150000">Rp 150.000</option>
                <option value="200000">Rp 200.000</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Biaya Transportasi (estimasi)</label>
              <input id="biayaTransport" type="number" class="form-control" readonly value="0">
            </div>

            <div id="hasilEstimasi" class="alert alert-info d-none"></div>

            <button id="btnHitung" class="btn btn-dark w-100 mt-2"><i class="bi bi-calculator"></i> Hitung Estimasi</button>
          </div>
        </div>
      </div>
    </div>

<?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// helper: safe query selector
const $ = (sel) => document.querySelector(sel);

function formatIDR(n) {
    return n.toLocaleString('id-ID');
}

// hanya pas modal ada
document.addEventListener('DOMContentLoaded', function() {
    const kendaraan = $('#kendaraan');
    const biayaTransport = $('#biayaTransport');
    const biayaMasuk = $('#biayaMasuk');
    const biayaMakanan = $('#biayaMakanan');
    const hasil = $('#hasilEstimasi');
    const btnHitung = $('#btnHitung');

    if (kendaraan) {
        kendaraan.addEventListener('change', function() {
            const v = parseInt(this.value) || 0;
            if (biayaTransport) biayaTransport.value = v;
            // hide hasil saat opsi berubah
            if (hasil) hasil.classList.add('d-none');
        });
    }

    if (biayaMakanan) {
        biayaMakanan.addEventListener('change', function() {
            if (hasil) hasil.classList.add('d-none');
        });
    }

    if (btnHitung) {
        btnHitung.addEventListener('click', function() {
            const masuk = parseInt(biayaMasuk ? biayaMasuk.value : 0) || 0;
            const makan = parseInt(biayaMakanan ? biayaMakanan.value : 0) || 0;
            const transport = parseInt(biayaTransport ? biayaTransport.value : 0) || 0;
            const total = masuk + makan + transport;

            if (hasil) {
                hasil.classList.remove('d-none');
                hasil.innerHTML = `
                    <div><strong>Rincian:</strong></div>
                    <div>• Biaya masuk: Rp ${formatIDR(masuk)}</div>
                    <div>• Biaya makanan: Rp ${formatIDR(makan)}</div>
                    <div>• Biaya transportasi: Rp ${formatIDR(transport)}</div>
                    <hr>
                    <div class="result-total">Total estimasi: Rp ${formatIDR(total)}</div>
                `;
            }
        });
    }
});
</script>
</body>
</html>
