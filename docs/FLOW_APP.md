# 📄 FLOW_APP.md
# SISTEM INFORMASI MANAJEMEN SURAT & AGENDA KEGIATAN (SIM-SAK)
Dokumentasi Flow Aplikasi, User Journey, Arsitektur, API Flow, dan RBAC.

---

## 1. Penjelasan Role & Akses (RBAC)

### 🛡️ Admin
Admin adalah pihak yang bertanggung jawab mengelola seluruh sistem. Mereka memiliki akses penuh terhadap semua data dan modul. Admin dapat menambahkan, mengubah, menghapus, hingga melihat seluruh data, termasuk mengelola user, kategori surat, dan jenis agenda.

**Contoh peran:** Kepala Tata Usaha, Administrator Sistem, Koordinator IT.

---

### 🗂️ Staff / Petugas
Staff bertugas mengelola kegiatan operasional seperti menginput dan memperbarui data surat masuk, surat keluar, dan agenda kegiatan. Mereka tidak diperkenankan mengubah pengaturan sistem seperti manajemen user, jenis agenda, atau kategori surat. Staff hanya fokus pada proses bisnis harian.

**Contoh peran:** Petugas administrasi kantor, operator surat, pegawai tata usaha.

---

### 👤 User Biasa
User biasa hanya dapat melihat data yang tersedia tanpa bisa mengubahnya. Mereka bisa melihat surat masuk, surat keluar, dan agenda kegiatan, serta tetap dapat mengelola profil akun mereka sendiri. Perannya lebih ke konsumsi informasi, bukan pengelolaan.

**Contoh peran:** Pegawai umum yang membutuhkan akses informasi surat dan agenda, staf non-administratif.

---

## 2. USER JOURNEY (Alur Pengguna)

1. Pengguna membuka halaman login → `/login`
2. Sistem memverifikasi kredensial & role → diarahkan ke `/dashboard`
3. Menu ditampilkan berdasarkan role masing-masing
4. Pengguna melakukan operasi sesuai hak akses:
   - Admin: seluruh modul
   - Staff: modul operasional (tanpa master data)
   - User: hanya melihat data + akses lampiran
5. Semua role dapat membuka & mengubah profil melalui `/profile`

---

## 3. ALUR FITUR UTAMA (Tanpa Pengulangan Role)

### Surat Masuk
- Input data surat (nomor, asal, tanggal, isi ringkas)
- Upload lampiran
- Detail view, pencarian, filter, dan pagination

### Surat Keluar
- Input data surat keluar
- Upload lampiran
- Detail view + filter

### Agenda Kegiatan
- Menambahkan kegiatan, catatan, dan tanggal
- Edit, lihat detail, dan hapus agenda

### Jenis Agenda
- Manajemen jenis agenda yang digunakan pada modul agenda

### Kategori Surat
- Manajemen kategori surat (internal, eksternal, penting, dll)

### Profil Pengguna
- Edit nama, email, dan password
- Berlaku untuk semua role

---

## 4. ARSITEKTUR APLIKASI

### Client (Frontend)
- Laravel Breeze (Blade + TailwindCSS)
- Vite untuk build asset
- Search, filter, pagination, dan UI responsive

### Server (Backend)
- Laravel 12
- Middleware role: `admin`, `staff`, `user`
- Controller-based CRUD
- Validation & File Upload Handling

### Storage
- Upload lampiran ke:  
  `storage/app/public/lampiran`
- Symlink:  
  `php artisan storage:link`

### Database
Tabel utama:
- `users`
- `surat_masuks`
- `surat_keluars`
- `agenda_kegiatans`
- `jenis_agendas`
- `kategori_surats`

---

## 5. API FLOW / ROUTE DETAIL

### SURAT MASUK
```php
Route::resource('surat-masuk', SuratMasukController::class);
```
URL:
- GET `/surat-masuk`
- GET `/surat-masuk/create`
- POST `/surat-masuk`
- GET `/surat-masuk/{id}`
- GET `/surat-masuk/{id}/edit`
- PUT `/surat-masuk/{id}`
- DELETE `/surat-masuk/{id}`

---

### SURAT KELUAR
```php
Route::resource('surat-keluar', SuratKeluarController::class);
```
URL:
- GET `/surat-keluar`
- GET `/surat-keluar/create`
- POST `/surat-keluar`
- GET `/surat-keluar/{id}`
- GET `/surat-keluar/{id}/edit`
- PUT `/surat-keluar/{id}`
- DELETE `/surat-keluar/{id}`

---

### AGENDA KEGIATAN
```php
Route::resource('agenda-kegiatan', AgendaKegiatanController::class);
```
URL:
- GET `/agenda-kegiatan`
- GET `/agenda-kegiatan/create`
- POST `/agenda-kegiatan`
- GET `/agenda-kegiatan/{id}`
- GET `/agenda-kegiatan/{id}/edit`
- PUT `/agenda-kegiatan/{id}`
- DELETE `/agenda-kegiatan/{id}`

---

### JENIS AGENDA (Admin Only)
```php
Route::resource('jenis-agenda', JenisAgendaController::class);
```
URL:
- GET `/jenis-agenda`
- GET `/jenis-agenda/create`
- POST `/jenis-agenda`
- GET `/jenis-agenda/{id}`
- GET `/jenis-agenda/{id}/edit`
- PUT `/jenis-agenda/{id}`
- DELETE `/jenis-agenda/{id}`

---

### KATEGORI SURAT (Admin Only)
```php
Route::resource('kategori-surat', KategoriSuratController::class);
```
URL:
- GET `/kategori-surat`
- GET `/kategori-surat/create`
- POST `/kategori-surat`
- GET `/kategori-surat/{id}`
- GET `/kategori-surat/{id}/edit`
- PUT `/kategori-surat/{id}`
- DELETE `/kategori-surat/{id}`

---

## 6. RBAC FLOW

### Admin
| Modul             | Hak |
|-------------------|-----|
| Surat Masuk       | CRUD |
| Surat Keluar      | CRUD |
| Agenda Kegiatan   | CRUD |
| Jenis Agenda      | CRUD |
| Kategori Surat    | CRUD |
| User Management   | CRUD |
| Lampiran          | akses penuh |
| Profil            | update sendiri |

---

### Staff
| Modul             | Hak |
|-------------------|-----|
| Surat Masuk       | CRUD |
| Surat Keluar      | CRUD |
| Agenda Kegiatan   | CRUD |
| Jenis Agenda      | ❌ |
| Kategori Surat    | ❌ |
| Lampiran          | bisa akses |
| Profil            | update sendiri |

---

### User
| Modul             | Hak |
|-------------------|-----|
| Surat Masuk       | Read-only |
| Surat Keluar      | Read-only |
| Agenda Kegiatan   | Read-only |
| Jenis Agenda      | ❌ |
| Kategori Surat    | ❌ |
| Lampiran          | bisa akses |
| Profil            | update sendiri |

---
