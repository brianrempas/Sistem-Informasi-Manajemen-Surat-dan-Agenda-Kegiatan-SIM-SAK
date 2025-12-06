# SIM-SAK (Sistem Informasi Manajemen Surat & Agenda Kegiatan)

## Tim PemenangHatiPria
2405551179 - brian salomo rempas

## Deskripsi singkat
SIM-SAK adalah sebuah aplikasi berbasis web yang dirancang untuk mengelola **surat masuk**, **surat keluar**, dan **agenda kegiatan** secara terstruktur dan efisien. Sistem ini dilengkapi dengan fitur manajemen pengguna berbasis role (RBAC), upload lampiran, pencarian, dan pagination agar pengelolaan lebih mudah dan cepat.

## Fitur utama
- Autentikasi (Laravel Breeze)
- Manajemen User (Admin)
- CRUD Jenis Agenda, Kategori Surat, Surat Masuk, Surat Keluar, Agenda Kegiatan
- Upload lampiran (disimpan di `storage`)
- Filter & search, pagination
- Role-based access control (middleware custom)

### Backend
- Laravel 12.40.2
- PHP 8.4.13
- SQLite
- API RESTful

### Frontend
- Laravel Blade
- TailwindCSS

### Tools
- GitHub
- Postman (opsional)
- ERD Tools (Draw.io, DBDesigner, dll)

## 📌 Penjelasan Struktur Routes Penting

### `GET /dashboard`
Halaman utama setelah login yang menampilkan ringkasan informasi sistem sesuai role masing-masing.

---

### `users` (Admin Only)
Digunakan admin untuk mengelola akun pengguna sistem. Termasuk membuat akun baru, mengedit role, dan menghapus user.

---

### `jenis-agenda` (Admin Only)
Mengelola daftar jenis agenda resmi, seperti “Rapat”, “Kunjungan”, atau “Sosialisasi”. Dipakai sebagai referensi saat membuat agenda kegiatan.

---

### `kategori-surat` (Admin Only)
Mengatur kategori surat seperti “Undangan”, “Pemberitahuan”, “Permohonan”, dan lain-lain. Dipakai saat input surat masuk/keluar.

---

### `surat-masuk`
Mengelola data surat masuk. Staff dan admin dapat membuat, mengedit, dan menghapus; user biasa hanya dapat melihat.

---

### `surat-keluar`
Mengelola surat keluar yang diterbitkan instansi. Staff dan admin dapat CRUD; user biasa hanya membaca.

---

### `agenda-kegiatan`
Mencatat dan mengelola seluruh agenda kegiatan instansi. Admin dan staff dapat CRUD; user hanya melihat.

---

## ▶ Cara Menjalankan Project
### 1. Clone repository
```bash
git clone https://github.com/brianrempas/Sistem-Informasi-Manajemen-Surat-dan-Agenda-Kegiatan-SIM-SAK.git
cd Sistem-Informasi-Manajemen-Surat-dan-Agenda-Kegiatan-SIM-SAK
```
### 2. Install dependencies
```bash
composer install
npm install
```
### 3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Migrasi dan seed (data yang aku buat) database
```bash
php artisan migrate:fresh --seed      
```
Kode akan beri notif untuk download database sqlite, tulis yes

### 5. Jalankan server
```bash
php artisan serve
```
** ATAU dijalankan lokal..**
```bash
php artisan serve --host=192.168.1.x --port=8000 
```
kedua url berikut adalah url yang kamu pakai di browser
kalau menggunakan antivirus file akan dapat diblokir, kasi file itu exception untuk lanjut.
### 6. Jalankan Vite Untuk UI Compiler (pakai terminal yang beda)
```bash
cd Sistem-Informasi-Manajemen-Surat-dan-Agenda-Kegiatan-SIM-SAK
npm run dev
```
** ATAU mode production (deployment)**
```bash
npm run build
```
Jika ingin dijalankan lokal, vite WAJIB pakai mode production(deployment). 

## ▶ Akun Login Default (Seeder)

| Role  | Email | Password |
|-------|--------|-----------|
| Admin | **brianrempas@gmail.com** | 123456 |
| Staff | **adit@gmail.com** | 123456 |
| User | **pusat@gmail.com** | 123456 |

---
