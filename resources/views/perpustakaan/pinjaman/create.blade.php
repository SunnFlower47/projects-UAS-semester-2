@extends('layouts.perpus')

@section('title', 'Form Peminjaman Buku')

@section('content')
<div class="container">
  <h2 class="form-title">Form Peminjaman Buku</h2>


  {{-- Informasi Buku --}}
  <div class="book-header">
    <img src="{{ asset("storage/{$book->cover}") }}" alt="Cover Buku">
    <div class="book-info">
      <h3>{{ $book->judul }}</h3>
      <p><strong>Penulis:</strong> {{ $book->pengarang }}</p>
      <p><strong>Rak:</strong> {{ $book->lokasi_rak}}</p>
      <p><strong>Stok Tersisa:</strong> {{ $book->stok }}</p>
    </div>
  </div>

  <form action="{{ route('perpustakaan.pinjaman.store') }}" method="POST">


    @csrf
<input type="hidden" name="book_id" value="{{ $book->id }}">
    @php
      $today = now()->format('Y-m-d');
      $maxReturn = now()->addDays(7)->format('Y-m-d');
    @endphp

    {{-- Tanggal Kembali --}}
    <div class="form-group">
      <label for="tanggal_kembali">Tanggal Kembali (maksimal 7 hari)</label>
      <input type="date" name="tanggal_kembali"
             class="form-control"
             min="{{ $today }}"
             max="{{ $maxReturn }}"
             required>
    </div>

    {{-- Jumlah --}}
    <div class="form-group">
      <label for="jumlah">Jumlah yang Dipinjam</label>
      <input type="number" name="jumlah"
             min="1"
             max="{{ $book->stok }}"
             value="1"
             class="form-control"
             {{ $book->stok < 1 ? 'disabled' : '' }}>
    </div>

    {{-- Catatan --}}
    <div class="form-group">
      <label for="catatan">Catatan (Opsional)</label>
      <textarea name="catatan" class="form-control" rows="3" placeholder="Contoh: untuk referensi skripsi."></textarea>
    </div>

    {{-- Submit --}}
    @if($book->stok > 0)
      <button type="submit" class="btn-konfirmasi">Ajukan Peminjaman</button>
    @else
      <p class="stok-habis">Stok buku habis. Tidak bisa dipinjam saat ini.</p>
    @endif
  </form>

  {{-- Syarat & Ketentuan --}}
  <div class="mt-5 p-4 bg-dark rounded text-white" style="background-color:#111827; margin-top: 40px;">
    <h4 style="margin-bottom: 15px;">Syarat & Ketentuan Peminjaman:</h4>
    <ul style="line-height: 1.7;">
      <li>Durasi maksimal peminjaman adalah 7 hari sejak tanggal peminjaman.</li>
      <li>Peminjam wajib mengembalikan buku tepat waktu untuk menghindari denda.</li>
      <li>Jika buku rusak atau hilang, peminjam wajib mengganti sesuai ketentuan.</li>
      <li>Jumlah pinjam disesuaikan dengan stok yang tersedia.</li>
      <li>Peminjam dapat mengajukan perpanjangan selama tidak ada antrian.</li>
    </ul>
  </div>
</div>
@endsection


<style>

  .container {
    max-width: 700px;
    margin: 40px auto;
    background-color: #1f2937;
    padding: 30px;
    border-radius: 10px;
  }

  .form-title {
  text-align: center;
  font-size: 32px;
  font-weight: 600;
  color: #ffffff;
  margin-bottom: 30px;
}
  .book-header {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
  }

  .book-header img {
    width: 150px;
    height: auto;
    border-radius: 6px;
    border: 1px solid #374151;
  }

  .book-info h3 {
    margin: 0 0 10px;
    font-size: 24px;
    color: #fff;
  }

  .book-info p {
    margin: 4px 0;
    color: #d1d5db;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    color: #d1d5db;
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
  }

  .form-control {
    padding: 10px;
    width: 100%;
    border-radius: 6px;
    border: 1px solid #4b5563;
    background-color: #111827;
    color: #fff;
    font-size: 15px;
  }

  .form-control:disabled {
    background-color: #374151;
    color: #9ca3af;
  }

  .btn-konfirmasi {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #22d3ee;
    color: #111827;
    font-weight: bold;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-konfirmasi:hover {
    background-color: #67e8f9;
  }

  .stok-habis {
    color: #f87171;
    font-weight: bold;
    margin-top: 20px;
  }
  body, h2, h3, p, label, input, textarea, button {
  font-family: 'Poppins', sans-serif;
}
</style>
