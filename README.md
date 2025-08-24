# Wisata Maluku - Website Pariwisata  

Website ini dibuat menggunakan **PHP Native + MySQL + Bootstrap 5** untuk menampilkan informasi wisata dan penginapan di Maluku.  
Tujuannya adalah membantu wisatawan menemukan destinasi menarik, penginapan terdekat, serta mempermudah kontak & lokasi melalui WhatsApp dan Google Maps.  

## Fitur Utama  
- 📍 **Daftar Wisata**: Menampilkan informasi wisata (nama, deskripsi, gambar, lokasi).  
- 🏨 **Daftar Penginapan**: Menampilkan informasi penginapan beserta fasilitas, harga, wisata terdekat.  
- 💬 **Kontak WhatsApp**: Pengunjung bisa langsung chat pengelola penginapan.  
- 🗺️ **Google Maps Link**: Akses cepat ke lokasi penginapan/wisata.  
- 📸 **Upload Gambar**: Admin bisa menambahkan foto wisata atau penginapan.  

## 🛠Teknologi yang Digunakan  
- **Backend**: PHP Native  
- **Frontend**: Bootstrap 5, HTML, CSS  
- **Database**: MySQL  
- **Hosting (opsional)**: Bisa di XAMPP/Laragon atau web hosting online  

## 📂 Struktur Folder  
```
/project-folder
│── /config
│    └── koneksi.php
│── /uploads      # Folder penyimpanan gambar
│── wisata.php    # Halaman daftar wisata
│── penginapan.php # Halaman daftar penginapan
│── index.php     # Halaman utama
│── style.css     # Custom styling
```

## ⚡ Instalasi & Menjalankan
1. Clone repository:
   ```bash
   git clone https://github.com/username/nama-repo.git
   ```
2. Import database `db_pariwisata.sql` ke MySQL.  
3. Ubah konfigurasi database di `config/koneksi.php`.  
   ```php
   $koneksi = mysqli_connect("localhost","root","","db_pariwisata");
   ```
4. Jalankan project di browser melalui XAMPP/Laragon:
   ```
   http://localhost/nama-folder
   ```

## 👨‍💻 Kontributor  
- Afifah Iftahul Nisa – Developer  
