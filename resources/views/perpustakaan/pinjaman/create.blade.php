@extends('layouts.perpus')

@section('title', 'Form Peminjaman Buku')

@section('content')
<div class="max-w-3xl mx-auto mt-16 mb-24 px-6 py-10 bg-pink-50 rounded-2xl shadow-md">
  <h2 class="text-3xl font-bold text-pink-700 text-center mb-10">Form Peminjaman Buku</h2>

  {{-- Informasi Buku --}}
  <div class="flex flex-col md:flex-row gap-6 mb-10">
    <img src="{{ asset("storage/{$book->cover}") }}" alt="Cover Buku"
         class="w-40 h-auto rounded-lg border border-pink-300 shadow-sm self-center">
    <div class="flex-1 space-y-2 text-gray-700 text-sm">
      <h3 class="text-2xl font-semibold text-pink-800">{{ $book->judul }}</h3>
      <p><span class="font-medium">Penulis:</span> {{ $book->pengarang }}</p>
      <p><span class="font-medium">Rak:</span> {{ $book->lokasi_rak }}</p>
      <p><span class="font-medium">Stok Tersisa:</span> {{ $book->stok }}</p>
    </div>
  </div>

  {{-- Form --}}
  <form action="{{ route('perpustakaan.pinjaman.store') }}" method="POST" class="space-y-6">
    @csrf
    <input type="hidden" name="book_id" value="{{ $book->id }}">

    @php
      $today = now()->format('Y-m-d');
      $maxReturn = now()->addDays(7)->format('Y-m-d');
    @endphp

    {{-- Tanggal Kembali --}}
    <div>
      <label for="tanggal_kembali" class="block text-pink-700 font-semibold mb-2">Tanggal Kembali (maks. 7 hari)</label>
      <input type="date" name="tanggal_kembali" min="{{ $today }}" max="{{ $maxReturn }}" required
             class="w-full rounded-lg border border-pink-300 bg-pink-100 text-pink-900 p-3 focus:outline-none focus:ring-2 focus:ring-pink-400">
    </div>

    {{-- Jumlah --}}
    <div>
      <label for="jumlah" class="block text-pink-700 font-semibold mb-2">Jumlah yang Dipinjam</label>
      <input type="number" name="jumlah" min="1" max="{{ $book->stok }}" value="1"
             class="w-full rounded-lg border border-pink-300 bg-pink-100 text-pink-900 p-3 focus:outline-none focus:ring-2 focus:ring-pink-400"
             {{ $book->stok < 1 ? 'disabled' : '' }}>
    </div>

    {{-- Catatan --}}
    <div>
      <label for="catatan" class="block text-pink-700 font-semibold mb-2">Catatan (Opsional)</label>
      <textarea name="catatan" rows="3" placeholder="Contoh: untuk referensi skripsi."
                class="w-full rounded-lg border border-pink-300 bg-pink-100 text-pink-900 p-3 focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
    </div>

    {{-- Tombol --}}
    <div>
      @if($book->stok > 0)
        <button type="submit"
                class="w-full py-3 bg-pink-500 text-white font-semibold rounded-lg hover:bg-pink-600 transition duration-200">
          Ajukan Peminjaman
        </button>
      @else
        <p class="text-red-500 font-bold mt-4 text-center">Stok buku habis. Tidak bisa dipinjam saat ini.</p>
      @endif
    </div>
  </form>

  {{-- Syarat & Ketentuan --}}
  <div class="mt-12 p-6 bg-pink-100 rounded-lg text-pink-800">
    <h4 class="font-semibold mb-4">Syarat & Ketentuan Peminjaman:</h4>
    <ul class="list-disc list-inside space-y-2 text-sm">
      <li>Durasi maksimal peminjaman adalah 7 hari sejak tanggal peminjaman.</li>
      <li>Peminjam wajib mengembalikan buku tepat waktu untuk menghindari denda.</li>
      <li>Jika buku rusak atau hilang, peminjam wajib mengganti sesuai ketentuan.</li>
      <li>Jumlah pinjam disesuaikan dengan stok yang tersedia.</li>
      <li>Peminjam dapat mengajukan perpanjangan selama tidak ada antrian.</li>
    </ul>
  </div>
</div>

@endsection


