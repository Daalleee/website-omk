# Product Requirements Document (PRD)
# Website Profil OMK dengan Content Management System (CMS)

---

## 1. Informasi Umum

### Nama Produk
Website Profil Orang Muda Katolik (OMK)

### Versi
1.0

### Tanggal
Juli 2026

### Status
Draft

### Platform
- Website Responsive
- Desktop
- Tablet
- Mobile

---

# 2. Latar Belakang

OMK membutuhkan media informasi yang dapat digunakan untuk memperkenalkan organisasi, menampilkan struktur kepengurusan, mendokumentasikan kegiatan, membagikan galeri foto, serta menyediakan informasi kontak. Selain itu, pengurus membutuhkan sistem yang mudah digunakan untuk mengelola seluruh konten tanpa harus memahami pemrograman.

Oleh karena itu dibangun Website Profil OMK berbasis CMS menggunakan Laravel.

---

# 3. Tujuan

- Menjadi media informasi resmi OMK.
- Mempermudah publik memperoleh informasi kegiatan.
- Menampilkan struktur kepengurusan.
- Mendokumentasikan seluruh kegiatan.
- Mempermudah pengurus memperbarui informasi melalui CMS.
- Menjadi arsip digital organisasi.

---

# 4. Target Pengguna

## Pengunjung

- Umat
- Orang tua
- Calon anggota OMK
- Pastor
- Pengurus Gereja
- Masyarakat umum

Hak akses

- Melihat seluruh informasi publik.

---

## Administrator

Hak akses

- Login
- Mengelola seluruh konten
- Mengelola pengguna


# 5. Teknologi

Backend

- Laravel 

Frontend

  tailwin

Database

- MySQL


---

# 6. Sitemap

Home

Tentang

Pengurus

Anggota

Kegiatan

Galeri

Kontak

Login Admin

Dashboard

---

# 7. Fitur Website Publik

## 7.1 Beranda

Menampilkan

- Hero Banner
- Logo OMK
- Nama Organisasi
- Motto
- Tombol Tentang
- Sambutan Ketua
- Statistik
- Kegiatan Terbaru
- Galeri Terbaru
- Footer

---

## 7.2 Tentang

Menampilkan

- Sejarah
- Visi
- Misi
- Tujuan
- Logo
- Makna Logo
- Pastor Pendamping

---

## 7.3 Pengurus

Menampilkan

- Ketua
- Wakil Ketua
- Sekretaris
- Bendahara
- Koordinator Bidang
- Anggota

Setiap pengurus memiliki

- Foto
- Nama
- Jabatan
- Periode
- Motto (Opsional)

---

## 7.4 Anggota

Menampilkan daftar anggota.

Fitur

- Search
- Pagination
- Filter Status

Informasi

- Foto
- Nama
- Bidang
- Status

---

## 7.5 Kegiatan

Menampilkan seluruh kegiatan OMK.

Informasi

- Judul
- Thumbnail
- Tanggal
- Lokasi
- Kategori
- Deskripsi

Fitur

- Search
- Filter Tahun
- Filter Kategori

---

## 7.6 Detail Kegiatan

Menampilkan

- Banner
- Isi kegiatan
- Galeri kegiatan
- Dokumentasi

---

## 7.7 Galeri

Menampilkan

Album Foto

Grid Layout

Klik gambar

↓

Popup ukuran besar

---

## 7.8 Kontak

Menampilkan

Alamat

Google Maps

Nomor WA

Instagram

Facebook

Email

Form Hubungi Kami

---

# 8. CMS

Login

Dashboard

Home

Tentang

Pengurus

Anggota

Kegiatan

Galeri

Kontak

User

Logout

---

# 9. Dashboard

Statistik

Jumlah Pengurus

Jumlah Anggota

Jumlah Kegiatan

Jumlah Album

Jumlah Foto

Jumlah Pengunjung

Chart Pengunjung

---

# 10. Modul CMS

## Dashboard

CRUD

Tidak

Hanya Statistik

---

## Home

CRUD

Ya

Data

- Hero
- Banner
- Sambutan
- Statistik

---

## Tentang

CRUD

Ya

Data

- Sejarah
- Visi
- Misi
- Tujuan
- Logo

---

## Pengurus

CRUD

Ya

Data

- Foto
- Nama
- Jabatan
- Periode
- Urutan
- Status

---

## Anggota

CRUD

Ya

Data

- Foto
- Nama
- Jenis Kelamin
- Tempat Lahir
- Tanggal Lahir
- Alamat
- Nomor HP
- Bidang
- Status

---

## Kegiatan

CRUD

Ya

Data

- Judul
- Slug
- Thumbnail
- Banner
- Deskripsi
- Tanggal
- Lokasi
- Kategori
- Status Publish

---

## Galeri

CRUD

Ya

Data

- Album
- Foto
- Caption

Upload Multiple Images

---

## Kontak

CRUD

Ya

Data

- Alamat
- Email
- WA
- Facebook
- Instagram
- Maps

---

## User

CRUD

Ya

Role

Admin

Editor

---

# 11. Database

## users

- id
- name
- email
- password
- role
- created_at
- updated_at

---

## home_settings

- id
- hero_title
- hero_subtitle
- hero_image
- welcome_message
- statistic_member
- statistic_activity

---

## abouts

- id
- history
- vision
- mission
- goals
- logo

---

## leaders

- id
- photo
- name
- position
- period
- motto
- order_number
- status

---

## members

- id
- photo
- name
- gender
- birth_place
- birth_date
- phone
- address
- division
- status

---

## categories

- id
- name
- slug

---

## activities

- id
- category_id
- title
- slug
- thumbnail
- banner
- location
- activity_date
- description
- status

---

## galleries

- id
- activity_id
- image
- caption

---

## contacts

- id
- address
- email
- phone
- instagram
- facebook
- maps

---

## visitor_logs

- id
- ip_address
- browser
- device
- created_at

---

# 12. Hak Akses

| Menu | Admin | Editor | Pengunjung |
|-------|-------|---------|------------|
| Home CMS | ✅ | ❌ | ❌ |
| Tentang | ✅ | ❌ | ✅ |
| Pengurus | ✅ | ❌ | ✅ |
| Anggota | ✅ | ❌ | ✅ |
| Kegiatan | ✅ | ✅ | ✅ |
| Galeri | ✅ | ✅ | ✅ |
| Kontak | ✅ | ❌ | ✅ |
| User | ✅ | ❌ | ❌ |

---

# 13. Non Functional Requirement

- Responsive
- SEO Friendly
- Fast Loading
- Mobile Friendly
- Secure Authentication
- Role Permission
- Upload Image
- Pagination
- Search
- Validation
- Error Handling
- Backup Database

---

# 14. UI/UX

Style

Modern

Minimalis

Elegant

Youthful

Church Theme

Primary Color

#1E3A8A

Secondary

#FBBF24

Background

#FFFFFF

Typography

Poppins

Icons

Bootstrap Icons

Layout

Clean

Rounded Card

Smooth Animation

---

# 15. Future Development

- Artikel/Berita
- Jadwal Liturgi
- Pendaftaran Anggota Baru
- Kalender Kegiatan
- Pengumuman
- Download Dokumen
- Video Galeri
- Live Streaming Misa
- Notifikasi Email
- QR Code Kehadiran
- Sistem Absensi Kegiatan
- Dashboard Statistik Anggota
- Multi Galeri Album
- API Mobile
- Progressive Web App (PWA)

---

# 16. Target Hasil

Website yang modern, responsif, mudah digunakan, dan menjadi pusat informasi resmi OMK. Seluruh konten dapat dikelola melalui CMS oleh pengurus tanpa perlu melakukan perubahan kode, sehingga website dapat terus diperbarui secara mandiri dan berkelanjutan.