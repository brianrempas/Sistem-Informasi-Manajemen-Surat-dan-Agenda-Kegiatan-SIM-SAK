# 📘 USER_GUIDE.md  
# PANDUAN PENGGUNAAN SISTEM INFORMASI MANAJEMEN SURAT & AGENDA KEGIATAN (SIM-SAK)

Panduan ini menjelaskan cara menggunakan aplikasi SIM-SAK untuk semua role: **Admin, Staff, dan User**.

---

## 1. AKSES APLIKASI

### 🔑 Login
1. Buka halaman login:  
   **`/login`**
2. Masukkan email & password.
3. Klik **Login** → Anda akan diarahkan ke **Dashboard** sesuai role.

Akun default (jika menggunakan seeder):

| Role  | Email                    | Password |
|-------|---------------------------|----------|
| Admin | brianrempas@gmail.com     | 123456   |
| Staff | adit@gmail.com            | 123456   |
| User  | pusat@gmail.com           | 123456   |

---

## 2. MENU UTAMA BERDASARKAN ROLE

### 🟦 Admin
- Dashboard  
- Surat Masuk  
- Surat Keluar  
- Agenda Kegiatan  
- Jenis Agenda  
- Kategori Surat  
- User Management  
- Profile  

### 🟩 Staff
- Dashboard  
- Surat Masuk  
- Surat Keluar  
- Agenda Kegiatan  
- Profile  

*(Tidak bisa membuka Jenis Agenda & Kategori Surat)*

### 🟧 User
- Dashboard  
- Surat Masuk (Read-only)  
- Surat Keluar (Read-only)  
- Agenda Kegiatan (Read-only)  
- Bisa mengakses lampiran  
- Profile  

*(Tidak bisa membuka Jenis Agenda & Kategori Surat)*

---

## 3. PANDUAN FITUR

---

## 📥 A. SURAT MASUK

### 1. Melihat daftar surat masuk  
Menu: **Surat Masuk**  
Fitur:
- Search (nomor surat / asal surat)
- Filter tanggal
- Pagination

### 2. Menambah surat masuk (Admin & Staff)
1. Klik **Tambah Surat Masuk**
2. Isi form:
   - Nomor Surat
   - Asal Surat
   - Tanggal Masuk
   - Ringkasan Isi
3. Upload lampiran (PDF/JPG/PNG)
4. Klik **Simpan**

### 3. Edit surat (Admin & Staff)
- Klik **Edit**
- Ubah data
- Klik **Update**

### 4. Hapus surat (Admin & Staff)
- Klik **Hapus**

### 5. Membuka lampiran (Semua role)
- Klik tombol **Lihat Lampiran**

---

## 📤 B. SURAT KELUAR

### Melihat atau membuat surat keluar
Fungsinya sama seperti Surat Masuk, hanya berbeda konteks.

Role:
- Admin & Staff → **CRUD**
- User → **Read + akses lampiran**

---

## 🗓 C. AGENDA KEGIATAN

### Fitur:
- Menambah agenda (tanggal, nama agenda, isi)
- Edit agenda
- Hapus agenda
- Detail agenda

Role:
- Admin & Staff → **CRUD**
- User → **Read-only**

---

## 🧩 D. JENIS AGENDA (Admin Only)
Digunakan sebagai master untuk tipe agenda pada modul agenda.

Fitur:
- Tambah jenis agenda
- Edit jenis agenda
- Hapus jenis agenda

Staff & User tidak dapat membuka halaman ini.

---

## 🗂 E. KATEGORI SURAT (Admin Only)
Digunakan sebagai master kategori surat.

Fitur:
- Tambah kategori
- Edit kategori
- Hapus kategori

Staff & User tidak dapat mengakses menu ini.

---

## 👤 F. PROFILE (Semua Role)

Lokasi: **/profile**

Fitur:
- Edit nama
- Edit email
- Ganti password  
- Update foto profil (jika ada)

Cara update:
1. Masuk menu **Profile**
2. Isi perubahan
3. Klik **Save**

---

## 4. CARA UPLOAD LAMPIRAN

1. Masuk menu Surat Masuk / Surat Keluar
2. Pilih *Tambah* atau *Edit*
3. Klik **Upload File**
4. Pilih file:
   - PDF
   - JPG
   - PNG
5. Klik **Simpan**

Lampiran otomatis tersimpan di:  
`storage/app/public/lampiran`

---

## 5. ERROR YANG SERING TERJADI & CARA MENGATASI

### ❌ Tidak bisa akses menu tertentu
**Penyebab:** Role Anda bukan Admin.  
**Solusi:** Hubungi admin untuk perubahan role.

### ❌ Tidak bisa upload file
Pastikan:
- Ukuran file < 5MB
- Format file sesuai

### ❌ Storage link tidak muncul
Jalankan:
```bash
php artisan storage:link
```

---

## 6. LOGOUT

Klik **Logout** di bagian navbar atau menu samping.

---

## 7. PENUTUP

Dokumentasi ini dibuat agar Admin, Staff, dan User dapat menjalankan aplikasi dengan benar sesuai role masing-masing.

Jika ingin ditambahkan screenshot atau versi PDF, tinggal bilang saja.
