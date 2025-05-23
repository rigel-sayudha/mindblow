# Mindblow - Clothing Brand Web Application

## Deskripsi
Mindblow adalah aplikasi web e-commerce sederhana untuk clothing brand, dibangun menggunakan PHP dan MySQL. Fitur utama meliputi katalog produk, keranjang belanja, pencarian, user profile, serta dashboard admin untuk mengelola produk dan user.

---

## Fitur Utama
- **User**:  
  - Registrasi & Login  
  - Lihat koleksi produk  
  - Pencarian & filter produk  
  - Keranjang belanja  
  - Profil pengguna & riwayat pesanan  
- **Admin**:  
  - Kelola produk (tambah, edit, hapus)  
  - Kelola user  
  - Lihat pesanan user

---

## Instalasi

### 1. Persiapan
- Install [XAMPP](https://www.apachefriends.org/download.html) (atau software serupa yang menyediakan Apache & MySQL).
- Download atau clone repository ini ke folder `htdocs` milik XAMPP:
  ```
  C:\xampp\htdocs\mindblow
  ```

### 2. Import Database
- Buka browser, akses [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Buat database baru dengan nama: `clothingbrand`
- Import file `clothingbrand.sql` yang ada di folder project ke database tersebut.

### 3. Konfigurasi Koneksi Database
- Pastikan file [`template/dbcon.php`](template/dbcon.php) berisi:
  ```php
  $server = "localhost";
  $user = "root";
  $password = "";
  $db = "clothingbrand";
  ```
- Username default XAMPP adalah `root` dan password dikosongkan.

### 4. Jalankan Project
- Pastikan Apache & MySQL di XAMPP sudah berjalan.
- Buka browser dan akses:
  ```
  http://localhost/mindblow/
  ```
  (Akan otomatis redirect ke halaman home)

### 5. Akun Admin (Default)
- Email: `admin@admin.com`
- Password: `admin`

### 6. Folder Upload
- Pastikan folder `uploads` ada di dalam project dan dapat ditulis (untuk upload gambar produk).

---

## Struktur Folder Penting
- `template/` : Semua file PHP utama (home, login, admin, dsb)
- `static/` : File CSS
- `img/` : Gambar/logo
- `uploads/` : Hasil upload gambar produk
- `clothingbrand.sql` : File database

---

## Catatan
- Untuk fitur email, perlu konfigurasi SMTP jika ingin mengirim email dari aplikasi.
- Jika ada error, cek koneksi database, status Apache/MySQL, dan struktur database.

---

**Selamat mencoba!**
