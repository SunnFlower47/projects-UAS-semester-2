@extends('layouts.perpus')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-gray-900 text-center px-4">
    <h1 class="text-7xl font-extrabold text-cyan-400 mb-4">404</h1>
    <p class="text-lg text-gray-700 dark:text-gray-300">Halaman yang kamu cari tidak ditemukan.</p>
    <a href="{{ route('perpustakaan.index') }}"
       class="mt-6 inline-block px-6 py-2 text-sm font-semibold text-white bg-cyan-400 hover:bg-cyan-500 rounded-lg transition">
        Kembali ke Beranda
    </a>
</div>
@endsection
