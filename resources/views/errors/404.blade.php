@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-pink-50 dark:bg-pink-200 text-center px-4">
    <h1 class="text-7xl font-extrabold text-pink-400 dark:text-pink-600 mb-4">404</h1>
    <p class="text-lg text-pink-700 dark:text-pink-800">Halaman yang kamu cari tidak ditemukan.</p>
    <a href="{{ route('perpustakaan.index') }}"
       class="mt-6 inline-block px-6 py-2 text-sm font-semibold text-white bg-pink-400 hover:bg-pink-500 rounded-lg transition duration-200 ease-in-out shadow-md">
        Kembali ke Beranda
    </a>
</div>
@endsection
