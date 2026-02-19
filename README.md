CRUD Apps Sederhana - Test Intisera
Aplikasi manajemen inventaris barang sederhana yang dibangun menggunakan CodeIgniter 3. Proyek ini merupakan bagian dari tes teknis untuk posisi Developer di Intisera.

🚀 Fitur Utama
Autentikasi User: Login menggunakan database (Username: admin, Password: 123456).

Manajemen Barang (CRUD):

Tambah data barang dengan validasi form.

Tampil daftar barang dalam bentuk tabel.

Edit/Update data barang.

Hapus data barang.

Dashboard Analytics: Menampilkan ringkasan total harga barang berdasarkan kategori.

Security: Validasi input server-side menggunakan Form Validation CI3 dan manajemen session untuk login/logout.

🛠️ Teknologi yang Digunakan
Framework: CodeIgniter 3.1.x

Bahasa: PHP

Database: MySQL

UI/Styling: Bootstrap 4/5

Web Server: Apache (XAMPP/Laragon)

📋 Persiapan & Instalasi
Clone Repository

Bash
git clone https://github.com/username-kamu/nama-repo.git
Konfigurasi Database

Buat database baru di phpMyAdmin dengan nama db_intisera (atau sesuai keinginan).

Import file .sql yang berada di folder DATABASE/ ke dalam database tersebut.

Buka file application/config/database.php dan sesuaikan username/password MySQL kamu.

Konfigurasi Base URL

Buka application/config/config.php.

Ubah $config['base_url'] sesuai dengan path folder project kamu (contoh: http://localhost/crud-intisera/).

Akses Aplikasi

Buka browser dan akses URL tersebut.

Login Akun:

Username: admin

Password: 123456

📂 Struktur Folder Database
Pastikan kamu mengecek folder berikut untuk keperluan setup awal:

Plaintext
/DATABASE
└── intisera_test.sql <-- Import file ini
📝 Detail Modul Barang
Input data barang meliputi:

Nama Barang

Kategori: Smartphone, Notebook, Keyboard, Mouse, Hardisk.

Harga: (Validasi angka wajib).

Tanggal Pembelian: (Date picker).

Kontak
Jika ada pertanyaan mengenai teknis implementasi, silakan hubungi saya melalui email atau pesan di GitHub ini.
