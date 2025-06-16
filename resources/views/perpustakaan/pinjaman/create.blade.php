@extends('layouts.perpus')

@section('title', 'Form Peminjaman Buku')

@section('content')
 <div class="max-w-7xl mx-auto mt-1 mb-1 bg-transparent backdrop-blur-md rounded-2xl p-6 md:p-10 shadow-md border border-pink-100">
{{-- Tombol Kembali --}}



  <h2 class="text-3xl font-bold text-pink-600 text-center mb-10">Form Peminjaman Buku</h2>

  {{-- Informasi Buku --}}
  <div class="flex flex-col md:flex-row gap-6 mb-10">
    <img src="{{ asset("storage/{$book->cover}") }}" alt="Cover Buku"
         class="w-40 h-auto rounded-lg border border-lavender-200 shadow-sm self-center"
         onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';">
    <div class="flex-1 space-y-2 text-gray-700 text-sm">
      <h3 class="text-2xl font-semibold text-lavender-800">{{ $book->judul }}</h3>
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
      <label for="tanggal_kembali" class="block text-violet-700 font-semibold mb-2">Tanggal Kembali (maks. 7 hari)</label>
      <input type="date" name="tanggal_kembali" min="{{ $today }}" max="{{ $maxReturn }}" required
             class="w-full rounded-lg border border-violet-200 bg-violet-50 text-gray-800 p-3 focus:outline-none focus:ring-2 focus:ring-violet-400">
    </div>

    {{-- Jumlah --}}
    <div>
      <label for="jumlah" class="block text-violet-700 font-semibold mb-2">Jumlah yang Dipinjam</label>
      <input type="number" name="jumlah" min="1" max="{{ $book->stok }}" value="1"
             class="w-full rounded-lg border border-violet-200 bg-violet-50 text-gray-800 p-3 focus:outline-none focus:ring-2 focus:ring-violet-400"
             {{ $book->stok < 1 ? 'disabled' : '' }}>
    </div>

    {{-- Catatan --}}
    <div>
      <label for="catatan" class="block text-violet-700 font-semibold mb-2">Catatan (Opsional)</label>
      <textarea name="catatan" rows="3" placeholder="Contoh: untuk referensi skripsi."
                class="w-full rounded-lg border border-violet-200 bg-violet-50 text-gray-800 p-3 focus:outline-none focus:ring-2 focus:ring-violet-400"></textarea>
    </div>

    {{-- Tombol --}}
<div class="space-y-3 mt-6">
  @if($book->stok > 0)
    <button type="submit"
            class="w-full flex justify-center items-center gap-2 py-3 bg-pink-400 text-white font-semibold rounded-lg hover:bg-pink-500 transition duration-200">
      Ajukan Peminjaman
    </button>
  @else
    <p class="text-red-500 font-bold text-center">Stok buku habis. Tidak bisa dipinjam saat ini.</p>
  @endif

  <a href="{{ url()->previous() }}"
     class="w-full flex justify-center items-center gap-2 py-3 bg-pink-400 text-white font-semibold rounded-lg hover:bg-pink-500 transition duration-200">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
      <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 15.75L3.75 10.5 9 5.25M3.75 10.5h13.5A2.25 2.25 0 0120.25 12.75v6" />
    </svg>
    Kembali
  </a>
</div>

  </form>

  {{-- Syarat & Ketentuan --}}
  <div class="mt-12 p-6 bg-lavender-50 rounded-lg text-gray-800 border border-lavender-100">
    <h4 class="font-semibold mb-4 text-purple-700">Syarat & Ketentuan Peminjaman:</h4>
    <ul class="list-disc list-inside space-y-2 text-sm">
      <li>Durasi maksimal peminjaman adalah 7 hari sejak tanggal peminjaman.</li>
      <li>Peminjam wajib mengembalikan buku tepat waktu untuk menghindari denda.</li>
      <li>Jika buku rusak atau hilang, peminjam wajib mengganti sesuai ketentuan.</li>
      <li>Jumlah pinjam disesuaikan dengan stok yang tersedia.</li>
      <li>Peminjam dapat mengajukan perpanjangan selama tidak ada antrian.</li>
    </ul>
  </div>
</div>
  <div class="mb-6 mt-12">

</div>
@endsection
