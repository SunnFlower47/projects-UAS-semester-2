# Proyek UAS Laravel - Tim Ridwan, Sani, Bela

## 🌻 Anggota Tim
- Ridwan (Lead)
- Sani  
- Bela  

## 🌿 Struktur Branch

| Branch  | Keterangan                |
|---------|---------------------------|
| main    | Branch utama (stabil)     |
| ridwan  | Branch kerja Ridwan       |
| sani    | Branch kerja Sani         |
| bela    | Branch kerja Bela         |

## 🚀 Panduan Kerja

### 1. Clone Project Pertama Kali
```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
```

### 2. Pindah ke Branch Kamu
```bash
git checkout namabranch
# Contoh:
git checkout ridwan
```
### 3. Update dari Main Branch
```bash
git fetch origin
git merge origin/main
# ATAU
git rebase origin/main
```
### 4. Kerja & Commit

```bash
git add .
git commit -m "pesan commit jelas"
```
### 5. Push ke GitHub
```bash
git push -u origin namabranch  # Pertama kali
git push                      # Selanjutnya
```
### 6. Buat Pull Request (PR) di GitHub

1. Buka repository di GitHub.  
2. Klik tombol **Compare & pull request** pada branch kamu.  
3. Pilih base branch `main`.  
4. Deskripsikan perubahan yang kamu lakukan secara singkat dan jelas.  
5. Klik **Create pull request** untuk mengirim PR.  

## ⚙️ Setup Laravel
### 1. Install Dependencies
```bash

composer install
```
### 2. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```
3. Database Migration
```bash
php artisan migrate
```
### 4. Jalankan Server

Jika kamu menggunakan **Laravel Herd**, server Laravel akan otomatis berjalan di:
http://localhost
>Tidak perlu menjalankan `php artisan serve` secara manual.

Namun, jika **tidak menggunakan Herd**, kamu bisa jalankan server secara manual dengan perintah berikut:
```bash
php artisan serve
```

## 📌 Aturan Penting

❌ Jangan commit langsung ke main

🔄 Selalu update branch dari main sebelum kerja

✍️ Commit message harus jelas

👀 Review PR teman sebelum merge

## 🆘 Troubleshooting

### 🔀 Merge Conflict

Jika terjadi konflik saat merge:

1. Buka file yang mengalami konflik (biasanya akan ditandai oleh Git).
2. Perbaiki bagian konflik secara manual.
3. Setelah diperbaiki, lanjutkan dengan perintah:

```bash
git add namafile
git commit
```
### 📞 Kontak Lead Ridwan
[![Instagram](https://img.shields.io/badge/Instagram-%23E4405F.svg?logo=Instagram&logoColor=white)](https://instagram.com/ridwannnn_____) 