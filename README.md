# Project UAS Laravel

## 🌻 Anggota Tim
- Ridwan Andrian(Tim Lead)
- Sani  
- Bela  

## 🌿 Struktur Branch

| Branch  | Keterangan                |
|---------|---------------------------|
| main    | Branch utama (stabil)     |
| ridwan  | Branch kerja Ridwan       |
| sani    | Branch kerja Sani         |
| bela    | Branch kerja Bela         |

## ⚙️ Setup Laravel

### 1. Clone Project Pertama Kali
```bash
git clone https://github.com/SunnFlower47/projects-UAS-semester-2/
cd nama-repo
```

### 2. Install dependencies backend (PHP):
```bash
composer install
```

### 3. Install dependencies frontend (JS/CSS):
```bash
npm install
```

### 4. Setup environment:
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Jalankan migrasi database:
```bash
php artisan migrate
```

### 6. Compile asset frontend:
```bash
npm run dev
```

### 7. Jalankan Server

Jika kamu menggunakan **Laravel Herd**, server Laravel akan otomatis berjalan di:
http://localhost
>Tidak perlu menjalankan `php artisan serve` secara manual.

Namun, jika **tidak menggunakan Herd**, kamu bisa jalankan server secara manual dengan perintah berikut:
```bash
php artisan serve
```
## 🚀 Panduan Kerja

### 1. Pindah ke Branch Kamu
```bash
git checkout namabranch
# Contoh:
git checkout ridwan
```
### 1. Update dari Main Branch
```bash
git fetch origin
git merge origin/main
# ATAU
git rebase origin/main
```
### 4. Kerja & Commit

```bash
git add nama_file
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



## 📌 Aturan Penting

❌ Jangan commit langsung ke main

🔄 Selalu ambil update branch dari main sebelum kerja

📑 kerjakan sesuai job desk masing-masing, jangan asal edit file yang bukan job desk kamu

✍️ Commit message harus jelas

👀 Review PR teman sebelum merge

## 🆘 Troubleshooting

### 🔀 Merge Conflict

Merge conflict terjadi ketika Git tidak bisa otomatis menggabungkan perubahan antara dua branch. Biasanya ini karena bagian yang sama di file diubah di kedua branch.

#### 👣 Langkah-langkah Menyelesaikan Conflict:

1. Git akan memberi tahu file mana yang mengalami konflik.
2. Buka file tersebut. Kamu akan melihat penanda seperti ini:

```plaintext
<<<<<<< HEAD
Kode dari branch kamu
=======
Kode dari branch lain (misalnya main)
>>>>>>> main
```
3. Perbaiki bagian tersebut secara manual — pilih versi yang benar atau gabungkan keduanya.

4. Setelah selesai, simpan file dan tandai sudah diperbaiki:

```bash
git add namafile
git commit
```
### 📞 Kontak Lead Ridwan
[![Instagram](https://img.shields.io/badge/Instagram-%23E4405F.svg?logo=Instagram&logoColor=white)](https://instagram.com/ridwannnn_____) 
