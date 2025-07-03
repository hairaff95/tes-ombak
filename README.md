# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, dan sistem transaksi.

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)

## Fitur

- Katalog Produk
  - Tampilan produk dengan gambar
  - Pencarian produk
- Keranjang Belanja
  - Tambah/hapus produk dari keranjang  
  - Ubah jumlah produk  
  - Hitung otomatis total belanja  
- Sistem Transaksi
  - Checkout produk hanya untuk pengguna login  
  - Penyimpanan riwayat transaksi pengguna  
  - Tampilkan detail produk per transaksi  
- Panel Admin
  - Manajemen produk (CRUD)
  - Manajemen kategori
  - Laporan transaksi
  - Export data ke PDF
- Sistem Autentikasi
  - Login dan Register pengguna  
  - Autentikasi halaman menggunakan filter  
  - Manajemen akun  
- Halaman FAQ  
  - Berisi pertanyaan umum tentang penggunaan aplikasi  
  - Hanya bisa diakses oleh pengguna yang login  
  - Menggunakan accordion dengan gaya dari template NiceAdmin  
- UI Responsif dengan NiceAdmin template

## Persyaratan Sistem

- PHP >= 7.4
- Composer
- Web server (XAMPP)

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone [URL repository]
   cd belajar-ci-tugas
   ```
2. **Install dependensi**
   ```bash
   composer install
   ```
3. **Konfigurasi database**

   - Start module Apache dan MySQL pada XAMPP
   - Buat database **db_ci4** di phpmyadmin.
   - copy file .env dari tutorial https://www.notion.so/april-ns/Codeigniter4-Migration-dan-Seeding-045ffe5f44904e5c88633b2deae724d2

4. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
5. **Seeder data**
   ```bash
   php spark db:seed ProductSeeder
   ```
   ```bash
   php spark db:seed UserSeeder
   ```
6. **Jalankan server**
   ```bash
   php spark serve
   ```
7. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi.

## Struktur Proyek

Proyek menggunakan struktur MVC CodeIgniter 4:

- app/Controllers - Logika aplikasi dan penanganan request
  - AuthController.php - Autentikasi pengguna
  - ProdukController.php - Manajemen produk
  - TransaksiController.php - Proses transaksi
  - FaqController.php - Faq Tampilan 
- app/Models - Model untuk interaksi database
  - ProductModel.php - Model produk
  - UserModel.php - Model pengguna
  - TransactionModel.php
  - TransactionDetailModel.php
  - DiskonModel.php
- app/Views - Template dan komponen UI
  - a_produk.php - Tampilan produk
  - a_keranjang.php - Halaman keranjang
  - a_checkout.php - Proses checkout
  - a_profile.php - Riwayat transaksi
  - a_faq.php - Halaman FAQ
- public/img - Gambar produk dan aset
- public/NiceAdmin - Template admin
